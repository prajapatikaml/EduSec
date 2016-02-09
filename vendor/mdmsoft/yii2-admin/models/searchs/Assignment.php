<?php

namespace mdm\admin\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AssignmentSearch represents the model behind the search form about Assignment.
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class Assignment extends Model
{
    public $id;
    public $username,$user_login_id,$user_type,$item_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'username','user_login_id','user_type','item_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('rbac-admin', 'ID'),
            'username' => Yii::t('rbac-admin', 'Username'),
            'name' => Yii::t('rbac-admin', 'Name'),
        ];
    }

    /**
     * Create data provider for Assignment model.
     * @param  array                        $params
     * @param  \yii\db\ActiveRecord         $class
     * @param  string                       $usernameField
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params, $class, $usernameField)
    {
        $query = $class::find();
	//$query->joinWith(['authuser', 'stuMaster', 'empMaster']);
	//$query->orWhere(['<>', 'stu_master.is_status', '2'])->orWhere(['<>', 'emp_master.is_status', '2']);
	$query->join('LEFT OUTER JOIN', 'stu_master as sm', 'sm.stu_master_user_id = users.user_id AND users.user_type ="S"')
	      ->join('LEFT OUTER JOIN', 'emp_master as em', 'em.emp_master_user_id = users.user_id AND users.user_type ="E"')
	      ->join('LEFT OUTER JOIN', 'auth_assignment as aa', 'aa.user_id = users.user_id')
	      ->where("(sm.is_status <> 2 OR em.is_status <> 2) OR users.user_type='A'");

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

	$dataProvider->sort->attributes['item_name'] = [
        	'asc' => ['aa.item_name' => SORT_ASC],
        	'desc' => ['aa.item_name' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', $usernameField, $this->user_login_id])
	      ->andFilterWhere(['like', 'user_type', $this->user_type])
	      ->andFilterWhere(['like', 'aa.item_name', $this->item_name]);

        return $dataProvider;
    }
}
