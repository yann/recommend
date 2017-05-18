<?php
/**
 * Created by PhpStorm.
 * User: yangyue
 * Date: 2017/5/18
 * Time: 10:59
 */
namespace Home\Controller;
use Think\Controller;
use Home\Model;
    class  HistoryController extends Controller
    {
        public function index()
        {
            $username = session('username');
            if (empty($username))
            {
                $this->error("请先登录", "/index.php/Home/Function/login");
            }

            $user_score_model =  new Model\UserScoreModel();
            $score  = $user_score_model->getInfoByName($username);

            $user_taste_value_model = new Model\UserTasteValueModel();
            $info = $user_taste_value_model ->getInfo($username);
            $this->assign('taste',$info);
            $this->assign('score',$score);
            $this->assign('username', $username);
            $this->display();
        }
    }