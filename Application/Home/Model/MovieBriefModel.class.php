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

    public function add_brief($date){
        $id = $date['id'];
        $brief = "'".$date['brief']."'";
        $douban_id = "'".$date['douban_id']."'";
        $ctime = "'".$date['ctime']."'";
        $sql = "insert  into movie_brief(id,brief,douban_id,ctime)VALUES($id,$brief,$douban_id,$ctime)";
        return $this->execute($sql);
    }

}