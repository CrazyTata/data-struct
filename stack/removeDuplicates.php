<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/9
 * Time: 14:49
 */

function removeDuplicates(&$nums) {
    $lastValue = '';
    $k = 0;
    foreach ($nums as $k=>$v){
        if ($v==$lastValue){
            unset($nums[$k]);
            continue;
        }
        $lastValue = $nums[$k];
        $k++;
    }
    return $k;
}