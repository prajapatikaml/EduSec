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

//================== Student AcademicTerm Update =============	

	   public function actiongetStudItemName()
        {
           // $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		// array(':academic_term_period_id'=>(int) $_REQUEST['StudentTransaction']['student_academic_term_period_tran_id']));

	$org_id=Yii::app()->user->getState('org_id');
	$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id and current_sem= :current_sem', array(':academic_term_period_id'=>(int) $_REQUEST['StudentTransaction']['student_academic_term_period_tran_id'],':current_sem'=>1, ':org_id'=>$org_id));
                  
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


//================== Student Division Update =============	
	public function actiongetStudDivision()
        {
           
		$org_id=Yii::app()->user->getState('org_id');
		$div = array();
		$sub = array();
		$bat = array();		
		$data= array();
		$data1=array();
		$data2= array();		
		$data3=array();
	
		
		// for update division

		$data=Division::model()->findAll(array('condition'=>'branch_id='.(int) $_REQUEST['StudentTransaction']['student_transaction_branch_id'].' and academic_name_id='.(int)$_REQUEST['StudentTransaction']['student_academic_term_name_id'].' and division_organization_id='.$org_id));
			
		foreach($data as $d1)
		{
			$data2=Batch::model()->findAll(array('condition'=>'div_id='.$d1['division_id']));
			break;

		}
	  	$data2=CHtml::listData($data2,'batch_id','batch_code');
		foreach($data2 as $value2=>$name2)
		{
			$bat .= CHtml::tag('option',
				array('value'=>$value2),CHtml::encode($name2),true);
		}	
	    	$data3=CHtml::listData($data,'division_id','division_code');
	    	foreach($data3 as $value=>$name)
	    	{
	        	$div .= CHtml::tag('option',
	                array('value'=>$value),CHtml::encode($name),true);
	    	}
	
		
		  echo CJSON::encode(array(
						'div'=>$div,
						'bat'=>$bat,
						
					    ));
		 
        }
//================== Student Batch Update =============	
	public function actiongetStudBatch()
        {
	    $org_id=Yii::app()->user->getState('org_id');
            $data=Batch::model()->findAll(array('condition'=>'div_id='.(int)$_REQUEST['StudentTransaction']['student_transaction_division_id'].' and batch_organization_id='.$org_id));
                  
            $data=CHtml::listData($data,'batch_id','batch_code');
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
//================== StudentAddress Current City Update =============		    	 
	    public function actionUpdateStudCCities()
	    {
		    $data = City::model()->findAll('state_id=:state_id', array(':state_id'=>(int) $_REQUEST['StudentAddress']['student_address_c_state']));
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

//================== StudentAddress Permanent City Update =============		     
	    public function actionUpdateStudPCities()
	    {
		    $data = City::model()->findAll('state_id=:state_id', array(':state_id'=>(int) $_REQUEST['StudentAddress']['student_address_p_state']));
		    $data = CHtml::listData($data,'city_id','city_name');
		    echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
		        echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }


	public function actiongetFeedbackItemName()
        {
            //$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		// array(':academic_term_period_id'=>(int) $_REQUEST['FeedbackMaster']['feedback_academic_term_period_id']));
                  
           $org_id=Yii::app()->user->getState('org_id');
$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id and current_sem= :current_sem', array(':academic_term_period_id'=>(int) $_REQUEST['FeedbackMaster']['feedback_academic_term_period_id'],':current_sem'=>1, ':org_id'=>$org_id));

	    $data=CHtml::listData($data,'academic_term_id','academic_term_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode('Sem-'.$name),true);
            }
        }

//================== Attendence AcademicTerm Update =============
	public function actiongetAttendenceItemName()
        {
            //$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		// array(':academic_term_period_id'=>(int) $_REQUEST['Attendence']['sem_id']));

	        $org_id=Yii::app()->user->getState('org_id');
            	
		$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id and current_sem= :current_sem', array(':academic_term_period_id'=>(int) $_REQUEST['Attendence']['sem_id'],':current_sem'=>1, ':org_id'=>$org_id));
     
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode('Sem-'.$name),true);
            }
        }
//================== AttendenceDivisionReport division Update =============	
	public function actionGetattendancediv()
        {
            $data=  Division::model()->findAll('academic_name_id=:sem_id AND branch_id =:branchid',
		 array(':sem_id'=>(int) $_REQUEST['Attendence']['sem_name_id'],'branchid'=>$_REQUEST['Attendence']['branch_id']));
                  
            $data=CHtml::listData($data,'division_id','division_code');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
        }


//================== Attendence Division Update =============
	public function actiongetAttendenceItemName1()
        {
           
		$org_id=Yii::app()->user->getState('org_id');
		$div = array();
		$sub = array();
		$bat = array();		
		$data= array();
		$data1=array();
		$data2= array();		
		$data3=array();
	
		
		// for update division

		$data=Division::model()->findAll(array('condition'=>'branch_id='.(int) $_REQUEST['Attendence']['branch_id'].' and academic_name_id='.(int)$_REQUEST['Attendence']['sem_name_id'].' and division_organization_id='.$org_id));
			
		
		foreach($data as $d1)
		{
			$data2=Batch::model()->findAll(array('condition'=>'div_id='.$d1['division_id']));
			break;

		}
	  	$data2=CHtml::listData($data2,'batch_id','batch_code');
		 $bat =  "<option value=''>Select Batch</option>";
		foreach($data2 as $value2=>$name2)
		{
			$bat .= CHtml::tag('option',
				array('value'=>$value2),CHtml::encode($name2),true);
		}	
          	
	    	$data3=CHtml::listData($data,'division_id','division_code');
	    	foreach($data3 as $value=>$name)
	    	{
	        	$div .= CHtml::tag('option',
	                array('value'=>$value),CHtml::encode($name),true);
	    	}
	
		$data1=SubjectMaster::model()->findAll(array('condition'=>'subject_master_branch_id='.(int) $_REQUEST['Attendence']['branch_id'].' and subject_master_academic_terms_name_id='.(int) $_REQUEST['Attendence']['sem_name_id'].' and subject_master_organization_id='.$org_id));
                  	
		$data1=CHtml::listData($data1, 'subject_master_id' ,'subject_master_name');

		foreach($data1 as $value1=>$name1)
		{
			$sub_mas = SubjectMaster::model()->findByPk($value1);
			$type = SubjectType::model()->findByPk($sub_mas->subject_master_type_id)->subject_type_name;
		        $sub .= CHtml::tag('option',
		                array('value'=>$value1),CHtml::encode($name1.'('.$type.')'),true);
		}
		
		
		  
		
		echo CJSON::encode(array(
						'div'=>$div,
						'sub'=>$sub,
						'batch'=>$bat,
					    ));
	}

//================== Attendence Batch Update =============
	public function actiongetAttendenceBatch()
        {
	    $org_id=Yii::app()->user->getState('org_id');
            $data=Batch::model()->findAll(array('condition'=>'div_id='.(int)$_REQUEST['Attendence']['div_id'].' and batch_organization_id='.$org_id));
                  
            $data=CHtml::listData($data,'batch_id','batch_code');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
        }
//================== Student Dynamic Report(StudInfoReport) =============
	public function actiongetReportSemester()
        {
            //$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		// array(':academic_term_period_id'=>(int) $_REQUEST['acdm_period']));
	 $org_id=Yii::app()->user->getState('org_id');
	 $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id and current_sem= :current_sem', array(':academic_term_period_id'=>(int) $_REQUEST['acdm_period'],':current_sem'=>1, ':org_id'=>$org_id));

                  
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
	    $sem = array();
	    $sem =  "<option value=''>Select Semester</option>";		

            foreach($data as $value=>$name)
            {
                $sem .= CHtml::tag('option',
                        array('value'=>$value),CHtml::encode("Sem-".$name),true);
            }
		echo $sem;
        }

//================== Student ID Card semester=============
	public function actiongetIdAcademicterm()
        {
		$org_id=Yii::app()->user->getState('org_id');
            	
		$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id and current_sem= :current_sem', array(':academic_term_period_id'=>(int) $_REQUEST['acdm_period'],':current_sem'=>1, ':org_id'=>$org_id));
                  
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
	    echo "<option value=''>Select Semster</option>";
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode("Sem-".$name),true);
            }
        }
		     	
	//=================== Student Archive Table ===================

	public function actiongetStudentArchiveAcademicTerm()
        {
            $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		 array(':academic_term_period_id'=>(int) $_REQUEST['StudentArchiveTable']['student_archive_ac_t_p_id']));
                  
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode("Sem-".$name),true);
            }
        }
//======================Feedback Master===================

	public function actionGetsubject()
        {
           
		$org_id=Yii::app()->user->getState('org_id');
		$sub = array();
		$data1=array();
	
		
		// for update division

	
		$data1=SubjectMaster::model()->findAll(array('condition'=>'subject_master_branch_id='.(int) $_REQUEST['FeedbackMaster']['feedback_branch_id'].' and subject_master_academic_terms_name_id='.(int) $_REQUEST['FeedbackMaster']['feedback_academic_term_id'].' and subject_master_organization_id='.$org_id));
                  	
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
//===================SMS-EMail===========================
	public function actiongetSmsAcademicterm()
        {
            //$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		 //array(':academic_term_period_id'=>(int) $_REQUEST['StudentSmsEmailDetails']['academic_period_id']));
	$org_id=Yii::app()->user->getState('org_id');	
	$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id and current_sem= :current_sem', array(':academic_term_period_id'=>(int) $_REQUEST['StudentSmsEmailDetails']['academic_period_id'],':current_sem'=>1, ':org_id'=>$org_id));                  
          
		
	    $data=CHtml::listData($data,'academic_term_id','academic_term_name');
	     echo "<option value=''>All Current Sem</option>";
           
            foreach($data as $value=>$name)
            {
                 echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode("Sem-".$name),true);
         
            }
        }
	public function actiongetSmsDivision()
        {
		$org_id=Yii::app()->user->getState('org_id');
		$data = array();
		
		$data=Division::model()->findAll(array('condition'=>'branch_id='.(int) $_REQUEST['StudentSmsEmailDetails']['branch_id'].' and academic_name_id='.(int)$_REQUEST['StudentSmsEmailDetails']['academic_name_id'].' and division_organization_id='.$org_id));
                
            $data=CHtml::listData($data,'division_id','division_code');
	    echo "<option value=''>Select Division</option>";
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
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
}
