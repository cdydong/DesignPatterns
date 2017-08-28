<?php

/* 
 * 2017-6-11
 * 单例模式
 * 避免重复的new一个对象
 * 
 * 1：不能被外部new 私有的__contruct
 * 2：不能被clone
 * 3：定义一个公有的方法，用来外部获取私有的变量
 */

namespace base;

class Single{
    
    private static $_instance;
    
    private function __construct() {
        
    }
    
    private function __clone() {
        
    }
    
    public function getInstance(){
        
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
           }
        return self::$_instance;
        
    }
    
    public function test(){
        return '单例模式';
    }
    
}

