<?php


// Given an integer array nums, return all the triplets [nums[i], nums[j], nums[k]] such that i != j, i != k, and j != k, and nums[i] + nums[j] + nums[k] == 0.
// Дан массив целых чисел nums, вернуть все триплеты, [nums[i], nums[j], nums[k]] где nums[i] + nums[j] + nums[k] == 0, а индексы i, j и k все различны.

// Notice that the solution set must not contain duplicate triplets.
// Notice that the solution set must not contain duplicate triplets.

// Алгоритмическая сложность: O(n ** 2)

/**
 * @param Integer[] $nums
 * @return Integer[][]
 */
function threeSum(array $nums): array
{
    sort($nums); // O(n ** 2)

    $result = [];
    $n = count($nums);

    for ($i = 0; $i < $n; $i++) {
        if ($i > 0 && $nums[$i] === $nums[$i - 1]) {
            continue;
        }

        $left = $i + 1;
        $right = $n - 1;

        while ($left < $right) {
            $sum = $nums[$i] + $nums[$left] + $nums[$right];

            if ($sum === 0) {
                $result[] = [$nums[$i], $nums[$left], $nums[$right]];

                while ($left < $right && $nums[$left] === $nums[$left + 1]) {
                    $left++;
                }
                while ($left < $right && $nums[$right] === $nums[$right - 1]) {
                    $right--;
                }

                $left++;
                $right--;

            } elseif ($sum < 0) {
                $left++;
            } else {
                $right--;
            }
        }
    }

    return $result;
}

$res = threeSum([-1,0,1,2,-1,-4]);
print_r($res);
