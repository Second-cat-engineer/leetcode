<?php

//

/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer
 */
function search(array $nums, int $target): int
{
    $startIndex = 0;
    $endIndex = count($nums) - 1;

    while ($startIndex <= $endIndex) {
        $midIndex = $endIndex - floor(($endIndex - $startIndex) / 2);

        $endValue = $nums[$endIndex];
        $midValue = $nums[$midIndex];

        if ($midValue === $target) {
            return $midIndex;
        }

        if ($midValue > $endValue) {
            $startIndex = $midIndex;
        } else {
            $endIndex = $midIndex - 1;
        }
    }

    return -1;
}

$nums = [4,5,6,7,0,1,2];
$target = 0;
$res = search($nums, $target);
var_dump($res);