<?php

/* 
 * 2017-6-11
 * 工厂模式
 * 
 * 工厂模式可以根据不同的参数去实例化不同的类，而不是new方法去实例化每一个不同的类
 * 
 * 如果要实例化的类在多个文件中用到，当我们修改类名称的时候只需要去修改工厂类就行，而不必修改每一个实例化该类的文件
 */

namespace base;
class Factory{
    
    //工厂模式获取database对象
    static function createDatabase() {
       $db = Database::getInstance(); //单例模式和工厂模式结合
       
       //把对象放入到注册器
       Register::set('db', $db);
       
       return $db;
    }
    
    static function getUser($id){
        $key = 'user_'.$id;
        $user = Register::get($key); //单例模式和工厂模式结合
        
        if(!$db){
            $user = new User($id);
            Register::get($key,$user);
        }
        return $user;
    }
    
}

