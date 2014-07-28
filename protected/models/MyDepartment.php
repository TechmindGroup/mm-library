<?php

/**
 * This is the model class for table "my_department".
 *
 * The followings are the available columns in table 'my_department':
 * @property string $id
 * @property string $name
 * @property string $abbreviation
 * @property string $administration
 * @property string $administration_abbreviation
 * @property string $formation
 * @property string $code
 * @property string $address
 * @property string $city
 * @property string $code_completion
 * @property string $ea
 */
class MyDepartment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'my_department';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, abbreviation, administration, administration_abbreviation, formation, code, address, city, code_completion, ea', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, abbreviation, administration, administration_abbreviation, formation, code, address, city, code_completion, ea', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'abbreviation' => 'συντόμογραφία',
			'administration' => 'διαχείρηση',
			'administration_abbreviation' => 'συντομογραφία διαχείρησης',
			'formation' => 'σχηματισμός',
			'code' => 'Code',
			'address' => 'Address',
			'city' => 'City',
			'code_completion' => 'κωδικός αποστολή συμπληρώσεως',
			'ea' => 'επιστρατευούσα άρχη',
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
		$criteria->compare('abbreviation',$this->abbreviation,true);
		$criteria->compare('administration',$this->administration,true);
		$criteria->compare('administration_abbreviation',$this->administration_abbreviation,true);
		$criteria->compare('formation',$this->formation,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('code_completion',$this->code_completion,true);
		$criteria->compare('ea',$this->ea,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
