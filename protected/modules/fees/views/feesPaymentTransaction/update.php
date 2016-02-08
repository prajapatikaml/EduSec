<?php
$this->breadcrumbs=array(
	'Fees Payment Transactions'=>array('index'),
	$model->fees_payment_transaction_id=>array('view','id'=>$model->fees_payment_transaction_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FeesPaymentTransaction', 'url'=>array('index')),
	array('label'=>'Create FeesPaymentTransaction', 'url'=>array('create')),
	array('label'=>'View FeesPaymentTransaction', 'url'=>array('view', 'id'=>$model->fees_payment_transaction_id)),
	array('label'=>'Manage FeesPaymentTransaction', 'url'=>array('admin')),
);
?>

<h1>Update FeesPaymentTransaction <?php echo $model->fees_payment_transaction_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>