<?php
/*****************************************************************************************
 * EduSec  Open Source Edition is a School / College management system developed by
 * RUDRA SOFTECH. Copyright (C) 2010-2015 RUDRA SOFTECH.

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses. 

 * You can contact RUDRA SOFTECH, 1st floor Geeta Ceramics, 
 * Opp. Thakkarnagar BRTS station, Ahmedbad - 382350, India or
 * at email address info@rudrasoftech.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * RUDRA SOFTECH" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by RUDRA SOFTECH".
 *****************************************************************************************/
/**
 * @package EduSec.modules.fees.models
 */


namespace app\modules\fees\models;

use Yii;

/**
 * This is the model class for table "fees_payment_transaction".
 *
 * @property integer $fees_pay_tran_id
 * @property integer $fees_pay_tran_collect_id
 * @property integer $fees_pay_tran_stu_id
 * @property integer $fees_pay_tran_batch_id
 * @property integer $fees_pay_tran_course_id
 * @property integer $fees_pay_tran_section_id
 * @property integer $fees_pay_tran_mode
 * @property integer $fees_pay_tran_cheque_no
 * @property integer $fees_pay_tran_bank_id
 * @property string $fees_pay_tran_amount
 * @property string $fees_pay_tran_date
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property integer $is_status
 *
 * @property FeesCollectCategory $feesPayTranCollect
 * @property BankMaster $feesPayTranBank
 * @property Users $createdBy
 * @property Users $updatedBy
 */
class FeesPaymentTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fees_payment_transaction';
    }

    public static function find()
    {
	return parent::find()->andWhere(['<>', 'is_status', 2]);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fees_pay_tran_collect_id', 'fees_pay_tran_stu_id', 'fees_pay_tran_batch_id', 'fees_pay_tran_course_id', 'fees_pay_tran_section_id', 'fees_pay_tran_mode', 'created_at', 'created_by'], 'required', 'message'=>''],
	    [['fees_pay_tran_date', 'fees_pay_tran_amount'], 'required'],
	    ['fees_pay_tran_amount', 'checkFeesTotal'],
            [['fees_pay_tran_collect_id', 'fees_pay_tran_stu_id', 'fees_pay_tran_batch_id', 'fees_pay_tran_course_id', 'fees_pay_tran_section_id', 'fees_pay_tran_mode', 'fees_pay_tran_cheque_no', 'fees_pay_tran_bank_id', 'created_by', 'updated_by', 'is_status'], 'integer'],
            [['fees_pay_tran_amount'], 'number'],
            [['fees_pay_tran_date', 'created_at', 'updated_at', 'fees_pay_tran_cheque_date', 'fees_pay_tran_bank_id', 'fees_pay_tran_bank_branch'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fees_pay_tran_id' => 'Receipt No.',
            'fees_pay_tran_collect_id' => 'Fees Collect Name',
            'fees_pay_tran_stu_id' => 'Student Name',
            'fees_pay_tran_batch_id' => 'Batch Name',
            'fees_pay_tran_course_id' => 'Course Name',
            'fees_pay_tran_section_id' => 'Section Name',
            'fees_pay_tran_mode' => 'Payment Mode',
            'fees_pay_tran_cheque_no' => 'Cheque No',
	    'fees_pay_tran_cheque_date'=>'Cheque Date',
            'fees_pay_tran_bank_id' => 'Bank Name',
	    'fees_pay_tran_bank_branch'=>'Bank Branch',
            'fees_pay_tran_amount' => 'Amount',
            'fees_pay_tran_date' => 'Payment date',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'is_status' => 'Status',
        ];
    }
   
    public function checkFeesTotal($attribute)
    {
	if(empty($this->fees_pay_tran_amount)) {
		return $this->addError($attribute, "You can not take zero fees.");	
	}
	$payFees=$chkFees=0;
	$payFees = Yii::$app->db->createCommand("SELECT SUM(fees_pay_tran_amount) FROM fees_payment_transaction WHERE fees_pay_tran_stu_id=".$this->fees_pay_tran_stu_id." AND fees_pay_tran_collect_id=".$this->fees_pay_tran_collect_id." AND is_status=0")->queryScalar();

	$totalPayFees = Yii::$app->db->createCommand("SELECT SUM(fees_details_amount) FROM fees_category_details WHERE fees_details_category_id = ".$this->fees_pay_tran_collect_id." AND is_status=0")->queryScalar();

	if($this->isNewRecord) {
		$chkFees = $payFees+$this->fees_pay_tran_amount; 
	} else {
		$currFees = FeesPaymentTransaction::findOne($this->fees_pay_tran_id)->fees_pay_tran_amount;
		$chkFees = ($payFees+$this->fees_pay_tran_amount)-$currFees; 
	}
	if($chkFees>$totalPayFees) {
		return $this->addError($attribute, "You can not take advance fees.");		
		return false;
	} else {
		return true;
	}
    }

    public static function getStuTotalPayFees($sid, $cid)
    {
	$payFeesTmp = Yii::$app->db->createCommand("SELECT SUM(fees_pay_tran_amount) FROM fees_payment_transaction WHERE fees_pay_tran_stu_id=".$sid." AND fees_pay_tran_collect_id=".$cid." AND is_status=0")->queryScalar();
	$payFees = !empty($payFeesTmp) ? $payFeesTmp : 0; 
	return $payFees;
    }


    /**
     * @return fees unpaid/paid amount for individual student based on current active category
     */
    public static function getUnpaidTotal($sid)
    {
	$stuData = \app\modules\student\models\StuMaster::findOne($sid);
	$collectTotal = (new \yii\db\Query())->from('fees_collect_category fcc')
		    ->join('JOIN', 'fees_category_details fcd', 'fcc.fees_collect_category_id = fcd.fees_details_category_id')
		    ->where(['fcc.is_status'=>0, 'fcd.is_status'=>0, 'fcc.fees_collect_batch_id'=>$stuData->stu_master_batch_id])
		    ->sum('fcd.fees_details_amount');

	$paidTotal = (new \yii\db\Query())->from('fees_payment_transaction fpt')
		    ->join('JOIN', 'fees_collect_category fcc', 'fcc.fees_collect_category_id = fpt.fees_pay_tran_collect_id')
		    ->where(['fcc.is_status'=>0, 'fpt.is_status'=>0, 'fcc.fees_collect_batch_id'=>$stuData->stu_master_batch_id, 'fpt.fees_pay_tran_stu_id'=>$sid])
		    ->sum('fpt.fees_pay_tran_amount');

	return ['paidFees'=>$paidTotal, 'unPaidFees'=>$collectTotal-$paidTotal];
	
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeesPayTranCollect()
    {
        return $this->hasOne(FeesCollectCategory::className(), ['fees_collect_category_id' => 'fees_pay_tran_collect_id']);
    }
   
    public function getRelStuData()
    {
        return $this->hasOne(\app\modules\student\models\StuMaster::className(), ['stu_master_id' => 'fees_pay_tran_stu_id']);
    }

    public function getRelBatchData()
    {
        return $this->hasOne(\app\modules\course\models\Batches::className(), ['batch_id' => 'fees_pay_tran_batch_id']);
    }

    public function getRelCourseData()
    {
        return $this->hasOne(\app\modules\course\models\Courses::className(), ['course_id' => 'fees_pay_tran_course_id']);
    }
    public function getRelSectionData()
    {
        return $this->hasOne(\app\modules\course\models\Section::className(), ['section_id' => 'fees_pay_tran_section_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeesPayTranBank()
    {
        return $this->hasOne(BankMaster::className(), ['bank_master_id' => 'fees_pay_tran_bank_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\app\models\User::className(), ['user_id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(\app\models\User::className(), ['user_id' => 'updated_by']);
    }
}
