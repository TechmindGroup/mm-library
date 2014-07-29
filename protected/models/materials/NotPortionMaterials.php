<?php

class NotPortionMaterials extends Materials
{
	public function beforeSave(){
		$this->portion_type = self::PORTION_STATUS_NOT_INCLUDED;
		$this->am = str_replace(' ','',microtime());
		return parent::beforeSave();
	}

	public function defaultScope(){
		return array(
			'condition'=>"t.portion_type=".self::PORTION_STATUS_NOT_INCLUDED,
		);
	}
}
