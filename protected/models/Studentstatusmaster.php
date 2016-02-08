<?php

/**
 * This is the model class for table "student_status_master".
 * @package EduSec.models
 */
class Studentstatusmaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Studentstatusmaster the static model class
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
		return 'student_status_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status_name', 'required','message'=>""),
			array('created_by', 'numerical', 'integerOnly'=>true),
			array('status_name', 'length', 'max'=>30),
			array('status_name', 'unique','message'=>'Record already exist.'),
			array('status_name','CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z ]+)$/','message'=>''),
			array('created_by','default','value'=>Yii::app()->user->id),
			array('creation_date','default','value'=>new CDbExpression('NOW()')),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, status_name, creation_date, created_by', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'status_name' => 'Status',
			'creation_date' => 'Creation Date',
			'created_by' => 'Created By',
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
		$criteria->compare('status_name',$this->status_name,true);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('created_by',$this->created_by);
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
			'status_name',
        		),
		'filename'=>'StudentStatus-List', 'pdfFile'=>'/studentstatusmaster/gridview_export_report');
              return $data;
        }
}
