<?php

// Suppose an array of length n sorted in ascending order is rotated between 1 and n times. For example,
// the array nums = [0,1,2,4,5,6,7] might become:
//      [4,5,6,7,0,1,2] if it was rotated 4 times.
//      [0,1,2,4,5,6,7] if it was rotated 7 times.

// Given the sorted rotated array nums of unique elements, return the minimum element of this array.
// Учитывая отсортированные числа уникальных элементов повернутого массива, верните минимальный элемент этого массива.

// Алгоритмическая сложность: O(log n).
/**
 * @param Integer[] $nums
 * @return Integer
 */
function findMin(array $nums)
{
    $startIndex = 0;
    $endIndex = count($nums) - 1;

    while ($startIndex < $endIndex) {
        $midIndex = $endIndex - floor(($endIndex - $startIndex) / 2);

        $endValue = $nums[$endIndex];
        $midValue = $nums[$midIndex];

        if ($midValue > $endValue) {
            $startIndex = $midIndex + 1;
        } else {
            $endIndex = $midIndex - 1;
        }
    }

    return $nums[$startIndex];
}

$nums = [4,5,6,7,0,1,2];
$res = findMin($nums);
var_dump($res);