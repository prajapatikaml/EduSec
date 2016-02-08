<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "state".
 * @package EduSec.models
 */

class State extends CActiveRecord
{
	public $name,$state_name;
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

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('state_name, country_id', 'required','message'=>''),
			array('state_name', 'length', 'max'=>60),
			array('country_id', 'length', 'max'=>30),
			array('state_name','CRegularExpressionValidator','pattern'=>'/^([A-Za-z  ]+)$/','message'=>''),
			array('state_name','checkstate'),
			array('state_id, state_name, country_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
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
		$criteria=new CDbCriteria;

		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('state_name',$this->state_name,true);
		$criteria->compare('country_id',$this->country_id,false);

		$state_data =  new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
		$_SESSION['state_data']=$state_data;
		return $state_data;
	}
	
	/**
	* @returen boolean value for
	* check unique state in same country
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


	/**
	 * @return array for create dropdown for State.
	*/
	private static $_items = array();

    	public static function items() {
        if (isset(self::$_items))
            self::loadItems();
        return self::$_items;
    	}

    	public static function item($code) {
        if (!isset(self::$_items))
            self::loadItems();
        return isset(self::$_items[$code]) ? self::$_items[$code] : false;
    	}

    	private static function loadItems() {
        self::$_items = array();
        $models = self::model()->findAll();
        foreach ($models as $model)
            self::$_items[$model->state_id] = $model->state_name;
    	}
	
}
