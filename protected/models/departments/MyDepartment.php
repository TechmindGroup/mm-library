<?php

class MyDepartment extends Departments
{
	const DEFAULT_ID = 1;

	public function beforeSave(){
		$this->default = self::DEFAULT_DEPARTMENT;
		return parent::beforeSave();
	}

	public function defaultScope(){
		return array(
			'condition'=>"t.default=".self::DEFAULT_DEPARTMENT,
		);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MyDepartment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
