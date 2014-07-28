<?php

/**
 * This is the model class for table "department_materials".
 *
 * The followings are the available columns in table 'department_materials':
 * @property string $id
 * @property string $material_id
 * @property string $quantity
 * @property string $planned_quantity
 * @property string $quantity_unit
 * @property string $department_id
 * @property string $create_timestamp
 *
 * The followings are the available model relations:
 * @property Materials $material
 * @property MaterialQunits $quantityUnit
 * @property Departments $department
 */
class DepartmentMaterials extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'department_materials';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('material_id, quantity, quantity_unit, department_id, create_timestamp', 'required'),
			array('material_id', 'length', 'max'=>20),
			array('quantity, planned_quantity', 'length', 'max'=>6),
			array('quantity_unit, department_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, material_id, quantity, planned_quantity, quantity_unit, department_id, create_timestamp', 'safe', 'on'=>'search'),
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
			'material' => array(self::BELONGS_TO, 'Materials', 'material_id'),
			'quantityUnit' => array(self::BELONGS_TO, 'MaterialQunits', 'quantity_unit'),
			'department' => array(self::BELONGS_TO, 'Departments', 'department_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'material_id' => 'Material',
			'quantity' => 'Quantity',
			'planned_quantity' => 'Planned Quantity',
			'quantity_unit' => 'Quantity Unit',
			'department_id' => 'Department',
			'create_timestamp' => 'Create Timestamp',
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
		$criteria->compare('material_id',$this->material_id,true);
		$criteria->compare('quantity',$this->quantity,true);
		$criteria->compare('planned_quantity',$this->planned_quantity,true);
		$criteria->compare('quantity_unit',$this->quantity_unit,true);
		$criteria->compare('department_id',$this->department_id,true);
		$criteria->compare('create_timestamp',$this->create_timestamp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DepartmentMaterials the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
