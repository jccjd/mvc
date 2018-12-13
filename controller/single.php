<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/12/10
 * Time: 15:45
 * 单例模式
 */
class  singletonv2{
    /*保存类实例的静态成员变量*/
    private static $_instance;
    /*private标记构造方法*/
    private function __construct()
    {
    }
    //防止被克隆
    public  function  __clone()
    {
        // TODO: Implement __clone() method.
        trigger_error("Clone is not allow",E_USER_ERROR);
    }

    public static function getInstance() {
        if (static::$_instance instanceof self) {
            static::$_instance = new self();
        }
        return static::$_instance;
    }
}
//用new 实例化private标记的构造函数的类会报错

//$danll = new Danll();
//正确方法
$danll = singletonv1::getInstance();

//克隆返回错误
$danll_clone = clone $danll;