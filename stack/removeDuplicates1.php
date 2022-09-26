<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/21
 * Time: 15:49
 */
//1047. 删除字符串中的所有相邻重复项
//力扣题目链接(opens new window)
//
//给出由小写字母组成的字符串 S，重复项删除操作会选择两个相邻且相同的字母，并删除它们。
//
//在 S 上反复执行重复项删除操作，直到无法继续删除。
//
//在完成所有重复项删除操作后返回最终的字符串。答案保证唯一。
//
//示例：
//
//输入："abbaca"
//输出："ca"
//解释：例如，在 "abbaca" 中，我们可以删除 "bb" 由于两字母相邻且相同，这是此时唯一可以执行删除操作的重复项。之后我们得到字符串 "aaca"，其中又只有 "aa" 可以执行重复项删除操作，所以最后的字符串为 "ca"。
//提示：
//
//1 <= S.length <= 20000
//S 仅由小写英文字母组成。
//#思路
//《代码随想录》算法视频公开课：栈的好戏还要继续！| LeetCode：1047. 删除字符串中的所有相邻重复项 (opens new window)，相信结合视频在看本篇题解，更有助于大家对本题的理解。
//
//#正题
//本题要删除相邻相同元素，相对于20. 有效的括号 (opens new window)来说其实也是匹配问题，20. 有效的括号 是匹配左右括号，本题是匹配相邻元素，最后都是做消除的操作。
//
//本题也是用栈来解决的经典题目。
//
//那么栈里应该放的是什么元素呢？
//
//我们在删除相邻重复项的时候，其实就是要知道当前遍历的这个元素，我们在前一位是不是遍历过一样数值的元素，那么如何记录前面遍历过的元素呢？
//
//所以就是用栈来存放，那么栈的目的，就是存放遍历过的元素，当遍历当前的这个元素的时候，去栈里看一下我们是不是遍历过相同数值的相邻元素。
//
//然后再去做对应的消除操作。 如动画所示：
//
//1047.删除字符串中的所有相邻重复项
//
//从栈中弹出剩余元素，此时是字符串ac，因为从栈里弹出的元素是倒序的，所以在对字符串进行反转一下，就得到了最终的结果。
//
//C++代码 :
//
//class Solution {
//public:
//string removeDuplicates(string S) {
//stack<char> st;
//for (char s : S) {
//if (st.empty() || s != st.top()) {
//st.push(s);
//} else {
//    st.pop(); // s 与 st.top()相等的情况
//}
//        }
//        string result = "";
//        while (!st.empty()) { // 将栈中元素放到result字符串汇总
//            result += st.top();
//            st.pop();
//        }
//        reverse (result.begin(), result.end()); // 此时字符串需要反转一下
//        return result;
//
//    }
//};
//当然可以拿字符串直接作为栈，这样省去了栈还要转为字符串的操作。

function removeDuplicates1($s) {
    $stack = new SplStack();
    for($i=0;$i<strlen($s);$i++){
        if($stack->isEmpty() || $s[$i] != $stack->top()){
            $stack->push($s[$i]);
        }else{
            $stack->pop();
        }
    }

    $result = "";
    while(!$stack->isEmpty()){
        $result.= $stack->top();
        $stack->pop();
    }

    // 此时字符串需要反转一下
    return strrev($result);
}

function removeDuplicates($s) {
    $stack = new SplStack();
    for ($i=0;$i<strlen($s);$i++){
        if ($stack->isEmpty()||$stack->top()!=$s[$i]){
            $stack->push($s[$i]);
        }else{
            $stack->pop();
        }
    }
    $return = '';
    while (!$stack->isEmpty()){
        $return .= $stack->top();
        $stack->pop();
    }
    return strrev($return);
}
echo removeDuplicates('ddsdbbaadffg');