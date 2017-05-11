<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model;
import('ORG.Util.Page');
use Think\Page;
class IndexController extends Controller
{
    public function index()
    {
        $result = array();
        $movie_model = new Model\MovieModel();
        $res = $movie_model->getNewMovieBrief();
        foreach ($res as $key => $value){
            $temp['id'] = $value['id'];
            $temp['title'] = $value['title'];
            $temp['rate'] = $value['rate'];
            $temp['cover'] = "/Public/html/img/".basename($value['cover']);
            $result[] = $temp;
        }
        $username = session('username');
        $this->assign('username',$username);
            $this->assign("data", $result);
            $this->display();

    }
    /**
     *
     * 获得详细信息
     */
    public function getdetail()
    {
        $username = session('username');
        $movie_model = new Model\MovieModel();
        $movie_brief_model = new Model\MovieBriefModel();
        $user_score_model = new Model\UserScoreModel();
        $user_model = new Model\UserModel();
        if (!empty($username)) {
            $result = $user_model->getUserIdByName($username);
            $user_id = $result[0]['id'];
            $this->assign('username', $username);
            $score = $user_score_model->getScore($user_id, $_GET['id']);
            if ($score){
                $this ->assign("score",$score);
            }
        }
            if (empty($_GET['id'])) {
                $this->error("请选择详细的电影", '/');
            } else {
                $res = $movie_model->getDetailByid($_GET['id']);
                $res[0]['cover'] = "/Public/html/img/".basename($res[0] ['cover']);
                $res[0]['time'] = date('Y-m-d',strtotime($res[0]['time']));
             
                $this->assign("detail", $res);
                $douban_id = $movie_model->getDoubanIdById($_GET['id'])[0]['douban_id'];
                $brief = $movie_brief_model->getMovieBriefById($douban_id)[0]['brief'];
                $this->assign("brief", $brief);
            $this->display();
        }
    }

    /*
     *
     * 标签栏处理
     * */
    public function tags(){
        $username = session('username');
        $this->assign('username',$username);
        $cat = $_GET['cat'];
        if (empty($cat)){
            $this->error('error',"/");
        }
        $result = array();
        $movie_model = new Model\MovieModel();
        $count = $movie_model->getCount($cat);
        $Page = new Page($count,10);

      //  $res = $movie_model->getMovieBrief($cat);
        $User = M('Movie');
        $category = "'".$cat."'" ;
        $res = $User->where("category=$category")->limit($Page->firstRow.','.$Page->listRows)->select();
       
        foreach ($res as $key => $value){
            $temp['id'] = $value['id'];
            $temp['title'] = $value['title'];
            $temp['rate'] = $value['rate'];
            $temp['cover'] = "/Public/html/img/".basename($value['cover']);
            $result[] = $temp;
        }
         $show = $Page->show();
        $this->assign("page",$show);
        $this->assign("data",$result);
        $this->display('index');
    }

    public function search(){
        $username = session('username');
        $this->assign('username',$username);
        $word = $_POST['movie'];
        if (empty($word)){
            $this->error('error',"/");
        }
        $movie_model = new Model\MovieModel();
        $res = $movie_model->search($word);
        foreach ($res as $key => $value){
            $temp['id'] = $value['id'];
            $temp['title'] = $value['title'];
            $temp['rate'] = $value['rate'];
            $temp['cover'] = "/Public/html/img/".basename($value['cover']);
            $result[] = $temp;
        }
        $this->assign("data",$result);
        $this->display('index');
    }


    public function destroy(){
        session(null);
        $this->success('退出成功','/',2);
    }
}