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

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NotPortionMaterials the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
