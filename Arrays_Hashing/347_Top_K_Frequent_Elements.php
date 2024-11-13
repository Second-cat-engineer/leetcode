<?php

// Given an integer array nums and an integer k, return the k most frequent elements. You may return the answer in any order.

// Example 1:
//Input: nums = [1,1,1,2,2,3], k = 2
//Output: [1,2]

// Сложность:
// Подсчет частоты: O(n)
// Сортировка: O(m log m)
// Извлечение первых k элементов: O(k)

// Итоговая сложность: O(n + m log m), где m ≤ n.
// В худшем случае, если каждый элемент массива nums уникален (то есть m=n), общая сложность будет O(n log n).

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer[]
 */
function topKFrequent(array $nums, int $k): array
{
    $hashMap =  [];
    foreach ($nums as $num) {
        if (array_key_exists($num, $hashMap)) {
            ++$hashMap[$num];
        } else {
            $hashMap[$num] = 1;
        }
    }

    arsort($hashMap); // Сортировка desc с сохранением ключей.

    $result = [];
    $start = 1;
    foreach ($hashMap as $num => $value) {
        if ($start > $k) {
            break;
        }

        $result[] = $num;
        $start++;
    }

    return $result;
}

$res = topKFrequent([1,1,1,2,2,3], 2);
var_dump($res);