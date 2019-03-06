<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/3/6
 * Time: 20:54
 */
//做个路由 actionw为URL的参数

/*$action = $_GET['action'];
switch ($action) {
    case 'init_data_list':
        init_data_list();
        break;
    case 'add_row':
        add_row();
        break;
    case 'del_row':
        del_row();
        break;
    case 'edit_row':
        edit_row();
        break;
}*/
//查询方法
function init_data_list(){
    //测试 运行crud.html时是否可以获取到 下面这个字符串
    /*echo "46545465465456465";*/

    //查询表

    $sql = "SELECT * FROM `student`";
    $res = mysql_query($sql);
    while ($row = mysql_fetch_assoc($res)) {
        $data[] = $row;
    }

    $json = json_encode(array(
        "resultCode"=>200,
        "message"=>"查询成功！",
        "data"=>$data
    ),JSON_UNESCAPED_UNICODE);

    //转换成字符串JSON
    echo($json);
}
/**查询服务器中的数据
 * 1、连接数据库,参数分别为 服务器地址 / 用户名 / 密码 / 数据库名称
 * 2、返回一个包含参数列表的数组
 * 3、遍历$sqls这个数组，并把返回的值赋值给 $s
 * 4、执行一条mysql的查询语句
 * 5、关闭数据库
 * 6、返回执行后的数据
 */
function query_sql(){
    mysql_connect("127.0.0.1","root","root");
    mysql_select_db("demo");
    mysql_query("set names utf8");

}
query_sql();
init_data_list();
