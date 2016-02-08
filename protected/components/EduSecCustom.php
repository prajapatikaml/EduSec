<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class EduSecCustom extends RController
{

	public function actionIndex()
	{
		$this->redirect(array('admin'));
	}

}
