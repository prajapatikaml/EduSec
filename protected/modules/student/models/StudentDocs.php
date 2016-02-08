<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "student_docs".
 * @package EduSec.models
 */

class StudentDocs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentDocs the static model class
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
		return 'student_docs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_docs_path, doc_category_id, title,student_docs_submit_date', 'required','message'=>""),
			array('student_docs_desc', 'length', 'max'=>50),

			array('student_docs_path', 'file', 'types'=>'jpeg, jpg, pdf, txt, doc,docx, gif, png', 'maxSize'=>1024*1024*2, 'tooLarge'=>'The document was larger than 2MB. Please upload a smaller document.',),
			
			array('title','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z& ]+([-]*[a-zA-Z0-9 ]+)*$/','message'=>''),			
			array('student_docs_id, student_docs_desc, student_docs_path, doc_category_id,student_docs_submit_date, title', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_docs_id' => 'Student Docs',
			'student_docs_desc' => 'Document Description',
			'student_docs_path' => 'Document',
			'doc_category_id' => 'Document Category', 
			'title' => 'Title',
			'student_docs_submit_date'=>'Submit Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('student_docs_id',$this->student_docs_id);
		$criteria->compare('doc_category_id',$this->doc_category_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('student_docs_desc',$this->student_docs_desc,true);
		$criteria->compare('student_docs_path',$this->student_docs_path,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
}
