<?php
namespace Api\Controller;

use Think\Controller;

class GoodsController extends CommonController
{
	public function list(){
		$classify_parent_id = I('get.classify_parent_id',0);
		$classify_id = I('get.classify_id',0);
		$order = I('get.order',1);
		$order_type = I('get.order_type',1);
		$goodsmodel = D('Goods');
		







		}
}