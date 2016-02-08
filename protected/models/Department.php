<?php
/**
 * This is the model class for table "department".
 * @package EduSec.models
 */
class Department extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Department the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'department_name'
	        );
  	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'department';
	}
	

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('department_name, department_created_by, department_created_date', 'required','message'=>''),
			array('department_created_by', 'numerical', 'integerOnly'=>true),
			array('department_name', 'length', 'max'=>60),
			array('department_name', 'unique', 'message'=>'Already Exists.'),
			//array('department_name','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z& ]+([.][a-zA-Z ]+)*$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('department_id, department_name, department_created_by, department_created_date', 'safe', 'on'=>'search'),
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
			'Rel_user' => array(self::BELONGS_TO, 'User','department_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'department_id' => 'Department',
			'department_name' => 'Department',
			'department_created_by' => 'Created By',
			'department_created_date' => 'Creation Date',
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
		$criteria->compare('department_id',$this->department_id);
		$criteria->compare('department_name',$this->department_name,true);
		$criteria->compare('department_created_by',$this->department_created_by);
		$criteria->compare('department_created_date',$this->department_created_date,true);

		$department_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData']=$department_data;
		return $department_data;
	}
	
	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'department_name::Department Name',
			'Rel_user.user_organization_email_id:Created By',
        		),
		'filename'=>'Department-List', 'pdfFile'=>'/department/departmentGeneratePdf');
              return $data;
        }

	private static $_items=array();

	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'department_id', 'department_name');
	    return self::$_items;
	}


}
