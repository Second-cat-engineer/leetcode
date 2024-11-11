<?php

// Given two strings s and t, return true if the two strings are anagrams of each other, otherwise return false.
// Учитывая две строки s и t, верните true, если эти две строки являются анаграммами друг друга, в противном случае верните false.

// An anagram is a string that contains the exact same characters as another string, but the order of the characters can be different.
// Анаграмма — это строка, содержащая те же символы, что и другая строка, но порядок символов может быть другим.

function isAnagram($s, $t) {
    if (strlen($s) !== strlen($t)) {
        return false;
    }

//    $sChars = [];
//    $tChars = [];

    $result = 0;

    for ($i = 0; $i < strlen($s); $i++) {
        $sChar = $s[$i];
        $tChar = $t[$i];

        $result += ord($sChar);
        $result -= ord($tChar);

//        if (array_key_exists($sChar, $sChars)) {
//            $sChars[$sChar] += 1;
//        } else {
//            $sChars[$sChar] = 1;
//        }
//
//        if (array_key_exists($tChar, $tChars)) {
//            $tChars[$tChar] += 1;
//        } else {
//            $tChars[$tChar] = 1;
//        }
    }

//    return $sChars == $tChars;
    return $result === 0;
}

$res = isAnagram("racfecar", "carfrace");
var_dump($res);