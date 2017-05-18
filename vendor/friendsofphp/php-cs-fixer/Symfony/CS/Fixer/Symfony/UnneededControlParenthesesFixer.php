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
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 * @author Dariusz Rumiński <dariusz.ruminski@gmail.com>
 * @author Gregor Harlan <gharlan@web.de>
 */
final class UnneededControlParenthesesFixer extends AbstractFixer
{
    /**
     * To be removed when PHP support will be 5.5+.
     *
     * @var string[] List of statements to fix
     */
    private static $controlStatements = array(
        'break',
        'continue',
        'clone',
        'echo_print',
        'return',
        'switch_case',
        'yield',
    );

    private static $loops = array(
        'break' => array('lookupTokens' => T_BREAK, 'neededSuccessors' => array(';')),
        'continue' => array('lookupTokens' => T_CONTINUE, 'neededSuccessors' => array(';')),
        'clone' => array('lookupTokens' => T_CLONE, 'neededSuccessors' => array(';', ':', ',', ')'), 'forbiddenContents' => array('?', ':')),
        'echo_print' => array('lookupTokens' => array(T_ECHO, T_PRINT), 'neededSuccessors' => array(';', array(T_CLOSE_TAG))),
        'return' => array('lookupTokens' => T_RETURN, 'neededSuccessors' => array(';', array(T_CLOSE_TAG))),
        'switch_case' => array('lookupTokens' => T_CASE, 'neededSuccessors' => array(';', ':')),
    );

    /**
     * Dynamic yield option set on constructor.
     */
    public function __construct()
    {
        // To be moved back on static when PHP support will be 5.5+
        if (defined('T_YIELD')) {
            self::$loops['yield'] = array('lookupTokens' => T_YIELD, 'neededSuccessors' => array(';', ')'));
        }
    }

    /**
     * @param array $controlStatements
     */
    public static function configure(array $controlStatements)
    {
        self::$controlStatements = $controlStatements;
    }

    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        $tokens = Tokens::fromCode($content);

        // Checks if specific statements are set and uses them in this case.
        $loops = array_intersect_key(self::$loops, array_flip(self::$controlStatements));

        foreach ($tokens as $index => $token) {
            if (!$token->equals('(')) {
                continue;
            }

            $blockStartIndex = $index;
            $index = $tokens->getPrevMeaningfulToken($index);
            $token = $tokens[$index];

            foreach ($loops as $loop) {
                if (!$token->isGivenKind($loop['lookupTokens'])) {
                    continue;
                }

                $blockEndIndex = $tokens->findBlockEnd(Tokens::BLOCK_TYPE_PARENTHESIS_BRACE, $blockStartIndex);
                $blockEndNextIndex = $tokens->getNextMeaningfulToken($blockEndIndex);

                if (!$tokens[$blockEndNextIndex]->equalsAny($loop['neededSuccessors'])) {
                    continue;
                }

                if (array_key_exists('forbiddenContents', $loop)) {
                    $forbiddenTokenIndex = $tokens->getNextTokenOfKind($blockStartIndex, $loop['forbiddenContents']);
                    // A forbidden token is found and is inside the parenthesis.
                    if (null !== $forbiddenTokenIndex && $forbiddenTokenIndex < $blockEndIndex) {
                        continue;
                    }
                }

                if ($tokens[$blockStartIndex - 1]->isWhitespace() || $tokens[$blockStartIndex - 1]->isComment()) {
                    $tokens->clearTokenAndMergeSurroundingWhitespace($blockStartIndex);
                } else {
                    // Adds a space to prevent broken code like `return2`.
                    $tokens->overrideAt($blockStartIndex, array(T_WHITESPACE, ' '));
                }

                $tokens->clearTokenAndMergeSurroundingWhitespace($blockEndIndex);
            }
        }

        return $tokens->generateCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'Removes unneeded parentheses around control statements.';
    }

    /**
     * Should be run before trailing_spaces.
     *
     * {@inheritdoc}
     */
    public function getPriority()
    {
        return 30;
    }
}
