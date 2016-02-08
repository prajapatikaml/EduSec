<?php
/**
 * This is the model class for table "eduboard".
 * @package EduSec.models
 */
class Eduboard extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Eduboard the static model class
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
		return 'eduboard';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'eduboard_name'
	        );
  	}
	public $organization_name,$user_organization_email_id;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eduboard_name, eduboard_created_by, eduboard_created_date', 'required','message'=>''),
			array('eduboard_created_by', 'numerical', 'integerOnly'=>true),
			array('eduboard_name', 'length', 'max'=>30),
			array('eduboard_name', 'unique','message'=>'Already Exists.'),
			//array('eduboard_name','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z]+([. ][a-zA-Z]+)*$/','message'=>''),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('eduboard_id, eduboard_name, eduboard_created_by, eduboard_created_date', 'safe', 'on'=>'search'),
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
		'Rel_user' => array(self::BELONGS_TO, 'User','eduboard_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			
			'eduboard_id' => 'Eduboard id',
			'eduboard_name' => 'Education Board',
			'eduboard_created_by' => 'Created By',
			'eduboard_created_date' => 'Creation Date',
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

		$criteria->compare('eduboard_id',$this->eduboard_id);
		$criteria->compare('eduboard_name',$this->eduboard_name,true);
		$criteria->compare('eduboard_created_by',$this->eduboard_created_by);
		$criteria->compare('eduboard_created_date',$this->eduboard_created_date,true);

		$eduboard_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $eduboard_data;
		return $eduboard_data;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'eduboard_name',
			'Rel_user.user_organization_email_id::Created By',			
        		),
		'filename'=>'Educationboard-List', 'pdfFile'=>'/eduboard/EducationExportPdf');
              return $data;
        }

	private static $_items=array();

	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'eduboard_id', 'eduboard_name');
	    return self::$_items;
	}
}
