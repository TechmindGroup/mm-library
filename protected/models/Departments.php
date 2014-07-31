<?php

/**
 * This is the model class for table "departments".
 *
 * The followings are the available columns in table 'departments':
 * @property integer $id
 * @property string $name
 * @property string $abbreviation
 * @property string $administration
 * @property string $administration_abbreviation
 * @property string $formation
 * @property string $code
 * @property string $code_completion
 * @property string $address
 * @property string $city
 * @property string $ea
 * @property integer $default
 *
 * The followings are the available model relations:
 * @property DepartmentMaterials[] $departmentMaterials
 * @property DepartmentMaterialsUnsorted[] $departmentMaterialsUnsorteds
 * @property MaterialCompositions[] $materialCompositions
 */
class Departments extends CActiveRecord
{
	const DEFAULT_DEPARTMENT = 1;
	const NO_DEFAULT_DEPARTMENT = 0;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'departments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('name', 'required'),
			array('name, abbreviation, administration, administration_abbreviation, formation, code, address, city, code_completion, ea', 'length', 'max'=>255),
			//default
			array('default'
			, 'default'
			, 'value'=>self::NO_DEFAULT_DEPARTMENT),
			array('default', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, abbreviation, administration, administration_abbreviation, formation, code, address, city, code_completion, ea, default', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'departmentMaterials' => array(self::HAS_MANY, 'DepartmentMaterials', 'department_id'),
			'departmentMaterialsUnsorteds' => array(self::HAS_MANY, 'DepartmentMaterialsUnsorted', 'department_id'),
			'materialCompositions' => array(self::HAS_MANY, 'MaterialCompositions', 'department_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name' => Yii::t('departments','name'),
			'abbreviation' => Yii::t('departments','abbreviation'),
			'administration' => Yii::t('departments','administration'),
			'administration_abbreviation' => Yii::t('departments','administration_abbreviation'),
			'formation' => Yii::t('departments','formation'),
			'code' => Yii::t('departments','code'),
			'address' => Yii::t('departments','address'),
			'city' => Yii::t('departments','city'),
			'code_completion' => Yii::t('departments','code_completion'),
			'ea' => Yii::t('departments','ea'),
			'default' => Yii::t('departments','default'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Departments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
