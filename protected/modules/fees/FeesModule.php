<?php

class FeesModule extends CWebModule
{
	private $_assetsUrl;
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		if(Yii::app()->user->isGuest)
		{
			  Yii::app()->user->loginRequired();

		}
		else
		// import the module-level models and components
		$this->setImport(array(
			'fees.models.*',
			'fees.components.*',
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
