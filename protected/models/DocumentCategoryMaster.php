<?php

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
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doc_category_name, created_by, creation_date', 'required','message'=>''),
			array('created_by', 'numerical', 'integerOnly'=>true),
			array('document_category','safe','on'=>'studentDocumentsearch','message'=>''),
			array('department','required','on'=>'documentsearch','message'=>''),
			array('document_category','safe','on'=>'documentsearch','message'=>''),
			array('doc_category_name', 'length', 'max'=>30),
			array('doc_category_name', 'unique','message'=>'Already Exists.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('doc_category_id, doc_category_name, created_by, creation_date', 'safe', 'on'=>'search'),
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
			'Rel_document_user' => array(self::BELONGS_TO, 'User', 'created_by'),
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
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('doc_category_id',$this->doc_category_id);
		$criteria->compare('doc_category_name',$this->doc_category_name,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('creation_date',$this->creation_date,true);
	
		$document = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $document;
		return $document;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'doc_category_name',
			'Rel_document_user.user_organization_email_id::Created By',
			),
		'filename'=>'DocumentType-List', 'pdfFile'=>'/documentCategoryMaster/documentGeneratePDF');
              return $data;
        }
}
