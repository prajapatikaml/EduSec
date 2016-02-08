<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "student_docs_trans".
 * @package EduSec.models
 */

class StudentDocsTrans extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentDocsTrans the static model class
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
		return 'student_docs_trans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('student_docs_trans_user_id, student_docs_trans_stud_docs_id', 'required','message'=>''),
			array('student_docs_trans_user_id, student_docs_trans_stud_docs_id', 'numerical', 'integerOnly'=>true),
			array('student_docs_trans_id, student_docs_trans_user_id, student_docs_trans_stud_docs_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'Rel_Stud_doc' => array(self::BELONGS_TO, 'StudentDocs', 'student_docs_trans_stud_docs_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_docs_trans_id' => 'Student Docs Trans',
			'student_docs_trans_user_id' => 'Student Docs Trans User',
			'student_docs_trans_stud_docs_id' => 'Student Documents',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('student_docs_trans_id',$this->student_docs_trans_id);
		$criteria->compare('student_docs_trans_user_id',$this->student_docs_trans_user_id,true);
		$criteria->compare('student_docs_trans_stud_docs_id',$this->student_docs_trans_stud_docs_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Return student document details for select user.
	 */
	public function mysearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		if(Yii::app()->user->getState('stud_id'))
		{
		$criteria->condition = 'student_docs_trans_user_id = :student_user_id';
	        $criteria->params = array(':student_user_id' => Yii::app()->user->getState('stud_id'));
		}
		else
		{
		$criteria->condition = 'student_docs_trans_user_id = :student_user_id';
	        $criteria->params = array(':student_user_id' => $_REQUEST['id']);
		}
		$criteria->compare('student_docs_trans_id',$this->student_docs_trans_id);
		$criteria->compare('student_docs_trans_user_id',$this->student_docs_trans_user_id,true);
		$criteria->compare('student_docs_trans_stud_docs_id',$this->student_docs_trans_stud_docs_id,true);
		
		$student_docs = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['student_docs']=$student_docs;
		return $student_docs;
	}

}
