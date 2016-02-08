<?php
/**
 * This is the model class for table "shift".
 * @package EduSec.models
 */
class Shift extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 * @return Shift the static model class
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
		return 'shift';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('shift_type,shift_start_time, shift_end_time, shift_created_by, shift_created_date', 'required','message'=>''),
			array('shift_created_by', 'numerical', 'integerOnly'=>true),
			array('shift_type', 'length', 'max'=>20),
			array('shift_type', 'unique', 'message'=>'Already Exists.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('shift_id, shift_type, shift_start_time, shift_end_time, shift_created_by, shift_created_date', 'safe', 'on'=>'search'),
			array('shift_type', 'CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z0-9  ]+)$/','message'=>''),
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
		'Rel_user' => array(self::BELONGS_TO, 'User','shift_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'shift_id' => 'Shift',
			'shift_type' => 'Shift',
			'shift_start_time' => 'Start Time',
			'shift_end_time' => 'End Time',
			'shift_created_by' => 'Created By',
			'shift_created_date' => 'Creation Date',
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
		$criteria->compare('shift_id',$this->shift_id);
		$criteria->compare('shift_type',$this->shift_type,true);
		$criteria->compare('shift_start_time',$this->shift_start_time,true);
		$criteria->compare('shift_end_time',$this->shift_end_time,true);
		$criteria->compare('shift_created_by',$this->shift_created_by);
		$criteria->compare('shift_created_date',$this->shift_created_date,true);

		$shift_data =  new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $shift_data;
		return $shift_data;
	}
	
	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'shift_type',
			'shift_start_time',
			'shift_end_time',
			'Rel_user.user_organization_email_id:Created By',
		),
		'filename'=>'Shift-List', 'pdfFile'=>'/shift/ShiftExportPdf');
              return $data;
        }

	private static $_items=array();

	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'shift_id', 'shift_type');
	    return self::$_items;
	}

	/**
	* Check for unique start and end time
	* @return boolean
	*/
	public function beforeSave()
	{

		  if($this->shift_start_time == $this->shift_end_time)
		  {
				$this->addError("shift_end_time","Select Unique End Time");       
				$this->addError("shift_start_time","Select Unique Start Time ");       
			    	return false;	
		  }
		  else
		  {

				return true;
		  }
	 
	}

}
