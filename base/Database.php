<?php

/* 
 * 2-17-6-11
 * 数据库操作类
 * 
 * 使用单例模式
 */

namespace base;
class Database{
    private static $_instance;
    
    private function __construct() {
        
    }
    
    private function __clone() {
        
    }
    
    public static function getInstance(){
        
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
           }
        return self::$_instance;
        
    }
    
    public function test(){
        return 'Database';
    }
}


