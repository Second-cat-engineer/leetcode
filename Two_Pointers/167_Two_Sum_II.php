<?php

// Given a 1-indexed array of integers numbers that is already sorted in non-decreasing order, find two numbers such
// that they add up to a specific target number. Let these two numbers be numbers[index1] and numbers[index2]
// where 1 <= index1 < index2 <= numbers.length.

//Return the indices of the two numbers, index1 and index2, added by one as an integer array [index1, index2] of length 2.

// Алгоритмическая сложность: O(n)

/**
 * @param Integer[] $numbers
 * @param Integer $target
 * @return Integer[]
 */
function twoSum(array $numbers, int $target): array
{
    $left = 0;
    $right = count($numbers) -1;

    while ($left < $right) {
        $sum = $numbers[$left] + $numbers[$right];
        if ($sum === $target) {
            return [$left + 1, $right + 1];
        }

        if ($sum > $target) {
            $right--;
        } else {
            $left++;
        }
    }
}

$numbers = [2,7,11,15,22];
$result = twoSum($numbers, 22);
var_dump($result);