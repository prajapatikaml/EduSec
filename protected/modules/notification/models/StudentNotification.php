<?php

/**
 * This is the model class for table "student_notification".
 * @package EduSec.Notification.models
 */
class StudentNotification extends CActiveRecord
{
	public $student_first_name,$student_enroll_no,$student_last_name;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentNotification the static model class
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
		return 'student_notification';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_notification_alert_after_date, student_notification_alert_before_date, student_notification_content, student_notification_title, student_notification_from, student_notification_creation_date', 'required','message'=>''),
			array('student_notification_from, student_notification_to,student_notification_read', 'safe'),
			//array('student_notification_title', 'CRegularExpressionValidator', 'pattern'=>"/^\w[a-zA-Z0-9\s!\"\?;%:?*()<>\/#$\^&@\-+_=|,.~{}\[\]'\\\\]+$/",'message'=>''),
			array('student_notification_link', 'length', 'max'=>30),
			array('student_notification_title', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_notification_id, student_notification_expire, student_notification_alert_after_date, student_notification_alert_before_date, student_notification_content, student_notification_link, student_notification_title, student_notification_from, student_notification_to, student_first_name,student_enroll_no, student_notification_creation_date, student_notification_read,student_last_name', 'safe', 'on'=>'search'),
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
		     'reads' => array(self::HAS_MANY, 'StudentNotifyiiReads', 'notification_id'),
		     'rel_stud_info' => array(self::BELONGS_TO, 'StudentInfo','', 'on' => 't.student_notification_to=student_info_transaction_id'),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_notification_id' => 'Notification ID',
			'student_notification_expire' => 'Expire Date',
			'student_notification_alert_after_date' => 'From Date',
			'student_notification_alert_before_date' => 'To Date',
			'student_notification_content' => 'Content',
			'student_notification_link' => 'Link',
			'student_notification_title' => 'Subject',
			'student_notification_from' => 'From',
			'student_notification_to' => 'To',
			'student_first_name'=>'Name',
			'student_last_name'=>'Surname',
			'student_enroll_no'=>'Enrollment No',
			'student_notification_creation_date'=>'Creation Date', 
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
		$criteria->with = array('rel_stud_info');
		$criteria->compare('rel_stud_info.student_first_name',$this->student_first_name,true);
		$criteria->compare('rel_stud_info.student_last_name',$this->student_last_name,true);
		$criteria->compare('student_notification_id',$this->student_notification_id);
		$criteria->compare('student_notification_expire',$this->student_notification_expire,true);
		$criteria->compare('student_notification_alert_after_date',$this->dbDateSearch($this->student_notification_alert_after_date),true);
		$criteria->compare('student_notification_alert_before_date',$this->dbDateSearch($this->student_notification_alert_before_date),true);
		$criteria->compare('student_notification_content',$this->student_notification_content,true);
		$criteria->compare('student_notification_link',$this->student_notification_link,true);
		$criteria->compare('student_notification_title',$this->student_notification_title,true);
		$criteria->compare('student_notification_from',$this->student_notification_from);
		$criteria->compare('student_notification_to',$this->student_notification_to);
		$criteria->compare('rel_stud_info.student_enroll_no',$this->student_enroll_no,true);
		$criteria->compare('student_notification_creation_date',$this->dbDateSearch($this->student_notification_creation_date),true);
 		$criteria->compare('student_notification_read',$this->dbDateSearch($this->student_notification_read),true);
		$StudentNotification_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'student_notification_id DESC',
				),
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData']=$StudentNotification_records;
		return $StudentNotification_records;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	 public static function getExportData() {
	
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'student_notification_title',
			'student_notification_to', 	
			'rel_stud_info.student_first_name',
			'rel_stud_info.student_last_name',
			'rel_stud_info.student_enroll_no',
			'student_notification_creation_date',
			),
		'filename'=>'Employee Notices', 'pdfFile'=>'notification.views.studentNotification.expenseGridtoReport');
              return $data;
        }
 

 	private function dbDateSearch($value)
	{
		if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
		return date("Y-m-d",strtotime($matches[0]));
	    else
		return $value;
	}
      public function loadReadNotice()
      {
	$res = array();
	$list = StudentNotification::model()->findAll(array('limit'=>10, 'order'=>'student_notification_id desc','condition'=>'student_notification_to = :to AND student_notification_alert_after_date <= :afterdate AND student_notification_alert_before_date >= :beforedate', 'params'=> array(':to' => Yii::app()->user->getState('stud_id'), ':afterdate'=>date('Y-m-d'),':beforedate'=>date('Y-m-d'))));
	$menu = null;
	
	foreach($list as $notice) {
        $usertype=User::model()->findByPk($notice->student_notification_from)->user_type;
	$menu .= ($notice->student_notification_read == 1) ? '<div class="notify-data">' : '<div class="notify-data unread">';
	if($usertype=="employee")
	{		
	  $tran=EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>$notice->student_notification_from));
	  $emp_model = EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$tran->employee_transaction_id));
	  $photo=EmployeePhotos::model()->findByPk($tran['employee_transaction_emp_photos_id']);
	  $menu .= '<span class="userimage">';
	 
	  if(file_exists(Yii::app()->baseUrl.'/college_data/emp_images/'.$photo->employee_photos_path))
	  $user_image = Yii::app()->baseUrl.'/college_data/emp_images/'.$photo->employee_photos_path;
	  else
	  $user_image = Yii::app()->baseUrl.'/college_data/emp_images/no-images';

	  $menu .= CHtml::image($user_image,"",array("width"=>"50px","height"=>"50px"));
	  $menu .='</span><span class="username">'; 
	  $menu .= ucfirst(strtolower($emp_model->employee_first_name)).' '.ucfirst(strtolower($emp_model->employee_last_name)).'</span>';
	 
 	}

	else 
        {  
	   $user=User::model()->findByPk($notice->student_notification_from);
           $org=$user->user_organization_id;
	   $name=$user->user_organization_email_id;
    	   $menu .= '<span class="userimage">';
	   $user_image = Yii::app()->baseUrl.'/college_data/emp_images/no-images';
	   $menu .= CHtml::image($user_image,'No Image',array('width'=>'50px','height'=>'50px'));
	   $menu .='</span><span class="username">'; 
	   $menu .=ucfirst(strtolower(strstr($name,'@',true)));
	   $menu .='</span>';		  
	 }
 	  $menu .='<div class="notificationlink">';
	  $menu .='<a href='.Yii::app()->request->baseUrl.'/notification/studentNotification/Read?id='.$notice->student_notification_id.'>';
	  $menu .=$notice->student_notification_title.'</a></div></div>';
	  
 
	}
	if(!empty($list))
	$menu .='<span class="view-more-notice">'.CHtml::link('View More..','../notification/studentNotification/index').'</span>';
	return $menu;

      }
      public function loadAllNotice($list)
      {
	$menu = null;
	foreach($list as $notice) {
       	$menu .= '<div class="notify-data notifiche">';
	$menu .='<span class="username">'; 
	$menu .=$notice->student_notification_title;
	$menu .='</span></br>';
	$menu .='<span class="notice-lable"><b>From</b></span><span class="notice-content">';
	$menu .=(User::model()->findByPk($notice->student_notification_from)->user_type=='employee')?(EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>(EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>$notice->student_notification_from))->employee_transaction_id)))->employee_first_name):(ucfirst(strtolower(strstr(User::model()->findByPk($notice->student_notification_from)->user_organization_email_id,'@',true)))); 	 
	$menu .='</span><span class="notice-lable"><b>Content</b></span>'; 
	$menu .='<span class="notice-content">'.$notice->student_notification_content.'</span></div>'; 	
	}

	return $menu;

      }
	

}
