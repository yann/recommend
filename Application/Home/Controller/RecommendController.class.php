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
            $username = session('username');
            if (empty($username)){
                $this->error("请先登录","/index.php/Home/Function/login");
            }
            $movie = array();
            $movie_betal =array();
            $username = session('username');
            $password = session('password');
            $user_model = new Model\UserModel();
            $result = $user_model->getUserInfo($username,$password);
            $tag = $result[0]['tag'];
            $tags = explode(',',$tag);
            $movie_model = new  Model\MovieModel();
            $user_score_model = new  Model\UserScoreModel();
            $ids = $user_score_model-> getIdsByName($username);
            $ids = implode(',',$ids);
            foreach ( $tags as $key=>$value) {
               $movie[] = $movie_model->getTwentyMovieByCat($value,$ids);
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

            $this->assign('username',$username);
            $this->assign("data",$movie_betal);
            $this->display();
        }
        public function check(){
            $username = session('username');
            if (empty($username)){
                echo json_encode(array('code'=>"error",'msg'=>'no login', 'url'=>"/index.php/Home/Function/login"));
            }else{
                echo json_encode(array('code'=>"success"));
            }
        }

        public function score(){
            $username = session('username');
            $movie_id = $_POST['movie_id'];
            $movie_model = new Model\MovieModel();
            $user_model = new  Model\UserModel();
            $data = $movie_model -> getTitleById($movie_id);
            $userinfo  = $user_model -> getUserIdByName($username);
            $result['movie_id'] = $data[0]['id'];
            $result['movie_name'] = $data[0]['title'];
            $result['user_name'] = $username;
            $result['user_id'] = $userinfo[0]['id'];
            $result['score'] = $_POST['score'];

            $user_score_model = new Model\UserScoreModel();
            $exist_check = $user_score_model->existCheck($result);
            if ($exist_check){
               echo  json_encode(array("code" => 'error','msg' => '已经评价过了' ));
            }else{
                $flag = $user_score_model->insert($result);
                if ($flag){
                   echo  json_encode(array("code" => 'success','msg' => '评分成功' ));
                }else{
                   echo  json_encode(array("code" => 'error','msg' => '评分失败' ));
                }
            }
        }


    }