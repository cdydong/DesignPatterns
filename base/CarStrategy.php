<?php

/* 
 * 策略模式，乘坐汽车
 */

namespace base;

class CarStrategy implements Strategy{
    
    public function travel(){
        echo '坐汽车去旅行';
    }
    
}