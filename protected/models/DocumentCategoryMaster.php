<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "document_category_master".
 * @package EduSec.models
 */

class DocumentCategoryMaster extends CActiveRecord
{
	public $academic_year,$sem,$branch,$document_category,$department;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DocumentCategoryMaster the static model class
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
		return 'document_category_master';
	}

	/**
	 * @return default scope to get data from table in order to "doc_category_name".
	 */
	public function defaultScope() 
	{
       		return array(
           		'order' => 'doc_category_name'
	        );
  	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('doc_category_name, created_by, creation_date', 'required','message'=>''),
			array('created_by, docs_category_organization_id', 'numerical', 'integerOnly'=>true),
array('document_category','required','on'=>'studentDocumentsearch','message'=>''),
array('department,document_category','required','on'=>'documentsearch','message'=>''),
			array('doc_category_name', 'length', 'max'=>30),
			array('doc_category_name', 'unique','message'=>'Already Exists.'),
			array('doc_category_id, doc_category_name, created_by, creation_date, docs_category_organization_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'Rel_document_user' => array(self::BELONGS_TO, 'User', 'created_by'),
		       'Rel_document_org' => array(self::BELONGS_TO, 'Organization', 'docs_category_organization_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'doc_category_id' => 'Document Category',
			'doc_category_name' => 'Category Name',
			'created_by' => 'Created By',
			'creation_date' => 'Creation Date',
			'docs_category_organization_id' => 'Organization',
			'academic_year'=>'Academic Year',
			'sem'=>'Semester',
			'branch'=>'Branch',
			'document_category'=>'Document Category',
			'department'=>'Department',
		);
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('doc_category_id',$this->doc_category_id);
		$criteria->compare('doc_category_name',$this->doc_category_name,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('docs_category_organization_id',$this->docs_category_organization_id);

		$document = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		 $_SESSION['document']=$document;
		return $document;
	}
}
