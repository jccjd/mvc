<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/12/10
 * Time: 15:45
 * 单例模式
 */
class Singleton0
{
    private static $instance = null;
    private static $instance1 = null;
    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @return null
     */
    static public function getInstance()
    {
        if (is_null(self::$instance) || isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return null
     */
    public static function getInstance1()
    {
        if (static::$instance === null) {
            static::$instance = new static;
        }
        return self::$instance1;
    }
}
class Singleton2 {
    protected static $instace = null;

    private function __construct()
    {
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @return null
     */
    public static function getInstace()
    {
        if (static::$instace === null) {
            static::$instace = new static;
        }
        return self::$instace;
    }


}

abstract class Singleton
{

    final protected function __clone()
    {
        // TODO: Implement __clone() method.
    }

    final protected function __construct()
    {
        $this->init();
    }

    protected function init()
    {
    }

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}

class Base extends Singleton
{
}

class A extends Base
{
    protected static $instance = null;
}

class B extends Base
{
    protected static $instance = null;
}

$c = A::getInstance();
$d = B::getInstance();
var_dump($c === $d);