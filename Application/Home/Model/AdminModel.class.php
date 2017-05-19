<?php
/**
 * Created by PhpStorm.
 * User: yangyue
 * Date: 2017/5/18
 * Time: 17:41
 */
namespace Home\Model;
use Think\Model;
    class  AdminModel extends  Model{
        public function check_admin($username,$password){
            $username = "'".$username."'";
            $password = "'".$password."'";
            $sql = "select count(*) num from admin where username = $username AND password = $password";
            $res  = $this->query($sql);
            return $res;
        }
    }