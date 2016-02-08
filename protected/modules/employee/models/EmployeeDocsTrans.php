<?php
/**
 * This is the model class for table "employee_docs_trans".
* @package EduSec.Employee.models
 */
class EmployeeDocsTrans extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployeeDocsTrans the static model class
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
		return 'employee_docs_trans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_docs_trans_user_id, employee_docs_trans_emp_docs_id', 'required','message'=>''),
			array('employee_docs_trans_user_id, employee_docs_trans_emp_docs_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('employee_docs_trans_id, employee_docs_trans_user_id, employee_docs_trans_emp_docs_id', 'safe', 'on'=>'search'),
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
			'Rel_Emp_doc' => array(self::BELONGS_TO, 'EmployeeDocs', 'employee_docs_trans_emp_docs_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_docs_trans_id' => 'Employee Docs Trans',
			'employee_docs_trans_user_id' => 'Employee Docs Trans User',
			'employee_docs_trans_emp_docs_id' => 'Employee Documents',
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

		$criteria->compare('employee_docs_trans_id',$this->employee_docs_trans_id);
		$criteria->compare('employee_docs_trans_user_id',$this->employee_docs_trans_user_id);
		$criteria->compare('employee_docs_trans_emp_docs_id',$this->employee_docs_trans_emp_docs_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function mysearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$trans = EmployeeTransaction::model()->resetScope()->findByPk($_REQUEST['id']);
		$users = EmployeeTransaction::model()->resetScope()->findAll('employee_transaction_user_id='.$trans->employee_transaction_user_id);	
		$arr = CHtml::listData($users,'employee_transaction_id','employee_transaction_id');	

		$criteria->addInCondition('employee_docs_trans_user_id',$arr);

		$criteria->compare('employee_docs_trans_id',$this->employee_docs_trans_id);
		$criteria->compare('employee_docs_trans_user_id',$this->employee_docs_trans_user_id);
		$criteria->compare('employee_docs_trans_emp_docs_id',$this->employee_docs_trans_emp_docs_id);

			$data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['emp_docs']=$data;
		return $data;
	}
}
