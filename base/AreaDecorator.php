<?php

/* 
 * 区域类的装饰器具体类
 */

namespace base;

class AreaDecorator extends Area{
    
    public $area;
    public function __construct(Area $area){
        $this->area = $area;
    }
    
    public function treasure(){
        echo $this->area->treasure() * 0.3;
    }
}
