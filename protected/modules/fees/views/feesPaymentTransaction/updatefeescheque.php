<?php
$this->breadcrumbs=array(
	'Fees Payment Transactions'=>array('admin'),
	$model->fees_payment_transaction_id=>array('view','id'=>$model->fees_payment_transaction_id),
	'Update',
);
echo $this->renderPartial('paycheque_form', array('model'=>$model)); ?>
