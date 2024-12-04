<?php

//Given the root of a binary tree, return its maximum depth.
//A binary tree's maximum depth is the number of nodes along the longest path from the root node down to the farthest leaf node.

// Учитывая корень двоичного дерева, верните его максимальную глубину.
// Максимальная глубина двоичного дерева — это количество узлов на самом длинном пути от корневого узла до самого дальнего листового узла.

// Алгоритмическая сложность: O(n)

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

function maxDepth(?TreeNode $root): int
{
    if ($root === null) {
        return 0;
    }

    $left = 0;
    if ($root->left !== null) {
        $left = maxDepth($root->left);
    }

    $right = 0;
    if ($root->right !== null) {
        $right = maxDepth($root->right);
    }

    $maxDepth = max($left, $right);
    return $maxDepth + 1;
}

$root = new TreeNode(3);
$root->left = new TreeNode(9, new TreeNode(null), new TreeNode(5, new TreeNode(6), new TreeNode(8)));
$root->right = new TreeNode(20, new TreeNode(15), new TreeNode(7));
$res = maxDepth($root);
var_dump($res);