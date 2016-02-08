<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $parent_username;
	public $parent_password;

	public $rememberMe;
	public $verifyCode;
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password ', 'required','on'=>'login','message'=>''),
			array('parent_username, parent_password', 'required','on'=>'parentlogin','message'=>''),		
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate','on'=>'login'),
			array('parent_password', 'authenticate','on'=>'parentlogin'),
			
			array('username, password, verifyCode','required','on'=>'captchaRequired','message'=>''),
			array('parent_username, parent_password, verifyCode','required','on'=>'parentcaptchaRequired','message'=>''),
			
			array('verifyCode', 'CaptchaExtendedValidator', 'allowEmpty'=>CCaptcha::checkRequirements()),

		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'parent_username'=>'Username',
			'parent_password'=>'Password',
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$action =  Yii::app()->controller->action->id;
			if($action== "login")
			   $this->_identity=new UserIdentity($this->username,$this->password);
			else
			   $this->_identity=new ParentIdentity($this->parent_username,$this->parent_password);
			if(!$this->_identity->authenticate()){
				$this->addError('password','Incorrect username or password.');
				$this->addError('parent_password','Incorrect username or password.');
			}
		}
	}
	
	
	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
	public function parentlogin()
	{
		if($this->_identity===null)
		{
			$this->_identity=new ParentIdentity($this->parent_username,$this->parent_password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===ParentIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
