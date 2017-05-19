<?php
/**
 * Created by PhpStorm.
 * User: yangyue
 * Date: 2017/5/18
 * Time: 16:37
 */
namespace Home\Controller;
use Think\Controller;
use Home\Model;
    class AdminController extends Controller{
        public function index(){
            $admin = session('admin');
            if (empty($admin)){
                $this->success('请先登录','/index.php/Home/Admin/login');
                exit;
            }
            $this->display();
        }
        public function login(){
            $this->display();
        }
        public function dologin(){
            $admin_model = new Model\AdminModel();
            $date = $_POST;
            $username = $date['username'];
            $password = $date['password'];
            $check = $admin_model->check_admin($username,$password);
            if ($check[0]['num']){
                session('admin',$username);
                $this->success("管理员登录成功",'/index.php/Home/Admin/index');
            }else{
                $this->success("管理员登录失败",'/');
            }
        }

       public function searchMovie(){
           $word = $_POST['movie'];
           if (empty($word)){
               $this->error('error',"/index.php/Home/admin/");
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
           $this->display('search');

       }



        public function update()
        {

            $movie_model = new Model\MovieModel();
            $movie_brief_model = new Model\MovieBriefModel();
            $user_score_model = new Model\UserScoreModel();
            $user_model = new Model\UserModel();
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

        public function doupdate(){
            $date = $_POST;
            $id = $date['id'];
            $movie_model = new Model\MovieModel();
            $res = $movie_model->update($date);
            if ($res){
                $this->success("更新成功","/index.php/Home/admin/update?id=$id");
            }
            else{
                $this->success("error");
            }
        }

        public function delete(){
            $id = $_GET['id'];
            $movie_model = new Model\MovieModel();
            $res = $movie_model ->deleteById($id);
            if ($res){
                $this->success("delete success!",'/index.php/Home/admin/');
            }
        }

        public function addMovie(){
            $this->display();
        }
        public function doadd(){
            $date = $_POST;
            $date['ctime'] = date("Y-m-d h:d:s",time());
            $date['url'] = 0;
            $date['is_new'] = 0;
            $date['cover'] = 0;
            $date['douban_id'] = date('Ymdhis',time());
            $movie_model = new  Model\MovieModel();
            $movie_brief_model = new Model\MovieBriefModel();
            $res =  $movie_model->add_movie($date);
            if ($res){
                $arr['id'] = $res;
                $arr['brief'] = $date['brief'];
                $arr['douban_id'] = $date['douban_id'];
                $arr['ctime'] = $date['ctime'];
                $movie_brief_model->add_brief($arr);
                $this->success("新增成功",'/index.php/Home/admin/index');
                exit;
            }
            else{
                $this->success("新增失败",'/index.php/Home/admin/index');
            }

        }

    }