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
	// Uncomment the following methods and override them if needed
	

//================== Student AcademicTerm Update =============	

	public function actiongetStudItemName()
	{

	  $org_id=Yii::app()->user->getState('org_id');
	  $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id', array(':academic_term_period_id'=>(int) $_REQUEST['StudentTransaction']['student_academic_term_period_tran_id'], ':org_id'=>$org_id));
		  
	  $data=CHtml::listData($data,'academic_term_id','academic_term_name');
	  echo "<option value=''>Select Semester</option>";

	  foreach($data as $value=>$name)
	    {
		echo CHtml::tag('option',
		        array('value'=>$value),CHtml::encode('Sem-'.$name),true);
	    }
	}

//all student search
	public function actiongetAllStud()
        {
           // $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		// array(':academic_term_period_id'=>(int) $_REQUEST['StudentTransaction']['student_academic_term_period_tran_id']));

		$data=  AcademicTerm::model()->findAll();
                  
        $data=CHtml::listData($data,'academic_term_id','academic_term_name');
	echo "<option value=''>Select Semester</option>";
  
          foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode('Sem-'.$name),true);
            }
        }


//================== Student Division Update =============	
	public function actiongetStudDivision()
        {
         	$bat = array();		
		$data= array();		
					
		$data=Batch::model()->findAll();
		$data=CHtml::listData($data,'batch_id','batch_name');
		foreach($data as $value=>$name)
		{
			$bat .= CHtml::tag('option',
				array('value'=>$value),CHtml::encode($name),true);
		}	
	    	
		  echo CJSON::encode(array(
					'bat'=>$bat,
						
				    ));
		 
        }

	public function actiongetAssignBatch()
        {
	    $data=Batch::model()->findAll();
                  
            $data=CHtml::listData($data,'batch_id','batch_name');
	    echo "<option value=''>Select Batch</option>";
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
        }
//================== Student Batch Update =============	
	public function actiongetStudBatch()
        {
	    $data=Batch::model()->findAll();
                  
            $data=CHtml::listData($data,'batch_id','batch_name');
	    echo "<option value=''>Select Batch</option>";
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
        }


//================== StudentAddress Current State Update =============		    
	    public function actionUpdateStudCStates()
	    {
		    
		    $data = State::model()->findAll(array('condition'=>'country_id='.(int) $_REQUEST['StudentAddress']['student_address_c_country']));
		    $data = CHtml::listData($data,'state_id','state_name');
		    echo "<option value=''>Select State</option>";
		    foreach($data as $value=>$name)
			{
		        echo CHtml::tag('option', 
				array('value'=>$value),CHtml::encode($name),true);
	 		}
		    
	    }
	public function actionUpdateStudCStates1()
	    {
		    
		    $data = State::model()->findAll(array('condition'=>'country_id='.(int) $_REQUEST['StudentRegistrationInfo']['student_address_c_country']));
		    $data = CHtml::listData($data,'state_id','state_name');
		    echo "<option value=''>Select State</option>";
		    foreach($data as $value=>$name)
			{
		        echo CHtml::tag('option', 
				array('value'=>$value),CHtml::encode($name),true);
	 		}
		    
	    }
//================== StudentAddress Current City Update =============		    	 
	    public function actionUpdateStudCCities()
	    {
		    $data = City::model()->findAll('state_id=:state_id', array(':state_id'=>(int) $_REQUEST['StudentAddress']['student_address_c_state']));
		    $data = CHtml::listData($data,'city_id','city_name');
		    echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }
	public function actionUpdateStudCCities1()
	    {
		    $data = City::model()->findAll('state_id=:state_id', array(':state_id'=>(int) $_REQUEST['StudentRegistrationInfo']['student_address_c_state']));
		    $data = CHtml::listData($data,'city_id','city_name');
		    echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }

//================== StudentAddress Permanent State Update =============		    
	    public function actionUpdateStudPStates()
	    {
		    
		    $data = State::model()->findAll('country_id=:country_id', array(':country_id'=>(int) $_REQUEST['StudentAddress']['student_address_p_country']));
		    $data = CHtml::listData($data,'state_id','state_name');
		    echo "<option value=''>Select State</option>";
		    foreach($data as $value=>$name)
			{
		        echo CHtml::tag('option', 
				array('value'=>$value),CHtml::encode($name),true);
	 		}
		    
	    }
	 public function actionUpdateStudPStates1()
	    {
		    
		    $data = State::model()->findAll('country_id=:country_id', array(':country_id'=>(int) $_REQUEST['StudentRegistrationInfo']['student_address_p_country']));
		    $data = CHtml::listData($data,'state_id','state_name');
		    echo "<option value=''>Select State</option>";
		    foreach($data as $value=>$name)
			{
		        echo CHtml::tag('option', 
				array('value'=>$value),CHtml::encode($name),true);
	 		}
		    
	    }
//================== StudentAddress Permanent City Update =============		     
	    public function actionUpdateStudPCities()
	    {
		    $data = City::model()->findAll('state_id=:state_id', array(':state_id'=>(int) $_REQUEST['StudentAddress']['student_address_p_state']));
		    $data = CHtml::listData($data,'city_id','city_name');
		    echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
		        echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }
 	public function actionUpdateStudPCities1()
	    {
		    $data = City::model()->findAll('state_id=:state_id', array(':state_id'=>(int) $_REQUEST['StudentRegistrationInfo']['student_address_p_state']));
		    $data = CHtml::listData($data,'city_id','city_name');
		    echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
		        echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }

//================== Attendence Batch Update =============
	public function actiongetAttendenceBatch()
        {
	    $data=Batch::model()->findAll();
                  
            $data=CHtml::listData($data,'batch_id','batch_code');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
        }

//======================Feedback Master===================

	public function actionGetsubject()
        {
           
		$sub = array();
		$data1=array();
	
		
		// for update division

	
		$data1=SubjectMaster::model()->findAll();
                  	
		$data1=CHtml::listData($data1, 'subject_master_id' ,'subject_master_name');
		echo "<option value=''>Select Subject</option>";
		foreach($data1 as $value1=>$name1)
		{
			$sub_mas = SubjectMaster::model()->findByPk($value1);
			$type = SubjectType::model()->findByPk($sub_mas->subject_master_type_id)->subject_type_name;
		   echo  CHtml::tag('option',
		                array('value'=>$value1),CHtml::encode($name1.'('.$type.')'),true);
		}
		
		
		
	}
	/* getstatecity*/
	public function actiongetstatecity()
        {
          
	$data=State::model()->findAll(array('condition'=>'country_id='.(int) $_REQUEST['City']['country_id']));
                  	
            $data=CHtml::listData($data,'state_id','state_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
        }

	//================== SMS-Email Batch Update =============
	public function actiongetSmsEmailBatch()
        {
	    $data=Batch::model()->findAll(array('condition'=>'course_id='.(int) $_REQUEST['StudentSmsEmailDetails']['student_sms_email_details_course_id']));
                  
            $data=CHtml::listData($data,'batch_id','batch_code');
	     echo "<option value=''>Select Batch</option>";
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
        }

// ========================== coursewise semester=================
	public function actiongetSem()
        {
         	//$sem = array();		
		$data= array();		
		
		$data=Yii::app()->db->createCommand()
			    ->select('academic_term_id,academic_term_name')
			    ->from('academic_term')
			    ->where('course_id='.(int) $_REQUEST['StudentTransaction']['course_id'])
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
			    ->where('academic_term_period_id='.(int) $_REQUEST['StudentTransaction']['academic_term_period_id'])
			    ->queryAll();
		//print_r($data); 
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
         	$bat = array();		
		$data= array();		
		
		$data=Yii::app()->db->createCommand()
			    ->select('batch_id,batch_name')
			    ->from('batch')
			    ->where('academic_term_id='.(int) $_REQUEST['StudentTransaction']['academic_term_id'])
			    ->queryAll();
		//print_r($data); 
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
			    ->where('course_id='.(int) $_REQUEST['StudentTransaction']['course_id'])
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
