<?php

//入口文件
header("Content-type:text/html;charset=utf-8");

define('BASEDIR', __DIR__);
//先把Base类引入进来，因为它是自动载入方法所在的类
include BASEDIR.'/base/Base.php';


//自动加载要引入的文件，之后不用引入文件，自动调用
spl_autoload_register('\base\Base::autoload');


//测试application\controller空间下的类文件Index是否引入
application\controller\Index::test();

echo "<hr/>";

//测试工厂模式，获取数据库操作类对象，在工厂中就已经把数据库链接放到注册树了
echo "</pre>"; print_r(base\Factory::createDatabase());
echo "</br>";
//测试单例模式，获取数据库操作类对象
$db = base\Database::getInstance();echo '单例模式：'.$db->test();
echo "</br>";
//测试注册器模式，获取数据库操作类对象
$db = base\Register::$objects['db'];echo '注册器模式：'.$db->test();

echo "<hr/>";

//测试适配器模式,三种数据库模式的统一
$db = new base\database\Mysql;
$db->connect('127.0.0.1', 'root', '', 'test');
var_dump(mysql_fetch_array($db->query('select * from user')));
echo "</br>";
$db = new base\database\Mysqli;
$db->connect('127.0.0.1', 'root', '', 'test');
var_dump(mysqli_fetch_array($db->query('select * from user')));
echo "</br>";
$db = new base\database\Pdo;
$db->connect('127.0.0.1', 'root', '', 'test');
$PDO = $db->query('select * from user');
var_dump($PDO->FetchAll());

echo "<hr/>";

//数据对象映射
//$user = base\Factory::getUser(1);//已经在注册器中注册，调用时是同一个对象
//var_dump($user);
//var_dump($user->findById(1));exit;
//$user->user = 'admin';

echo "<hr/>";

//策略模式
class Travel{
    public  $object;
    public function index(){
        echo "旅游";
    }
    
   /* public function travel(){
        if(isset($_GET['car'])){
            echo '坐汽车车';
        }else if(isset ($_GET['trian'])){
            echo "坐火车";
        }
        //如果有其他的策略，一致往下加
        //.....
    }*/
    
    //很显然上面的travel方法，每加一中行为，就要加一种判断
    //很难维护，所以用策略模式,也是要策略类类注入
    public function method(\base\Strategy $strategy){
        $this->object = $strategy;
    }
}

$travel = new Travel;
echo $travel->index().': ';
if(isset($_GET['car'])){
    $strategy =new \base\CarStrategy;
}else{
    $strategy =new \base\TrainStrategy;
}
$travel->method($strategy);
echo $travel->object->travel();
//通过上面的方法，我们就可以在添加一种策略的时候添加一个策略类就可以了


echo "<hr/>";

//观察者模式
class Order{ 
    //一个下订单的方法，一连串的流程，如果改变，就需要在此处添加
   public function create(){
        echo "下订单</br>";
        echo "送积分</br>";
        echo "送代金券</br>";
    }
    
}

//下面用观察者模式
class Order1 implements \base\Observer{
   public function watch(){     
        echo "下订单</br>";
    }
}

class Order2 implements \base\Observer{
   public function watch(){     
        echo "送积分</br>";
    }
}

class Order3 implements \base\Observer{
   public function watch(){     
        echo "送代金券</br>";
    }
}

$order = new Order;
$order->create();
echo "使用观察者模式：</br>";
$action=new \base\CreateOrder();
$action->registerObserver(new Order1());
$action->registerObserver(new Order2());
$action->registerObserver(new Order3());
$action->notify();


echo "<hr/>";
//装饰器模式
//有一个区域类，区域中的部分都有价值，例如森林100
class Forest extends \base\Area{
    public function treasure(){
        return 100;
    }
}

class Desert extends \base\Area{
    public function treasure(){
        return 200;
    }
}

//如果上面的例子我们再加一些功能，比如被破环的森林
//当然首先想到的就是继承，但是这和森林重叠了，所以可以用装饰模式
$damageForest = new \base\AreaDecorator(new Forest());
$damageForest->treasure();


echo "<hr/>";

//迭代器模式
class Client
{
    public static function test()
    {
        //创建一个容器,在容器中添加
        $concreteAggregate = new \base\ConcreteAggregate();
        // 添加属性
        $concreteAggregate->addProperty('属性1');
        // 添加属性
        $concreteAggregate->addProperty('属性2');
        //给容器创建迭代器
        $iterator = $concreteAggregate->getIterator();
        //遍历
        while($iterator->valid())
        {
            $key   = $iterator->key();
            $value = $iterator->current();
            echo '键: '.$key.' 值: '.$value.'</br>';
            $iterator->next();
        }

    }
}
Client::test();

echo "<hr/>";

$a = array(1,2,3,4,0,5);

//$b = array(1,3,6,10,10,15);

$c = array();
$length = count($a);

for($i=0;$i<$length;$i++){
    $val+=$a[$i];
    $c[$i] = $val;
}
var_dump($c);exit;
//var_dump(phpinfo());exit;