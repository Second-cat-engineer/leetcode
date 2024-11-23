<?php

// Given an array of integers nums which is sorted in ascending order, and an integer target, write a function to
// search target in nums. If target exists, then return its index. Otherwise, return -1.

// Алгоритмическая сложность: O(log n)

/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer
 */
function search(array $nums, int $target): int
{
    $start = 0;
    $end = count($nums) - 1;

    while ($start <= $end) {
        $mid = floor(($start + $end) / 2);

        $result = $nums[$mid];

        if ($result === $target) {
            return $mid;
        } elseif ( $result > $target) {
            $end = $mid - 1;
        } else {
            $start = $mid + 1;
        }
    }
    return -1;
}

$res = search([-1,0,3,5,9,12], 9);
var_dump($res);