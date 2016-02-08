<?php

/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class SelectCompany extends CFormModel
{
	public $organization_name;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
		
			// phone_no and message are required
			array('organization_name', 'required','message'=>''),
		
		
		);
	}
}
