<?php

/**
 * This is the model class for table "excel_sheet_format".
 *
 * The followings are the available columns in table 'excel_sheet_format':
 * @property integer $excel_sheet_format_id
 * @property string $excel_sheet_name
 * @property string $excel_sheet_path
 * @property integer $created_by
 * @property string $creation_date
 * @property integer $excel_sheet_format_org_id
 */
class ExcelSheetFormat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ExcelSheetFormat the static model class
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
		return 'excel_sheet_format';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'excel_sheet_name'
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
			array('excel_sheet_name, excel_sheet_path', 'required','message'=>''),
			//array('created_by, excel_sheet_format_org_id', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('excel_sheet_name', 'length', 'max'=>100),
			array('excel_sheet_path', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('excel_sheet_format_id, excel_sheet_name, excel_sheet_path, created_by, creation_date, excel_sheet_format_org_id', 'safe', 'on'=>'search'),
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
			'excel_sheet_format_id' => 'Excel Sheet Format',
			'excel_sheet_name' => 'Excel Sheet Name',
			'excel_sheet_path' => 'Upload Excel',
			'created_by' => 'Created By',
			'creation_date' => 'Creation Date',
			'excel_sheet_format_org_id' => 'Organization',
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

		$criteria->compare('excel_sheet_format_id',$this->excel_sheet_format_id);
		$criteria->compare('excel_sheet_name',$this->excel_sheet_name,true);
		$criteria->compare('excel_sheet_path',$this->excel_sheet_path,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('excel_sheet_format_org_id',$this->excel_sheet_format_org_id);
		$ExcelSheetFormat_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		   $_SESSION['ExcelSheetFormat_records']=$ExcelSheetFormat_records;
	return $ExcelSheetFormat_records;
	}

}
