<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

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
		return array(
			array('user_type_name, created_by, creation_date', 'required', 'message'=>''),
			array('created_by, user_type_organization_id', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('user_type_name', 'length', 'max'=>30),
			array('user_type_name', 'unique','message'=>'Already Exists.'),
			array('user_type_name','CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			array('user_type_id, user_type_name, created_by, creation_date, user_type_organization_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'Rel_org' => array(self::BELONGS_TO, 'Organization','user_type_organization_id'),
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
		$criteria->compare('user_type_organization_id',$this->user_type_organization_id);

		$user_type_data =new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		 $_SESSION['user_type_records']=$user_type_data;
		return $user_type_data;
	}
	

	/**
	 * @return array for create dropdown for User Type.
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
            self::$_items[$model->user_type_id]=$model->user_type_name;
        }
}
