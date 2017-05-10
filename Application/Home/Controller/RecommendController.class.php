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

         /*   foreach ( $tags as $key=>$value) {
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
            }*/

            $movie_betal =  $this->core();
            exit;
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
            $result['movie_style'] = $data[0]['style'];
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
        public function core(){
            $movie = [];
            $movie_model = new  Model\MovieModel();
            $user_score_model = new  Model\UserScoreModel();
            $user_taste_value_model = new Model\UserTasteValueModel();
            $username = session('username');
            $password = session('password');
            $user_model = new Model\UserModel();
            $userinfo = $user_model -> getUserInfo($username,$password);
            $tag  = $userinfo[0]['tag'];
            $tags = explode(',',$tag);
            $ids  = $user_score_model -> getIdsByName($username); //获取用户评价过的电影id
            $ids  = implode(',',$ids);

            // 查询出 未评分过所有电影，并通过兴趣值标签对电影排序输出。
            $result = $movie_model ->getMovieIdAndStyle($ids);
           foreach ( $result as $k => $v){
                $temp['id'] = $v['id'];
                $temp['style'] = explode('/',$v['style']);
                $temp['score'] = 0 ;
                foreach ( $temp['style'] as $kt => $vt){
                    foreach ( $tags as $ktag => $vtag){
                        if (trim($vt) == trim($vtag)){
                            $temp['score'] = $temp['score'] + 10;
                        }
                    }
               }
               if ($temp['score'] > 0) {
                   $movie[] = $temp;
               }
            }

            print_r($movie);
        }
    }