<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "user".
 * @package EduSec.models
 */

class User extends CActiveRecord
{
	public $organization_name;
	public $current_pass,$new_pass,$retype_pass;

	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return scope mailbox.
	 * Define scope for mailbox, get user email list from current organization only.
	 */
	public function scopes() 
	{
       		return array(
			'mailbox'=>array(
           		'condition' => 'user_organization_id ='.Yii::app()->user->getState('org_id')
			)
	        );
  	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('user_organization_email_id, user_password, user_created_by, user_creation_date', 'required', 'message'=>''),
			array('current_pass, new_pass, retype_pass', 'required','on'=>'change','message'=>''),
			array('user_created_by', 'numerical', 'integerOnly'=>true),
			array('user_organization_email_id', 'email','message'=>''),
			array('user_organization_email_id', 'unique' ,'message'=>'Email ID must be unique.'),
			array('retype_pass', 'compare','compareAttribute'=>'new_pass'),
			array('user_organization_email_id', 'length', 'max'=>60,'message'=>''),

			array('current_pass','checkOldPassword','on'=>'change','message'=>''),
			array('user_id,user_type,user_organization_email_id, user_password, user_created_by, user_creation_date, user_organization_id', 'safe', 'on'=>'search'),
			array('current_pass, new_pass, retype_pass,organization_name', 'safe','message'=>''),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'rel_user_organization' => array(self::BELONGS_TO, 'Organization','user_organization_id'),
			'rel_user_email' => array(self::BELONGS_TO, 'User','user_created_by'),
		);
	}

	/**
	 * Generate error if old passwod does not match at the time of change password.
	 */

	public function checkOldPassword($attribute,$params)
	{
	    $record=User::model()->findByAttributes(array('user_password'=>md5($this->current_pass.$this->current_pass)));

	    if($record===null){
		$this->addError($attribute, 'Invalid password');
	    }
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'user_organization_email_id' => 'Username',
			'user_password' => 'Password',
			'user_created_by' => 'Created By',
			'user_creation_date' => 'Creation Date',
			'current_pass' => 'Current Password',
			'new_pass' => 'New Password',
			'retype_pass' => 'Retype Password',
		);
	}

	/**
	 * Check unique email address for parent account.
	 */
	public function checkunique()
	{
	   $record=ParentLogin::model()->findByAttributes(array('parent_user_name'=>$this->user_organization_email_id));

	    if(!empty($record)){
		$this->addError('user_organization_email_id', 'Email ID must be unique');
	    }
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->condition = 'user_type = :usertype1';
	        $criteria->params = array(':usertype1' => 'admin');

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_created_by',$this->user_created_by);
		$criteria->compare('user_creation_date',$this->user_creation_date,true);
		$criteria->compare('user_organization_id',$this->user_organization_id);
		

		$user_data = new CActiveDataProvider(get_class($this),array(
			'criteria'=>$criteria,
		));
		$_SESSION['user_data'] = $user_data;
		return $user_data;
	}

	/**
	 * @return DataProvider for admin login list
	 */
	public function resetadminpasswordsearch()
	{
		$criteria=new CDbCriteria;

		$criteria->condition = 'user_type = :usertype1';
	        $criteria->params = array(':usertype1' => 'admin');

		$criteria->with = array('rel_user_organization');  /// Note: Define relation with related table....
		$criteria->compare('rel_user_organization.organization_name',$this->organization_name,true);  
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_created_by',$this->user_created_by);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('user_creation_date',$this->user_creation_date,true);
		$criteria->compare('user_organization_id',$this->user_organization_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'user_id DESC',),
		));
	}

	/**
	 * @return DataProvider for student login list
	 */

	public function resetstudloginidsearch()
	{
		$criteria=new CDbCriteria;

		$criteria->condition ="user_organization_id = :user_organization_id && user_type = :usertype1";
		$criteria->params = array (
		':user_organization_id' => Yii::app()->user->getState('org_id'),
		':usertype1'=>'student',
		);


		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_created_by',$this->user_created_by);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('user_creation_date',$this->user_creation_date,true);
		$criteria->compare('user_organization_id',$this->user_organization_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'user_id DESC',),
		));
	}

	/**
	 * @return DataProvider for employee login list
	 */

	public function resetemploginidsearch()
	{
		$criteria=new CDbCriteria;

		$criteria->condition ="user_organization_id = :user_organization_id && user_type = :usertype1";
		$criteria->params = array (
		':user_organization_id' => Yii::app()->user->getState('org_id'),
		':usertype1'=>'employee',
		);

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('user_password',$this->user_password,true);
		$criteria->compare('user_created_by',$this->user_created_by);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('user_creation_date',$this->user_creation_date,true);
		$criteria->compare('user_organization_id',$this->user_organization_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'user_id DESC',),
		));
	}

	/**
	 * @return array for create dropdown for User.
	*/
	    private static $_items=array();

            public static function items()
            {
		    if(isset(self::$_items))
		    self::loadItems();
		    return self::$_items;
            }

	    public static function item($code)
	    {
		if(!isset(self::$_items))
		    self::loadItems();
		return isset(self::$_items[$code]) ? self::$_items[$code] : false;
	    }

	    private static function loadItems()
	    {
		self::$_items=array();
		$models=self::model()->findAll();
		foreach($models as $model)
		    self::$_items[$model->user_id]=$model->user_organization_email_id;
	    }


}
