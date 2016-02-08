<?php

/**
 * This is the model class for table "nationality".
 * @package EduSec.models
 */
class Nationality extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nationality the static model class
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
		return 'nationality';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'nationality_name'
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
			array('nationality_name, nationality_created_by, nationality_created_date', 'required','message'=>''),
			array('nationality_created_by', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('nationality_name', 'length', 'max'=>30),
			//array('nationality_name','CRegularExpressionValidator','pattern'=>'/^([a-zA-Z ]+)$/','message'=>''),
			array('nationality_name', 'unique','message'=>'Already Exists.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nationality_id, nationality_name, nationality_created_by, nationality_created_date', 'safe', 'on'=>'search'),
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
			'Rel_user' => array(self::BELONGS_TO, 'User','nationality_created_by'),
			'employeeTransactions' => array(self::HAS_MANY, 'EmployeeTransaction', 'employee_transaction_nationality_id'),
		);

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nationality_id' => 'Nationality',
			'nationality_name' => 'Nationality',
			'nationality_created_by' => 'Created By',
			'nationality_created_date' => 'Creation
 Date',
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

		$criteria->compare('nationality_id',$this->nationality_id);
		$criteria->compare('nationality_name',$this->nationality_name,true);
		$criteria->compare('nationality_created_by',$this->nationality_created_by);
		$criteria->compare('nationality_created_date',$this->nationality_created_date,true);

		$nationality_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $nationality_data;
		return $nationality_data;
	}
	
	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'nationality_name',
			'Rel_user.user_organization_email_id:Created By',		
        		),
		'filename'=>'Nationality-List', 'pdfFile'=>'/nationality/nationalityGeneratePdf');
              return $data;
        }

	private static $_items=array();
	
	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'nationality_id', 'nationality_name');
	    return self::$_items;
	}
 }
