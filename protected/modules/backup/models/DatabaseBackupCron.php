<?php

/**
 * This is the model class for table "database_backup_cron".
 * @package EduSec.Backup.models
 */
class DatabaseBackupCron extends CActiveRecord
{
	public $schedule_timing_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DatabaseBackupCron the static model class
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
		return 'database_backup_cron';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('database_backup_cron_no, database_backup_cron_created_by, database_backup_cron_creation_date, database_backup_cron_schedule_time_id', 'required','message'=>''),
			array('database_backup_cron_no, database_backup_cron_created_by, database_backup_cron_schedule_time_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('database_backup_cron_no, database_backup_cron_created_by, database_backup_cron_creation_date, database_backup_cron_id, database_backup_cron_schedule_time_id,schedule_timing_name', 'safe', 'on'=>'search'),
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
		      'rel_schedule_time'=> array(self::BELONGS_TO, 'ScheduleTiming', 'database_backup_cron_schedule_time_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'database_backup_cron_no' => 'Cron No',
			'database_backup_cron_created_by' => 'Created By',
			'database_backup_cron_creation_date' => 'Creation Date',
			'database_backup_cron_id' => 'Schedule Backup Id',
			'database_backup_cron_schedule_time_id' => 'Schedule Time',
			'schedule_timing_name'=>'Schedule Time',
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

		$criteria->compare('database_backup_cron_no',$this->database_backup_cron_no);
		$criteria->compare('database_backup_cron_created_by',$this->database_backup_cron_created_by);
		$criteria->compare('rel_schedule_time.schedule_timing_name',$this->schedule_timing_name,true);
		$criteria->compare('database_backup_cron_creation_date',$this->database_backup_cron_creation_date,true);
		$criteria->compare('database_backup_cron_id',$this->database_backup_cron_id);
		$criteria->compare('database_backup_cron_schedule_time_id',$this->database_backup_cron_schedule_time_id);
		$DatabaseBackupCron_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		   $_SESSION['DatabaseBackupCron_records']=$DatabaseBackupCron_records;
	return $DatabaseBackupCron_records;
	}

}
