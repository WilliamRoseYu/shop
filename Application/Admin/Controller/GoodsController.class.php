<?php
namespace Admin\Controller;

use Think\Controller;

class GoodsController extends CommonController
{
	public $model = 'goods'; // 本控制器使用的model
	public function _initialize(){
		$classify =D('classify')->where('pid=0')->select();
		foreach ($classify as $key=>$value) {
			$child = D('classify')->where('pid='.$value['id'])->select();
			$classify[$key]['child'] = $child;
		}
		// var_dump($classify);
		// die();


		$classify1=D('classify')->where('status=1')->select();
		foreach ($classify1 as $c) {
			$classify1[$c['id']] = $c['name'];
		}
		// var_dump($classify1);
		// die();
		$this->assign('classify1', $classify1);

        $this->assign('classifylists', $classify);
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