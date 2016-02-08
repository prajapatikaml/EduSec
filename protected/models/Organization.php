<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "organization".
 * @package EduSec.models
 */


class Organization extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Organization the static model class
	 */

	public $city_name,$state_name,$name;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'organization';
	}

	/**
	 * @return default scope to get data from table in order to "organization_name".
	 */
	public function defaultScope() 
	{
       		return array(
           		'order' => 'organization_name'
	        );
  	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('organization_name, organization_created_by, organization_creation_date, country, phone, email','required','message'=>''),
			array('organization_created_by, organization_trust_id', 'numerical', 'integerOnly'=>true , 'message'=>''),
			array('organization_name, organization_name,address_line1,fax_no,address_line2', 'length', 'max'=>50, 'message'=>''),
			array('fax_no', 'length', 'max'=>15, 'message'=>''),
			array('logo', 'file', 
       				 'types'=>'jpg, gif, png, bmp, jpeg',
            			'maxSize'=>1024 * 1024 * 2, // 10MB
                		'tooLarge'=>'The file was larger than 2MB. Please upload a smaller file.',
            			'allowEmpty' => true),

			array('email', 'email','message'=>''),

			array('phone','CRegularExpressionValidator','pattern'=>'/^[0-9+ ]+([-][0-9+ ]+)*$/'),
			array('organization_id, organization_name, organization_created_by,name_alias, organization_creation_date, address_line1, address_line2, pin, phone, Website, email, city_name, state_name, name,fax_no,organization_trust_id','safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
                       'Rel_org_city' => array(self::BELONGS_TO, 'City', 'city'),
                       'Rel_org_state' => array(self::BELONGS_TO, 'State', 'state'),
                       'Rel_org_country' => array(self::BELONGS_TO, 'Country', 'country'),
			'Rel_user' => array(self::BELONGS_TO, 'User','organization_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'organization_id' => 'ID',
			'organization_name' => 'Name ',
			'name_alias'=>'Name Alias',
			'organization_created_by' => 'Created By',
			'organization_creation_date' => 'Creation Date',
			'address_line1'=>'Address Line1',
			'address_line2'=>'Address Line2',
			'pin'=>'Zip / Postal Code',
			'phone'=>'Phone',
			'website'=>'website',
			'email'=>'Email',
			'fax_no'=>'Fax No',
			'city'=>'City / Town',
			'state'=>'State / Province',
			'country'=>'Country',
			'name'=>'Country',
			'organization_trust_id'=>'Trust',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{

		$criteria=new CDbCriteria;
		$criteria->compare('organization_id',$this->organization_id);
		$criteria->compare('organization_name',$this->organization_name,true);
		
		$criteria->compare('organization_created_by',$this->organization_created_by);
		$criteria->compare('organization_creation_date',$this->organization_creation_date,true);
		$criteria->compare('address_line1',$this->address_line1,true);
		$criteria->compare('address_line2',$this->address_line2);
		$criteria->compare('pin',$this->pin);
		$criteria->compare('phone',$this->phone);	
		$criteria->compare('website',$this->website,true);
		$criteria->compare('email',$this->email);
		$criteria->compare('fax_no',$this->fax_no);
		$criteria->compare('city',$this->city);
		$criteria->compare('state',$this->state);		
		$criteria->compare('country',$this->country);
		$criteria->compare('organization_trust_id',$this->organization_trust_id);
		$organization_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	
		$_SESSION['organization_records']=$organization_data;
		return $organization_data;
		}

	/**
	 * @return array for create dropdown for Organization.
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
            self::$_items[$model->organization_id]=$model->organization_name;
        }

	/**
	 * @return boolean value
	 * Check organization already exist or not...
	*/
	public function checkorg()
	{
		if($this->isNewRecord)
		{
			$orgname='"'.strtolower($this->organization_name).'"';
			$organization_name=Yii::app()->db->createCommand()
				    ->select('organization_name')
				    ->from('organization')
				    ->where('organization_name='.$orgname)
			    	    ->queryAll();
			
			if($organization_name)
			{
				$this->addError('organization_name',"Already Exists.");	
				 return false;	
			}
			else
			{
				return true;
			}
		}
		else
		{	
			$orgid=$_REQUEST['id'];
			$orgname='"'.strtolower($this->organization_name).'"';
			$organization_name=Yii::app()->db->createCommand()
				    ->select('organization_name')
				    ->from('organization')
				    ->where('organization_id <>'.$orgid.' and organization_name='.$orgname)
			    	    ->queryAll();
			
			if($organization_name)
			  {
			 	$this->addError('organization_name',"Already Exists.");	
				 return false;	
			  }
			else
		          {
				return true;
			  }
		}	
	}

}
