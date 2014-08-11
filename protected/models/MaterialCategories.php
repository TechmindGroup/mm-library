<?php

/**
 * This is the model class for table "material_categories".
 *
 * The followings are the available columns in table 'material_categories':
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 *
 * The followings are the available model relations:
 * @property Materials[] $materials
 * @property MaterialCategories[] $childCategories
 * @property MaterialCategories $parentCategory
 */
class MaterialCategories extends CActiveRecord
{
	const _DEFAULT_ = 0;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'material_categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, parent_id', 'required'),
			array('name', 'length', 'max'=>255),
			//unique
			array('name', 'unique'),
			//default
			array('parent_id', 'default', 'value'=>self::_DEFAULT_),
			//exist
			array('parent_id', 'exist', 'attributeName'=>'id',
				'className' => 'MaterialCategories'),
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
			'materials' => array(self::HAS_MANY, 'Materials', 'category'),
			'childCategories' => array(self::HAS_MANY, 'MaterialCategories', 'parent_id'),
			'parentCategory' => array(self::BELONGS_TO, 'MaterialCategories', 'parent_id'),
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
			'parent_id' => Yii::t('material_categories','parent_category'),
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
		$criteria->compare('parent_id',$this->parent_id,true);
		//$criteria->addCondition('id > 0');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MaterialCategories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function scopes(){
		return array(
			'generalGroup'=>array(
				'condition'=>"t.parent_id=0",
			),
			'userCategories'=>array(
				'condition'=>"t.id > 0",
			)
		);
	}

	public function getGroupArray(){
		$criteria = new CDbCriteria();
		$criteria->order = 't.parent_id ASC';
//		$criteria->with = 'childCategories';

		$_categories = self::model()->findAll($criteria);
		$categoriesData = array();
		foreach ($_categories as $_cat){
			$categoriesData[$_cat->name] = CHtml::listData($_cat->childCategories, 'id', 'name');
		}
		return $categoriesData;
	}
}
