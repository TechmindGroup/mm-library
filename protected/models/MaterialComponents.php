<?php

/**
 * This is the model class for table "material_components".
 *
 * The followings are the available columns in table 'material_components':
 * @property string $id
 * @property string $composition_id
 * @property integer $sequence
 * @property string $description
 * @property string $nominal_number
 * @property string $unit
 * @property string $planned_string
 * @property string $planned_number
 * @property string $unallocated_string
 * @property string $unallocated_number
 *
 * The followings are the available model relations:
 * @property MaterialQunits $unit0
 * @property Materials $composition
 */
class MaterialComponents extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'material_components';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('composition_id, sequence, nominal_number, unit, planned_number, unallocated_number', 'required'),
			array('sequence', 'numerical', 'integerOnly'=>true),
			array('composition_id', 'length', 'max'=>20),
			array('description, nominal_number, planned_string, unallocated_string', 'length', 'max'=>255),
			array('unit, planned_number, unallocated_number', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, composition_id, sequence, description, nominal_number, unit, planned_string, planned_number, unallocated_string, unallocated_number', 'safe', 'on'=>'search'),
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
			'unit0' => array(self::BELONGS_TO, 'MaterialQunits', 'unit'),
			'composition' => array(self::BELONGS_TO, 'Materials', 'composition_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'composition_id' => 'composition id',
			'sequence' => 'Sequence',
			'description' => 'Description',
			'nominal_number' => 'αριθμός ονομαστικού υλικού που προσθέτω στην σύνθεση',
			'unit' => 'Unit',
			'planned_string' => 'προβλεπόμενη ποσοτητα ολογράφος',
			'planned_number' => 'προβλεπόμενη ποσοτητα αριθμητικά',
			'unallocated_string' => 'μη χορηγηθεισα ποσοτητα ολογράφος',
			'unallocated_number' => 'μη χορηγηθεισα ποσοτητα αριθμητικά',
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
		$criteria->compare('sequence',$this->sequence);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('nominal_number',$this->nominal_number,true);
		$criteria->compare('unit',$this->unit,true);
		$criteria->compare('planned_string',$this->planned_string,true);
		$criteria->compare('planned_number',$this->planned_number,true);
		$criteria->compare('unallocated_string',$this->unallocated_string,true);
		$criteria->compare('unallocated_number',$this->unallocated_number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MaterialComponents the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
