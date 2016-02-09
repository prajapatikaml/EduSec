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
 * EmpMasterSearch represents the model behind the search form about `app\modules\employee\models\EmpMaster`.
 * @package EduSec.modules.employee.models
 */

namespace app\modules\employee\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\employee\models\EmpMaster;

class EmpMasterSearch extends EmpMaster
{
    /**
     * @inheritdoc
     */
	public $emp_unique_id,$emp_first_name,$emp_middle_name,$emp_last_name,$user_login_id;

    public function rules()
    {
        return [
            [['emp_master_id', 'emp_master_emp_info_id', 'emp_master_user_id', 'emp_master_department_id', 'emp_master_designation_id', 'emp_master_category_id', 'emp_master_nationality_id', 'emp_master_emp_address_id', 'emp_master_status_id', 'created_by', 'updated_by', 'is_status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
	    [['emp_unique_id','emp_first_name','emp_middle_name','emp_last_name'],'safe'],	
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
        $query = EmpMaster::find()->where(['is_status' => 0]);
	$query->joinWith(['empMasterEmpInfo','empMasterUser']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query, 'sort' => ['enableMultiSort' => true],
	    'sort'=> ['defaultOrder' => ['emp_master_id'=>SORT_DESC]]
        ]);
	$dataProvider->sort->attributes['emp_unique_id'] = [
        'asc' => ['emp_info.emp_unique_id' => SORT_ASC],
        'desc' => ['emp_info.emp_unique_id' => SORT_DESC],
        ];
	$dataProvider->sort->attributes['emp_first_name'] = [
        'asc' => ['emp_info.emp_first_name' => SORT_ASC],
        'desc' => ['emp_info.emp_first_name' => SORT_DESC],
        ];
	$dataProvider->sort->attributes['emp_middle_name'] = [
        'asc' => ['emp_middle_name' => SORT_ASC],
        'desc' => ['emp_middle_name' => SORT_DESC],
        ];
	$dataProvider->sort->attributes['emp_last_name'] = [
        'asc' => ['emp_last_name' => SORT_ASC],
        'desc' => ['emp_last_name' => SORT_DESC],
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
            'emp_master_id' => $this->emp_master_id,
            'emp_master_emp_info_id' => $this->emp_master_emp_info_id,
            'emp_master_user_id' => $this->emp_master_user_id,
            'emp_master_department_id' => $this->emp_master_department_id,
            'emp_master_designation_id' => $this->emp_master_designation_id,
            'emp_master_category_id' => $this->emp_master_category_id,
            'emp_master_nationality_id' => $this->emp_master_nationality_id,
            'emp_master_emp_address_id' => $this->emp_master_emp_address_id,
            'emp_master_status_id' => $this->emp_master_status_id,
	    'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
            'is_status' => $this->is_status,
        ]);
	$query->andFilterWhere(['like', 'emp_info.emp_first_name', $this->emp_first_name])
	      ->andFilterWhere(['like', 'emp_info.emp_last_name', $this->emp_last_name])
	      ->andFilterWhere(['like','emp_info.emp_middle_name',$this->emp_middle_name])
	      ->andFilterWhere(['like', 'users.user_login_id', $this->user_login_id])
	      ->andFilterWhere(['like','emp_info.emp_unique_id',$this->emp_unique_id]);	
	
	unset($_SESSION['exportData']);
	$_SESSION['exportData'] = $dataProvider;
	
        return $dataProvider;
    }

    public static function getExportData() 
    {
		$data = [
			'data'=>$_SESSION['exportData'],
			'fileName'=>'Employee-Master-List', 
			'title'=>'Employee Master Report',
			'exportFile'=>'@app/modules/employee/views/emp-master/EmpMasterExportPdfExcel',
		];
		//print_r($data);exit;

	return $data;
    }
}
