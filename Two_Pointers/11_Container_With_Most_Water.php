<?php

// You are given an integer array height of length n. There are n vertical lines drawn such that the two endpoints
// of the ith line are (i, 0) and (i, height[i]).

// Find two lines that together with the x-axis form a container, such that the container contains the most water.
//Return the maximum amount of water a container can store.
//Notice that you may not slant the container.

// Алгоритмическая сложность: O(n)

/**
 * @param Integer[] $height
 * @return Integer
 */
function maxArea(array $height): int
{
    $left = 0;
    $right = count($height) - 1;

    $maxArea = ($right - $left) * min($height[$left], $height[$right]);
    while ($left < $right) {
        $leftValue = $height[$left];
        $rightValue = $height[$right];

        $multiply = ($right - $left) * min($leftValue, $rightValue);
        if ($multiply > $maxArea) {
            $maxArea = $multiply;
        }

        if ($leftValue > $rightValue) {
            $right--;
        } else {
            $left++;
        }
    }

    return $maxArea;
}

$height = [1,8,6,2,5,4,8,3,7];
$maxArea = maxArea($height);
var_dump($maxArea);