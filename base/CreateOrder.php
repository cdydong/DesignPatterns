<?php

/* 
 * 被观察者具体实现
 */
namespace base;

class CreateOrder implements Orders{
    
    public $observers = array();
    
    //注册观察者
    public function registerObserver(Observer $observer){
        $this->observers[]=$observer;

    }
    
    //通知
    public function notify(){
        foreach ($this->observers as $observer) {
             $observer->watch();
         }
    }
}
