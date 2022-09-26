<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/9
 * Time: 14:37
 */
// Definition for a singly-linked list.
  class Node {
     public $val = 0;
      public $next = null;
      function __construct($val = 0,Node $next = null) {
          $this->val = $val;
          $this->next = $next;
      }
  }


function swapPairs($head) {
    //特殊情况
    if($head==null||$head->next==null)   return $head;
    $dummyHead=new ListNode(null);//虚拟头结点
    $p=$dummyHead;//交换节点的前一个节点
    $node1=$head;//交换的第一个节点
    $node2=$head->next;//交换的第二个节点

    while($node2!=null){//当存在第二个节点时一直循环
        $node1->next=$node2->next;
        $node2->next=$node1;
        $p->next=$node2;
        $p=$node1;
        $node1=$p->next;
        $node2=$node1?$node1->next:null;
    }

    return $dummyHead->next;

}

function swapPairs1(Node $head) {
    if ($head==null||$head->next==null) return $head;
    $dummyNode = new Node();
    $current = $dummyNode;
    $node1= $head;
    $node2= $head->next;
    while ($node1!=null &&$node2!=null){
        $node1->next = $node2->next;
        $node2->next = $node1;
        $current->next = $node2;
        $current = $node1;
        $node1 = $current->next;
        $node2=$node1?$node1->next:null;
    }
    return $dummyNode->next;
}