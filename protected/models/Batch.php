<?php

/**
 * This is the model class for table "batch".
 * @package EduSec.models
 */
class Batch extends CActiveRecord
{
	public $course_name,$academic_term_name,$batch_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Batch the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'batch_name'
	        );
  	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'batch';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('batch_name,batch_created_by, batch_creation_date,batch_start_date,course_id,batch_fees,batch_end_date', 'required','message'=>''),

			array('batch_created_by,batch_intake', 'numerical', 'integerOnly'=>true),
			array('batch_name', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('batch_id, batch_name,batch_created_by, batch_creation_date, batch_intake, batch_start_date,batch_end_date,course_id,course_name,academic_term_id,academic_term_name', 'safe', 'on'=>'search'),
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
			'Rel_user' => array(self::BELONGS_TO, 'User','batch_created_by'),
			'Rel_course' => array(self::BELONGS_TO, 'Course','course_id'),
			'Rel_academicTerm'=>array(self::BELONGS_TO,'AcademicTerm','academic_term_id'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'batch_id' => 'Batch',
			'batch_name' => 'Batch',
			'batch_created_by' => 'Created By',
			'batch_creation_date' => 'Creation Date',
			'batch_intake'=>'Intake',
			'batch_start_date'=>'Start Date',
			'batch_end_date'=>'End Date',
			'course_id'=>'Course',
			//'academic_term_id'=>'Semester',
			'batch_fees'=>'Fees',
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
		$criteria->with=array('Rel_course','Rel_academicTerm');
		$criteria->compare('batch_id',$this->batch_id);
		$criteria->compare('batch_created_by',$this->batch_created_by);
		$criteria->compare('batch_creation_date',$this->batch_creation_date,true);
		$criteria->compare('batch_start_date',$this->batch_start_date);
		$criteria->compare('batch_end_date',$this->batch_end_date);
		$criteria->compare('Rel_course.course_name',$this->course_name);
		$criteria->compare('batch_fees',$this->batch_fees);
		$criteria->compare('Rel_academicTerm.academic_term_name',$this->academic_term_id);

		$batch_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData']=$batch_data;
		return $batch_data;
	}
	public function search1($id)
	{
		
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		//$criteria->with=array('Rel_course','Rel_academicTerm');
		$criteria->compare('batch_id',$this->batch_id);
		$criteria->compare('batch_created_by',$this->batch_created_by);
		$criteria->compare('batch_creation_date',$this->batch_creation_date,true);
		$criteria->compare('batch_start_date',$this->batch_start_date);
		$criteria->compare('batch_end_date',$this->batch_end_date);
		$criteria->compare('Rel_course.course_name',$this->course_name);
		$criteria->compare('batch_fees',$this->batch_fees);
		$criteria->compare('Rel_academicTerm.academic_term_name',$this->academic_term_id);
		$criteria->select = 'batch_id,batch_name,batch_fees,course_name';
		$criteria->alias = 'bt';
		$criteria->join='JOIN course ON course.course_id = bt.course_id';
		$query = '';
		$criteria->condition = $query."bt.course_id=".$id;
		$batch_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		return $batch_data;
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function courseWiseBatch($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->alias = 't';
		$criteria->condition = 't.course_id = :courseId';
	        $criteria->params = array(':courseId' => $id);
		$criteria->with=array('Rel_course');
		$batch_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData']=$batch_data;
		return $batch_data;
	}
	
	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$batch=$this->batch_name;
			$course_id=$this->course_id;
			$batch_name=Yii::app()->db->createCommand()
				    ->select('batch_name')
				    ->from('batch')
				    ->where('batch_name="'.$batch.'" AND course_id='.$course_id)
			    	    ->queryAll();
			
			if($batch_name)
			{ 
				$this->addError('batch_name',"<b style='position:absolute;color:red;margin-left:274px'>Already Exists</b>");	
				 return false;	
			}
			else
			{
			     if(!empty($this->batch_start_date) && !empty($this->batch_end_date)) {
				if($this->batch_start_date < $this->batch_end_date)
				    return true;
				else
				{
				    $this->addError('batch_start_date',"<b style='position:absolute;color:red;margin-left:274px'>Start Date must be less than End Date</b>");       
				    return false;
				}
			     }
			    return true;
			} 
		}
		else
		{
			$batch=$this->batch_name;
			$course_id=$this->course_id;
			$batch_name=Yii::app()->db->createCommand()
				    ->select('batch_name')
				    ->from('batch')
				    ->where('batch_name="'.$batch.'" AND course_id='.$course_id.' and batch_id<>'.$_REQUEST['id'])
			    	    ->queryAll();
			
			if($batch_name)
			  {
			 	$this->addError('batch_name',"<b style='position:absolute;color:red;margin-left:274px'>Already Exists</b>");	
				 return false;	
			  }
			else
		          {
				if($this->batch_start_date < $this->batch_end_date)
				    return true;
				else
				{
			    $this->addError('batch_start_date',"<b style='position:absolute;color:red;margin-left:274px'>Start Date must be less than End Date</b>");       
				    return false;
				}
			  }
		}	
			       
	}
	
	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'batch_name',
			'Rel_course.course_name',
			'batch_fees',
			'batch_intake',
			'batch_start_date',
			'batch_end_date',
			'Rel_user.user_organization_email_id:Created By',
			),
		'filename'=>'Batch-List', 'pdfFile'=>'/batch/batchGeneratePdf');
              return $data;
        }
	

	private static $_items=array();
	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'batch_id', 'batch_name');
	    return self::$_items;
	}
	public function getConcate()
		{
			return $this->batch_name." (".Course::model()->findByPk($this->course_id)->course_name.")(Sem - ".$this->Rel_academicTerm->academic_term_name.")";
		} 
 }
