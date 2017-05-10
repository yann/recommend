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
    }