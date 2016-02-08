<?php

/**
 * This is the model class for table "important_notice".
 *
 * The followings are the available columns in table 'important_notice':
 * @property integer $notice_id
 * @property string $notice
 * @property integer $created_by
 * @property string $creation_date
*  @property integer $notice_organization_id
 */
class ImportantNotice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ImportantNotice the static model class
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
		return 'important_notice';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'notice'
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
			array('notice, created_by, creation_date', 'required','message'=>''),
			array('created_by,notice_organization_id', 'numerical', 'integerOnly'=>true),
			array('notice', 'length', 'max'=>200),
			//array('notice','CRegularExpressionValidator', 'pattern'=>"/^\w[a-zA-Z0-9\s!\"\?;%:?*()<>\/#$\^&@\-+_=|,.~{}\[\]'\\\\]+$/",'message'=>''),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('notice_id, notice, created_by,notice_organization_id, creation_date', 'safe', 'on'=>'search'),
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
			'Rel_org' => array(self::BELONGS_TO, 'Organization','notice_organization_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User','created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'notice_id' => 'Notice',
			'notice' => 'Notice',
			'created_by' => 'Created By',
			'creation_date' => 'Creation Date',
			'notice_organization_id'=>'Organization',			
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

		//$criteria->condition = 'notice_organization_id = :notice_org_id';
	        //$criteria->params = array(':notice_org_id' => Yii::app()->user->getState('org_id'));

		//$criteria->compare('notice_id',$this->notice_id);
		$criteria->compare('notice',$this->notice,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('notice_organization_id',$this->notice_organization_id);
		$important_notice_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		unset($_SESSION['exportData']);
		 $_SESSION['exportData']=$important_notice_data;
		return $important_notice_data;
	}
	
	public static function getExportData() {
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'notice',
			'Rel_user.user_organization_email_id::Created By',
        		),
		'filename'=>'Important_Notice-List', 'pdfFile'=>'/importantNotice/importantNoticeGeneratePDF');
              return $data;
        }
}
