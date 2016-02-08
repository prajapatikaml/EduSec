<?php

/**
 * This is the model class for table "state".
 * @package EduSec.models
 */
class State extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return State the static model class
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
		return 'state';
	}
	public $name,$state_name;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('state_name, country_id', 'required','message'=>''),
			array('state_name', 'length', 'max'=>60),
			array('country_id', 'length', 'max'=>30),
			//array('state_name', 'unique','message'=>'Already Exist.'),
			//array('state_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			array('state_name','checkstate'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('state_id, state_name, country_id', 'safe', 'on'=>'search'),
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
		'Rel_country' => array(self::BELONGS_TO, 'Country','country_id'),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'state_id' => 'State id',
			'state_name' => 'State',
			'country_id' => 'Country',
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

		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('state_name',$this->state_name,true);
		$criteria->compare('country_id',$this->country_id,false);

		$state_data =  new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $state_data;
		return $state_data;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/	
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'state_name',
			'Rel_country.name',
        		),
		'filename'=>'State-List', 'pdfFile'=>'/state/StateExportPdf');
              return $data;
        }

	/**
	* Check state name unique in academic year 
	* @return booleen
	*/
	public function checkstate()
	{
	   if($this->isNewRecord)
	   {
		$country=$this->country_id;
		$state='"'.strtolower($this->state_name).'"';
		$acdm_term_name=Yii::app()->db->createCommand()
			      ->select('state_name')
			      ->from('state')
			      ->where('country_id="'.$country.'"'.' and state_name='.$state)
		    	      ->queryAll();
			
	        if($acdm_term_name)
		{
		   $this->addError('state_name',"Already Exists.");	
		   return false;	
		}
		else
		{
		   return true;
		}
	   }
	   else
	   {
		$state_id=$_REQUEST['id'];
		$country=$this->country_id;
		$state='"'.strtolower($this->state_name).'"';
		$orgid=Yii::app()->user->getState('org_id');
		$acdm_term_name=Yii::app()->db->createCommand()
			     ->select('state_name')
			     ->from('state')
			     ->where('state_id <>'.$state_id.' and country_id="'.$country.'"'.' and state_name='.$state)
		    	     ->queryAll();
		
		if($acdm_term_name)
		{
		    $this->addError('state_name',"Already Exists.");	
		    return false;	
		}
		else
	        {
		    return true;
		}
	  }	
	}

	private static $_items = array();

	/**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'state_id', 'state_name');
	    return self::$_items;
	}	
}
