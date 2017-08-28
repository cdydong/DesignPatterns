<?php

/* 
 * 策略模式，乘坐火车
 */

namespace base;

class TrainStrategy implements Strategy{
    
    public function travel(){
        echo '坐火车去旅行';
    }
    
}