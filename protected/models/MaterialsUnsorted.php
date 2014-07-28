<?php

/**
 * This is the model class for table "materials_unsorted".
 *
 * The followings are the available columns in table 'materials_unsorted':
 * @property string $id
 * @property string $description
 * @property string $comment
 * @property string $nominal_number
 * @property string $code
 * @property string $category
 * @property string $quantity_unit
 * @property string $quantity
 *
 * The followings are the available model relations:
 * @property DepartmentMaterialsUnsorted[] $departmentMaterialsUnsorteds
 * @property MaterialCategories $category0
 * @property MaterialQunits $quantityUnit
 */
class MaterialsUnsorted extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'materials_unsorted';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, nominal_number, code, category, quantity_unit', 'required'),
			array('description, nominal_number', 'length', 'max'=>255),
			array('code', 'length', 'max'=>20),
			array('category, quantity_unit', 'length', 'max'=>10),
			array('quantity', 'length', 'max'=>6),
			array('comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, description, comment, nominal_number, code, category, quantity_unit, quantity', 'safe', 'on'=>'search'),
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
			'departmentMaterialsUnsorteds' => array(self::HAS_MANY, 'DepartmentMaterialsUnsorted', 'material_id'),
			'category0' => array(self::BELONGS_TO, 'MaterialCategories', 'category'),
			'quantityUnit' => array(self::BELONGS_TO, 'MaterialQunits', 'quantity_unit'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'description' => 'Description',
			'comment' => 'Comment',
			'nominal_number' => 'αριθμός ονομαστικού',
			'code' => 'αριθμος κώδικα',
			'category' => 'Category',
			'quantity_unit' => 'μονάδα μέτρησης',
			'quantity' => 'current quantity',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('nominal_number',$this->nominal_number,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('quantity_unit',$this->quantity_unit,true);
		$criteria->compare('quantity',$this->quantity,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MaterialsUnsorted the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
