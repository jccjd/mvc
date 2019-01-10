<?php
header('Content-type:text/html; charset = utf8');
//载入数据库操作类
require 'MySQLPDO.class.php';
//载入模型文件
require 'model/model.class.php';
require 'model/studentModel.class.php';
//得到控制器名
$c = isset($_GET['c']) ? $_GET['c'] : 'student';
require 'controller/'.$c.'Controller.class.php';
//实例化控制器（可变量）
$controller_name = $c.'Controller';
$controller = new $controller_name;
//得到方法
$action_name = $action.'Action';
$controller->$action_name();
