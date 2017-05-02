<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model;
class IndexController extends Controller
{
    public function index()
    {
        $username = session('username');
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
        $this->assign('username',$username);
        $this->assign("data",$result);
         $this->display();
    }

    /**
     *
     * 获得详细信息
     */
    public function getdetail(){
        $movie_model = new Model\MovieModel();
        $movie_brief_model = new Model\MovieBriefModel();
        if (empty($_GET['id'])){

        }else{
           $res = $movie_model->getDetailByid($_GET['id']);
           $this->assign("detail",$res);
           $douban_id = $movie_model->getDoubanIdById($_GET['id'])[0]['douban_id'];
           $brief = $movie_brief_model->getMovieBriefById($douban_id)[0]['brief'];
           $this->assign("brief",$brief);
        }

        $this->display();
    }

    /*
     *
     * 标签栏处理
     * */
    public function tags(){
        $cat = $_GET['cat'];
        if (empty($cat)){
            $this->error('error',"/");
        }
        $result = array();
        $movie_model = new Model\MovieModel();
        $res = $movie_model->getMovieBrief($cat);
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

    public function search(){
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
}