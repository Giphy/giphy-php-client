<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Symfony\CS\Fixer\Symfony;

use Symfony\CS\AbstractFixer;
use Symfony\CS\DocBlock\DocBlock;
use Symfony\CS\Tokenizer\Tokens;

/**
 * @author Graham Campbell <graham@alt-three.com>
 */
class PhpdocTrimFixer extends AbstractFixer
{
    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        $tokens = Tokens::fromCode($content);

        foreach ($tokens->findGivenKind(T_DOC_COMMENT) as $token) {
            $content = $token->getContent();
            $content = $this->fixStart($content);
            // we need re-parse the docblock after fixing the start before
            // fixing the end in order for the lines to be correctly indexed
            $content = $this->fixEnd($content);
            $token->setContent($content);
        }

        return $tokens->generateCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'Phpdocs should start and end with content, excluding the very first and last line of the docblocks.';
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        /*
         * Should be run after all phpdoc fixers that add or remove tags, or
         * alter descriptions. This is so that they don't leave behind blank
         * lines this fixer would have otherwise cleaned up.
         */
        return -5;
    }

    /**
     * Make sure the first useful line starts immediately after the first line.
     *
     * @param string $content
     *
     * @return string
     */
    private function fixStart($content)
    {
        $doc = new DocBlock($content);
        $lines = $doc->getLines();
        $total = count($lines);

        foreach ($lines as $index => $line) {
            if (!$line->isTheStart()) {
                // don't remove lines with content and don't entirely delete docblocks
                if ($total - $index < 3 || $line->containsUsefulContent()) {
                    break;
                }

                $line->remove();
            }
        }

        return $doc->getContent();
    }

    /**
     * Make sure the last useful is immediately before after the final line.
     *
     * @param string $content
     *
     * @return string
     */
    private function fixEnd($content)
    {
        $doc = new DocBlock($content);
        $lines = array_reverse($doc->getLines());
        $total = count($lines);

        foreach ($lines as $index => $line) {
            if (!$line->isTheEnd()) {
                // don't remove lines with content and don't entirely delete docblocks
                if ($total - $index < 3 || $line->containsUsefulContent()) {
                    break;
                }

                $line->remove();
            }
        }

        return $doc->getContent();
    }
}
