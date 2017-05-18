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

namespace Symfony\CS\Fixer\PSR2;

use Symfony\CS\AbstractFixer;
use Symfony\CS\Tokenizer\Token;
use Symfony\CS\Tokenizer\Tokens;

/**
 * Fixer for rules defined in PSR2 ¶3.
 *
 * @author Dariusz Rumiński <dariusz.ruminski@gmail.com>
 */
class LineAfterNamespaceFixer extends AbstractFixer
{
    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        $tokens = Tokens::fromCode($content);
        $lastIndex = $tokens->count() - 1;

        for ($index = $lastIndex; $index >= 0; --$index) {
            $token = $tokens[$index];

            if ($token->isGivenKind(T_NAMESPACE)) {
                $semicolonIndex = $tokens->getNextTokenOfKind($index, array(';', '{', array(T_CLOSE_TAG)));
                $semicolonToken = $tokens[$semicolonIndex];

                if (!isset($tokens[$semicolonIndex + 1]) || !$semicolonToken->equals(';')) {
                    continue;
                }

                $nextIndex = $semicolonIndex + 1;
                $nextToken = $tokens[$nextIndex];

                if (!$nextToken->isWhitespace()) {
                    $tokens->insertAt($semicolonIndex + 1, new Token(array(T_WHITESPACE, "\n\n")));
                } else {
                    $nextToken->setContent(
                        ($nextIndex === $lastIndex ? "\n" : "\n\n").ltrim($nextToken->getContent())
                    );
                }
            }
        }

        return $tokens->generateCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'There MUST be one blank line after the namespace declaration.';
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        // should be run after the UnusedUseFixer
        return -20;
    }
}
