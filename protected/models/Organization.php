<?php

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
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('organization_name, organization_created_by,name_alias, organization_creation_date', 'required', 'message'=>''),
			array('organization_created_by,pin', 'numerical', 'integerOnly'=>true , 'message'=>''),
			array('organization_name, organization_name,address_line1,fax_no,address_line2', 'length', 'max'=>100, 'message'=>''),
			array('city,state,country, address_line1,pin, phone, email','safe'),
			array('fax_no', 'length', 'max'=>15, 'message'=>''),
			array('logo', 'file', 
       				 'types'=>'jpg, gif, png, bmp, jpeg',
            			'maxSize'=>1024 * 1024 * 2, // 10MB
                		'tooLarge'=>'The file was larger than 2MB. Please upload a smaller file.',
            			'allowEmpty' => true),
			array('organization_name','unique','message'=>'Already Exist'),
			//array('email','CRegularExpressionValidator','pattern'=>'/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]+)$/','message'=>''),
			array('website','url', 'message'=>''),
			array('organization_name','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z.& ]+([-][a-zA-Z ]+)*$/','message'=>''),
			// array('email', 'ext.Email'),
			 array('Website,organization_trust_id','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('organization_id, organization_name, organization_created_by,name_alias, organization_creation_date, address_line1, address_line2, pin, phone, Website, email, city_name, state_name, name,fax_no,organization_trust_id','safe', 'on'=>'search'),
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
			'name_alias'=>'Alias',
			'organization_created_by' => 'Created By',
			'organization_creation_date' => 'Creation Date',
			'address_line1'=>'Address Line1',
			'address_line2'=>'Address Line2',
			'pin'=>'Pin',
			'phone'=>'Phone',
			'website'=>'website',
			'email'=>'Email',
			'fax_no'=>'Fax No',
			'city'=>'City',
			'state'=>'State',
			'country'=>'Country',
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

		$organization_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	
		unset($_SESSION['exportData']);
		$_SESSION['exportData'] = $organization_data;
		return $organization_data;
	}

	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
		'organization_name',
		'address_line1',
		'Rel_org_city.city_name',
		'Rel_org_state.state_name',
		'Rel_org_country.name',
		'pin',
		'phone',
		'website',
		'email',
		'fax_no',
		'Rel_user.user_organization_email_id',
		'organization_creation_date',
	
        		),
		'filename'=>'Organization-List', 'pdfFile'=>'/organization/OrganizationGeneratePDF');
              return $data;
        }

	private static $_items=array();

       /**
	* Generate array for dropdown list to use in child form.
	* @return array $_items
	*/
	public static function items()
	{
	    self::$_items = CHtml::listData(self::model()->findAll(), 'organization_id', 'organization_name');
	    return self::$_items;
	}
}
