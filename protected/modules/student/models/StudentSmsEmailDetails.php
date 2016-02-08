<?php

/**
 * This is the model class for table "student_sms_email_details".
 * @package EduSec.Student.models
 */
class StudentSmsEmailDetails extends CActiveRecord
{
	public $student_first_name,$student_roll_no,$student_enroll_no,$student_mobile_no,$schedule_timing_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentSmsEmailDetails the static model class
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
		return 'student_sms_email_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email_sms_status,created_by,creation_date', 'required','message'=>''),
			array('student_id, email_sms_status,created_by,student_sms_email_details_schedule_flag', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('message_email_text,student_sms_email_details_fees_msg_type,student_sms_email_details_purpose,student_sms_email_details_ack,student_sms_email_details_schedule_date,student_sms_email_details_schedule_minute,student_sms_email_details_day,student_sms_email_details_hour,student_sms_email_details_month,student_sms_email_details_to_mobile,shift_id, student_sms_email_details_cron_no,student_sms_email_details_schedule_time_id,division_id,student_sms_email_details_course_id,student_sms_email_details_batch_id','safe'),
			array('message_email_text,student_sms_email_details_to_mobile,student_sms_email_details_schedule_time_id,student_sms_email_details_fees_msg_type','required','on'=>'scheduleFeesMessage','message'=>''),
			array('message_email_text,email_sms_status,student_sms_email_details_to_mobile','required','on'=>'selectedsms','message'=>''),
			array('student_sms_email_details_fees_msg_type,student_sms_email_details_schedule_time_id,student_sms_email_details_to_mobile','required','on'=>'scheduleAttendanceMessage','message'=>''),
			array('message_email_text','required','on'=>'mycreate','message'=>''),
			 array('student_sms_email_details_schedule_time_id','required','on'=>'update','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_sms_email_id,student_id,message_email_text,email_sms_status,created_by,creation_date, student_first_name,student_roll_no,student_enroll_no,student_sms_email_details_schedule_flag,student_sms_email_details_schedule_date,student_sms_email_details_schedule_time,student_sms_email_details_ack_id,student_sms_email_details_purpose,student_sms_email_details_fees_msg_type,student_sms_email_details_ack,branch_name,schedule_timing_name,student_sms_email_details_course_id,student_sms_email_details_batch_id', 'safe', 'on'=>'search,schedulesearch'),
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
			'rel_stud_sms_info' => array(self::BELONGS_TO, 'StudentInfo','', 'on' => 't.student_id=student_info_transaction_id'),
			'rel_stu_sms_user'=> array(self::BELONGS_TO, 'User', 'created_by'),
			'rel_schedule_time'=> array(self::BELONGS_TO, 'ScheduleTiming', 'student_sms_email_details_schedule_time_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_sms_email_id' => 'Student Sms Email',
			'student_id' => 'Student',
			'message_email_text' => 'Text',
			'email_sms_status' => 'Select Sms/Email',
			'created_by' => 'Created By',
			'creation_date' => 'Date',
			'student_enroll_no'=>'Enroll No.',
			'student_roll_no'=>'Roll No.',
			'student_first_name'=>'Name',
			'student_last_name'=>'Surname',
			'student_sms_email_details_ack'=>'Student Sms Acknowledgement',
			'student_sms_email_details_day'=>'Schedule day',
			'student_sms_email_details_hour'=>'Schedule Hour',
			'student_sms_email_details_month'=>'Schedule Month',
			'student_sms_email_details_schedule_minute'=>'Schedule Minute',
			'student_sms_email_details_schedule_date'=>'Schedule Date',
			'student_sms_email_details_ack'=>'Acknowledge Id',
			'student_sms_email_details_fees_msg_type'=>'To',
			'student_sms_email_details_to_mobile'=>'To Mobile',
			'student_sms_email_details_schedule_flag'=>'Schedule/Sent',
			'student_sms_email_details_schedule_time_id'=>'schedule timing',
			'student_sms_email_details_purpose'=>'Sms Purpose',
			'student_mobile_no'=>'Mobile No.',
			'schedule_timing_name'=>'Schedule Time',
			'student_sms_email_details_course_id'=>'Course',
			'student_sms_email_details_batch_id'=>'Batch'
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
		$criteria->condition = 'student_sms_email_details_schedule_flag=0';
		$criteria->with = array('rel_stud_sms_info');
		$criteria->compare('rel_stud_sms_info.student_first_name',$this->student_first_name,true);
		$criteria->compare('rel_stud_sms_info.student_mobile_no',$this->student_mobile_no,true);
		$criteria->compare('rel_stud_sms_info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('student_sms_email_id',$this->student_sms_email_id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('message_email_text',$this->message_email_text,true);
		$criteria->compare('student_sms_email_details_schedule_flag',$this->student_sms_email_details_schedule_flag);
		$stusms_data = new CActiveDataProvider(get_class($this),array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'rel_stud_sms_info.student_roll_no ASC',
				),
			));	
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $stusms_data ;
			return $stusms_data;
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions
	 *For schedule messages .
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function schedulesearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'student_sms_email_details_schedule_flag=1';
		$criteria->with = array('rel_stud_sms_info','rel_schedule_time');
		$criteria->compare('rel_stud_sms_info.student_first_name',$this->student_first_name,true);
		$criteria->compare('rel_stud_sms_info.student_enroll_no',$this->student_enroll_no,true);
		$criteria->compare('rel_schedule_time.schedule_timing_name',$this->schedule_timing_name,true);
		$criteria->compare('rel_stud_sms_info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('student_sms_email_id',$this->student_sms_email_id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('email_sms_status',$this->email_sms_status);
		$criteria->compare('student_sms_email_details_schedule_flag',$this->student_sms_email_details_schedule_flag);
			$schedulesms_data = new CActiveDataProvider(get_class($this),array(
			'criteria'=>$criteria,
			'sort'=>array(
					'defaultOrder'=>'student_sms_email_id DESC',
				),
			));		
			$_SESSION['schedulesms_data'] = $schedulesms_data;
			return $schedulesms_data;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
		'rel_stud_sms_info.student_first_name',
		'rel_stud_sms_info.student_mobile_no',
		'email_sms_status',
		'creation_date',
	        ),
	      'filename'=>'Student Sms-Emails', 'pdfFile'=>'student.views.studentSmsEmailDetails.exportGridtoReport');
              return $data;
        }
	private function dbDateSearch($value)
	{
		if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
		return date("Y-m-d",strtotime($matches[0]));
	    else
		return $value;
	}

}
