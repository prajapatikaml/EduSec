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
 * FeesPaymentTransactionSearch represents the model behind the search form about `app\modules\fees\models\FeesPaymentTransaction`.
 * @package EduSec.modules.fees.models
 */


namespace app\modules\fees\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\fees\models\FeesPaymentTransaction;

class FeesPaymentTransactionSearch extends FeesPaymentTransaction
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fees_pay_tran_id', 'fees_pay_tran_collect_id', 'fees_pay_tran_stu_id', 'fees_pay_tran_batch_id', 'fees_pay_tran_course_id', 'fees_pay_tran_section_id', 'fees_pay_tran_mode', 'fees_pay_tran_cheque_no', 'fees_pay_tran_bank_id', 'created_by', 'updated_by', 'is_status'], 'integer'],
            [['fees_pay_tran_amount'], 'number'],
            [['fees_pay_tran_date', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = FeesPaymentTransaction::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'fees_pay_tran_id' => $this->fees_pay_tran_id,
            'fees_pay_tran_collect_id' => $this->fees_pay_tran_collect_id,
            'fees_pay_tran_stu_id' => $this->fees_pay_tran_stu_id,
            'fees_pay_tran_batch_id' => $this->fees_pay_tran_batch_id,
            'fees_pay_tran_course_id' => $this->fees_pay_tran_course_id,
            'fees_pay_tran_section_id' => $this->fees_pay_tran_section_id,
            'fees_pay_tran_mode' => $this->fees_pay_tran_mode,
            'fees_pay_tran_cheque_no' => $this->fees_pay_tran_cheque_no,
            'fees_pay_tran_bank_id' => $this->fees_pay_tran_bank_id,
            'fees_pay_tran_amount' => $this->fees_pay_tran_amount,
            'fees_pay_tran_date' => $this->fees_pay_tran_date,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'is_status' => $this->is_status,
        ]);

        return $dataProvider;
    }
}
