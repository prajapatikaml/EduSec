<?php

/**
 * This is the model class for table "schedule_timing".
 * @package EduSec.Student.models
 */
class ScheduleTiming extends CActiveRecord
{
	const TYPE_Monday='Monday';
	const TYPE_Tuesday='Tuesday';
	const TYPE_Wednesday='Wednesday';
	const TYPE_Thursday='Thursday';
	const TYPE_Friday='Friday';
	const TYPE_Saturday='Saturday';
	const TYPE_Sunday='Sunday';
	const TYPE_January='January';
	const TYPE_February='February';
	const TYPE_March='March';
	const TYPE_April='April';
	const TYPE_May='May';
	const TYPE_June='June'; 
	const TYPE_July='July';
        const TYPE_August='August';
	const TYPE_September='September';
	const TYPE_October='October';
	const TYPE_November='November';
	const TYPE_December='December';
	const TYPE_All='*';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ScheduleTiming the static model class
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
		return 'schedule_timing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('schedule_timing_minute, schedule_timing_hour, schedule_timing_date, schedule_timing_month, schedule_timing_day, schedule_timing_created_by, schedule_timing_creation_date', 'required','message'=>''),
			array('schedule_timing_minute, schedule_timing_hour, schedule_timing_date, schedule_timing_created_by', 'numerical', 'integerOnly'=>true),
			array('schedule_timing_name','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('schedule_timing_id, schedule_timing_minute, schedule_timing_hour, schedule_timing_date, schedule_timing_month, schedule_timing_day, schedule_timing_created_by, schedule_timing_creation_date', 'safe', 'on'=>'search'),
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
			'schedule_timing_id' => 'Schedule Timing',
			'schedule_timing_minute' => 'Minute',
			'schedule_timing_hour' => 'Hour',
			'schedule_timing_date' => 'Date',
			'schedule_timing_month' => 'Month',
			'schedule_timing_day' => 'Day',
			'schedule_timing_created_by' => 'Created By',
			'schedule_timing_creation_date' => 'Creation Date',
			'schedule_timing_name'=>'Schedule Code',
			
		);
	}

	/*
	*For get days in dropdown
	*/
	public function getDays()
	{
		return array(
			self::TYPE_Sunday=>'Sunday',
			self::TYPE_Monday=>'Monday',
			self::TYPE_Tuesday=>'Tuesday',
			self::TYPE_Wednesday=>'Wednesday',
			self::TYPE_Thursday=>'Thursday',
			self::TYPE_Friday=>'Friday',
			self::TYPE_Saturday=>'Saturday',
			self::TYPE_All=>'*',
		);
	}

	/*
	*For get months in dropdown
	*/
	public function getMonths()
	{
		return array(
			self::TYPE_January=>'January',
			self::TYPE_February=>'February',
			self::TYPE_March=>'March',
			self::TYPE_April=>'April',
			self::TYPE_May=>'May',
			self::TYPE_June=>'June', 
			self::TYPE_July=>'July',
			self::TYPE_August=>'August',
			self::TYPE_September=>'September',
			self::TYPE_October=>'October',
			self::TYPE_November=>'November',
			self::TYPE_December=>'December',
			self::TYPE_All=>'*',
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
		$criteria->compare('schedule_timing_id',$this->schedule_timing_id);
		$criteria->compare('schedule_timing_minute',$this->schedule_timing_minute);
		$criteria->compare('schedule_timing_hour',$this->schedule_timing_hour);
		$criteria->compare('schedule_timing_date',$this->schedule_timing_date);
		$criteria->compare('schedule_timing_month',$this->schedule_timing_month);
		$criteria->compare('schedule_timing_day',$this->schedule_timing_day);
		$criteria->compare('schedule_timing_created_by',$this->schedule_timing_created_by);
		$criteria->compare('schedule_timing_creation_date',$this->schedule_timing_creation_date,true);
		$ScheduleTiming_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		   $_SESSION['ScheduleTiming_records']=$ScheduleTiming_records;
	return $ScheduleTiming_records;
	}

}
