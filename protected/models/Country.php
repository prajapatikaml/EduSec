<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

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

	/**
	 * @return default scope to get data from table in order to country "name".
	 */
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
		return array(
			array('name', 'required','message'=>''),
			array('name', 'length', 'max'=>60),
			array('name', 'unique','message'=>'Already Exists.'),
			array('name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
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
		$_SESSION['country_data']=$country_data;
		return $country_data;
	}

	/**
	 * @return array for create dropdown for country.
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
            self::$_items[$model->id]=$model->name;
        }

}
