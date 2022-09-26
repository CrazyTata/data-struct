<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/5/5
 * Time: 10:33
 */
//冒泡，插入，选择
//5.5
/*
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
    $length = count($array);
    for ($j=0;$j<$length-1;$j++){
        for ($i=0;$i<$length-1-$j;$i++){
            if ($array[$i]>$array[$i+1]){
                $tmp = $array[$i];
                $array[$i] = $array[$i+1];
                $array[$i+1] = $tmp;
            }
        }
    }
    return $array;
}

//function maopao($arr){
//    $len = count($arr);//获取数组的长度
//    //有多少个数组元素就最多就要排n-1次
//    for ($j=0;$j<$len-1;$j++){
//        $flag = true;//这个flag就是判断有没有进入里面的for,不进去就代表排好了,就直接退出当次循环
//        //没个元素比较的次数,当前面排过 j次时,就以为着这j次肯定是排好的
//        for ($i=0;$i<$len-1-$j;$i++){
//            if($arr[$i]>$arr[$i+1]){
//                $tmp = $arr[$i];
//                $arr[$i] = $arr[$i+1];
//                $arr[$i+1] = $tmp;
//                $flag = false;
//            }
//        }
//        if($flag){
//            break;
//        }
//    }
//    return $arr;
//}

//$arr = [2,1,3,5,8,6,1,9,65,2,4];
//$res = bubble_sort($arr);
//var_dump($res);


//$arr = array(1,3,5,32,756,2,6);
//$len = count($arr);
//for ($i=0;$i<$len-1;$i++){
//    for ($j=$i+1;$j<$len;$j++){
//        if($arr[$i]>$arr[$j]){  //从小到大
//            $p = $arr[$i];
//            $arr[$i] = $arr[$j];
//            $arr[$j]= $p;
//        }
//    }
//}
//var_dump($arr);

//快速排序
function quick_sort($array){
    if(count($array)<=1) return $array;
    $center  = $array[0];
    $left = $right = [];
    for ($i=1;$i<count($array) ;$i++){
        if($center<$array[$i]){
            $right[] = $array[$i];
        }else{
            $left[] = $array[$i];
        }
    }

    $left = quick_sort($left);
    $right = quick_sort($right);

    return array_merge($left,[$center],$right);
}
//
function insert_sort ($array){
    $n = count ($array);
    for ($i = 1; $i < $n; $i++){ //[0,i-1] [i,n]
        $temp = $array[$i];
        for ($j=$i-1;$j>=0;$j--){
            if($array[$j]>$temp){
                $array[$j + 1] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    return $array;
}
//选择排序
function select_sort($array){
    for ($i=0;$i<count($array);$i++){
        $k = $i;
        for ($j=$i+1;$j<count($array);$j++){
            if ($array[$k] > $array[$j]) $k = $j;
        }
        if ($i != $k){
            $tmp = $array[$k];
            $array[$k] = $array[$i];
            $array[$i] = $tmp;
        }
    }
    return $array;
}

//5.6
//冒泡排序
function bubble_sort2($array)
{
    if (count($array) <= 1) {
        return $array;
    }

    for ($i = 0; $i < count($array) - 1; $i++) {
        $flag = true;
        for ($j = 0; $j < count($array) - 1 - $i; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $tmp = $array[$j + 1];
                $array[$j + 1] = $array[$j];
                $array[$j] = $tmp;
                $flag = false;
            }
        }
        if ($flag) {
            return $array;
        }
    }
    return $array;
}
//插入排序
function insert_sort2($array){
    $len = count($array);
    if ($len<=1) return $array;
    for ($i=1;$i<$len;$i++){
        $tmp = $array[$i];
        for ($j = $i-1;$j>=0;$j--){
            if($array[$j]>$tmp){
                $array[$j+1] = $array[$j];
                $array[$j] = $tmp;
            }
        }
    }
    return $array;
}

function quick_sort2($array){
    $len = count($array);
    if ($len<=1) return $array;
    $center = $array[0];
    $left = $right = [];
    for ($i=1;$i<$len;$i++){
        if ($array[$i]>$center){
            $right[] = $array[$i];
        }else{
            $left[] = $array[$i];
        }
    }

    $right = quick_sort2($right);
    $left = quick_sort2($left);
    return array_merge($left,[$center],$right);
}

function select_sort2($array){
    $len = count($array);
    if ($len<=1) return $array;
    for ($i=0;$i<$len-1;$i++){
        $k = $i;
        for ($j=$i+1;$j<$len;$j++){
            if ($array[$j]<$array[$k]) $k = $j;
        }
        if ($k!=$i){
            $tmp = $array[$i];
            $array[$i] = $array[$k];
            $array[$k] = $tmp;
        }

    }
    return $array;
}

function bin_find($array,$left,$right,$find){
    if($left<=$right){

        $mid=floor(($left+$right)/2);//获取中间数

        if($array[$mid]==$find){
            return $mid;
        }else if($array[$mid]<=$find){
            return bin_find($array,$mid+1,$right,$find);
        }else if($array[$mid]>$find){
            return bin_find($array,$left,$mid-1,$find);
        }

    }
    return -1;
}
// 获取数组所有的子集Subset
function powerSet($array) {
    $results = [[]];
    foreach ($array as $element) {
        foreach ($results as $combination) {
            $new = array_merge($combination,array($element));
            !in_array($new,$results) && $results[] = $new;
        }
    }

    return $results;
}


function powerSet1($in,$minLength = 1) {
    $count = count($in);
    $members = pow(2,$count);
    $return = array();
    for ($i = 0; $i < $members; $i++) {
        $b = sprintf("%b",$i);
        echo $b,PHP_EOL;
        $out = array();
        for ($j = 0; $j < $count; $j++) {
            if ($b{$j} == '1') $out[] = $in[$j];
        }
        if (count($out) >= $minLength) {
            $return[] = $out;
        }
    }
    return $return;
}

function order_insert($array,$in){
    $n = count($array);
    if ($array[$n-1]<=$in) {
        array_push($array,2);
        return $array;
    }
    $k=0;
    for ($i=0;$i<$n-1;$i++){
        if ($in>=$array[$i] && $in<=$array[$i+1]){
            $k = $i+1;
            break;
        }
    }

    for ($i=$n-1;$i>$k-1;$i--){
        $tmp = $array[$i];
        $array[$i+1] = $tmp;
    }
    $array[$k] = $in;
    return $array;
}

//5.7
function quick_sort3($array){
    $len = count($array);
    if ($len<=1) return $array;
    $center = $array[0];
    $left = $right = [];
    for ($i=1;$i<$len;$i++){
        if ($center > $array[$i]){
            $left[] = $array[$i];
        }else{
            $right[] = $array[$i];
        }
    }
    $left = quick_sort3($left);
    $right = quick_sort3($right);
    return array_merge($left,[$center],$right);
}

function bubble_sort3($array){
    $len = count($array);
    if ($len<=1) return $array;
    for ($i=0;$i<$len-1;$i++){
        $flag = true;
        for ($j=0;$j<$len-1-$i;$j++){
            if ($array[$j]>$array[$j+1]){
                $tmp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $tmp;
                $flag = false;
            }
        }
        if ($flag) break;
    }
    return $array;
}

function select_sort3($array){
    $len = count($array);
    if ($len<=1) return $array;
    for ($i=0;$i<$len-1;$i++){
        $k = $i;
        for ($j=$i+1;$j<$len;$j++){
            if ($array[$j]<$array[$k]) $k = $j;
        }
        if ($k != $i){
            $tmp = $array[$i];
            $array[$i] = $array[$k];
            $array[$k] = $tmp;
        }
    }
    return $array;
}

function insert_sort3($array){
    $len = count($array);
    if ($len<=1) return $array;
    for ($i=1;$i<$len;$i++){
        $tmp = $array[$i];
        for ($j=$i-1;$j>=0;$j--){
            if ($array[$j]>$tmp){
                $array[$j+1] = $array[$j];
                $array[$j] = $tmp;
            }
        }
    }
    return $array;
}

function power_set3($array){
    $return = [[]];
    foreach ($array as $v){
        foreach ($return as $vv){
            $new = array_merge($vv,[$v]);
            !in_array($new,$return) && $return[] = $new;
        }
    }
    return $return;
}

//5.9

function quick_sort4($array){
    $len = count($array);
    if ($len<=1) return $array;
    $current = $array[0];
    $left = $right = [];
    for ($i=1;$i<$len;$i++){
        if ($array[$i]>$current){
            $right[] = $array[$i];
        }else{
            $left[] = $array[$i];
        }
    }
    $left = quick_sort4($left);
    $right = quick_sort4($right);
    return array_merge($left,[$current],$right);
}

function bubble_sort4($array){
    $len = count($array);
    if ($len<=1) return $array;
    for ($i=0;$i<$len-1;$i++){
        $flag = true;
        for ($j=0;$j<$len-$i-1;$j++){
            if($array[$j]>$array[$j+1]){
                $tmp = $array[$j];
                $array[$j]= $array[$j+1];
                $array[$j+1]= $tmp;
                $flag = false;
            }
        }
        if ($flag){
            break;
        }
    }
    return $array;
}

function insert_sort4($array){
    $len = count($array);
    if ($len<=1) return $array;
    for ($i=1;$i<$len;$i++){
        $tmp = $array[$i];
        for ($j=$i;$j>=0;$j--){
            if ($tmp<$array[$j]){
                $array[$j+1] = $array[$j];
                $array[$j] = $tmp;
            }
        }
    }
    return $array;
}

function select_sort4($array){
    $len = count($array);
    if ($len<=1) return $array;
    for ($i=0;$i<$len-1;$i++){
        $k = $i;
        for ($j=$i+1;$j<$len;$j++){
            if ($array[$j]<$array[$k]) $k = $j;
        }
        if ($k != $i){
            $tmp = $array[$k];
            $array[$k] = $array[$i];
            $array[$i] = $tmp;
        }
    }
    return $array;
}

function power_set4($array,$len=2){
    $return = [[]];
    foreach ($array as $v){
        foreach ($return as $vv){
            $now = array_merge($vv,[$v]);
            !in_array($now,$return) && $return[] = $now;
        }
    }
    return array_values(array_filter($return,function($v) use ($len){
        return count($v)>$len;
    }));
}

function bubble_sort5($array){
    $len = count($array);
    if ($len <=1 ) return $array;
    for ($i=0;$i<=$len-1;$i++){
        $flag = true;
        for ($j=0;$j<$len-$i-1;$j++){
            if ($array[$j]>$array[$j+1]){
                $tmp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $tmp;
                $flag = false;
            }
        }
        if ($flag) break;
    }
    return $array;
}

function quick_sort5($array){
    $len = count($array);
    if ($len <=1 ) return $array;
    $center = $array[0];
    $left = $right = [];
    for ($i=1;$i<$len;$i++){
        if ($array[$i]>$center){
            $right[] = $array[$i];
        }else{
            $left[] = $array[$i];
        }
    }
    $left = quick_sort5($left);
    $right = quick_sort5($right);
    return array_merge($left,[$center],$right);
}

function insert_sort5($array){
    $len = count($array);
    if ($len <=1 ) return $array;
    for ($i=1;$i<$len;$i++){
        $tmp = $array[$i];
        for ($j=$i-1;$j>=0;$j--){
            if ($tmp<$array[$j]){
                $array[$j+1] = $array[$j];
                $array[$j] = $tmp;
            }
        }
    }
    return $array;

}

function select_sort5($array){
    $len = count($array);
    if ($len <=1 ) return $array;
    for ($i=1;$i<$len;$i++){
        $k = $i;
        for ($j=0;$j<$len-$i;$j++){
            if ($array[$j]>$array[$k]) $k = $j;
        }
        if ($i != $k){
            $tmp = $array[$k];
            $array[$k] = $array[$i];
            $array[$i] = $tmp;
        }
    }
    return $array;
}

function quick_sort6($array){
    $len = count($array);
    if ($len<=1) return $array;
    $center = $array[0];
    $left = $right = [];
    for ($i=1;$i<$len;$i++){
        if ($center>$array[$i]){
            $left[] = $array[$i];
        }else{
            $right[] = $array[$i];
        }
    }
    $left = quick_sort6($left);
    $right = quick_sort6($right);
    return array_merge($left,[$center],$right);
}

function bubble_sort6($array){
    $len = count($array);
    if ($len<=1) return $array;
    for ($i=0;$i<$len-1;$i++){
        $flag = true;
        for ($j=0;$j<$len-1-$i;$j++){
            if ($array[$j]>$array[$j+1]){
                $tmp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $tmp;
                $flag = false;
            }
        }
        if ($flag) break;
    }
    return $array;
}

function select_sort6($array){
    $len = count($array);
    if ($len<=1) return $array;

}

function insert_sort6($array){
    $len = count($array);
    if ($len<=1) return $array;
    for ($i=1;$i<$len;$i++){
        $tmp = $array[$i];
        for ($j=$i;$j>=0;$j--){
            if ($array[$j]>$tmp){
                $array[$j+1] = $array[$j];
                $array[$j] = $tmp;
            }
        }
    }
    return $array;
}
//$arr = [1,1,2,4];
//$res = power_set4($arr,1);
//print_r($res);
//
//
//
//
//die;

echo 'aaaaaaa',PHP_EOL;
$arr = [2,1,3,5,8,6,1,9,65,2,4];
$res = insert_sort6($arr);
var_dump($res);


//快速排序
//冒泡排序
//选择排序