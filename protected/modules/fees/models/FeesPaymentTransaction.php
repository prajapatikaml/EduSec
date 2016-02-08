<?php

/**
 * This is the model class for table "fees_payment_transaction".
 *
 * The followings are the available columns in table 'fees_payment_transaction':
 * @property integer $fees_payment_transaction_id
 * @property string $fees_payment_type
 * @property integer $fees_payment_receipt_no
 * @property integer $fees_payment_student_id
 * @property integer $fees_payment_batch_id
 * @property integer $fees_payment_amount
 * @property string $fees_payment_cheque_number
 * @property string $fees_payment_cheque_date
 * @property string $fees_payment_cheque_bank
 * @property string $fees_payment_details
 * @property string $fees_payment_received_date
 * @property integer $fees_payment_user_id
 */
class FeesPaymentTransaction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FeesPaymentTransaction the static model class
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
		return 'fees_payment_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fees_payment_type, fees_payment_receipt_no, fees_payment_student_id, fees_payment_amount, fees_payment_received_date, fees_payment_user_id', 'required','message'=>''),
			array('fees_payment_receipt_no, fees_payment_student_id, fees_payment_amount, fees_payment_user_id', 'numerical', 'integerOnly'=>true),
			array('fees_student_academic_term_period_id, fees_student_course_id', 'required','on'=>'courseWiseFeesReport','message'=>''),
			array('fees_payment_batch_id', 'safe','on'=>'courseWiseFeesReport','message'=>''),
			array('fees_payment_cheque_bank,fees_payment_cheque_number,fees_payment_cheque_date', 'required','on'=>'feespaycheque','message'=>''),
			array('fees_payment_type', 'length', 'max'=>15),
			array('fees_payment_cheque_number', 'length', 'max'=>6),
			array('fees_payment_cheque_bank', 'length', 'max'=>50),
			array('fees_payment_details', 'length', 'max'=>100),
			array('fees_payment_cheque_date, fees_student_academic_term_id,fees_student_academic_term_period_id,fees_student_course_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fees_payment_transaction_id, fees_payment_type, fees_payment_receipt_no, fees_payment_student_id, fees_payment_batch_id, fees_payment_amount, fees_payment_cheque_number, fees_payment_cheque_date, fees_payment_cheque_bank, fees_payment_details, fees_payment_received_date, fees_payment_user_id,paidAmount', 'safe', 'on'=>'search'),
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
			'fees_payment_transaction_id' => 'Fees Payment Transaction',
			'fees_payment_type' => 'Payment Type',
			'fees_payment_receipt_no' => 'Receipt No',
			'fees_payment_student_id' => 'Student',
			'fees_payment_batch_id' => 'Batch',
			'fees_payment_amount' => 'Fees Amount',
			'fees_payment_cheque_number' => 'Cheque Number',
			'fees_payment_cheque_date' => 'Cheque Date',
			'fees_payment_cheque_bank' => 'Cheque Bank',
			'fees_payment_details' => 'Fees Payment Details',
			'fees_payment_received_date' => 'Payment Received Date',
			'fees_payment_user_id' => 'User',
			 'fees_student_academic_term_id'=>'Semester',
			 'fees_student_academic_term_period_id'=>'Academic Year',
			 'fees_student_course_id'=>'Course',
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

		$criteria->compare('fees_payment_transaction_id',$this->fees_payment_transaction_id);
		$criteria->compare('fees_payment_type',$this->fees_payment_type,true);
		$criteria->compare('fees_payment_receipt_no',$this->fees_payment_receipt_no);
		$criteria->compare('fees_payment_student_id',$this->fees_payment_student_id);
		$criteria->compare('fees_payment_batch_id',$this->fees_payment_batch_id);
		$criteria->compare('fees_payment_amount',$this->fees_payment_amount);
		$criteria->compare('fees_payment_cheque_number',$this->fees_payment_cheque_number,true);
		$criteria->compare('fees_payment_cheque_date',$this->fees_payment_cheque_date,true);
		$criteria->compare('fees_payment_cheque_bank',$this->fees_payment_cheque_bank,true);
		$criteria->compare('fees_payment_details',$this->fees_payment_details,true);
		$criteria->compare('fees_payment_received_date',$this->fees_payment_received_date,true);
		$criteria->compare('fees_payment_user_id',$this->fees_payment_user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function beforeSave(){
		$fees_trans=FeesPaymentTransaction::model()->findAll('fees_payment_student_id='.$_REQUEST['id']);
		$total_payable = Yii::app()->db->createCommand()
			->select('batch_fees')
			->from('batch as b')
			->join('course as c','b.course_id=c.course_id')
			->where('b.batch_id='.StudentTransaction::model()->findByPk($_REQUEST['id'])->student_transaction_batch_id)
		->queryRow();
		$total=0;
		foreach($fees_trans as $fee){
			$total=$total+$fee->fees_payment_amount;
		}
		if($this->isNewRecord){
			$total = $total+$this->fees_payment_amount;
		}
		else{
			$oldfee = $fees_trans=FeesPaymentTransaction::model()->findByPk($_REQUEST['fees_id'])->fees_payment_amount;
			$total = ($total-$oldfee)+$this->fees_payment_amount;
		}
		if($total > $total_payable['batch_fees'] ){
			$this->addError('fees_payment_amount','<b style="color:red">You can not take an advance fees for student.</b>');
			return false;
		}
		else
			return true;
	}
	public function paidAmount()
	{
		$fees_trans=FeesPaymentTransaction::model()->findAll('fees_payment_student_id='.$_REQUEST['id']);
		$total=0;
		foreach($fees_trans as $fee){
			$total=$total+$fee->fees_payment_amount;
		}
		return $total;
	}
}
