<?php

/**
 * This is the model class for table "employee_attendence".
* @package EduSec.Employee.models
 */
class Employee_attendence extends CActiveRecord
{
	public $employee_first_name, $employee_attendance_card_id,$employee_info_transaction_id,$employee_no,$month,$employee_last_name;	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Employee_attendence the static model class
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
		return 'employee_attendence';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('csvfile', 'required'),
			array('employee_id','numerical', 'integerOnly'=>true),
			array('csvfile', 'file', 'types'=>'xlsx','allowEmpty'=>true,'wrongType'=>'Only jpg, gif, png, pdf, and jpeg filees are allowed.'),
			array('month', 'required','on'=>'singlemonthattendence','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('employee_attendence_id, employee_id, attendence, date, time1, time2, time3, time4, time5, time6, time7, time8, time9, time10, total_hour,csvfile, overtime_hour, employee_info_transaction_id,attendence, employee_last_name,employee_first_name, employee_attendance_card_id,employee_no', 'safe', 'on'=>'search,emp_search'),
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
			'Rel_Emp_Info' => array(self::BELONGS_TO, 'EmployeeInfo','', 'on' =>'t.employee_id=employee_info_transaction_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_attendence_id' => 'Employee Attendence',
			'employee_id' => 'Employee Attendance Card No',
			'employee_first_name'=>'Employee Name',
			'date' => 'Date',
			'time1' => 'IN',
			'time2' => 'OUT',
			'time3' => 'Time3',
			'time4' => 'Time4',
			'time5' => 'Time5',
			'time6' => 'Time6',
			'time7' => 'Time7',
			'time8' => 'Time8',
			'time9' => 'Time9',
			'time10' => 'Time10',
			'total_hour' => 'Total Hour',
			'overtime_hour' => 'Overtime Hour',
			'csvfile'=>'Upload File',
			'employee_attendance_card_id'=>'Card ID',
			'employee_no'=>'Employee No.',
			'attendence'=>'Attendence',
			'employee_last_name'=>'Surname'
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
		$leaveduration=LeaveStructureDesignationDuration::model()->findByAttributes(array('leave_structure_current_status'=>1));
		if(!empty($leaveduration))
		{
		$criteria->condition = 'date >= :date_from AND date <= :date_to';
	        $criteria->params = array(':date_from'=>$leaveduration->leave_structure_des_start_date,':date_to'=>$leaveduration->leave_structure_des_end_date);
		}
		$criteria->with = array('Rel_Emp_Info');
		$criteria->compare('employee_attendence_id',$this->employee_attendence_id);
		$criteria->compare('Rel_Emp_Info.employee_first_name',$this->employee_first_name,true);
		$criteria->compare('Rel_Emp_Info.employee_last_name',$this->employee_last_name,true);
		$criteria->compare('Rel_Emp_Info.employee_attendance_card_id',$this->employee_attendance_card_id,true);
		$criteria->compare('Rel_Emp_Info.employee_no',$this->employee_no,true);
		$criteria->compare('Rel_Emp_Info.employee_info_transaction_id',$this->employee_info_transaction_id,true);
		$criteria->order = 'employee_attendence_id desc';
		if(!empty($this->date))
		$criteria->order = 't.date asc';
		$criteria->compare('MONTH(date)', $this->date);
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('time1',$this->time1,true);
		$criteria->compare('time2',$this->time2,true);
		$criteria->compare('time3',$this->time3,true);
		$criteria->compare('time4',$this->time4,true);
		$criteria->compare('time5',$this->time5,true);
		$criteria->compare('time6',$this->time6,true);
		$criteria->compare('time7',$this->time7,true);
		$criteria->compare('time8',$this->time8,true);
		$criteria->compare('time9',$this->time9,true);
		$criteria->compare('time10',$this->time10,true);
		$criteria->compare('total_hour',$this->total_hour,true);
		$criteria->compare('overtime_hour',$this->overtime_hour,true);
		$criteria->compare('csvfile',$this->csvfile);
		$criteria->compare('attendence',$this->attendence,true);
		$emp_attendence = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,

		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $emp_attendence;
		return $emp_attendence;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'Rel_Emp_Info.employee_no',
			'Rel_Emp_Info.employee_attendance_card_id',
			'attendence',
			'Rel_Emp_Info.employee_first_name',
			'Rel_Emp_Info.employee_last_name',
			'date',
			'total_hour',
			'time1',
			'time2',
			'overtime_hour',	
        		),
		'filename'=>'Employee-Attendance', 'pdfFile'=>'employee.views.employeeAttendence.expenseGridtoReport');
              return $data;
        }

	/**
	* This method return list of employee of the particular month of particular employee.
	*/	
	public function month_empattendance($emp_id,$month)
	{
		$criteria=new CDbCriteria;

		$year = date('Y');

		$criteria->condition ="t.employee_id = :emp_id AND Month(date)=:month AND Year(date)=:year";

		$criteria->params = array (
		':emp_id'=>$emp_id,
		':month'=>$month,
		':year'=>$year,
		);

		$criteria->order = 'date ASC';

		$criteria->with = array('Rel_Emp_Info');

		$criteria->compare('employee_attendence_id',$this->employee_attendence_id);
		$criteria->compare('Rel_Emp_Info.employee_first_name',$this->employee_first_name,true);
		$criteria->compare('Rel_Emp_Info.employee_attendance_card_id',$this->employee_attendance_card_id,true);
		$criteria->compare('Rel_Emp_Info.employee_no',$this->employee_no,true);
		$criteria->compare('Rel_Emp_Info.employee_info_transaction_id',$this->employee_info_transaction_id,true);
		//$criteria->compare('date',$this->date,true);
		$criteria->compare('date', $this->dbDateSearch($this->date), true);
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('time1',$this->time1,true);
		$criteria->compare('time2',$this->time2,true);
		$criteria->compare('time3',$this->time3,true);
		$criteria->compare('time4',$this->time4,true);
		$criteria->compare('time5',$this->time5,true);
		$criteria->compare('time6',$this->time6,true);
		$criteria->compare('time7',$this->time7,true);
		$criteria->compare('time8',$this->time8,true);
		$criteria->compare('time9',$this->time9,true);
		$criteria->compare('time10',$this->time10,true);
		$criteria->compare('total_hour',$this->total_hour,true);
		$criteria->compare('overtime_hour',$this->overtime_hour,true);
		$criteria->compare('csvfile',$this->csvfile);
		$criteria->compare('attendence',$this->attendence,true);
		$emp_attendence = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'employee_attendence_id DESC',
				),

		));
		$_SESSION['employee_attendence']=$emp_attendence;
		return $emp_attendence;
	}

	/**
	* This method return employee wise attendence.
	*/
	public function emp_search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$tran_id = EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>Yii::app()->user->id));
		$emp_id = $tran_id['employee_transaction_id'];
		//Yii::app()->user->setState('emp_id',$id);

		$criteria=new CDbCriteria;
		
		$criteria->condition ="t.employee_id = :emp_id";
		$criteria->params = array (
		':emp_id'=>$emp_id,
		);
		$criteria->with = array('Rel_Emp_Info');
		$criteria->compare('employee_attendence_id',$this->employee_attendence_id);
		$criteria->compare('Rel_Emp_Info.employee_first_name',$this->employee_first_name,true);
		$criteria->compare('Rel_Emp_Info.employee_attendance_card_id',$this->employee_attendance_card_id,true);
		$criteria->compare('Rel_Emp_Info.employee_no',$this->employee_no,true);
		$criteria->compare('Rel_Emp_Info.employee_info_transaction_id',$this->employee_info_transaction_id,true);
		$criteria->compare('date', $this->dbDateSearch($this->date), true);
		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('time1',$this->time1,true);
		$criteria->compare('time2',$this->time2,true);
		$criteria->compare('time3',$this->time3,true);
		$criteria->compare('time4',$this->time4,true);
		$criteria->compare('time5',$this->time5,true);
		$criteria->compare('time6',$this->time6,true);
		$criteria->compare('time7',$this->time7,true);
		$criteria->compare('time8',$this->time8,true);
		$criteria->compare('time9',$this->time9,true);
		$criteria->compare('time10',$this->time10,true);
		$criteria->compare('attendence',$this->attendence,true);
		$criteria->compare('total_hour',$this->total_hour,true);
		$criteria->compare('overtime_hour',$this->overtime_hour,true);
		$criteria->compare('csvfile',$this->csvfile);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'employee_attendence_id DESC',
				),

		));
	}
	
	/*
	*For check if atendance already on that date 
	*/
	public function beforeSave() {

        $empl_id = $this->employee_id;
        $hdate = $this->date;
        //echo $hdate;
        //exit;
        $holidate=Employee_attendence::model()->findByAttributes(array('employee_id'=>$empl_id,'date'=>$hdate));
        
        if ($this->isNewRecord)
        {
            if($holidate==NULL)
            {
	            return true;
            }
            else{
	            return false;
            }
        }
        else
	     return true;	       
       }
  
	/**
	* Datewise search by date picker from gridView
	* @return date
	*/
	private function dbDateSearch($value)
        {
                if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
                return date("Y-m-d",strtotime($matches[0]));
            else
                return $value;
        }
}
