<?php

/**
 * This is the model class for table "year".
 * @package EduSec.models
 */
class Year extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Year the static model class
	 */
	public $organization_name,$user_organization_email_id;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'year';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('year', 'required','message'=>''),
			array('year', 'unique','message'=>'Already Exists.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('year_id, year', 'safe', 'on'=>'search'),
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
			'Rel_user' => array(self::BELONGS_TO, 'User','created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'year_id' => 'Year',
			'year' => 'Year',
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

		$criteria->compare('year_id',$this->year_id);
		$criteria->compare('year',$this->year);

		$data =  new CActiveDataProvider(get_class($this), array(
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
			'year',
			),
		'filename'=>'Year', 'pdfFile'=>'/year/gridview_export_report');
              return $data;
        }
	private static $_items=array();
	
	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'year_id', 'year');
	    return self::$_items;
	}

 }
