<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/2
 * Time: 16:23
 */



/**
 * @param $array
 * @return array
 */
//function bubbleSort($array) {
//    for ($i=0;$i<count($array)-1;$i++){
//        for ($j=0;$j<count($array)-$i-1;$j++){
//            if ($array[$j]>$array[$j+1]){
//                $tmp = $array[$j];
//                $array[$j] = $array[$j+1];
//                $array[$j+1] = $tmp;
//            }
//        }
//    }
//    return $array;
//}

function bubbleSort1($array){
    $length = count($array);
    if ($length<=1) return $array;
    for ($i=0;$i<$length-1;$i++){
        $flag = true;
        for ($j=0;$j<$length-$i-1;$j++){
            if($array[$j]>$array[$j+1]){
                $tmp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $tmp;
                $flag = false;
            }
        }
        if ($flag){
            break;
        }
    }
    return $array;
}
function bubbleSort($array){
    $length = count($array);
    for ($i=0;$i<$length;$i++){
        for ($j=0;$j<$length-$i-1;$j++){
            if ($array[$j]>$array[$j+1]){
                $temp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $temp;
            }
        }
    }
    return $array;
}
$arr = [1,3,2,5,8,6,1,9,65,2,4];
$res = bubbleSort($arr);
var_dump($res);
