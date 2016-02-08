<?php

/**
 * This is the model class for table "employee_transaction".
 * @package EduSec.models
 */
class LoginUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LoginUser the static model class
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
		return 'login_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, status, log_in_time','required','message'=>''),
			array('user_id, status', 'numerical', 'integerOnly'=>true),
			array('log_out_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, status, log_in_time, log_out_time', 'safe', 'on'=>'search'),
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
			'login_user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'status' => 'Status',
			'log_in_time' => 'Log In Time',
			'log_out_time' => 'Log Out Time',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('log_in_time',$this->log_in_time,true);
		$criteria->compare('log_out_time',$this->log_out_time,true);
		//$criteria->compare('user_ip_address',$this->user_ip_address,true);
		$login_data = new CActiveDataProvider(get_class($this),array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'id DESC',
				),
		));
		$_SESSION['login_data'] = $login_data;
		return $login_data;
	}
}
