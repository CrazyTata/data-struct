<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/13
 * Time: 16:48
 */

//给定一个 m x n 二维字符网格 board 和一个字符串单词 word 。如果 word 存在于网格中，返回 true ；否则，返回 false 。
//
//单词必须按照字母顺序，通过相邻的单元格内的字母构成，其中“相邻”单元格是那些水平相邻或垂直相邻的单元格。同一个单元格内的字母不允许被重复使用。
//链接：https://leetcode.cn/problems/word-search   79
//著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
//输入：board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "ABCCED"
//输出：true
//["A","B","C","E"]
//["S","F","C","S"]
//["A","D","E","E"]
/**
 * @param String[][] $board
 * @param String $word
 * @return Boolean
 */
function exist($board, $word) {

}

$board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]];
$word = "ABCCED";
var_dump(exist($board,$word));


class Solution {

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    private $visited=[];//访问备忘录
    private $direction=[
        [-1,0],//上
        [0,1],//右
        [1,0],//下
        [0,-1]//左
    ];
    function exist($board, $word) {
        $m=count($board);
        $n=count($board[0]);
        $this->visited=array_fill(0,$m,[]);
        foreach($this->visited as &$item){//初始化备忘录
            $item=array_fill(0,$n,0);
        }

        for($i=0;$i<$m;$i++){//遍历board中所有点
            for($j=0;$j<$n;$j++){
                if($this->searchWord($board,$word,[$i,$j],0)){
                    return true;
                }
            }
        }

        return false;
    }

    //在board中，从点start开始，寻找word字符串，从索引index开始
    function searchWord($board,$word,$start,$index){//深度优先遍历
        if($board[$start[0]][$start[1]]!=$word[$index])//递归终止
            return false;
        $wordLen=strlen($word);
        if($index==$wordLen-1){//递归终止
            return true;
        }
        $this->visited[$start[0]][$start[1]]=1;//更新备忘录
        //下面的一段逻辑，是从点start的上，右，下，左四个方向开始查找-start
        foreach($this->direction as $item){
            $newStart[0]=$start[0]+$item[0];
            $newStart[1]=$start[1]+$item[1];
            if($this->isValid($newStart)&&!$this->visited[$newStart[0]][$newStart[1]]){
                if($this->searchWord($board,$word,$newStart,$index+1))
                    return true;
            }
        }
        //end

        $this->visited[$start[0]][$start[1]]=0;//还原备忘录

        return false;//返回false
    }

    //判断点是否合法
    function isValid($point){
        $m=sizeof($this->visited);
        $n=sizeof($this->visited[0]);
        return $point[0]>=0&&$point[0]<$m&&$point[1]>=0&&$point[1]<$n;
    }
}

