<?php

/**
 * This is the model class for table "employee_notification".
 * @package EduSec.Notification.models
 */
class EmployeeNotification extends CActiveRecord
{
	public $department_name,$check,$employee_first_name,$employee_attendance_card_id,$employee_last_name;
	/*** Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployeeNotification the static model class
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
		return 'employee_notification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alert_after_date, alert_before_date, content, title, employee_notification_creation_date', 'required','message'=>''),
			array('from, emp_notice_to, notifiyii_department_id,employee_notification_read', 'numerical', 'integerOnly'=>true),
			//array('content', 'length', 'max'=>50),
			array('link', 'length', 'max'=>300),
			array('title', 'length', 'max'=>50),
			//array('title', 'CRegularExpressionValidator', 'pattern'=>"/^\w[a-zA-Z0-9\s!\"\?;%:?*()<>\/#$\^&@\-+_=|,.~{}\[\]'\\\\]+$/",'message'=>''),
	
			array('emp_notice_to,notifiyii_department_id,employee_notification_type,employee_notification_leave_application_id,employee_notification_compensatory_leave_id','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, expire, alert_after_date, alert_before_date, content, link, title, from, emp_notice_to, notifiyii_department_id,employee_first_name,employee_attendance_card_id,employee_notification_creation_date,employee_notification_read,employee_notification_leave_application_id,employee_notification_compensatory_leave_id,employee_last_name', 'safe', 'on'=>'search'),
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
		        'reads' => array(self::HAS_MANY, 'EmployeeNotifyiiReads', 'notification_id'),
		       	'Rel_department'=>array(self::BELONGS_TO,'Department','notifiyii_department_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User', 'from'),
			'rel_emp_id' => array(self::BELONGS_TO, 'EmployeeInfo','', 'on' => 't.emp_notice_to=employee_info_transaction_id'),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'expire' => 'Expire Date',
			'alert_after_date' => 'From Date',
			'alert_before_date' => 'To Date',
			'content' => 'Content',
			'link' => 'Link',
			'title' => 'Subject',
			'from' => 'From',
			'emp_notice_to' => 'To',
			'notifiyii_department_id' => 'Department',
			'employee_notification_type'=>'Notification Type',
			'employee_first_name'=>'Name',
			'employee_notification_creation_date'=>'Creation Date',
			'employee_attendance_card_id'=>'Attendance Card No',
			'employee_notification_read'=>'Read',
			'employee_notification_leave_application_id'=>'Leave Application ID',
			'employee_notification_compensatory_leave_id'=>'Compensatory Leave ID',
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
		$emp_trans = EmployeeTransaction::model()->findAll();
		if($emp_trans)
		{
		$d = CHtml::listData($emp_trans,'employee_transaction_id','employee_transaction_id');
		$s = implode(',',$d);
		}
	
		$criteria->condition = 'employee_notification_type <> "Leave" AND employee_notification_type <> "Leave Applied" AND employee_notification_type <> "Proxy" AND employee_notification_type <>"Proxy Request" AND employee_notification_type <> "Assignment" AND emp_notice_to in('.$s.')';
		$criteria->with = array('rel_emp_id','Rel_department');
	
		$criteria->compare('rel_emp_id.employee_first_name',$this->employee_first_name,true);
		$criteria->compare('rel_emp_id.employee_last_name',$this->employee_last_name,true);
		$criteria->compare('Rel_department.department_name',$this->department_name,true);
		$criteria->compare('rel_emp_id.employee_attendance_card_id',$this->employee_attendance_card_id,true);
	
		$criteria->compare('id',$this->id);
		$criteria->compare('expire',$this->expire,true);
		$criteria->compare('alert_after_date',$this->dbDateSearch($this->alert_after_date),true);
		$criteria->compare('alert_before_date',$this->dbDateSearch($this->alert_before_date),true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('from',$this->from);
		$criteria->compare('emp_notice_to',$this->emp_notice_to);
		$criteria->compare('notifiyii_department_id',$this->notifiyii_department_id);
		$criteria->compare('employee_notification_type',$this->employee_notification_type);
		$criteria->compare('employee_notification_creation_date',$this->dbDateSearch($this->employee_notification_creation_date));
		$criteria->compare('employee_notification_read',$this->dbDateSearch($this->employee_notification_read));

		$EmployeeNotification_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'id DESC',
				),
			));	
		  unset($_SESSION['exportData']);
		 $_SESSION['exportData']=$EmployeeNotification_records;
		return $EmployeeNotification_records;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	 public static function getExportData() {
	
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'title',
			'emp_notice_to', 	
			'rel_emp_id.employee_first_name',
			'rel_emp_id.employee_last_name',
			'rel_emp_id.employee_attendance_card_id',
			'employee_notification_creation_date',
			),
		'filename'=>'Employee Notices', 'pdfFile'=>'notification.views.employeeNotification.expenseGridtoReport');
              return $data;
        }
   	
      public function loadReadNotice()
      {
	$res = array();
	$emp_trans = EmployeeTransaction::model()->findAll(array('select'=>'employee_transaction_user_id'));
	$s=0;
	if($emp_trans)
	{
		$d = CHtml::listData($emp_trans,'employee_transaction_user_id','employee_transaction_user_id');
		$s = implode(',',$d);
	}
	
	$list = EmployeeNotification::model()->findAll(array('limit'=>10,'order'=>'id  desc','condition'=>'emp_notice_to = :to AND alert_after_date <= :afterdate AND alert_before_date >= :beforedate and t.from IN('.$s.')', 'params'=> array(':to' => Yii::app()->user->getState('emp_id'), ':afterdate'=>date('Y-m-d'),':beforedate'=>date('Y-m-d'))));
	$menu = null;
	
	foreach($list as $notice) {
        $usertype=User::model()->findByPk($notice->from)->user_type;
	$menu .= '<div class="notify-data">';
	if($usertype=="employee")
	{		
	  $tran=EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>$notice->from));
		
	  $emp_model = EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$tran->employee_transaction_id));
	  $photo=EmployeePhotos::model()->findByPk($tran['employee_transaction_emp_photos_id']);
	  $menu .= '<span class="userimage">';
	  if(file_exists(Yii::app()->baseUrl.'/college_data/emp_images/'.$photo->employee_photos_path))
	  $user_image = Yii::app()->baseUrl.'/college_data/emp_images/'.$photo->employee_photos_path;
	  else
	  $user_image = Yii::app()->baseUrl.'/college_data/emp_images/no-images';

	  $menu .= CHtml::image($user_image,"No Image",array("width"=>"50px","height"=>"50px"));
	  $menu .='</span><span class="username">'; 
	  $menu .= ucfirst(strtolower($emp_model->employee_first_name)).' '.ucfirst(strtolower($emp_model->employee_last_name)).'</span>';
	 
 	}
	else 
        {  
	  $tran=StudentTransaction::model()->findByAttributes(array('student_transaction_user_id'=>$notice->from));
	  $stud_model = StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$tran->student_transaction_id));
		
	  $photo=StudentPhotos::model()->findByPk($tran['student_transaction_student_photos_id']);
	
    	   $menu .= '<span class="userimage">';
	   if(file_exists(Yii::app()->baseUrl.'/college_data/stud_images/'.$photo->student_photos_path))
	   $user_image = Yii::app()->baseUrl.'/college_data/stud_images/'.$photo->student_photos_path;
	  else
	  $user_image = Yii::app()->baseUrl.'/college_data/emp_images/no-images';
	  $menu .= CHtml::image($user_image,"No Image",array("width"=>"50px","height"=>"50px"));
 	
	   $menu .='</span><span class="username">'; 
	 $menu .= ucfirst(strtolower($stud_model->student_first_name))." ".ucfirst(strtolower($stud_model->student_last_name))." (".$stud_model->student_enroll_no.")</span>";
	 }
 	  $menu .='<div class="notificationlink">';
	  $menu .='<a href='.Yii::app()->request->baseUrl.'/notification/employeeNotification/Read?id='.$notice->id.'>';
	  $menu .=$notice->title.'</a></div></div>';
 
	}

	if(!empty($list))
	$menu .='<span class="view-more-notice">'.CHtml::link('View More..','../notification/employeeNotification/index').'</span>';
	return $menu;

      }
      public function loadAllNotice($list)
      {
	$menu = null;
	foreach($list as $notice) {
       	$menu .= '<div class="notify-data notifiche">';
	$menu .='<span class="username">'; 
	$menu .=$notice->title;
	$menu .='</span></br>';
	$menu .='<span class="notice-lable"><b>From</b></span><span class="notice-content">';
	$menu .=(User::model()->findByPk($notice->from)->user_type=='employee')?(EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>(EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>$notice->from))->employee_transaction_id)))->employee_first_name):(StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>(StudentTransaction::model()->findByAttributes(array('student_transaction_user_id'=>$notice->from))->student_transaction_id)))->student_first_name); 	 
	$menu .='</span><span class="notice-lable"><b>Content</b></span>'; 
	$menu .='<span class="notice-content">'.$notice->content.'</span></div>'; 	
	}

	return $menu;

      }
	
    private function dbDateSearch($value)
	{
		if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
		return date("Y-m-d",strtotime($matches[0]));
	    else
		return $value;
	}
	
}
