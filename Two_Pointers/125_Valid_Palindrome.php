<?php

// Given a string s, return true if it is a palindrome, or false otherwise.

// A palindrome is a string that reads the same forward and backward. It is also case-insensitive and ignores all non-alphanumeric characters.
// Палиндром — это строка, которая читается одинаково и вперед, и назад. Он также не учитывает регистр и игнорирует все небуквенно-цифровые символы.

// Example 1:
//Input: s = "Was it a car or a cat I saw?"
//Output: true

// Алгоритмическая сложность: O(n) - два прохода (первый по всей строке, второй по валидной строке)

/**
 * @param String $s
 * @return Boolean
 */
function isPalindrome(string $s): bool
{
    $string = '';
    for ($i = 0; $i < strlen($s); $i++) {
        $validChar = isAlphanumericAscii($s[$i]);
        if ($validChar) {
            $string .= $validChar;
        }
    }

    $left = 0;
    $right = strlen($string) - 1;
    while ($left <= $right) {
        if ($string[$left] !== $string[$right]) {
            return false;
        }
        $left++;
        $right--;
    }

    return true;
}

function isAlphanumericAscii($char): mixed
{
    $asciiCode = ord($char);

    // Цифры 0-9 || Строчные буквы a-z
    if (($asciiCode >= 48 && $asciiCode <= 57) ||($asciiCode >= 97 && $asciiCode <= 122)) {
        return $char;
    }

    // Заглавные буквы A-Z
    if ($asciiCode >= 65 && $asciiCode <= 90) {
        return strtolower($char);
    }

    return null;
}

$result = isPalindrome("Hello olleH");
var_dump($result);