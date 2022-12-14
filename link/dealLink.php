<?php
class Node {

    public $val;

    public $next;

    /**
    * Initialize your data structure here.
    */
    function __construct($val = null, $next = null) {
        $this->next = $next;
        $this->val = $val;
    }
}

class MyLinkedList1 {

    public $head;

    public $size;

    /**
    * Initialize your data structure here.
    */
    function __construct() {
        $this->head = new Node();
        $this->size = 0;
    }

    /**
    * Get the value of the index-th node in the linked list. If the index is invalid, return -1.
    * @param Integer $index
    * @return Integer
    */
    function get($index) {
        if($index > $this->size - 1){
            return -1;
        }
        $prev = $this->head->next;
        for($i = 0; $i <= $index; $i++){
            if($index == $i){
                return $prev->val;
            }
            $prev = $prev->next;
        }

        return -1;
    }

    /**
    * Add a node of value val before the first element of the linked list. After the insertion, the new node will be the first node of the linked list.
    * @param Integer $val
    * @return NULL
    */
    function addAtHead($val) {
        $prev = $this->head;
        $prev->next = new Node($val, $prev->next);
        $this->size++;
    }

    /**
    * Append a node of value val to the last element of the linked list.
    * @param Integer $val
    * @return NULL
    */
    function addAtTail($val) {
        $size = $this->size; $prev = $this->head;
        for($i = 0; $i < $size; $i++){
            $prev = $prev->next;
        }
        $prev->next = new Node($val,$prev->next);
        $this->size++;
    }

    /**
    * Add a node of value val before the index-th node in the linked list. If index equals to the length of linked list, the node will be appended to the end of linked list. If index is greater than the length, the node will not be inserted.
    * @param Integer $index
    * @param Integer $val
    * @return NULL
    */
    function addAtIndex($index, $val) {
        if($index > $this->size){
            return -1;
        }

        $prev = $this->head;
        for($i = 0; $i < $index; $i++){
            $prev = $prev->next;
        }
        $prev->next = new Node($val, $prev->next);
        $this->size++;
    }

    /**
    * Delete the index-th node in the linked list, if the index is valid.
    * @param Integer $index
    * @return NULL
    */
    function deleteAtIndex($index) {
        if($index > $this->size - 1){
            return -1;
        }
        $prev = $this->head;
        for($i = 0; $i <= $index; $i++){
            if($i == $index){
                $prev->next = $prev->next->next;
            }
            $prev = $prev->next;
        }
        $this->size--;
    }
}
//get(index)????????????????????? index ????????????????????????????????????????????????-1???
//addAtHead(val)?????????????????????????????????????????????????????? val ?????????????????????????????????????????????????????????????????????
//addAtTail(val)???????????? val ????????????????????????????????????????????????
//addAtIndex(index,val)????????????????????? index ??????????????????????????? val  ?????????????????? index ???????????????????????????????????????????????????????????????????????? index ???????????????????????????????????????????????????index??????0??????????????????????????????
//deleteAtIndex(index)??????????????? index ????????????????????????????????? index ????????????
class MyLinkedList {
    /** @var Node  */
    public $head;
    public $length;
    function __construct(Node $head = null, $len = 0) {
        $this->head = $head;
        $this->length = $len;
    }

    public function get($index){
        $current = $this->head;
        for ($i=0;;$i++){
            if ($current == null){
                return -1;
            }
            if ($i == $index){
                return $current->val;
            }
            $current = $current->next;
        }
    }

    public function addAtHead($value){
        return new Node($this->head,$value);
    }

    public function addAtTail($value){
        $newNode = new Node(null,$value);
        $current = $this->head;
        while ($current != null){
            if ($current->next == null){
                $current->next = $newNode;
                return $this->head;
            }
        }
        return null;
    }

    public function addAtIndex($index,$value){
        $current = $this->head;
        for ($i=0;$i<=$index;$i++){
            if ($current == null){
                return $this->head;
            }
            if ($i+1 == $index){
                $newNode = new Node($current->next,$value);
                $current->next = $newNode;
                return $this->head;
            }
            $current = $current->next;
        }
    }

    public function deleteAtIndex($index){
        $current = $this->head;
        for ($i=0;$i<=$index;$i++){
            if ($current == null){
                return $this->head;
            }
            if ($i+1 == $index){
                $current->next = $current->next->next;
                return $this->head;
            }
            $current = $current->next;
        }
    }
}
/**
* Your MyLinkedList object will be instantiated and called as such:
//* $obj = MyLinkedList();
* $ret_1 = $obj->get($index);
* $obj->addAtHead($val);
* $obj->addAtTail($val);
* $obj->addAtIndex($index, $val);
* $obj->deleteAtIndex($index);
*/
 $obj = new MyLinkedList();
// $ret_1 = $obj->get($index);
// $obj->addAtHead(11);
// $obj->addAtHead(22);
 $obj->addAtTail(99);
 $obj->addAtTail(88);
 var_dump($obj);
 $obj->addAtIndex($index, $val);
 $obj->deleteAtIndex($index);
