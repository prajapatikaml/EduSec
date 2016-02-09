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
 * StuMasterSearch represents the model behind the search form about `app\modules\student\models\StuMaster`.
 * @package EduSec.modules.student.model
 */
namespace app\modules\student\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\student\models\StuMaster;

class StuMasterSearch extends StuMaster
{
    public $stu_unique_id, $stu_first_name, $stu_last_name , $user_login_id;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stu_master_id', 'stu_master_stu_info_id', 'stu_master_user_id', 'stu_master_nationality_id', 'stu_master_category_id', 'stu_master_course_id', 'stu_master_batch_id', 'stu_master_section_id', 'stu_master_stu_status_id', 'stu_master_stu_address_id', 'created_by', 'updated_by', 'is_status'], 'integer'],
            [['created_at', 'updated_at','stu_first_name', 'stu_last_name', 'stu_unique_id', 'user_login_id'], 'safe'],
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
        $query = StuMaster::find()->where(['is_status' => 0]);
	$query->joinWith(['stuMasterStuInfo', 'stuMasterUser']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
	    'sort'=> ['defaultOrder' => ['stu_master_id'=>SORT_DESC]]
        ]);

	$dataProvider->sort->attributes['stu_first_name'] = [
        'asc' => ['stu_info.stu_first_name' => SORT_ASC],
        'desc' => ['stu_info.stu_first_name' => SORT_DESC],
        ];
	$dataProvider->sort->attributes['stu_last_name'] = [
        'asc' => ['stu_info.stu_last_name' => SORT_ASC],
        'desc' => ['stu_info.stu_last_name' => SORT_DESC],
        ];
	$dataProvider->sort->attributes['stu_unique_id'] = [
        'asc' => ['stu_info.stu_unique_id' => SORT_ASC],
        'desc' => ['stu_info.stu_unique_id' => SORT_DESC],
        ];
	$dataProvider->sort->attributes['user_login_id'] = [
        'asc' => ['users.user_login_id' => SORT_ASC],
        'desc' => ['users.user_login_id' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'stu_master_id' => $this->stu_master_id,
            'stu_master_stu_info_id' => $this->stu_master_stu_info_id,
            'stu_master_user_id' => $this->stu_master_user_id,
            'stu_master_nationality_id' => $this->stu_master_nationality_id,
            'stu_master_category_id' => $this->stu_master_category_id,
            'stu_master_course_id' => $this->stu_master_course_id,
            'stu_master_batch_id' => $this->stu_master_batch_id,
            'stu_master_section_id' => $this->stu_master_section_id,
            'stu_master_stu_status_id' => $this->stu_master_stu_status_id,
            'stu_master_stu_address_id' => $this->stu_master_stu_address_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'is_status' => $this->is_status,
        ]);
	$query->andFilterWhere(['like', 'stu_info.stu_first_name', $this->stu_first_name])
	      ->andFilterWhere(['like', 'stu_info.stu_unique_id', $this->stu_unique_id])
	      ->andFilterWhere(['like', 'users.user_login_id', $this->user_login_id])
	      ->andFilterWhere(['like', 'stu_info.stu_last_name', $this->stu_last_name]);

	unset($_SESSION['exportData']);
	$_SESSION['exportData'] = $dataProvider;

        return $dataProvider;
    }

    public static function getExportData() 
    {
	$data = [
			'data'=>$_SESSION['exportData'],
			'fileName'=>'Student-Master-List', 
			'title'=>'Student Master Report',
			'exportFile'=>'@app/modules/student/views/stu-master/StuMasterExportPdfExcel',
		];

	return $data;
    }
}
