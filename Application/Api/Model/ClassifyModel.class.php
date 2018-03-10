<?php
namespace Api\Model;
use Api\Model\BaseModel;
class ClassifyModel extends BaseModel {
	public function format($info){
		
		$data = array(
        "id"=>$info['id'],
        "name"=>$info['name']
        );
        return $data;
	}
}