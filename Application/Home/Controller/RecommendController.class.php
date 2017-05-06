<?php
/**
 * Created by PhpStorm.
 * User: yangyue
 * Date: 2017/5/5
 * Time: 16:41
 */
    namespace Home\Controller;
    use Think\Controller;
    use Home\Model;

    class RecommendController extends Controller{
        public function index(){
            $movie = array();
            $movie_betal =array();
            $username = session('username');
            $password = session('password');
            $user_model = new Model\UserModel();
            $result = $user_model->getUserInfo($username,$password);
            $tag = $result[0]['tag'];
            $tags = explode(',',$tag);

            $movie_model = new  Model\MovieModel();
            foreach ( $tags as $key=>$value) {
               $movie[] = $movie_model->getTwentyMovieByCat($value);
            }
            foreach ($movie as $k=>$v){
               foreach ($v as $k1=>$v1)
               {
                   $temp['id'] = $v1['id'];
                   $temp['title'] = $v1['title'];
                   $temp['rate'] = $v1['rate'];
                   $temp['cover'] = "/Public/html/img/".basename($v1['cover']);
                   $movie_betal[] = $temp;
               }
            }
            $username = session('username');
            $this->assign('username',$username);
            $this->assign("data",$movie_betal);
            $this->display();
        }
    }