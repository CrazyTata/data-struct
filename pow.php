<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/9
 * Time: 11:17
 */
//1.暴力遍历
function pow1($x,$n){
    if ($x==0||$x==1) return $x;
    if ($n==0) return 1;
    if ($n < 0) {
        //复数
        $n = -$n;
        $x = 1/$x;
    }
     $res = 1;

     for ($i = 0; $i < $n; $i++) {
         $res *= $x;
     }
     return $res;
}

function pow2($x,$n){
    if ($x==0||$x==1) return $x;
    if ($n==0) return 1;
    if ($n < 0) {
        //复数
        $n = -$n;
        $x = 1/$x;
    }

    //2.分治递归
    $self = pow1($x, floor($n/2));

    if ($n % 2 > 0) {
        //奇数
        return $self * $self * $x;
    } else {
        //偶数
        return $self * $self;
    }

}


function pow3($x,$n){
    if ($x==0||$x==1) return $x;
    if ($n==0) return 1;
    if ($n < 0) {
        //复数
        $n = -$n;
        $x = 1/$x;
    }
    return pow3($x, $n - 1) * $x;
}

function pow4($x,$n){
    if ($x==0||$x==1) return $x;
    if ($n==0) return 1;
    if ($n < 0) {
        //复数
        $n = -$n;
        $x = 1/$x;
    }

    if ($n % 2 == 1) {
        return pow4($x, $n / 2) * pow4($x, $n / 2)*$x;
    }
    return pow4($x, $n / 2) * pow4($x, $n / 2);

}

function pow5($x,$n){
    if ($n == 0) {
        return 1;
    }
    $t = pow5($x, floor($n / 2));// 这里相对于function3，是把这个递归操作抽取出来
    if ($n % 2 == 1) {
        return $t * $t * $x;
    }
    return $t * $t;

}



var_dump(pow5(2,10));