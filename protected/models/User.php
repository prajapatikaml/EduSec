<?php
/**
 * This is the model class for table "user".
 * @package EduSec.models
 */

class User extends CActiveRecord
{

	public $current_pass,$new_pass,$retype_pass;

	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	*/
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/** Set default scope for user list.
	*/
	public function scopes() 
	{
       		return array(
			'mailbox'=>array(
           		'condition' => '',
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
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_organization_email_id, user_password, user_created_by, user_creation_date', 'required','message'=>''),
			array('current_pass, new_pass, retype_pass', 'required','on'=>'change','message'=>''),
			array('user_created_by', 'numerical', 'integerOnly'=>true),
			array('user_organization_email_id', 'email','message'=>''),
			array('user_organization_email_id', 'unique' ,'message'=>'Email ID must be unique.'),
			array('retype_pass', 'compare','compareAttribute'=>'new_pass'),
			array('user_organization_email_id', 'length', 'max'=>60,'message'=>''),
			array('user_organization_email_id','CRegularExpressionValidator','pattern'=>'/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]+)$/','message'=>''),
			array('user_organization_email_id', 'checkunique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('current_pass','checkOldPassword','on'=>'change','message'=>''),
			array('user_id,user_type,user_organization_email_id, user_password, user_created_by, user_creation_date', 'safe', 'on'=>'search'),
			array('current_pass, new_pass, retype_pass', 'safe','message'=>''),
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
			'rel_user_email' => array(self::BELONGS_TO, 'User','user_created_by'),
		);
	}

	/**
	 * @return boolean. Check current password to change.
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
	  @return boolean. Check user email not same in user table as well as parent login table.
	*/
	public function checkunique()
	{
	   $record=ParentLogin::model()->findByAttributes(array('parent_user_name'=>$this->user_organization_email_id));

	    if(!empty($record)){
		$this->addError('user_organization_email_id', 'Email ID must be unique');
	    }
	}


	private static $_items=array();

	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'user_id', 'user_organization_email_id');
	    return self::$_items;
	}
}
