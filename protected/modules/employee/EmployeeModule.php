<?php

class EmployeeModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		if(Yii::app()->user->isGuest)
		{
			  Yii::app()->user->loginRequired();

		}
		else
		$this->setImport(array(
			'employee.models.*',
			'employee.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
