<?php

/**
 * This is the model class for table "certificate".
 * @package EduSec.models
 */
class Certificate extends CActiveRecord
{
	public $organization_name,$user_organization_email_id,$EnrollmentNo,$certificatetype,$attendenceno, $branch_name, $academic_term_period, $academic_term_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Certificate the static model class
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
		return 'certificate';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'certificate_title'
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
			array('certificate_title, certificate_content,	certificate_type,  certificate_created_by,certificate_creation_date', 'required','message'=>''),
			array('certificate_created_by', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('branch_name, academic_term_period, academic_term_name, certificatetype',   'required', 'on'=>'certificategeneration','message'=>''),
			array('EnrollmentNo, certificatetype',   'required', 'on'=>'singleCertificate','message'=>''),
			array('attendenceno,certificatetype','required','on'=>'employeeCertificategeneration','message'=>''),

			array('certificate_title', 'unique', 'message'=>'Already Exists.'),

			//array('certificate_title','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z& ]+([-][a-zA-Z ]+)*$/','message'=>''),
			array('EnrollmentNo','CRegularExpressionValidator', 'pattern'=>'/^\w([0-9]+)$/','message'=>''),
			array('attendenceno','CRegularExpressionValidator','pattern'=>'/^([0-9]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('certificate_id, certificate_title, certificate_content, certificate_created_by, certificate_creation_date,certificate_type', 'safe', 'on'=>'search'),
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
		'Rel_user' => array(self::BELONGS_TO, 'User','certificate_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'certificate_id' => 'Certificate',
			'certificate_title' => 'Title',
			'certificate_content' => 'Certificate Content',
			'certificate_created_by' => 'Created By',
			'certificate_creation_date' => 'Creation Date',
			'certificate_type'=>'For Whom',
			'EnrollmentNo'=>'Enrollment No',
			'certificatetype'=>'Certificate Type',
			'attendenceno'=>'Attendence Card No',
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
		$criteria->compare('certificate_id',$this->certificate_id);
		$criteria->compare('certificate_title',$this->certificate_title,true);
		$criteria->compare('certificate_type',$this->certificate_type,true);
		$criteria->compare('certificate_content',$this->certificate_content,true);
		$criteria->compare('certificate_created_by',$this->certificate_created_by);
		$criteria->compare('certificate_creation_date',$this->certificate_creation_date,true);

		$certificate_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['certificate'] = $certificate_data;
		return $certificate_data;
	}

	private static $_items=array();

	private static $_items1=array();
	
	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll('certificate_type = "Student"'), 'certificate_id', 'certificate_title');
	    return self::$_items;
	}

	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items1()
	{
	    self::$_items = CHtml::listData(self::model()->findAll('certificate_type = "Employee"'), 'certificate_id', 'certificate_title');
	    return self::$_items;
	}
}
