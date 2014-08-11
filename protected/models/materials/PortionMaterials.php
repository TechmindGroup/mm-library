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

	public function scopes()
	{
		return array(
			'has_composition'=>array(
				'condition'=>'collection='.static::COLLECTION_FALSE
			),
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PortionMaterials the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
