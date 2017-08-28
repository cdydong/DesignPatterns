<?php

/**
 * 迭代器模式
 */

/**
 * Class ConcreteIterator 具体的迭代器
 */

namespace base;

class ConcreteIterator implements \Iterator
{
    private $position = 0;
    private $array = array();

    public function __construct($array) {
        $this->array = $array;
        $this->position = 0;
    }
    
    //第一个元素
    function rewind() {
        $this->position = 0;
    }
    
    //返回当前元素的值
    function current() {
        return $this->array[$this->position];
    }
    
    //返回当前元素的索引
    function key() {
        return $this->position;
    }
    
    //下一个元素
    function next() {
        ++$this->position;
    }
    
    //当前元素是否存在
    function valid() {
        return isset($this->array[$this->position]);
    }
}
