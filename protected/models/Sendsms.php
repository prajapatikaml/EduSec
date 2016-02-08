<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class Sendsms extends CFormModel
{
	public $phone_no;
	public $message;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
		
			// phone_no and message are required
			array('phone_no, message', 'required','message'=>''),
			array('phone_no','numerical', 'integerOnly'=>true ,'message'=>''),
			array('phone_no', 'length', 'max'=>12),

		
		
		);
	}
}
