<?php
$this->breadcrumbs=array(
	'Fees Payment Transactions'=>array('index'),
	$model->fees_payment_transaction_id,
);

$this->menu=array(
	array('label'=>'List FeesPaymentTransaction', 'url'=>array('index')),
	array('label'=>'Create FeesPaymentTransaction', 'url'=>array('create')),
	array('label'=>'Update FeesPaymentTransaction', 'url'=>array('update', 'id'=>$model->fees_payment_transaction_id)),
	array('label'=>'Delete FeesPaymentTransaction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fees_payment_transaction_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FeesPaymentTransaction', 'url'=>array('admin')),
);
?>

<h1>View FeesPaymentTransaction #<?php echo $model->fees_payment_transaction_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fees_payment_transaction_id',
		'fees_payment_type',
		'fees_payment_receipt_no',
		'fees_payment_student_id',
		'fees_payment_batch_id',
		'fees_payment_amount',
		'fees_payment_cheque_number',
		'fees_payment_cheque_date',
		'fees_payment_cheque_bank',
		'fees_payment_details',
		'fees_payment_received_date',
		'fees_payment_user_id',
	),
)); ?>
