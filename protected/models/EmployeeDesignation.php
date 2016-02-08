<?php

/**
 * This is the model class for table "employee_designation".
 * @package EduSec.models
 */
class EmployeeDesignation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EmployeeDesignation the static model class
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
		return 'employee_designation';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'employee_designation_name'
	        );
  	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_designation_name,employee_designation_created_by, employee_designation_created_date,employee_designation_level', 'required','message'=>''),
			array('employee_designation_level, employee_designation_created_by', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('employee_designation_name', 'length', 'max'=>60),
			//array('employee_designation_name','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z&. ]+([ -][a-zA-Z. ]+)*$/','message'=>''),
			array('employee_designation_name', 'unique', 'message'=>'Already Exists.'),
			array('employee_designation_level','CRegularExpressionValidator','pattern'=>'/^([0-9]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('employee_designation_id, employee_designation_name, employee_designation_created_by, employee_designation_created_date,employee_designation_level', 'safe', 'on'=>'search'),
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
			'Rel_user' => array(self::BELONGS_TO, 'User','employee_designation_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_designation_id' => 'Employee Designation',
			'employee_designation_name' => 'Designation',
			'employee_designation_created_by' => 'Created By',
			'employee_designation_created_date' => 'Creation Date',
			'employee_designation_level' => 'Designation Level',
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
		$criteria->compare('employee_designation_id',$this->employee_designation_id);
		$criteria->compare('employee_designation_name',$this->employee_designation_name,true);
		$criteria->compare('employee_designation_level',$this->employee_designation_level,true);
		$criteria->compare('employee_designation_created_by',$this->employee_designation_created_by);
		$criteria->compare('employee_designation_created_date',$this->employee_designation_created_date,true);

		$designation_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'employee_designation_level ASC',
				),
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData']=$designation_data;
		return $designation_data;
	}
	
	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'employee_designation_name::Designation Name',		
			'employee_designation_level',
			'Rel_user.user_organization_email_id:Created By',
		),
		'filename'=>'Employee_Designation-List', 'pdfFile'=>'/employeeDesignation/employeeDesignationGeneratePdf');
              return $data;
        }

	private static $_items=array();
	
	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'employee_designation_id', 'employee_designation_name');
	    return self::$_items;
	}
}
