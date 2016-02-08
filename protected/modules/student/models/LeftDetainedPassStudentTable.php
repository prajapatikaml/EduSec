<?php

/**
 * This is the model class for table "left_detained_pass_student_table".
 *
 * The followings are the available columns in table 'left_detained_pass_student_table':
 * @property integer $id
 * @property integer $student_id
 * @property integer $status_id
 * @property integer $sem
 * @property integer $academic_term_period_id
 * @property string $creation_date
 * @property integer $created_by
 * @property integer $oraganization_id
 * @property integer $left_detained_shift_id 
 * @property integer $remarks 
*/
class LeftDetainedPassStudentTable extends CActiveRecord
{
	
	public $student_first_name, $student_last_name,$status_name, $academic_term_name, $academic_term_period,$student_enroll_no,$student_roll_no,$student_mobile_no,$student_email_id_1;
	public $student_transaction_branch_id;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LeftDetainedPassStudentTable the static model class
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
		return 'left_detained_pass_student_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_id, status_id, sem, academic_term_period_id, creation_date, created_by, oraganization_id', 'required','message'=>""),
			array('student_id, refundable_fees_amount, left_detained_shift_id, status_id, sem, academic_term_period_id, created_by, oraganization_id', 'numerical', 'integerOnly'=>true,'message'=>""),
			array('left_detained_pass_student_cancel_date','safe'),
			array('remarks','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, student_id, student_transaction_branch_id, status_id, sem, academic_term_period_id,academic_term_period,creation_date, created_by, oraganization_id, student_first_name, status_name, academic_term_name, academic_term_period,left_detained_shift_id,left_detained_pass_student_cancel_date,remarks, refundable_fees_amount, student_enroll_no, student_roll_no,student_last_name,student_mobile_no,student_email_id_1', 'safe', 'on'=>'search,leftsmssearch,cancelstudentlist'),
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

			'Rel_left_student_id' => array(self::BELONGS_TO, 'StudentTransaction', 'student_id'),
			'Rel_left_status_id' => array(self::BELONGS_TO, 'Studentstatusmaster', 'status_id'),
			'Rel_left_sem_id' => array(self::BELONGS_TO, 'AcademicTerm', 'sem'),
			'Rel_left_academic_term_period_id' => array(self::BELONGS_TO, 'AcademicTermPeriod', 'academic_term_period_id'),
			'Rel_organization' => array(self::BELONGS_TO, 'Organization', 'oraganization_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User', 'created_by'),
			'Rel_Stud_Info' => array(self::BELONGS_TO, 'StudentInfo','', 'on'=>'student_info_transaction_id = t.student_id'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'student_id' => 'Student',
			'status_id' => 'Status',
			'sem' => 'Semester',
			'academic_term_period_id' => 'Academic Year',
			'creation_date' => 'Creation Date',
			'created_by' => 'Created By',
			'oraganization_id' => 'Oraganization',
			'left_detained_pass_student_cancel_date'=>'Cancelation Date',
			'remarks'=>'Remarks',
			'student_transaction_branch_id'=>'Branch',
			'student_first_name'=>'Name',
			'student_enroll_no'=>'Enroll No.',
			'student_roll_no'=>'Roll No.',
			'status_name'=>'Status',
			'refundable_fees_amount'=>'Refundable Amount',
			
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
		
		//$criteria->condition = 'oraganization_id= :oraganization_id';
	       // $criteria->params = array(':oraganization_id' => Yii::app()->user->getState('org_id'));

		$criteria->condition ="oraganization_id = :oraganization_id && status_id <> :status_id1 && status_id <> :status_id2 && status_id <> :status_id3";
		$criteria->params = array (
		':oraganization_id' => Yii::app()->user->getState('org_id'),
		':status_id1'=>3,	
		':status_id2'=>5,
		':status_id3'=>1,	
		);

		
		$criteria->with = array('Rel_Stud_Info','Rel_left_student_id','Rel_left_status_id');
		$criteria->compare('id',$this->id);

		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('sem',$this->sem);
		$criteria->compare('Rel_left_student_id.student_transaction_branch_id',$this->student_transaction_branch_id);
		$criteria->compare('academic_term_period_id',$this->academic_term_period_id);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('left_detained_shift_id',$this->left_detained_shift_id);
		$criteria->compare('refundable_fees_amount',$this->refundable_fees_amount);
		$criteria->compare('remarks',$this->remarks);
		
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('oraganization_id',$this->oraganization_id);
		$criteria->compare('Rel_Stud_Info.student_enroll_no',$this->student_enroll_no,true);
		$criteria->compare('Rel_Stud_Info.student_mobile_no',$this->student_mobile_no,true);
		
		$criteria->compare('Rel_Stud_Info.student_email_id_1',$this->student_email_id_1,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
		$criteria->compare('left_detained_pass_student_cancel_date', $this->dbDateSearch($this->left_detained_pass_student_cancel_date), true);
		$criteria->compare('Rel_left_status_id.status_name',$this->status_name,true);
		//$criteria->compare('Rel_left_sem_id.academic_term_name',$this->academic_term_name,true);
		//$criteria->compare('Rel_left_academic_term_period_id.academic_term_period',$this->academic_term_period,true);
		
		$left_student_data =  new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'t.id DESC',
				),
		));
		$_SESSION['left_student_data'] = $left_student_data;
		return $left_student_data;
	}
	public function cancelstudentlist()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		//$criteria->condition = 'oraganization_id= :oraganization_id';
	       // $criteria->params = array(':oraganization_id' => Yii::app()->user->getState('org_id'));

	/*	$criteria->condition ="oraganization_id = :oraganization_id && status_id = :status_id1";
		$criteria->params = array (
		':oraganization_id' => Yii::app()->user->getState('org_id'),
		':status_id1'=>1,	
		);
*/
		
		$criteria->with = array('Rel_Stud_Info','Rel_left_student_id','Rel_left_status_id');
		$criteria->compare('id',$this->id);
		$criteria->addNotInCondition('status_id',array('2','3','4','5','6'));
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('sem',$this->sem);
		$criteria->compare('Rel_left_student_id.student_transaction_branch_id',$this->student_transaction_branch_id);
		$criteria->compare('academic_term_period_id',$this->academic_term_period_id);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('left_detained_shift_id',$this->left_detained_shift_id);
		$criteria->compare('refundable_fees_amount',$this->refundable_fees_amount);
		$criteria->compare('remarks',$this->remarks);
		
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('oraganization_id',Yii::app()->user->getState('org_id'));
		$criteria->compare('Rel_Stud_Info.student_enroll_no',$this->student_enroll_no,true);
		$criteria->compare('Rel_Stud_Info.student_mobile_no',$this->student_mobile_no,true);
		
		$criteria->compare('Rel_Stud_Info.student_email_id_1',$this->student_email_id_1,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('left_detained_pass_student_cancel_date', $this->dbDateSearch($this->left_detained_pass_student_cancel_date), true);
		$criteria->compare('Rel_left_status_id.status_name',$this->status_name,true);
		$left_student_data =  new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'t.id DESC',
				),
		));
		$_SESSION['left_student_data'] = $left_student_data;
		return $left_student_data;
	}
	public function leftsmssearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->condition ="status_id <> :status_id";
		$criteria->params = array (
		':status_id'=>3,	
		);

		$criteria->with = array('Rel_Stud_Info','Rel_left_student_id','Rel_left_status_id');
		$criteria->compare('id',$this->id);
		$criteria->compare('student_id',$this->student_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('sem',$this->sem);
		$criteria->compare('academic_term_period_id',$this->academic_term_period_id);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('left_detained_shift_id',$this->left_detained_shift_id);
		$criteria->compare('Rel_Stud_Info.student_enroll_no',$this->student_enroll_no,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		//$criteria->compare('Rel_left_student_id.branch_name',$this->branch_name,true);
		$criteria->compare('Rel_Stud_Info.student_mobile_no',$this->student_mobile_no,true);
		
		$criteria->compare('left_detained_pass_student_cancel_date', $this->dbDateSearch($this->left_detained_pass_student_cancel_date), true);
		$criteria->compare('Rel_left_status_id.status_name',$this->status_name,true);
		//$criteria->compare('Rel_left_sem_id.academic_term_name',$this->academic_term_name,true);
		//$criteria->compare('Rel_left_academic_term_period_id.academic_term_period',$this->academic_term_period,true);
		
		$criteria->compare('Rel_left_student_id.student_transaction_branch_id',$this->student_transaction_branch_id);

		$left_student_data =  new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'Rel_Stud_Info.student_first_name ASC',
				),
		));
		return $left_student_data;
	}

	private function dbDateSearch($value)
        {
                if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
                return date("Y-m-d",strtotime($matches[0]));
            else
                return $value;
        }

}
