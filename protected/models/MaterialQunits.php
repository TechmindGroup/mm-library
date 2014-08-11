<?php

/**
 * This is the model class for table "material_qunits".
 *
 * The followings are the available columns in table 'material_qunits':
 * @property string $id
 * @property string $name
 * @property string $code
 *
 * The followings are the available model relations:
 * @property DepartmentMaterials[] $departmentMaterials
 * @property MaterialComponents[] $materialComponents
 * @property Materials[] $materials
 */
class MaterialQunits extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'material_qunits';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>255),
			array('code', 'length', 'max'=>3),
			//unique
			array('name, code', 'unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('name', 'safe', 'on'=>'search'),
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
			'departmentMaterials' => array(self::HAS_MANY, 'DepartmentMaterials', 'quantity_unit'),
			'materialComponents' => array(self::HAS_MANY, 'MaterialComponents', 'unit'),
			'materials' => array(self::HAS_MANY, 'Materials', 'quantity_unit'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','id'),
			'name' => Yii::t('app','name'),
			'code' => Yii::t('material_quantity_units','code'),
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
		$criteria->compare('code',$this->code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MaterialQunits the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
