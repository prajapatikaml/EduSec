<?php

/**
 * This is the model class for table "country".
 * @package EduSec.models
 */
class Country extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Country the static model class
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
		return 'country';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'name'
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
			array('name', 'required','message'=>''),
			array('name', 'length', 'max'=>60),
			array('name', 'unique','message'=>'Already Exists.'),
			//array('name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Country id',
			'name' => 'Country',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);

		$country_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
				unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $country_data;
		return $country_data;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'name',
        		),
		'filename'=>'Country-List', 'pdfFile'=>'/country/CountryExportPdf');
              return $data;
        }

	private static $_items=array();

	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'id', 'name');
	    return self::$_items;
	}
}
