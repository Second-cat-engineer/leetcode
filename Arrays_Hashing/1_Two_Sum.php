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
    foreach ($nums as $keyOne => $numOne) {
        foreach ($nums as $keyTwo => $numTwo) {
            if ($keyOne === $keyTwo) {
                continue;
            }

            $sum = $numOne + $numTwo;
            if ($sum === $target) {
                return [$keyOne, $keyTwo];
            }
        }
    }

    return [];
}

$res = twoSum([2,11,15,3,6,2,2,4,5,5,5,5,7], 9);
var_dump($res);