<?php
/**
 * Created by PhpStorm.
 * User: yangyue
 * Date: 2017/5/2
 * Time: 10:09
 */
namespace Home\Model;
use Think\Model;
class MovieBriefModel extends Model{
    protected $trueTableName = 'movie_brief';
    protected $tableName = 'movie_brief';
  /**
     * @param $id
     * @return mixed
     */
    public function getMovieBriefById($id){
    $res = $this->query("select brief from movie_brief where douban_id = $id");
    return $res;
}
}