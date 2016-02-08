<?php

/**
 * This is the model class for table "qualification".
 * @package EduSec.models
 */
class Qualification extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Qualification the static model class
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
		return 'qualification';
	}

	/**
	 * Set default scope for display record orderby as below.
	 */
	public function defaultScope() 
	{
       		return array(
           		'order' => 'qualification_name'
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
			array('qualification_name, qualification_created_by, qualification_created_date', 'required','message'=>''),
			array('qualification_created_by', 'numerical', 'integerOnly'=>true),
			array('qualification_name', 'length', 'max'=>30),
			array('qualification_name', 'unique','message'=>'Already Exists.'),
			//array('qualification_name','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z\/]+([-. ][a-zA-Z. \/]+)*$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('qualification_id, qualification_name,qualification_created_by, qualification_created_date', 'safe', 'on'=>'search'),
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
		'Rel_user' => array(self::BELONGS_TO, 'User','qualification_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'qualification_id' => 'Qualification id',
			'qualification_name' => 'Qualification Name',
			'qualification_created_by' => 'Created By',
			'qualification_created_date' => 'Creation Date',
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

		$criteria->compare('qualification_id',$this->qualification_id);
		$criteria->compare('qualification_name',$this->qualification_name,true);
		$criteria->compare('qualification_created_by',$this->qualification_created_by);
		$criteria->compare('qualification_created_date',$this->qualification_created_date,true);

		$data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $data;
		return $data;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'qualification_name',
			'Rel_user.user_organization_email_id:Created By',			
        		),
		'filename'=>'Educationboard-List', 'pdfFile'=>'/qualification/gridview_export_report');
              return $data;
        }

	private static $_items=array();

     	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'qualification_id', 'qualification_name');
	    return self::$_items;
	}
}
