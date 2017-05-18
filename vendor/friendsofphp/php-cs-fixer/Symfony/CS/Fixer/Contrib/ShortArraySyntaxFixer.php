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

namespace Symfony\CS\Fixer\Contrib;

use Symfony\CS\AbstractFixer;
use Symfony\CS\Tokenizer\Tokens;

/**
 * @author Sebastiaan Stok <s.stok@rollerscapes.net>
 * @author Dariusz Rumiński <dariusz.ruminski@gmail.com>
 */
class ShortArraySyntaxFixer extends AbstractFixer
{
    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        $tokens = Tokens::fromCode($content);

        foreach ($tokens->findGivenKind(T_ARRAY) as $index => $token) {
            $openIndex = $tokens->getNextTokenOfKind($index, array('('));
            $closeIndex = $tokens->findBlockEnd(Tokens::BLOCK_TYPE_PARENTHESIS_BRACE, $openIndex);

            $tokens->overrideAt($openIndex, '[');
            $tokens->overrideAt($closeIndex, ']');

            $tokens->clearTokenAndMergeSurroundingWhitespace($index);
        }

        return $tokens->generateCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'PHP arrays should use the PHP 5.4 short-syntax.';
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        // should be run before the UnalignEqualsFixer and TernarySpacesFixer.
        return 1;
    }
}
