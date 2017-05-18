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
use Symfony\CS\Tokenizer\Token;
use Symfony\CS\Tokenizer\Tokens;

/**
 * Fixer for part of rule defined in PSR5 ¶7.22.
 *
 * @author SpacePossum
 */
final class PhpdocSingleLineVarSpacingFixer extends AbstractFixer
{
    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        $tokens = Tokens::fromCode($content);

        /** @var Token $token */
        foreach ($tokens as $index => $token) {
            if ($token->isGivenKind(T_DOC_COMMENT)) {
                $token->setContent($this->fixTokenContent($token->getContent()));
                continue;
            }

            if (!$token->isGivenKind(T_COMMENT)) {
                continue;
            }

            $content = $token->getContent();
            $fixedContent = $this->fixTokenContent($content);
            if ($content !== $fixedContent) {
                $tokens->overrideAt($index, array(T_DOC_COMMENT, $fixedContent, $token->getLine()));
            }
        }

        return $tokens->generateCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'Single line @var PHPDoc should have proper spacing.';
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        // should be ran after the PhpdocTypeToVarFixer.
        return -10;
    }

    /**
     * @param string $content
     *
     * @return string
     */
    private function fixTokenContent($content)
    {
        return preg_replace_callback(
            '#^/\*\*[ \t]*@var[ \t]+(\S+)[ \t]*(\$\S+)?[ \t]*([^\n]*)\*/$#',
            function (array $matches) {
                $content = '/** @var';
                for ($i = 1, $m = count($matches); $i < $m; ++$i) {
                    if ('' !== $matches[$i]) {
                        $content .= ' '.$matches[$i];
                    }
                }

                $content = rtrim($content);

                return $content.' */';
            },
            $content
        );
    }
}
