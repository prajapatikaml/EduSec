<?php

/**
 * This is the model class for table "languages".
 * @package EduSec.models
 */
class Languages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Languages the static model class
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
		return 'languages';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'languages_name'
	        );
  	}
	public $organization_name,$user_organization_email_id;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('languages_name,languages_created_by, languages_created_date', 'required','message'=>''),
			
			array('languages_created_by', 'numerical', 'integerOnly'=>true),
			array('languages_name', 'length', 'max'=>60),
			array('languages_name', 'unique','message'=>'Already Exists.'),
			//array('languages_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('languages_id, languages_name, languages_created_by, languages_created_date', 'safe', 'on'=>'search'),
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
		'Rel_user' => array(self::BELONGS_TO, 'User','languages_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'languages_id' => 'Languages id',
			'languages_name' => 'Language',
			'languages_created_by' => 'Created By',
			'languages_created_date' => 'Creation Date',
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

		$criteria->compare('languages_id',$this->languages_id);
		$criteria->compare('languages_name',$this->languages_name,true);
		$criteria->compare('languages_created_by',$this->languages_created_by);
		$criteria->compare('languages_created_date',$this->languages_created_date,true);

		$language_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $language_data;
		return $language_data;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'languages_name',
			'Rel_user.user_organization_email_id:Created By',
        		),
		'filename'=>'Languages-List', 'pdfFile'=>'/languages/LanguageExportPdf');
              return $data;
        }

	private static $_items=array();
	
	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'languages_id', 'languages_name');
	    return self::$_items;
	}
}
