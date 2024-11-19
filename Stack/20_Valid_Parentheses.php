<?php

// You are given a string s consisting of the following characters: '(', ')', '{', '}', '[' and ']'.
// The input string s is valid if and only if:
// 1. Every open bracket is closed by the same type of close bracket.
// 2. Open brackets are closed in the correct order.
// 3. Every close bracket has a corresponding open bracket of the same type.
//Return true if s is a valid string, and false otherwise.

// Алгоритмическая сложность: O(n).

/**
 * @param String $s
 * @return Boolean
 */
function isValid(string $s): bool
{
    $availableChars = ['(', ')', '{', '}', '[', ']'];

    $chars = str_split($s); //разбить на символы
    $sUniqueElemsCount = count(array_unique($chars));
    if ($sUniqueElemsCount > count($availableChars)) {
        return false;
    }

    $closedChars = [')', '}', ']'];
    $openedChars = ['(', '{', '['];
    $oppositions = [
        '(' => ')',
        '{' => '}',
        '[' => ']'
    ];

    $stack = [];
    foreach ($chars as $char) {
        if (in_array($char, $openedChars)) {
            $stack[] = $char;
            continue;
        }
        if (in_array($char, $closedChars)) {
            if (empty($stack)) {
                return false;
            }
            $lastKey = array_key_last($stack);
            $lastElem = $stack[$lastKey];
            if (in_array($lastElem, $openedChars) && $oppositions[$lastElem] === $char) {
                unset($stack[$lastKey]);
            } else {
                return false;
            }
        }
    }

    return empty($stack);
}

$res = isValid("([({}])");
var_dump($res);