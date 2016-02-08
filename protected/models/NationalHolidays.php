<?php

/**
 * This is the model class for table "national_holidays".
* @package EduSec.HRMS.models
*/
class NationalHolidays extends CActiveRecord
{
	public $organization_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NationalHolidays the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'national_holidays';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('national_holiday_date, national_holiday_name, national_holiday_by_user_id, national_holiday_by_date', 'required','message'=>''),
			array('national_holiday_by_user_id', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('national_holiday_name', 'length', 'max'=>100),
			//array('national_holiday_name','CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z1-9- ]+)$/','message'=>''),
			array('national_holiday_remarks', 'length', 'max'=>200),
			array('national_holiday_name', 'unique','message'=>'Already Exists.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('national_holiday_id, national_holiday_date, national_holiday_name, national_holiday_remarks, national_holiday_by_user_id, national_holiday_by_date,organization_name', 'safe', 'on'=>'search'),
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
			'Rel_user' => array(self::BELONGS_TO, 'User', 'national_holiday_by_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'national_holiday_id' => 'National Holiday',
			'national_holiday_date' => 'Date',
			'national_holiday_name' => 'Name',
			'national_holiday_remarks' => 'Remarks',
			'national_holiday_by_user_id' => 'Created By',
			'national_holiday_by_date' => 'Creation Date',
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
		$criteria->compare('national_holiday_id',$this->national_holiday_id);
		$criteria->compare('national_holiday_date',$this->dbDateSearch($this->national_holiday_date),true);
		$criteria->compare('national_holiday_name',$this->national_holiday_name,true);
		$criteria->compare('national_holiday_remarks',$this->national_holiday_remarks,true);
		$criteria->compare('national_holiday_by_user_id',$this->national_holiday_by_user_id);
		$criteria->compare('national_holiday_by_date',$this->national_holiday_by_date,true);

		$nationalityholidays_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $nationalityholidays_data;
		return $nationalityholidays_data;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'national_holiday_date',
			'national_holiday_name',
			'national_holiday_remarks',
			'Rel_user.user_organization_email_id::Created By',	
			),
		'filename'=>'National Holidays-List', 'pdfFile'=>'/nationalHolidays/nationalholidaysmasterExportpdf');
              return $data;
        }

	/**
	* This method is to check wheather on this day holiday is already declared or not.
	*/
	public function chkdate()
	{
	    if($this->isNewRecord)
	    {
		$form_date = date('Y-m-d',strtotime($this->national_holiday_date));
		$all_date = NationalHolidays::model()->findByAttributes(array('national_holiday_date'=>$form_date));
		if($all_date)
		{
		   $this->addErrors(array('national_holiday_name'=>"On this date, Holiday is already assign.",'national_holiday_date'=>"On this date, Holiday is already assign."));	
	 	   return false;
		}
		else
		   return true;
	     }
	     else
	     {
		$nid = $this->national_holiday_id;
		$form_date = date('Y-m-d',strtotime($this->national_holiday_date));
		$all_date = NationalHolidays::model()->findByAttributes(array(),
		    $condition = 'national_holiday_date=:national_holiday_date and national_holiday_id<>:national_holiday_id',
		    $params = array(':national_holiday_date'=>$form_date,
			            ':national_holiday_id'=>$nid
				  )
		);
		   
		if($all_date)
		{
			$this->addError('national_holiday_date',"On this date, Holiday is already assign.");	
			return false;
		}
		else
			return true;
	     }
	}

	/**
	* Datewise search by date picker from gridView
	* @return date
	*/
	private function dbDateSearch($value)
        {
                if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
                return date("Y-m-d",strtotime($matches[0]));
            else
                return $value;
        }
}
