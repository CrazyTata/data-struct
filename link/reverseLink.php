<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/7
 * Time: 10:47
 */

/**
 *
 *
题意：反转一个单链表。
示例: 输入: 1->2->3->4->5->NULL 输出: 5->4->3->2->1->NULL
本题我录制了B站视频，帮你拿下反转链表 | LeetCode：206.反转链表 (opens new window)，相信结合视频在看本篇题解，更有助于大家对链表的理解。
如果再定义一个新的链表，实现链表元素的反转，其实这是对内存空间的浪费。
其实只需要改变链表的next指针的指向，直接将链表反转 ，而不用重新定义一个新的链表，如图所示:
206_反转链表
之前链表的头节点是元素1， 反转之后头结点就是元素5 ，这里并没有添加或者删除节点，仅仅是改变next指针的方向。
那么接下来看一看是如何反转的呢？
我们拿有示例中的链表来举例，如动画所示：（纠正：动画应该是先移动pre，在移动cur）
首先定义一个cur指针，指向头结点，再定义一个pre指针，初始化为null。
然后就要开始反转了，首先要把 cur->next 节点用tmp指针保存一下，也就是保存一下这个节点。
为什么要保存一下这个节点呢，因为接下来要改变 cur->next 的指向了，将cur->next 指向pre ，此时已经反转了第一个节点了。
接下来，就是循环走如下代码逻辑了，继续移动pre和cur指针。
最后，cur 指针已经指向了null，循环结束，链表也反转完毕了。 此时我们return pre指针就可以了，pre指针就指向了新的头结点。
 */
class Node{

    public $data;
    public $next;

    public function __construct($data=null,$next=null){
        $this->data=$data;
        $this->next=$next;
    }
}

//头插法创建一个链表
$linkList=new Node();
for($i=1;$i<=4;$i++){
    $linkList=new Node("aaa{$i}",$linkList);
//    $node=new Node("aaa{$i}",$linkList->next);
//    $node->data="aaa{$i}";//创建新结点$node
//    $node->next=$linkList->next;//$node->next指向头结点->next
//    $linkList->next=$node;//头结点->next指向$node

}
//var_dump($linkList);die;
//function ReverseList($head){
//    $old=$head;//跳过头结点
//    $new=null;
//    $tmp=null;
//    //反转过程
//    while($old!=null){
//        $tmp=$old->next;
//        $old->next=$new;
//        $new=$old;
//        $old=$tmp;
//    }
//    return $new;
//}
//
////var_dump($linkList);die;
//function ReverseList1($head){
//    $pre = new Node();
//    $current = $head;
//    while($current!=null){
//        $temp = $current->next;
//        $current->next = $pre;
//        $pre = $current;
//        $current = $temp;
//    }
//    return $pre;
//}

function ReverseList(Node $head){
    $old = $head;
    $new = new Node();
    while ($old != null){
        $temp = $old->next;
        $old->next = $new;
        $new = $old;
        $old = $temp;
    }
    return $new;
}
ReverseList($linkList);

