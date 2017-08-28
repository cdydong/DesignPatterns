<?php

/*
 * 2017-6-7
 * base 文件，用来自动加载调用的类
 */
namespace base;

class Base{
    
    public static function autoload($class){

        //要把表示命名空间的分割符号，转换成表示目录结构的斜线，
        //因为linux中表示目录的分割只能是/，所以最好不要用/去分割，用DIRECTORY_SEPARATOR
        $class_path = str_replace('\\',DIRECTORY_SEPARATOR,$class);

        require_once BASEDIR.'/'.$class_path.'.php';
    
    }
}



