<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/2
 * Time: 16:23
 */

// 选择排序
//工作原理：首先在未排序序列中找到最小（大）元素，存放到排序序列的起始位置，然后，再从剩余未排序元素中继续寻找最小（大）元素，然后放到已排序序列的末尾。
//以此类推，直到所有元素均排序完毕。
//3.1 算法描述
//n个记录的直接选择排序可经过n-1趟直接选择排序得到有序结果。具体算法描述如下：
//初始状态：无序区为R[1…n]，有序区为空；
//第i趟排序(i=1,2,3…n-1)开始时，当前有序区和无序区分别为R[1…i-1]和R(i…n）。该趟排序从当前无序区中-选出关键字最小的记录 R[k]，将它与无序区的第1个记录R交换，使R[1…i]和R[i+1…n)分别变为记录个数增加1个的新有序区和记录个数减少1个的新无序区；
//n-1趟结束，数组有序化了。

/**
 * @param $array
 * @return array
 */
//function selectSort($array) {
//    if (count($array)<=1) return $array;
//    for ($i=0;$i<count($array);$i++){
//        $minKey = $i;
//        for ($j=$i+1;$j<count($array);$j++){
//            if ($array[$j]<$array[$minKey]){
//                $minKey = $j;
//            }
//        }
//        if ($i != $minKey){
//            $temp = $array[$i];
//            $array[$i] = $array[$minKey];
//            $array[$minKey] = $temp;
//        }
//    }
//
//    return $array;
//
//}

function selectSort1($array){
    $length = count($array);
    if ($length<=1) return $array;
    for ($i=0;$i<$length;$i++){
        $min = $i;
        for ($j=$i+1;$j<$length;$j++){
            if ($array[$j]<$array[$min]){
                $min = $j;
            }
        }
        if ($min != $i){
            $temp = $array[$i];
            $array[$i] = $array[$min];
            $array[$min] =$temp ;
        }
    }
    return $array;
}
function selectSort2($array){
    $length = count($array);
    if ($length<=1) return $array;
    for ($i=0;$i<$length;$i++){
        $min = $i;
        for ($j=$i+1;$j<$length;$j++){
            if ($array[$j]<$array[$min]){
                $min = $j;
            }
        }
        if ($min != $i){
            $temp = $array[$i];
            $array[$i] = $array[$min];
            $array[$min] = $temp;
        }
    }
    return $array;
}
function selectSort($array){
    $length = count($array);
    if ($length<=1) return $array;
    for ($i=0;$i<$length;$i++){
        $min = $i;
        for ($j=$i+1;$j<$length;$j++){
            if ($array[$j]<$array[$min]){
                $min = $j;
            }
        }
        if ($min!=$i){
            $temp = $array[$min];
            $array[$min] = $array[$i];
            $array[$i] = $temp;
        }
    }
    return $array;
}
$arr = [2,1,3,5,8,6,1,9,65,2,4];
$res = selectSort($arr);
var_dump($res);
