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
use Symfony\CS\Utils;

/**
 * @author Graham Campbell <graham@alt-three.com>
 */
class NoEmptyLinesAfterPhpdocsFixer extends AbstractFixer
{
    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        static $forbiddenSuccessors = array(
            T_DOC_COMMENT,
            T_COMMENT,
            T_WHITESPACE,
            T_RETURN,
            T_THROW,
            T_GOTO,
            T_CONTINUE,
            T_BREAK,
        );

        $tokens = Tokens::fromCode($content);

        foreach ($tokens->findGivenKind(T_DOC_COMMENT) as $index => $token) {
            // get the next non-whitespace token inc comments, provided
            // that there is whitespace between it and the current token
            $next = $tokens->getNextNonWhitespace($index);
            if ($index + 2 === $next && false === $tokens[$next]->isGivenKind($forbiddenSuccessors)) {
                $this->fixWhitespace($tokens[$index + 1]);
            }
        }

        return $tokens->generateCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'There should not be blank lines between docblock and the documented element.';
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        // should be ran before the SingleBlankLineBeforeNamespaceFixer.
        return 1;
    }

    /**
     * Cleanup a whitespace token.
     *
     * @param Token $token
     */
    private function fixWhitespace(Token $token)
    {
        $content = $token->getContent();
        // if there is more than one new line in the whitespace, then we need to fix it
        if (substr_count($content, "\n") > 1) {
            // the final bit of the whitespace must be the next statement's indentation
            $lines = Utils::splitLines($content);
            $token->setContent("\n".end($lines));
        }
    }
}
