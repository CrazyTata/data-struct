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
function subset($array) {
   $return = [[]];
   foreach ($array as $son){
       foreach ($return as $returnSon){
           $newArray = array_merge($returnSon,[$son]);
           !in_array($newArray,$return) && $return[] = $newArray;
       }
   }
   return $return;

}
var_dump(subset([1,2,3]));