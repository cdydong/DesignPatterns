<?php

/* 
 * 数据库适配器接口
 */

/*
 * 统一的数据库接口，
 * 适配器模式 
 *  */

namespace base;

interface Databases{

    function connect($host, $user, $passwd, $dbname);
    function query($sql);
    function close();
}