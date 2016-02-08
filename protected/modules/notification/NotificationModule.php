<?php

class NotificationModule extends CWebModule
{
    public function init()
    {
	if(Yii::app()->user->isGuest)
	{
		  Yii::app()->user->loginRequired();

	}
	else
        $this->setImport(array(
            'notification.models.*',
            'notification.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        }

        return false;
    }

}
