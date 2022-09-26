<?php
/*function squares($start, $stop) {
if ($start < $stop) {
for ($i = $start; $i <= $stop; $i++) {
yield $i => $i * $i;
}
} else {
for ($i = $start; $i >= $stop; $i--) {
yield $i => $i * $i; //迭代生成数组： 键=》值
}
}
}
foreach (squares(3, 15) as $n => $square) {
echo $n . 'squared is' . $square . "<br>";
}*/


/*$resutl = order([1,22,3,44,2,666,74,745,7,8,4,5]);
var_dump($resutl);*/
//不定传参做多态
/*function args(...$arg){
if (count($arg)==2) {
return "doDealTwoProblem";
}elseif(count($arg)==3){
return "doDealThreeProblem";
}else{
return $arg;
}
}
$echo = args(['a','b','c','d']);
var_dump($echo);*/




//---------------------------------------
//       常用数据结构
//---------------------------------------
//线性表的删除(数组实现)
function delete_array_element($arr,$pos){
    $length = count($arr);
    if($pos<1 || $pos>$length){
        return "删除位置出错!";
    }
    for($i=$pos-1;$i<$length-1;$i++){
        $arr[$i] = $arr[$i+1];
    }
    array_pop($arr);
    return $arr;
}

function add_array_element($arr,$pos,$data){
    $length = count($arr);
    if($pos<1 || $pos>$length){
        return "添加位置出错!";
    }
    $arrTmp = $arr;
    $arr[$pos] = $data;
    for($i=$pos+1;$i<$length+1;$i++){
        $arr[$i] = $arrTmp[$i-1];
    }
    return $arr;
}


$pos = 3;
//echo "<br/>除第{$pos}位置上的元素后：";
//echo implode(' ',delete_array_element($arr,$pos))."<br/>";

/**
* Class Node
* PHP模拟链表的基本操作
*/
class Node{
    public $data = '';
    public $next = null;
}
//初始化
function init($linkList){
    $linkList->data = 0; //用来记录链表长度
    $linkList->next = null;
}
//头插法创建链表
function createHead(&$linkList,$length){
    for($i=0;$i<$length;$i++){
        $newNode = new Node();
        $newNode->data = $i;
        $newNode->next = $linkList->next;//因为PHP中对象本身就是引用所以不用再可用“&”
        $linkList->next = $newNode;
        $linkList->data++;
    }
}
//尾插法创建链表
function createTail(&$linkList,$length){
    $r = $linkList;
    for($i=0;$i<$length;$i++){
        $newNode = new Node();
        $newNode->data = $i;
        $newNode->next = $r->next;
        $r->next = $newNode;
        $r = $newNode;
        $linkList->data++;
    }
}
//在指定位置插入指定元素
function insert($linkList,$pos,$elem){
    if($pos<1 && $pos>$linkList->data+1){
        echo "插入位置错误！";
    }
    $p = $linkList;
    for($i=1;$i<$pos;$i++){
        $p = $p->next;
    }
    $newNode = new Node();
    $newNode->data = $elem;
    $newNode->next = $p->next;
    $p->next = $newNode;
}
//删除指定位置的元素
function delete($linkList,$pos){
    if($pos<1 && $pos>$linkList->data+1){
        echo "位置不存在！";
    }
    $p = $linkList;
    for($i=1;$i<$pos;$i++){
        $p = $p->next;
    }
    $q = $p->next;
    $p->next = $q->next;
    unset($q);
    $linkList->data--;
}
//输出链表数据
function show($linkList){
    $p = $linkList->next;
    while($p!=null){
        echo $p->data." ";
        $p = $p->next;
    }
    echo '<br/>';
}
//$linkList = new Node();
//init($linkList);//初始化
//createTail($linkList,10);//尾插法创建链表
//show($linkList);//打印出链表
//
//insert($linkList,3,'a');//插入
//show($linkList);
//delete($linkList,3);//删除
//show($linkList);



/**
* Class Deque
* 使用PHP实现双向队列
*/
//class Deque{
//    private $queue = array();
//    public function addFirst($item){//头入队
//        array_unshift($this->queue,$item);
//    }
//    public function addLast($item){//尾入队
//        array_push($this->queue,$item);
//    }
//    public function removeFirst(){//头出队
//        array_shift($this->queue);
//    }
//    public function removeLast(){//尾出队
//        array_pop($this->queue);
//    }
//    public function show(){//打印
//        foreach($this->queue as $item){
//            echo $item." ";
//        }
//        echo "<br/>";
//    }
//}
//$deque = new Deque();
//$deque->addFirst(2);
//$deque->addLast(3);
//$deque->addLast(4);
//$deque->addFirst(5);
//$deque->show();

//PHP解决约瑟夫环问题
//方法一
function joseph_ring($n,$m){
    $arr = range(1,$n);
    $i = 0;
    while(count($arr)>1){
        $i=$i+1;
        $head = array_shift($arr);
        if($i%$m != 0){ //如果不是则重新压入数组
            array_push($arr,$head);
        }
    }
    return $arr[0];
}
//方法二
function joseph_ring2($n,$m){
    $r = 0;
    for($i=2;$i<=$n;$i++){
        $r = ($r+$m)%$i;
    }
    return $r + 1;
}
echo "<br/>".joseph_ring(60,5)."<br/>";
echo "<br/>".joseph_ring2(60,5)."<br/>";



//PHP输出多个元素的排列或组合的方法

$arr = array('a','b','c','d');
$result = array();
$t = getCombinationToString($arr, 1);
print_r($t);
$t = getCombinationToString($arr, 2);
$t2 = getUnique($t);
print_r($t2);
$t = getCombinationToString($arr, 3);
$t2 = getUnique($t);
print_r($t2);
$t = getCombinationToString($arr, 4);
$t2 = getUnique($t);
print_r($t2);

function getUnique($t){
    $t2 = array();
    //print_r($t);
    for($i=0;$i<count($t);$i++){
        $count_list = array_count_values($t[$i]);
        $flag = 1;
        foreach($count_list as $ck=>$cv){
            if($cv>1){
                $flag = 0;
                break;
            }
        }
        if($flag){
            sort($t[$i]);
            $flag2 = 1;
            if($t2){
                foreach($t2 as $t2k=>$t2v){
                    if($t[$i]==$t2v){
                        $flag2 = 0;
                        break;
                    }
                }
            }
            if($flag2){
                $t2[] = $t[$i];
            }
        }
    }
    return $t2;
}

function getCombinationToString($arr, $m) {
    if ($m ==1) {
        return $arr;
    }
    $result = array();

    $tmpArr = $arr;
    unset($tmpArr[0]);
    for($i=0;$i<count($arr);$i++) {
        $s = $arr[$i];
        $ret = getCombinationToString(array_values($tmpArr), ($m-1), $result);

        foreach($ret as $row) {
            //$result[] = $s . $row;
            $temp = array();
            $temp[] = $s;
            if(is_array($row)){
                $temp = array_merge($temp,$row);
            }else{
                $temp[] = $row;
            }
            sort($temp);
            $result[] = $temp;
        }
    }
    return $result;
}

$source = array('pll','我','爱','你','嘿');
sort($source); //保证初始数组是有序的
$last = count($source) - 1; //$source尾部元素下标
$x = $last;
$count = 1; //组合个数统计
echo implode(',', $source), "<br>"; //输出第一种组合
while (true) {
    $y = $x--; //相邻的两个元素
    if ($source[$x] < $source[$y]) { //如果前一个元素的值小于后一个元素的值
        $z = $last;
        while ($source[$x] > $source[$z]) { //从尾部开始，找到第一个大于 $x 元素的值
            $z--;
        }
        /* 交换 $x 和 $z 元素的值 */
        list($source[$x], $source[$z]) = array($source[$z], $source[$x]);
        /* 将 $y 之后的元素全部逆向排列 */
        for ($i = $last; $i > $y; $i--, $y++) {
            list($source[$i], $source[$y]) = array($source[$y], $source[$i]);
        }
        echo implode(',', $source), "<br>"; //输出组合
        $x = $last;
        $count++;
    }
    if ($x == 0) { //全部组合完毕
        break;
    }
}
echo 'Total: ', $count, "\n";