<?php

/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "student_photos".
 * @package EduSec.models
 */

class StudentPhotos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentPhotos the static model class
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
		return 'student_photos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('student_photos_path', 'file','maxSize'=>1024*1024*2, 'tooLarge'=>'The Photo was larger than 2MB. Please upload a smaller photo.','types'=>'jpg, jpeg, gif, png, JPG', 'allowEmpty'=>true),
			array('student_photos_id, student_photos_desc, student_photos_path', 'safe', 'on'=>'search'),
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
			'student_photos_id' => 'Student Photos',
			'student_photos_desc' => 'Photo Description',
			'student_photos_path' => 'Photo',
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

		$criteria->compare('student_photos_id',$this->student_photos_id);
		$criteria->compare('student_photos_desc',$this->student_photos_desc,true);
		$criteria->compare('student_photos_path',$this->student_photos_path,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
