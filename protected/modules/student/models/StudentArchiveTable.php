<?php

/**
 * This is the model class for table "student_archive_table".
 *
 * The followings are the available columns in table 'student_archive_table':
 * @property integer $student_archive_id
 * @property integer $student_archive_stud_tran_id
 * @property integer $student_archive_ac_t_p_id
 * @property integer $student_archive_ac_t_n_id
 * @property integer $student_archive_status
 * @property integer $student_archive_created_by
 * @property string $student_archive_creation_date
 */
class StudentArchiveTable extends CActiveRecord
{
	public $status_name,$branch_name,$quota_name,$academic_term_name,$academic_term_period; 
	public $student_first_name,$student_enroll_no,$student_roll_no,$student_middle_name,$student_last_name; 
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentArchiveTable the static model class
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
		return 'student_archive_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_archive_stud_tran_id,student_archive_stud_id,student_archive_ac_t_p_id, student_archive_ac_t_n_id, student_archive_status, student_archive_created_by, student_archive_creation_date', 'required','message'=>''),
			array('student_archive_stud_tran_id,student_archive_stud_id, student_archive_ac_t_p_id, student_archive_ac_t_n_id, student_archive_status, student_archive_created_by,student_archive_branch_id', 'numerical', 'integerOnly'=>true,'message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_archive_id, student_archive_stud_tran_id, student_archive_ac_t_p_id,student_first_name,student_enroll_no,student_roll_no,student_middle_name,student_last_name, student_archive_ac_t_n_id, student_archive_status, student_archive_created_by,student_archive_branch_id student_archive_creation_date,academic_term_period,status_name,branch_name,quota_name,academic_term_name,student_archive_stud_id', 'safe', 'on'=>'search'),
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
			'Rel_Stud_Info' => array(self::BELONGS_TO, 'StudentInfo', 'student_archive_stud_id'),
			'Rel_student_academic_terms_period_name' => array(self::BELONGS_TO, 'AcademicTermPeriod', 'student_archive_ac_t_p_id'),	
			'Rel_student_academic_terms_name' => array(self::BELONGS_TO, 'AcademicTerm', 'student_archive_ac_t_n_id'),
			'Rel_Status' => array(self::BELONGS_TO, 'Studentstatusmaster','student_archive_status'),
			'Rel_stud_branch' => array(self::BELONGS_TO, 'Branch','student_archive_branch_id'),
			'Rel_stud_trans' => array(self::BELONGS_TO, 'StudentTransaction', 'student_archive_stud_tran_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_archive_id' => 'Student Archive',
			'student_archive_stud_tran_id' => 'Student Transaction Id',
			'student_archive_stud_id'=>'Student Info Id',
			'student_archive_branch_id'=>'Branch',
			'student_archive_ac_t_p_id' => 'Academic Year',
			'student_archive_ac_t_n_id' => 'Semester',
			'student_archive_status' => 'Status',
			'student_archive_created_by' => 'Created By',
			'student_archive_creation_date' => 'Creation Date',
			'student_first_name'=>'Name',
			'student_enroll_no'=>'Enroll No.',
			'student_roll_no'=>'Roll No.',
			'student_middle_name'=>'Husband/Father Name',
			'student_last_name'=>'Surname',
			'status_name'=>'Status',
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
		
		$criteria->with = array('Rel_Stud_Info','Rel_stud_trans','Rel_Status');
		$criteria->condition = 'Rel_stud_trans.student_transaction_organization_id = :student_transaction_org_id';
	        $criteria->params = array(':student_transaction_org_id' => Yii::app()->user->getState('org_id'));
		
		$criteria->compare('student_archive_id',$this->student_archive_id);
		$criteria->compare('student_archive_stud_tran_id',$this->student_archive_stud_tran_id);
		$criteria->compare('student_archive_branch_id',$this->student_archive_branch_id);
		$criteria->compare('student_archive_ac_t_p_id',$this->student_archive_ac_t_p_id);
		$criteria->compare('student_archive_ac_t_n_id',$this->student_archive_ac_t_n_id);
		$criteria->compare('student_archive_status',$this->student_archive_status);
		$criteria->compare('student_archive_created_by',$this->student_archive_created_by);
		$criteria->compare('student_archive_creation_date',$this->student_archive_creation_date,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_enroll_no',$this->student_enroll_no,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
		//$criteria->compare('Rel_stud_branch.branch_name',$this->branch_name,true);
		//$criteria->compare('Rel_student_academic_terms_period_name.academic_term_period',$this->academic_term_period,true);
		//$criteria->compare('Rel_student_academic_terms_name.academic_term_name',$this->academic_term_name,true);
		$criteria->compare('Rel_Status.status_name',$this->status_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function findcity($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$name = City::model()->findByPk($id);
		return $name->city_name;
		
	}
	public function findcountry($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$name = Country::model()->findByPk($id);
		return $name->name;
		
	}

	public function findstate($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$name = State::model()->findByPk($id);
		return $name->state_name;
		
	}
}
