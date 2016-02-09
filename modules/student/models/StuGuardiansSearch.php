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
 * StuGuardiansSearch represents the model behind the search form about `app\modules\student\models\StuGuardians`.
 * @package EduSec.modules.student.model
 */

namespace app\modules\student\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\student\models\StuGuardians;

class StuGuardiansSearch extends StuGuardians
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stu_guardian_id', 'guardian_mobile_no', 'guardia_stu_master_id'], 'integer'],
            [['guardian_name', 'guardian_relation', 'guardian_phone_no', 'guardian_qualification', 'guardian_occupation', 'guardian_income', 'guardian_email', 'guardian_home_address', 'guardian_office_address'], 'safe'],
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
        $query = StuGuardians::find()->where(['is_status' => 0]);

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
            'stu_guardian_id' => $this->stu_guardian_id,
            'guardian_mobile_no' => $this->guardian_mobile_no,
            'guardia_stu_master_id' => $this->guardia_stu_master_id,
        ]);

        $query->andFilterWhere(['like', 'guardian_name', $this->guardian_name])
            ->andFilterWhere(['like', 'guardian_relation', $this->guardian_relation])
            ->andFilterWhere(['like', 'guardian_phone_no', $this->guardian_phone_no])
            ->andFilterWhere(['like', 'guardian_qualification', $this->guardian_qualification])
            ->andFilterWhere(['like', 'guardian_occupation', $this->guardian_occupation])
            ->andFilterWhere(['like', 'guardian_income', $this->guardian_income])
            ->andFilterWhere(['like', 'guardian_email', $this->guardian_email])
            ->andFilterWhere(['like', 'guardian_home_address', $this->guardian_home_address])
            ->andFilterWhere(['like', 'guardian_office_address', $this->guardian_office_address]);

        return $dataProvider;
    }

    public function getGuardians($params)
    {
        $query = StuGuardians::find()->where(['is_status' => 0]);
	$query->join('join', 'stu_guardians as sg', 'sg.guardia_stu_master_id = stu_master.stu_master_id'			
	)
	//->join('join', 'stu_info as si', 'si.stu_info_id = stu_master.stu_master_stu_info_id')
	->where("stu_master.stu_master_id = ".$params['id']);

	$query->joinWith(['guardiaStuMaster']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }
}
