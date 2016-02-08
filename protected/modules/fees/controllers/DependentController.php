<?php
class DependentController extends RController
{
	public function actionView()
	{
		$this->render('view');
	}
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}
// ========================== coursewise semester=================
	public function actiongetSem()
        {	
		$data= array();		
		$data=Yii::app()->db->createCommand()
			    ->select('academic_term_id,academic_term_name')
			    ->from('academic_term')
			    ->where('course_id='.(int) $_REQUEST['FeesPaymentTransaction']['fees_student_course_id'])
			    ->queryAll();
		//print_r($data); 
		$data=CHtml::listData($data,'academic_term_id','academic_term_name');
		 echo "<option value=''>Select Semester</option>";
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option',
				array('value'=>$value),CHtml::encode($name),true);
		}
        }
//============================ academic year wise course=======================
	public function actiongetCourse()
        {
		$data= array();			
		$data=Yii::app()->db->createCommand()
			    ->select('course_id,course_name')
			    ->from('course')
			    ->where('academic_term_period_id='.(int) $_REQUEST['FeesPaymentTransaction']['fees_student_academic_term_period_id'])
			    ->queryAll();
		$data=CHtml::listData($data,'course_id','course_name');
		 echo "<option value=''>Select Course</option>";
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option',
				array('value'=>$value),CHtml::encode($name),true);
		}	
		 
        }
//==========================semesterwise Batch=====================
	public function actiongetBatch()
        {	
		$data= array();		
		$data=Yii::app()->db->createCommand()
			    ->select('batch_id,batch_name')
			    ->from('batch')
			    ->where('academic_term_id='.(int) $_REQUEST['FeesPaymentTransaction']['fees_student_academic_term_id'])
			    ->queryAll();
		$data=CHtml::listData($data,'batch_id','batch_name');
		 echo "<option value=''>Select </option>";
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option',
				array('value'=>$value),CHtml::encode($name),true);
		}		 
        }
	//==========================Coursewise Batch=====================
	public function actiongetCBatch()
        {
         	$bat = array();		
		$data= array();		
		
		$data=Yii::app()->db->createCommand()
			    ->select('batch_id,batch_name')
			    ->from('batch')
			    ->where('course_id='.(int) $_REQUEST['FeesPaymentTransaction']['fees_student_course_id'])
			    ->queryAll();
		$data=CHtml::listData($data,'batch_id','batch_name');
		 echo "<option value=''>Select </option>";
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option',
				array('value'=>$value),CHtml::encode($name),true);
		}	
		 
        }
}
?>
