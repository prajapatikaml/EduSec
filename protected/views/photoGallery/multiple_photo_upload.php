<?php
$this->breadcrumbs=array(
	'Photo Gallery'=>array('admin'),
	'Create',
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Photo Gallery</span>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
</div>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'photo-gallery-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data','multiple' => 'multiple'), // ADD THIS
)); ?>

<div class="row" style="padding-top:40px;">
<?php
 $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('photoGallery/upload'),
               'allowedExtensions'=>array("jpg","jpeg","gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>500*1024,// maximum file size in bytes
               'minSizeLimit'=>1*1024,
               'auto'=>true,
               'multiple' => true,
               'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
               'messages'=>array(
                                 'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
               )
 
               ));
?>
</div>


<?php $this->endWidget(); ?>
</div>
