<?php


/**
 * Class MyAggregate 聚合容器
 */

namespace base;

class ConcreteAggregate implements \IteratorAggregate
{
    public $property;

    /**
     * 添加属性
     *
     * @param $property
     */
    public function addProperty($property)
    {
        $this->property[] = $property;
    }
    
    //得到迭代器对象
    public function getIterator()
    {
        return new ConcreteIterator($this->property);
    }
}