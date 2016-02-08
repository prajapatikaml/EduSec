<?php

/**
 * This is the model class for table "photo_gallery".
 * @package EduSec.models
 */
class PhotoGallery extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PhotoGallery the static model class
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
		return 'photo_gallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('photo_path, created_by, creation_date, display_status', 'required'),
			array('created_by', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('photo_path, photo_desc', 'length', 'max'=>50),
			array('photo_path', 'file', 'types'=>'jpg, jpeg, gif, png','maxSize'=>1024*1024, 'tooLarge'=>'The Photo was larger than 1MB. Please upload a smaller Photo.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('photo_id, photo_path, photo_desc, created_by, creation_date', 'safe', 'on'=>'search'),
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
			'photo_id' => 'Photo',
			'photo_path' => 'Photo',
			'photo_desc' => 'Photo Description',
			'created_by' => 'Created By',
			'creation_date' => 'Creation Date',
			'display_status' => 'Display Status',
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
		$criteria->compare('photo_id',$this->photo_id);
		$criteria->compare('photo_path',$this->photo_path,true);
		$criteria->compare('photo_desc',$this->photo_desc,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('display_status',$this->display_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
