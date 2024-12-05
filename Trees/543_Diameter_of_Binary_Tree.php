<?php

// Given the root of a binary tree, return the length of the diameter of the tree.
// Учитывая корень двоичного дерева, верните длину диаметра дерева.

// The diameter of a binary tree is the length of the longest path between any two nodes in a tree. This path may or may not pass through the root.
// Диаметр двоичного дерева — это длина самого длинного пути между любыми двумя узлами дерева. Этот путь может проходить через корень, а может и не проходить.

// The length of a path between two nodes is represented by the number of edges between them.
// Длина пути между двумя узлами представлена количеством ребер между ними.

// Алгоритмическая сложность: O(n). - проход по каждому узлу дерева.

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
 * @return Integer
 */
function diameterOfBinaryTree($root): int
{
    $diameter = 0;
    diameter($root, $diameter);
    return $diameter;
}

function diameter($root, &$diameter)
{
    if ($root === null) {
        return 0;
    }

    $leftHeight = diameter($root->left, $diameter);
    $rightHeight = diameter($root->right, $diameter);

    $currentDiameter = $leftHeight + $rightHeight;

    $diameter = max($diameter, $currentDiameter);

    return max($leftHeight, $rightHeight) + 1;
}

$root = new TreeNode(1);
$root->left = new TreeNode(2, new TreeNode(4), new TreeNode(5));
$root->right = new TreeNode(3);
$res = diameterOfBinaryTree($root);
var_dump($res);