<?php

/* 
 * 数据对象映射
 * 不去直接的操作sql语句.
 * 
 * 加入User类对应我们的user表
 */

namespace base;

class User{
    
    //数据库字段为类的属性
    public $id;
    public $user;
    public $password;
    
    public $db;
    //一个构造方法，用来生成数据库链接
    public function __construct($id) {
        //$mysqli = new \base\database\Mysqli;
        $db = mysqli_connect('127.0.0.1', 'root', '', 'test');
        $res = $db->query("select * from user limit 1");
        $data = $res->fetch_assoc();
        
        $this->id = $data['id'];
        $this->user = $data['user'];
        $this->password = $data['password'];
        
        $this->db = $db;
        
    }
    
    //查询数据库
    public function findById($id){
        
       /* $stmt = $this->db->prepare("select * from user where id = ?");
        $stmt->bind_param('s',$id);//绑定参数
        $stmt->execute();//执行
        $stmt->bind_result($id,$user,$password);//绑定接收值*/
     
    }
    
    //操作数据库
    public function __destruct() {
        $sql = "update user set user='{$this->user}',password='{$this->password}' where id={$this->id}";
        $this->db->query($sql);
        echo 'update success';
    }
}