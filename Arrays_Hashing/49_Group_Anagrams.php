<?php

// Given an array of strings strs, group all anagrams together into sublists. You may return the output in any order.
// Учитывая массив строк strs, сгруппируйте все анаграммы в подсписки. Вы можете вернуть вывод в любом порядке.

// Example 1:
//Input: strs = ["act","pots","tops","cat","stop"]
//Output: [["act", "cat"],["stop", "pots", "tops"]]

// Временная сложность: O(n⋅k log k), где n — количество строк, а k — средняя длина строки (так как каждая строка сортируется).

/**
 * @param String[] $strs
 * @return String[][]
 */
function groupAnagrams(array $strs): array
{
    $result = [];

    foreach ($strs as $str) {
        $chars = str_split($str); // разбить на массив символов
        sort($chars); // сортировка массива

        $sortedStr = implode('', $chars); // склеивание элементов массива в строку.
        if (!array_key_exists($sortedStr, $result)) {
            $result[$sortedStr] = [];
        }
        $result[$sortedStr][] = $str;
    }

    return array_values($result);
}

$res = groupAnagrams(["eat","tea","tan","ate","nat","bat"]);
var_dump($res);