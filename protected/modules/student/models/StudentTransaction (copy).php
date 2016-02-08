<?php

/**
 * This is the model class for table "student_transaction".
 * @package EduSec.models
 */

class StudentTransaction extends CActiveRecord
{
	public $student_first_name, $student_roll_no,$student_no, $student_middle_name,$student_last_name,  $user_organization_email_id, $student_docs_desc,$student_docs_path,$doc_category_id,$student_docs_trans,$student_docs_trans_user_id, $cat_id, $title,$student_docs_submit_date,$student_dtod_regular_status, $student_mobile_no, $student_email_id_1,$assignment_trans_creation_date,$assignment_trans_document,$academic_terms_period_name,$student_academic_terms_name,$course_name;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('student_transaction_student_photos_id,student_transaction_batch_id', 'required','message'=>''),
			
			array('student_transaction_detain_student_flag, student_transaction_user_id, student_transaction_student_id, student_transaction_student_address_id, student_transaction_nationality_id,  student_transaction_languages_known_id, student_transaction_student_photos_id, student_transaction_batch_id, student_transaction_parent_id,academic_term_period_id,academic_term_id', 'numerical', 'integerOnly'=>true,'message'=>''),

			array('assignment_trans_assignment_id, assignment_submit_date, assignment_creation_date, assignment_trans_creation_date, assignment_trans_document, student_first_name,student_last_name,student_roll_no', 'safe','on'=>'assignmentsearch'),
			array('student_transaction_id, student_transaction_user_id, student_transaction_student_id, student_transaction_student_address_id, student_transaction_nationality_id, student_transaction_languages_known_id, student_transaction_student_photos_id, student_transaction_batch_id, student_first_name, student_middle_name,title, student_last_name, user_organization_email_id, student_roll_no, student_mobile_no, student_email_id_1', 'safe', 'on'=>'search, takeFees, leftStudentSearch,hostelsearch,smssearch,transportsearch,resetloginstudentsearch,feessearch,allstudent, multipleDivBatchAssign'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Rel_Stud_Info' => array(self::BELONGS_TO, 'StudentInfo', 'student_transaction_student_id'),
			'Rel_Batch' => array(self::BELONGS_TO, 'Batch', 'student_transaction_batch_id'),
			'Rel_Nationality' => array(self::BELONGS_TO, 'Nationality', 'student_transaction_nationality_id'),
			'Rel_Photos' => array(self::BELONGS_TO, 'StudentPhotos','student_transaction_student_photos_id'),
			'Rel_Student_Address' => array(self::BELONGS_TO, 'StudentAddress', 'student_transaction_student_address_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User', 'student_transaction_user_id'),
			'Rel_language' => array(self::BELONGS_TO, 'LanguagesKnown', 'student_transaction_languages_known_id'),		
			'Rel_parent'=>array(self::BELONGS_TO, 'ParentLogin', 'student_transaction_parent_id'),
			'Rel_languages_known' => array(self::BELONGS_TO, 'LanguagesKnown','student_transaction_languages_known_id'),	
			'docs_trans' => array(self::BELONGS_TO, 'StudentDocsTrans','', 'on'=>'student_transaction_id = student_docs_trans_user_id'),	
			'docs' => array(self::BELONGS_TO, 'StudentDocs','','on'=>'student_docs_id= docs_trans.student_docs_trans_stud_docs_id'),
			'Rel_year'=>array(self::BELONGS_TO,'Year','student_transaction_batch_year'),
			'Rel_student_academic_terms_period_name' => array(self::BELONGS_TO, 'AcademicTermPeriod', 'academic_term_period_id'),	
			'Rel_student_academic_terms_name' => array(self::BELONGS_TO,'AcademicTerm', 'academic_term_id'),
			'Rel_course' => array(self::BELONGS_TO, 'Course','course_id'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_transaction_id' => 'Student Transaction',
			'student_transaction_user_id' => 'Student Transaction User',
			'student_transaction_student_id' => 'Student Transaction Student',
			'student_transaction_student_address_id' => 'Student Address',
			'student_transaction_nationality_id' => 'Nationality',
			'student_transaction_languages_known_id' => 'Languages Known',
			'student_transaction_student_photos_id' => 'Student Photos',
			'student_transaction_batch_id' => 'Batch',
			'assignment_trans_creation_date'=>'Submit Date',
			'assignment_trans_document'=>'Document',
			'student_roll_no'=>'Student Unique ID',
			'academic_term_period_id'=>'Academic Year',
			'academic_term_id'=> 'Semester',
			'course_id' => 'Course',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with = array('Rel_Stud_Info','Rel_language','Rel_user');
		$criteria->compare('Rel_user.user_organization_email_id',$this->user_organization_email_id,true);

		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_no',$this->student_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
		$criteria->compare('Rel_Stud_Info.student_mobile_no',$this->student_mobile_no,true);
		$criteria->compare('Rel_Stud_Info.student_email_id_1',$this->student_email_id_1,true);
		
		$stud_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'student_transaction_id DESC',
				),
			));
		
		$_SESSION['Student_records']=$stud_data;
		return $stud_data;
	} 

	/** Display student list to take fees
	**/
	public function takeFees()
	{
		$criteria=new CDbCriteria;

		$criteria->with = array('Rel_Stud_Info', 'Rel_language','Rel_user');
		
		$criteria->compare('Rel_user.user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_no',$this->student_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
		$criteria->compare('Rel_Stud_Info.student_mobile_no',$this->student_mobile_no,true);
		$criteria->compare('Rel_Stud_Info.student_email_id_1',$this->student_email_id_1,true);

		$stud_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'student_transaction_id DESC',
				),
			));
		
		$_SESSION['Student_records']=$stud_data;
		return $stud_data;
	} 

	/** Display student list for assign fees structure.
	*/
	public function feessearch()
	{

		$criteria=new CDbCriteria;

		$criteria->with = array('Rel_Stud_Info', 'Rel_language','Rel_user');
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_no',$this->student_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
	
		$stud_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
		
		$_SESSION['Student_records']=$stud_data;
		return $stud_data;
	} 
	

	public function resetloginstudentsearch()
	{
		$criteria=new CDbCriteria;

		$criteria->with = array('Rel_Stud_Info',  'Rel_language','Rel_user');
		
		$criteria->compare('Rel_user.user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_no',$this->student_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
	
		$stud_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'student_transaction_id DESC',
				),
			));
		
		$_SESSION['Student_records']=$stud_data;
		return $stud_data;
	} 

	public function allstudent()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		
	
		$criteria=new CDbCriteria;

		$criteria->with = array('Rel_Stud_Info', 'Rel_language','Rel_user');
		$criteria->compare('student_transaction_batch_id',$this->student_transaction_batch_id);	
		$criteria->compare('Rel_user.user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_no',$this->student_no,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);

		$stud_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'student_transaction_id DESC',
				),
			));
		$_SESSION['Student_records']=$stud_data;
		return $stud_data;
	} 



	public function smssearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('Rel_Stud_Info', 'Rel_language','Rel_user');

		$criteria->compare('student_transaction_batch_id',$this->student_transaction_batch_id);
		$criteria->compare('Rel_user.user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
		$criteria->compare('Rel_Stud_Info.student_mobile_no',$this->student_mobile_no,true);
		$criteria->compare('Rel_Stud_Info.student_email_id_1',$this->student_email_id_1,true);

		$stud_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
		
		return $stud_data;
	} 

	
	public function leftStudentSearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('Rel_Stud_Info', 'Rel_language','Rel_user');

		$criteria->compare('student_transaction_nationality_id',$this->student_transaction_nationality_id);
		$criteria->compare('student_transaction_division_id',$this->student_transaction_division_id);
		$criteria->compare('student_transaction_batch_id',$this->student_transaction_batch_id);

		$criteria->compare('Rel_user.user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_no',$this->student_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
		

		$left = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'student_transaction_id DESC',
				),
		));
		 $_SESSION['left'] = $left;
		return $left;
	}
		
	public function findcity($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$name = City::model()->findByPk($id);
		return $name->city_name;
		
	}
	public function findcountry($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$name = Country::model()->findByPk($id);
		return $name->name;
		
	}

	public function findstate($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$name = State::model()->findByPk($id);
		return $name->state_name;
		
	}
	public function beforeDelete()
	{
		$id = $this->student_transaction_id;
		$att_check = Attendence::model()->findAll(array('condition'=>'st_id='.$id));

		if(!empty($att_check))
		{
			Yii::app()->user->setFlash('error',"You can not delete this record because it is used in another table.");
			return false;
		}	
        	else
		{				
			Yii::app()->user->setFlash('success',"Deleted Sucessfully");
			return true;
		}


    	}
	public function newsearch($cat_id)
	{

		$criteria=new CDbCriteria;
		$criteria->compare('student_transaction_id',$this->student_transaction_id);
		$criteria->compare('student_first_name',$this->student_first_name,true);
		$criteria->select = 'student_transaction_id, student_roll_no, student_first_name, student_docs.title, student_docs_submit_date,student_docs_desc,student_docs_path,doc_category_id';
		$criteria->alias = 'st';
		$criteria->join='INNER JOIN student_docs_trans ON student_docs_trans.student_docs_trans_user_id =st.student_transaction_id INNER JOIN student_info ON student_info.student_id =st.student_transaction_student_id INNER JOIN student_docs ON student_docs.student_docs_id = student_docs_trans.student_docs_trans_stud_docs_id';
		$query = '';
		$criteria->condition = $query."student_docs.doc_category_id=".$cat_id;

		$stu_data = new CActiveDataProvider(get_class($this), array(
		'criteria'=>$criteria,
		'sort'=>array(
		'defaultOrder'=>'student_roll_no',
		),
		));

		return $stu_data;
	}
	public function assignmentsearch($assignment,$submitflag)
	{
		
		$query = '';
		$criteria=new CDbCriteria;
		$criteria->compare('student_transaction_id',$this->student_transaction_id);
		if($submitflag==1){
		$criteria->alias = 'st';
		$criteria->select = 'student_transaction_id,student_roll_no,student_last_name,student_first_name,assignment_trans_document,assignment_trans_creation_date';
		$criteria->join='INNER JOIN assignment_trans ON assignment_trans_student_id=st.student_transaction_id INNER JOIN student_info ON student_info.student_id =st.student_transaction_student_id';
		$criteria->condition = $query."assignment_trans.assignment_trans_assignment_id=".$assignment;
		$criteria->compare('student_roll_no',$this->student_roll_no,true);
		$criteria->compare('student_last_name',$this->student_last_name,true);
		$criteria->compare('student_first_name',$this->student_first_name,true);
		$criteria->compare('assignment_trans_creation_date',$this->dbDateSearch($this->assignment_trans_creation_date),true);
		$stu_data = new CActiveDataProvider(get_class($this), array(
		'criteria'=>$criteria,
		'sort'=>array(
		'defaultOrder'=>'student_roll_no',
		),
		));
		}
		else
		{
			$criteria->with = array('Rel_Stud_Info');
			$criteria->select = 'student_transaction_id';
			$criteria->distinct = true;
			$criteria->alias = 'st';
			$criteria->condition = $query." student_transaction_detain_student_flag=".Studentstatusmaster::model()->findByAttributes(array('status_name'=>'Regular'))->id." AND ".Studentstatusmaster::model()->findByAttributes(array('status_name'=>'Rejoin'))->id.' and student_transaction_id NOT IN(select assignment_trans_student_id from  assignment_trans where assignment_trans.assignment_trans_assignment_id='.$assignment.')';	
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);	
		$stu_data = new CActiveDataProvider(get_class($this), array(
		'criteria'=>$criteria,
		));
		}
	

		return $stu_data;
	}

	public function hostelsearch()
	{
		$criteria=new CDbCriteria;

		$criteria->with = array('Rel_Stud_Info','Rel_user');
		$criteria->compare('student_transaction_batch_id',$this->student_transaction_batch_id);
		$criteria->compare('Rel_user.user_organization_email_id',$this->user_organization_email_id,true);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
		$criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);

		$stud_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['Student_records']=$stud_data;
		return $stud_data;
	} 
	public function transportsearch()
   	{
        $criteria=new CDbCriteria;

        $criteria->with = array('Rel_Stud_Info','Rel_user');       

        $transportregisterstudent = TransportStudentRegistration::model()->findAll();

        $data = array();
        foreach($transportregisterstudent as $list)
        {
            $data[] = $list['transport_student_transaction_id'];
        }
   	
        $criteria->addNotInCondition('student_transaction_id',$data);       
        $criteria->compare('student_transaction_batch_id',$this->student_transaction_batch_id);
        $criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
        $criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
        $criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
        $criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);

        $transportstud_data = new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
        $_SESSION['transportStudent_records']=$transportstud_data;
        return $transportstud_data;
    }

	public function batchwisestudent($batch)
	{
	    $criteria=new CDbCriteria;
	    $criteria->with = array('Rel_Stud_Info','Rel_user');       
	    $criteria->compare('student_transaction_batch_id',$batch);
            $criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
            $criteria->compare('Rel_Stud_Info.student_roll_no',$this->student_roll_no,true);
            $criteria->compare('Rel_Stud_Info.student_middle_name',$this->student_middle_name,true);
            $criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
	    $stud_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['exportData']=$stud_data;
		return $stud_data;
	}
	private function dbDateSearch($value)
	{
		if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
		return date("Y-m-d",strtotime($matches[0]));
	    else
		return $value;
	}
	
	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {

		if(isset($_REQUEST['contact']))
		{
			  $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'Rel_Stud_Info.student_roll_no',
			'Rel_Stud_Info.student_first_name',
			'Rel_Stud_Info.student_last_name',
			'Rel_Stud_Info.student_mobile_no::Mobile Number',
			'Rel_Stud_Info.student_guardian_mobile::Guardian Mobile',
        		),
		'filename'=>'Student Contact details', 'pdfFile'=>'student.views.studentTransaction.StudentTransactionExportPdf');
		}
		else if(isset($_REQUEST['batchwisestudent']))
		{
			 $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'Rel_Stud_Info.student_roll_no',
			'Rel_Stud_Info.student_first_name',
			'Rel_Stud_Info.student_last_name',
			),
		'filename'=>'Student Details', 'pdfFile'=>'student.views.studentTransaction.StudentTransactionExportPdf');
		}
		else{
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'Rel_Stud_Info.title',
			'Rel_Stud_Info.student_last_name',
			'Rel_Stud_Info.student_first_name',
			'Rel_Stud_Info.student_guardian_name::Guardian Name',
			'Rel_Stud_Info.student_adm_date',
			'Rel_Stud_Info.student_gender',
			'Rel_Stud_Info.student_mobile_no::Mobile Number',
			'Rel_Stud_Info.student_guardian_mobile::Guardian Mobile',
			'Rel_Stud_Info.student_birthplace',
			'Rel_Quota.quota_name::Quota',
			'Rel_Stud_Info.student_dob',
			'Rel_Nationality.nationality_name',
			'Rel_Stud_Info.student_guardian_relation::Guardian Relation',
			'Rel_Stud_Info.student_guardian_qualification::Guardian Qualification',
			
			'Rel_Stud_Info.student_guardian_occupation::Guardian Occupation',
			'Rel_Stud_Info.student_guardian_income::Guardian Income',
			'Rel_Stud_Info.student_guardian_occupation_address::Guardian Occupation Address',
			'Rel_Stud_Info.student_guardian_home_address::Guardian Home Address',
			'Rel_Stud_Info.Rel_gardian_city.city_name::GuardianCity',
			'Rel_Stud_Info.student_guardian_city_pin',
			'Rel_Stud_Info.student_guardian_phoneno',
			'Rel_Stud_Info.student_email_id_1',
			'Rel_Stud_Info.student_email_id_2',
			'Rel_Stud_Info.student_bloodgroup',
			'Rel_Batch.batch_name::Batch',
			'Rel_language.Rel_Langs1.languages_name',
			'Rel_language.Rel_Langs2.languages_name',
			'Rel_language.Rel_Langs3.languages_name',
			'Rel_language.Rel_Langs4.languages_name',
			'Rel_Student_Address.student_address_c_line1::Current Address Line1',
			'Rel_Student_Address.student_address_c_line2::Current Address Line2',
			'Rel_Student_Address.Rel_c_city.city_name::Current Address City',
			'Rel_Student_Address.student_address_c_pin::Current Address City Pin ',
			'Rel_Student_Address.Rel_c_state.state_name::Current Address State',
			'Rel_Student_Address.Rel_c_country.name::Current Address Country',
			'Rel_Student_Address.student_address_p_line1::Permanent Address Line1',
			'Rel_Student_Address.student_address_p_line2::Permanent Address Line2',
			'Rel_Student_Address.Rel_p_city.city_name::Permanent Address City',
			'Rel_Student_Address.student_address_p_pin::Permanent Address pincode',
			'Rel_Student_Address.Rel_p_state.state_name::Permanent Address State',
			'Rel_Student_Address.Rel_p_country.name::Permanent Address Country',
			'Rel_Student_Address.student_address_phone',
			'Rel_Stud_Info.student_mother_name',
			'Rel_Stud_Info.student_roll_no',
			'Rel_Stud_Info.student_gr_no',
			'Rel_Student_Address.student_address_mobile',
        		),
		'filename'=>'Student-List', 'pdfFile'=>'student.views.studentTransaction.StudentTransactionExportPdf');
		}
              return $data;
        }
}
