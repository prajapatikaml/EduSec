<?php

/**
 * This is the model class for table "student_certificate_details_table".
 * @package EduSec.Student.models
 */
class StudentCertificateDetailsTable extends CActiveRecord
{

	public $student_first_name,$certificate_title,$student_last_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentCertificateDetailsTable the static model class
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
		return 'student_certificate_details_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_certificate_details_table_student_id,student_semester_id, student_certificate_type_id,certificate_reference_number, student_certificate_created_by, student_certificate_creation_date, student_certificate_org_id', 'required','message'=>''),
						
			array('student_certificate_details_table_student_id, student_certificate_type_id, student_certificate_created_by, student_certificate_org_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_certificate_details_table_id, student_certificate_details_table_student_id, student_certificate_type_id, student_certificate_created_by, student_certificate_creation_date,certificate_reference_number, student_certificate_org_id,student_first_name,certificate_title,student_last_name', 'safe', 'on'=>'search'),
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
			'cer_student_id' => array(self::BELONGS_TO, 'StudentInfo','', 'on' => 'student_certificate_details_table_student_id=student_info_transaction_id'),
			'stu_certificate_user' => array(self::BELONGS_TO, 'User', 'student_certificate_created_by'),
			'stu_certificate_name' => array(self::BELONGS_TO, 'Certificate','student_certificate_type_id'),	

		);
	}

	/** 0
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_certificate_details_table_id' => 'Student Certificate Details Table',
			'student_certificate_details_table_student_id' => 'Student Name',
			'student_certificate_type_id' => 'Certificate Type',
			'student_certificate_created_by' => 'Created By',
			'student_certificate_creation_date' => 'Creation Date',
			'student_certificate_org_id' => 'Organization',
			'student_first_name'=>'First Name',
			'student_last_name'=>'Surname',
			//'certificate_reference_number'=>'Reference Number',
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
		$criteria->with = array('cer_student_id');
		$criteria->compare('cer_student_id.student_first_name',$this->student_first_name,true);
		$criteria->compare('cer_student_id.student_last_name',$this->student_last_name,true);
		$criteria->compare('student_certificate_details_table_id',$this->student_certificate_details_table_id);
		$criteria->compare('student_certificate_details_table_student_id',$this->student_certificate_details_table_student_id);
		$criteria->compare('student_certificate_type_id',$this->student_certificate_type_id);
		$criteria->compare('student_certificate_created_by',$this->student_certificate_created_by);
		$criteria->compare('student_certificate_creation_date',$this->student_certificate_creation_date,true);
		$criteria->compare('certificate_reference_number',$this->certificate_reference_number,true);
		$criteria->compare('student_certificate_org_id',$this->student_certificate_org_id);
		$StudentCertificateDetailsTable_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'student_certificate_details_table_id DESC',
				),
		));
		  unset($_SESSION['exportData']);	
		  $_SESSION['exportData']=$StudentCertificateDetailsTable_records;
		return $StudentCertificateDetailsTable_records;
	}
	public function Studentsearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		if(Yii::app()->user->getState('stud_id'))
		{
		$criteria->condition = 'student_certificate_details_table_student_id = :student_certificate_details_table_student_id';
			$criteria->params = array(':student_certificate_details_table_student_id' => Yii::app()->user->getState('stud_id'));
		}
		else
		{
		$criteria->condition = 'student_certificate_details_table_student_id = :student_certificate_details_table_student_id';
			$criteria->params = array(':student_certificate_details_table_student_id' => $_REQUEST['id']);
		}
		$criteria->with = array('cer_student_id');
		$criteria->compare('cer_student_id.student_first_name',$this->student_first_name,true);
		//$criteria->compare('stu_certificate_name.certificate_title',$this->certificate_title,true);


		$criteria->compare('student_certificate_details_table_id',$this->student_certificate_details_table_id);
		$criteria->compare('student_certificate_details_table_student_id',$this->student_certificate_details_table_student_id);
		$criteria->compare('student_certificate_type_id',$this->student_certificate_type_id);
		$criteria->compare('student_certificate_created_by',$this->student_certificate_created_by);
		$criteria->compare('student_certificate_creation_date',$this->student_certificate_creation_date,true);
		$criteria->compare('student_certificate_org_id',$this->student_certificate_org_id);
		
		$StudentCertificateDetailsTable_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);	
		$_SESSION['exportData']=$StudentCertificateDetailsTable_records;
		return $StudentCertificateDetailsTable_records;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
		'cer_student_id.student_first_name',
		'cer_student_id.student_last_name',
		'stu_certificate_name.certificate_title',
		'certificate_reference_number',
		),
	      'filename'=>'Student Certificates', 'pdfFile'=>'student.views.studentCertificateDetailsTable.studentcertificateGeneratePdf');
              return $data;
        }

}
