<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "login_user".
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
		return array(
			array('user_id, status, log_in_time','required','message'=>''),
			array('user_id, status, login_organization_id', 'numerical', 'integerOnly'=>true),
			array('log_out_time', 'safe'),
			array('id, user_id, status, log_in_time, log_out_time, login_organization_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'login_org' => array(self::BELONGS_TO, 'Organization', 'login_organization_id'),
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
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('log_in_time',$this->log_in_time,true);
		$criteria->compare('log_out_time',$this->log_out_time,true);
		$login_data = new CActiveDataProvider(get_class($this),array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'id DESC',
				),
		));
		$_SESSION['login_data'] = $login_data;
		return $login_data;
	}
	
	/**
	 * Return list of all user who have login to  application.
	*/
	public function total_user()
	{

		$criteria=new CDbCriteria;

		$criteria->condition = 'login_organization_id = :login_organization_id';
	        $criteria->params = array(':login_organization_id' => Yii::app()->user->getState('org_id'));
		
		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('log_in_time',$this->log_in_time,true);
		$criteria->compare('log_out_time',$this->log_out_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
