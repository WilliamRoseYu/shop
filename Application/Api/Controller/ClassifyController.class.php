<?php
namespace Api\Controller;
use Think\Controller;
class ClassifyController extends CommonController{
		public function lists(){
			$pid = I('get.pid',0);
			if(!preg_match("/^\d+$/", $pid)){
				_res('参数不合法',false,'1001');
			}
			$classifymodel = D('Classify');
			$where = array('pid'=>$pid);
			$data = $classifymodel->getList($where);
			// echo D()->getLastSQL();
			// die();
			// var_dump($data);
			// die();
			foreach ($data as $key => $value) {
				$data[$key] = $classifymodel->format($value);

			}
			$result = array(
				"classify"=>$data,
				);
			// var_dump($result);
			// die();
			_res($result);

		}
	}
