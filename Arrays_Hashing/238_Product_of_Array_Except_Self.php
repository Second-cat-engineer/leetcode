<?php

// Given an integer array nums, return an array answer such that answer[i] is equal to the product of all the elements of nums except nums[i].
// Учитывая целочисленный массив nums, верните ответ массива, такой, что ответ[i] равен произведению всех элементов nums, кроме nums[i].

// Example 1:
// Input: nums = [1,2,3,4]
// Output: [24,12,8,6]

// Не самое оптимальное решение, потому что 3 цикла. По сути сложность O(3n), но так как коэффициенты не учитываются,
// то сложность O(n).

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function productExceptSelf(array $nums): array
{
    $count  = count($nums);

    $leftSum = [];
    for ($i = 0; $i < $count; $i++) {
        $prevIndex = $i - 1;
        if (array_key_exists($prevIndex, $leftSum)) {
            $prevNum = $nums[$prevIndex];
            $prevMultiply = $leftSum[$prevIndex];

            $leftSum[$i] = $prevNum * $prevMultiply;
        } else {
            $leftSum[$i] = 1;
        }
    }

    $rightSum = [];
    for ($i = $count - 1; $i >= 0; $i--) {
        $nextIndex = $i + 1;
        if (array_key_exists($nextIndex, $rightSum)) {
            $nextNum = $nums[$nextIndex];
            $nextMultiply = $rightSum[$nextIndex];

            $rightSum[$i] = $nextNum * $nextMultiply;
        } else {
            $rightSum[$i] = 1;
        }
    }

    foreach ($nums as $key => &$num) {
        $num = $leftSum[$key] * $rightSum[$key];
    }

    return $nums;
}

print_r(productExceptSelf([1,2,3,4]));