<?php
/**
 * Created by PhpStorm.
 * User: yangyue
 * Date: 2017/5/2
 * Time: 14:12
 */
namespace Home\Controller;
use Think\Controller;
use Home\Model;
class FunctionController extends Controller{
    public function login(){
        $this->display();
    }

    public function dologin(){
       $data = $_POST;
       $result['username'] = $data['username'];
       $result['password'] = $data['password'];
        $user_model = new Model\UserModel();
        $login =   $user_model->login($result);
        if ($login){
            session('username',$login);
            $this->success('登录成功,正在为你跳转', '/',3);
        }else{
            $this->success('用户名或者密码错误,请重新输入', '/index.php/Home/Function/login',3);
        }
    }
    public function register(){
        $model = new Model\TagsModel();
        $tags = $model->getTags();
        $this->assign("tags",$tags);
        $this->display();
    }
    public function doregister(){
        $data= $_POST;
        $result['sex'] = $data['sex'];
        $result['email'] = $data['email'];
        $result['username'] = $data['username'];
        $result['age'] = $data['age'];
        $result['password'] = $data['password'];
        $result['tag'] = implode(',',$data['tags']);

        $user_model = new Model\UserModel();
        $user_flag =$user_model->checkUsername($result['username']);
        if ($user_flag){
            $this->success('用户名已存在,请重新输入！', '/index.php/Home/Function/register',3);
            exit;
        }

        $email_flag = $user_model->checkEmail($result['email']);
        if ($email_flag){
            $this->success('邮箱已存在,请重新输入!', '/index.php/Home/Function/register',3);
            exit;
        }

       $res =  $user_model->register($result);
        if ($res){
            $this->success('注册成功', '/index.php/Home/Function/login',3);
        }else{
            $this->success('注册失败', '/index.php/Home/Function/register',3);
        }
       // print_r($result);
    }



}