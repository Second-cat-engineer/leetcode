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
    $matching = [
        '(' => ')',
        '{' => '}',
        '[' => ']'
    ];

    $stack = [];
    foreach (str_split($s) as $char) {
        if (array_key_exists($char, $matching)) {
            $stack[] = $char;

        } else if (in_array($char, $matching, true)) {
            if (empty($stack)) {
                return false;
            }

            $lastElem  = array_pop($stack);
            if (!array_key_exists($lastElem, $matching) || $matching[$lastElem] !== $char ) {
                return false;
            }

        } else {
            return false;
        }
    }

    return empty($stack);
}

$res = isValid("([({}])");
var_dump($res);