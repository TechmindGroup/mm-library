<?php

/**
 * This is the model class for table "material_composition_items".
 *
 * The followings are the available columns in table 'material_composition_items':
 * @property string $id
 * @property int $composition_id
 * @property string $nominal_number
 * @property string $description
 * @property int $quantity_unit
 * @property string $quantity_expected
 * @property string $quantity_not_charged
 *
 * The followings are the available model relations:
 * @property MaterialCompositions $composition
 * @property MaterialQunits $unit
 */
class MaterialCompositionItems extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'material_composition_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('composition_id, nominal_number, description, quantity_unit, quantity_expected'
			, 'required'),
			array('nominal_number, description'
			, 'length', 'max'=>255),
			//numerical
			array('quantity_expected, quantity_not_charged'
			, 'numerical'
			, 'integerOnly'=>true, 'min'=>0),
			//exist
			array('composition_id', 'exist', 'attributeName'=>'id',
				'className' => 'MaterialCompositions'),
			array('quantity_unit', 'exist', 'attributeName'=>'id',
				'className' => 'MaterialQunits'),
			//default
			array('quantity_expected, quantity_not_charged'
			, 'default'
			, 'value'=>0),
			//filter
			array('nominal_number, description'
				, 'filter', 'filter'=>'strip_tags'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nominal_number, description, description, quantity_unit, quantity_expected, quantity_not_charged'
			, 'safe', 'on'=>'search'),
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
			'composition' => array(self::BELONGS_TO, 'MaterialCompositions', 'composition_id'),
			'unit' => array(self::BELONGS_TO, 'MaterialQunits', 'quantity_unit'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'composition_id' => Yii::t('materialCompositionItems','composition_id'),
			'nominal_number' => Yii::t('materialCompositionItems','nominal_number'),
			'description' => Yii::t('materialCompositionItems','description'),
			'quantity_unit' => Yii::t('materialCompositionItems','quantity_unit'),
			'quantity_expected' => Yii::t('materialCompositionItems','quantity_expected'),
			'quantity_not_charged' => Yii::t('materialCompositionItems','quantity_not_charged'),
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
		$criteria->compare('composition_id',$this->composition_id,true);
		$criteria->compare('nominal_number',$this->nominal_number,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('quantity_unit',$this->quantity_unit,true);
		$criteria->compare('quantity_expected',$this->quantity_expected,true);
		$criteria->compare('quantity_not_charged',$this->quantity_not_charged,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MaterialCompositionItems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
