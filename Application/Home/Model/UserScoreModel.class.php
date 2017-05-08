<?php
/**
 * Created by PhpStorm.
 * User: yangyue
 * Date: 2017/5/8
 * Time: 13:45
 */
    namespace Home\Model;
    use Think\Model;
        class  UserScoreModel extends Model{
            public function insert($res){
                $movie_id = "'".$res["movie_id"]."'";
                $movie_name = "'".$res["movie_name"]."'";
                $user_name = "'".$res["user_name"]."'";
                $user_id = "'".$res["user_id"]."'";
                $score =  "'".$res["score"]."'";
                $sql = "insert into `user_score`(`id`,user_id,user_name,movie_id,movie_name,score)VALUES(NULL,$user_id,$user_name,$movie_id,$movie_name,$score)";
                $res = $this->execute($sql);
                return $res;
            }

            public function existCheck($res){
                $movie_id = "'".$res["movie_id"]."'";
                $user_id = "'".$res["user_id"]."'";
                $sql = "select count(*) num from user_score WHERE user_id = $user_id AND movie_id = $movie_id";
                $result = $this->query($sql);
                return $result[0]['num'];
            }

            public function getIdsByName($username){
                $ids = [];
                $username = "'".$username."'";
                $sql = "select movie_id from user_score WHERE  user_name = $username";
                $res =  $this->query($sql);
                foreach ( $res as  $key => $value){
                    $ids[] = $value['movie_id'];
                }
                return $ids;
            }

        }