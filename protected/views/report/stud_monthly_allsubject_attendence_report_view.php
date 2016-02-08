<?php
$this->breadcrumbs=array('Report',
	'Student Monthly AllSubjects Attendence Report',
	
);

$this->menu[]=	array('label'=>'', 'url'=>array('StudMonthlyAllsubjectAttendenceReport','excel'=>'excel','month'=>$month,'batch_id'=>$batch),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel','target'=>'_blank'));


?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Select Criterias</span>
</div>


<?php	
	$months = array();
	$year=date('Y');
	for( $i = 1; $i <= 12; $i++ ) 
	{
	    $months[ $i ] = strftime( '%B', mktime( 0, 0, 0, $i, 1 ));
	}
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>true,

)); ?>
		
	<div class="row">
		<?php echo $form->labelEx($model,'batch_id'); ?>
		<?php echo $form->dropDownList($model,'batch_id',CHtml::listData(Batch::model()->findAll(),'batch_id','batch_code'),array('tabindex'=>3,'empty' => 'Select Batch'));  ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'sem_name_id'); ?>
	</div>
	
	<div class="row">
	<?php echo CHtml::label(Yii::t('demo', 'Month'), 'month'); ?>
	<?php echo CHtml::dropDownList('months', '' , $months, array('prompt'=>'Select 			Month','options' =>array('selected'=>true))); ?>	
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array('class'=>'submit'));
			
		?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div>
<?php
$year = date('Y');
if(isset($month))
{
 $m=0;
 $month_value = $month;
 $num = cal_days_in_month(CAL_GREGORIAN, $month_value, date('Y')); 
 $org = Organization::model()->findAll();
$org_data=$org[0];
 $batch_model=Batch::model()->findByPk($batch);
 ?>
	<div class="portlet box yellow" style="width:100%;margin-top:20px;">
    <i class="icon-reorder"></i>
    <div class="portlet-title"><span class="box-title">Monthly All Subject Attendence Report</span>
    	<div class="operation">
	  <?php echo CHtml::link('Back', array('Report/StudMonthlyAllsubjectAttendenceReport'), array('class'=>'btnback'));?>	
	   <?php echo CHtml::link('Excel', array('StudMonthlyAllsubjectAttendenceReport','excel'=>'excel','month'=>$month,'batch_id'=>$batch), array('class'=>'btnblue'));?>	
	</div>
    </div>
<div class="portlet-body" >
	<?php	echo '<table class="report-table" border="2" > ';
	echo "<thead>";
	echo "<tr align=center> <th  colspan = 60 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";

	echo "<tr><th colspan = 60><h3> Batch  of ".$batch_model->batch_code."  All Students Month-".date("F", mktime(0,0,0,$month))." Subjectwise Attendence Report</h3></th> </tr>";

	
	echo "<tr class='table_header'>"; 
	echo " <th  rowspan=2 >SI No.</th>";
	echo "<th rowspan=2>Enroll No.</th>";
	echo " <th rowspan=2 >Student Name</th>";
	$totalT=array();
	$totalP=array();	
	$tot=0;
	$totp=0;
	$tot_t=0;
	$tot_p=0;
	$present=array();
	foreach($subjectid as $sub)
	{
		echo "<th colspan=2>";
		$sub_name = SubjectMaster::model()->findByAttributes(array('subject_master_id'=>$sub));
		echo $sub_name->subject_master_name."(".SubjectType::model()->findByPk($sub_name->subject_master_type_id)->subject_type_name.")";
		echo "</th>";
		$all_attendance = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND branch_id='.$branch.' AND sub_id='.$sub.' AND year(attendence_date)='.$year,'select'=>'attendence_date,student_attendence_period_id','distinct'=>'true'));
	
		$totalT[$sub]=count($all_attendance);
	}
	foreach($subjectidp as $sub)
	{
		echo "<th colspan=2>";
		$sub_name = SubjectMaster::model()->findByAttributes(array('subject_master_id'=>$sub));
		echo $sub_name->subject_master_name."(".SubjectType::model()->findByPk($sub_name->subject_master_type_id)->subject_type_name.")";
		echo "</th>";			
	$all_attendance = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND branch_id='.$branch.' AND sub_id='.$sub.' AND year(attendence_date)='.$year,'select'=>'attendence_date,student_attendence_period_id','distinct'=>'true'));
			$totalP[$sub]=count($all_attendance);
		
	}
		
		foreach($totalT as $t){
			$tot_t=$tot_t+$t;
		}		
		echo "<th rowspan=2> Total Theory Subjects <br> <br>Out <br>Of ".'<br> ( '.$tot_t.')'."</th> ";
		echo "<th rowspan=2> Total Theory Subjects <br><br><br> % </th>";

		foreach($totalP as $t){
			$tot_p=$tot_p+$t;
		}		
		echo "<th rowspan=2> Total Practical Subjects <br> <br>Out <br>Of ".'<br> ( '.$tot_p.')'."</th> ";
		echo "<th rowspan=2> Total Practical Subjects <br> <br><br> % </th>";
	
		echo "</tr><tr>";

		foreach($totalT as $t){
			echo "<th colspan=1> Out <br>Of ".'<br> ( '.$t.')'."</th><th > % </th>";	
		}

		foreach($totalP as $t){
			echo "<th colspan=1> Out <br>Of ".'<br> ( '.$t.')'."</th><th> % </th>";	
		}
		
		echo "</tr>";
				
	foreach($sid as $s)
	{
		 if(($m%2) == 0)
		 {
			  $class = "odd";
		 }
		 else
		 {
		        $class = "even";
		 }	
		echo '<tr class='.$class.'>';
		echo '<td>';
			echo ++$m;
		echo '</td>';
	$stud_name=StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$s));
		echo '<td>';
			if(!empty($stud_name->student_enroll_no))	
    			echo $stud_name->student_enroll_no;
		else
			echo 'Not Set';
		echo '</td>';
		echo '<td>';
			 echo $stud_name->student_first_name.' '.$stud_name->student_last_name.' ( '.$stud_name->student_roll_no.' )';
		echo '</td>';
		
		foreach($subjectid as $sub)
		{
			$present_attendance = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND branch_id='.$branch.' AND sub_id='.$sub.' AND year(attendence_date)='.$year.' AND attendence = "P" AND st_id='.$s));
		
			$present=count($present_attendance);
			$percentage=0;
			if($totalT[$sub]!=0)
				$percentage=($present*100)/$totalT[$sub];
		
			echo "<td > $present </td>";
			echo "<td>";
			echo round($percentage,2).'%';
			echo "</td>";
			$tot=$tot+$present;			
			$tot_percentage=0;
			if($tot!=0)
				$tot_percentage=($tot*100)/$tot_t;
		}
		foreach($subjectidp as $sub)
		{			
			$present_attendance = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND branch_id='.$branch.' AND sub_id='.$sub.' AND year(attendence_date)='.$year.' AND attendence = "P" AND st_id='.$s));
		
			$present=count($present_attendance);			
			$percentage=0;
			if($totalP[$sub]!=0)
				$percentage=($present*100)/$totalP[$sub];
		
			echo "<td > $present </td>";
			echo "<td>";
			echo round($percentage,2).'%';
			echo "</td>";

			$totp=$totp+$present;
			$totp_percentage=0;
			if($totp!=0)
				$totp_percentage=($totp*100)/$tot_p;			
		}
		echo "<td> $tot </td>";		
		$tot=0;
		echo "<td>" .round($tot_percentage,2) ."</td>";
		
		echo "<td> $totp </td>";		
		$totp=0;
		echo "<td>" .round($totp_percentage,2) ."</td>";
		echo '</tr>';	
	}	
	echo "</thead>";
	echo "</table>";

}
?>
</div>
</div>
</div>
