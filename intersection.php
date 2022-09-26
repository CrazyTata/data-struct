<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/13
 * Time: 16:11
 */
/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Integer[]
 */
function intersection($nums1, $nums2) {
    $return = [];
    foreach ($nums1 as $v){
        if (in_array($v,$nums2)){
            !in_array($v,$return) && $return[] = $v;
        }
    }
    return $return;
}
function intersection1($nums1, $nums2) {
    $return = [];
    $nums2_ = array_flip($nums2);
//    var_dump($nums2);die;
    foreach ($nums1 as $v){
        if (isset($v,$nums2_)){
            echo $v;
            $return_ = array_flip($return);
            !isset($v,$return_) && $return[] = $v;
        }
    }
    return $return;
}

var_dump(intersection1([1,2,2,1],[2,2]));
