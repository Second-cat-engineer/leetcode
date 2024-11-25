<?php

// Koko loves to eat bananas. There are n piles of bananas, the ith pile has piles[i] bananas.
// The guards have gone and will come back in h hours.
//
// Koko can decide her bananas-per-hour eating speed of k. Each hour, she chooses some pile of bananas and eats
// k bananas from that pile. If the pile has less than k bananas, she eats all of them instead and will not eat
// any more bananas during this hour.
//
// Koko likes to eat slowly but still wants to finish eating all the bananas before the guards return.

// Example 1:
// Input: piles = [3,6,7,11], h = 8
// Output: 4

// Алгоритмическая сложность: O (n log m).

/**
 * @param Integer[] $piles
 * @param Integer $h
 * @return Integer
 */
function minEatingSpeed(array $piles, int $h): int
{
    $minSpeed = 1;
    $maxSpeed = $piles[0];
    foreach ($piles as $pile) {
        if ($pile > $maxSpeed) {
            $maxSpeed = $pile;
        }
    }

    while ($minSpeed < $maxSpeed) {
        $mid = floor(($minSpeed + $maxSpeed) / 2);

        $time = 0;
        foreach ($piles as $pile) {
            $time += ceil($pile / $mid);
        }

        if ($time <= $h) {
            $maxSpeed = $mid;
        } else {
            $minSpeed = $mid + 1;
        }
    }

    return $minSpeed;
}

$piles = [3,6,7,11];
$minSpeed = minEatingSpeed($piles, 8);
var_dump($minSpeed);