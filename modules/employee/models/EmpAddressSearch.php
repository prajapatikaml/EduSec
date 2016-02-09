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
 * EmpAddressSearch represents the model behind the search form about `app\modules\employee\models\EmpAddress`.
 * @package EduSec.modules.employee.models
 */

namespace app\modules\employee\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\employee\models\EmpAddress;

class EmpAddressSearch extends EmpAddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_address_id', 'emp_cadd_city', 'emp_cadd_state', 'emp_cadd_country', 'emp_cadd_pincode', 'emp_padd_city', 'emp_padd_state', 'emp_padd_country', 'emp_padd_pincode'], 'integer'],
            [['emp_cadd', 'emp_cadd_house_no', 'emp_cadd_phone_no', 'emp_padd', 'emp_padd_house_no', 'emp_padd_phone_no'], 'safe'],
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
        $query = EmpAddress::find();

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
            'emp_address_id' => $this->emp_address_id,
            'emp_cadd_city' => $this->emp_cadd_city,
            'emp_cadd_state' => $this->emp_cadd_state,
            'emp_cadd_country' => $this->emp_cadd_country,
            'emp_cadd_pincode' => $this->emp_cadd_pincode,
            'emp_padd_city' => $this->emp_padd_city,
            'emp_padd_state' => $this->emp_padd_state,
            'emp_padd_country' => $this->emp_padd_country,
            'emp_padd_pincode' => $this->emp_padd_pincode,
        ]);

        $query->andFilterWhere(['like', 'emp_cadd', $this->emp_cadd])
            ->andFilterWhere(['like', 'emp_cadd_house_no', $this->emp_cadd_house_no])
            ->andFilterWhere(['like', 'emp_cadd_phone_no', $this->emp_cadd_phone_no])
            ->andFilterWhere(['like', 'emp_padd', $this->emp_padd])
            ->andFilterWhere(['like', 'emp_padd_house_no', $this->emp_padd_house_no])
            ->andFilterWhere(['like', 'emp_padd_phone_no', $this->emp_padd_phone_no]);

        return $dataProvider;
    }
}
