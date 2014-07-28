<?php

class PortionMaterials extends Materials
{
	public function beforeSave(){
		$this->portion_type = self::PORTION_STATUS_INCLUDED;
		return parent::beforeSave();
	}

	public function defaultScope(){
		return array(
			'condition'=>"t.portion_type=".self::PORTION_STATUS_INCLUDED,
		);
	}

}
