<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/15
 * Time: 10:40
 */

/**
 * @param String[] $s
 * @return NULL
 */
function reverseString(&$s) {
    $length = count($s);
    if ($length<2) return $s;
    $i=0;
    $j=$length-1;
    while ($i<$j){
        $temp = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $temp;
        $i++;
        $j--;
    }
    return $s;
}
$s = ['h','e','l','l','o','!'];
var_dump(reverseString($s));
