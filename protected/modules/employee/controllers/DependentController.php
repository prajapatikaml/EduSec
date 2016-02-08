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
			'condition' => 't.employee_first_name LIKE :name and employee_info_transaction_id IN(select employee_transaction_id from employee_transaction where employee_transaction_organization_id ='.$org.' and employee_status=0)',
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

//================== EmployeeAddress Current State Update =============	
	 public function actionUpdateEmpCStates()
	 {
		    
		    $data = State::model()->findAll(array('condition'=>'country_id='.(int) $_REQUEST['EmployeeAddress']['employee_address_c_country']));
		    $data = CHtml::listData($data,'state_id','state_name');
		    echo "<option value=''>Select State</option>";
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
		    echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }

//================== EmployeeAddress Permanent State Update =============	
	    public function actionUpdateEmpPStates()
	    {
		    
		    $data = State::model()->findAll('country_id=:country_id', array(':country_id'=>(int) $_REQUEST['EmployeeAddress']['employee_address_p_country']));
		    $data = CHtml::listData($data,'state_id','state_name');
		    echo "<option value=''>Select State</option>";
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
		    echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
		        echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
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


	public function actiongettransferempdata()
	{
		$des = array();
		$dep = array();
		$shf = array();
		$org_id = $_REQUEST['EmployeeTransaction']['employee_transaction_organization_id'];
		$data1 = EmployeeDesignation::model()->findAll(array('condition'=>'employee_designation_organization_id='.(int)$org_id));
		$data2 = Department::model()->findAll(array('condition'=>'department_organization_id='.(int)$org_id));
		$data3 = Shift::model()->findAll(array('condition'=>'shift_organization_id='.(int)$org_id));

		$data1=CHtml::listData($data1,'employee_designation_id','employee_designation_name');
		$data2=CHtml::listData($data2,'department_id','department_name');
		$data3=CHtml::listData($data3,'shift_id','shift_type');

		foreach($data1 as $value1=>$name1)
		{
			$des .= CHtml::tag('option',
				array('value'=>$value1),CHtml::encode($name1),true);
		}
		foreach($data2 as $value2=>$name2)
		{
			$dep .= CHtml::tag('option',
				array('value'=>$value2),CHtml::encode($name2),true);
		}
		foreach($data3 as $value3=>$name3)
		{
			$shf .= CHtml::tag('option',
				array('value'=>$value3),CHtml::encode($name3),true);
		}	
	
		
		  echo CJSON::encode(array(
						'des'=>$des,
						'dep'=>$dep,
						'shf'=>$shf
					    ));	
	}


}
