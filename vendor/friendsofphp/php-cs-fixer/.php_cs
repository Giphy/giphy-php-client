<?php

$header = <<<'EOF'
This file is part of PHP CS Fixer.

(c) Fabien Potencier <fabien@symfony.com>
    Dariusz Rumiński <dariusz.ruminski@gmail.com>

This source file is subject to the MIT license that is bundled
with this source code in the file LICENSE.
EOF;

Symfony\CS\Fixer\Contrib\HeaderCommentFixer::setHeader($header);

return Symfony\CS\Config::create()
    // use default SYMFONY_LEVEL and extra fixers:
    ->fixers(array(
        'combine_consecutive_unsets',
        'header_comment',
        'long_array_syntax',
        'no_useless_else',
        'no_useless_return',
        'ordered_use',
        'php_unit_construct',
        'php_unit_strict',
        'strict',
        'strict_param',
    ))
    ->finder(
        Symfony\CS\Finder::create()
            ->exclude('Symfony/CS/Tests/Fixtures')
            ->in(__DIR__)
    )
;
