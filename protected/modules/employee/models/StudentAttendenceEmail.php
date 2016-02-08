<?php

/**
 * This is the model class for table "student_attendence_email".
 * @package EduSec.Employee.models
 */
class StudentAttendenceEmail extends CActiveRecord
{
	public $employee_first_name,$employee_last_name,$employee_attendance_card_id,$branch_name,$employee_transaction_designation_id;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentAttendenceEmail the static model class
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
		return 'student_attendence_email';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_attendence_email_emp_id, student_attendence_email_created_by, student_attendence_email_creation_date, student_attendence_email_minute, student_attendence_email_hour', 'required','message'=>''),
			array('student_attendence_email_emp_id,student_attendence_email_created_by, student_attendence_email_minute, student_attendence_email_hour', 'numerical', 'integerOnly'=>true),
			array('student_attendence_email_cron_no,employee_transaction_designation_id','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_attendence_email_id, student_attendence_email_emp_id,student_attendence_email_created_by, student_attendence_email_creation_date, student_attendence_email_minute, student_attendence_email_hour,employee_first_name,employee_last_name,branch_name, employee_attendance_card_id,student_attendence_email_cron_no,employee_transaction_designation_id', 'safe', 'on'=>'search'),
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
		      'rel_emp_info' => array(self::BELONGS_TO, 'EmployeeInfo','', 'on' => 'student_attendence_email_emp_id=employee_info_transaction_id'),
		      'rel_emp_tran' => array(self::BELONGS_TO, 'EmployeeTransaction','student_attendence_email_emp_id'),
		      'rel_branch' =>array(self::BELONGS_TO, 'Branch', 'student_attendence_email_branch_id'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_attendence_email_id' => 'Student Attendence Email',
			'student_attendence_email_emp_id' => 'Student Attendence Email Emp',
			'student_attendence_email_created_by' => 'Created By',
			'student_attendence_email_creation_date' => 'Creation Date',
			'student_attendence_email_minute' => 'Scheule Minute',
			'student_attendence_email_hour' => 'Scheule Hour',
			'employee_first_name'=>'Faculty First Name',
			'employee_last_name'=>'Surname',
			'employee_attendance_card_id'=>'Attendance Card No',
			'employee_transaction_designation_id'=>'Designation',
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
		
		$criteria->with = array('rel_emp_info','rel_branch','rel_emp_tran');
		$criteria->compare('student_attendence_email_id',$this->student_attendence_email_id);
		$criteria->compare('student_attendence_email_emp_id',$this->student_attendence_email_emp_id);
		$criteria->compare('student_attendence_email_branch_id',$this->student_attendence_email_branch_id);
		$criteria->compare('student_attendence_email_created_by',$this->student_attendence_email_created_by);
		$criteria->compare('student_attendence_email_creation_date',$this->student_attendence_email_creation_date,true);
		$criteria->compare('student_attendence_email_minute',$this->student_attendence_email_minute);
		$criteria->compare('student_attendence_email_hour',$this->student_attendence_email_hour);
		$criteria->compare('rel_emp_info.employee_first_name',$this->employee_first_name,true);
		$criteria->compare('rel_emp_info.employee_last_name',$this->employee_last_name,true); 
		$criteria->compare('rel_emp_info.employee_attendance_card_id',$this->employee_attendance_card_id,true);
		$criteria->compare('rel_emp_tran.employee_transaction_designation_id',$this->employee_transaction_designation_id,true);
		$criteria->compare('rel_branch.branch_name',$this->branch_name,true);	
		$StudentAttendenceEmail_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'rel_emp_tran.employee_transaction_designation_id DESC',
			),
		));
		   $_SESSION['StudentAttendenceEmail_records']=$StudentAttendenceEmail_records;
	return $StudentAttendenceEmail_records;
	}

}
