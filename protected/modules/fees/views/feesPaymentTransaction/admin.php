<?php
$this->breadcrumbs=array(
	'Fees Payment Transactions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FeesPaymentTransaction', 'url'=>array('index')),
	array('label'=>'Create FeesPaymentTransaction', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('fees-payment-transaction-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Fees Payment Transactions</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'fees-payment-transaction-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'fees_payment_transaction_id',
		'fees_payment_type',
		'fees_payment_receipt_no',
		'fees_payment_student_id',
		'fees_payment_batch_id',
		'fees_payment_amount',
		/*
		'fees_payment_cheque_number',
		'fees_payment_cheque_date',
		'fees_payment_cheque_bank',
		'fees_payment_details',
		'fees_payment_received_date',
		'fees_payment_user_id',
		*/
		array(
			'class'=>'MyCButtonColumn',
		),
	),
)); ?>
