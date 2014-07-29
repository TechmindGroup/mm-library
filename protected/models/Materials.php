<?php

/**
 * This is the model class for table "materials".
 *
 * The followings are the available columns in table 'materials':
 * @property integer $id
 * @property string $am
 * @property integer $portion_type
 * @property string $description
 * @property string $comment
 * @property string $nominal_number
 * @property string $code
 * @property integer $category
 * @property integer $quantity_unit
 * @property integer $quantity
 * @property integer $quantity_last_year
 * @property integer $quantity_prov
 * @property integer $charged
 * @property integer $quantity_diff
 * @property string $major
 * @property number $price
 * @property integer $collection
 * @property integer $controlled
 * @property integer $attractive
 * @property integer $ammunition_baseload
 * @property integer $ammunition_ekp
 * @property integer $task_completion
 * @property integer $weapon
 * @property string $status
 *
 * The followings are the available model relations:
 * @property DepartmentMaterials[] $departmentMaterials
 * @property MaterialComponents[] $materialComponents
 * @property MaterialCategories $category0
 * @property MaterialQunits $quantityUnit
 */
class Materials extends CActiveRecord
{
	const PORTION_STATUS_INCLUDED = 1;
	const PORTION_STATUS_NOT_INCLUDED = 0;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'materials';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//required
			array('am, description, nominal_number, category, quantity_unit'
				, 'required'),
			//unique
			array('am, code', 'unique'),
			//string
			array('nominal_number, code', 'length', 'min'=>1),
			array('am, code', 'length', 'max'=>20),
			array('description, nominal_number', 'length', 'max'=>255),
			//boolean
			array('collection, controlled, attractive, ammunition_baseload, ammunition_ekp, task_completion, weapon'
				, 'boolean'),
			//numerical
			array('quantity, quantity_last_year, quantity_prov, charged'
				, 'numerical'
				, 'integerOnly'=>true, 'min'=>0),
			array('quantity, quantity_last_year, quantity_prov, charged, quantity_diff'
			, 'length'
			, 'max'=>6),
			array('price', 'numerical', 'min'=>0),
			array('price', 'length', 'max'=>10),
			//enum
			array('status', 'in', 'range'=>array('0', '1', '2')),
			//exist
			array('category', 'exist', 'attributeName'=>'id',
				'className' => 'MaterialCategories'),
			array('quantity_unit', 'exist', 'attributeName'=>'id',
				'className' => 'MaterialQunits'),
			//default
			array('quantity, quantity_last_year, quantity_prov, charged, price'
				, 'default'
				, 'value'=>0),
			array('collection, controlled, attractive, ammunition_baseload, ammunition_ekp, task_completion'
				, 'default'
				, 'value'=>false),
			array('portion_type'
				, 'default'
				, 'value'=>self::PORTION_STATUS_INCLUDED),
			array('status', 'default', 'value'=>'0'),
			array('description, comment, major', 'default', 'value'=>NULL),
			//filter
			array('description, comment, major', 'filter', 'filter'=>'strip_tags'),
			array('comment, major', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('am, portion_type, description, nominal_number, code, category, charged, major, collection, controlled, attractive, ammunition_baseload, ammunition_ekp, task_completion, weapon, status'
				, 'safe'
				, 'on'=>'search'),
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
			'departmentMaterials' => array(self::HAS_MANY, 'DepartmentMaterials', 'material_id'),
			'materialComponents' => array(self::HAS_MANY, 'MaterialComponents', 'composition_id'),
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
			'id' => Yii::t('app','id'),
			'am' => Yii::t('materials','portion_number'),
			'portion_type' => Yii::t('materials','portion_type'),
			'description' => Yii::t('materials','description'),
			'comment' => Yii::t('materials','comment'),
			'nominal_number' => Yii::t('materials','nominal_number'),
			'code' => Yii::t('materials','code'),
			'category' => Yii::t('materials','category'),
			'quantity_unit' => Yii::t('materials','quantity_unit'),
			'quantity' => Yii::t('materials','quantity'),
			'quantity_last_year' => Yii::t('materials','quantity_last_year'),
			'quantity_prov' => Yii::t('materials','quantity_prov'),
			'charged' => Yii::t('materials','charged'),
			'quantity_diff' => Yii::t('materials','quantity_diff'),
			'major' => Yii::t('materials','major'),
			'price' => Yii::t('materials','price'),
			'collection' => Yii::t('materials','collection'),
			'controlled' => Yii::t('materials','controlled'),
			'attractive' => Yii::t('materials','attractive'),
			'ammunition_baseload' => Yii::t('materials','ammunition_baseload'),
			'ammunition_ekp' => Yii::t('materials','ammunition_ekp'),
			'task_completion' => Yii::t('materials','task_completion'),
			'weapon' => Yii::t('materials','weapon'),
			'status' => Yii::t('materials','status'),
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
		$criteria->compare('am',$this->am,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('nominal_number',$this->nominal_number,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('quantity_unit',$this->quantity_unit,true);
		$criteria->compare('quantity',$this->quantity,true);
		$criteria->compare('quantity_last_year',$this->quantity_last_year,true);
		$criteria->compare('quantity_prov',$this->quantity_prov,true);
		$criteria->compare('charged',$this->charged,true);
		$criteria->compare('quantity_diff',$this->quantity_diff,true);
		$criteria->compare('collection',$this->collection);
		$criteria->compare('controlled',$this->controlled);
		$criteria->compare('attractive',$this->attractive);
		$criteria->compare('portion_type',$this->portion_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Materials the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave(){
		$this->quantity_diff = $this->quantity - $this->charged;
		return parent::beforeSave();
	}
}
