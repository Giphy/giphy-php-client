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

namespace Symfony\CS;

use Symfony\Component\Finder\Finder as BaseFinder;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Finder extends BaseFinder
{
    public function __construct()
    {
        parent::__construct();

        $this
            ->files()
            ->name('*.php')
            ->name('*.twig')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true)
            ->exclude('vendor')
        ;
    }
}
