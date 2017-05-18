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
class SingleQuoteFixer extends AbstractFixer
{
    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        $tokens = Tokens::fromCode($content);

        foreach ($tokens as $token) {
            if (!$token->isGivenKind(T_CONSTANT_ENCAPSED_STRING)) {
                continue;
            }

            $content = $token->getContent();
            if (
                '"' === $content[0] &&
                false === strpos($content, "'") &&
                // regex: odd number of backslashes, not followed by double quote or dollar
                !preg_match('/(?<!\\\\)(?:\\\\{2})*\\\\(?!["$\\\\])/', $content)
            ) {
                $content = substr($content, 1, -1);
                $content = str_replace(array('\\"', '\\$'), array('"', '$'), $content);
                $token->setContent('\''.$content.'\'');
            }
        }

        return $tokens->generateCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'Convert double quotes to single quotes for simple strings.';
    }
}
