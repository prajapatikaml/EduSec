<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "languages_known".
 * @package EduSec.models
 */

class LanguagesKnown extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LanguagesKnown the static model class
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
		return 'languages_known';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('languages_known1, languages_known2, languages_known3, languages_known4', 'numerical', 'integerOnly'=>true),
			array('languages_known_id, languages_known1, languages_known2, languages_known3, languages_known4', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(

		'Rel_Langs1'=>array(self::BELONGS_TO, 'Languages', 'languages_known1'),
		'Rel_Langs2'=>array(self::BELONGS_TO, 'Languages', 'languages_known2'),
		'Rel_Langs3'=>array(self::BELONGS_TO, 'Languages', 'languages_known3'),
		'Rel_Langs4'=>array(self::BELONGS_TO, 'Languages', 'languages_known4'),

		'Rel_language_known1' => array(self::BELONGS_TO, 'Languages', 'languages_known1'),	
		'Rel_language_known2' => array(self::BELONGS_TO, 'Languages', 'languages_known2'),	
		'Rel_language_known3' => array(self::BELONGS_TO, 'Languages', 'languages_known3'),	
		'Rel_language_known4' => array(self::BELONGS_TO, 'Languages', 'languages_known4'),	

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'languages_known_id' => 'Languages Known',
			'languages_known1' => 'Languages Known1',
			'languages_known2' => 'Languages Known2',
			'languages_known3' => 'Languages Known3',
			'languages_known4' => 'Languages Known4',
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

		$criteria->compare('languages_known_id',$this->languages_known_id);
		$criteria->compare('languages_known1',$this->languages_known1);
		$criteria->compare('languages_known2',$this->languages_known2);
		$criteria->compare('languages_known3',$this->languages_known3);
		$criteria->compare('languages_known4',$this->languages_known4);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
