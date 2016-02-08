<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "student_status_master".
 * @package EduSec.models
 */

class Studentstatusmaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Studentstatusmaster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student_status_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('status_name, creation_date, created_by', 'required','message'=>""),
			array('created_by, organization_id,student_status_master_detain_shift_id', 'numerical', 'integerOnly'=>true),
			array('status_name', 'length', 'max'=>30),
			array('status_name', 'unique','message'=>'Already Exists.'),
			array('status_name','CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z ]+)$/','message'=>''),
			array('id, status_name, creation_date, created_by, organization_id,student_status_master_detain_shift_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		'Rel_org' => array(self::BELONGS_TO, 'Organization','organization_id'),
		'Rel_user' => array(self::BELONGS_TO, 'User','created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'status_name' => 'Status',
			'creation_date' => 'Creation Date',
			'created_by' => 'Created By',
			'organization_id' => 'Organization',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('status_name',$this->status_name,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('organization_id',$this->organization_id);
		$criteria->compare('student_status_master_detain_shift_id',$this->student_status_master_detain_shift_id);
		

		$data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['status_data'] = $data;
		return $data; 
	}
}
