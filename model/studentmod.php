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
   public function save() {
       $sql = "insert into student('name','password') VALUE ('{$this->name}','{$this->password}')";
       return $this->m_db->exec($sql);
}


}