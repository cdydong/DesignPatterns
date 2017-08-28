<?php

/* 
 * 2017-6-6
 * 测试命名空间
 * 
 * 如果把test1和test2中的namespace 都注释，会因为方法名冲突报错
 * 
 * 使用某个命名空间的方法时，用Test1\test()  Test2\test()
 */

//引用外部的文件 require 包含的文件不存在时致命错误  include include_once 警告
//require_once 'test1.php';
//require_once 'test2.php';
//
//require_once 'test3.php';  
//require_once 'test4.php';


//自动载入，自动引用外部文件
//第一种做法,autoload方法,当你引用不存在的类时，__autoload就会被调用，
//并且你的类名会被作为参数传送过去（当你同时使用命名空间，包含命名空间部分会一起作为参数传送）。
function __autoload($class){
    //当带有命名空间时，不能直接这样引用
    //require_once __DIR__.'/'.$class.'.php';
    
    //要把表示命名空间的分割符号，转换成表示目录结构的斜线，
    //注意命名空间必须时目录名，不然还是找不到,对于命名空间是绝对路径,这是一种规范.
    $class_path = str_replace('\\',DIRECTORY_SEPARATOR,$class);
//    echo $class_path;exit;
    $file = realpath(__DIR__).'/'.$class_path.'.php';
    
    if(file_exists($file)){
        require_once($file);    //引入文件
        if(class_exists($class,false))    //带有命名空间的类名
        {
             return true;
        }
        return false;
    }
    return false;

}

//第二种做法，参数时方法名
spl_autoload_register('autoload');
function autoload(){
    require_once __DIR__.'/'.$class.'.php';
}

echo 123;

//调用不同命名空间内的方法 test1.php test2.php
/*
echo "</br>";
Test1\test();
echo "</br>";
Test2\test();
 */

echo "</br>";

//调用不同命名空间中的类 test3.php test4.php
echo  Test1\Test::test();
echo "</br>";
echo  Test2\Test::test();



