<?php
/**
 * Created by PhpStorm.
 * User: yangyue
 * Date: 2017/5/2
 * Time: 14:12
 */
namespace Home\Controller;
use Think\Controller;
class FunctionController extends Controller{
    public function login(){
        $this->display();
    }
    public function register(){
        $this->display();
    }
    public function doregister(){
        $data= $_POST;
        print_r($data);
    }
}