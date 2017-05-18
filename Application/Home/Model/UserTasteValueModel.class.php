<?php
/**
 * Created by PhpStorm.
 * User: yangyue
 * Date: 2017/5/9
 * Time: 17:22
 */
namespace Home\Model;
use Think\Model;
    class  UserTasteValueModel extends  Model{
        public function addValue($data,$num){
            $tags = $data['tags'];
            $user_id = $num;
            $user_name = "'".$data['username']."'";
            $tags_taste_value = 10 ;
            foreach ($tags as $key => $value){
                $value = trim($value);
                $val = "'".$value."'";
                $sql = "insert into user_taste_value(id,user_id,user_name,tags,tags_taste_value)VALUES(NULL,$user_id,$user_name,$val,$tags_taste_value)";
                $this->execute($sql);
            }
        }

        public function deleteAll($id){
            $sql = "delete from user_taste_value WHERE  user_id = $id";
            $res = $this->execute($sql);
            return $res;
        }

        public function truncate(){
            $this->execute("truncate table user_taste_value");
        }

        public function change($data){
            $user_id = $data['user_id'];
            $user_name = "'".$data['user_name']."'";
            $tags = "'".$data['tags']."'";
            $tags_taste_value = $data['tags_taste_value'];
            $sql = "update user_taste_value set tags_taste_value = $tags_taste_value WHERE user_id = $user_id AND tags = $tags";
            $res = $this->execute($sql);
            return $res;
        }

        public function add_new($data)
        {
            $user_id = $data['user_id'];
            $user_name = "'" . $data['user_name'] . "'";
            $tags = "'" . $data['tags'] . "'";
            $tags_taste_value = $data['tags_taste_value'];
            $sql = "insert into  user_taste_value (id,user_id,user_name,tags,tags_taste_value)VALUES(NULL,$user_id,$user_name,$tags,$tags_taste_value)";
            $res = $this->execute($sql);
            return $res;
        }

        public function checkExist($data){
            $user_id = $data['user_id'];
            $user_name = "'".$data['user_name']."'";
            $tags = "'".$data['tags']."'";
            $sql = "select tags_taste_value from user_taste_value WHERE user_id = $user_id AND user_name= $user_name AND tags = $tags";
            $res = $this->query($sql);
            return $res[0]['tags_taste_value'];
        }
        public function getTasteValue($username){
            $temp = [];
            $user_name = "'".$username."'";
            $sql = "select tags,tags_taste_value value from user_taste_value WHERE user_name = $user_name";
            $res = $this ->query($sql);
            foreach ( $res as $key => $value){
                $temp[$value['tags']] = $value['value'];
            }
            return $temp;
        }
        public function getInfo($username){
            $temp = [];
            $user_name = "'".$username."'";
            $sql = "select user_name,tags,tags_taste_value value from user_taste_value WHERE user_name = $user_name";
            $res = $this ->query($sql);
            return $res;
        }

    }