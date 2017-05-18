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
use Symfony\CS\Tokenizer\Tokens;

/**
 * Fixer for rules defined in PSR2 ¶2.5.
 *
 * @author Dariusz Rumiński <dariusz.ruminski@gmail.com>
 */
class LowercaseKeywordsFixer extends AbstractFixer
{
    private static $excludedTokens = array(T_HALT_COMPILER);

    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        $tokens = Tokens::fromCode($content);

        foreach ($tokens as $token) {
            if ($token->isKeyword() && !$token->isGivenKind(self::$excludedTokens)) {
                $token->setContent(strtolower($token->getContent()));
            }
        }

        return $tokens->generateCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'PHP keywords MUST be in lower case.';
    }
}
