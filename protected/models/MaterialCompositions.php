<?php

/**
 * This is the model class for table "material_compositions".
 *
 * The followings are the available columns in table 'material_compositions':
 * @property integer $id
 * @property integer $material_id
 * @property integer $department_id
 * @property string $documentary_number
 *
 * The followings are the available model relations:
 * @property Departments $department
 * @property Materials $material
 */
	class MaterialCompositions extends CActiveRecord
	{
		/**
		 * @return string the associated database table name
		 */
		public function tableName()
		{
			return 'material_compositions';
		}

		/**
		 * @return array validation rules for model attributes.
		 */
		public function rules()
		{
			// NOTE: you should only define rules for those attributes that
			// will receive user inputs.
			return array(
				array('material_id, department_id, documentary_number', 'required'),
				array('documentary_number', 'length', 'max'=>255),
				//exists
				array('material_id', 'exist', 'attributeName'=>'id',
					'className' => 'Materials'),
				array('department_id', 'exist', 'attributeName'=>'id',
					'className' => 'Departments'),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, material_id, department_id, documentary_number', 'safe', 'on'=>'search'),
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
				'department' => array(self::BELONGS_TO, 'Departments', 'department_id'),
				'material' => array(self::BELONGS_TO, 'Materials', 'material_id'),
			);
		}

		/**
		 * @return array customized attribute labels (name=>label)
		 */
		public function attributeLabels()
		{
			return array(
				'id' => 'ID',
				'material_id' => Yii::t('materialCompositions','material'),
				'department_id' => Yii::t('materialCompositions','department'),
				'documentary_number' => Yii::t('materialCompositions','documentary_number'),
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
			$criteria->compare('department_id',$this->department_id,true);
			$criteria->compare('documentary_number',$this->documentary_number,true);

			return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
			));
		}

		/**
		 * Returns the static model of the specified AR class.
		 * Please note that you should have this exact method in all your CActiveRecord descendants!
		 * @param string $className active record class name.
		 * @return MaterialCompositions the static model class
		 */
		public static function model($className=__CLASS__)
		{
			return parent::model($className);
		}
	}
