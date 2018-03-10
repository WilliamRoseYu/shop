<?php
namespace Admin\Controller;
use Think\Controller;
class ClassifyController extends CommonController
{
	public $model = 'classify';
	public function _initialize(){
        $classify =D($this->model)->where('pid=0')->select();
        $this->assign('classifylists', $classify);
 //        var_dump($classify);
	// die();
	}

public function so(){
        $name = trim(I('get.name',''));
        $classify_id = I('get.classify_id','');
        if($name){
            $where['name'] = array('like',"%{$name}%");
        }
        if($classify_id&&$classify_id!='all'){
            $where['classify_id'] = $classify_id;
        }
        return $where;
    }
}