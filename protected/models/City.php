<?php

/**
 * This is the model class for table "city".
 * @package EduSec.models
 */
class City extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return City the static model class
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
		return 'city';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'city_name'
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
			array('city_name, country_id, state_id', 'required','message'=>''),
			array('city_id, country_id, state_id', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('city_name', 'length', 'max'=>60),
			//array('city_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			array('city_name','checkcity'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('city_id, city_name, country_id, state_id', 'safe', 'on'=>'search'),
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
		'Rel_state' => array(self::BELONGS_TO, 'State','state_id'),
		'Rel_country' => array(self::BELONGS_TO, 'Country','country_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'city_id' => 'City id',
			'city_name' => 'City',
			'country_id' => 'Country',
			'state_id' => 'State',
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

		
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('city_name',$this->city_name,true);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('state_id',$this->state_id);

		$city_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		$_SESSION['exportData']=$city_data;
		return $city_data;
	}
	
	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
        public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'city_name',
			'Rel_state.state_name',
			'Rel_country.name',			
        		),
		'filename'=>'City', 'pdfFile'=>'/city/CityExportPdf');
              return $data;
        }

	/**
	* Check city name must be unique in same state.
	* @return boolean
	*/	
	public function checkcity()
	{
		if($this->isNewRecord)
		{
			$state=$this->state_id;
			$city='"'.strtolower($this->city_name).'"';
			$acdm_term_name=Yii::app()->db->createCommand()
				    ->select('city_name')
				    ->from('city')
				    ->where('state_id="'.$state.'"'.' and city_name='.$city)
			    	    ->queryAll();
				
			if($acdm_term_name)
			{
				$this->addError('city_name',"Already Exists.");	
				 return false;	
			}
			else
			{
				return true;
			}
		}
		else
		{
			$city_id=$_REQUEST['id'];
			$state=$this->state_id;
			$city='"'.strtolower($this->city_name).'"';
			$acdm_term_name=Yii::app()->db->createCommand()
				     ->select('city_name')
				     ->from('city')
				     ->where('city_id <>'.$city_id.' and state_id="'.$state.'"'.' and city_name='.$city)
				     ->queryAll();
				
			if($acdm_term_name)
			  {
			 	$this->addError('city_name',"Already Exists.");	
				 return false;	
			  }
			else
		          {
				return true;
			  }
		}	
	}
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
            self::$_items[$model->city_id]=$model->city_name;
    }
}
