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
 * StuAddressSearch represents the model behind the search form about `app\modules\student\models\StuAddress`.
 * @package EduSec.modules.student.model
 */

namespace app\modules\student\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\student\models\StuAddress;

class StuAddressSearch extends StuAddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stu_address_id', 'stu_cadd_city', 'stu_cadd_state', 'stu_cadd_country', 'stu_cadd_pincode', 'stu_padd_city', 'stu_padd_state', 'stu_padd_country', 'stu_padd_pincode'], 'integer'],
            [['stu_cadd', 'stu_cadd_house_no', 'stu_cadd_phone_no', 'stu_padd', 'stu_padd_house_no', 'stu_padd_phone_no'], 'safe'],
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
        $query = StuAddress::find();

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
            'stu_address_id' => $this->stu_address_id,
            'stu_cadd_city' => $this->stu_cadd_city,
            'stu_cadd_state' => $this->stu_cadd_state,
            'stu_cadd_country' => $this->stu_cadd_country,
            'stu_cadd_pincode' => $this->stu_cadd_pincode,
            'stu_padd_city' => $this->stu_padd_city,
            'stu_padd_state' => $this->stu_padd_state,
            'stu_padd_country' => $this->stu_padd_country,
            'stu_padd_pincode' => $this->stu_padd_pincode,
        ]);

        $query->andFilterWhere(['like', 'stu_cadd', $this->stu_cadd])
            ->andFilterWhere(['like', 'stu_cadd_house_no', $this->stu_cadd_house_no])
            ->andFilterWhere(['like', 'stu_cadd_phone_no', $this->stu_cadd_phone_no])
            ->andFilterWhere(['like', 'stu_padd', $this->stu_padd])
            ->andFilterWhere(['like', 'stu_padd_house_no', $this->stu_padd_house_no])
            ->andFilterWhere(['like', 'stu_padd_phone_no', $this->stu_padd_phone_no]);

        return $dataProvider;
    }
}
