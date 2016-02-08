<?php

/**
 * This is the model class for table "attendence".
* @package EduSec.Student.models
 */

class Attendence extends CActiveRecord
{
	public $subject_master_name,$batch_name,$student_first_name;
	public $batch,$subject,$employee_first_name,$student_roll_no,$subject_type_name,$subject_master_id;
	public $start_date,$end_date,$stud_id;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Attendence the static model class
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
		return 'attendence';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('st_id,employee_id,sub_id, attendence_date,student_attendence_period_id' ,'required', 'message'=>''),
			array('st_id, sub_id, batch_id, timetable_id,  employee_id,student_attendence_period_id', 'numerical', 'integerOnly'=>true, 'message'=>''),
			array('attendence', 'required', 'on'=>'attendencedivisionreport','message'=>''),
			array('attendence', 'length', 'max'=>10),
			array('attendence_date', 'length', 'max'=>10),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, st_id, attendence, employee_first_name,sub_id, batch_id, timetable_id, stud_id, subject_master_name, batch_name, student_first_name, attendence_date,student_roll_no,subject_type_name,student_attendence_period_id', 'safe', 'on'=>'search'),
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
				'rel_atd_subject' => array(self::BELONGS_TO, 'SubjectMaster', 'sub_id'),
				'rel_atd_batch' => array(self::BELONGS_TO, 'Batch', 'batch_id'),
				'rel_atd_student' => array(self::BELONGS_TO, 'StudentInfo','', 'on' => 'st_id=student_info_transaction_id'),
				'rel_atd_employee' => array(self::BELONGS_TO, 'EmployeeInfo','', 'on' => 't.employee_id=employee_info_transaction_id'),				
				'Rel_sub_type'=>array(self::BELONGS_TO, 'SubjectType', 'rel_atd_subject.subject_master_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'st_id' => 'St',
			'employee_id' =>'Faculty Name',
			'attendence' => 'Attendence',
			'sub_id' => 'Subject',
			'batch_id' => 'Batch',
			'timetable_id' => 'Timetable',
			'attendence_date' => 'Date',
			'subject_master_name'=>'Subject Name',
			'student_roll_no'=>'Roll No.',
			'student_first_name'=>'Name',
			//for chart Report
			'batch' => 'Batch',
			'subject' => 'Subject',
			'subject_type_name'=>'Subject Type',
			'employee_first_name'=>'Faculty Name',
			//for student report
			'start_date'=> 'Start-Date',
			'end_date'=> 'End-Date',
			'student_attendence_period_id'=>'Lecture ',

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

		if(Yii::app()->user->getState('emp_id'))
		{		
			$emp[0]=Yii::app()->user->getState('emp_id');
			$criteria->addInCondition('t.employee_id', $emp, 'AND');
			$date[] = date('Y-m-d');
			$date[] = date("Y-m-d", strtotime( '-1 days' ));
			$date[] = date("Y-m-d", strtotime( '-2 days' ));
			$date[] = date("Y-m-d", strtotime( '-3 days' ));
			$criteria->addInCondition('attendence_date', $date, 'AND');
		}
		else
		{
			
			$data = array();
			$date[] = date('Y-m-d');
			$date[] = date("Y-m-d", strtotime( '-1 days' ));
			$date[] = date("Y-m-d", strtotime( '-2 days' ));
			$date[] = date("Y-m-d", strtotime( '-3 days' ));
			$criteria->addInCondition('attendence_date', $date, 'AND');

		}
		$criteria->with = array('rel_atd_subject','rel_atd_student','rel_atd_employee');  
		
		$criteria->compare('id',$this->id);
		$criteria->compare('st_id',$this->st_id);
		$criteria->compare('employee_id',$this->employee_id);

		$criteria->compare('rel_atd_student.student_first_name',$this->student_first_name,true);  
		$criteria->compare('rel_atd_employee.employee_first_name',$this->employee_first_name,true);  
		
		$criteria->compare('attendence',$this->attendence,true);
		$criteria->compare('Rel_sub_type.subject_type_name',$this->subject_type_name,true);
		$criteria->compare('sub_id',$this->sub_id);
		$criteria->compare('batch_id',$this->batch_id);
		$criteria->compare('timetable_id',$this->timetable_id);
		$criteria->compare('student_attendence_period_id',$this->student_attendence_period_id);
		
		$criteria->compare('attendence_date', $this->dbDateSearch($this->attendence_date), true);

		$attendence_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'id DESC',
				),

		));
		$_SESSION['attendence']=$attendence_data;
		return $attendence_data;
	}


        private function dbDateSearch($value)
        {
                if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
                return date("Y-m-d",strtotime($matches[0]));
            else
                return $value;
        }
 

	public function update_search($shift,$branch,$sem_name,$sem_period_id,$div_id,$sub_id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('st_id',$this->st_id);
		$criteria->compare('attendence',$this->attendence,true);
		$criteria->compare('sub_id',$this->sub_id);
		$criteria->compare('batch_id',$this->batch_id);
		$criteria->compare('timetable_id',$this->timetable_id);
		$criteria->compare('attendence_date',$this->attendence_date);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,'pagination'=>array('pageSize'=>1000,
		),
		));

	}
}
