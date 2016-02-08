<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

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
	 * @return default scope to get data from table in order to "qualification_name".
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
		return array(
			array('qualification_name, qualification_created_by, qualification_created_date', 'required','message'=>''),
			array('qualification_organization_id, qualification_created_by', 'numerical', 'integerOnly'=>true),
			array('qualification_name', 'length', 'max'=>30),
			array('qualification_name', 'unique','message'=>'Already Exists.'),
array('qualification_name','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z\/]+([-. ][a-zA-Z. \/]+)*$/','message'=>''),
			array('qualification_id, qualification_name, qualification_organization_id, qualification_created_by, qualification_created_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		'Rel_org' => array(self::BELONGS_TO, 'Organization','qualification_organization_id'),
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
			'qualification_name' => 'Qualification',
			'qualification_organization_id' => 'Organization',
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
		$criteria->compare('qualification_organization_id',$this->qualification_organization_id);
		$criteria->compare('qualification_created_by',$this->qualification_created_by);
		$criteria->compare('qualification_created_date',$this->qualification_created_date,true);

		$data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['qua_data'] = $data;
		return $data;
	}

	/**
	 * @return array for create dropdown for Qualification.
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
            self::$_items[$model->qualification_id]=$model->qualification_name;
        }
}
