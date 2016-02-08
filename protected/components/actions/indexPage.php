<?php

class indexPage extends CAction {

    public $modulePage;

    public function run(){
	$this->controller->layout = 'column2';
	Yii::app()->user->setState('loadPortlets', $this->modulePage);
        $this->controller->render('application.components.views.ModulePages.'.$this->modulePage, array());
    }
}
?>
