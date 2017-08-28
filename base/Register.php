<?php

/* 
 * 2017-6-11
 * 注册器模式
 */

namespace base;
class Register{
    
    public static $objects = array();
    
    static function set($alias,$object){
        
        self::$objects[$alias] = $object;
    }
    
    static function get(){
        
        return self::$objects[$alias];
    }

    static function _unset($alias){
        
        unset(self::$objects[$alias]);
    }
    
}