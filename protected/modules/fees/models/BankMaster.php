<?php

/**
 * This is the model class for table "bank_master".
 * @package EduSec.Employee.models
 */
class BankMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BankMaster the static model class
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
		return 'bank_master';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'bank_full_name'
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
			array('bank_full_name, bank_short_name', 'required','message'=>''),
			array('bank_full_name', 'length', 'max'=>60),
			array('bank_short_name', 'length', 'max'=>60),
			array('bank_full_name,bank_short_name', 'unique','message'=>'Already Exists.'),
			//array('bank_full_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			//array('bank_short_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bank_id, bank_full_name, bank_short_name,bank_organization_id ', 'safe', 'on'=>'search'),
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
			'bank_id' => 'Bank',
			'bank_full_name' => 'Full Name',
			'bank_short_name' => 'Short Name',
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
		
		$criteria->compare('bank_id',$this->bank_id);
		$criteria->compare('bank_full_name',$this->bank_full_name,true);
		$criteria->compare('bank_short_name',$this->bank_short_name,true);
		$bankmaster_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $bankmaster_data;
		return $bankmaster_data;
	}
	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'bank_full_name',
			'bank_short_name',			
        		),
		'filename'=>'Bank-List', 'pdfFile'=>'fees.views.bankMaster.BankMasterExportToPdf');
              return $data;
        }

	private static $_items=array();

	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'bank_id', 'bank_full_name');
	    return self::$_items;
	}
  }
