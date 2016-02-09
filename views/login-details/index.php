<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoginDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Login Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
   <div class="col-lg-4 col-sm-4 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-th-list"></i> <?= $this->title ?></h3></div>
   <div class="col-xs-4"></div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body table-responsive">
   	<div class="login-details-index">
	    <?= GridView::widget([
	        'dataProvider' => $dataProvider,
		'summary'=>'',
	        'columns' => [
	            ['class' => 'yii\grid\SerialColumn'],

			[
				'attribute'=>'login_user_id',
				'value'=> function($model) {
						return (!empty(User::findOne($model->login_user_id)->user_login_id) ? User::findOne($model->login_user_id)->user_login_id : " ");
				},
			],
			[
	                	'attribute'=>'login_at',
		                'value'=> function($model) {
						return Yii::$app->formatter->asDateTime($model->login_at);
				},
		        ],
			[
	                	'attribute'=>'logout_at',		
		                'value'=> function($model) {
						return ($model->logout_at == null) ? " " : Yii::$app->formatter->asDateTime($model->logout_at);
					},
		        ],
			'user_ip_address',
			[
				'label'=>'Status',
				'format'=>'raw',
				'value'=> function($model) { 
						return ($model->login_status == 1) ? '<span class="glyphicon glyphicon-ok-sign" style="font-size:25px;color:#449D44"></span>' : '<span class="glyphicon glyphicon-remove-sign" style="font-size:25px;color:#C9302C"></span>';
				},
	                 ],	
		],
	   ]); ?>
       </div>
     </div>
   </div>
</div>
