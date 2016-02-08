<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class DependentController extends RController
{
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	public function actiongetbranchsubject()
        {
            $org_id=Yii::app()->user->getState('org_id');
	    $sbranch = 0;
	   
	    if($_REQUEST['AssignSubject']['subject_branch'] != 0)
            $sbranch = $_REQUEST['AssignSubject']['subject_branch'];
	
	    $acd = AcademicTerm::model()->findAll('academic_term_organization_id = :org_id and current_sem= :current_sem', array(':current_sem'=>1, ':org_id'=>$org_id));
	   
	    $acd_array = CHtml::listData($acd,'academic_term_id','academic_term_id');
	    $comm_string = implode(',' ,$acd_array);

	    $data = Yii::app()->db->createCommand()
		    ->select('subject_master_id,subject_master_alias,subject_master_type_id') 
		    ->from('subject_master')
		    ->where('subject_master_branch_id='.$sbranch.' and subject_master_academic_terms_name_id IN ('.$comm_string.')')
		    ->queryAll();

            foreach($data as $name)
            {
		$type = SubjectType::model()->findByPk($name['subject_master_type_id'])->subject_type_name;
                echo CHtml::tag('option',
                        array('value'=>$name['subject_master_id']),CHtml::encode($name['subject_master_alias'].'('.$type.')'),true);
            }
	
         }
/****************************************************************************************************************/

//================== Batch Academic Term Update =============
	public function actiongetBatchItemName()
        {
	    $org_id=Yii::app()->user->getState('org_id');
$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id and current_sem= :current_sem', array(':academic_term_period_id'=>(int) $_REQUEST['Batch']['academic_period_id'],':current_sem'=>1, ':org_id'=>$org_id));
                 
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode('Sem-'.$name),true);
            }
         }
//================== Batch Division Update =============
	public function actiongetBatchItemName1()
        {
          
		$org_id=Yii::app()->user->getState('org_id');

		$data=Division::model()->findAll(array('condition'=>'branch_id='.(int) $_REQUEST['Batch']['branch_id'].' and academic_name_id='.$_REQUEST['Batch']['academic_name_id'].' and division_organization_id='.$org_id));
                  	
            $data=CHtml::listData($data,'division_id','division_code');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
        }

//================== Division Academic Term Update =============
	public function actiongetDivisionItemName()
        {
            //$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		// array(':academic_term_period_id'=>(int) $_REQUEST['Division']['academic_period_id']));

	    $org_id=Yii::app()->user->getState('org_id');
$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id and current_sem= :current_sem', array(':academic_term_period_id'=>(int) $_REQUEST['Division']['academic_period_id'],':current_sem'=>1, ':org_id'=>$org_id));
                  
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
         }

//================== EmployeeAddress Current State Update =============	
	 public function actionUpdateEmpCStates()
	 {
		    
		    $data = State::model()->findAll(array('condition'=>'country_id='.(int) $_REQUEST['EmployeeAddress']['employee_address_c_country']));
		    $data = CHtml::listData($data,'state_id','state_name');
		    //echo "<option value=''>Select State</option>";
		    foreach($data as $value=>$name)
			{
		        echo CHtml::tag('option', 
				array('value'=>$value),CHtml::encode($name),true);
	 		}
		    
	 }

//================== EmployeeAddress Current City Update =============	
	 public function actionUpdateEmpCCities()
	    {
		    $data = City::model()->findAll('state_id=:state_id', array(':state_id'=>(int) $_REQUEST['EmployeeAddress']['employee_address_c_state']));
		    $data = CHtml::listData($data,'city_id','city_name');
		    //echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }

//================== EmployeeAddress Permanent State Update =============	
	    public function actionUpdateEmpPStates()
	    {
		    
		    $data = State::model()->findAll('country_id=:country_id', array(':country_id'=>(int) $_REQUEST['EmployeeAddress']['employee_address_p_country']));
		    $data = CHtml::listData($data,'state_id','state_name');
		    //echo "<option value=''>Select State</option>";
		    foreach($data as $value=>$name)
			{
		        echo CHtml::tag('option', 
				array('value'=>$value),CHtml::encode($name),true);
	 		}
		    
	    }
//================== EmployeeAddress Permanent City Update =============	
	    public function actionUpdateEmpPCities()
	    {
		    $data = City::model()->findAll('state_id=:state_id', array(':state_id'=>(int) $_REQUEST['EmployeeAddress']['employee_address_p_state']));
		    $data = CHtml::listData($data,'city_id','city_name');
		    //echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
		        echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }

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
		    //echo "<option value=''>Select State</option>";
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
		    //echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }

//================== StudentAddress Permanent State Update =============		    
	    public function actionUpdateStudPStates()
	    {
		    
		    $data = State::model()->findAll('country_id=:country_id', array(':country_id'=>(int) $_REQUEST['StudentAddress']['student_address_p_country']));
		    $data = CHtml::listData($data,'state_id','state_name');
		    //echo "<option value=''>Select State</option>";
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
		    //echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
		        echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }

//================== FeesMaster AcademicTerm Update =============		     
	public function actiongetFeesmasterItemName()
        {
            $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		 array(':academic_term_period_id'=>(int) $_REQUEST['FeesMaster']['fees_academic_term_id']));
                  
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode('Sem-'.$name),true);
            }
        }

	public function actiongetCertificateSem()
        {
            $org_id=Yii::app()->user->getState('org_id');
	    $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and current_sem =:current and academic_term_organization_id = :org_id', array(':academic_term_period_id'=>(int) $_REQUEST['period'], ':org_id'=>$org_id,':current'=>1));

                  
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
	    echo "<option value=''>Select Semester</option>";
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode('Sem-'.$name),true);
            }
        }



//================== FeesPaymentTransaction AcademicTerm Update =============		     
	public function actiongetFeesItemName()
        {
		$org_id=Yii::app()->user->getState('org_id');
            	
		//$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id', array(':academic_term_period_id'=>(int) $_REQUEST['FeesPaymentTransaction']['fees_acdm_period'],':org_id'=>$org_id));

		$org_id=Yii::app()->user->getState('org_id');
		$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id and current_sem= :current_sem', array(':academic_term_period_id'=>(int) $_REQUEST['FeesPaymentTransaction']['fees_acdm_period'],':current_sem'=>1, ':org_id'=>$org_id));

                  
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
	    echo "<option value=''>Select Semster</option>";
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode('Sem-'.$name),true);
            }
        }

//================== FeesPaymentTransaction Division Update =============		     
	public function actionBranchreceiptdivision()
        {
            //$data=  Division::model()->findAll('branch_id=:branch_id',
		// array(':branch_id'=>(int) $_REQUEST['FeesPaymentTransaction']['fees_branch'],));
		$org_id=Yii::app()->user->getState('org_id');

		$data=Division::model()->findAll(array('condition'=>'branch_id='.(int) $_REQUEST['FeesPaymentTransaction']['fees_branch'].' and academic_name_id='.$_REQUEST['FeesPaymentTransaction']['fees_acdm_name'].' and division_organization_id='.$org_id));
                  
            $data=CHtml::listData($data,'division_id','division_code');
	    echo "<option value=''>Select Divistion</option>";
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

		     	
	//-------------------------------------------------------------------------------------------------
	public function actiongetDocumentSemester()
        {
           // $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		// array(':academic_term_period_id'=>$_REQUEST['acdm_period']));

	$org_id=Yii::app()->user->getState('org_id');
	$data=AcademicTerm::model()->findAll(array('condition'=>'academic_term_period_id='.$_REQUEST['acdm_period'].' AND current_sem=1 AND  academic_term_organization_id ='.$org_id));


        $data=CHtml::listData($data,'academic_term_id','academic_term_name');
	    	

            foreach($data as $value=>$name)
            {
                echo  CHtml::tag('option',
                        array('value'=>$value),CHtml::encode("Sem-".$name),true);
            }
		//echo $sem;
		/*$ravi =  $_REQUEST['acdm_period'];
		echo $ravi;*/
		
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
