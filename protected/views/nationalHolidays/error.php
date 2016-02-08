</br></br>
<?php
if(!empty($_REQUEST['date'])){ ?>
<div class="operation">
<?php echo CHtml::link('BACK', Yii::app()->createUrl('/dashboard'), array('class'=>'btnback'));?>
</div>
</br></br>
<h1>Cant Create/Update this Holiday, because this date already gone.</h1>
<?php }

else{
echo CHtml::link('BACK',Yii::app()->createUrl('/nationalHolidays/admin'),array('class'=>'btnCan')); 
?>
</br></br>
<h1>Cant Update this Holiday, because this date already gone.</h1>
<?php } ?>
