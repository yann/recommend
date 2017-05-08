<?php
/**
 * Created by PhpStorm.
 * User: yangyue
 * Date: 2017/5/1
 * Time: 10:18
 */
namespace Home\Model;
use Think\Model;
    class UserModel extends Model{

        protected $trueTableName = 'movie';
        protected $tableName = 'user';
        public function register($res){
            $username = "'".$res["username"]."'";
            $password = "'".$res["password"]."'";
            $sex = "'".$res["sex"]."'";
            $tag = "'".$res["tag"]."'";
            $email = "'".$res["email"]."'";
            $age = "'".$res["age"]."'";
             $sql = "insert into `user`(`id`,`username`,`password`,email,tag,age,sex)VALUES(NULL,$username,$password,$email,$tag,$age,$sex)";
             $res = $this->execute($sql);
             return $res;
           // //$this->data($res)->add();
        }
        public function checkUsername($res){
            $res = "'".$res."'";
            $res = $this->query("select count(*) num from USER where username = $res");
            return $res[0]['num'];
        }

        public function checkEmail($email){
            $res = "'".$email."'";
            $res = $this->query("select count(*) num from USER where email = $res");
            return $res[0]['num'];
        }


        public function login($data){
            $username = "'".$data['username']."'";
            $password = "'".$data['password']."'";
            $res = $this->query("select count(*) num from USER where email = $username AND password = $password");
            if (!empty($res)){
                $result = $this->query("select username from USER where email = $username AND password = $password");
                return $result[0]['username'] ;

            }else{
                return false;
            }
        }

        public function getUserInfo($username,$password){
            $username = "'".$username."'";
            $password = "'".$password."'";
            $res = $this->query("select * from USER where username = $username AND password =$password");
            return $res;
        }

        public function update($data){
       $username = "'".$data['username']."'";
            $password = "'".$data['password']."'";
            $email = "'".$data['email']."'";
            $id = $data['id'];
            $age = $data['age'];
            $sex = $data['sex'];
            $tag = "'".$data['tag']."'";
            $sql = "update user set username = $username,password= $password,age = $age,sex = $sex,tag =$tag WHERE id = $id";
            $res = $this->execute($sql);
            return $res;

        }

        public function getUserIdByName($username){
            $username = "'".$username."'";
            $sql = "select id,username from user WHERE username = $username";
          return  $this->query($sql);
        }
    }
