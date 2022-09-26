<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/1
 * Time: 16:59
 */

/**
 * @param $array
 * @param $position
 * @return mixed
 */
function deleteArrayElement($array,$position){
    if (!isset($array[$position])){
        return $array;
    }
    for ($i=$position;$i<count($array);$i++){
        $array[$i] = $array[$i+1];
    }
    array_pop($array);
    return $array;
}

function addArrayElement($array,$position,$value){
    echo 111;
    if ($position>count($array)){
        $array[$position]=$value;
        return $array;
    }
    for ($i=count($array)-1;$i>=$position;$i--){
        $array[$i+1] = $array[$i];
    }
    $array[$position]=$value;
    return $array;
}
$array = [1,2,3,5,6,9];
//$result = deleteArrayElement($array,3);
//var_dump($result);
//var_dump($array);
$result = addArrayElement($array,3,4);
var_dump($result);