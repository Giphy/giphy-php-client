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

namespace Symfony\CS\Fixer\PSR1;

use Symfony\CS\AbstractFixer;
use Symfony\CS\Tokenizer\Tokens;

/**
 * Fixer for rules defined in PSR1 ¶2.1.
 *
 * @author Dariusz Rumiński <dariusz.ruminski@gmail.com>
 */
class ShortTagFixer extends AbstractFixer
{
    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        // replace all <? with <?php to replace all short open tags even without short_open_tag option enabled
        $newContent = preg_replace('/<\?(\s|$)/', '<?php$1', $content, -1, $count);

        if (0 === $count) {
            return $content;
        }

        /* the following code is magic to revert previous replacements which should NOT be replaced, for example incorrectly replacing
         * > echo '<? ';
         * with
         * > echo '<?php ';
        */
        $tokens = Tokens::fromCode($newContent);
        $tokensOldContent = '';
        $tokensOldContentLength = 0;

        foreach ($tokens as $token) {
            if ($token->isGivenKind(T_OPEN_TAG)) {
                $tokenContent = $token->getContent();

                if ('<?php' !== substr($content, $tokensOldContentLength, 5)) {
                    $tokenContent = '<? ';
                }

                $tokensOldContent .= $tokenContent;
                $tokensOldContentLength += strlen($tokenContent);
                continue;
            }

            if ($token->isGivenKind(array(T_COMMENT, T_DOC_COMMENT, T_CONSTANT_ENCAPSED_STRING, T_ENCAPSED_AND_WHITESPACE, T_STRING))) {
                $tokenContent = '';
                $tokenContentLength = 0;
                $parts = explode('<?php', $token->getContent());
                $iLast = count($parts) - 1;

                foreach ($parts as $i => $part) {
                    $tokenContent .= $part;
                    $tokenContentLength += strlen($part);

                    if ($i !== $iLast) {
                        if ('<?php' === substr($content, $tokensOldContentLength + $tokenContentLength, 5)) {
                            $tokenContent .= '<?php';
                            $tokenContentLength += 5;
                        } else {
                            $tokenContent .= '<?';
                            $tokenContentLength += 2;
                        }
                    }
                }

                $token->setContent($tokenContent);
            }

            $tokensOldContent .= $token->getContent();
            $tokensOldContentLength += strlen($token->getContent());
        }

        return $tokens->generateCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'PHP code must use the long <?php ?> tags or the short-echo <?= ?> tags; it must not use the other tag variations.';
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        // must run before all Token-based fixers
        return 98;
    }
}
