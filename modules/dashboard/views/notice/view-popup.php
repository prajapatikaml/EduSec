<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Notice */
?>


<div class="box box-solid">
	<div class="box-body table-responsive no-padding">
	<?= DetailView::widget([
		'model' => $model,
		'options'=>['class'=>'table'],
		'attributes' => [
			'notice_title',
			'notice_description',
			[
				'attribute' => 'notice_date',
				'value' => Yii::$app->formatter->asDate($model->notice_date),
				'format' => 'raw',
			],
			[
				'attribute' => 'notice_file_path',
				'format' => 'raw',
				'value' =>  (!empty($model->notice_file_path) ? Html::a($model->notice_file_path, ['notice-file', 'nid' => $model->notice_id], $htmlOptions=["target"=>"_blank", 'data' => ['method' => 'post',]]) : " - ")
			],
		],
	]) ?>
	</div>
</div>
