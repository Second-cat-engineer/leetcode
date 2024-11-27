<?php

// Given n pairs of parentheses, write a function to generate all combinations of well-formed parentheses.

// Example 1:
// Input: n = 3
// Output: ["((()))","(()())","(())()","()(())","()()()"]

/**
 * @param Integer $n
 * @return String[]
 */
function generateParenthesis(int $n): array
{
    $opened = [];
    for ($i = $n; $i > 0; $i--) {
        $opened[] = '(';
    }

    return $opened;
}

function generate(int $n, int $position): array
{
    $result = [];
    for ($i = $n; $i > 0; $i--) {

        $result[] = '(';
    }

    return $result;
}

$res = generateParenthesis(5);
print_r($res);