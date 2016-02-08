<?php

class DependentController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
	public function actiongetUserItemName()
        {
           // $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		 //array(':academic_term_period_id'=>(int) $_REQUEST['Batch']['academic_period_id']));
 
	    $org_id=Yii::app()->user->getState('org_id');
	     if(Yii::app()->user->getState('emp_id'))
                   {	       	
	    		$user_type="employee";
		   }		
		if(Yii::app()->user->getState('stud_id'))
                   {	       	
	    		$user_type="student";
		   }		

		$data=  User::model()->findAll('user_type= :user_type and user_organization_id = :org_id ',array(':user_type'=>$user_type, ':org_id'=>$org_id));
                 
            $data=CHtml::listData($data,'user_id','user_organization_email_id');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode('Sem-'.$name),true);
            }
         }
}
