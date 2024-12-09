<?php

// Given a binary tree, determine if it is height-balanced
// Учитывая двоичное дерево, определите, является ли оно сбалансированный по высоте.

// Бинарное дерево со сбалансированной высотой — это бинарное дерево, в котором глубина
// двух поддеревьев каждого узла никогда не отличается более чем на единицу.

// Алгоритмическая сложность: O(n) - проход по каждому узлу.

class TreeNode
{
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

/**
 * @param TreeNode $root
 * @return Boolean
 */
function isBalanced($root): bool
{
    $isBalanced = true;
    balanced($root, $isBalanced);
    return $isBalanced;
}

function balanced($root, &$isBalanced)
{
    if ($root === null) {
        return 0;
    }

    $left = balanced($root->left, $isBalanced);
    $right = balanced($root->right, $isBalanced);

    if (abs($left - $right) > 1) {
        $isBalanced = false;
    }

    // Возвращает высоту.
    return max($left, $right) + 1;
}

$tree = [3,9,20,null,null,15,7];
$root = new TreeNode(3);
$root->left = new TreeNode(9, null, null);
$root->right = new TreeNode(20, new TreeNode(15), new TreeNode(7));
$res = isBalanced($root);
var_dump($res);