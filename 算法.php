<?php
//本文实例总结了PHP经典算法。分享给大家供大家参考，具体如下：

//1、首先来画个菱形玩玩，很多人学C时在书上都画过，咱们用PHP画下，画了一半。
//思路：多少行for一次，然后在里面空格和星号for一次。
for($i=0;$i<=3;$i++){
    echo str_repeat("&nbsp;",3-$i);
    echo str_repeat("*",$i*2+1);
    echo '<br/>';
}
//2、冒泡排序，C里基础算法，从小到大对一组数排序。
//思路：这题从小到大，第一轮排最小，第二轮排第二小，第三轮排第三小，依次类推……

$arr = array(1,3,5,32,756,2,6);
$len = count($arr);
for ($i=0;$i<$len-1;$i++){
  for ($j=$i+1;$j<$len;$j++){
    if($arr[$i]>$arr[$j]){  //从小到大
      $p = $arr[$i];
      $arr[$i] = $arr[$j];
      $arr[$j]= $p;
    }
  }
}
var_dump($arr);
//3、杨辉三角，用PHP写。

//思路：每一行的第一位和最后一位是1，没有变化，中间是前排一位与左边一排的和，这种算法是用一个二维数组保存，另外有种算法用一维数组也可以实现，一行 一行的输出，有兴趣去写着玩下。

//1
//1   1
//1   2   1
//1   3   3   1
//1   4   6   4   1
//1   5  10  10   5   1

//每行的第一个和最后一个都为1，写了6行
 for($i=0; $i<6; $i++) {
  $a[$i][0]=1;
  $a[$i][$i]=1;
 }
//出除了第一位和最后一位的值，保存在数组中
 for($i=2; $i<6; $i++) {
  for($j=1; $j<$i; $j++) {
   $a[$i][$j] = $a[$i-1][$j-1]+$a[$i-1][$j];
  }
 }
//打印
 for($i=0; $i<6; $i++){
  for($j=0; $j<=$i; $j++) {
  echo $a[$i][$j].'&nbsp;';
  }
  echo '<br/>';
 }
//4、在一组数中，要求插入一个数，按其原来顺序插入，维护原来排序方式。
//思路：找到比要插入数大的那个位置，替换，然后把后面的数后移一位。
$in = 2;
$array = array(1,1,1,3,5,7);
$n = count($array);
if ($array[$n-1]<=$in) {
    array_push($array,2);
    return $array;
}
$k=0;
for ($i=0;$i<$n-1;$i++){
    if ($n>=$array[$i] && $n<=$array[$i+1]){
        $k = $i+1;
        break;
    }
}
$array[$k] = $in;
for ($i=$n-1;$i>$k;$i--){
    $array[$n+1] = $array[$n];
}
var_dump($array);
//如果要插入的数已经最大，直接打印
if($arr[$n-1] < $in) {
  $arr[$n+1] = $in; print_r($arr);
  }
for($i=0; $i<$n; $i++) {
//找出要插入的位置
  if($arr[$i] >= $in){
    $t1= $arr[$i];
    $arr[$i] = $in;
//把后面的数据后移一位
    for($j=$i+1; $j<$n+1; $j++) {
      $t2 = $arr[$j];
      $arr[$j] = $t1;
      $t1 = $t2;
  }
//打印
  print_r($arr);
  die;
  }
}
//5、对一组数进行排序（快速排序算法）。
//思路：通过一趟排序分成两部分，然后递归对这两部分排序，最后合并。

function q($array) {
  if (count($array) <= 1) {return $array;}
//以$key为界，分成两个子数组
  $key = $array[0];
  $l = array();
  $r = array();
//分别进行递归排序，然后合成一个数组
  for ($i=1; $i<count($array); $i++) {
  if ($array[$i] <= $key) { $l[] = $array[$i]; }
  else { $r[] = $array[$i]; }
 }
  $l = q($l);
  $r = q($r);
  return array_merge($l, array($key), $r);
}
$arr = array(1,2,44,3,4,33);
print_r( q($arr) );
//6、在一个数组查找你所需元素（二分查找算法）。
//思路：以数组中某个值为界，再递归进行查找，直到结束。

function find($array, $low, $high, $k){
  if ($low <= $high){
  $mid = intval(($low+$high)/2);
    if ($array[$mid] == $k){
    return $mid;
  }elseif ($k < $array[$mid]){
    return find($array, $low, $mid-1, $k);
    }else{
    return find($array, $mid+1, $high, $k);
    }
  }
  die('Not have...');
}
//test
$array = array(2,4,3,5);
$n = count($array);
$r = find($array,0,$n,5);
//7、合并多个数组，不用array_merge()，题目来于论坛。
//思路：遍历每个数组，重新组成一个新数组。

function t(){
  $c = func_num_args()-1;
  $a = func_get_args();
  //print_r($a);
  for($i=0; $i<=$c; $i++){
    if(is_array($a[$i])){
      for($j=0; $j<count($a[$i]); $j++){
        $r[] = $a[$i][$j];
      }
    } else {
      die('Not a array!');
    }
  }
  return $r;
}
//test
print_r(t(range(1,4),range(1,4),range(1,4)));
echo '<br/>';
$a = array_merge(range(1,4),range(1,4),range(1,4));
print_r($a);
//8、牛年求牛：有一母牛，到4岁可生育，每年一头，所生均是一样的母牛，到15岁绝育，不再能生，20岁死亡，问n年后有多少头牛。（来自论坛）

function t2($n) {
    static $num = 1;
    for($j=1; $j<=$n; $j++){
        if($j>=4 && $j<15) {$num++;t($n-$j);}
        if($j==20){$num--;}
     }
     return $num;
}
//test
echo t2(8);
//====================其他算法=========================

//冒泡排序 （bubble sort） — O(n2)

$data = array(3,5,9,32,2,1,2,1,8,5);
dump($data);
BubbleSort($data);
dump($data);
function BubbleSort(& $arr)
{
$limit = count($arr);
for($i=1; $i<$limit; $i++)
{
  for($p=$limit-1; $p>=$i; $p--)
  {
  if($arr[$p-1] > $arr[$p])
  {
   $temp = $arr[$p-1];
   $arr[$p-1] = $arr[$p];
   $arr[$p] = $temp;
  }
  }
}
}
function dump( $d )
{
echo '<pre>';
print_r($d);
echo '</pre>';
}
//插入排序   （insertion sort）— O(n2)

$data = array(6,13,21,99,18,2,25,33,19,84);
$nums = count($data)-1;
dump( $data );
InsertionSort($data,$nums);
dump( $data );
function InsertionSort(& $arr,$n )
{
for( $i=1; $i<=$n; $i++ )
{
  $tmp = $arr[$i];
  for( $j = $i; $j>0 && $arr[$j-1]>$tmp; $j-- )
  {
  $arr[$j] = $arr[$j-1];
  }
  $arr[$j] = $tmp;
}
}

//希 尔排序   （shell sort）— O(n log n)
$data = array(6,13,21,99,18,2,25,33,19,84);
$nums = count($data);
dump( $data );
ShellSort($data,$nums);
dump( $data );
function ShellSort(& $arr,$n ){
    for( $increment = intval($n/2); $increment > 0; $increment = intval($increment/2) ){
        for( $i=$increment; $i<$n; $i++ ) {
            $tmp = $arr[$i];
            for( $j = $i; $j>= $increment; $j -= $increment ){
                if( $tmp < $arr[ $j-$increment ] )
                    $arr[$j] = $arr[$j-$increment];
                else
                    break;
                $arr[$j] = $tmp;
            }

        }
    }
}

//快 速排序   （quicksort）— O(n log n)

$data = array(6,13,21,99,18,2,25,33,19,84);
dump($data);
//quicks($data,0,count($data)-1);
dump($data);

function QuickSort(& $arr,$left,$right)
{
$l = $left;
$r = $right;
$pivot = intval(($r+$l)/2);
$p = $arr[$pivot];
do
{
    while(($arr[$l] < $p) && ($l < $right))
    $l++;
    while(($arr[$r] > $p) && ($r > $left))
    $r--;
    if($l <= $r){
        $temp = $arr[$l];
        $arr[$l] = $arr[$r];
        $arr[$r] = $temp;
        $l++;
        $r--;
    }
}
while($l <= $r);
if($left < $r)
  QuickSort($arr,$left,$r);
if($l < $right)
  QuickSort($arr,$l,$right);
}
//冒泡排序：两两交换数值，最小的值在最左边，就如最轻的气泡在最上边。对整列数两两交换一次，最小的数在最左边，每次都能得一个在剩下的数中的最小 的数，“冒”出来的数组成一个有序区间，剩下的值组成一无序区间，且有序区间中每一元素值都比无序区间的小。
//快速排序：基准数，左右二个数组，递归调用，合并。
//插入排序：排序区间分成二部分，左边有序，右边无序，从右区间取 第一个元素插入左区间，若此元素比左边区间最右边的元素大，留在原处，若此元素比左 边区间最右边的元素小，则插在最右边元素的原位置，同时最右边元素右移一位，计算器减一，重新和前面的元素比较，直到前面的元素比要插入元素小为止，重复 上述步骤。
//注意区间端点值的处理，及数组的第一个元素下标为0.

//PHP常用排序算法
function bubblesort1 ($array)
{
$n = count ($array);
for ($i = 0; $i < $n; $i++)
{
for ($j = $n - 2; $j >= $i; $j--) //[0,i-1] [i,n-1]
{
if ($array[$j] > $array[$j + 1])
{
$temp = $array[$j];
$array[$j] = $array[$j + 1];
$array [$j + 1] = $temp;
}
}
}
return $array;
}
$array = array (3,6,1,5,9,0,4,6,11);
print_r (bubblesort1 ($array));
echo '<hr>';
function quicksort1 ($array)
{
    $n = count ($array);
    if ($n <= 1) {
        return $array;
    }
    $key = $array['0'];
    $array_r = array ();
    $array_l = array ();
    for ($i = 1; $i < $n; $i++) {
        if ($array[$i] > $key) {
            $array_r[] = $array[$i];
        }else{
            $array_l[] = $array[$i];
        }
    }
    $array_r = quicksort1 ($array_r);
    $array_l = quicksort1 ($array_l);
    $array = array_merge ($array_l, array($key), $array_r);
    return $array;
}
print_r (quicksort1 ($array));
echo '<hr>';
function insertsort ($array){
    $n = count ($array);
    for ($i = 1; $i < $n; $i++){ //[0,i-1] [i,n]
        $j = $i - 1;
        $temp = $array[$i];
        while ($array[$j] > $temp){
            $array[$j + 1] = $array[$j];
            $array[$j] = $temp;
            $j--;
        }
    }
    return $array;
}
print_r (insertsort ($array));

/*
【插入排序（一维数组）】
【基本思想】：每次将一个待排序的数据元素，插入到前面已经排好序的数列中的适当位置，使数列依然有序；直到待排序数据元素 全部插入完为止。
【示例】：
[初始关键字]
J=1(49) [49] 38 65 97 76 13 27 49
J=2(38) [38 49] 65 97 76 13 27 49
J=3(65) [38 49 65] 97 76 13 27 49
J=4(97) [38 49 65 97] 76 13 27 49
J=5(76) [38 49 65 76 97] 13 27 49
J=6(13) [13 38 49 65 76 97] 27 49
J=7(27) [13 27 38 49 65 76 97] 49
J=8(49) [13 27 38 49 49 65 76 97]
*/
function insert_sort($arr){
    $count = count($arr);
    for($i=1; $i<$count; $i++){
        $tmp = $arr[$i];
        $j = $i - 1;
        while($arr[$j] > $tmp){
            $arr[$j+1] = $arr[$j];
            $arr[$j] = $tmp;
            $j--;
        }
    }
    return $arr;
}
/*
【选择排序（一维数组）】
【基 本思想】：每一趟从待排序的数据元素中选出最小（或最大）的一个元素，顺序放在已排好序的数列的最后，直到全部待排序的数据元素排完。
【示例】：
[初 始关键字] [49 38 65 97 76 13 27 49]
第一趟排序后 13 ［38 65 97 76 49 27 49]
第 二趟排序后 13 27 ［65 97 76 49 38 49]
第三趟排序后 13 27 38 [97 76 49 65 49]
第 四趟排序后 13 27 38 49 [49 97 65 76]
第五趟排序后 13 27 38 49 49 [97 97 76]
第 六趟排序后 13 27 38 49 49 76 [76 97]
第七趟排序后 13 27 38 49 49 76 76 [ 97]
最 后排序结果 13 27 38 49 49 76 76 97
*/
function select_sort($arr){
    $count = count($arr);
    for($i=0; $i<$count; $i++){
        $k = $i;
        for($j=$i+1; $j<$count; $j++){
            if ($arr[$k] > $arr[$j]) $k = $j;
        }
        if($k != $i){
            $tmp = $arr[$i];
            $arr[$i] = $arr[$k];
            $arr[$k] = $tmp;
        }
    }
    return $arr;
}
/*
【冒泡排序（一维数组） 】
【基本思想】：两两比较待排序数据元素的大小，发现两个数据元素的次序 相反时即进行交换，直到没有反序的数据元素为止。
【排序过程】：设想被排序的数组R［1..N］垂直竖立，将每个数据元素看作有重量的气泡，根据 轻气泡不能在重气泡之下的原则，
从下往上扫描数组R，凡扫描到违反本原则的轻气泡，就使其向上"漂浮"，如此反复进行，直至最后任何两个气泡都是 轻者在上，重者在下为止。
【示例】：
49 13 13 13 13 13 13 13
38 49 27 27 27 27 27 27
65 38 49 38 38 38 38 38
97 65 38 49 49 49 49 49
76 97 65 49 49 49 49 49
13 76 97 65 65 65 65 65
27 27 76 97 76 76 76 76
49 49 49 76 97 97 97 97
*/
function bubble_sort($array){
$count = count($array);
if ($count <= 0) return false;
for($i=0; $i<$count; $i++){
  for($j=$count-1; $j>$i; $j--){
   if ($array[$j] < $array[$j-1]){
    $tmp = $array[$j];
    $array[$j] = $array[$j-1];
    $array[$j-1] = $tmp;
   }
  }
}
return $array;
}
/*
【快速排序（一 维数组）】
【基本思想】：在当前无序区R[1..H]中任取一个数据元素作为比较的"基准"(不妨记为X)，
用此基准将当前无序区划分为 左右两个较小的无序区：R[1..I-1]和R[I 1..H]，且左边的无序子区中数据元素均小于等于基准元素，
右边的无序子区中数据元素均大 于等于基准元素，而基准X则位于最终排序的位置上，即R[1..I-1]≤X.Key≤R[I 1..H](1≤I≤H)，
当R[1..I-1] 和R[I 1..H]均非空时，分别对它们进行上述的划分过程，直至所有无序子区中的数据元素均已排序为止。
【示例】：
初始关键字 [49 38 65 97 76 13 27 49］
第一次交换后 ［27 38 65 97 76 13 49 49］
第二次交换后 ［27 38 49 97 76 13 65 49］
J向左扫描，位置不变，第三次交换后 ［27 38 13 97 76 49 65 49］
I向右扫描，位置不变，第四次交换后 ［27 38 13 49 76 97 65 49］
J向左扫描 ［27 38 13 49 76 97 65 49］
（一次划分过程）
初始关键字 ［49 38 65 97 76 13 27 49］
一趟排序之后 ［27 38 13］ 49 ［76 97 65 49］
二趟排序之后 ［13］ 27 ［38］ 49 ［49 65］76 ［97］
三趟排序之后 13 27 38 49 49 ［65］76 97
最后的排序结果 13 27 38 49 49 65 76 97
各趟排序之后的状态
*/
function quick_sort($array){
if (count($array) <= 1) return $array;
$key = $array[0];
$left_arr = array();
$right_arr = array();
for ($i=1; $i<count($array); $i++){
  if ($array[$i] <= $key)
   $left_arr[] = $array[$i];
  else
   $right_arr[] = $array[$i];
}
$left_arr = quick_sort($left_arr);
$right_arr = quick_sort($right_arr);
return array_merge($left_arr, array($key), $right_arr);
}
/*打印数组全部内容*/
function display_arr($array){
$len = count($array);
for($i = 0; $i<$len; $i++){
  echo $array[$i].' ';
}
echo '<br />';
}
/*
几种排序算法的比较和选择
1. 选取排序方法需要考虑的因素：
(1) 待排序的元素数目n；
(2) 元素本身信息量的大小；
(3) 关键字的结构及其分布情况；
(4) 语言工具的条件，辅助空间的大小等。
2. 小结：
(1) 若n较小(n <= 50)，则可以采用直接插入排序或直接选择排序。由于直接插入排序所需的记录移动操作较直接选择排序多，因而当记录本身信息量较大时，用直接选择排序较 好。
(2) 若文件的初始状态已按关键字基本有序，则选用直接插入或冒泡排序为宜。
(3) 若n较大，则应采用时间复杂度为O(nlog2n)的排序方法：快速排序、堆排序或归并排序。 快速排序是目前基于比较的内部排序法中被认为是最好的方法。
(4) 在基于比较排序方法中，每次比较两个关键字的大小之后，仅仅出现两种可能的转移，因此可以用一棵二叉树来描述比较判定过程，由此可以证明：当文件的n个关 键字随机分布时，任何借助于"比较"的排序算法，至少需要O(nlog2n)的时间。
(5) 当记录本身信息量较大时，为避免耗费大量时间移动记录，可以用链表作为存储结构。
*/
/*排序测试*/
$a = array('12','4','16','8','13','20','5','32');
echo 'The result of insert sort:';
$insert_a = insert_sort($a);
display_arr($insert_a);
echo 'The result of select sort:';
$select_a = select_sort($a);
display_arr($select_a);
echo 'The result of bubble sort:';
$bubble_a = bubble_sort($a);
display_arr($bubble_a);
echo 'The result of bubble sort:';
$quick_a = quick_sort($a);
display_arr($quick_a);

/**
 * 排列组合
 * 采用二进制方法进行组合的选择，如表示5选3时，只需有3位为1就可以了，所以可得到的组合是 01101 11100 00111 10011 01110等10种组合
 *
 */
function pl($arr,$size=5) {
 $len = count($arr);
 $max = pow(2,$len);
 $min = pow(2,$size)-1;
 $r_arr = array();
 for ($i=$min; $i<$max; $i++){
  $count = 0;
  $t_arr = array();
  for ($j=0; $j<$len; $j++){
  $a = pow(2, $j);
  $t = $i&$a;
  if($t == $a){
   $t_arr[] = $arr[$j];
   $count++;
  }
  }
  if($count == $size){
  $r_arr[] = $t_arr;
  }
 }
 return $r_arr;
 }
$pl = pl(array(1,2,3,4,5,6,7),5);
var_dump($pl);
//递归算法
//阶乘
function f11($n){
  if($n == 1 || $n == 0){
    return 1;
  }else{
    return $n*f($n-1);
  }
}
echo f11(5);
//遍历目录
function iteral1($path){
  $filearr = array();
  foreach (glob($path.'\*') as $file){
    if(is_dir($file)){
      $filearr = array_merge($filearr,iteral($file));
    }else{
      $filearr[] = $file;
    }
  }
  return $filearr;
}
var_dump(iteral1('d:\www\test'));

   /**
     * 获取子集
     */
   function index(array $arr){
    $arr_k = array_keys($arr);//数组键
    $count = count($arr);//数组长度
    $result = [];//子集结果
    $pailies = [];//2进制集合

    $max = pow(2,$count)-1;
    for($i=0;$i<=$max;$i++){
        $str = decbin($i);
        $len = strlen($str);
        $tc_len = $count-$len;
        //填充0
        for($j=$tc_len;$j>0;$j--){
            $str = '0'.$str;
        }
        $pailies[] = $str;
    }
    //通过二进制集合 获取子集
    foreach($pailies as $pailie){
        $subset = [];
        for($n=0;$n<$count;$n++){
            $ar_k = $arr_k[$n];
            if($pailie[$n] == 1){
                $subset[] = $arr[$ar_k];
            }
        }

        $result[] = $subset;
    }

    return $result;
}

//今天完成一个算法的过程中，有几个需求模块，其中就有判断$a数组是否是$b数组的子集，可能最近我写c比较多，直接就用for循环实现了，但是感觉代码量比较大，不够优雅！在qq群里集思广益了一下，发现很多php提供的系统功能函数都是可以供调用的，这里记录一下
//
//需求
//
//最少的时间复杂度判断$a数组是否是$b数组的子集
//
//[php]

// 快速的判断$a数组是否是$b数组的子集

$a = array(135,138);

$b = array(135,138,137);

// 快速的判断$a数组是否是$b数组的子集

$a = array(135,138);

$b = array(135,138,137);

//实现方法
//
//这里介绍三种方法，思路其实是相同的，差别在于实现的代码上
//
//for循环遍历
//
//[php]

$flag = 1;

foreach ($a as $va) {

    if (in_array($va, $b)) {

        continue;

    }else {

        $flag = 0;

        break;

    }

}

if ($flag) {

    echo "Yes";

}else {

    echo "No";

}

$flag = 1;

foreach ($a as $va) {

    if (in_array($va, $b)) {

        continue;

    }else {

        $flag = 0;

        break;

    }

}

if ($flag) {

    echo "Yes";

}else {

    echo "No";

}



