<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/2
 * Time: 16:23
 */

//插入排序
//工作原理是通过构建有序序列，对于未排序数据，在已排序序列中从后向前扫描，找到相应位置并插入。插入排序在实现上，通常采用in-place排序（即只需用到O(1)的额外空间的排序），
//因而在从后向前扫描过程中，需要反复把已排序元素逐步向后挪位，为最新元素提供插入空间。
//
//4.1 算法描述
//从第一个元素开始，该元素可以认为已经被排序；
//取出下一个元素，在已经排序的元素序列中从后向前扫描；
//如果该元素（已排序）大于新元素，将该元素移到下一位置；
//重复步骤3，直到找到已排序的元素小于或者等于新元素的位置；
//将新元素插入到该位置后；
//重复步骤2~5。


///**
// * @param $array
// * @return array
// */
//function insertSort($array) {
//    if (count($array)<=1) return $array;
//    for ($i=1;$i<count($array);$i++){
//        $tmp = $array[$i];
//        for ($j=$i-1;$j>=0;$j--){
//            if ($array[$j]>$tmp){
//                $array[$j+1] = $array[$j];
//                $array[$j] = $tmp;
//            }
//        }
//    }
//    return $array;
//}

/**
 * @param $array
 * @return array
 */
function insertSort1($array) {
    $length = count($array);
    if ($length <=1) return $array;
    for ($i=1;$i<$length;$i++){
        $temp = $array[$i];
        for ($j=$i-1;$j>=0;$j--){
            if ($temp<$array[$j]){
                $array[$j+1] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    return $array;
}

function insertSort2($array) {

    $length = count($array);
    if ($length<=1) return $array;
    for ($i=1;$i<$length;$i++){
        $temp = $array[$i];
        for ($j=$i-1;$j>=0;$j--){
            if ($array[$j]>$temp){
                $array[$j+1] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    return $array;
}

function insertSort($array) {
    $length = count($array);
    if ($length<=1) return $array;
    for ($i=1;$i<$length;$i++){
        $temp = $array[$i];
        for ($j=$i-1;$j>=0;$j--){
            if ($array[$j]>$temp){
                $array[$j+1] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    return $array;
}
$arr = [2,1,3,5,8,6,1,9,65,2,4];
//$arr = [1,2,3,5,8,6,1,9,65,2,4]; //i=5 6
$res = insertSort($arr);
var_dump($res);
