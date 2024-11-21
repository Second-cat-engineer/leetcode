<?php

// You are given an array of strings tokens that represents an arithmetic expression in a Reverse Polish Notation.
// Evaluate the expression. Return an integer that represents the value of the expression.

// Note that:
// -The valid operators are '+', '-', '*', and '/'.
// -Each operand may be an integer or another expression.
// -The division between two integers always truncates toward zero.
// -There will not be any division by zero.
// -The input represents a valid arithmetic expression in a reverse polish notation.
// -The answer and all the intermediate calculations can be represented in a 32-bit integer.

// Алгоритмическая сложность: O(n).

function evalRPN($tokens)
{
    $operators = ['+', '-', '*', '/'];

    $stack = [];
    foreach ($tokens as $token) {
        if (in_array($token, $operators)) {
            $last = array_pop($stack);
            $prev = array_pop($stack);

            switch ($token) {
                case '+':
                    $res = $last + $prev;
                    break;
                case '-':
                    $res = $prev - $last;
                    break;
                case '*':
                    $res = $prev * $last;
                    break;
                case '/':
                    $res = ceil($prev / $last);
                    break;
            }

            $stack[] = (int)$res;
        } else {
            $stack[] = (int)$token;
        }
    }

    return $stack[0];
}

//$tokens = ["2","1","+","3","*"];
$tokens = ["10","6","9","3","+","-11","*","/","*","17","+","5","+"];
$res = evalRPN($tokens);
var_dump($res);