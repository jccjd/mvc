<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/1/11
 * Time: 20:45
 */

class studentctl
{
    public function addStudentAction()
    {
        $name = $_GET['name'];
        $password = $_GET['password'];
        $gander = $_GET['gander'];
        $age = $_GET['age'];
        //数据校验
        if (strlen($name) < 20 && strlen($password) < 20) {
            if (ctype_alnum($name) && ctype_alnum($password)) {
                //构造模型类
                $user = new studentModel();
                $user->name = $name;
                $user->password = $password;
                $user->gander = $gander;
                $user->age = $age;
                $user->save();
            }
            //返回前台结果
            $resp = array("ret" => Configs::$error_code['register_success']);
        } else {
            $resp = array("ret" => Configs::$error_code['register_fail']);
        }
        echo json_encode($resp);

    }

    public function delStudentAction() {
        $stu = new studentModel();
        $stu->delete(1);
        $resp = array('ret'=>Configs::$error_code['register_success']);
        echo json_encode($resp);
    }
    public function updateStudentAction() {
        $id = $_GET['id'];
        $updateArray = $_GET['update'];
        $stu = new studentModel();
        $stu->update($id,$updateArray);
    }
    public function getStudentAction() {
        $id =$_GET['id'];
        $stu = new studentModel();
        $stu->id = $id;
        $stu->get();
        $resp = array("ret"=>Configs::$error_code['register_success']);
        echo json_encode($resp);
    }
}