<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/15
 * Time: 11:09
 */
class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow($nums, $k) {
        $myQueue = new MyQueue();
        // 先将前k的元素放进队列
        for ($i = 0; $i < $k; $i++) {
            $myQueue->push($nums[$i]);
        }

        $result = [];
        $result[] = $myQueue->max(); // result 记录前k的元素的最大值

        for ($i = $k; $i < count($nums); $i++) {
            $myQueue->pop($nums[$i - $k]); // 滑动窗口移除最前面元素
            $myQueue->push($nums[$i]); // 滑动窗口前加入最后面的元素
            $result[]= $myQueue->max(); // 记录对应的最大值
        }
        return $result;
    }

}

// 单调对列构建
class MyQueue{
    private $queue;

    public function __construct(){
        $this->queue = new SplQueue(); //底层是双向链表实现。
    }

    public function pop($v){
        // 判断当前对列是否为空
        // 比较当前要弹出的数值是否等于队列出口元素的数值，如果相等则弹出。
        // bottom 从链表前端查看元素, dequeue 从双向链表的开头移动一个节点
        if(!$this->queue->isEmpty() && $v == $this->queue->bottom()){
            $this->queue->dequeue(); //弹出队列
        }
    }

    public function push($v){
        // 判断当前对列是否为空
        // 如果push的数值大于入口元素的数值，那么就将队列后端的数值弹出，直到push的数值小于等于队列入口元素的数值为止。
        // 这样就保持了队列里的数值是单调从大到小的了。
        while (!$this->queue->isEmpty() && $v > $this->queue->top()) {
            $this->queue->pop(); // pop从链表末尾弹出一个元素，
        }
        $this->queue->enqueue($v);
    }

    // 查询当前队列里的最大值 直接返回队首
    public function max(){
        // bottom 从链表前端查看元素, top从链表末尾查看元素
        return $this->queue->bottom();
    }

    // 辅助理解: 打印队列元素
    public function println(){
        // "迭代器移动到链表头部": 可理解为从头遍历链表元素做准备。
        // 【PHP中没有指针概念，所以就没说指针。从数据结构上理解，就是把指针指向链表头部】
        $this->queue->rewind();

        echo "Println: ";
        while($this->queue->valid()){
            echo $this->queue->current()," -> ";
            $this->queue->next();
        }
        echo "\n";
    }
}
