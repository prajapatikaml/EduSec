<?php

class ExportToPDFExcelController extends RController
{
	public $layout='//layouts/column2';

	 //Uncomment the following methods and override them if needed
	
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	 public function behaviors()
	 {
		return array(
		    'eexcelview'=>array(
		        'class'=>'ext.eexcelview.EExcelBehavior',
		    ),
		);
	 }
	
//*****************Master Table*************************//


//=============== AcademicTermName===============
	
	    public function actionAcademicTermExportToPdf() 
	    {
		
             	if(isset($_SESSION['academic_term_records']))
               	{
		 	$d = $_SESSION['academic_term_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/academicTerm/academicTermGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Semester Report','Semester.pdf',$html);	       
	
	}

	public function actionAcademicTermExportToExcel()
	{
	    	$this->toExcel($_SESSION['academic_term_records'],
		
		array(
			'academic_term_name',
			'academic_term_start_date', 	
			'academic_term_end_date',
			'academicTermPeriod.academic_term_period',
			'current_sem::Current Sem',
			
		),
		'Semester',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
	
	public function actionAcademicTermPeriodExportToPdf() 
	{
             	if(isset($_SESSION['academic_term_period_records']))
              	{
		 	$d = $_SESSION['academic_term_period_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/academicTermPeriod/academicTermPeriodGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Academic Year Report','AcademicTermPeriod.pdf',$html);

	}
	public function actionAcademicTermPeriodExportToExcel()
	{
	
		$this->toExcel($_SESSION['academic_term_period_records'],
			array(
			//'academic_terms_period_id',
			'academic_term_period',
			'Rel_user.user_organization_email_id::Created By',
		
		),
		'Academic Year',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}


//===============BranchPassoutsemTag===============

	 public function actionBranchPassoutsemTagExportToPdf() 
	 {
             	if(isset($_SESSION['branch_tag_records']))
               	{
		 	$d = $_SESSION['branch_tag_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/branchPassoutsemTagTable/branchPassoutsemTagGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Branch Tags Report','BranchTag.pdf',$html);
	}	
	public function actionBranchPassoutsemTagExportToExcel()
	{
		$this->toExcel($_SESSION['branch_tag_records'],
		array(
			'branch_tag_name',
			'pass_out_sem',	
			'Rel_user.user_organization_email_id:Created By',
			'Rel_org.organization_name::Organization Name',	
			
		),
		'BranchTag',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	 }

//===============Branch===============

	public function actionBranchExportToPdf() 
	{
             	if(isset($_SESSION['branch_records']))
               	{
		 	$d = $_SESSION['branch_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/branch/branchGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Branch Report','Branch.pdf',$html);
	}
	public function actionBranchExportToExcel()
	{
	
		$this->toExcel($_SESSION['branch_records'],
		array(
			'branch_name::Branch Name',
			'branch_alias',		
			'branch_code',
			'Rel_Branch_Tag.branch_tag_name',
			'Rel_user.user_organization_email_id::Created By',
			'Rel_org.organization_name',
			
		),
		'Branch',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
//===============Division===============	    


	 public function actionDivisionExportToPdf() 
	 {
	  	if(isset($_SESSION['division_data']))
               	{
		 	$d = $_SESSION['division_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
		}
               }
              
	$html = $this->renderPartial('/division/DivisionExportPdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Division Report','Division.pdf',$html);
	}
	public function actionDivisionExportToExcel()
	{
	    	$this->toExcel($_SESSION['division_data'],
		array(
			'division_name::Division Name',
			'division_code',
			'Rel_Branch.branch_name::Branch Name',
			'Rel_user.user_organization_email_id::Created By',
			'Rel_org.organization_name::Organization Name',
				
        		),	
		'Division',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
	
//===============Subject Type===============

	public function actionSubjectTypeExportToPdf() 
	{
             	if(isset($_SESSION['subject_type_records']))
               	{
		 	$d = $_SESSION['subject_type_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/subjectType/subjectTypeGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Subject Type Report','SubjectType.pdf',$html);
	}
	public function actionSubjectTypeExportToExcel()
	{
		$this->toExcel($_SESSION['subject_type_records'],	
		array(
			'subject_type_name',
			'subject_active',
			'Rel_user.user_organization_email_id::Created By',
			//'Rel_org_id.organization_name',
				
		),
		'SubjectType',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}	    
//===============Batch===============

	public function actionBatchExportToPdf() 
	{
             	if(isset($_SESSION['batch_records']))
               	{
		 	$d = $_SESSION['batch_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/batch/batchGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Batch Report','Batch.pdf',$html);
	}	
	public function actionBatchExportToExcel()
	{
		$this->toExcel($_SESSION['batch_records'],
		array(
			'batch_code',
			'rel_branch.branch_name',
			'rel_division.division_code',
			'Rel_user.user_organization_email_id:Created By',
			'Rel_org.organization_name',
		),
		'Batch',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	    	    
//===============Category===============

	public function actionCategoryExportToPdf() 
	{
             	if(isset($_SESSION['category_records']))
               	{
		 	$d = $_SESSION['category_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/category/categoryGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Category Report','Category.pdf',$html);
	
	}

	public function actionCategoryExportToExcel()
	{
	    	$this->toExcel($_SESSION['category_records'],
		array(
			//'category_id',
			'category_name',
			'Rel_user.user_organization_email_id:Created By',
			//'Rel_org.organization_name',	
			
		),
		'Category',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}	    
//===============Department===============

	public function actionDepartmentExportToPdf() 
	{
             	if(isset($_SESSION['department_records']))
               	{
		 	$d = $_SESSION['department_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/department/departmentGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Department Report','Department.pdf',$html);
		
	}
	public function actionDepartmentExportToExcel()
	{
		$this->toExcel($_SESSION['department_records'],
		array(
			'department_name::Department Name',
			'Rel_user.user_organization_email_id:Created By',
		),
		'Department',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}	    
//===============Designation===============


	 public function actionEmployeeDesignationExportToPdf() 
	 {
             	if(isset($_SESSION['designation_records']))
               	{
		 	$d = $_SESSION['designation_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/employeeDesignation/employeeDesignationGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Employee Designation Report','Designation.pdf',$html);
	}
	public function actionEmployeeDesignationExportToExcel()
	{
		$this->toExcel($_SESSION['designation_records'],
		array(
			//'employee_designation_id',
			'employee_designation_name::Designation Name',		
			'employee_designation_level',
			'Rel_user.user_organization_email_id:Created By',
		),
		'Designation',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}	    
//===============Nationality===============

	public function actionNationalityExportToPdf() 
	{
             	if(isset($_SESSION['nationality_records']))
               	{
		 	$d = $_SESSION['nationality_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/nationality/nationalityGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Nationality Report','Nationality.pdf',$html);
	}
	public function actionNationalityExportToExcel()
	{
		$this->toExcel($_SESSION['nationality_records'],
		array(
			//'nationality_id::SN',
			'nationality_name',
			'Rel_user.user_organization_email_id:Created By',
			
		
		),
		'Nationality',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}	    
//===============Quota===============

	public function actionQuotaExportToPdf() 
	{
             	if(isset($_SESSION['quota_records']))
               	{
		 	$d = $_SESSION['quota_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/quota/quotaGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Quota Report','Quota.pdf',$html);
		
	}
	public function actionQuotaExportToExcel()
	{
		$this->toExcel($_SESSION['quota_records'],
		array(
			//'quota_id::SN',
			'quota_name::Quota Name',
			'Rel_user.user_organization_email_id:Created By',
			'Rel_org.organization_name',
		),
		'Quota',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}	    
//===============Religion===============

	public function actionReligionExportToPdf() 
	{
             	if(isset($_SESSION['religion_data']))
               	{
		 	$d = $_SESSION['religion_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/religion/ReligionExportPdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Religion Report','Religion.pdf',$html);
		
	}
	public function actionReligionExportToExcel()
	{
		$this->toExcel($_SESSION['religion_data'],
		array(
			//'religion_id::SN',
			'religion_name',
			//'Rel_org.organization_name',
			'Rel_user.user_organization_email_id:Created By',
        		),
		'religion',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}	    
//===============Shift===============

	public function actionShiftExportToPdf() 
	{
             	if(isset($_SESSION['shift_data']))
               	{
		 	$d = $_SESSION['shift_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/shift/ShiftExportPdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Shift Report','Shift.pdf',$html);
	}	
	public function actionShiftExportToExcel()
	{
	    	$this->toExcel($_SESSION['shift_data'],
		array(
			//'shift_id',
			'shift_type',
			'shift_start_time',
			'shift_end_time',
			'Rel_user.user_organization_email_id:Created By',
			'Rel_org.organization_name',
        		),
		'shift',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
	 	    
//===============Country===============

	public function actionCountryExportToPdf() 
	{
             	if(isset($_SESSION['country_data']))
               	{
		 	$d = $_SESSION['country_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
			//print_r($model);exit;
               }
              
		$html = $this->renderPartial('/country/CountryExportPdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Country Report','Country.pdf',$html);
	}
	public function actionCountryExportToExcel()
	{
	    	$this->toExcel($_SESSION['country_data'],
		array(
			//'id',
			'name',
			
        		),
		'country',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}	    
//===============State===============

	public function actionStateExportToPdf() 
	{
             	if(isset($_SESSION['state_data']))
               	{
		 	$d = $_SESSION['state_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/state/StateExportPdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('State Report','State.pdf',$html);
	}	
	public function actionStateExportToExcel()
	{
		$this->toExcel($_SESSION['state_data'],
		array(
			//'state_id',
			'state_name',
			'Rel_country.name',
			
        		),
		'state',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}    
//===============City===============

	public function actionCityExportToPdf() 
	{
             	if(isset($_SESSION['city_data']))
               	{
		 	$d = $_SESSION['city_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/city/CityExportPdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('City Report','City.pdf',$html);
	}

	public function actionCityExportToExcel()
	{
		$this->toExcel($_SESSION['city_data'],
		array(
			//'city_id',
			'city_name',
			'Rel_state.state_name',
			'Rel_country.name',			
        		),
		'City',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}	    
//===============Bank Master===============

	public function actionBankMasterExportToPdf() 
	{
             	if(isset($_SESSION['bankmaster_data']))
               	{
		 	$d = $_SESSION['bankmaster_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/bankMaster/BankMasterExportToPdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Bank Master Report','BankMaster.pdf',$html);
	}	    
	public function actionBankMasterExportToExcel()
	{
		$this->toExcel($_SESSION['bankmaster_data'],
		array(
			//'bank_id',
			'bank_full_name',
			'bank_short_name',
			//'Rel_org.organization_name',			
        		),
		'bankmaster',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}	
//===============Languages===============
	public function actionLanguageExportToPdf() 
	{
             	if(isset($_SESSION['language_data']))
               	{
		 	$d = $_SESSION['language_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               	}
              
		$html = $this->renderPartial('/languages/LanguageExportPdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Language Report','Language.pdf',$html);
	}	    
	public function actionLanguageExportToExcel()
	{
		$this->toExcel($_SESSION['language_data'],
		array(
			//'languages_id',
			'languages_name',
			'Rel_user.user_organization_email_id:Created By',
			//'Rel_org.organization_name',			
        		),
		'Languages',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
//===============Item Category===============	    
	
	public function actionItemCategoryExportToPdf() 
	{
             	if(isset($_SESSION['itemcategory_data']))
               	{
		 	$d = $_SESSION['itemcategory_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               	}
              
		$html = $this->renderPartial('/itemCategory/ItemCategoryExportPdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('ItemCategory Report','ItemCategory.pdf',$html);
	}	
	public function actionItemCategoryExportToExcel()
	{
		$this->toExcel($_SESSION['itemcategory_data'],
		array(
			//'id',
			'cat_name',
			//'Rel_user.user_organization_email_id',			
        		),
		'Item Category',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
	 
//===============Education===============

	
	public function actionEducationExportToPdf() 
	{
             	if(isset($_SESSION['eduboard_data']))
               	{
		 	$d = $_SESSION['eduboard_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/eduboard/EducationExportPdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Education Report','Education.pdf',$html);
	}
	public function actionEducationExportToExcel()
	{
		$this->toExcel($_SESSION['eduboard_data'],
		array(
			//'eduboard_id',
			'eduboard_name',
			//'Rel_org.organization_name',
			'Rel_user.user_organization_email_id::Created By',
						
        		),
		'education',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
	 	    
//===============Qualification===============	

	public function actionQualificationExportToPdf() 
	{
             	if(isset($_SESSION['qua_data']))
               	{
		 	$d = $_SESSION['qua_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/qualification/gridview_export_report', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Qualification Report','Qualification.pdf',$html);
	}
	public function actionQualificationExportToExcel()
	{
		$this->toExcel($_SESSION['qua_data'],
		array(
			//'qualification_id',
			'qualification_name',
			//'Rel_org.organization_name',
			'Rel_user.user_organization_email_id:Created By',	
		),
		'Qualification',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}    
//===============Miscellineous Fees Master===============

	 public function actionMiscellaneousFeesExportToPdf() 
	 {
             	if(isset($_SESSION['miscellaneousfees_data']))
               	{
		 	$d = $_SESSION['miscellaneousfees_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/miscellaneousFeesMaster/MiscellaneousFeesExportPdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Miscellaneous Fees Report','MiscellaneousFees.pdf',$html);
	}
	public function actionMiscellaneousFeesExportToExcel()
	{
		$this->toExcel($_SESSION['miscellaneousfees_data'],
		array(
			//'miscellaneous_fees_id',
			'miscellaneous_fees_name',
			'Rel_user.user_organization_email_id::Created By',
			'Rel_org.organization_name',			
        		),
		'Miscellaneousfees',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}	    
//===============Room Category===============	

	 public function actionRoomCategoryExportToPdf() 
	 {
             	if(isset($_SESSION['room_cat']))
               	{
		 	$d = $_SESSION['room_cat'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/roomCategory/gridview_export_report', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Room Category Report','RoomCategory.pdf',$html);
	}
	public function actionRoomCategoryExportToExcel()
	{
		$this->toExcel($_SESSION['room_cat'],
		array(
		//'id',
		'category_name',
		'Rel_user.user_organization_email_id::Created By',	
		'Rel_org.organization_name',
		),
		'Room Category',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}    
//===============Student Status===============
	public function actionStudentStatusExportToPdf() 
	{
             	if(isset($_SESSION['status_data']))
               	{
		 	$d = $_SESSION['status_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/studentstatusmaster/gridview_export_report', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Student Status Report','StudentStatus.pdf',$html);
		
	}
	public function actionStudentStatusExportToExcel()
	{
	
		$this->toExcel($_SESSION['status_data'],
		array(
			//'id',		
			'status_name',
			//'Rel_org.organization_name',
			'Rel_user.user_organization_email_id:Created By',
		),
		'Student-Status',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}	    
//===============Year===============

	public function actionYearExportToPdf() 
	{
             	if(isset($_SESSION['year_data']))
               	{
		 	$d = $_SESSION['year_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/year/gridview_export_report', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Year Report','Year.pdf',$html);
	}
	public function actionYearExportToExcel()
	{
	    	$this->toExcel($_SESSION['year_data'],
		array(
		//'year_id::SN',
		'year',
		),
		'Year Report',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}	    
//===============Terms And Condition===============

	public function actionTermExportToPdf() 
	{
             	if(isset($_SESSION['term_data']))
               	{
		 	$d = $_SESSION['term_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/feesTermsAndCondition/gridview_export_report', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Fees Terms and Condition Report','FeesTermsAndCondition.pdf',$html);
		
	}
	public function actionTermExportToExcel()
	{
		$this->toExcel($_SESSION['term_data'],
		array(
		//'id',
		'term',
		'Rel_user.user_organization_email_id::Created By',
		),
		'Fees Terms And Condition',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}	    


//************************************************Main Menu*******************************************************//

//===============Employee Transaction===============
 	
	public function actionEmployeeExportToPdf() 
	{
		if(isset($_SESSION['employee_records']))
		{
		 	$d = $_SESSION['employee_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item)
		{
		    $model[] = $item->attributes;
		}
               }
              
		$html = $this->renderPartial('/employeeTransaction/expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Employee Report','Employee.pdf',$html);
	}

	public function actionEmployeeExportToExcel()
	{
	    	$this->toExcel($_SESSION['employee_records'],
		array(
		'Rel_Emp_Info.employee_no',
		'Rel_Emp_Info.employee_name_alias',
		'Rel_Emp_Info.employee_joining_date',
		'Rel_Emp_Info.employee_probation_period',
		'Rel_Designation.employee_designation_name::Designation',
		'Rel_Department.department_name::Department',
		'Rel_Shift.shift_type::Shift',
		'Rel_Emp_Info.title',
		//'Rel_Branch.branch_name',
		'Rel_Emp_Info.employee_first_name::First Name',
		'Rel_Emp_Info.employee_middle_name::Middle Name',
		'Rel_Emp_Info.employee_last_name::Last Name',
		//'',//mother name
		'Rel_Emp_Info.employee_dob::Birthdate',
		'Rel_Emp_Info.employee_birthplace::BirthPlace',
		'Rel_Emp_Info.employee_gender::Gender',
		'Rel_Emp_Info.employee_bloodgroup::Bloodgroup',		
		'Rel_Nationality.nationality_name::Nationality',
		'Rel_Emp_Info.employee_marital_status',
		'Rel_Religion.religion_name',
		'Rel_Emp_Info.employee_pancard_no',
		'Rel_Emp_Info.employee_account_no::Bank Acc. No',
		'Rel_Category.category_name::Category',
		'Rel_Emp_Info.employee_private_email::Private Email',
		'Rel_Emp_Info.employee_private_mobile::Private Mobile',
		'Rel_Emp_Info.employee_organization_mobile::Organization Mobile',
		'Rel_Photo.employee_photos_path',
		'Rel_Emp_Info.employee_guardian_name::Guardian Name',
		'Rel_Emp_Info.employee_guardian_relation::Guardian Relation',
		'Rel_Emp_Info.employee_guardian_qualification::Guardian Qualification',		
		'Rel_Emp_Info.employee_guardian_occupation::Guardian Occupation',
		'Rel_Emp_Info.employee_guardian_home_address::Guardian Address',
		'Rel_Emp_Info.employee_guardian_occupation_address::Guardian Occupation Address',
		'Rel_Emp_Info.Rel_g_city.city_name::Guardian City',
		'Rel_Emp_Info.employee_guardian_city_pin',
		'Rel_Emp_Info.employee_guardian_mobile1::Guardian Mobile1',
		'Rel_Emp_Info.employee_guardian_mobile2::Guardian Mobile2',		
		'Rel_Emp_Info.employee_guardian_phone_no::Guardian Phone',
		'Rel_Emp_Info.employee_attendance_card_id',
		'Rel_Emp_Info.employee_faculty_of::Faculty Of',
		'Rel_Emp_Info.employee_curricular',
		'Rel_Emp_Info.employee_project_details',
		'Rel_Emp_Info.employee_technical_skills',
		'Rel_Emp_Info.employee_hobbies',		
		'Rel_Lang.Rel_Langs1.languages_name',
		'Rel_Lang.Rel_Langs2.languages_name',
		'Rel_Lang.Rel_Langs3.languages_name',
		'Rel_Lang.Rel_Langs4.languages_name',
		'Rel_Emp_Info.employee_reference',
		'Rel_Emp_Info.employee_refer_designation',

		'Rel_Employee_Address.employee_address_c_line1::Current Address Line1',
		'Rel_Employee_Address.employee_address_c_line2::Current Address Line2',
		'Rel_Employee_Address.Rel_c_city.city_name::Current Address City',
		'Rel_Employee_Address.employee_address_c_pincode',
		'Rel_Employee_Address.Rel_c_state.state_name::Current Address State',
		'Rel_Employee_Address.Rel_c_country.name::Current Address Country',
		
		'Rel_Employee_Address.employee_address_p_line1::Parmenent Address Line1',
		'Rel_Employee_Address.employee_address_p_line2::Parmenent Address Line2',			
		'Rel_Employee_Address.Rel_p_city.city_name::Parmenent Address City',
		'Rel_Employee_Address.Rel_p_state.state_name::Parmenent Address State',
		'Rel_Employee_Address.Rel_p_country.name::Parmenent Address Country',
		
		'Rel_Employee_Address.employee_address_phone',
		'Rel_Employee_Address.employee_address_mobile',
		'Rel_Emp_Info.employee_type',
	
		),
		'Employee',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
		/*  Teaching staff detail report */
	public function actionEmployeedataExportToExcel()
	{
		 
	 	 $des_name = "Lab. Assistant";
		 $designation = EmployeeDesignation::model()->findByAttributes(array('employee_designation_name'=>$des_name,'employee_designation_organization_id'=>Yii::app()->user->getState('org_id')));
		 $des_id = $designation['employee_designation_id'];
		 if($des_id)
		 {
		 $org = Yii::app()->user->getState('org_id');
		 $emp_data = EmployeeTransaction::model()->findAll(array(
		'condition' => 't.employee_transaction_designation_id <> :name and t.employee_transaction_organization_id = :org and employee_transaction_id IN(select employee_info_transaction_id from employee_info where employee_type =1)',
'params' => array(':name' => $des_id,':org'=>$org),
		'join' =>'JOIN employee_designation emp_des ON emp_des.employee_designation_id = employee_transaction_designation_id',
		'order' => 'emp_des.employee_designation_level ASC'
		));
		
		if($emp_data)
		{
	    	$this->toExcel($emp_data,
		array(
			'Rel_Emp_Info.title::Title',
			'Rel_Emp_Info.employee_last_name::Surname',
			'Rel_Emp_Info.employee_first_name::First Name',
			'Rel_Emp_Info.employee_middle_name::Middle Name',
			'Rel_Emp_Info.employee_gender::Gender',
			'Rel_Emp_Info.employee_middle_name::Father Name',
			'Rel_Emp_Info.employee_mother_name::Mother Name',
			
			'Rel_Employee_Address.employee_address_c_line1::Address Line 1',
			'Rel_Employee_Address.employee_address_c_line2::Address Line 2',
			'Rel_Employee_Address.employee_address_c_pincode::Postal Code',
			'Rel_Employee_Address.Rel_c_city.city_name::City/Village',
			'Rel_Employee_Address.Rel_c_state.state_name::State',
			'Rel_Religion.religion_name::Religion',
			'Rel_Category.category_name::Caste',
			'Rel_Emp_Info.employee_dob::Date of Birth',
			'Rel_Emp_Info.employee_pancard_no::PAN',
			'std_code::STD Code',
			'landline::Land Line #',
			'Rel_Emp_Info.employee_private_mobile::Mobile Phone #',
			'Rel_Emp_Info.employee_private_email::Email Address',
			'fax_phone::Fax Phone #',
			'Rel_Designation.employee_designation_name::Exact Designation',
			'applointment::Appointment FT/PT',
			'gross_per_month::Gross Pay Per Month',
			'appointment_type::Appointment Type',
			'faculty_type::Faculty Type',
			'payscale::PayScale',
			'programme::Programme',
			'course::Course',
			'salary_mode::Salary Mode',
			'pf_number::PF Number',	
			'Rel_Emp_Info.employee_joining_date::Date of Joining',		
			'doctrate_degree::Doctorate Degree',
			'pg_degree::PG Degree',
			'ug_degree::UG Degree',
			'other_qualification::Other Qualification',
			'area_specialization::Area Of Specialization',
			'teaching_exp::Teaching Experiece In Years',
			'total_exp::Total Experiece In Years',
			'research_exp::Research Experience in Years',
			'Rel_Emp_Info.employee_account_no::BankAccountNumber',
			'bank_name::BankName',
			'bank_branch_name::Bank Branch Name',
			'ifsc_code::IFSC Code',
			'national_publication::National Publications',
			'patent::Patents',
			'no_pg_prj_guided::No. Of PG Project Guided:',
			'no_dr_prj_guided::No. Of PG Doctorate Guided',
			'international_publication::International Publications',
			'no_of_books_pub::No Of books Published',
			'Physical_hd::Is Physically handicapped',
			'minority_indicator::Minority Indicator',
			'fy_teacher::First Yr Teacher',
			'fy_common_teacher::FY/Common Subject Teacher?',
			'fy_common_subject::FY/Common Subject',
			'expert_mem_aicte::Would you like to work as Expert Member on various committees of AICTE',
			'aicte_grant_apply::Have you ever applied to AICTE for any grants/assistance',
			'basic_pay_rs::Basic Pay in Rs.',
			'da::DA %',
			'hra_rs::HRA in Rs.',
			'other_allowance_rs::Other Allowances in Rs.',
		),
		'Employeedata',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );	
		}	
		else
		{
			echo "No data Found"."</br>";
			echo CHtml::link('GO BACK',Yii::app()->createUrl('/site/newdashboard'));
			break;

		}
		}
		else
		{
			echo "No data Found"."</br>";
			echo CHtml::link('GO BACK',Yii::app()->createUrl('/site/newdashboard'));
			break;

		}
	}
	/* Admin(Non- Teaching) staff detail report*/
	public function actionAdminlibdataExportToExcel()
	{
		
		$dep_name = "Admin Department";
		$department = Department::model()->findByAttributes(array('department_name'=>$dep_name,'department_organization_id'=>Yii::app()->user->getState('org_id')));
		$dep_id = $department['department_id'];
		if($dep_id)
		{
		$emp_data = EmployeeTransaction::model()->findAll('employee_transaction_organization_id = '.Yii::app()->user->getState('org_id').' AND employee_transaction_department_id = '.$dep_id);
		if($emp_data)
		{
	    	$this->toExcel($emp_data,
		array(
			'Rel_Emp_Info.title::Title',
			'Rel_Emp_Info.employee_first_name::First Name',
			'Rel_Emp_Info.employee_middle_name::Middle Name',
			'Rel_Emp_Info.employee_last_name::Surname',
			'Rel_Emp_Info.employee_mother_name::Mother Name',
			'Rel_Emp_Info.employee_middle_name::Father Name',
			'Rel_Employee_Address.employee_address_c_line1::Address Line 1',
			'Rel_Employee_Address.employee_address_c_line2::Address Line 2',
			'Rel_Employee_Address.Rel_c_city.city_name::City/Village',
			'Rel_Employee_Address.Rel_c_state.state_name::State',
			'Rel_Employee_Address.employee_address_c_pincode::Postal Code',
			'res_phone::Res Phone',
			'Rel_Emp_Info.employee_private_mobile::Mobile Phone #',
			'Rel_Emp_Info.employee_dob::Date of Birth',
			'Rel_Emp_Info.employee_gender::Gender',
			'phd::PhD',
			'master_degree::Master Degree',
			'bachelor_degree::Bachelor Degree',
			'diploma::Diploma',
			'other::Other',
			'Rel_Designation.employee_designation_name::Exact Designation',
			'appointment_type::Appointment Type',
			'Rel_Emp_Info.employee_joining_date::Date of Joining',
			'pf_number::PF Number',
			'salary_type::Salary Type',
			'salary_mode::Salary Mode',
			'gross_per_month::Gross Pay Per Month',
			'bank_name::Bank Name',
			'Rel_Emp_Info.employee_account_no::Bank Account Number',
			'ifsc_code::IFSC Code',
			'Rel_Emp_Info.employee_private_email::Email',
			'Rel_Emp_Info.employee_pancard_no::PAN',
			
		),
		'AdminLibStaffExcel',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
		}	
		else
		{
			echo "No data Found"."</br>";
			echo CHtml::link('GO BACK',Yii::app()->createUrl('/site/newdashboard'));
			break;

		}
		}
		else
		{
			echo "No data Found"."</br>";
			echo CHtml::link('GO BACK',Yii::app()->createUrl('/site/newdashboard'));
			break;

		}
	}
/* Technical staff detail report */
	public function actionTechnicalstaffdataExportToExcel()
	{
		$des_name = "Lab. Assistant";
		$designation = EmployeeDesignation::model()->findByAttributes(array('employee_designation_name'=>$des_name,'employee_designation_organization_id'=>Yii::app()->user->getState('org_id')));
		$des_id = $designation['employee_designation_id'];
		if($des_id)
		{
		$emp_data = EmployeeTransaction::model()->findAll('employee_transaction_organization_id = '.Yii::app()->user->getState('org_id').' AND employee_transaction_designation_id = '.$des_id);
		if($emp_data)
		{	    	
		$this->toExcel($emp_data,
		array(
			'Rel_Emp_Info.title::Title',
			'Rel_Emp_Info.employee_first_name::First Name',
			'Rel_Emp_Info.employee_middle_name::Middle Name',
			'Rel_Emp_Info.employee_last_name::Surname',
			'Rel_Emp_Info.employee_mother_name::Mother Name',
			'Rel_Emp_Info.employee_middle_name::Father Name',
			'Rel_Employee_Address.employee_address_c_line1::Address Line 1',
			'Rel_Employee_Address.employee_address_c_line2::Address Line 2',
			'Rel_Employee_Address.Rel_c_city.city_name::City/Village',
			'Rel_Employee_Address.Rel_c_state.state_name::State',
			'Rel_Employee_Address.employee_address_c_pincode::Postal Code',
			'res_phone::Res Phone',
			'Rel_Emp_Info.employee_private_mobile::Mobile Phone #',
			'Rel_Emp_Info.employee_dob::Date of Birth',
			'Rel_Emp_Info.employee_gender::Gender',
			'programme::Program',
			'course::Course',
			'level::Level',
			'Rel_Department.department_name::Department',
			
			'phd::PhD',
			'master_degree::Master Degree',
			'bachelor_degree::Bachelor Degree',
			'diploma::Diploma',
			'other::Other',
			'Rel_Designation.employee_designation_name::Exact Designation',
			'appointment_type::Appointment Type',
			'Rel_Emp_Info.employee_joining_date::Date of Joining the Institute',
			'pf_number::PF Number',
			'salary_type::Salary Type',
			'salary_mode::Salary Mode',
			'gross_per_month::Gross Pay Per Month',
			'bank_name::Bank Name',
			'Rel_Emp_Info.employee_account_no::Bank Account Number',
			'ifsc_code::IFSC Code',
			
			'Rel_Emp_Info.employee_pancard_no::PAN Number',
			
		),
		'TechnicalStaffExcel',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
		}	
		else
		{
			echo "No data Found"."</br>";
			echo CHtml::link('GO BACK',Yii::app()->createUrl('/site/newdashboard'));
			break;
		}
		}
		else
		{
			echo "No data Found"."</br>";
			echo CHtml::link('GO BACK',Yii::app()->createUrl('/site/newdashboard'));
			break;
		}
	}
	
//===============Student Transaction===============

	 public function actionStudentTransactionExportPdf() 
   	 {
	    	if(isset($_SESSION['Student_records']))
	       	{
		 	$d = $_SESSION['Student_records'];
		 	$model = array();
			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    		$model[] = $item->attributes;
			}
	
	       }
			   
		$html = $this->renderPartial('/studentTransaction/StudentTransactionExportPdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Student Report','Student.pdf',$html);	
	}
	public function actionStudentTransactionExportExcel()
	{
	    	$this->toExcel($_SESSION['Student_records'],
		array(
			'Rel_Stud_Info.student_roll_no',
			'Rel_Stud_Info.student_gr_no',
			'Rel_Stud_Info.student_merit_no',
			'Rel_Stud_Info.student_adm_date',
			'Rel_Stud_Info.student_enroll_no',
			'Rel_Stud_Info.student_first_name',
			//'Rel_Stud_Info.student_middle_name',
			'Rel_Stud_Info.student_last_name',
			'Rel_Stud_Info.student_mother_name',
			'Rel_Stud_Info.title',
			'Rel_Stud_Info.student_gender',
			'Rel_Stud_Info.student_birthplace',
			'Rel_Stud_Info.student_dob',
			'Rel_Nationality.nationality_name',
			'Rel_Religion.religion_name',
			'Rel_Cast.cast_master_name',
			'Rel_Quota.quota_name::Quota',
			'Rel_Branch.branch_name::Branch',
			'Rel_Category.category_name::Category',
			'Rel_student_academic_terms_period_name.academic_term_period::Term Period',
			'Rel_student_academic_terms_name.academic_term_name',
			'Rel_Stud_Info.student_guardian_name::Guardian Name',
			'Rel_Stud_Info.student_guardian_relation::Guardian Relation',
			'Rel_Stud_Info.student_guardian_qualification::Guardian Qualification',
			'Rel_Stud_Info.student_guardian_mobile::Guardian Mobile',
			'Rel_Stud_Info.student_guardian_occupation::Guardian Occupation',
			'Rel_Stud_Info.student_guardian_income::Guardian Income',
			'Rel_Stud_Info.student_guardian_occupation_address::Guardian Occupation Address',
			'Rel_Stud_Info.student_guardian_home_address::Guardian Home Address',
			'Rel_Stud_Info.Rel_gardian_city.city_name::Guardian::City',
			'Rel_Stud_Info.student_guardian_city_pin',
			'Rel_Stud_Info.student_guardian_phoneno',
			'Rel_Stud_Info.student_email_id_1',
			'Rel_Stud_Info.student_email_id_2',
			'Rel_Stud_Info.student_bloodgroup',
			'Rel_Batch.batch_name::Batch',
			'Rel_Shift.shift_type',
			'Rel_language.Rel_language_known1.languages_name',
			'Rel_language.Rel_language_known2.languages_name',
			'Rel_language.Rel_language_known3.languages_name',
			'Rel_language.Rel_language_known4.languages_name',
			'Rel_Student_Address.student_address_c_line1::Current Address Line1',
			'Rel_Student_Address.student_address_c_line2::Current Address Line2',
			'Rel_Student_Address.Rel_c_city.city_name::Current Address City',
			'Rel_Student_Address.student_address_c_pin::Current Address City Pin ',
			'Rel_Student_Address.student_address_c_taluka',
			'Rel_Student_Address.student_address_c_district',
			'Rel_Student_Address.Rel_c_state.state_name::Current Address State',
			'Rel_Student_Address.Rel_c_country.name::Current Address Country',
			'Rel_Student_Address.student_address_p_line1::Permanent Address Line1',
			'Rel_Student_Address.student_address_p_line2::Permanent Address Line2',
			'Rel_Student_Address.Rel_p_city.city_name::Permanent Address City',
			'Rel_Student_Address.student_address_p_pin::Permanent Address Line1',
			'Rel_Student_Address.student_address_p_taluka',
			'Rel_Student_Address.student_address_p_district',
			'Rel_Student_Address.Rel_p_state.state_name::Permanent Address State',
			'Rel_Student_Address.Rel_p_country.name::Permanent Address Country',
			'Rel_Student_Address.student_address_phone',
			'Rel_Student_Address.student_address_mobile',
			'Rel_Stud_Info.student_living_status',
			),
			'studenttransaction',
			array(
			    'creator' => 'Rudrasoftech',
			),
			'Excel5'
		    );
		}
	public function actionStudentdataExportExcel()
	{
		
		$stud_data = StudentTransaction::model()->findAll('student_transaction_organization_id = '.Yii::app()->user->getState('org_id'));
		
		if($stud_data)
		{
	    	$this->toExcel($stud_data,
		array(
			'Rel_Stud_Info.title::Title',
			'Rel_Stud_Info.student_first_name::First Name',
			'Rel_Stud_Info.student_middle_name::Middle Name',
			'Rel_Stud_Info.student_last_name::Surname / Family Name',
			'year1::Year1 (% marks)',
			'year2::Year2 (% marks)',
			'year3::Year3 (% marks)',
			'year4::Year4 (% marks)',
			'year5::Year5 (% marks)',
			'Rel_Stud_Info.student_mother_name::Mother Name',
			'Rel_Stud_Info.student_father_name::Father Name',
			'Rel_Stud_Info.student_guardian_phoneno::Res Phone',
			'Rel_Stud_Info.student_mobile_no::Mobile Number',
			'Rel_Stud_Info.student_gender::Gender',
			'Rel_Stud_Info.student_dob::Date of Birth(dd/mm/yyyy)',
			'program::Program',
			'course::Course',		
			'level::Level',
			'Rel_Stud_Info.student_adm_date::Date of joining(dd/mm/yyyy)',
			'admission::Admitted To',
			'Rel_Stud_Info.student_roll_no::Roll Number',
			'Rel_Stud_Info.student_email_id_1::Email Address',
			'Rel_Religion.religion_name::Religion',
			'Rel_Cast.cast_master_name::Caste',
			'reserve_category::Reserve Category',
			'phy_hand::Is Physically Handicapped',
			'econ_back::Econ Backward',
			'Rel_Stud_Info.student_living_status::Home',
			'institute_fees::Institute Fees Paid',
			'hostel_fees::Hostel Fees/Month',
			'gate_score::Gate Score',
			'gate_exam_number::Gate Exam Number',
			'gate_score_validfrom::Gate Score- Year Valid From',
			'gate_score_validto::Gate Score- Year Valid To',
			'aadharcard::Aadhaar Card',
			'Rel_Stud_Info.student_enroll_no::Enrolment Id(EID)',
				
			),
			'studentdata',
			array(
			    'creator' => 'Rudrasoftech',
			),
			'Excel5'
		    );
		}
		else
		{
			echo "No data Found"."</br>";
			echo CHtml::link('GO BACK',Yii::app()->createUrl('/site/newdashboard')); 
			break;
		}
		}


//===============Fees Master===============

	public function actionFeesMasterExportPdf() 
   	 {
	    	if(isset($_SESSION['fees_master']))
	       	{
		 	$d = $_SESSION['fees_master'];
		 	$model = array();
			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    		$model[] = $item->attributes;
			}
	
	       }
			   
		$html = $this->renderPartial('/feesMaster/gridview_export_report', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Fees Category Report','FeesMaster.pdf',$html);
			
	}
	public function actionFeesMasterExportToExcel()
	{
	
		$this->toExcel($_SESSION['fees_master'],
			array(
			'fees_master_name',
			'Rel_fees_quota.quota_name::Quota Name',
			//'fees_master_created_date',
			'Rel_user.user_organization_email_id::Created By',
			'Rel_fees_org.organization_name',
			
		),
		'Fees Category',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}		
	
//===============MIS Report===============


//===============Inward Report===============
	 public function actionInwardExportToPdf() 
	 {
		if(isset($_SESSION['inward_records']))
               	{
		 	$d = $_SESSION['inward_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/inward/expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Inward Report','Inward.pdf',$html);
	
	}
	public function actionInwardExportToExcel()
	{
	    	$this->toExcel($_SESSION['inward_records'],
		array(
			'invoice_description',
			'company_name',
			'invoice_no_dc',
			'rel_department.department_name::Department',
			'invoice_date',
			'receiver_name',
			'received_date',
			'rel_organization.organization_name',
		),
		'Inward-Data',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}

//===============Assets Report===============
	public function actionAssetsExportToPdf() 
	{
		if(isset($_SESSION['asset_data']))
               	{
		 	$d = $_SESSION['asset_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/assets/exportGridtoReport', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Asset Report','Asset.pdf',$html);
	}
	public function actionAssetsExportToExcel()
	{
		$this->toExcel($_SESSION['asset_data'],
		array(
			'invoice_description',
			'company_name',
			'invoice_no_dc',
			'invoice_date',
			'received_date',
			'rel_department.department_name::Department',
			'rel_organization.organization_name',
		),
		'Asset File',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}

//===============Visitor===============
	public function actionVisitorPassExportToPdf() 
	{
             	if(isset($_SESSION['visitor_data']))
               	{
			$d = $_SESSION['visitor_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/visitorPass/exportGridtoReport', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Visitor Report','Visitor.pdf',$html);
	}
	public function actionVisitorPassExportToExcel()
	{
		$this->toExcel($_SESSION['visitor_data'],
		array(
			'pass_no',
			//'date_format(in_date_time,"d-m-Y H:i:S")::DateTime',
			//'date("d-m-Y H:i:S",strtotime(in_date_time))',
			'in_date_time',
			'visitor_name',
			'contact_person',
			'purpose',
			'Rel_vistor_dep.department_name::Department',
			'address',
			'company_represented',
			'vehicle_no',
			'no_of_persons',
			'remark',
			'age',
			'gender',
			'out_time',
			'batch_no',
			'item_carring',
			'Rel_vistor_org.organization_name::Organization',
		),
		'Visitor File',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionVisitortotalPassExportToPdf() 
	{
             	if(isset($_SESSION['total_visitor']))
               	{
			$d = $_SESSION['total_visitor'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/visitorPass/exportGridtoReporttotal', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Total Visitor Report','TotalVisitor.pdf',$html);
	}
	public function actionVisitortotalPassExportToExcel()
	{
		$this->toExcel($_SESSION['total_visitor'],
		array(
			'pass_no',
			'visitor_name',
			'contact_person',
			'purpose',
			'in_date_time',
			//'date_format(in_date_time,"d-m-Y H:i:S")::DateTime',
			//'date("d-m-Y H:i:S",strtotime(in_date_time))::DateTime',
			'Actual_Out_Time',
			'Rel_vistor_org.organization_name::Organization',
		),
		'Visitor File',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	
//===============Subject Master ===============
	public function actionSubjectMasterExportToPdf() 
	{
             	if(isset($_SESSION['subject_data']))
               	{
		 	$d = $_SESSION['subject_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
		$html = $this->renderPartial('/subjectMaster/exportGridtoReport', array(
			'model'=>$model,
		), true);
		
		$this->exporttopdf('Subject Report','Subject.pdf',$html);
		
	}
	public function actionSubjectviewExportToPdf() 
	{
	   	$session=new CHttpSession;
	   	$session->open();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		$html = $this->renderPartial('/subjectMaster/exportGridtoReportview', array(
			'id'=>$_REQUEST['id'],
		), true);
		//die($html);
		ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Particular Subject  Report');
		$pdf->SetSubject('Particular Subject  Report');
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Particular Subject  Report", '');
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
		$pdf->Output("Particular Subject.pdf", "I");
		$html = $this->renderPartial('/subjectMaster/exportGridtoReportview', array(
		    'id'=>$_REQUEST['id'],
		), true);
        
		$this->exporttopdf('Particular Subject  Report','ParticularSubject.pdf',$html);
	}
	public function actionSubjectMasterviewExportToExcel()
	{
		$id=$_REQUEST['id'];
		$session=new CHttpSession;
	   	$session->open();
		Yii::app()->request->sendFile(date('YmdHis').'.xls',
                           $this->renderPartial('/subjectMaster/exportGridtoReportview', array(
                              'id'=>$_REQUEST['id'],
                              
                           ), true)
                       );	
		Yii::app()->request->sendFile(date('YmdHis').'.xls',
		                   $this->renderPartial('/subjectMaster/exportGridtoReportview', array(
		                      'id'=>$_REQUEST['id'],
		                     
		                   ), true)
		               );    
	}
	public function actionSubjectMasterExportToExcel()
	{
		
		$this->toExcel($_SESSION['subject_data'],
		array(
			'subject_master_name',
			'subject_master_code',
			'subject_master_alias',
			'Rel_sub_type.subject_type_name',
			'Rel_branch_id.branch_name::Branch Name',
			'Rel_aca_term_name_id.academic_term_name',
			'Rel_aca_term_period_id.academic_term_period',
			'rel_user_id.user_organization_email_id::Created By',
			//'subject_master_updated_date',	
			'Rel_org_id.organization_name::Organization',	
		),
		'Subject_File',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}

//===============Subject Syllabus===============

	public function actionSubjectSyllabusExportToPdf() 
	{
		if(isset($_SESSION['syllabus_data']))
               	{
		 	$d = $_SESSION['syllabus_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/subjectSyllabus/exportGridtoReport', array(
			'syllabusmodel'=>$model
		), true);
		
		$this->exporttopdf('Syllabus Report','Syllabus.pdf',$html);
	}

	public function actionSubjectSyllabusExportToExcel()
	{
		$this->toExcel($_SESSION['syllabus_data'],
		array(
			'sub_id',
			'topic_name',
			'topic_description',
			'hours',
			'actual_duration',
			'subject_syllabus_type',
			'teaching_method',
			'start_date',
			'end_date',
			'duration',
			'actual_start_date',
			'actual_end_date',
			'actual_duration',
			'actual_remarks',
			'deliver_topic',
			'rel_subuser_id.user_organization_email_id::Created By',
			//'created_date',
			
			
		),
		'Syllabus File',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	
//===============Subject TextBook===============

	public function actionSubjectTextbookExportToPdf() 
	{
             	if(isset($_SESSION['tbook']))
               	{
			$d = $_SESSION['tbook'];
		 	$model = array();
			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}
			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/subjectTextbook/exportGridtoReport', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Text Book Report','TextBook.pdf',$html);
	}
	public function actionSubjectTextbookExportToExcel()
	{
		$this->toExcel($_SESSION['tbook'],
		array(
			'rel_tbook_sub.subject_master_name',
			'isbn_no',
			'title',
			'subject_textbook_type',
			'rel_tbookuser_id.user_organization_email_id::Created By',
			//'created_date',
			
			
		),
		'Text Book File',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
//===============Subject Referencebook===============

	
	public function actionSubjectRefbookExportToPdf() 
	{
             	if(isset($_SESSION['rbook']))
               	{
		 	$d = $_SESSION['rbook'];
		 	$model = array();
			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}
			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/subjectRefbook/exportGridtoReport', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Reference Book Report','ReferenceBook.pdf',$html);
	}
	public function actionSubjectRefbookExportToExcel()
	{
		$this->toExcel($_SESSION['rbook'],
		array(
			'rel_rbook_sub.subject_master_name',
			'isbn_no',
			'title',
			'subject_refbook_type',
			'rel_rbookuser_id.user_organization_email_id::Created By',	
		),
		'Reference Book File',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
//===============Subject Guidelines===============

	public function actionSubjectGuidelinesExportToPdf() 
	{
             	if(isset($_SESSION['guideline']))
               	{
		 	$d = $_SESSION['guideline'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/subjectGuidelines/exportGridtoReport', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Subject Guidelines Report','SubjectGuidelines.pdf',$html);
	}

	public function actionSubjectGuidelinesExportToExcel()
	{
		$this->toExcel($_SESSION['guideline'],
		array(
			'rel_tscheme_sub.subject_master_name',
			'guideline',
			'rel_guidelinesuser_id.user_organization_email_id::Created By',
			//'creation_date',
			
			
		),
		'Guideline File',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}

//===============Subject Teaching Scheme===============

	public function actionSubjectTeachingSchemaExportToPdf() 
	{
            	if(isset($_SESSION['teaching_data']))
               	{
		 	$d = $_SESSION['teaching_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/subjectTeachingSchema/exportGridtoReport', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Teaching Schema Report','TeachingSchema.pdf',$html);
	}
	
	public function actionSubjectTeachingSchemaExportToExcel()
	{
		$this->toExcel($_SESSION['teaching_data'],
		array(
			'rel_tscheme_sub.subject_master_name',
			'theory_credit',
			'tutorial_credit',
			'practical_credit',
			'rel_teachinguser_id.user_organization_email_id::Created By',
			//'creation_date',
			
		),
		'Teaching File',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	

//===============Subject Examination Marks===============
	
	public function actionSubjectExaminationMarkExportToPdf() 
	{
             	if(isset($_SESSION['examination']))
               	{
		 	$d = $_SESSION['examination'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/subjectExaminationMark/exportGridtoReport', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Examination Mark Report','ExaminationMark.pdf',$html);
		
	}
	public function actionSubjectExaminationMarkExportToExcel()
	{
		$this->toExcel($_SESSION['examination'],
		array(
			
			'rel_exam_mark.subject_master_name',
			'university_mark',
			'midsem_mark',
			'practical_mark',
			'rel_examuser_id.user_organization_email_id::Created By',
			//'creation_date',
		),
		'Examination File',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	

//===============Outward===============

	public function actionOutwardExportToPdf() 
	{
             	if(isset($_SESSION['outward_data']))
               	{
		 	$d = $_SESSION['outward_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/outward/exportGridtoReport', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Outward Report','Outward.pdf',$html);
		
	}
	public function actionOutwardExportToExcel()
	{
		$this->toExcel($_SESSION['outward_data'],
		array(
			'invoice_description',
			'company_name',
			'invoice_no_dc',
			'rel_department.department_name::Department Name',
			'invoice_date',
			'sending_date',
			'receiver_name',
			
			'photo',
			'document',
			'document_desc',
			'orgName.organization_name',
			'no_of_packets',
			'sender_name',
		),
		'Outward File',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}

//===============Room Details===============

	public function actionRoomDetailsExportToPdf() 
	{
             	if(isset($_SESSION['room_data']))
               	{
		 	$d = $_SESSION['room_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/roomDetailsMaster/gridview_export_report', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('RoomDetails Report','RoomDetails.pdf',$html);
	}
	public function actionRoomDetailsExportToExcel()
	{
		$this->toExcel($_SESSION['room_data'],
		array(
		'room_name',
		'location',
		'seat_capacity',
		'category.category_name',
		'no_of_banches',
		'rel_organization.organization_name',
	
		),
		'Room-Details',
		array(
		    'creator' => 'Zen',
		),
		'Excel5'
	    );
	}


//===============Student Attendance===============

 	public function actionAttendenceExportToPdf() 
	{
             	if(isset($_SESSION['attendence']))
               	{
		 	$d = $_SESSION['attendence'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/attendence/expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Attendence Report','Attendence.pdf',$html);
	}
	public function actionAttendenceExportToExcel()
	{
	
		$this->toExcel($_SESSION['attendence'],
		array(
			'rel_atd_student.student_enroll_no',
			'rel_atd_student.student_first_name::Student Name',
			'attendence',
			'rel_atd_employee.employee_first_name::Faculty Name',
			'rel_atd_branch.branch_name::Branch Name',
			'rel_atd_subject.subject_master_name::Subject Name',
			'rel_atd_atn.academic_term_name',
			'rel_atd_sem.academic_term_period::Academic Term',
			'attendence_date',
		),
		'Student Attendence',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}

//===============Employee Attendance===============
	public function actionEmployeeAttendenceExportToPdf() 
	{
             	if(isset($_SESSION['employee_attendence']))
               	{
                	
		 	$d = $_SESSION['employee_attendence'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
	      
              
		$html = $this->renderPartial('/employee_attendence/expenseGridtoReport', array(
			'model'=>$model,
		), true);
		
		$this->exporttopdf('Employee Attendence Report','EmployeeAttendence.pdf',$html);
		
	}
	public function actionEmployeeAttendenceExportToExcel()
	{
	
		$this->toExcel($_SESSION['employee_attendence'],
		array(
			'Rel_Emp_Info.employee_no',
			'Rel_Emp_Info.employee_attendance_card_id',
			'attendence',
			'Rel_Emp_Info.employee_first_name',
			'date',
			'total_hour',
			'time1',
			'time2',
			'overtime_hour',
			
		),
		'Employee Attendence',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
//

	public function actionLeftDetainExportToPdf() 
	{
             	if(isset($_SESSION['left_student_data']))
               	{
			$d = $_SESSION['left_student_data'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/leftDetainedPassStudentTable/gridview_export_report', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('LeftDetainPassout Report','LeftDetainPassout.pdf',$html);
		
	}
	public function actionLeftDetainExportToExcel()
	{
	    	$this->toExcel($_SESSION['left_student_data'],
		array(
		'Rel_left_student_id.student_roll_no',
		'Rel_left_student_id.student_enroll_no',
		'Rel_left_student_id.student_first_name',
		'Rel_left_status_id.status_name',
		'Rel_left_sem_id.academic_term_name',
		'Rel_left_academic_term_period_id.academic_term_period',
		'remarks',
		'left_detained_pass_student_cancel_date',
		'Rel_user.user_organization_email_id::Created By',
		'Rel_organization.organization_name',
		),
		'LeftDetainPassout',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}

//===============user===============
	public function actionuserExportToExcel()
	{
	    	$this->toExcel($_SESSION['user_data'],
		array(
			'user_organization_email_id',
				
			'user_type',
			'rel_user_email.user_organization_email_id',
			'user_creation_date',
			'rel_user_organization.organization_name',
		),
		'User',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
	
	public function actionuserExportToPdf() 
	{
             	if(isset($_SESSION['user_data']))
              	{
		 	$d = $_SESSION['user_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/user/userGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('User Report','user.pdf',$html);
		
	}
//===============assign company===============
	public function actioncompanyExportToExcel()
	{
	    	$this->toExcel($_SESSION['company_data'],
		array(
			'Rel_ass_user.user_organization_email_id',
			//'Rel_ass_org.organization_name',
			
			//'Rel_ass_user.user_organization_email_id',
			'assign_creation_date',
			'Rel_ass_org.organization_name',
		),
		'Assign Company',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
	
	public function actioncompanyExportToPdf() 
	{
             	if(isset($_SESSION['assign_company_data']))
              	{
		 	$d = $_SESSION['assign_company_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/assignCompanyUserTable/companyGeneratePdf', 			array(
			'model'=>$model
		), true);
		$this->exporttopdf('Assign Company Report','AssignCompany.pdf',$html);
	}
//===============login===============
	public function actionloginExportToExcel()
	{
	    	$this->toExcel($_SESSION['login_data'],
		array(
			'login_user.user_organization_email_id',
			'status',
			'log_in_time',
			'log_out_time', 	
			'user_ip_address', 
		),
		'Login user',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
	
	public function actionloginExportToPdf() 
	{
		if(isset($_SESSION['login_data']))
              	{
		 	$d = $_SESSION['login_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/loginUser/loginGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Login user Report','Login_user.pdf',$html);
		
	}
//===============Employee sms===============
	public function actionempsmsExportToExcel()
	{
	    	$this->toExcel($_SESSION['empsms_data'],
		array(
			'rel_emp_sms_info.employee_no',
			'rel_emp_sms_info.employee_attendance_card_id',
			'rel_emp_sms_info.employee_first_name::Employee Name',
			'rel_emp_sms_bid.branch_name::BranchName',
			'rel_emp_sms_shiftid.shift_type',
			'rel_emp_sms_divid.department_name::Department',
			'message_email_text',
			'email_sms_status',
			'creation_date',
			'rel_emp_sms_user.user_organization_email_id::Created By',
			
		
		),
		'EmployeeSmsEmailDetails',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
	
	public function actionempsmsExportToPdf() 
	{
             	if(isset($_SESSION['empsms_data']))
              	{
		 	$d = $_SESSION['empsms_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/employeeSmsEmailDetails/exportGridtoReport', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Employee Sms Email Details','EmployeeSmsEmailDetails.pdf',$html);
	}
//===============student sms===============
	public function actionstusmsExportToExcel()
	{
	    	$this->toExcel($_SESSION['stusms_data'],
		array(
			'rel_stud_sms_info.student_enroll_no',
			'rel_stud_sms_info.student_roll_no',
			'rel_stud_sms_info.student_first_name',
			'rel_stu_sms_bid.branch_name',
			'rel_stu_sms_shiftid.shift_type',
			'rel_stu_sms_divid.division_name',
			'rel_stud_acd_tname.academic_term_name',
			'message_email_text',
			'email_sms_status',
			'creation_date',
			'rel_stu_sms_user.user_organization_email_id',
			'rel_stu_sms_org.organization_name::Created By',
			
		
		),
		'StudentSmsEmailDetails',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
	
	public function actionstusmsExportToPdf() 
	{
             	if(isset($_SESSION['stusms_data']))
              	{
		 	$d = $_SESSION['stusms_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/studentSmsEmailDetails/exportGridtoReport', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Student Sms Email Details','StudentSmsEmailDetails.pdf',$html);
		
	}

	//-----------------------mismiscellenous fees-----------------------------------------
	public function actionmis_feesExportToPdf($id) 
	{
             $cash_data = MiscellaneousFeesPaymentCash::model()->findAll('miscellaneous_fees_payment_cash_student_id='.$id);
	     $cheque_data = MiscellaneousFeesPaymentCheque::model()->findAll('miscellaneous_fees_payment_cheque_student_id='.$id);
              
		$html = $this->renderPartial('/miscellaneousFeesPaymentTransaction/mis_pdf', array(
			'cash_data'=>$cash_data,'cheque_data'=>$cheque_data,'id'=>$id,
		), true);
		
		$this->exporttopdf('Miscellenous Fees  Report','MiscellenousFees.pdf',$html);
	}
	public function actionmis_feesExportToExcel($id)
	{
		$cash_data = MiscellaneousFeesPaymentCash::model()->findAll('miscellaneous_fees_payment_cash_student_id='.$id);
	     $cheque_data = MiscellaneousFeesPaymentCheque::model()->findAll('miscellaneous_fees_payment_cheque_student_id='.$id);
              
		Yii::app()->request->sendFile(date('YmdHis').'.xls',
                           $this->renderPartial('/miscellaneousFeesPaymentTransaction/mis_pdf', array(
			'cash_data'=>$cash_data,'cheque_data'=>$cheque_data,'id'=>$id,
		), true)
                       );
		
	}
		
	public function actionUserTypeExportToPdf() 
	{
             	if(isset($_SESSION['user_type_records']))
               	{
			$d = $_SESSION['user_type_records'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/userType/userTypeGeneratePdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('UserType Report','UserType.pdf',$html);
	}
	public function actionUserTypeExportToExcel()
	{
	    	$this->toExcel($_SESSION['user_type_records'],
		array(
		'user_type_name', 	
		'Rel_user.user_organization_email_id:Created By',
		//'Rel_org.organization_name',
		),
		'UserType',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionFeesPaymentTypeExportToPdf() 
	{
             	if(isset($_SESSION['fees_pay_type_records']))
               	{
			$d = $_SESSION['fees_pay_type_records'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/feesPaymentType/feesPaymentTypeGeneratePDF', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('FeesPaymentType Report','FeesPayment.pdf',$html);
	}
	public function actionFeesPaymentTypeExportToExcel()
	{
	    	$this->toExcel($_SESSION['fees_pay_type_records'],
		array(
		'fees_type_name', 	
		
		'Rel_org.organization_name',
		),
		'FeesPayment',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionGtuNoticeExportToPdf() 
	{
             	if(isset($_SESSION['gtu_notice_records']))
               	{
			$d = $_SESSION['gtu_notice_records'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/gtunotice/gtuNoticeGeneratePDF', array(
			'model'=>$model
		), true);
		$this->exporttopdf('GTU Notice Report','GTUNotice.pdf',$html);
		
	}
	public function actionGtuNoticeExportToExcel()
	{
	    	$this->toExcel($_SESSION['gtu_notice_records'],
		array(
		'Description',
		'Link',
		'Rel_user.user_organization_email_id::Created By', 	
		'Rel_org.organization_name::Organization',
		
		),
		'GTUNotice',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionImportantNoticeExportToPdf() 
	{
             	if(isset($_SESSION['important_notice_records']))
               	{
			$d = $_SESSION['important_notice_records'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/importantNotice/importantNoticeGeneratePDF', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Important Notice Report','ImportantNotice.pdf',$html);
	}
	public function actionImportantNoticeExportToExcel()
	{
	    	$this->toExcel($_SESSION['important_notice_records'],
		array(
		'notice', 
		'Rel_user.user_organization_email_id::Created By',	
		'Rel_org.organization_name',
		
		),
		'ImportantNotice',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionAssignSubjectExportToPdf() 
	{
             	if(isset($_SESSION['assign_subject_records']))
               	{
			$d = $_SESSION['assign_subject_records'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/assignSubject/assignSubjectGeneratePDF', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Subject Allotment Report','AssignSubject.pdf',$html);
	}
	public function actionAssignSubjectExportToExcel()
	{
	    	$this->toExcel($_SESSION['assign_subject_records'],
		array(
		'Rel_sub.subject_master_name',
		'Rel_Emp_Id.employee_first_name::subject Faculty',
		'active',
		'Rel_org.organization_name',
		'Rel_user.user_organization_email_id',
		),
		'Subject Allotment',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionFeedbackMasterExportToPdf() 
	{
             	if(isset($_SESSION['feedback_records']))
               	{
			$d = $_SESSION['feedback_records'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/feedbackMaster/feedbackMasterGeneratePDF', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Feedback Report','Feedback.pdf',$html);
	}
	public function actionFeedbackMasterExportToExcel()
	{
	    	$this->toExcel($_SESSION['feedback_records'],
		array(
		'feedback_start_date',
		'feedback_end_date',
		'feedback_name',
		'Rel_emp_id.employee_first_name',
		'Rel_branch_id.branch_name',
		'Rel_academic_term_id.academic_term_name',
		'Rel_academic_term_period_id.academic_terms_period_name',
		'Rel_subject_id.subject_master_name',
		'Rel_department_id.department_name',
		'remark',
		'Rel_org.organization_name',
		
		),
		'Feedback',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionOrganizationExportToPdf() 
	{
             	if(isset($_SESSION['organization_records']))
               	{
			$d = $_SESSION['organization_records'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/organization/OrganizationGeneratePDF', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Organization Report','Organization.pdf',$html);
	}
	public function actionOrganizationExportToExcel()
	{
	    	$this->toExcel($_SESSION['organization_records'],
		array(
		'organization_name',
		'address_line1',
		'Rel_org_city.city_name',
		'Rel_org_state.state_name',
		'Rel_org_country.name',
		'pin',
		'phone',
		'website',
		'email',
		'fax_no',
		'Rel_user.user_organization_email_id',
		'organization_creation_date',
		
		),
		'Organization',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}

	public function actionStudentFinalViewExportToPdf($id)
	    {
		$student_docs = StudentDocsTrans::model()->findAll('student_docs_trans_user_id='.$id);	
		$studentqualification = StudentAcademicRecordTrans::model()->findAll('student_academic_record_trans_stud_id='.$id);
		$student_transaction = StudentTransaction::model()->findAll('student_transaction_id='.$id);		 
		$studentfeedbackdetailstable = FeedbackDetailsTable::model()->findAll('feedback_details_table_student_id='.$id);
		$html = $this->renderPartial('/studentTransaction/studentfinalview', array(
		    'student_docs'=>$student_docs,
		    'studentqualification'=>$studentqualification,
		    'student_transaction'=>$student_transaction,
		    'studentfeedbackdetailstable'=>$studentfeedbackdetailstable,
		), true);

		$this->exporttopdf('Stundent Report','StundentFinalView.pdf',$html);	       
	    }
	//feedbackcategorymaster//////////////////////////
	public function actionFeedbackcategoryExportToPdf() 
	{
             	if(isset($_SESSION['feedbackcategory']))
               	{
			$d = $_SESSION['feedbackcategory'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}
			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
		}
		$html = $this->renderPartial('/feedbackCategoryMaster/FeedbackCategoryGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Feedback Category Master Report','StudentPerformanceReport.pdf',$html);	       
	}
	public function actionFeedbackcategoryExportToExcel()
	{
	    	$this->toExcel($_SESSION['feedbackcategory'],
		array(
		'feedback_category_name',
		'Rel_user_feedback.user_organization_email_id::Created By',
		//'feedback_category_creation_date',
		'Rel_org_feedback.organization_name',
		),
		'StudentPerformanceReport',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );

	}
	public function actionEmployeeFinalViewExportToPdf($id)
	    {
		$employee_transaction = EmployeeTransaction::model()->findAll(' 	employee_transaction_id='.$id);
		$employee_docs = EmployeeDocsTrans::model()->findAll('employee_docs_trans_user_id='.$id);
		$employee_qual = EmployeeAcademicRecordTrans::model()->findAll('employee_academic_record_trans_user_id='.$id);
		$employee_exp = EmployeeExperienceTrans::model()->findAll('employee_experience_trans_user_id='.$id);

		$html = $this->renderPartial('/employeeTransaction/employeeFinalView', array(
		    'employee_docs'=>$employee_docs,
		    'employee_qual'=>$employee_qual,
		    'employee_transaction'=>$employee_transaction,
		    'emp_exp'=>$employee_exp,
		), true);
		$this->exporttopdf('Employee Report','Employee.pdf',$html);	              
	    }
	public function actionteachingmethodExportToPdf() 
	{
             	if(isset($_SESSION['teachingdata']))
               	{
			$d = $_SESSION['teachingdata'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/teaching_methods/teachingGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('TeachingMethod Report','TeachingMethod.pdf',$html);	
	}
	public function actionteachingmethodExportToExcel()
	{
	    	$this->toExcel($_SESSION['teachingdata'],
		array(
		
		'teaching_methods_name',
		'teaching_methods_alias',
		'remarks',
		//'teaching_methods_created_date',

		'Rel_user_teaching.user_organization_email_id:Created By',			
		),
		'TeachingMethod',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionmessageExportToPdf() 
	{
             	if(isset($_SESSION['message']))
               	{
			$d = $_SESSION['message'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/messageOfDay/messageGeneratePDF', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Message Report','Message.pdf',$html);	
	}
	public function actionmessageExportToExcel()
	{
	    	$this->toExcel($_SESSION['message'],
		array(
		'message',
		//'creation_date',
		'Rel_user_message.user_organization_email_id::Created By',
		),
		'Message',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actiondocumentExportToPdf() 
	{
             	if(isset($_SESSION['document']))
               	{
			$d = $_SESSION['document'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/documentCategoryMaster/documentGeneratePDF', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Document Report','Document.pdf',$html);
	}
	public function actiondocumentExportToExcel()
	{
	    	$this->toExcel($_SESSION['document'],
		array(
		'doc_category_name',
		//'creation_date',
		
		'Rel_document_user.user_organization_email_id::Created By',
		'Rel_document_org.organization_name',
		),
		'Document_Category',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionCertificateExportToPdf() 
	{
             	if(isset($_SESSION['certificate']))
               	{
			$d = $_SESSION['certificate'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/certificate/certificateGeneratepdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Certificate Report','Certificate.pdf',$html);
	}
	public function actionCertificateExportToExcel()
	{
	    	$this->toExcel($_SESSION['certificate'],
		array(
		'certificate_title',
		'certificate_type',
		//'certificate_content',
		'Rel_user.user_organization_email_id::Created By',
		'Rel_org.organization_name',
		),
		'Document_Category',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionreturnchequelistExportToPdf() 
	{
             	if(isset($_SESSION['returncheque']))
               	{
			$d = $_SESSION['returncheque'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/feesPaymentCheque/returnchequeGeneratePdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('ReturnChequeList Report','ReturnChequeList.pdf',$html);
		
	}
	public function actionreturnchequelistExportToExcel()
	{
		if(isset($_SESSION['returncheque']))
               	{
		 	$d = $_SESSION['returncheque'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
	   Yii::app()->request->sendFile(date('YmdHis').'.xls',
                           $this->renderPartial('/feesPaymentCheque/returnchequeGeneratePdf', array(
                              'model'=>$model,
                              
                           ), true)
                       );
	}
	public function actionstudentcertificateGenerateExcel()
	{
              if(isset($_SESSION['StudentCertificateDetailsTable_records']))
               {
                 $d=$_SESSION['StudentCertificateDetailsTable_records'];
		 $model = array();

			if($d->data)
				$model[]=array_keys($d->data[0]->attributes);//headers: cols name
				else
				{
					$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
					exit;			
				}

			foreach ($d->data as $item) {
			    $model[] = $item->attributes;
			}
               }
              
		
		Yii::app()->request->sendFile("StudentCertificateDetails.xls",
			$this->renderPartial('/studentCertificateDetailsTable/studentcertificateGeneratePdf', array(
				'model'=>$model
			), true)
		);
	}
        public function actionstudentcertificateGeneratePdf() 
	{	
             if(isset($_SESSION['StudentCertificateDetailsTable_records']))
               {
                 $d=$_SESSION['StudentCertificateDetailsTable_records'];
		 $model = array();

			if($d->data)
				$model[]=array_keys($d->data[0]->attributes);//headers: cols name
				else
				{
					$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
					exit;			
				}

			foreach ($d->data as $item) {
			    $model[] = $item->attributes;
			}
               }
              	$html = $this->renderPartial('/studentCertificateDetailsTable/studentcertificateGeneratePdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Student Certificate Details Report','StudentCertificateDetails.pdf',$html);
	}
	public function actionEmpcertificateGenerateExcel()
	{
              if(isset($_SESSION['EmployeeCertificateDetailsTable_records']))
               {
                 $d=$_SESSION['EmployeeCertificateDetailsTable_records'];
		 $model = array();

			if($d->data)
				$model[]=array_keys($d->data[0]->attributes);//headers: cols name
				else
				{
					$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
					exit;			
				}

			foreach ($d->data as $item) {
			    $model[] = $item->attributes;
			}
               }
		Yii::app()->request->sendFile("EmployeeCertificateDetails.xls",
			$this->renderPartial('/employeeCertificateDetailsTable/empcertificateGeneratePdf', array(
				'model'=>$model
			), true)
		);
	}
        public function actionEmpcertificateGeneratePdf() 
	{	
             if(isset($_SESSION['EmployeeCertificateDetailsTable_records']))
               {
                 $d=$_SESSION['EmployeeCertificateDetailsTable_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
               }
              $html = $this->renderPartial('/employeeCertificateDetailsTable/empcertificateGeneratePdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('EmployeeCertificateDetails Report','EmployeeCertificateDetailsTable.pdf',$html);
	}
	public function actionCastMasterGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
              if(isset($session['CastMaster_records']))
               {
                $d=$_SESSION['CastMaster_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              
		
		Yii::app()->request->sendFile("CastMaster.xls",
			$this->renderPartial('/castMaster/exportGridtoReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionCastMasterGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');	
             if(isset($session['CastMaster_records']))
               {
                $d=$_SESSION['CastMaster_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              
		$html = $this->renderPartial('/castMaster/exportGridtoReport', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Cast Report','CastMaster.pdf',$html);
	}
	public function actionTrustMasterGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
              if(isset($session['TrustMaster_records']))
               {
                $d=$_SESSION['TrustMaster_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              
		
		Yii::app()->request->sendFile("TrustMaster.xls",
			$this->renderPartial('/trustMaster/exportGridtoReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionTrustMasterGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');	
             if(isset($session['TrustMaster_records']))
               {
                $d=$_SESSION['TrustMaster_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              
		$html = $this->renderPartial('/trustMaster/exportGridtoReport', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Trust Report','TrustMaster.pdf',$html);

	}
	public function actionTrustMemberDetailsGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
              if(isset($session['TrustMemberDetails_records']))
               {
                $d=$_SESSION['TrustMemberDetails_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              
		
		Yii::app()->request->sendFile("TrustMemberDetails.xls",
			$this->renderPartial('/trustMemberDetails/exportGridtoReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionTrustMemberDetailsGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');	
             if(isset($session['TrustMemberDetails_records']))
               {
                $d=$_SESSION['TrustMemberDetails_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              


		$html = $this->renderPartial('/trustMemberDetails/exportGridtoReport', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Trust Members Report','TrustMemberDetails.pdf',$html);

	}
	  public function actionEventMasterGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
              if(isset($session['EventMaster_records']))
               {
                $d=$_SESSION['EventMaster_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              
		
		Yii::app()->request->sendFile("EventMaster.xls",
			$this->renderPartial('/eventMaster/exportGridtoReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionEventMasterGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');	
             if(isset($session['EventMaster_records']))
               {
                $d=$_SESSION['EventMaster_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              


		$html = $this->renderPartial('/eventMaster/exportGridtoReport', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Events Report','EventMaster.pdf',$html);

	}
	  public function actionSubEventGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
              if(isset($session['SubEvent_records']))
               {
                $d=$_SESSION['SubEvent_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              
		
		Yii::app()->request->sendFile("SubEvent.xls",
			$this->renderPartial('/subEvent/exportGridtoReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionSubEventGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');	
             if(isset($session['SubEvent_records']))
               {
                $d=$_SESSION['SubEvent_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              


		$html = $this->renderPartial('/subEvent/exportGridtoReport', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Sub Events Report','SubEventMaster.pdf',$html);
	}
	public function actionEventParticipantsGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
              if(isset($session['EventParticipants_records']))
               {
                $d=$_SESSION['EventParticipants_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              
		
		Yii::app()->request->sendFile("EventParticipants.xls",
			$this->renderPartial('/eventParticipants/exportGridtoReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionEventParticipantsGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');	
             if(isset($session['EventParticipants_records']))
               {
                $d=$_SESSION['EventParticipants_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              


		$html = $this->renderPartial('/eventParticipants/exportGridtoReport', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Event Participants Report','EventParticipants.pdf',$html);
	}
	public function actionCourseExportToPdf() 
	{
             	if(isset($_SESSION['course_records']))
               	{
		 	$d = $_SESSION['course_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/courseMaster/course_export_pdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Course Report','Course.pdf',$html);
		
	}
	public function actionCourseExportToExcel()
	{
		$this->toExcel($_SESSION['course_records'],
		array(
		//'id',
		'course_name',
		'relCat.qualification_type_name::Category Name',
		'course_level',
		'course_completion_hours',
		'course_code',
		'course_cost',
		'course_desc',
		'Rel_user.user_organization_email_id::Created By',
		),
		'Course',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}	    

	protected function exporttopdf($title,$filename,$html)
	{
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');

		 ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle($title);
		$pdf->SetSubject($title);
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, $title, '');
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
		$pdf->Output($filename, "I");
	}
	public function actionScheduleTimingGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
              if(isset($session['ScheduleTiming_records']))
               {
                $d=$_SESSION['ScheduleTiming_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              
		
		Yii::app()->request->sendFile("ScheduleTiming.xls",
			$this->renderPartial('excelReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionScheduleTimingGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');	
             if(isset($session['ScheduleTiming_records']))
               {
                $d=$_SESSION['ScheduleTiming_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              


		$html = $this->renderPartial('exportGridtoReport', array(
			'model'=>$model
		), true);
		$this->exporttopdf('ScheduleTiming Report','ScheduleTiming.pdf',$html);		
	}
	public function actionElectivesubjectGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
              if(isset($session['ElectiveSubjectDetails_records']))
               {
                $d=$_SESSION['ElectiveSubjectDetails_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              
		
		Yii::app()->request->sendFile("ElectiveSubjectDetails.xls",
			$this->renderPartial('/electiveSubjectDetails/exportelectivesubject', array(
				'model'=>$model
			), true)
		);
	}
        public function actionElectivesubjectGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');	
             if(isset($session['ElectiveSubjectDetails_records']))
               {
                $d=$_SESSION['ElectiveSubjectDetails_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              


		$html = $this->renderPartial('/electiveSubjectDetails/exportelectivesubject', array(
			'model'=>$model
		), true);
		
		//die($html);
		ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('ElectiveSubjectDetails Report');
		$pdf->SetSubject('ElectiveSubjectDetails Report');
		//$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Elective Subject Report", '');
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 0);
		$pdf->SetFont('dejavusans', '', 7);
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("ElectiveSubjectDetails.pdf", "I");
	}
}
