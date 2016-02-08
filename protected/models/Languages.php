<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "languages".
 * @package EduSec.models
 */

class Languages extends CActiveRecord
{
	public $organization_name,$user_organization_email_id;
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

	/**
	 * @return default scope to get data from table in order to "languages_name".
	 */
	public function defaultScope() 
	{
       		return array(
           		'order' => 'languages_name'
	        );
  	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('languages_name, languages_created_by, languages_created_date', 'required','message'=>''),
			
			array('languages_organization_id, languages_created_by', 'numerical', 'integerOnly'=>true),
			array('languages_name', 'length', 'max'=>60),
			array('languages_name', 'unique','message'=>'Already Exists.'),
			array('languages_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			array('languages_id, languages_name, languages_organization_id, languages_created_by, languages_created_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		'Rel_org' => array(self::BELONGS_TO, 'Organization','languages_organization_id'),
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
			'languages_organization_id' => 'Organization',
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
		$criteria->compare('languages_organization_id',$this->languages_organization_id);
		$criteria->compare('languages_created_by',$this->languages_created_by);
		$criteria->compare('languages_created_date',$this->languages_created_date,true);

		$language_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		$_SESSION['language_data']=$language_data;
		return $language_data;
	}

	/**
	 * @return array for create dropdown for Language.
	*/
	private static $_items=array();

        public static function items()
        {
            if(isset(self::$_items))
                self::loadItems();
            return self::$_items;
        }

        public static function item($code)
        {
           if(!isset(self::$_items))
            self::loadItems();
            return isset(self::$_items[$code]) ? self::$_items[$code] : false;
        }

        private static function loadItems()
        {
          self::$_items=array();
          $models=self::model()->findAll();
          foreach($models as $model)
            self::$_items[$model->languages_id]=$model->languages_name;
        }
}
