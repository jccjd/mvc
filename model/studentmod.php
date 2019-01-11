<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2019/1/11
 * Time: 22:18
 */

class studentmod {
    public $id;
    public $name;
    public $password;
    public $gander;
    public $age;
    //增
    public function save() {
        $dbConfig = array('user'=>'root','pass'=>'root','dbname'=>'test');
        $m_db = MySQLPDO::getInstance($dbConfig);
        $sql = "insert into student(name,password,gander,age) VALUE ('$this->name','$this->password','$this->gande','$this->age')";
        $m_db->exec($sql);
    }
    public function delete() {
        $dbConfig  = array('user'=>'root','pass'=>'root','dbname'=>'test');
        $m_db = MySQLPDO::getInstance($dbConfig);
        $sql = "drop table student1";
        $m_db->exec($sql);
    }
    public function get() {
        $dbConfig  = array('user'=>'root','pass'=>'root','dbname'=>'test');
        $m_db = MySQLPDO::getInstance($dbConfig);
        $sql = "select * from student where id = {$this->id}";
        $m_db->exec($sql);
        var_dump($sql);

    }


}