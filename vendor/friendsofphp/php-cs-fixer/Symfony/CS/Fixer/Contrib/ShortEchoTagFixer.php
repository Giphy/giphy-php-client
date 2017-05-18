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
use Symfony\CS\Tokenizer\Token;
use Symfony\CS\Tokenizer\Tokens;

/**
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class ShortEchoTagFixer extends AbstractFixer
{
    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        $tokens = Tokens::fromCode($content);
        $i = count($tokens);

        while ($i--) {
            $token = $tokens[$i];
            $nextIndex = $i + 1;

            if (
                !$token->isGivenKind(T_OPEN_TAG_WITH_ECHO)
                && !(
                    /*
                     * HHVM parses '<?=' as T_ECHO instead of T_OPEN_TAG_WITH_ECHO
                     *
                     * @see https://github.com/facebook/hhvm/issues/4809
                     * @see https://github.com/facebook/hhvm/issues/7161
                     */
                    defined('HHVM_VERSION')
                    && $token->equals(array(T_ECHO, '<?='))
                )
            ) {
                continue;
            }

            $tokens->overrideAt($i, array(T_OPEN_TAG, '<?php ', $token->getLine()));

            if (!$tokens[$nextIndex]->isWhitespace()) {
                $tokens->insertAt($nextIndex, new Token(array(T_WHITESPACE, ' ')));
            }

            $tokens->insertAt($nextIndex, new Token(array(T_ECHO, 'echo')));
        }

        return $tokens->generateCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'Replace short-echo <?= with long format <?php echo syntax.';
    }
}
