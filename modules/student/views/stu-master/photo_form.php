<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */

$this->title = Html::encode("Upload Photo of ").$model->stuMasterStuInfo->getName();

$this->params['breadcrumbs'][] = ['label' => 'Student Master', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Student Photo'];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.stu-photo-form .file-input-wrapper {
    float: none;
    margin-top: 2%;
    width: auto;
}
</style>
<script>
// *** Upload Image Preview ***
 	var imageTypes = ['jpeg', 'jpg', 'png', 'gif']; //Validate the images to show
        function showImage(src, target)
        {
            var fr = new FileReader();
            fr.onload = function(e)
            {
                target.src = this.result;
            };
            fr.readAsDataURL(src.files[0]);
        }
        var uploadImage = function(obj)
        {
            var val = obj.value;
            var lastInd = val.lastIndexOf('.');
            var ext = val.slice(lastInd + 1, val.length);
            if (imageTypes.indexOf(ext) !== -1)
            {
                var id = $(obj).data('target');                    
                var src = obj;
                var target = $(id)[0];                    
                showImage(src, target);
            }
        }

// *** file upload input style ***
$(document).ready(function(){
     $('#<?php echo Html::getInputId($info, "stu_photo"); ?>').bootstrapFileInput();
});
</script>
<div class="col-xs-12 col-lg-12" style="border-bottom: 1px solid rgb(244, 244, 244);">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-edit"></i>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
	<?= Html::encode($this->title) ?> </h3>
  </div>
</div>

<div class="col-xs-12 col-lg-12">
  <div class="box box-info box-solid view-item col-xs-12 col-lg-12 no-padding">
   <div class="box-header with-border">
         <h4 class="box-title"><i class="fa fa-picture-o"></i> Profile Photo</h4>
   </div>
   <div class="box-body">
    <div class="stu-photo-form">
    <?php $form = ActiveForm::begin([
			'id' => 'stu-photo-form',
			'options' => ['enctype' => 'multipart/form-data'],
			'fieldConfig' => [
			    'template' => "{input}{error}",
			],			
    ]); ?>
   
    <div class="col-xs-12 col-md-12 text-center">
	   <?php echo Html::img($info->getStuPhoto($info->stu_photo), ["width"=>"150px", "height"=>"150px", 'alt'=>'No Image', 'id'=>'stu-photo-prev']); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-lg-12 text-center no-padding"> 
	   <?= $form->field($info,'stu_photo')->fileInput(['data-filename-placement' => "inside", 'title' => 'Browse Photo', 'onchange'=>'uploadImage(this)', 'data-target'=>'#stu-photo-prev']) ?>
    </div>

    <div class="hint col-xs-12 col-sm-12" style="color:red;padding-top:15px"><b>Note:- </b>&nbsp;Only Upload Jpeg, Jpg, Png, Gif Type
    </div>
 
    <div class="form-group col-xs-12 col-sm-12 no-padding">
	<hr>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord  ? 'btn btn-success' : 'btn btn-info']) ?>
    </div>
    <?php ActiveForm::end(); ?>   
    </div> 
   </div>
  </div>   
</div>
