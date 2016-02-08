<?php

/**
 * This is the model class for table "user_type".
 * @package EduSec.models
 */
class UserType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserType the static model class
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
		return 'user_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_type_name, created_by, creation_date', 'required','message'=>''),
			array('created_by', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('user_type_name', 'length', 'max'=>30),
			array('user_type_name', 'unique','message'=>'Already Exists.'),
			//array('user_type_name','CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_type_id, user_type_name, created_by, creation_date', 'safe', 'on'=>'search'),
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
			'user_type_id' => 'User Type',
			'user_type_name' => 'User Type',
			'created_by' => 'Created By',
			'creation_date' => 'Creation Date',
			'user_type_organization_id' => 'Organization',
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
		
		$criteria->compare('user_type_id',$this->user_type_id);
		$criteria->compare('user_type_name',$this->user_type_name,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('creation_date',$this->creation_date,true);
		
		$user_type_data =new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $user_type_data;
		return $user_type_data;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'user_type_name', 	
			'Rel_user.user_organization_email_id:Created By',			
        		),
		'filename'=>'Usertype-List', 'pdfFile'=>'/userType/userTypeGeneratePdf');
              return $data;
        }

	private static $_items=array();

	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'user_type_id', 'user_type_name');
	    return self::$_items;
	} 
        	

}	
