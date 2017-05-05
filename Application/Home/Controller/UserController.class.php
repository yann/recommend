<?php
/**
 * Created by PhpStorm.
 * User: yangyue
 * Date: 2017/5/4
 * Time: 20:35
 */
namespace Home\Controller;
use Think\Controller;
use Home\Model;
 class UserController extends Controller{
     public function index(){
         $username = session('username');
         $password = session('password');
         $user_model = new Model\UserModel();
         $result = $user_model->getUserInfo($username,$password);
         $this->assign("userinfo",$result);
         $model = new Model\TagsModel();
         $tags = $model->getTags();
         $this->assign("tags",$tags);
         $this->display();
     }

     public function change(){
         $data = $_POST;
         if (!empty($data['tags']) and implode(',',$data['tags'])==$data['tag']){
             $result['tag'] = $data['tag'];
         }
         else if (empty($data['tags'])){
             $result['tag'] = $data['tag'];
         }
         else{
             $result['tag'] = implode(",",$data['tags']);
         }
         $result['username'] = $data['username'];
         $result['email'] = $data['email'];
         $result['password'] = $data['password'];
         $result['sex'] = $data['sex'];
         $result['age'] = $data['age'];
         $result['id'] = $data['id'];
         $user_model = new Model\UserModel();
         $res =  $user_model->update($result);
         if ($res){
             $this->success("修改成功","/index.php/Home/User/index");
         }else{
             $this->success("修改失败","/index.php/Home/User/index");
         }
     }
 }