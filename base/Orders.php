<?php

/* 
 * 被观察者接口
 * 有一个注册观察者的方法
 * 有一个通知方法，自身改变时，通知观察者
 */

namespace base;

interface Orders{
    
    //注册观察者方法
    function registerObserver(Observer $observer);
    //通知方法
    function notify();
}
