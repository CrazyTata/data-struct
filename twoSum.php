<?php
//leetCode 1. 两数之和
function twoSum($nums,$target){
    $temp = [];
    if (empty($nums)) return [];
    for ($i=0;$i<count($nums);$i++){
        if(isset($temp[$target-$nums[$i]])){
            return [$i,$temp[$target-$nums[$i]]];
        }
        $temp[$nums[$i]] = $i;
    }
    return [];
}
$nums = [2,7,11,15];
$target = 9;
var_dump(twoSum($nums,$target));