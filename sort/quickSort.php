<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/2
 * Time: 16:23
 */

///**
// * @param $array
// * @return array
// */
//function quickSort($array) {
//    $length = count($array);
//    if ($length<=1) return $array;
//    $center = $array[0];
//    $left = $right = [];
//    for ($i=1;$i<$length;$i++){
//        if ($array[$i]>$center){
//            $right[]  = $array[$i];
//        }else{
//            $left[]  = $array[$i];
//        }
//    }
//    $left = quickSort($left);
//    $right = quickSort($right);
//    return array_merge($left,[$center],$right);
//}
$arr = [2,1,3,5,8,6,1,9,65,2,4];

//function quickSort($array){
//    $length = count($array);
//    if ($length<=1) return $array;
//    $center = $array[0];
//    $left = $right = [];
//    for($i=1;$i<$length;$i++) {
//        if ($array[$i]>$center){
//            $right[] = $array[$i];
//        }else{
//            $left[] = $array[$i];
//        }
//    }
//    $right = quickSort($right);
//    $left = quickSort($left);
//    return array_merge($left,[$center],$right);
//}

function quickSort1($array){
    $length = count($array);
    if ($length<=1) return $array;
    $center = $array[0];
    $left = $right = [];
    for ($i=1;$i<$length;$i++){
        if ($array[$i]>$center){
            $right[] = $array[$i];
        }else{
            $left[] = $array[$i];
        }
    }

    $left = quickSort($left);
    $right = quickSort($right);

    return array_merge($left,[$center],$right);
}

function quickSort($array){
    $length = count($array);
    if ($length<=1) return $array;
    $center = $array[0];
    $left = $right = [];
    for ($i=1;$i<$length;$i++){
        if ($center>$array[$i]){
            $left[] = $array[$i];
        }else{
            $right[] = $array[$i];
        }
    }
    $right = quickSort($right);
    $left = quickSort($left);
    return array_merge($left,[$center],$right);
}
$res = quickSort($arr);
var_dump($res);
