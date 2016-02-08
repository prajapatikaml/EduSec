<?php

/**
 * This is the model class for table "course".
 * @package EduSec.models
 */
class Course extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Course the static model class
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
		return 'course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_name, course_code, created_by, created_date', 'required','message'=>''),
			array('section_name','safe'),
			array('created_by', 'numerical', 'integerOnly'=>true),
			array('course_name, course_code, section_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('course_id, course_name, course_code,academic_term_period_id, section_name, created_by, created_date', 'safe', 'on'=>'search'),
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
			'Rel_user' => array(self::BELONGS_TO, 'User','created_by'),
			'Rel_academic_year'=>array(self::BELONGS_TO,'AcademicTermPeriod', 'academic_term_period_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'course_id' => 'Course',
			'course_name' => 'Course Name',
			'course_code' => 'Course Code',
			'section_name' => 'Section Name',
			'academic_term_period_id'=>'Academic Year',
			'course_fees' => 'Fees',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
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

		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('course_name',$this->course_name,true);
		$criteria->compare('course_code',$this->course_code,true);
		$criteria->compare('section_name',$this->section_name,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_date',$this->created_date,true);

		$course= new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));

		 $_SESSION['exportData']=$course;
		return $course;
			
	}
	
		/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
		
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'course_name',
			'course_code',
			'section_name',
			'course_fees',
			'Rel_academic_year.academic_term_period',
			'Rel_user.user_organization_email_id:Created By',
			'created_date',
        		),
		'filename'=>'Course-List', 'pdfFile'=>'/course/CourseExportPdf');
              return $data;
        }
}
