<?php

// You are given an array non-negative integers height which represent an elevation map. Each value height[i]
// represents the height of a bar, which has a width of 1.
// Вам дан массив неотрицательных целых чисел height, который представляет собой карту высот. Каждое значение height[i]
// представляет высоту полосы, ширина которой равна 1.

// Return the maximum area of water that can be trapped between the bars.
// Возвращайте максимальную площадь воды, которая может задерживаться между решетками.

//Example 1:
//Input: height = [0,1,0,2,1,0,1,3,2,1,2,1]
//Output: 6

/**
 * @param Integer[] $height
 * @return Integer
 */
function trap(array $height): int
{
    $maxIndex = count($height) - 1;

    $existInRightBigValue = [];
    $maxValue = 0;
    for ($i = $maxIndex; $i >= 0; $i--) {
        $currentValue = $height[$i];
        if ($maxValue >= $currentValue) {
            $existInRightBigValue[$i] = true;
        } else {
            $existInRightBigValue[$i] = false;
            $maxValue = $currentValue;
        }
    }

    $left = 0;
    $right = $maxIndex;
    $current = 0;

    $s = 0;
    $lessS = 0;
    while ($current <= $right) {
        $leftValue = $height[$left];
        $currentValue = $height[$current];

        if ($leftValue > $currentValue) {
            if ($existInRightBigValue[$left]) {
                $lessS += ($leftValue - $currentValue);
            } else {
                $left = $current;
            }
        } else {
            $s += $lessS;
            $lessS = 0;

            $left = $current;
        }
        $current++;
    }

    return $s;
}

//$height = [0,1,0,2,1,0,1,3,2,1,2,1];
$height = [0,2,0,3,1,0,1,3,2,1];
$res = trap($height);
var_dump($res);