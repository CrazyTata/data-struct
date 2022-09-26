<?php
//leetCode . 四数之和

function fourSum($nums,$target){
    $return = [];
    $length = count($nums);
    if ($length<3) return [];
    sort($nums);
    for ($i=0;$i<$length;$i++){
        if ($i>0&&$nums[$i]==$nums[$i-1]) continue;
        for ($j=$i+1;$j<$length;$j++){
            if ($j>$i+1&&$nums[$j]==$nums[$j-1]) continue;
            for ($k=$j+1;$k<$length;$k++){
                if ($k>$j+1&&$nums[$k]==$nums[$k-1]) continue;
                $l = $length-1;
                while ($l>$k&&($nums[$i]+$nums[$j]+$nums[$k]+$nums[$l])>$target){
                    $l --;
                }
                if ($l==$k){
                    continue;
                }
                if (($nums[$i]+$nums[$j]+$nums[$k]+$nums[$l])==$target){
                    $return[] = [$nums[$i],$nums[$j],$nums[$k],$nums[$l]];
                }
            }
        }
    }
    return $return;
}


//双指针


$nums =  [1,-2,-5,-4,-3,3,3,5];
//$nums =  [-5,-4,-3,-2,1,3,3,5];
$target = -11;
var_dump(fourSum($nums,$target));