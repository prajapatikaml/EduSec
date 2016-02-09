<?php
/**
 * @link http://phe.me
 * @copyright Copyright (c) 2014 Pheme
 * @license MIT http://opensource.org/licenses/MIT
 */

namespace pheme\grid;

use yii\grid\DataColumn;
use yii\helpers\Html;
use yii\web\View;
use Yii;
?>
<style>
.glyphicon-remove-circle {
  color : #C9302C;
}
.glyphicon-ok-circle {
  color : #449D44;
}
</style>
<?php
/**
 * @author Aris Karageorgos <aris@phe.me>
 */
class ToggleColumn extends DataColumn
{
    /**
     * Toggle action that will be used as the toggle action in your controller
     * @var string
     */
    public $action = 'toggle';

    /**
     * Whether to use ajax or not
     * @var bool
     */
    public $enableAjax = true;

    public function init()
    {
        if ($this->enableAjax) {
            $this->registerJs();
        }
    }

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
	/* @Edited By AmitG  */
	if(get_class($model) == 'app\modules\dashboard\models\Notice')
        	$url = [$this->action, 'id' => $model->notice_id];

	if(get_class($model) == 'app\modules\dashboard\models\MsgOfDay')
		$url = [$this->action, 'id' => $model->msg_of_day_id];

	if(get_class($model) == 'app\modules\fees\models\FeesCollectCategory')
		$url = [$this->action, 'id' => $model->fees_collect_category_id];

	if(get_class($model) == 'app\modules\course\models\Courses') 
		$url = [$this->action, 'id' => $model->course_id];

	if(get_class($model) == 'app\modules\course\models\Batches')
		$url = [$this->action, 'id' => $model->batch_id];

	if(get_class($model) == 'app\modules\course\models\Section')
		$url = [$this->action, 'id' => $model->section_id];

        $attribute = $this->attribute;
        $value = $model->$attribute;
	
        if ($value === null || $value == 0 ) {		// 4-5-2015   $value=true replace with $value=0
            $icon = 'ok';
            $title = Yii::t('yii', 'Active');
        } else {
            $icon = 'remove';
            $title = Yii::t('yii', 'InActive');
        }
        return Html::a(
            '<span class="glyphicon glyphicon-' . $icon . '-circle" style="font-size:25px"></span>',
            $url,
            [
                'title' => $title,
                'class' => 'toggle-column',
                'data-method' => 'post',
                'data-pjax' => '0',
            ]
        );
    }

    /**
     * Registers the ajax JS
     */
    public function registerJs()
    {
        $js = <<< JS
$("a.toggle-column").on("click", function(e) {
    e.preventDefault();
    $.post($(this).attr("href"), function(data) {
        var pjaxId = $(e.target).closest(".grid-view").parent().attr("id");
        $.pjax.reload({container:"#" + pjaxId});
    });
    return false;
});
JS;
        $this->grid->view->registerJs($js, View::POS_READY, 'pheme-toggle-column');
    }
}
