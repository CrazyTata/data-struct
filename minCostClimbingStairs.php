<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/16
 * Time: 17:46
 */
//给你一个整数数组 cost ，其中 cost[i] 是从楼梯第 i 个台阶向上爬需要支付的费用。一旦你支付此费用，即可选择向上爬一个或者两个台阶。
//
//你可以选择从下标为 0 或下标为 1 的台阶开始爬楼梯。
//
//请你计算并返回达到楼梯顶部的最低花费。
//示例 1：
//
//输入：cost = [10,15,20]
//输出：15
//解释：你将从下标为 1 的台阶开始。
//- 支付 15 ，向上爬两个台阶，到达楼梯顶部。
//总花费为 15 。
//示例 2：
//
//输入：cost = [1,100,1,1,1,100,1,1,100,1]
//输出：6
//解释：你将从下标为 0 的台阶开始。
//- 支付 1 ，向上爬两个台阶，到达下标为 2 的台阶。
//- 支付 1 ，向上爬两个台阶，到达下标为 4 的台阶。
//- 支付 1 ，向上爬两个台阶，到达下标为 6 的台阶。
//- 支付 1 ，向上爬一个台阶，到达下标为 7 的台阶。
//- 支付 1 ，向上爬两个台阶，到达下标为 9 的台阶。
//- 支付 1 ，向上爬一个台阶，到达楼梯顶部。
//总花费为 6 。
//

function fbnq1($n){

    if ($n==2||$n==1) return 1;

    return fbnq1($n-1)+fbnq1($n-2);
}

function fbnq2($n){
    $return = [];
    for ($i=0;$i<$n;$i++){
        if ($i==0||$i==1){
            array_push($return,1);
        }else{
            array_push($return,$return[$i-1]+$return[$i-2]);
        }
    }
    return $return;
}
//var_dump(fbnq1(12));



/**
 * @param Integer[] $cost
 * @return Integer
 */
function minCostClimbingStairs($cost) {
    $dp=[];//状态转移数组
    $dp[0]=$cost[0];
    $dp[1]=$cost[1];
    $costLen=count($cost);
    for($i=2;$i<$costLen;$i++){
        $dp[$i]=min($dp[$i-2]+$cost[$i],$dp[$i-1]+$cost[$i]);//状态转移
    }

    return min($dp[$costLen-2],$dp[$costLen-1]);
}

function minCostClimbingStairs2($cost){
    $costInfo = [];
    $length = count($cost);
    $costInfo[0]=$cost[0];
    $costInfo[1]=$cost[1];
    for ($i=2;$i<$length;$i++){
        $costInfo[$i]=min($costInfo[$i-2]+$cost[$i],$costInfo[$i-1]+$cost[$i]);//状态转移

    }
    return min($costInfo[$length-2],$costInfo[$length-1]);;
}
var_dump(minCostClimbingStairs2([1,100,1,1,1,100,1,1,100,1]));