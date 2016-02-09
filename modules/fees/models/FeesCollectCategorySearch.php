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
 * FeesCollectCategorySearch represents the model behind the search form about `app\modules\fees\models\FeesCollectCategory`.
 * @package EduSec.modules.fees.models
 */

namespace app\modules\fees\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\fees\models\FeesCollectCategory;

class FeesCollectCategorySearch extends FeesCollectCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fees_collect_category_id', 'created_by', 'updated_by', 'is_status'], 'integer'],
            [['fees_collect_name', 'fees_collect_details', 'fees_collect_start_date', 'fees_collect_end_date', 'fees_collect_due_date', 'fees_collect_batch_id', 'created_at', 'updated_at'], 'safe'],
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
        //$query = FeesCollectCategory::find()->where(['fees_collect_category.is_status' => 0 ]);
	$query = FeesCollectCategory::find();
	//$query->joinWith(['feesCollectBatch']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query, 'sort'=> ['defaultOrder' => ['fees_collect_category_id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'fees_collect_category_id' => $this->fees_collect_category_id,
            'fees_collect_start_date' => $this->dbDateSearch($this->fees_collect_start_date),
            'fees_collect_end_date' => $this->dbDateSearch($this->fees_collect_end_date),
            'fees_collect_due_date' => $this->dbDateSearch($this->fees_collect_due_date),
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'is_status' => $this->is_status,
        ]);

        $query->andFilterWhere(['like', 'fees_collect_name', $this->fees_collect_name])
              ->andFilterWhere(['like', 'fees_collect_details', $this->fees_collect_details])
	      ->andFilterWhere(['like', 'fees_collect_batch_id', $this->fees_collect_batch_id]);

	unset($_SESSION['exportData']);
	$_SESSION['exportData'] = $dataProvider;

        return $dataProvider;
    }

    public static function getExportData() 
    {
	$data = [
			'data'=>$_SESSION['exportData'],
			'fileName'=>'Fees-Category-List', 
			'title'=>'Fees Category Report',
			'exportFile'=>'@app/modules/fees/views/fees-collect-category/FeesCollectCategoryExportPdfExcel',
		];

	return $data;
    }

    private function dbDateSearch($value)
    {
            if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
                return date("Y-m-d",strtotime($matches[0]));
            else
                return $value;
    }
}
