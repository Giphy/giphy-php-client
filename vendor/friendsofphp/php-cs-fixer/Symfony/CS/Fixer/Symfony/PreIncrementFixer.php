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
use Symfony\CS\Tokenizer\Tokens;

/**
 * @author Gregor Harlan <gharlan@web.de>
 */
class PreIncrementFixer extends AbstractFixer
{
    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        $tokens = Tokens::fromCode($content);

        for ($index = $tokens->count() - 1; 0 <= $index; --$index) {
            $token = $tokens[$index];

            if (!$token->isGivenKind(array(T_INC, T_DEC)) || !$tokens->isUnarySuccessorOperator($index)) {
                continue;
            }

            $nextToken = $tokens[$tokens->getNextMeaningfulToken($index)];
            if (!$nextToken->equalsAny(array(';', ')'))) {
                continue;
            }

            $startIndex = $this->findStart($tokens, $index);

            $prevToken = $tokens[$tokens->getPrevMeaningfulToken($startIndex)];
            if ($prevToken->equalsAny(array(';', '{', '}', array(T_OPEN_TAG)))) {
                $tokens->insertAt($startIndex, clone $token);
                $token->clear();
            }
        }

        return $tokens->generateCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'Pre incrementation/decrementation should be used if possible.';
    }

    /**
     * @param Tokens $tokens
     * @param int    $index
     *
     * @return int
     */
    private function findStart(Tokens $tokens, $index)
    {
        do {
            $index = $tokens->getPrevMeaningfulToken($index);
            $token = $tokens[$index];

            $blockType = $tokens->detectBlockType($token);
            if (null !== $blockType && !$blockType['isStart']) {
                $index = $tokens->findBlockEnd($blockType['type'], $index, false);
                $token = $tokens[$index];
            }
        } while (!$token->equalsAny(array('$', array(T_VARIABLE))));

        $prevIndex = $tokens->getPrevMeaningfulToken($index);
        $prevToken = $tokens[$prevIndex];

        if ($prevToken->equals('$')) {
            $index = $prevIndex;
            $prevIndex = $tokens->getPrevMeaningfulToken($index);
            $prevToken = $tokens[$prevIndex];
        }

        if ($prevToken->isGivenKind(T_OBJECT_OPERATOR)) {
            return $this->findStart($tokens, $prevIndex);
        }

        if ($prevToken->isGivenKind(T_PAAMAYIM_NEKUDOTAYIM)) {
            $prevPrevIndex = $tokens->getPrevMeaningfulToken($prevIndex);
            if (!$tokens[$prevPrevIndex]->isGivenKind(T_STRING)) {
                return $this->findStart($tokens, $prevIndex);
            }

            $index = $tokens->getTokenNotOfKindSibling($prevIndex, -1, array(array(T_NS_SEPARATOR), array(T_STRING)));
            $index = $tokens->getNextMeaningfulToken($index);
        }

        return $index;
    }
}
