<?php

// You are given an m x n integer matrix matrix with the following two properties:
//   - Each row is sorted in non-decreasing order.
//   - The first integer of each row is greater than the last integer of the previous row.
// Given an integer target, return true if target is in matrix or false otherwise

// алгоритмическая сложность: O (n log m)
/**
 * @param Integer[][] $matrix
 * @param Integer $target
 * @return Boolean
 */
function searchMatrix(array $matrix, int $target): bool
{
    foreach ($matrix as $row) {
        $exist = search($row, $target);
        if ($exist !== -1) {
            return true;
        }
    }

    return false;
}

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

$matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]];
$target = 3;

$exist = searchMatrix($matrix, $target);
var_dump($exist);