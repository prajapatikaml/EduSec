<div class="portlet box blue" >
<div class="portlet-title"><i class="fa fa-inr"></i><span class="box-title">Fees Details</span>
</div>
<div class="operation">
<?php if(!Yii::app()->user->getState('stud_id') && !Yii::app()->user->getState('emp_id')) { ?>
<?php echo CHtml::link('<i class="fa fa-money"></i>Cash',array('payfeescash','id'=>$_REQUEST['id']), array('id'=>'testing','class'=>'btn green')); ?>
<?php echo CHtml::link('<i class="fa fa-credit-card"></i>Cheque / DD',array('payfeescheque','id'=>$_REQUEST['id']), array('id'=>'testing','class'=>'btnblue')); ?>
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back','addFees', array('class'=>'btnyellow')); } ?>
</div>
<div class="grid-view">
	<table class="items" style="float:left;width:100%;border-collapse: collapse;">
	  <tr class="table_header">
	     <th>SI.NO.</th>
	     <th>Date</th>
	    <!-- <th>Payable Amount</th> -->
	     <th>Payment Method</th>
	     <th>Paid Amount</th>
	     <th>Cheque/DD Number</th>
	     <th>Receipt Number</th>
		<?php  if(Yii::app()->user->checkAccess('Fees.FeesPaymentTransaction.Updatefeescash') && Yii::app()->user->checkAccess('Fees.FeesPaymentTransaction.Updatefeescheque'))
			{ ?>
	     <th>&nbsp;&nbsp;&nbsp;</th>  
		<?php  }?>
	  </tr>
<?php    
	   $paidFees = Yii::app()->db->createCommand()
                ->select('*')
                ->from('fees_payment_transaction')
                ->where('fees_payment_student_id ='.$_REQUEST['id'])
                ->queryAll();

	$fees = Yii::app()->db->createCommand()
		->select('batch_fees')
		->from('batch as b')
		->join('course as c','b.course_id=c.course_id')
		->where('b.batch_id='.StudentTransaction::model()->findByPk($_REQUEST['id'])->student_transaction_batch_id)
		->queryRow();

	    if(!empty($paidFees)) {
		$i=1;
		foreach($paidFees as $details)
		{
	  	 echo '<tr align="center">';
	       echo '<td>'.$i.'</td>';
	       echo '<td>'.date_format(new DateTime($details['fees_payment_received_date']),'d-m-Y').'</td>';
	       //echo '<td>'.$fees['course_fees'].'</td>';
	       echo '<td>'.$details['fees_payment_type'].'</td>';
	       echo '<td>'.$details['fees_payment_amount'].'</td>';
	       echo '<td>'.$details['fees_payment_cheque_number'].'</td>';
	       echo '<td>'.$details['fees_payment_receipt_no'].'</td>';
		if(Yii::app()->user->checkAccess('Fees.FeesPaymentTransaction.Updatefeescash') && Yii::app()->user->checkAccess('Fees.FeesPaymentTransaction.Updatefeescheque'))
			{
		echo '<td>';
		if($details['fees_payment_type']=='Cash'){
		echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/update.png", 'Edit'), array('Upadatefeescash', 'id'=>$_REQUEST['id'],'fees_id'=>$details['fees_payment_transaction_id']));

		}
		else
		{
		echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/update.png", 'Edit'), array('updatefeescheque', 'id'=>$_REQUEST['id'],'fees_id'=>$details['fees_payment_transaction_id']));
		}
		echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/delete.png", 'delete'), array('delete', 'id'=>$details['fees_payment_transaction_id']));
		echo '</td>';
			}
		echo '</tr>';
		$i++;
		}
	}
     echo '</table>';
?>
</div>

</div>
