<?php

// You are given the root of a binary tree root. Invert the binary tree and return its root.
// Вам дан корень двоичного дерева. Инвертируйте двоичное дерево и верните его корень.

// Алгоритмическая сложность: O(n).

class TreeNode {
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
 * @param ?TreeNode $root
 * @return ?TreeNode
 */
function invertTree(?TreeNode $root): ?TreeNode
{
    if ($root === null) {
        return null;
    }

    invertTree($root->left);
    invertTree($root->right);

    $leftTree = $root->left;
    $root->left = $root->right;
    $root->right = $leftTree;

    return $root;
}

$root = new TreeNode(4);
$root->left = new TreeNode(2, new TreeNode(1), new TreeNode(3));
$root->right = new TreeNode(7, new TreeNode(6), new TreeNode(9));
$res = invertTree($root);
print_r($root);


//function invertTreeArray($rootArray) {
//    $invertRes = [];
//    $invertRes[] = $rootArray[0];
//
//    $index = 1;
//    while ($index < count($rootArray)) {
//        if ($index % 2 === 1) {
//            $invertRes[] = $rootArray[$index + 1];
//            $invertRes[] = $rootArray[$index];
//
//            $index += 2;
//        }
//    }
//
//    return $invertRes;
//}
//$root = [4,2,7,1,3,6,9];
//$invertTree = invertTree($root);
//print_r($invertTree);