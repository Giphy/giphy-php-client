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

use Symfony\CS\AbstractAnnotationRemovalFixer;
use Symfony\CS\Tokenizer\Tokens;

/**
 * @author Graham Campbell <graham@alt-three.com>
 */
class PhpdocNoPackageFixer extends AbstractAnnotationRemovalFixer
{
    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        $tokens = Tokens::fromCode($content);

        $this->removeAnnotations($tokens, array('package', 'subpackage'));

        return $tokens->generateCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return '@package and @subpackage annotations should be omitted from phpdocs.';
    }
}
