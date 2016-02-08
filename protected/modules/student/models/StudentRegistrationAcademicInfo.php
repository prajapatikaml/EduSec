<?php

/**
 * This is the model class for table "student_registration_academic_info".
 *
 * The followings are the available columns in table 'student_registration_academic_info':
 * @property integer $student_registration_academic_id
 * @property string $examination
 * @property string $year_of_passing
 * @property string $name_of_board
 * @property string $medium
 * @property string $class_obtained
 * @property double $marks_obtained
 * @property integer $marks_out_of
 * @property double $percentage
 * @property integer $student_registration_id
 */
class StudentRegistrationAcademicInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentRegistrationAcademicInfo the static model class
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
		return 'student_registration_academic_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('examination, year_of_passing, name_of_board, medium, class_obtained, marks_obtained, marks_out_of, percentage, student_registration_id', 'required'),
			array('marks_out_of, student_registration_id', 'numerical', 'integerOnly'=>true),
			array('marks_obtained, percentage', 'numerical'),
			array('examination', 'length', 'max'=>30),
			array('year_of_passing, name_of_board', 'length', 'max'=>25),
			array('medium, class_obtained', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('student_registration_academic_id, examination, year_of_passing, name_of_board, medium, class_obtained, marks_obtained, marks_out_of, percentage, student_registration_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_registration_academic_id' => 'Student Registration Academic',
			'examination' => 'Examination',
			'year_of_passing' => 'Year Of Passing',
			'name_of_board' => 'Name Of Board/Uni.',
			'medium' => 'Medium',
			'class_obtained' => 'Class Obtained',
			'marks_obtained' => 'Marks Obtained',
			'marks_out_of' => 'Marks Out Of',
			'percentage' => 'Percentage',
			'student_registration_id' => 'Student Registration',
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
		$criteria->condition ="student_registration_id = :id";
		$criteria->params = array (':id' => $_REQUEST['id']);
		$criteria->compare('student_registration_academic_id',$this->student_registration_academic_id);
		$criteria->compare('examination',$this->examination,true);
		$criteria->compare('year_of_passing',$this->year_of_passing,true);
		$criteria->compare('name_of_board',$this->name_of_board,true);
		$criteria->compare('medium',$this->medium,true);
		$criteria->compare('class_obtained',$this->class_obtained,true);
		$criteria->compare('marks_obtained',$this->marks_obtained);
		$criteria->compare('marks_out_of',$this->marks_out_of);
		$criteria->compare('percentage',$this->percentage);
		$criteria->compare('student_registration_id',$this->student_registration_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
