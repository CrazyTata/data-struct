<?php
//leetCode 21. 合并两个有序链表

class ListNode {
     public $val = 0;
     public $next = null;
     function __construct($val = 0, $next = null) {
         $this->val = $val;
         $this->next = $next;
     }
}
//var mergeTwoLists = function(l1, l2) {
//    const prehead = new ListNode(-1);
//
//    let prev = prehead;
//    while (l1 != null && l2 != null) {
//        if (l1.val <= l2.val) {
//            prev.next = l1;
//            l1 = l1.next;
//        } else {
//            prev.next = l2;
//            l2 = l2.next;
//        }
//        prev = prev.next;
//    }
//
//    // 合并后 l1 和 l2 最多只有一个还未被合并完，我们直接将链表末尾指向未合并完的链表即可
//    prev.next = l1 === null ? l2 : l1;
//
//    return prehead.next;
//};


function mergeTwoLists(ListNode $list1, ListNode $list2){
    if ($list1==null) return $list2;
    if ($list2==null) return $list1;
    $new = new ListNode(null,null);;

    while ($list1!=null && $list2!=null){
        if ($list1->val>$list2->val){

            $new->next = new ListNode($list2->val,null);

            $list2 = $list2->next;

        }else{

            $new = new ListNode($list1->val,$new);

            $list1 = $list1->next;

        }
    }
    if ($list1!=null){
        $new = new ListNode($list1->val,$new);
    }
    if ($list2!=null){
        $new = new ListNode($list2->val,$new);
    }
    return $new;

}


function mergeTwoLists2($list1, $list2) {
    if($list1 == null) return $list2;
    if($list2 == null) return $list1;
    if($list1->val <= $list2->val){
        $list1->next = $this->mergeTwoLists($list1->next,$list2);
        return $list1;
    } else {
        $list2->next  = $this->mergeTwoLists($list1,$list2->next);
        return $list2;
    }
}


function mergeTwoLists1($l1, $l2)
{
    $dummyHead = new ListNode(null);
    $cur = $dummyHead;
    while ($l1 !== null && $l2 !== null) {
        if ($l1->val <= $l2->val) {
            $cur->next = $l1;
            $l1 = $l1->next;
        } else {
            $cur->next = $l2;
            $l2 = $l2->next;
        }
        $cur = $cur->next;
    }

    if ($l1 !== null) {
        $cur->next = $l1;
    } elseif ($l2 !== null) {
        $cur->next = $l2;
    }

    return $dummyHead->next;
}


$link1 = [1,2,4]; $link2 = [1,3,4];
$linkInfo1 = new ListNode(null,null);
$linkInfo2 = new ListNode(null,null);
foreach ($link1 as $son1){
    $linkInfo1 = new ListNode($son1,$linkInfo1);
}
foreach ($link2 as $son1){
    $linkInfo2 = new ListNode($son1,$linkInfo2);
}

function mergeTwoLists3($l1, $l2){
    $new = new ListNode();
    $head = $new;
    while ($l1 != null && $l2 != null){
        if ($l1->val>$l2->val){
            $new->next =  new ListNode($l2->val);
            $l2 = $l2->next;
        }else{
            $new->next =  new ListNode($l1->val);
            $l1 = $l1->next;
        }
        $new = $new->next;
    }
    if ($l1 !== null) {
        $new->next = new ListNode($l1->val);;
    } elseif ($l2 !== null) {
        $new->next = new ListNode($l2->val);;
    }
    return $head;
}


var_dump(mergeTwoLists1($linkInfo1,$linkInfo2));