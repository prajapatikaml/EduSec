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

//*********************************************************************************************************

	public function actionGettimetablediv()
	{
		$room_arr=array();
		$branchid = $_POST['TimeTableDetail']['branchid'];
		$day=$_POST['TimeTableDetail']['day'];
		$lec=$_POST['TimeTableDetail']['lec'];
		$timetable_id=$_POST['TimeTableDetail']['timetable_id'];

		$div1=Yii::app()->db->createCommand()
				    ->select('division_id , division_code')
				    ->from('division')
				    ->where('branch_id='.(int)$_REQUEST['TimeTableDetail']['branchid']. ' and academic_name_id='.(int)$_REQUEST['TimeTableDetail']['acdm_name_id'].' and division_id NOT IN(select division_id from time_table_detail where day='.$day.' and lec='.$lec.' and branch_id='.(int)$_REQUEST['TimeTableDetail']['branchid'].' and acdm_name_id='.(int) $_REQUEST['TimeTableDetail']['acdm_name_id'].' and timetable_id='.$timetable_id.' and subject_type=1'.')')
			    	    ->queryAll();
		$div1 = CHtml::listData($div1,'division_id','division_code');		
		foreach($div1 as $value=>$name)
		{
			echo CHtml::tag('option',
				array('value'=>$value),CHtml::encode($name),true);
		}

		
	}
	public function actiongetbranchtableroom()
	{
		$room_arr=array();
		$day=$_POST['TimeTableDetail']['day'];
		$lec=$_POST['TimeTableDetail']['lec'];
		$type=null;
		$org_id=Yii::app()->user->getState('org_id');
		$timetable_id=$_POST['TimeTableDetail']['timetable_id'];
		
		$room_category=(int)$_REQUEST['TimeTableDetail']['room_category'];
		//$room = RoomCategory::model()->findByAttributes(array('id'=>$class));
		//$typeid= $room['id'];

		$room1=Yii::app()->db->createCommand()
				    ->select('id,room_name')
				    ->from('room_details_master')
				    ->where('room_category='.$room_category.' and  room_details_organization_id='.$org_id.' AND id NOT IN(select room_id from time_table_detail where day='.$day.' and lec='. $lec.' and timetable_id='.$timetable_id.')')
			    	    ->queryAll();
				
		$room = CHtml::listData($room1,'id','room_name');		
		foreach($room as $value=>$name)
			{
				echo CHtml::tag('option',
					array('value'=>$value),CHtml::encode($name),true);
			}
		

	}
	public function actionAutoCompleteLookup()
	{
	       if(Yii::app()->request->isAjaxRequest && isset($_GET['q']))
	       {
		    /* q is the default GET variable name that is used by
		    / the autocomplete widget to pass in user input
		    */
		$org = Yii::app()->user->getState('org_id');
		  $name = $_GET['q']; 
		            // this was set with the "max" attribute of the CAutoComplete widget
		  $limit = min($_GET['limit'], 50); 
	
		 $userArray = EmployeeInfo::model()->findAll(array(
			'condition' => 't.employee_first_name LIKE :name and employee_info_transaction_id IN(select employee_transaction_id from employee_transaction where employee_transaction_organization_id ='.$org.')',
'params' => array(':name' => "%$name%"),
));
		  $returnVal = '';
		  foreach($userArray as $userAccount)
		  {
		     $returnVal .= $userAccount->getAttribute('employee_first_name')." ".$userAccount->getAttribute('employee_middle_name')." ".$userAccount->getAttribute('employee_last_name').'|'.$userAccount->getAttribute('employee_info_transaction_id')."\n";
		  }
		  echo $returnVal;
	       }
	 }
	public function actiongettimetablesubjects()
        {
		$sub = array();
		$div = $_REQUEST['TimeTableDetail']['division_id'];
		$sub = null;
		$batch_arr = array();
	   	$day=$_POST['TimeTableDetail']['day'];
		$lec=$_POST['TimeTableDetail']['lec'];
		$fac = $_POST['TimeTableDetail']['faculty_emp_id'];
		$type=null;
		$org_id=Yii::app()->user->getState('org_id');
		$timetable_id=$_POST['TimeTableDetail']['timetable_id'];	
	      	
		if($_REQUEST['TimeTableDetail']['subject_type'] !=0)
		{
		    $typeid = $_REQUEST['TimeTableDetail']['subject_type'];
  		    $type=SubjectType::model()->findByPk($typeid)->subject_type_name;
		}
		if($type=="Theory")
		{
			$data = Yii::app()->db->createCommand()
				->select('subject_master_id,subject_master_name')
				->from('assign_subject as')
				->join('subject_master sm','sm.subject_master_id=as.subject_id')
				->where('subject_faculty_id='.$fac.' and subject_id in(select subject_master_id from subject_master where subject_master_type_id='.(int) $_REQUEST['TimeTableDetail']['subject_type'].' and subject_master_branch_id='.(int)$_POST['TimeTableDetail']['branchid'].' and subject_master_academic_terms_name_id='.$_POST['TimeTableDetail']['acdm_name_id'].' and  subject_master_organization_id='.$org_id.')')
				->queryAll();
			
			$data=CHtml::listData($data,'subject_master_id','subject_master_name');
			 
				foreach($data as $value=>$name)
				{
					$sub .=CHtml::tag('option',
						array('value'=>$value),CHtml::encode($name),true);
				}
			
			
		}  //thory if end
		else if($type != null)
		{
			$data1 = Yii::app()->db->createCommand()
				->select('subject_master_id,subject_master_name')
				->from('assign_subject as')
				->join('subject_master sm','sm.subject_master_id=as.subject_id')
				->where('subject_faculty_id='.$fac.' and subject_id in(select subject_master_id from subject_master where subject_master_type_id='.(int) $_REQUEST['TimeTableDetail']['subject_type'].' and subject_master_branch_id='.(int)$_POST['TimeTableDetail']['branchid'].' and subject_master_academic_terms_name_id='.$_POST['TimeTableDetail']['acdm_name_id'].' and  subject_master_organization_id='.$org_id.')')
				->queryAll();

			$data1=CHtml::listData($data1,'subject_master_id','subject_master_name');
			
				foreach($data1 as $value=>$name)
				{
					$sub .=CHtml::tag('option',
						array('value'=>$value),CHtml::encode($name),true);
				}
			

				$batch1=Yii::app()->db->createCommand()
					    ->select('batch_id,batch_code')
					    ->from('batch')
					    ->where('div_id='.(int)$_REQUEST['TimeTableDetail']['division_id'].' and batch_organization_id='.$org_id.' and batch_id NOT IN(select batch_id from time_table_detail where day='.$day.' and lec='.$lec.' and timetable_id='.$timetable_id.')')
				    	    ->queryAll();

				$batch=array();
				$batch = CHtml::listData($batch1,'batch_id','batch_code');
					
			foreach($batch as $value=>$name)
			{
				$batch_arr .=CHtml::tag('option',
					array('value'=>$value),CHtml::encode($name),true);
			}
		}// theory else end
		
			echo CJSON::encode(array(
					'sub' => $sub,
					'sub_type'=>$type,
					'batch'=> $batch_arr,
				    ));

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

	public function actionGetStudCertiSem()
        {
	    $org_id = Yii::app()->user->getState('org_id');
	    $data = AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id', array(':academic_term_period_id'=>(int) $_REQUEST['Certificate']['academic_term_period'], ':org_id'=>$org_id));
             
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode('Sem-'.$name),true);
            }
         }

	public function actionSemEndSemester()
        {
	    $org_id = Yii::app()->user->getState('org_id');
	    $data = AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id', array(':academic_term_period_id'=>(int) $_REQUEST['StudentTransaction']['student_academic_term_period_tran_id'], ':org_id'=>$org_id));
             
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
         }

/****************************************************************************************************************/

//================== Batch Academic Term Update =============
	public function actiongetBatchItemName()
        {
           // $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		 //array(':academic_term_period_id'=>(int) $_REQUEST['Batch']['academic_period_id']));
 
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
//for date report By Ravi Bhalodiya
	public function actiongetDateFeesmasterItemName()
        {

		$org_id=Yii::app()->user->getState('org_id');
		$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id and current_sem= :current_sem', array(':academic_term_period_id'=>(int) $_REQUEST['FeesPaymentTransaction']['fees_acdm_period'],':current_sem'=>1, ':org_id'=>$org_id));


          /*  $org_id=Yii::app()->user->getState('org_id');
	    $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id', array(':academic_term_period_id'=>(int) $_REQUEST['FeesPaymentTransaction']['fees_acdm_period'], ':org_id'=>$org_id));*/

                  
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
	    echo "<option value=''>Select Semester</option>";
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

//================== SubjectMaster AcademicTerm Update =============		     
	public function actiongetSubjectItemName()
        {
            //$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		 //array(':academic_term_period_id'=>(int) $_REQUEST['SubjectMaster']['subject_master_academic_terms_period_id']));

		$org_id=Yii::app()->user->getState('org_id');
		$data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and academic_term_organization_id = :org_id and current_sem= :current_sem', array(':academic_term_period_id'=>(int) $_REQUEST['SubjectMaster']['subject_master_academic_terms_period_id'],':current_sem'=>1, ':org_id'=>$org_id));

                  
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode('Sem-'.$name),true);
            }
        }


//================== TimeTable Update =============		     
	public function actiongetTimeTableAcademicTerm()
        {
            $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id and current_sem =:current',
		 array(':academic_term_period_id'=>(int) $_REQUEST['TimeTable']['timetable_acdm_period'],':current'=>1));
                  
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode("Sem-".$name),true);
            }
        }

	public function actiongetTimeTableDivision()
        {
            //$data=  Division::model()->findAll('branch_id=:branch_id',
		// array(':branch_id'=>(int) $_REQUEST['FeesPaymentTransaction']['fees_branch'],));
		$org_id=Yii::app()->user->getState('org_id');

		$data=Division::model()->findAll(array('condition'=>'branch_id='.(int) $_REQUEST['TimeTable']['timetable_branch'].' and 	academic_name_id='.$_REQUEST['TimeTable']['timetable_acdm_term'].' and division_organization_id='.$org_id));
                  	
            $data=CHtml::listData($data,'division_id','division_code');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
        }
//================== TimeTableDetail Update =============		     
	public function actiongetTimetableItemName()
        {
		$sub = array();
		//$room_arr=array();
		$batch_arr = array();
	   	$day=$_POST['TimeTableDetail']['day'];
		$lec=$_POST['TimeTableDetail']['lec'];
		$acdm_period_id=$_POST['TimeTableDetail']['acdm_period_id'];
		$type=null;
		$org_id=Yii::app()->user->getState('org_id');
		$timetable_id=$_POST['TimeTableDetail']['timetable_id'];	
	      	
		$type=SubjectType::model()->findByPk((int)$_REQUEST['TimeTableDetail']['subject_type'])->subject_type_name;
		if($type=="Theory")
		{
			$data= SubjectMaster::model()->findAll(array('condition'=> 'subject_master_type_id='.(int) $_REQUEST['TimeTableDetail']['subject_type'].' and subject_master_branch_id='.(int)$_REQUEST['TimeTableDetail']['branch_id'].' and  subject_master_organization_id='.$org_id.' and  subject_master_academic_terms_name_id='.(int)$_REQUEST['TimeTableDetail']['acdm_name_id']));
			
			$data=CHtml::listData($data,'subject_master_id','subject_master_name');
			 
				foreach($data as $value=>$name)
				{
					$sub .=CHtml::tag('option',
						array('value'=>$value),CHtml::encode($name),true);
				}
			
			/*
			$class='classroom';
			$roomid = RoomCategory::model()->findAll(array('condition'=>'category_name="'.$class.'" and room_category_organization_id='.$org_id));
			foreach($roomid as $r)
			{
				$typeid= $r['id'];
			}
			$room=array();
			$room1=Yii::app()->db->createCommand()
					    ->select('id')
					    ->from('room_details_master')
					    ->where('room_category='.$typeid.' and  room_details_organization_id='.$org_id.' AND id NOT IN(select room_id from time_table_detail where day='.$day.' and lec='.$lec.' and acdm_period_id='.$acdm_period_id.' and  time_table_detail_organization_id='.$org_id.' and timetable_id='.$timetable_id.')')
				    	    ->queryAll();
					
					
						foreach($room1 as $n)
						{
							$temp=$n['id'];
						 	$room[$temp]=RoomDetailsMaster::model()->findByPk($n['id'])->room_name;				
						}
					

			//$room=RoomDetailsMaster::model()->findAll(array('condition'=>'room_category='.$typeid));
			//$room=CHtml::listData($room,'id','room_name');
			foreach($room as $value=>$name)
			{
				$room_arr.=CHtml::tag('option',
					array('value'=>$value),CHtml::encode($name),true);
			}*/
		}  //thory if end
		else 
		{
			
			//subject_master_academic_terms_name_id
			$semestername=AcademicTerm::model()->findByPk((int)$_REQUEST['TimeTableDetail']['acdm_name_id'])->academic_term_name;			
			$data= SubjectMaster::model()->findAll(
			array('condition'=>'subject_master_type_id='.(int)$_REQUEST['TimeTableDetail']['subject_type'].' and subject_master_branch_id='.(int)$_REQUEST['TimeTableDetail']['branch_id'].' and  subject_master_organization_id='.$org_id. ' and  subject_master_academic_terms_name_id='.(int)$_REQUEST['TimeTableDetail']['acdm_name_id']));

			$data=CHtml::listData($data,'subject_master_id','subject_master_name');
			
				foreach($data as $value=>$name)
				{
					$sub .=CHtml::tag('option',
						array('value'=>$value),CHtml::encode($name),true);
				}
			
			

			
			/*$class='classroom';
			$room = RoomCategory::model()->findByAttributes(array('category_name'=>$class,'room_category_organization_id'=>$org_id));
			$typeid= $room['id'];

			$room=array();
			$room1=Yii::app()->db->createCommand()
					    ->select('id')
					    ->from('room_details_master')
					    ->where('room_category<>'.$typeid.' and  room_details_organization_id='.$org_id.' AND id NOT IN(select room_id from time_table_detail where day='.$day.' and lec='. $lec.' and acdm_period_id='.$acdm_period_id.' and timetable_id='.$timetable_id.')')
				    	    ->queryAll();
					
					if(empty($room1))
					{
						$f=1;
						echo "<b style='color:red;'>No Room Availble.Create room first.</b>";
						
					}
					else
					{
						foreach($room1 as $n)
						{
							$temp=$n['id'];
						 	$room[$temp]=RoomDetailsMaster::model()->findByPk($n['id'])->room_name;				
						}
					}


			//$room=RoomDetailsMaster::model()->findAll(array('condition'=>'room_category='.$typeid));
			//$room=CHtml::listData($room,'id','room_name');
			foreach($room as $value=>$name)
			{
				$room_arr .=CHtml::tag('option',
					array('value'=>$value),CHtml::encode($name),true);
			}
*/
			

				$batch1=Yii::app()->db->createCommand()
					    ->select('batch_id')
					    ->from('batch')
					    ->where('div_id='.(int)$_REQUEST['TimeTableDetail']['division_id'].' and batch_organization_id='.$org_id.' and batch_id NOT IN(select batch_id from time_table_detail where day='.$day.' and lec='.$lec.' and timetable_id='.$timetable_id.')')
				    	    ->queryAll();

				$batch=array();
					if(empty($batch1))
					{
						$f=1;
						echo "<b style='color:red;'>No Batch Availble.Create batch first.</b>";
						
					}
					else
					{	
				
						foreach($batch1 as $n)
						{
							$temp=$n['batch_id'];
						 	$batch[$temp]=Batch::model()->findByPk($n['batch_id'])->batch_code;				
						}
					}

			//$batch= Batch::model()->findAll(
			//array('condition'=>'div_id='.(int) $_REQUEST['TimeTableDetail']['division_id']));
			//$batch=CHtml::listData($batch,'batch_id','batch_code');
			foreach($batch as $value=>$name)
			{
				$batch_arr .=CHtml::tag('option',
					array('value'=>$value),CHtml::encode($name),true);
			}
		}// theory else end
		
			echo CJSON::encode(array(
					'sub_type'=>$type,					
					'sub' => $sub,
					//'room'=> $room_arr,
					'batch'=> $batch_arr,
					
					
				    ));

        }
//===== update room depend on room category ======

	public function actiongetTimetableRoom()
	{
		$room_arr=array();
		$day=$_POST['TimeTableDetail']['day'];
		$lec=$_POST['TimeTableDetail']['lec'];
		$acdm_period_id=$_POST['TimeTableDetail']['acdm_period_id'];
		$type=null;
		$org_id=Yii::app()->user->getState('org_id');
		$timetable_id=$_POST['TimeTableDetail']['timetable_id'];
		
		$room_category=(int)$_REQUEST['TimeTableDetail']['room_category'];
		//$room = RoomCategory::model()->findByAttributes(array('id'=>$class));
		//$typeid= $room['id'];

		$room1=Yii::app()->db->createCommand()
				    ->select('id')
				    ->from('room_details_master')
				    ->where('room_category='.$room_category.' and  room_details_organization_id='.$org_id.' AND id NOT IN(select room_id from time_table_detail where day='.$day.' and lec='. $lec.' and acdm_period_id='.$acdm_period_id.' and timetable_id='.$timetable_id.')')
			    	    ->queryAll();
				
				if(empty($room1))
				{
					$f=1;
					echo "<b style='color:red;'>No Room Availble.Create room first.</b>";
					
				}
				else
				{
					foreach($room1 as $n)
					{
						$temp=$n['id'];
					 	$room[$temp]=RoomDetailsMaster::model()->findByPk($n['id'])->room_name;				
					}
				}
		foreach($room as $value=>$name)
			{
				echo CHtml::tag('option',
					array('value'=>$value),CHtml::encode($name),true);
			}
		
		/*echo CJSON::encode(array(
				'room'=>$room_arr,
		));*/
		
	}
//================== TimeTable Update =============		     	
	public function actiongetTimetableItemName1()
        {
         	
		$data=array();	
		$day=$_POST['TimeTableDetail']['day'];
		$lec=$_POST['TimeTableDetail']['lec'];
		$acdm_period_id=$_POST['TimeTableDetail']['acdm_period_id'];
		$org_id=Yii::app()->user->getState('org_id');
		$timetable_id=$_POST['TimeTableDetail']['timetable_id'];

			
		$check=TimeTableDetail::model()->findAllByAttributes(
								array(),
								$condition  = 'day = :day AND lec = :lec AND branch_id = :branch_id AND acdm_name_id = :acdm_name_id AND timetable_id = :timetable_id',
								$params     = array(
									
									':day' => $day,
						 			':lec' => $lec,
									':branch_id' =>(int)$_REQUEST['TimeTableDetail']['branch_id'],
									':timetable_id' => $timetable_id,
									':acdm_name_id'=>(int)$_REQUEST['TimeTableDetail']['acdm_name_id']
									));

			$flag=0;
			foreach($check as $c)
			{
				if($c['subject_type']==2)
				{
					$flag=1;
					break;				
				}
				
			}
			$data=array();
			if($flag==1)
			{
				$data= Division::model()->findAll(array('condition'=>'academic_name_id='.(int) $_REQUEST['TimeTableDetail']['acdm_name_id'].' and academic_period_id='.$acdm_period_id.' and branch_id='.(int)$_REQUEST['TimeTableDetail']['branch_id'].' and division_organization_id='.$org_id));
			$data=CHtml::listData($data,'division_id','division_code');	
			}	
			else
			{
			
			$div1=Yii::app()->db->createCommand()
				    ->select('division_id , division_code')
				    ->from('division')
				    ->where('branch_id='.(int)$_REQUEST['TimeTableDetail']['branch_id']. ' and academic_name_id='.(int)$_REQUEST['TimeTableDetail']['acdm_name_id'].' and division_organization_id='.$org_id.' and division_id NOT IN(select division_id from time_table_detail where day='.$day.' and lec='.$lec.' and branch_id='.(int)$_REQUEST['TimeTableDetail']['branch_id'].' and acdm_period_id='.$acdm_period_id.' and acdm_name_id='.(int) $_REQUEST['TimeTableDetail']['acdm_name_id'].' and timetable_id='.$timetable_id.' and subject_type=1'.')')
			    	    ->queryAll();
					if(empty($div1))
					{
						echo "<b style='color:red;'>No Division Availble.Create division first.</b>";
						$f=1;
					}
					else
					{
						foreach($div1 as $n)
						{
							$temp=$n['division_id'];
						 	$data[$temp]=Division::model()->findByPk($n['division_id'])->division_code;				
						}
						
					}
			}		
				
		    //$data=CHtml::listData($data,'division_id','division_code');

		  
			    foreach($data as $value=>$name)
			    {
				echo CHtml::tag('option',
				        array('value'=>$value),CHtml::encode($name),true);
			    }
		    
        }

	
//================== FeedbackMaster Update =============

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
//================== Outward detail Update =============
	public function actionUpdateItemCategory()
        {
	
            $data=  InwardDetails::model()->findAll('item_category_id=:item_category_id',
                    array(':item_category_id'=>(int) $_REQUEST['OutwardDetails']['item_category_id']));
            $data=CHtml::listData($data,'id','name');
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
		     	
//================== Student ID Card Division=============

	public function actiongetIdDivision()
        {
		$org_id=Yii::app()->user->getState('org_id');
		$data = array();
		if(isset($_REQUEST['acdm_period']))
		{
		$data=Division::model()->findAll(array('condition'=>'branch_id='.(int) $_REQUEST['branch_name'].' and academic_name_id='.(int)$_REQUEST['acdm_name'].' and division_organization_id='.$org_id));
                } 
		else
		{
		$data=Division::model()->findAll(array('condition'=>'branch_id='.(int) $_REQUEST['branch_name'].' and division_organization_id='.$org_id));
		}
            $data=CHtml::listData($data,'division_id','division_code');
	    echo "<option value=''>Select Division</option>";
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
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
	/* get division for elective subject*/
	public function actiongetelectivedivision()
        {
		
		$subject_id =  $_REQUEST['ElectiveSubjectDetails']['elective_subject_id'];
		$subject_branch = SubjectMaster::model()->findByAttributes(array('subject_master_id'=>$subject_id));
		
		$org_id=Yii::app()->user->getState('org_id');
		$data = array();
		
		$data=Division::model()->findAll(array('condition'=>'division_organization_id='.$org_id.' and branch_id='.$subject_branch['subject_master_branch_id'].' and academic_name_id='.$subject_branch['subject_master_academic_terms_name_id']));
                
            $data=CHtml::listData($data,'division_id','division_code');
	    echo "<option value=''>Select Division</option>";
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
        }
	public function actiongetSubevent()
	{
		$org_id=Yii::app()->user->getState('org_id');
		$eventid=$_REQUEST['EventParticipants']['event_participants_event_id'];	
		$data = array();
		
		$data=SubEvent::model()->findAll(array('condition'=>'sub_event_org_id='.$org_id.' and sub_event_event_id='.$eventid));
                
            $data=CHtml::listData($data,'sub_event_id','sub_event_name');
	    echo "<option value=''>Select Sub Events</option>";
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
       
	}
	public function actiongetBlock()
        {
		$div = array();

	        $result=HostelBlocks::model()->findAll('block_hostel_id = '.(int) $_REQUEST['HostelRoomMaster']['hostel_hostelinfo_id']);
                
	  	  $data=CHtml::listData($result,'block_id','block_name');
	  	  $div .= "<option value=''>Select Block</option>";

		  foreach($data as $value=>$name)
		  {
			$div .= CHtml::tag('option',
				array('value'=>$value),CHtml::encode($name),true);
		  }  
		  
		  echo CJSON::encode(array(
			'div'=>$div,
	    	  )); 

	}
// ========================== coursewise semester=================
	public function actiongetSem()
        {
         	$sem = array();		
		$data= array();		
		
		$data=Yii::app()->db->createCommand()
			    ->select('academic_term_id,academic_term_name')
			    ->from('academic_term')
			    ->where('course_id='.(int) $_REQUEST['Batch']['course_id'].' and current_sem=1')
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

}
