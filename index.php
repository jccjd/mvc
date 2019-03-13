<?php
/*header('Content-type:text/html; charset = utf8');
//载入数据库操作类
require "MySQLPDO.class.php";
//载入模型文件
require "model/model.class.php";
require 'model/studentModel.class.php';
//得到控制器名
$c = isset($_GET['c'])?$_GET['c']:'student';
require "controller/".$c.'Controller.class.php';
//载入控制器（可变变量）
require "controller/".$c.'Controller.class.php';
//实例化控制器
$controller = new $c.'Controller';
//得到方法名
$a = isset($_GET['a'])?$_GET['a']:'list';
$action_name = $a.'Action';


//调用方法
$controller->$action_name();*/
/*require('controller/democontroller.php');
$controller = new DemoController();
$controller->index();*/



/*//index.php
// get runtime controller prefix
$c_str = $_GET['c'];
// the full name of controller
$c_name = $c_str.'controller';
// the path of controller
$c_path = 'controller/'.$c_name.'.php';
// get runtime action
$method = $_GET['a'];
// load controller file
require($c_path);
// instantiate controller
$controller = new $c_name;
// run the controller  method
$controller->$method();*/
// End of index.php
//http://localhost:63342/mvc/index.php?c=demo&a=index