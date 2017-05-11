<?php
/**
 * Created by PhpStorm.
 * User: yangyue
 * Date: 2017/5/1
 * Time: 10:18
 */
 namespace Home\Model;
 use Think\Model;
 class MovieModel extends Model{
            protected $trueTableName = 'movie';
            protected $tableName = 'movie';
            public function getDetailByid($id){
               $res =  $this->query("select * from movie WHERE id = $id");
               return $res;
            }

            public function getCount($cat){
                $cat = "'".$cat."'";
                $res = $this->query("select count(*) num from movie WHERE category = $cat");
                return $res[0]['num'];
            }


     /**
      * @return mixed
      *  获得最新的电影的简介
      *
      */
                public function getNewMovieBrief(){
                $res =  $this->query("select id,title,rate,cover from movie WHERE is_new=1");
                return $res;
            }


     /**
      * @return mixed
      *
      * 获得最新电影的详细
      */
            public function getNewMovieDetail(){
                $res = $this->query("select * from movie where is_new =1");
                return $res;
            }


     /**
      * @return mixed
      * 获得热门电影的简介
      */
            public function getMovieBrief($cat){
                $res = $this->query("select id,title,rate,cover from movie WHERE category ='{$cat}' limit 10");
                return $res;
            }

            public function getMovieDetail($cat){
                $res = $this->query("select * from movie where category =$cat limit 10");
                return $res;
            }

            public function getDoubanIdById($id){
                $res = $this->query("select douban_id from movie where id=$id");
                return $res;
            }

            public function getTitleById($id){
                $res = $this->query("select id,title,style from movie where id=$id");
                return $res;
            }

            public function search($word){
                $sql = "select id,title,rate,cover from movie WHERE title like"."'%{$word}%'";
                $res = $this->query($sql);
                return $res;
            }


            public function getMovieByIds($ids){
                $sql = "select id,title,rate,cover from movie WHERE id in ($ids)";
                $res = $this->query($sql);
                return $res;
            }


     /**
      * @param $cat
      * @return mixed
      * 联合 user_score 查询
      *
      */
            public function getTwentyMovieByCat($cat,$ids){
                $cat = "'".$cat."'";
                $sql = "select  id,title,rate,cover FROM movie WHERE id not in ($ids)  and category = $cat  ORDER BY rate DESC LIMIT 2";
                $res = $this->query($sql);
                return $res;
            }


            public function getMovieByStyle($style){
                $style = "'".$style."'";
                $sql = "select id,style from movie where style LIKE style";
               $res =  $this->query($sql);
               return $res;
            }

            public function getMovieIdAndStyle($ids){
                if (empty($ids)){
                    $sql = "select id,style,rate from movie";
                }else {
                    $sql = "select id,style,rate from movie WHERE  id not in ($ids)";
                }
                return $this -> query($sql);
            }
        }