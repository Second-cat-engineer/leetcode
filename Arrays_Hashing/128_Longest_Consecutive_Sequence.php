<?php

// Given an unsorted array of integers nums, return the length of the longest consecutive elements sequence.
// Учитывая несортированный массив целых чисел nums, верните длину самой длинной последовательной последовательности элементов.

// Example 1:
//Input: nums = [100,4,200,1,3,2]
//Output: 4
//Explanation: The longest consecutive elements sequence is [1, 2, 3, 4]. Therefore its length is 4.

// Временная сложность: O(n).

/**
 * @param Integer[] $nums
 * @return Integer
 */
function longestConsecutive(array $nums): int
{
    $hash = [];
    foreach ($nums as $num) {
        $hash[$num] = 1;
    }

    $maxSequence = 0;
    foreach ($nums as $num) {
        $less = $num - 1;
        // чтобы рассмотреть только начало последовательностей.
        if (array_key_exists($less, $hash)) {
            continue;
        }

        $sequenceLength = 1;

        $most = $num + 1;
        while (array_key_exists($most, $hash)) {
            $sequenceLength++;
            $most++;
        }

        if ($sequenceLength > $maxSequence) {
            $maxSequence = $sequenceLength;
        }
    }

    return $maxSequence;
}

$seq = [0,3,7,2,5,8,4,6,0,1];
//$seq = [100,4,200,1,3,2];

$res = longestConsecutive($seq);
var_dump($res);
