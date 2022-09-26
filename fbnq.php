<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/9
 * Time: 11:17
 */

function fbnq1($n){
    if ($n==0||$n==1) return 1;
    return fbnq1($n-1)+fbnq1($n-2);
}
//1 1 2 3 5 8 13
var_dump(fbnq2(12));

function fbnq2($n){
    $return = [];
    for ($i=0;$i<$n;$i++){
        if ($i==0||$i==1) {
            $return[] = 1;
        }else{
            $return[] = $return[$i-1]+$return[$i-2];
        }
    }

    return $return;
}