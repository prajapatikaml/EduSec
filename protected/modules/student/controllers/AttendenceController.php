<?php

class AttendenceController extends EduSecCustom
{

	public $row1;
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	
	public function actionCreate()
	{

		$model=new Attendence;
		$tran=new StudentTransaction;
		$count = 0;
		$row1 = array();
	
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		
		if(!empty($_POST['Attendence']['branch_id']) && !empty($_POST['search']) &&!empty($_POST['Attendence']['shift_id']) && !empty($_POST['Attendence']['div_id']) && !empty($_POST['Attendence']['sub_id']) && !empty($_POST['Attendence']['sem_id']) && !empty($_POST['Attendence']['employee_id']) && !empty($_POST['Attendence']['sem_name_id']) && !empty($_POST['Attendence']['student_attendence_period_id']) )
		{
			$model->attributes=$_POST['Attendence'];			
			$st_per_id = $_POST['Attendence']['student_attendence_period_id'];
			$branch_id=$model->branch_id;
			$shift_id=$model->shift_id;
			$div_id=$model->div_id;
			$batch_id=$model->batch_id;
			$sub_id=$model->sub_id;
			$sem_id=$model->sem_id;
			$faculty_id = $model->employee_id;
			$date = $model->attendence_date;
			$sem_name = $model->sem_name_id;			
			$subject_type = SubjectMaster::model()->findByPk($sub_id)->subject_master_type_id; 
			$subject_type_name = SubjectType::model()->findByPk($subject_type)->subject_type_name;			
			$all_array = array('branch_id'=>$branch_id,'faculty_id'=>$faculty_id,'shift_id'=>$shift_id,'div_id'=>$div_id,'batch_id'=>$batch_id,'sub_id'=>$sub_id,'sem_id'=>$sem_id,'date'=>$date,'sem_name'=>$sem_name,'st_per_id'=>$st_per_id);

			if($subject_type_name == 'Elective')
			{
				$row1 = Yii::app()->db->createCommand()
			        ->select('student_transaction_id,student_transaction_student_id,student_enroll_no,student_roll_no,student_first_name')
				->from('student_transaction st')
				->join('student_info','student_info_transaction_id=student_transaction_id')
				 ->join('elective_subject_details esd','esd.elective_subject_student_id =st.student_transaction_student_id')
				->where('st.student_transaction_division_id='.$div_id.' and esd.elective_subject_sem_id='.$sem_name.' and esd.elective_subject_id='.$sub_id.' order by student_enroll_no')
				->queryAll();				
			}
			else if($model->batch_id)
			{
				$model->batch_id=$batch_id;
				$row1 = Yii::app()->db->createCommand()
				->select('student_transaction_id,student_transaction_student_id,student_roll_no,student_enroll_no,student_first_name')
				->from('student_transaction')
				->join('student_info','student_info_transaction_id=student_transaction_id')
				->where('student_transaction_branch_id='.$branch_id.' and student_transaction_shift_id='.$shift_id.' and student_transaction_division_id='.$div_id.' and student_transaction_batch_id='.$batch_id.' and student_academic_term_name_id='.$sem_name.' and student_academic_term_period_tran_id ='.$sem_id.' and student_transaction_detain_student_flag in(5, 6)  order by student_enroll_no')
				->queryAll();
			}
			else
			{
				$row1 = Yii::app()->db->createCommand()
				->select('student_transaction_id,student_transaction_student_id,student_roll_no,student_enroll_no,student_first_name')
				->from('student_transaction')
				->join('student_info','student_info_transaction_id=student_transaction_id')
				->where('student_transaction_branch_id='.$branch_id.' and student_transaction_shift_id='.$shift_id.' and student_transaction_division_id='.$div_id.' and student_academic_term_name_id='.$sem_name.' and student_academic_term_period_tran_id ='.$sem_id.' and student_transaction_detain_student_flag in(5, 6) order by student_enroll_no')
				->queryAll();
			}
			$count = count($row1);			

			if($count == 0)
			{	
				Yii::app()->user->setFlash('not-select-attendece', "No Student Found for this Criteria");
				$this->redirect(array('create'));
			}
			Yii::app()->user->setState('stud_array',$row1);	
			Yii::app()->user->setState('all_array',$all_array);	
		
		}
		else if(isset($_POST['Attendence']) && isset($_POST['save']) )
		{
			
			$all_array = Yii::app()->user->getState('all_array');
			$studsession = Yii::app()->user->getState('stud_id');
			

			$date = $all_array['date'];
			$check = Attendence::model()->findByAttributes(array('student_attendence_period_id'=>$all_array['st_per_id'],'attendence_date'=>date("Y-m-d", strtotime($date)),'div_id'=>$all_array['div_id'],'attendence_organization_id'=>Yii::app()->user->getState('org_id')));

			if($check)
			{
				Yii::app()->user->setFlash('not-select-attendece', "You have already taken attendance with this criteria. so you can not take this again!!");
				$this->redirect(array('create'));	
			}
			else
			{


			$model->branch_id=$all_array['branch_id'];
			$model->shift_id=$all_array['shift_id'];
			$model->div_id=$all_array['div_id'];
			$model->batch_id=$all_array['batch_id'];
			$model->sub_id=$all_array['sub_id'];
			$model->sem_id=$all_array['sem_id'];
			$model->sem_name_id=$all_array['sem_name'];
			$attendence_date = date("Y-m-d", strtotime($date));
			$model->attendence_date = $attendence_date;
			$model->employee_id = $all_array['faculty_id'];
			$model->student_attendence_period_id = $all_array['st_per_id'];
			$model->attendence_organization_id = Yii::app()->user->getState('org_id');
			foreach($_POST['Attendence']['st_id'] as $index=>$student_id )
			{
				$model->setIsNewRecord(true);
				$model->attendence = 'A';
				if($student_id!=0)
					$model->attendence = 'P';
				
				$model->st_id = $index;		
				$model->id=null;				
		   		$model->save();	
			}
			$this->redirect(array('admin'));
			
			}
		}
		$this->render('create',array(
			'model'=>$model,'row1'=>$row1,
		));
	}
		public function actionShowstudentview()
	{
		$model=new Attendence;
		$count = 0;
		$row1 = array();
		$date = null;
		$period_no = $_REQUEST['lec_no'];
		$sub_id=$_REQUEST['subject_id'];
		$faculty_id=$_REQUEST['faculty_id'];
		$batch_id=$_REQUEST['batch'];
		$timetableid = $_REQUEST['timetableid'];
		$date = date('Y-m-d',strtotime($_REQUEST['date']));
		$subject_type = SubjectMaster::model()->findByPk($sub_id)->subject_master_type_id; 
		$subject_type_name = SubjectType::model()->findByPk($subject_type)->subject_type_name;
		$timetable=TimetableDetail::model()->findByPk($_REQUEST['timetableid']);	

		$row1 = Yii::app()->db->createCommand()
			->select('student_transaction_id, student_transaction_student_id,  student_first_name, student_roll_no, student_middle_name, student_last_name')
				->from('student_transaction')
				->join('student_info','student_info_transaction_id=student_transaction_id')
				->where('student_transaction_batch_id='.$batch_id.' order by student_roll_no')
				->queryAll();

		$check = Yii::app()->db->createCommand()
			->select('*')
			->from('attendence')
			->where('employee_id='.$_REQUEST['faculty_id'].' AND batch_id='.$_REQUEST['batch'].' AND student_attendence_period_id='.$_REQUEST['lec_no'].' AND attendence_date = "'.$date.'"')
			->queryrow();
		if($check)
		{
			echo "Attendance already taken.!";
			exit;	
		}
		$count = count($row1);
			
		if($count == 0)
		{
			Yii::app()->user->setFlash('not-select-attendece', "No Student Found for this Criteria");
		}		

		if(isset($_POST['save']))
		{

		$model->employee_id=$faculty_id;				
		$model->batch_id=$batch_id;
		$model->sub_id=$sub_id;
		$model->attendence_date = $date;
		$model->student_attendence_period_id = $period_no;			   
		$model->timetable_id = $timetableid;
		foreach($_POST['Attendence']['st_id'] as $index=>$student_id )
  	        {
			$model->setIsNewRecord(true);
			$model->attendence = 'A';
			if($student_id!=0)
				$model->attendence = 'P';
				$model->st_id = $index;		
				$model->id=null;				
		   		$model->save();
			   }
			$this->redirect(array('admin'));
		}

		$this->render('show_student_view',array(
			'model'=>$model,'row1'=>$row1,'timetabledetail'=>$timetable
		));
	}
	
	public function actionShowallstudentview()
	{
		$model=new Attendence;
		$timetabledetail = new TimeTableDetail;
		$count = 0;
		$row1 = array();
		$div=Division::model()->findByPk($_REQUEST['division_id']);
		$branch_id=$div->branch_id;
		$period_no = $_REQUEST['lec_no'];
		$sub_id=$_REQUEST['subject_id'];
		$sem_id=$div->academic_period_id;
		$date = date('Y-m-d',strtotime($_REQUEST['date']));
		$sem_name = $div->academic_name_id;
		$shift_id=1;
		$div_id=$_REQUEST['division_id'];

		$subject_type = SubjectMaster::model()->findByPk($sub_id)->subject_master_type_id; 
		$subject_type_name = SubjectType::model()->findByPk($subject_type)->subject_type_name;
			
		if($subject_type_name == 'Elective')
		{
			$row1 = Yii::app()->db->createCommand()
			        ->select('student_transaction_id,student_transaction_student_id,student_roll_no, student_enroll_no,student_first_name, student_middle_name, student_last_name')
				->from('student_transaction st')	
				->join('student_info','student_info_transaction_id=student_transaction_id')
				 ->join('elective_subject_details esd','esd.elective_subject_student_id =st.student_transaction_student_id')
				->where('st.student_transaction_division_id='.$div_id.' and esd.elective_subject_sem_id='.$sem_name.' and esd.elective_subject_id='.$sub_id.' order by student_enroll_no')
				->queryAll();
				$all_array = array('branch_id'=>$branch_id,'period_no'=>$period_no,'shift_id'=>$shift_id,'faculty_id'=>$_REQUEST['faculty_id'],'div_id'=>$div_id,'sub_id'=>$sub_id,'sem_id'=>$sem_id,'date'=>$date,'sem_name'=>$sem_name);
				
		}
		else if($_REQUEST['batch']!=0)
		{
			$batch_id=$_REQUEST['batch'];
			$row1 = Yii::app()->db->createCommand()
				->select('student_transaction_id,student_transaction_student_id, student_enroll_no,student_first_name,student_roll_no, student_middle_name, student_last_name')
				->from('student_transaction')
				->join('student_info','student_info_transaction_id=student_transaction_id')
				->where('student_transaction_branch_id='.$branch_id.' and student_transaction_division_id='.$div_id.' and student_transaction_batch_id='.$batch_id.' and student_academic_term_name_id='.$sem_name.' and student_academic_term_period_tran_id ='.$sem_id.' and student_transaction_detain_student_flag in(5, 6) order by student_enroll_no')
				->queryAll();
			$all_array = array('branch_id'=>$branch_id,'period_no'=>$period_no,'shift_id'=>$shift_id,'faculty_id'=>$_REQUEST['faculty_id'],'div_id'=>$div_id,'batch_id'=>$batch_id,'sub_id'=>$sub_id,'sem_id'=>$sem_id,'date'=>$date,'sem_name'=>$sem_name);			
		}
		else
		{
			$row1 = Yii::app()->db->createCommand()
				->select('student_transaction_id,student_transaction_student_id,student_roll_no, student_enroll_no,student_first_name, student_middle_name, student_last_name')
				->from('student_transaction')
				->join('student_info','student_info_transaction_id=student_transaction_id')
				->where('student_transaction_branch_id='.$branch_id.' and student_transaction_division_id='.$div_id.' and student_academic_term_name_id='.$sem_name.' and student_academic_term_period_tran_id ='.$sem_id.' and student_transaction_detain_student_flag in (5, 6) order by student_enroll_no')
				->queryAll();
				$all_array = array('branch_id'=>$branch_id,'shift_id'=>$shift_id,'div_id'=>$div_id,'batch_id'=>"",'sub_id'=>$sub_id,'sem_id'=>$sem_id,'date'=>$date,'sem_name'=>$sem_name,'period_no'=>$period_no,'faculty_id'=>$_REQUEST['faculty_id']);
		}
	
		if($date > date('Y-m-d') || $date < date('Y-m-d', strtotime( '-6 days' )))
		{	
			echo "you can not take attendance of before week date or future date!";
			exit;	
		}
		if($_REQUEST['batch']!=0)
		{
			$check = Attendence::model()->findByAttributes(array('employee_id'=>$_REQUEST['faculty_id'],'batch_id'=>$_REQUEST['batch'],'attendence_date'=>$date,'div_id'=>$div_id,'attendence_organization_id'=>Yii::app()->user->getState('org_id')));
		}
		else
		{			
			$check = Attendence::model()->findByAttributes(array('student_attendence_period_id'=>$period_no,'attendence_date'=>$date,'div_id'=>$div_id,'attendence_organization_id'=>Yii::app()->user->getState('org_id')));
		}
		if($check)
		{
			echo "you can not take attendance more than one time.!";
			exit;	
		}
		$count = count($row1);
			
		if($count == 0)
		{
			Yii::app()->user->setFlash('not-select-attendece', "No Student Found for this Criteria");
		}
		
			Yii::app()->user->setState('stud_array',$row1);	
			Yii::app()->user->setState('all_array',$all_array);	
			

		if(isset($_POST['save']))
		{
			$model->employee_id=$all_array['faculty_id'];				
			$model->branch_id=$all_array['branch_id'];
			$model->shift_id=$all_array['shift_id'];
			$model->div_id=$all_array['div_id'];
			$model->batch_id=$all_array['batch_id'];
			$model->sub_id=$all_array['sub_id'];
			$model->sem_id=$all_array['sem_id'];
			$model->sem_name_id=$all_array['sem_name'];
			$model->attendence_date = $all_array['date'];
			$model->student_attendence_period_id = $all_array['period_no'];			   
			$model->attendence_organization_id = Yii::app()->user->getState('org_id');	
			
			foreach($_POST['Attendence']['st_id'] as $index=>$student_id )
			{
				$model->setIsNewRecord(true);
				$model->attendence = 'A';
				if($student_id!=0)
					$model->attendence = 'P';
				
				$model->st_id = $index;		
				$model->id=null;				
		   		$model->save();	
			}
			$this->redirect(array('admin'));
		}

		$this->render('show_student_view',array(
			'model'=>$model,'row1'=>$row1, 'timetabledetail'=>$timetabledetail,
		));
	}



	public function actionSearchstudid1()
	{
		$model=new Attendence;
		
		$tran=new StudentTransaction;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Attendence']['st_id']))
		{
		
			
			$row1 = Yii::app()->user->getState('stud_array');
			$all_array = Yii::app()->user->getState('all_array');

			$model->attributes=$_POST['Attendence'];
		
			$checkboxvalue = $_POST['Attendence']['st_id'];
			
			$count=count($row1);
			
			$final = array();
			$i=0;
			foreach($row1 as $r1)
			{

				$final[$i] = $r1['student_transaction_student_id'];  
				$i++;
			}
			
			
			
			$result = array_diff($final, $checkboxvalue);


			foreach($checkboxvalue as $present_list)
			{
				$model->setIsNewRecord(true);

				$model->branch_id=$all_array['branch_id'];
				$model->shift_id=$all_array['shift_id'];
				$model->div_id=$all_array['div_id'];
				$model->batch_id=$all_array['batch_id'];
				$model->sub_id=$all_array['sub_id'];
				$model->sem_id=$all_array['sem_id'];
				$model->sem_name_id=$all_array['sem_name'];
				$model->attendence_date = $all_array['date'];
				$model->id=null;				
				$model->st_id = $present_list;
				$model->attendence = 'P';			   
				$model->attendence_organization_id = Yii::app()->user->getState('org_id');
		   		$model->save();	
			}


			foreach($result as $absent_list)
			{
				$model->branch_id=$all_array['branch_id'];
				$model->shift_id=$all_array['shift_id'];
				$model->div_id=$all_array['div_id'];
				$model->batch_id=$all_array['batch_id'];
				$model->sub_id=$all_array['sub_id'];
				$model->sem_id=$all_array['sem_id'];

				$model->setIsNewRecord(true);
				$model->id=null;				
				$model->st_id = $absent_list;
				$model->attendence = 'A';
				$model->attendence_organization_id = Yii::app()->user->getState('org_id');
				$model->attendence_date = $all_array['date'];
		   		$model->save();	
			}
			
			$this->redirect(array('admin'));
			
		}
	
	} 
	

	public function actionDisplay()
	{

		$model=new Attendence;
		
		$tran=new StudentTransaction;
		$count = 0;
		$row1 = array();
	
		if(isset($_POST['Attendence']))
		{
			$model->attributes=$_POST['Attendence']; 		
			$branch_id=$model->branch_id;
			$shift_id=$model->shift_id;
			$div_id=$model->div_id;
			$batch_id=$model->batch_id;
			$sub_id=$model->sub_id;
			$sem_id=$model->sem_id;
			$date = $model->attendence_date;
			$sem_name = $model->sem_name_id;
			
			$all_array = array('branch_id'=>$branch_id,'shift_id'=>$shift_id,'div_id'=>$div_id,'batch_id'=>$batch_id,'sub_id'=>$sub_id,'sem_id'=>$sem_id,'date'=>$date,'sem_name'=>$sem_name);

			if($model->batch_id)
			{
			$row1 = Yii::app()->db->createCommand()

			->select('student_transaction_id,student_transaction_student_id')
			->from('student_transaction')
			->where('student_transaction_branch_id='.$branch_id.' and student_transaction_shift_id='.$shift_id.' and student_transaction_division_id='.$div_id.' and student_transaction_batch_id='.$batch_id.' and student_academic_term_name_id='.$sem_name.' and student_academic_term_period_tran_id ='.$sem_id)
			->queryAll();
			}
			else
			{
			$row1 = Yii::app()->db->createCommand()
			->select('student_transaction_id,student_transaction_student_id')
			->from('student_transaction')
			->where('student_transaction_branch_id='.$branch_id.' and student_transaction_shift_id='.$shift_id.' and student_transaction_division_id='.$div_id.' and student_academic_term_name_id='.$sem_name.' and student_academic_term_period_tran_id ='.$sem_id)
			->queryAll();
			}
			$count = count($row1);
			
			if($count == 0)
			{
				Yii::app()->user->setFlash('not-select-attendece', "No Student Found for this Criteria");
				$this->redirect(array('create'));
			}
			Yii::app()->user->setState('stud_array',$row1);	
			Yii::app()->user->setState('all_array',$all_array);	
		
		}
		$this->render('display',array(
			'model'=>$model,'row1'=>$row1,
		));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Attendence']))
		{
			$model->attributes=$_POST['Attendence'];
			if(!empty($model->attendence))
			{
				$model->save(false);
				$this->redirect(array('admin'));
			}
			else
			{
				$model->addError('attendence','');
			}
		}
		

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		$model=new Attendence('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Attendence']))
			$model->attributes=$_GET['Attendence'];
		$this->render('admin',array(
			'model'=>$model,
		));
	
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Attendence('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Attendence']))
			$model->attributes=$_GET['Attendence'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionChart()
	{
		$model=new Attendence('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Attendence']))
			$model->attributes=$_GET['Attendence'];
		$branch = Yii::app()->db->createCommand()
                	->selectDistinct('branch_id')
			->from('attendence')
			//->order('branch_id DESC')
			->queryAll();
		$attendence = Yii::app()->db->createCommand()
                	->select('count(attendence)')
			->from('attendence')
			->group('branch_id')
			->where('attendence="P"')
			->queryAll();
		$xaxis = array();
		$yaxis = array();
		
		foreach($branch as $xvalue)
		{ 
			foreach($xvalue as $x)
			$xaxis[] = Branch::model()->findByPk($x)->branch_name;			
		}
		foreach($attendence as $yvalue)
		{ 	
			foreach($yvalue as $y)		
			$yaxis[] = $y;
		}
		
		
		$this->render('chart',array(
			'model'=>$model,'xaxis'=>$xaxis,'yaxis'=>$yaxis,
		));
	}
	

	public function actionChartReport()		// display chart reports
	{
	 	$model=new Attendence;	
		if(!empty($_POST['Attendence']['sem_id']))
		{

			$acdm_period=$_POST['Attendence']['sem_id'];

			$this->render('chart_table',array(
		               'acdm_period'=>$acdm_period,
               ));	
		}
		else
		{
			$this->render('chart_report',array(
                       'model'=>$model,
				 ));
		
		}
              
	}
	public function actionDisplayChart()	//display Pie chart
	{
		$model=new Attendence;	
		$attendence = Yii::app()->db->createCommand()
		        	->select('attendence')
				->from('attendence')
				->where('attendence="P" and branch_id='.$_REQUEST['branch_id'].' and sem_name_id='.$_REQUEST['sem_name_id'].' and sem_id='.$_REQUEST['sem_id'])
				->queryAll();
			
		$attendence1 = Yii::app()->db->createCommand()
		        	->select('attendence')
				->from('attendence')
				->where('attendence="A" and branch_id='.$_REQUEST['branch_id'].' and sem_name_id='.$_REQUEST['sem_name_id'].' and sem_id='.$_REQUEST['sem_id'])
				->queryAll();
			
		$totalstudent = Yii::app()->db->createCommand()
		        	->select('attendence')
				->from('attendence')
				->where('branch_id='.$_REQUEST['branch_id'].' and sem_name_id='.$_REQUEST['sem_name_id'].' and sem_id='.$_REQUEST['sem_id'])
				->queryAll();
		
		if(count($totalstudent)!=0)
		{
		$present=(count($attendence)*100)/count($totalstudent);
		
		$absent=(count($attendence1)*100)/count($totalstudent);
		}
		else
		{
			$present=0;
			$absent=0;
			
		}
		$this->render('piechart',array(
                       'model'=>$model,'present'=>$present,'absent'=>$absent,
				 ));
		
	}
	

	public function actionViewchart()
       {
               //$model=new User;
		 $model=new Attendence;
               // Uncomment the following line if AJAX validation is needed
               // $this->performAjaxValidation($model)
		
			
		  Yii::app()->clientScript->registerScript('someScript', "
                	      
			 $('#attendence-form').submit(function() {

                       var acdm_period,acdm_name,branch,div,subject;
                    
		       acdm_period = document.getElementById('Attendence_acdm_period').value;
                       acdm_name = document.getElementById('Attendence_acdm_name').value;
                       branch = document.getElementById('Attendence_branch').value;
                       div = document.getElementById('Attendence_div').value;
                       subject = document.getElementById('Attendence_subject').value;

                      myWindow=window.open('popbrowser?acdm_period='+acdm_period+'&acdm_name='+acdm_name+'&branch='+branch+'&div='+div+'&subject='+subject,'',config='height=420, width=900, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no, titlebar=0','id=new');
			   myWindow.focus();
                    	});
                       ");

		      
		if(!empty($_POST['Attendence']['acdm_period']) || !empty($_POST['Attendence']['branch']) || !empty($_POST['Attendence']['subject']))
		{
	              // $this->redirect(array('view','id'=>$model->id));
			
               }
       
               $this->render('chart',array(
                       'model'=>$model,
               ));
       }

       public function actionPopbrowser()
       {
               $this->layout='timetable_layout';
	       $model=new Attendence;
               $this->render('display_chart',array(
                       'model'=>$model,
               ));        
       }

     /*  public function actionStudentwise_report()	"Done by Karmraj"
       {
	       $model=new Attendence;
		if(isset($_POST['Attendence']))
		{
			$model->attributes=$_POST['Attendence'];

			$subject_data = SubjectMaster::model()->findAll(array('condition'=>'subject_master_academic_terms_period_id='.$model->sem_id.' AND subject_master_academic_terms_name_id='.$model->sem_name_id.' AND subject_master_branch_id ='.$model->branch_id.' AND subject_master_organization_id='.Yii::app()->user->getState('org_id')));

			$student_data = StudentInfo::model()->findAll(array('condition'=>'student_enroll_no="'.trim($model->student_enroll_no).'"'));
		
			$this->render('student_report_view',array(
                       'subject_data'=>$subject_data,'student_data'=>$student_data,
		        ));
			
		}
		else {
               $this->render('studentwise_report',array(
                       'model'=>$model,
               ));    
		}    
       }*/

	 public function actionStudentwisereport()	//done by Ravi B
    	   {
	       $model=new Attendence;
			
		if(!empty($_POST['Attendence']['student_enroll_no']) && (!empty($_POST['Attendence']['start_date']) && !empty($_POST['Attendence']['end_date'])) || (!empty($_POST['months']) || !empty($_REQUEST['month'])))
		{
			$month = null;
			if(!empty($_REQUEST['en_no']))
			    $en = $_REQUEST['en_no'];
			else
			    $en = $_POST['Attendence']['student_enroll_no'];

			 if(!empty($_REQUEST['month']))
				$month = $_REQUEST['month'];
			   else if(!empty($_POST['months']))
				$month = $_POST['months'];
			  
			$student_data= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where('stud_info.student_enroll_no="'.$en.'"')
					->queryRow();



			if(!empty($_POST['studentradio']) && $_POST['studentradio']=='1' )
			{
		   	   $start=null;
			   $end=null;
			
			   if(empty($student_data))
			   {
			      Yii::app()->user->setFlash('no_student_found', "No Student Found for this Enrollment no.");
			      $this->render('studentwise_report',array('model'=>$model,));  
			   }				
			   else if(strtotime($_POST['Attendence']['start_date']) > strtotime($_POST['Attendence']['end_date']))
			   {
			      Yii::app()->user->setFlash('no_student_found', "Start-Date must be less than End-Date.");	
			      $this->render('studentwise_report',array('model'=>$model,));		
			   }	
			   else
			   {
				$new_start=$_POST['Attendence']['start_date'];
				$new_end=$_POST['Attendence']['end_date'];
					
				$start = date("Y-m-d", strtotime($new_start));
				$end = date("Y-m-d", strtotime($new_end));
				$att_info = Attendence::model()->findAll(array(
					'select'=>'sem_name_id',
					'distinct'=>true,
					'condition'=>'attendence_date >=:date_start and attendence_date <= :date_end and st_id = :stu_id',
					'params'=>array(':date_start'=>$start,':date_end'=>$end,'stu_id'=>$student_data['student_transaction_id'])
));				
				$sem_data = array();	
				
				foreach($att_info as $list)
					$sem_data[] = $list['sem_name_id'];
				if($sem_data){
				$sem_array = implode(',',$sem_data);

				$subject_data = Yii::app()->db->createCommand()
		        	->select('*')
				->from('subject_master')
				->where('subject_master_id in (select sub_id from attendence where branch_id='.$student_data['student_transaction_branch_id'].' and sem_id='.$student_data['student_academic_term_period_tran_id'].') and subject_master_academic_terms_name_id IN('.$sem_array.')')
				->queryAll();

			
				
			$this->render('student_report_view',array(
				       'subject_data'=>$subject_data,'student_data'=>$student_data,'start'=>$start,'end'=>$end,));		
				     }


				else
				{
					Yii::app()->user->setFlash('no_student_found', "No Data Found for this Date range.");
					$this->redirect('studentwisereport'); 
				}

			     }
							
			}
			if((!empty($_POST['studentradio']) && $_POST['studentradio']=="2") || $month)
			{
			   if(strlen($month) == 1)
				$month = "0".$month;

				$year = date('Y');
				$num = cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
				$month_start = '01-'.$month.'-'.$year;
				$month_end = $num.'-'.$month.'-'.$year;
   			 
				$start=null;
				$end=null;

			
			   if(empty($student_data))
			   {
			      Yii::app()->user->setFlash('no_student_found', "No Student Found for this Enrollment no.");
			      $this->redirect('studentwisereport');
				
			   }
			   else 
			   {
				   $att_info = Attendence::model()->findAll(array(
					'select'=>'sem_name_id',
					'distinct'=>true,
					'condition'=>'month(attendence_date) =:month and year(attendence_date) = :year and st_id = :stu_id',
					'params'=>array(':month'=>$month,':year'=>$year,'stu_id'=>$student_data['student_transaction_id'])
));				
				   $sem_data = array();
				
				   foreach($att_info as $list)
					$sem_data[] = $list['sem_name_id'];
				
				   $sem_array = implode(',',$sem_data);


				if($sem_data)
				{
					
				   $subject_data = Yii::app()->db->createCommand()
		        	   		->select('*')
						->from('subject_master')
						->where('subject_master_id in (select sub_id from attendence where branch_id='.$student_data['student_transaction_branch_id'].' and sem_id='.$student_data['student_academic_term_period_tran_id'].') and subject_master_academic_terms_name_id IN('.$sem_array.') ')
						->queryAll();
				
				   $new_start=$month_start;
				   $new_end=$month_end;
					
				   $start = date("Y-m-d", strtotime($new_start));
				   $end = date("Y-m-d", strtotime($new_end));
			
				
				   $this->render('monthwise_student_attend',array('subject_data'=>$subject_data,'student_data'=>$student_data,'start'=>$start,'end'=>$end,'month_value'=>$month,'year'=>$year,'en_no'=>$en));	
				}
				else
				{
					Yii::app()->user->setFlash('no_student_found', "No Attendence Found for this Criteria.");
				$this->redirect('studentwisereport');  	
				}
			    
			   }		
			}
	
		}//!empty($_POST['Attendence']['student_enroll_no']) if end
		else 
		{	
               	$this->render('studentwise_report',array(
                       'model'=>$model,
               		));		
		}    
       	}

	 public function actionMonthwiseattendreport()	//done by Karmraj Zala
    	   {
	       $model=new Attendence;
		if(!empty($_POST['months'])  || !empty($_REQUEST['en_no']) || !empty($_REQUEST['month']))
		{
			if(!empty($_REQUEST['month']))
			$month = $_REQUEST['month'];
			else
			$month = $_POST['months'];
			if(strlen($month) == 1)
				$month = "0".$month;
			$year = date('Y');
			$num = cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
			$month_start = '01-'.$month.'-'.$year;
			$month_end = $num.'-'.$month.'-'.$year;
			if(!empty($_POST['Attendence']))
			{
			$model->attributes=$_POST['Attendence'];
			$en=trim($model->student_enroll_no);
			}
			else
			{
			$en=trim($_REQUEST['en_no']);
			}
			$start=null;
			$end=null;
			/*if(!empty($_REQUEST['year']))
			$year = $_REQUEST['year'];
			else
			$year = $_POST['year'];*/
			$student_data = StudentInfo::model()->findByAttributes(array('student_enroll_no'=>$en));
			if(empty($student_data))
			{
				Yii::app()->user->setFlash('no_student_found', "No Student Found for this Enrollment no.");
				$this->render('monthwise_attend_report',array(
			       	'model'=>$model,));
				
			}

			else 
			{
				$stud_trans=StudentTransaction::model()->findByAttributes(array('student_transaction_student_id'=>$student_data['student_id'],'student_transaction_organization_id'=>Yii::app()->user->getState('org_id')));

				if(empty($stud_trans))
				{
					Yii::app()->user->setFlash('no_student_found', "No Student Found for this Enrollment no.");
				$this->render('monthwise_attend_report',array(
			       	'model'=>$model,
				));  
					
				}
				else
				{
				//echo $month.$year;
				$att_info = Attendence::model()->findAll(array(
					'select'=>'sem_name_id',
					'distinct'=>true,
					'condition'=>'month(attendence_date) =:month and year(attendence_date) = :year and st_id = :stu_id',
					'params'=>array(':month'=>$month,':year'=>$year,'stu_id'=>$stud_trans['student_transaction_id'])
));				
				$sem_data = array();
				//print_r($att_info['sem_name_id']); exit;
				foreach($att_info as $list)
					$sem_data[] = $list['sem_name_id'];
				
				$sem_array = implode(',',$sem_data);


				if($sem_data)
				{
				//$subject_data = SubjectMaster::model()->findAll(array('condition'=>'subject_master_academic_terms_period_id='.$stud_trans['student_academic_term_period_tran_id'].' AND subject_master_academic_terms_name_id IN('.$sem_array.') AND subject_master_branch_id ='.$stud_trans['student_transaction_branch_id'].' AND subject_master_organization_id='.Yii::app()->user->getState('org_id')));				
				$subject_data = Yii::app()->db->createCommand()
		        	->select('*')
				->from('subject_master')
				->where('subject_master_id in (select sub_id from attendence where branch_id='.$stud_trans['student_transaction_branch_id'].' and sem_id='.$stud_trans['student_academic_term_period_tran_id'].') and subject_master_academic_terms_name_id IN('.$sem_array.') AND subject_master_organization_id='.Yii::app()->user->getState('org_id'))
				->queryAll();

				/*$subject_data = SubjectMaster::model()->findAll(array('condition'=>'subject_master_academic_terms_period_id='.$stud_trans['student_academic_term_period_tran_id'].' AND subject_master_academic_terms_name_id='.$stud_trans['student_academic_term_name_id'].' AND subject_master_branch_id ='.$stud_trans['student_transaction_branch_id'].' AND subject_master_organization_id='.Yii::app()->user->getState('org_id')));*/
				

				$new_start=$month_start;
				$new_end=$month_end;
					
				$start = date("Y-m-d", strtotime($new_start));
				$end = date("Y-m-d", strtotime($new_end));
			
				
			$this->render('monthwise_student_attend',array(
				       'subject_data'=>$subject_data,'student_data'=>$student_data,'start'=>$start,'end'=>$end,'month_value'=>$month,'year'=>$year,'en_no'=>$en));	
				}
				else
				{
					Yii::app()->user->setFlash('no_student_found', "No Data Found for this Criteria.");
				$this->render('monthwise_attend_report',array(
			       	'model'=>$model,
				));  	
				}
				}
			}	
		}
		else 
		{ 	
               	$this->render('monthwise_attend_report',array(
                       'model'=>$model,
               		));		
		}    
       	}

	public function actionMonthview()
	{
		$this->render('month-view',array(
			//'model'=>$this->loadModel($id),
		));
	}

	public function actionAttendencedivisionreport() //changes done by janvi.
    	{
        $model = new Attendence;
        $model->scenario = 'attendencedivisionreport';
        $this->performAjaxValidation($model);
        $month = null;       
        $student=array();
        $subject_data=array();
        $sid=array();
        $subject=0;
        $subjectid=array();
        $deleivered_topic=array();	
		if(isset($_POST['Attendence'])|| isset($_REQUEST['branch_id']))
		{
		    $query=null;      
		    $timetable_query=null;	     
		    if(!empty($_REQUEST['branch_id']))
		    {
		        $branch = $_REQUEST['branch_id'];
		        $query .="branch_id=".$branch. " AND ";
			$timetable_query.="branch_id=".$branch. " AND ";
		    }
		    else
		    {
		        $branch =$_POST['Attendence']['branch_id'];
		        $query .="branch_id=".$branch. " AND ";
			$timetable_query.="branch_id=".$branch. " AND ";
		    }
		    if(!empty($_REQUEST['sem_id']))
		    {
		        $sem = $_REQUEST['sem_id'];
		        $query .="sem_name_id=".$sem. " AND ";
			$timetable_query.="acdm_name_id=".$sem. " AND ";
		    }
		    else
		    {
		        $sem =$_POST['Attendence']['sem_name_id'];
		        $query .="sem_name_id=".$sem." AND ";
			$timetable_query.="acdm_name_id=".$sem. " AND ";
		    }
		    if(!empty($_REQUEST['div_id']))   
		    {
		        $div=$_REQUEST['div_id'];
		        $query .="div_id=".$div;
			$timetable_query.="division_id=".$div. " AND ";
		    }
		    if(!empty($_POST['Attendence']['div_id']))
		    {
		        $div=$_POST['Attendence']['div_id'];
		        $query .="div_id=".$div;
			$timetable_query.="division_id=".$div. " AND ";
		    }           
		 if(!empty($_POST['months']) && !empty($_POST['subject']) || !empty($_REQUEST['month']) && !empty($_REQUEST['subject']) )
		{
		    if(!empty($_REQUEST['month']))
		    {
		        $month=$_REQUEST['month'];
		        $subject=$_REQUEST['subject'];
			$timetable_query.="subject_id=".$subject." AND ";			
		    }
		    else
		    {
		        $month = $_POST['months'];			
		        $subject=$_POST['subject'];
			$timetable_query.="subject_id=".$subject." AND ";
		    }       
		
    //query for display list of regular student attendence( not to display detain/left student)

            $student=Attendence::model()->findAll(array(
		'select'=>'st_id','distinct'=>true,
	        'condition'=>$query));    
	    $timetabledetail=TimeTableDetail::model()->findAll(array('select'=>'lecture_date,actual_topic,lect_hour','condition'=>$timetable_query.' month(lecture_date)='.$month,'order' => 'lecture_date ASC'));
		 
		    $timetable=array();
		    foreach($timetabledetail as $t)
		    {
			if($t['actual_topic']!='')	
                          $deleivered_topic[$t['lecture_date']]=$t['actual_topic'];
		    }	
       
            foreach($student as $s )
            {                       
            //student name
                $data3 =Attendence::model()->findAll(array('condition'=>'st_id='.$s['st_id']));
                $stud_name=StudentInfo::model()->findByPk($s['st_id']);
                $sid[]=$s['st_id'];                           
            }
        }
            if(isset($_REQUEST['pdf']))
            {
                Yii::import('application.extensions.tcpdf.*');
                require_once('tcpdf/tcpdf.php');
                require_once('tcpdf/config/lang/eng.php');
                                       
                $html = $this->renderPartial('attendence_division_pdf', array('total'=>$total,
                                'present'=>$present,
                                'subject'=>$sub,
                                'div_id'=>$div
                                ),
                                 true);
                //$session->close();       
                //die($html);
                ob_clean();
                $pdf = new TCPDF();
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor(Yii::app()->name);
                $pdf->SetTitle('Division Attendence Report');
                $pdf->SetSubject('Division Attendence Report');
                $pdf->SetKeywords('example, text, report');
                $pdf->SetHeaderData('', 0, "Division Attendence", '');
                //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
                $pdf->setHeaderFont(Array('helvetica', '', 8));
                $pdf->setFooterFont(Array('helvetica', '', 6));
                $pdf->SetMargins(15, 18, 15);
                $pdf->SetHeaderMargin(5);
                $pdf->SetFooterMargin(10);
                $pdf->SetAutoPageBreak(TRUE, 15);
                $pdf->SetFont('dejavusans', '', 7);
                $resolution= array(150, 150);
                $pdf->AddPage('P', $resolution);
                $pdf->writeHTML($html, true, false, true, false, '');
                $pdf->LastPage();
                $pdf->Output("attendenceDivision.pdf", "I");   
            }
            else if(isset($_REQUEST['excel']))
            {
		
                Yii::app()->request->sendFile(date('YmdHis').'.xls',
                $this->renderPartial('attendence_division_pdf', array(
                                'branch_id'=>$branch,
                                'div_id'=>$div,
                                'student_id'=>$sid,
                                'month'=>$month,
                                'selsub'=>$subject,
                                'sem'=>$sem,
				'deleivered_topic'=>$deleivered_topic,
                                ),
                                 true));
            }
            else if(isset($_REQUEST['studentpdf']))
            {
                Yii::import('application.extensions.tcpdf.*');
                require_once('tcpdf/tcpdf.php');
                require_once('tcpdf/config/lang/eng.php');   
                      
            $html = $this->renderPartial('divisionwise_student_attendance_pdfexcel', array('total'=>$total,
                                'present'=>$present,
                                'subject'=>$sub,
                                'div_id'=>$div,
                                'sub_id'=>$subject,
                                'all_data'=>$all_data,
                                'subjectid'=>$subjectid,
                                'subject_data'=>$subject_data,
                                'student_data'=>$student_data,
                                'sid'=>$sid,
               
                'start'=>$start,'end'=>$end,'month_value'=>$month,'year'=>$year
                                ),
                                 true);
                //$session->close();       
                //die($html);
                ob_clean();
                $pdf = new TCPDF();
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor(Yii::app()->name);
                $pdf->SetTitle('Division Attendence Report');
                $pdf->SetSubject('Division Attendence Report');
                $pdf->SetKeywords('example, text, report');
                $pdf->SetHeaderData('', 0, "Division Attendence", '');
                //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
                $pdf->setHeaderFont(Array('helvetica', '', 8));
                $pdf->setFooterFont(Array('helvetica', '', 6));
                $pdf->SetMargins(15, 18, 15);
                $pdf->SetHeaderMargin(5);
                $pdf->SetFooterMargin(10);
                $pdf->SetAutoPageBreak(TRUE, 15);
                $pdf->SetFont('dejavusans', '', 7);
                $resolution= array(150, 150);
                $pdf->AddPage('P', $resolution);
                $pdf->writeHTML($html, true, false, true, false, '');
                $pdf->LastPage();
                $pdf->Output("StudentAttendance.pdf", "I");   
            }
            else if(isset($_REQUEST['studentexcel']))
            {
                Yii::app()->request->sendFile(date('YmdHis').'.xls',
                $this->renderPartial('divisionwise_student_attendance_pdfexcel', array('total'=>$total,
                                'present'=>$present,
                                'subject'=>$sub,
                                'div_id'=>$div,
                                'sub_id'=>$subject,
                                'all_data'=>$all_data,
                                'subjectid'=>$subjectid,				
                                ),
                                 true));
            }
            else
            {
		
	        $this->render('attendence_division_report_view',array(
                                'branch_id'=>$branch,
                                'div_id'=>$div,
                                'student_id'=>$sid,
                                'month'=>$month,
                                'selsub'=>$subject,
				'subjectid'=>$subjectid,
                                'sem'=>$sem,
                               'deleivered_topic'=>$deleivered_topic,       
                                ));
            }           
        }
        else
        {
            $this->render('attendence_division_report',array('model'=>$model));
        }
    }

	public function actionStudentAttendenceReport()	//done by Ravi B
    	{
	       $model=new Attendence;

			
		if((!empty($_POST['Attendence']['start_date']) && !empty($_POST['Attendence']['end_date'])) || (!empty($_POST['months']) || !empty($_REQUEST['month'])))
		{

			$month = null;
			if(!empty($_REQUEST['en_no']))
			    $en = $_REQUEST['en_no'];
		
			 if(!empty($_REQUEST['month']))
				$month = $_REQUEST['month'];
			   else if(!empty($_POST['months']))
				$month = $_POST['months'];
			  
			$student_data= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where('stud_info.student_info_transaction_id="'.$_REQUEST['id'].'" and stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryRow();



			if(!empty($_POST['studentradio']) && $_POST['studentradio']=='1' )
			{
			
		   	   $start=null;
			   $end=null;
			
			   if(empty($student_data))
			   {
			      Yii::app()->user->setFlash('no_student_found', "No Student Found for this Enrollment no.");
			      $this->redirect(array('/studentAttendenceReport','id'=>$_REQUEST['id']));  
			   }				
			   else if(strtotime($_POST['Attendence']['start_date']) > strtotime($_POST['Attendence']['end_date']))
			   {
			      Yii::app()->user->setFlash('no_student_found', "Start-Date must be less than End-Date.");	
			      $this->redirect(array('/studentAttendenceReport','id'=>$_REQUEST['id'])); 		
			   }	
			   else
			   {
				$new_start=$_POST['Attendence']['start_date'];
				$new_end=$_POST['Attendence']['end_date'];
					
				$start = date("Y-m-d", strtotime($new_start));
				$end = date("Y-m-d", strtotime($new_end));
				$att_info = Attendence::model()->findAll(array(
					'select'=>'sem_name_id',
					'distinct'=>true,
					'condition'=>'attendence_date >=:date_start and attendence_date <= :date_end and st_id = :stu_id',
					'params'=>array(':date_start'=>$start,':date_end'=>$end,'stu_id'=>$student_data['student_transaction_id'])
));				
				$sem_data = array();	
				
				foreach($att_info as $list)
					$sem_data[] = $list['sem_name_id'];
				if($sem_data){
				$sem_array = implode(',',$sem_data);

				$subject_data = Yii::app()->db->createCommand()
		        	->select('*')
				->from('subject_master')
				->where('subject_master_id in (select sub_id from attendence where branch_id='.$student_data['student_transaction_branch_id'].' and sem_id='.$student_data['student_academic_term_period_tran_id'].') and subject_master_academic_terms_name_id IN('.$sem_array.')')
				->queryAll();

			
				
			$this->render('student_report_view',array(
				       'subject_data'=>$subject_data,'student_data'=>$student_data,'start'=>$start,'end'=>$end,'model'=>$model));		
				     }


				else
				{
					Yii::app()->user->setFlash('no_student_found', "No Data Found for this Date range.");
					$this->redirect(array('studentAttendenceReport','id'=>$_REQUEST['id'])); 
				}

			     }
							
			}
			if((!empty($_POST['studentradio']) && $_POST['studentradio']=="2") || $month)
			{
				
			   if(strlen($month) == 1)
				$month = "0".$month;

				$year = date('Y');
				$num = cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
				$month_start = '01-'.$month.'-'.$year;
				$month_end = $num.'-'.$month.'-'.$year;
   			 
				$start=null;
				$end=null;

			
			   if(empty($student_data))
			   {
				
			      Yii::app()->user->setFlash('no_student_found', "No Student Found for this Enrollment no.");
			      $this->redirect(array('/studentAttendenceReport','id'=>$_REQUEST['id'])); 
				
			   }
			   else 
			   {
				 
				  $att_info = Attendence::model()->findAll(array(
					'select'=>'sem_name_id',
					'distinct'=>true,
					'condition'=>'month(attendence_date) =:month and year(attendence_date) = :year and st_id = :stu_id',
					'params'=>array(':month'=>$month,':year'=>$year,'stu_id'=>$student_data['student_transaction_id'])
));				
				   $sem_data = array();
				
				   foreach($att_info as $list)
					$sem_data[] = $list['sem_name_id'];
				
				   $sem_array = implode(',',$sem_data);


				if($sem_data)
				{
					
				   $subject_data = Yii::app()->db->createCommand()
		        	   		->select('*')
						->from('subject_master')
						->where('subject_master_id in (select sub_id from attendence where branch_id='.$student_data['student_transaction_branch_id'].' and sem_id='.$student_data['student_academic_term_period_tran_id'].') and subject_master_academic_terms_name_id IN('.$sem_array.') AND subject_master_organization_id='.Yii::app()->user->getState('org_id'))
						->queryAll();
				
				   $new_start=$month_start;
				   $new_end=$month_end;
					
				   $start = date("Y-m-d", strtotime($new_start));
				   $end = date("Y-m-d", strtotime($new_end));
			
				
				   $this->render('monthwise_student_attend',array(
				       'subject_data'=>$subject_data,'student_data'=>$student_data,'start'=>$start,'end'=>$end,'month_value'=>$month,'year'=>$year,'model'=>$model));	
				}
				else
				{
					Yii::app()->user->setFlash('no_student_found', "No Attendence Found for this Criteria.");
				$this->redirect(array('studentAttendenceReport','id'=>$_REQUEST['id']));  	
				}
			    
			   }		
			}
	
		}
		
		else 
		{	
		   if(isset($_REQUEST['id']))
		   {
			$student_data= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where('stud_info.student_info_transaction_id='.$_REQUEST['id'])
					->queryRow();

			$sem_id=$student_data['student_academic_term_name_id'];
			$semester = Yii::app()->db->createCommand()
		        	   		->select('*')
						->from('academic_term')
						->where('academic_term_id='.$sem_id)
						->queryRow();
			$start=$semester['academic_term_start_date'];
			$end=$semester['academic_term_end_date'];
			$att_info = Attendence::model()->findAll(array(
					'select'=>'sem_name_id',
					'distinct'=>true,
					'condition'=>'attendence_date >=:date_start and attendence_date <= :date_end and st_id = :stu_id',
					'params'=>array(':date_start'=>$semester['academic_term_start_date'],':date_end'=>$semester['academic_term_end_date'],'stu_id'=>$_REQUEST['id'])
));			$sem_data = array();	
			
			foreach($att_info as $list)
				$sem_data[] = $list['sem_name_id'];
			if($sem_data){
				$sem_array = implode(',',$sem_data);

			$subject_data = Yii::app()->db->createCommand()
		        	->select('*')
				->from('subject_master')
				->where('subject_master_id in (select sub_id from attendence where branch_id='.$student_data['student_transaction_branch_id'].' and sem_id='.$student_data['student_academic_term_period_tran_id'].') and subject_master_academic_terms_name_id IN('.$sem_array.')')
				->queryAll();
			$this->render('student_report_view',array(
                          'model'=>$model, 'subject_data'=>$subject_data,'student_data'=>$student_data,'start'=>$start,'end'=>$end,
			));
		   }	
		   else
		    {   
			Yii::app()->user->setFlash('no_student_found', "No Data Found for Current semester.");
			$this->render('student_attendence_report',array(
                          'model'=>$model, 
			));
		     }	
		 }
		else{
               	$this->render('student_attendence_report',array(
                       'model'=>$model,
               		));		
		}    
       		}
	    }	

	public function actionStudentwisereportpdf() 
	{

		if(!empty($_REQUEST['student_enroll_no']) && !empty($_REQUEST['start']) && !empty($_REQUEST['end']))
		{
			//$start=null;
			//$end=null;
			$en=trim($_REQUEST['student_enroll_no']);
			
			$student_data = StudentInfo::model()->findByAttributes(array('student_enroll_no'=>$en));
			$stud_trans=StudentTransaction::model()->findByAttributes(array('student_transaction_student_id'=>$student_data['student_id']));
			$new_start=$_REQUEST['start'];
			$new_end=$_REQUEST['end'];
					
				$start = date("Y-m-d", strtotime($new_start));
				$end = date("Y-m-d", strtotime($new_end));
				$att_info = Attendence::model()->findAll(array(
					'select'=>'sem_name_id',
					'distinct'=>true,
					'condition'=>'attendence_date >=:date_start and attendence_date <= :date_end and st_id = :stu_id',
					'params'=>array(':date_start'=>$start,':date_end'=>$end,'stu_id'=>$stud_trans['student_transaction_id'])
));				
				$sem_data = array();	
				//print_r($att_info['sem_name_id']); exit;
				foreach($att_info as $list)
					$sem_data[] = $list['sem_name_id'];
				
				$sem_array = implode(',',$sem_data);

				$subject_data = Yii::app()->db->createCommand()
		        	->select('*')
				->from('subject_master')
				->where('subject_master_id in (select sub_id from attendence where branch_id='.$stud_trans['student_transaction_branch_id'].' and sem_id='.$stud_trans['student_academic_term_period_tran_id'].') and subject_master_academic_terms_name_id IN('.$sem_array.')  AND subject_master_organization_id='.Yii::app()->user->getState('org_id'))
				->queryAll();

			if(isset($_REQUEST['studenewisereportpdf'])) {
			Yii::import('application.extensions.tcpdf.*');
				require_once('tcpdf/tcpdf.php');
				require_once('tcpdf/config/lang/eng.php');
				//$this->actiondate_report();
				$html = $this->renderPartial('student_report_view_pdf', array(
			'subject_data'=>$subject_data,
			'student_data'=>$student_data,
			'start'=>$_REQUEST['start'],
			'end'=>$_REQUEST['end']),true);
			//print_r($html);exit;
			ob_clean();
			$pdf = new TCPDF();
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor(Yii::app()->name);
			$pdf->SetTitle('StudentWise Report');
			$pdf->SetSubject('StudentWise Report');
			$pdf->SetKeywords('example, text, report');
			$pdf->SetHeaderData('', 0, "Report", '');
			//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
			$pdf->setHeaderFont(Array('helvetica', '', 8));
			$pdf->setFooterFont(Array('helvetica', '', 6));
			$pdf->SetMargins(15, 18, 15);
			$pdf->SetHeaderMargin(5);
			$pdf->SetFooterMargin(10);
			$pdf->SetAutoPageBreak(TRUE, 15);
			$pdf->SetFont('dejavusans', '', 7);
			$resolution= array(150, 150);
			$pdf->AddPage('P', $resolution);
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->LastPage();
			$pdf->Output("StudentWise.pdf", "I");
			}
		if(isset($_REQUEST['studenewisereportexcel'])) {
		 Yii::app()->request->sendFile(date('YmdHis').'.xls',
		    $this->renderPartial('student_report_view_pdf', array(
		'subject_data'=>$subject_data,
		'student_data'=>$student_data,
		'start'=>$_REQUEST['start'],
		'end'=>$_REQUEST['end']
		    ), true)
		);
	}
		}
	}
	

	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Attendence::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && ($_POST['ajax']==='attendence-form' || $_POST['ajax']==='attendence-division'))
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actiongetItemName()
        {
            $data=  AcademicTerm::model()->findAll('academic_term_period_id=:academic_term_period_id',
		 array(':academic_term_period_id'=>(int) $_REQUEST['Attendence']['sem_id']));
                  
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
        }

	public function actionTakeAttendance()
	{

	}
	
}
