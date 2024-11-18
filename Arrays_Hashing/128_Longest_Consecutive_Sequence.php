<?php

// Given an unsorted array of integers nums, return the length of the longest consecutive elements sequence.
// Учитывая несортированный массив целых чисел nums, верните длину самой длинной последовательной последовательности элементов.

// Example 1:
//Input: nums = [100,4,200,1,3,2]
//Output: 4
//Explanation: The longest consecutive elements sequence is [1, 2, 3, 4]. Therefore its length is 4.

/**
 * @param Integer[] $nums
 * @return Integer
 */
function longestConsecutive(array $nums): int
{
    $hash = [];

    $maxSequence = 0;
    foreach ($nums as $num) {
        if (!array_key_exists($num, $hash)) {
            $hash[$num] = 0;
        }

        $sequenceLength = 1;
        $less = $num - 1;
        $existLess = array_key_exists($less, $hash);
        while ($existLess) {
            $sequenceLength++;

            --$less;
            $existLess = array_key_exists($less, $hash);
        }

        $most = $num + 1;
        $existMost = array_key_exists($most, $hash);
        while ($existMost) {
            $sequenceLength++;

            ++$most;
            $existMost = array_key_exists($most, $hash);
        }

        if ($sequenceLength > $maxSequence) {
            $maxSequence = $sequenceLength;
        }
    }

    return $maxSequence;
}

//$seq = [0,3,7,2,5,8,4,6,0,1];
$seq = [100,4,200,1,3,2];

$res = longestConsecutive($seq);
var_dump($res);
