<?php
$this->breadcrumbs=array(
	'Employee'=>array('admin'),
	'Profile',
);
?>

<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('updateTab1' ,'id'=>$model->employee_transaction_id), array('class'=>'btnupdate'));?>
</div>

<div class="portlet box green">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Details
 </div>

<?php $this->widget('zii.widgets.jui.CJuiTabs', array(
	'headerTemplate'=>'<li><a href="{url}" title="{title}">{title}</a></li>',
        'tabs'=>array(
          'Personal Profile' =>$this->renderPartial("tabs/view_tab1", array('lang'=>$lang, 'model' => $model, 'info'=>$info), $this),
          'Guardian Info'=>$this->renderPartial("tabs/view_tab2", array('model' => $model, 'info'=>$info), $this),
          'Address Info'=>$this->renderPartial("tabs/view_tab4", array('address'=>$address, 'lang'=>$lang, 'model' => $model, 'info'=>$info), $this),
	'Academic Record'=>$this->renderPartial("tabs/view_academicrec", array('emp_record'=>$emp_record), $this),
	'Documents'=>$this->renderPartial("tabs/view_document", array('emp_doc'=>$emp_doc), $this),

        ),        

	'htmlOptions'=> array(
	    'class'=> 'profile-tab',
	),
    ));
?>

<div class="profile-picture">
<?php $pic = EmployeePhotos::model()->findByPk($model->employee_transaction_emp_photos_id)->employee_photos_path;
   echo CHtml::image(Yii::app()->baseUrl.'/college_data/emp_images/'.$pic, 'employee', array('width'=>200,'height'=>200));
?>
</div>
</div>
