<?php

/**
 * This is the model class for table "parent_login".
 *
 * The followings are the available columns in table 'parent_login':
 * @property integer $parent_id
 * @property string $parent_user_name
 * @property string $parent_password
 * @property integer $created_by
 * @property string $creation_date
 */

class ParentLogin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ParentLogin the static model class
	 */
	public $current_pass,$new_pass,$retype_pass;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'parent_login';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_password, created_by, creation_date', 'required','message'=>''),
			array('created_by', 'numerical', 'integerOnly'=>true),
			array('parent_user_name', 'length', 'max'=>100),
			array('parent_password', 'length', 'max'=>200),
			array('retype_pass', 'compare','compareAttribute'=>'new_pass'),
			array('current_pass, new_pass, retype_pass', 'required','on'=>'change','message'=>''),
			array('current_pass','checkOldPassword','on'=>'change','message'=>''),
			array('parent_user_name', 'unique' ,'message'=>'Email ID must be unique.'),
			array('parent_user_name', 'checkunique' ,'message'=>'Email ID must be unique.'),
			
			array('parent_user_name','CRegularExpressionValidator','pattern'=>'/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]+)$/','message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('parent_id, parent_user_name, parent_password, created_by, creation_date', 'safe', 'on'=>'search'),
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
			'parent_id' => 'Parent',
			'parent_user_name' => 'Parent Email ID',
			'parent_password' => 'Parent Password',
			'created_by' => 'Created By',
			'creation_date' => 'Creation Date',
			'current_pass' => 'Current Password',
			'new_pass' => 'New Password',
			'retype_pass' => 'Retype Password',
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

		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('parent_user_name',$this->parent_user_name,true);
		$criteria->compare('parent_password',$this->parent_password,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('creation_date',$this->creation_date,true);
		$ParentLogin_records=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		   $_SESSION['ParentLogin_records']=$ParentLogin_records;
	return $ParentLogin_records;
	}
	public function checkOldPassword($attribute,$params)
	{
	    $record=ParentLogin::model()->findByAttributes(array('parent_password'=>md5($this->current_pass.$this->current_pass)));

	    if($record===null){
		$this->addError($attribute, 'Invalid password');
	    }
	}
	public function checkunique()
	{
	   $record=User::model()->findByAttributes(array('user_organization_email_id'=>$this->parent_user_name));

	    if(!empty($record)){
		$this->addError('parent_user_name', 'Email ID must be unique');
	    }
	}

}
