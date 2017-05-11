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
            $movie_betal =  $this->core();
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

        /**
         *
         *  评分
         */
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
                    $this->changeTasteValue($result);
                   echo  json_encode(array("code" => 'success','msg' => '评分成功' ));
                }else{
                   echo  json_encode(array("code" => 'error','msg' => '评分失败' ));
                }
            }
        }


        /**
         * @return array
         *
         * 操作用户兴趣值这个表，取出计算后得分最高的8部分电影，推荐
         */
        public function core(){
            $movie = [];
            $last_ids_arr = [];
            $rate = [];
            $m_id = [];
            $last_movie_brief = [];
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
            $taste_value = $user_taste_value_model->getTasteValue($username);

           foreach ( $result as $k => $v){
                $temp['id'] = $v['id'];
                $temp['rate'] = $v['rate'];
                $temp['style'] = explode('/',$v['style']);
                $temp['score'] = 0 ;
                foreach ( $temp['style'] as $kt => $vt){
                    foreach ( $tags as $ktag => $vtag){
                        if (trim($vt) == trim($vtag)){
                            $temp['score'] = $temp['score'] + $taste_value[trim($vtag)];
                        }
                    }
               }
               if ($temp['score'] > 0) {
                   $movie[] = $temp;
                   $score[$k] = $temp['score'];
                   $m_id[$k] = $temp['id'];
                   $rate[$k] = $temp['rate'];
               }
            }
         // print_r($movie);exit;
            // 按分数排序，还有rate，取出前10部，
            array_multisort($score,SORT_NUMERIC,SORT_DESC,$rate,SORT_STRING,SORT_DESC,$movie);

            $arr = array_slice($movie,0,8);

            foreach ($arr as $ka => $va){
                $last_ids_arr[] = $va['id'];
            }
            $last_ids_str = implode(',',$last_ids_arr);
            $temp_movie_brief = $movie_model-> getMovieByIds($last_ids_str);



            foreach ($temp_movie_brief as $ktmb => $vtmb){
                $tmp['id'] = $vtmb['id'];
                $tmp['title'] = $vtmb['title'];
                $tmp['rate'] = $vtmb['rate'];
                $tmp['cover'] = "/Public/html/img/".basename($vtmb['cover']);
                $last_movie_brief[] = $tmp;
            }

           return $last_movie_brief;
        }




        public function changeTasteValue($result){
            $user_taste_value_model = new Model\UserTasteValueModel();
            $data['user_id'] = $result['user_id'];
            $data['user_name'] = $result['user_name'];
            $data['score'] = $result['score'];
            $tags = explode('/',$result['movie_style']);
            $score = $result['score'];
            foreach ( $tags as $key => $value){
                $data['tags'] = trim($value);
                $flag = $user_taste_value_model ->checkExist($data);
                if ($flag){
                    $last_tags_taste_value  = $flag; //初使兴趣值
                    $data['tags_taste_value'] = $this->calculateTasteValue($last_tags_taste_value,$score);
                    //更新兴趣值
                    $res = $user_taste_value_model ->change($data);
                }
                else{
                    $last_tags_taste_value = 0;   //初使值为兴趣值0
                    $data['tags_taste_value'] = $this->calculateTasteValue($last_tags_taste_value,$score);
                    //插入兴趣值
                    $res = $user_taste_value_model->add_new($data);
                }
            }
        }

        public function calculateTasteValue($last,$score){
               $now = $last - 0.1*($last - $score);

               if ($now>10){
                   $now = 10;
               }
               if ($now < 0){
                   $now = 0;
               }
              return $now;
        }

    }