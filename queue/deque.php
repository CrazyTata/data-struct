<?php
/**
 * Created by PhpStorm.
 * User: wangmg
 * Date: 2022/9/1
 * Time: 16:59
 */

class Deque {
    public $queue=[];

    public function addHead($element){
        array_unshift($this->queue,$element);
    }

    public function addTail($element){
        array_push($this->queue,$element);
    }

    public function removeHead(){
        array_shift($this->queue);
    }

    public function removeTail(){
        array_pop($this->queue);
    }

    public function show(){
        var_dump($this->queue);
    }
}

$obj = new \Deque();
$obj->addTail(10);
$obj->addTail(11);
$obj->show();