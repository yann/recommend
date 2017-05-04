<?php
/**
 * Created by PhpStorm.
 * User: yangyue
 * Date: 2017/5/3
 * Time: 19:40
 */
namespace Home\Model;
use Think\Model;
 class TagsModel extends  Model{
     protected $trueTableName = 'movie';
     protected $tableName = 'movie';
     public function getTags(){
         $res =  $this->query("select tname tag from tags");
         return $res;
     }
 }