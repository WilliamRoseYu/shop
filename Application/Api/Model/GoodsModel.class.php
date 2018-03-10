<?php
namespace Api\Model;
use Api\Model\BaseModel;
class GoodsModel extends BaseModel {
	protected $_link = array(
        'classify' => array(
		    'mapping_type'  => self::BELONGS_TO,
		    'class_name'    => 'classify',
		    'foreign_key'   => 'classify_id',
		    'mapping_name'  => 'classify',
		),
     );

}