<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/12/10
 * Time: 15:45
 * 单例模式
 */
class Singleton1 {

    protected static $instance=null;

    /**
     * @return null
     */
    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static;
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }


}

abstract class Singleton {
    final public function __construct()
    {
        $this->init();
    }
    final public function init() {

    }
    final public function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance()
    {
        if (static::$instacne === null) {
            static::$instance = new static();
        }
        return static::$instacne;
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