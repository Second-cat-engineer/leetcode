<?php

// Design an algorithm to encode a list of strings to a single string. The encoded string is then decoded back to the original list of strings.
// Разработайте алгоритм для кодирования списка строк в одну строку. Закодированная строка затем декодируется обратно в исходный список строк.

// Please implement encode and decode

//Example 1:
//Input: ["neet","code","love","you"]
//Output:["neet","code","love","you"]

// сложность: O(n).

/**
 * @param String[] $strs
 * @return string
 */
function encode(array $strs): string
{
    $result = "";
    foreach ($strs as $s) {
        $result .= strlen($s) . "$" . $s;
    }
    return $result;
}

function decode(string $str): array
{
    $result = [];
    $i = 0;
    while ($i < strlen($str)) {
        // Находим позицию разделителя
        $j = strpos($str, "$", $i);
        // Извлекаем длину строки
        $length = (int)substr($str, $i, $j - $i);
        // Извлекаем строку заданной длины
        $result[] = substr($str, $j + 1, $length);
        // Перемещаем указатель на следующую строку
        $i = $j + 1 + $length;
    }
    return $result;
}

$encode = encode(["fneet","code","love","you"]);
var_dump($encode);

$decoded = decode($encode);
var_dump($decoded);