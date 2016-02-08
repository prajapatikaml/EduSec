<?php

/**
 * This is the model class for table "feedback_details_table".
 *
 * The followings are the available columns in table 'feedback_details_table':
 * @property integer $feedback_details_table_id
 * @property integer $feedback_details_table_student_id
 * @property integer $feedback_category_master_id
 * @property string $feedback_details_remarks
 * @property integer $feedback_details_table_created_by
 * @property string $feedback_details_table_creation_date
 */
class FeedbackDetailsTable extends CActiveRecord
{
	public $feedback_category_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FeedbackDetailsTable the static model class
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
		return 'feedback_details_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('feedback_details_table_student_id, feedback_category_master_id, feedback_details_remarks, feedback_details_table_created_by, feedback_details_table_creation_date', 'required','message'=>''),
			array('feedback_details_table_student_id, feedback_category_master_id, feedback_details_table_created_by', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('feedback_details_remarks', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('feedback_details_table_id, feedback_details_table_student_id, feedback_category_master_id, feedback_details_remarks, feedback_details_table_created_by, feedback_details_table_creation_date,feedback_category_name', 'safe', 'on'=>'search'),
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
			'Rel_category_master' => array(self::BELONGS_TO, 'FeedbackCategoryMaster','feedback_category_master_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'feedback_details_table_id' => 'Feedback Details Table',
			'feedback_details_table_student_id' => 'Student Name',
			'feedback_category_master_id' => 'Performance Category ',
			'feedback_details_remarks' => 'Performance Remarks',
			'feedback_details_table_created_by' => 'Created By',
			'feedback_details_table_creation_date' => 'Creation Date',
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

		$criteria->compare('feedback_details_table_id',$this->feedback_details_table_id);
		$criteria->compare('feedback_details_table_student_id',$this->feedback_details_table_student_id);
		$criteria->compare('feedback_category_master_id',$this->feedback_category_master_id);
		$criteria->compare('feedback_details_remarks',$this->feedback_details_remarks,true);
		$criteria->compare('feedback_details_table_created_by',$this->feedback_details_table_created_by);
		$criteria->compare('feedback_details_table_creation_date',$this->feedback_details_table_creation_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function mysearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		if(Yii::app()->user->getState('stud_id'))
		{
			$criteria->condition = 'feedback_details_table_student_id = :feedback_details_table_student_id';
		$criteria->params = array(':feedback_details_table_student_id' => Yii::app()->user->getState('stud_id'));
		}
		else
		{
		$criteria->condition = 'feedback_details_table_student_id = :feedback_details_table_student_id';
		$criteria->params = array(':feedback_details_table_student_id' => $_REQUEST['id']);
		}
		$criteria->compare('feedback_details_table_id',$this->feedback_details_table_id);
		$criteria->compare('feedback_details_table_student_id',$this->feedback_details_table_student_id);
		$criteria->compare('feedback_category_master_id',$this->feedback_category_master_id);
		$criteria->compare('feedback_details_remarks',$this->feedback_details_remarks,true);
		$criteria->compare('feedback_details_table_created_by',$this->feedback_details_table_created_by);
		$criteria->compare('feedback_details_table_creation_date',$this->feedback_details_table_creation_date,true);
		$stud_feedback = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		 $_SESSION['stud_feedback']=$stud_feedback;
		return $stud_feedback;
	}
}
