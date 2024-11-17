<?php

// Determine if a 9 x 9 Sudoku board is valid. Only the filled cells need to be validated according to the following rules:
// Определите, действительна ли доска для судоку 9 x 9. Только заполненные ячейки должны быть проверены в соответствии со следующими правилами:

// 1. Each row must contain the digits 1-9 without repetition.
// Каждая строка должна содержать цифры от 1 до 9 без повторений.

// 2. Each column must contain the digits 1-9 without repetition.
// Каждый столбец должен содержать цифры 1–9 без повторений.

// 3. Each of the nine 3 x 3 sub-boxes of the grid must contain the digits 1-9 without repetition.
// Каждый из девяти подполей сетки размером 3 x 3 должен содержать цифры 1–9 без повторения.

// Алгоритмическая сложность O(1). Так как размер фиксирован.

/**
 * @param String[][] $board
 * @return Boolean
 */
function isValidSudoku($board): bool
{
    $rows = array_fill(0, 9, []);
    $cols = array_fill(0, 9, []);
    $boxes = array_fill(0, 9, []);

    foreach ($board as $rowIndex => $row) {
        foreach ($row as $columnIndex => $value) {
            if ($value === '.') {
                continue;
            }

            $boxIndex = (int)($rowIndex / 3) * 3 + (int)($columnIndex / 3);
            if (array_key_exists($value, $boxes[$boxIndex])) {
                return false;
            }
            $boxes[$boxIndex][$value] = $value;

            if (array_key_exists($value, $rows[$rowIndex])) {
                return false;
            }
            $rows[$rowIndex][$value] = $value;

            if (array_key_exists($value, $cols[$columnIndex])) {
                return false;
            }
            $rows[$columnIndex][$value] = $value;
        }
    }

    return true;
}

$board = [
    ["5","3",".",".","7",".",".",".","."],
    ["6",".",".","1","9","5",".",".","."],
    [".","9","8",".",".",".",".","6","."],
    ["8",".",".",".","6",".",".",".","3"],
    ["4",".",".","8",".","3",".",".","1"],
    ["7",".",".",".","2",".",".",".","6"],
    [".","6",".",".",".",".","2","8","."],
    [".",".",".","4","1","9",".",".","5"],
    [".",".",".",".","8",".",".","7","9"]
];
$res = isValidSudoku($board);
var_dump($res);