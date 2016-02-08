<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class ParentIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public $_id;
        public function authenticate()
        {
        $record=ParentLogin::model()->findByAttributes(array('parent_user_name'=>$this->username));
	
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->parent_password!==md5($this->password.$this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {	
            $this->_id=$record->parent_id;
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
        }
     
        public function getId()
        {
        return $this->_id;
        }
}

