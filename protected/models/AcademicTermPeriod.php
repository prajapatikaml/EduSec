<?php

/**
 * This is the model class for table "academic_term_period".
 *
 * The followings are the available columns in table 'academic_term_period':
 * @property integer $academic_terms_period_id
 * @property string $academic_terms_period_name
 * @property integer $academic_term_period
 * @property string $academic_terms_period_start_date
 * @property string $academic_terms_period_end_date
 * @property integer $academic_terms_period_organization_id
 * @property integer $academic_terms_period_created_by
 * @property string $academic_terms_period_creation_date
 */
class AcademicTermPeriod extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AcademicTermPeriod the static model class
	 */

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function defaultScope() 
	{
       		return array(
           		'order' => 'academic_term_period'
	        );
  	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'academic_term_period';
	}

	/* * @return array validation rules for model attributes.

	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('academic_term_period', 'required','message'=>''),
			array('academic_terms_period_created_by', 'numerical', 'integerOnly'=>true),
			array('academic_terms_period_name', 'length', 'max'=>60),
array('academic_term_period','CRegularExpressionValidator','pattern'=>'/^(([0-9][0-9][0-9][0-9])\\-([0-9][0-9][0-9][0-9]))+$|(([0-9][0-9][0-9][0-9])\\-([0-9][0-9]))+$/','message'=>''),

			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('academic_terms_period_id, academic_terms_period_name, academic_term_period, academic_terms_period_start_date, academic_terms_period_end_date, academic_terms_period_created_by, academic_terms_period_creation_date', 'safe', 'on'=>'search'),
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
			//'Rel_org'=>array(self::BELONGS_TO,'Organization','academic_terms_period_organization_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User','academic_terms_period_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'academic_terms_period_id' => 'Academic Terms Period',
			'academic_terms_period_name' => 'Period Name',
			'academic_term_period' => 'Academic Year',
			'academic_terms_period_start_date' => 'Period Start Date',
			'academic_terms_period_end_date' => 'Period End Date',
			//'academic_terms_period_organization_id' => 'Period Organization',
			'academic_terms_period_created_by' => 'Created By',
			'academic_terms_period_creation_date' => 'Creation Date',
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
		//$criteria->condition = 'academic_terms_period_organization_id = :academic_terms_period_org_id';
	        //$criteria->params = array(':academic_terms_period_org_id' => Yii::app()->user->getState('org_id'));
		$criteria->compare('academic_terms_period_id',$this->academic_terms_period_id);
		$criteria->compare('academic_terms_period_name',$this->academic_terms_period_name,true);
		$criteria->compare('academic_term_period',$this->academic_term_period);
		$criteria->compare('academic_terms_period_start_date',$this->academic_terms_period_start_date,true);
		$criteria->compare('academic_terms_period_end_date',$this->academic_terms_period_end_date,true);
		//$criteria->compare('academic_terms_period_organization_id',$this->academic_terms_period_organization_id);
		$criteria->compare('academic_terms_period_created_by',$this->academic_terms_period_created_by);
		$criteria->compare('academic_terms_period_creation_date',$this->academic_terms_period_creation_date,true);

		$academic_term_period_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		 $_SESSION['exportData']=$academic_term_period_data;
		return $academic_term_period_data;
	}
	/*
	public function beforeSave()
	{
		if($this->academic_terms_period_start_date<$this->academic_terms_period_end_date)
		    return true;
		else
		{
		    $this->addError("academic","Start date must be less than End date");       
		    return false;
		}
	       
	}*/

		private static $_items=array();

		public static function items()
		{
		    if(isset(self::$_items))
		        self::loadItems();
		    return self::$_items;
		}

	    	public static function item($code)
	    	{
			if(!isset(self::$_items))
		    	self::loadItems();
			return isset(self::$_items[$code]) ? self::$_items[$code] : false;
	    	}

	    	private static function loadItems()
	    	{
			self::$_items=array();
			$models=self::model()->findAll();
			foreach($models as $model)
		   // self::$_items[$model->academic_terms_period_id]=$model->academic_terms_period_name."-".$model->academic_term_period;
			self::$_items[$model->academic_terms_period_id]=$model->academic_term_period;
	    	}

		/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
		
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'academic_term_period',
			'Rel_user.user_organization_email_id:Created By',
        		),
		'filename'=>'academic_year-List', 'pdfFile'=>'/academicTermPeriod/academicTermPeriodGeneratePdf');
              return $data;
        }

		
	/* before save for uniqueness of AcademicTermPeriod */

	/*public function checkacdmperiod()
		{
			if($this->isNewRecord)
			{
				$acdmname=$this->academic_term_period;
				$acdm_period_name=Yii::app()->db->createCommand()
					    ->select('academic_term_period')
					    ->from('academic_term_period')
					    ->where('academic_terms_period_organization_id='.Yii::app()->user->getState('org_id').' and academic_term_period="'.$acdmname.'"')
				    	    ->queryAll();
				
				if($acdm_period_name)
				{
					$this->addError('academic_term_period',"Already Exists.");	
					 return false;	
				}
				else
				{
					return true;
				}
			}
			else
			{
				$acdmid=$_REQUEST['id'];
				$acdmname=$this->academic_term_period;
				$orgid=Yii::app()->user->getState('org_id');
				$acdm_period_name=Yii::app()->db->createCommand()
					    ->select('academic_term_period')
					    ->from('academic_term_period')
					    ->where('academic_terms_period_id <>'.$acdmid.' and academic_terms_period_organization_id='.$orgid.' and academic_term_period="'.$acdmname.'"')
				    	    ->queryAll();
				
				if($acdm_period_name)
				  {
				 	$this->addError('academic_term_period',"Already Exists.");	
					 return false;	
				  }
				else
			          {
					return true;
				  }
			}	
		}*/

}
