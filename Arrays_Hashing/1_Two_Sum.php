<?php

// Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.
// Учитывая массив целых чисел nums и целочисленную цель, верните индексы двух чисел так, чтобы их сумма составляла целевое значение.

// You may assume that each input would have exactly one solution, and you may not use the same element twice.
// Вы можете предположить, что каждый вход будет иметь ровно одно решение, и вы не можете использовать один и тот же элемент дважды.

// You can return the answer in any order.
// Вы можете вернуть ответ в любом порядке.

//Input: nums = [2,7,11,15], target = 9
//Output: [0,1]
//Explanation: Because nums[0] + nums[1] == 9, we return [0, 1].

/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer[]
 */
function twoSum(array $nums, int $target): array
{
    $count = count($nums);

    for ($i = 0; $i < $count; $i++) {
        $numOne = $nums[$i];

        for ($j = $i + 1; $j < $count; $j++) {
            $numTwo = $nums[$j];

            $sum = $numOne + $numTwo;
            if ($sum === $target) {
                return [$i, $j];
            }
        }
    }

    return [];
}

$res = twoSum([2,11,15,3,7], 9);
var_dump($res);