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
        $name = $_POST['name'];
        $password = $_POST['password'];
        if (strlen($name) && strlen($password)) {
            if (ctype_alnum($name) && ctype_alnum($password)) {
                $stu = new studentModel();
                $stu->name = $name;
                $stu->password = $password;
                $stu->save();
                $resp = array('ret' => 'success');
                echo json_encode($resp);
            } else {
                return false;
            }
            return false;
        }
    }

    public function delStudentAction() {
        $id = $_POST['id'];
        $stu = new studentModel();
        $stu->delete($id);
        $resp = array('ret'=>"success");
        echo json_encode($resp);
    }
    public function updateStudentAction() {
        $id = $_POST['id'];
        $stu = new studentModel();
        $stu->update();
    }
    public function getStudentAction() {
        $id =$_GET['id'];
        $stu = new studentModel();
        $stu->id = $id;
        $stu->get();
        $resp = array("ret"=>'success');
        echo json_encode($resp);


    }
}