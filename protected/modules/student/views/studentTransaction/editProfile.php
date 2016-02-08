
<?php
$this->breadcrumbs=array(
	'Student'=>array('admin'),
	'Profile',
);
?>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>

</div>
<div class="portlet box green">
<i class="icon-reorder"></i>
 <div class="portlet-title">Fill Details
 </div>
<?php $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs'=>array(
          'Personal Profile' =>$this->renderPartial("tabs/_tab1", array('lang'=>$lang, 'model' => $model, 'info'=>$info), $this),
          'Guardian Info'=>$this->renderPartial("tabs/_tab2", array('model' => $model, 'info'=>$info), $this),
          'Address Info'=>$this->renderPartial("tabs/_tab4", array('address'=>$address, 'lang'=>$lang, 'model' => $model, 'info'=>$info), $this),
        ),      
        'options'=>array(
            'collapsible'=>true,
        ),
	'htmlOptions'=>array('class'=>'profile-tab'),
    ));
?>
</div>
