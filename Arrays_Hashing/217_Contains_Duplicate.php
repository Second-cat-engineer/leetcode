<?php

// Given an integer array nums, return true if any value appears more than once in the array, otherwise return false.
// Учитывая числа целочисленного массива, верните true, если какое-либо значение встречается в массиве более одного раза, в противном случае верните false.

// You should aim for a solution as good or better than O(n) time and O(n) space, where n is the size of the input array.
// Вам следует стремиться к решению, не хуже или лучше, чем время O(n) и пространство O(n), где n — размер входного массива.

/**
 * @param Integer[] $nums
 * @return Boolean
 */
function containsDuplicate($nums) {
    $hash = [];

    foreach ($nums as $num) {
        if (array_key_exists($num, $hash)) {
            return true;
        }
        $hash[$num] = true;
    }

    return false;
}

$existDuplicate = containsDuplicate([1,2,3,3]);
var_dump($existDuplicate);