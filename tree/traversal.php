<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/22
 * Time: 11:24
 */

class treeNode{
    public $value;
    public $left;
    public $right;
    public function __construct($value=null,treeNode $left=null,treeNode $right=null){
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }
}
function postorderTraversal(treeNode $root){
    if ($root==null) return [];
    $a = postorderTraversal($root->left);
    $b = postorderTraversal($root->right);
    $c[] = $root->value;
    return array_merge($a,$b,$c);
}