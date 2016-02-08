<?php

/**
 * This is the model class for table "message_of_day".
 * @package EduSec.models
 */
class MessageOfDay extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MessageOfDay the static model class
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
		return 'message_of_day';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'message'
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
			array('message, created_by, creation_date,message_of_day_active', 'required','message'=>''),
			array('created_by', 'numerical', 'integerOnly'=>true),
			array('message', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, message, created_by, creation_date,message_of_day_active', 'safe', 'on'=>'search'),
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
			'Rel_user_message' => array(self::BELONGS_TO, 'User','created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'message' => 'Message',
			'created_by' => 'Created By',
			'creation_date' => 'Creation Date',
			'message_of_day_active'=>'Active',
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
		$criteria->compare('message',$this->message,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('message_of_day_active',$this->message_of_day_active,true);
		$message = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'id DESC',
				),
			)
		);
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] =$message;
		return $message;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/	
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'message',
			'Rel_user_message.user_organization_email_id::Created By',
        		),
		'filename'=>'Messages-List', 'pdfFile'=>'/messageOfDay/messageGeneratePDF');
              return $data;
        }
}
