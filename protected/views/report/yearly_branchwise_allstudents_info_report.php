

<?php

$this->breadcrumbs=array('Report',
	'Yearly Branchwise All Students Info Report',
	);
$model=new StudentArchiveTable;
$yearModel = new Year;

$this->menu[]=array('label'=>'', 'url'=>array('YearlyBranchwiseAllstudentsInfoReport','excel'=>'excel','Year[year]'=>$year, 'StudentArchiveTable[student_archive_branch_id]'=>$branch),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel','target'=>'_blank'));

?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Select Criterias</span>
</div>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>true,
)); ?>
<?php	$org_id=Yii::app()->user->getState('org_id');	?>
	<div class="row">        
		 <?php echo $form->labelEx($yearModel,'year'); ?>
	         <?php echo $form->dropDownList($yearModel,'year',Year::items(),
			array(
			'prompt' => 'Select Year','options' =>array($year=>array('selected'=>true)),
			'ajax' => array(
			'type'=>'POST'))); 	?>
		<?php echo $form->error($yearModel,'year'); ?>		
	</div>	
	<div class="row">
		<?php echo $form->labelEx($model,'student_archive_branch_id'); ?>
		<?php echo $form->dropDownList($model,'student_archive_branch_id', CHtml::listData(Branch::model()->findAll(),'branch_id','branch_name'), array(
			'empty' => 'Select Branch','options' =>array($branch=>array('selected'=>true)),
			'ajax' => array(
			'type'=>'POST'))); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_archive_branch_id'); ?>		
	 </div>

<div class="row buttons">
	<?php echo CHtml::submitButton('Submit', array('class'=>'submit', 'onclick'=>"$('#loading').show();")); ?>
</div>
<div id="loading" style="display:none;"><img src="http://localhost/edusec/edusec/images/loading.gif" alt="" /></div>
<?php $this->endWidget(); ?>
</div>
</div>
<?php
if(isset($branch))
{
	echo "<div class='scrollableContainer'>";
	echo "<div class='scrollingArea CSSTableGenerator'>";

 	$org = Organization::model()->findAll();
	$org_data=$org[0];
        $branch_model=Branch::model()->findByPk($branch);
	$yr=Year::model()->findByPk($year);
?>
    <div class="portlet box yellow" style="width:100%;margin-top:20px;">
    <i class="icon-reorder"></i>
    <div class="portlet-title"><span class="box-title">Batchwise Student History Report</span>
    	<div class="operation">
	  <?php echo CHtml::link('Back', array('Report/YearlyBranchwiseAllstudentsInfoReport'), array('class'=>'btnback'));?>	
	   <?php echo CHtml::link('Excel', array('YearlyBranchwiseAllstudentsInfoReport','excel'=>'excel','Year[year]'=>$year, 'StudentArchiveTable[student_archive_branch_id]'=>$branch), array('class'=>'btnblue'));?>
	</div>
    </div>
	<div class="portlet-body" >
	<?php	echo '<table class="report-table" border="2" > ';
	echo '<thead>';
	echo "<tr align=center> <th  colspan = 60 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";

	
	echo "<tr><th colspan=60><h3> Batch-".$yr->year." Branch  of ".$branch_model->branch_name."  All Students History Report</h3></th> </tr>";
	
		
	
        echo "<thead>";
	echo "<tr class='table_header'>"; 
	echo "<th> SI<br> No.</th>";
	echo "<th> Enrollement<br> No. </th>";
	echo "<th colspan=2  > Student Full Name</th>";
	echo "<th> ACPC<br> Admission <br>Date </th>";
	foreach($startYear as $y)
	{
		 echo '<th>'.AcademicTermPeriod::model()->findByPk($y)->academic_term_period.'</th>';
	}
	echo "<th> Student <br>Current Status </th>";
	echo "</tr>";
	echo "</thead>";
	$m=0;	
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
		echo '<td>';
		$stud_name=StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$s['student_transaction_id']));			
		echo $stud_name->student_enroll_no;
		echo '</td>';
		echo '<td colspan=2 align=left>';
		echo $stud_name->student_first_name.' '.$stud_name->student_last_name.'<br> ( '.$stud_name->student_roll_no.' )';
		echo '</td>';
		echo '<td>';
			echo date("d-m-Y",strtotime($stud_name->student_adm_date));
		echo '</td>'; 
		foreach($startYear as $y)
		{
		  echo '<td style=width:150px; >';
		   $getSem = AcademicTerm::model()->findAll('academic_term_period_id ='.$y);
		   foreach($getSem as $sem) {
		      $status = StudentArchiveTable::model()->findAll(array('condition' => 'student_archive_stud_tran_id = '.$s['student_transaction_id'].' AND student_archive_ac_t_p_id ='.$y.' AND student_archive_ac_t_n_id ='.$sem['academic_term_id']));
			
			if(!empty($status))
			{			
			  foreach($status as $l)
			  {			  
			     $sName = AcademicTerm::model()->findByPk($l['student_archive_ac_t_n_id'])->academic_term_name;
			     $sStatus = Studentstatusmaster::model()->findByPk($l['student_archive_status'])->status_name;
			     echo 'SEM- '.$sName."-".$sStatus.'<br />';
			  }
			}
			else {
		$ldStatus = LeftDetainedPassStudentTable::model()->findAll('student_id ='. $s['student_transaction_id'].' AND academic_term_period_id ='.$y.' AND sem ='.$sem['academic_term_id']);
		    if(!empty($ldStatus))
		    {			
			  foreach($ldStatus as $l)
			  {
			     $sName = AcademicTerm::model()->findByPk($l['sem']);
			     if($sName)
				$semester = $sName->academic_term_name;
			     else
				$semester = '-';
			     $sStatus = Studentstatusmaster::model()->findByPk($l['status_id'])->status_name;
			     echo 'SEM- '.$semester."-".$sStatus.'<br />';
			  
			  }			
		    }
		  }
		}		
	}
	echo '</td>';
		$stud_tran=StudentTransaction::model()->findByPk($s['student_transaction_id']);
		$status=Studentstatusmaster::model()->findByAttributes(array('id'=> $stud_tran->student_transaction_detain_student_flag));
		$sem=AcademicTerm::model()->findByAttributes(array('academic_term_id'=> $stud_tran->student_academic_term_name_id ));
	echo '<td style=width:200px;>';
			echo 'SEM-'.$sem->academic_term_name .'  '.$status->status_name ;
	echo '</td>';	
	echo '</tr>';
   }
	
	echo "</table>";
}
?>
</div>
</div>
</div>
