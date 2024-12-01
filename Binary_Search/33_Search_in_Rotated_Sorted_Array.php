<?php

// You are given an array of length n which was originally sorted in ascending order. It has now been rotated between 1 and n times. For example, the array nums = [1,2,3,4,5,6] might become:
//
//[3,4,5,6,1,2] if it was rotated 4 times.
//[1,2,3,4,5,6] if it was rotated 6 times.
//Given the rotated sorted array nums and an integer target, return the index of target within nums, or -1 if it is not present.
//
//You may assume all elements in the sorted rotated array nums are unique,

// Алгоритмическая сложность: O(log n)

/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer
 */
function search(array $nums, int $target): int
{
    $startIndex = 0;
    $endIndex = count($nums) - 1;

    while ($startIndex <= $endIndex) {
        $midIndex = $endIndex - floor(($endIndex - $startIndex) / 2);

        $endValue = $nums[$endIndex];
        $midValue = $nums[$midIndex];

        if ($midValue === $target) {
            return $midIndex;
        }

        if ($midValue > $endValue) {
            $startIndex = $midIndex;
        } else {
            $endIndex = $midIndex - 1;
        }
    }

    return -1;
}

$nums = [4,5,6,7,0,1,2];
$target = 0;
$res = search($nums, $target);
var_dump($res);