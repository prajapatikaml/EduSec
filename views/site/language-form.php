<?php
use yii\helpers\Html;

$this->title = Yii::t('app', 'Select Language | EduSec');
$this->registerJs("(function($) {
      $('#langModal').modal();
  })(jQuery);", yii\web\View::POS_END, 'lang');
?>

<?= Html::beginForm() ?>
<?php 
	yii\bootstrap\Modal::begin([
				'id' => 'langModal',
				'header' => "<h4 class=\"modal-title\">".Html::encode('Select Language')."</h4>",
				'footer' => Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-success pull-left'])." ".Html::a('Close', ['site/index'], ['class' => 'btn btn-default']),
				'closeButton' => false,
				'options' => ['data-backdrop' => 'static', 'data-keyboard' => 'false']
	]); 
?>
	<div class="modal-body">
		<div class="row">
			<?= Html::radioList('language', Yii::$app->language, ['en' => Yii::t('app', 'English'), 'gu' => Yii::t('app', 'Gujarati (ગુજરાતી)'), 'hi' => Yii::t('app', 'Hindi (हिन्दी)'), 'fr' => Yii::t('app', 'French (français)'), 'es' => Yii::t('app', 'Spanish (Latin American)'), 'ar' => Yii::t('app', 'Arabic (العربية)')], 								
								[ 'item' => function($index, $label, $name, $checked, $value) {
			                        $return = '<label class="left-padding">';
			                        $return .= Html::radio($name, $checked, ['value' => $value]);
			                        $return .= '<i></i>';
			                        $return .= '<span>&nbsp;&nbsp;&nbsp;' . ucwords($label) . '</span>';
			                        $return .= '</label><br/>';
			                        return $return;
			 }]) ?>
		</div>
	</div>
<?php yii\bootstrap\Modal::end(); ?>
<?= Html::endForm() ?>




