<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/12/10
 * Time: 15:45
 * 单例模式
 */
class SingletonV1 {
    private static $_instance = null;
    protected  static $_instance2 = null;

    /*私有防止外面访问*/
    private function __construct()
    {
    }
    /*私有防止外面访问*/
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
    //静态方法，单例统一访问
    static public function getInstance() {
        if ( is_null(self::$_instance) || isset(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * @return null
     * v2
     */
    public static function getInstance2()
    {
        if (static::$_instance===null)
        {
            self::$_instance = new static;
        }
        return self::$_instance2;
    }

}
abstract class Singleton {

    final protected function __clone()
    {
        // TODO: Implement __clone() method.
    }
    final protected function __construct()
    {
        $this->init();
    }
    protected function init(){}
    public static function getInstance() {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}
class Base extends Singleton {

}
class A extends Base {
    protected static $instance = null;
}
class B extends Base {
    protected static $instance = null;
}
$c = A::getInstance();
$d = B::getInstance();
var_dump($c === $d);