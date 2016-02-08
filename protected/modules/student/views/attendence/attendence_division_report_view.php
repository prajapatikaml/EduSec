<style>
.topic-covered th {
`  -moz-transform-origin:0 50%;
  -ms-transform:rotate(270deg); /* IE 9 */
  -moz-transform:rotate(270deg); /* Firefox */
  -webkit-transform:rotate(270deg); /* Safari and Chrome */
  -o-transform:rotate(270deg); /* Opera */
 filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
 width:100%;
 overflow:inherit;
    }

</style>
<?php
$this->breadcrumbs=array(
	'Division Report',
	'Add',
);
?>

<?php
	$m=1;
	
if(isset($month)) {
	$this->menu[]=	array('label'=>'', 'url'=>array('attendencedivisionreport','excel'=>'excel','branch_id'=>$branch_id,'sem_id'=>$sem,'div_id'=>$div_id,'month'=>$month,'subject'=>$selsub,'deleivered_topic'=>$deleivered_topic),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel','target'=>'_blank'));
}
if(isset($div_id))
 $div_model = Division::model()->findByPk($div_id);
 $branch_model=Branch::model()->findByPk($branch_id);
 $acd_model = AcademicTerm::model()->findByPk($sem);
?>
<div class="portlet box gray">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Select Criterias</span>
</div>
<table  border="2px" id="twoColThinTable" class="report-table" style="float:left;">
<tr class="row">	
	<td class="col1"> Branch </td> 
	<td class="col2"><?php echo $branch_model->branch_name; ?></td>
</tr>
<tr class="row">
	<td class="col1">Semester </td> 
	<td class="col2"> <?php echo $acd_model->academic_term_name;?></td>
</tr>

<tr class="row">	
	<td class="col1">Division </td> 
	<td class="col2"><?php echo (!empty($div_id))?$div_model->division_code:"";?></td>
</tr>	

</table></br>
</div>
<!-- motnh drop down  %B Full month name,-->
<?php
$months = array();
$year=date('Y');
for( $i = 1; $i <= 12; $i++ ) {
    $months[ $i ] = strftime( '%B', mktime( 0, 0, 0, $i, 1 ));
}
?>
<div class="portlet box blue" style="width:80%;margin-left:20px;">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Select Criterias</span>
</div>
<div class="form" style="float:left;">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>true,

)); ?>
<div class="row">
	<?php echo CHtml::label(Yii::t('demo', 'Month'), 'month'); ?>
	<?php
		echo CHtml::dropDownList('months', '' , $months, array('prompt'=>'Select Month','options' =>array($month=>array('selected'=>true))));
	?>
</div>
<div class="row">
	<?php echo CHtml::label(Yii::t('demo', 'Subject'), 'subject'); ?>
	<?php
	     echo CHtml::dropDownList('subject', '',CHtml::listData(SubjectMaster::model()->findAll(array('condition'=>'subject_master_branch_id='.$branch_id.' AND subject_master_academic_terms_name_id='.$sem)),'subject_master_id','subject'),array('prompt'=>'Select Subject','style'=>'width:310px;','options' =>array($selsub=>array('selected'=>true))));
	?>
</div>
<div class="row buttons">
	<?php 
		echo CHtml::button('Search', array('submit'=>array('Attendencedivisionreport','branch_id'=>$branch_id,'div_id'=>$div_id,'sem_id'=>$sem),'class'=>'submit','name'=>'search'));
	?>
</div>

<?php $this->endWidget(); ?>
</div>
</div>
<?php

$year = date('Y');
if(isset($month))
{
$month_value = $month;
?>
<div class="portlet box yellow" style="width:100%;margin-top:20px;">
    <i class="icon-reorder"></i>
    <div class="portlet-title"><span class="box-title">Divisionwise Student Monthly Attendance Report</span>
    	<div class="operation">
	  <?php echo CHtml::link('Back', array('/student/attendence/attendencedivisionreport'), array('class'=>'btnback'));?>	
	  <?php echo CHtml::link('Excel', array('attendencedivisionreport','excel'=>'excel','branch_id'=>$branch_id,'sem_id'=>$sem,'div_id'=>$div_id,'month'=>$month,'subject'=>$selsub,'deleivered_topic'=>$deleivered_topic), array('class'=>'btnblue'));?>	
	</div>
    </div>
<div class="portlet-body" >

<?php	
$m=0;
$num = cal_days_in_month(CAL_GREGORIAN, $month_value, date('Y'));
$colspan=$num+5; ?>
<table class="table_data">

<?php
 	$org = Organization::model()->findAll();
	$org_data=$org[0];
 $sub = SubjectMaster::model()->findByPk($selsub);	
echo '<table class="report-table" border="2" > ';

echo "<tr align=center> <th  colspan = 60 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";

 echo "<tr><th colspan=".$colspan."><h3> Branch  of ".$branch_model->branch_name." Students of Semester-".$acd_model->academic_term_name." , Subject-".$sub->subject_master_name ."  In Month - ". date("F", mktime(0,0,0,$month)) ." Attendence Report</h3></th> </tr>";

?>
 <tr class="topic-covered" style="height:220px;background:#FFF;">
       <th colspan=3 style="color: rgb(153, 10, 16);" colspan="3"><b>Topic Covered</b></th>
      <?php

        for($i = 1; $i<=$num; $i++) {
		   if(strlen($i) == 1)
		   	$i = "0".$i;	
		   if(strlen($month_value) == 1) 
			$month_value="0".$month_value;	
		   $date = date('Y').'-'.$month_value.'-'.$i;	
		   if(array_key_exists($date,$deleivered_topic))
		        print '<th>'.$deleivered_topic[$date].'</th>';
		   else 
		        print '<th></th>';	
	}
	 
       ?>
    <th></th><th></th><th></th></tr>

    <tr class="table_header">
       <th>SI No.</th>
	<th>Enroll No.</th>
       <th>Student Name</th>
 <?php		for($i = 1; $i<=$num; $i++) {
		    print '<th>'.$i.'</th>';
		}
		?>
	<th> No.of Lectures Taken </th>	
	<th> No. of Lectures Attended </th>
	<th> Percentage </th>
		<?php
		
		foreach($student_id as $stud_tran_id)
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
		   $a = 1;
	$stud_name=StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$stud_tran_id));
		   print "<td>";
			if(!empty($stud_name->student_enroll_no))	
    			  echo $stud_name->student_enroll_no;
			else
			  echo 'Not Set';
		   print "</td>";	
	   	   print "<td>";
		      echo $stud_name->student_first_name.' '.$stud_name->student_last_name.'('.$stud_name->student_roll_no.')';
		   print "</td>";
		
		   for($j = 1; $j<=$num; $j++)
		   {
		    	if(strlen($j) == 1)
			$j = "0".$j;
			$date = $j.'-'.$month_value.'-'.date('Y');
			$attend_date = date("Y-m-d", strtotime($date));	
			$stud_no=0;
			$result1 = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND st_id='.$stud_tran_id.' AND sub_id='.$selsub.' AND day(attendence_date)='.$j.' AND year(attendence_date)='.$year));
			
		       
			if(count($result1) !=0)		
			{	
				print "<td>";
				foreach($result1 as $result)
				{
				$myclass = $result->attendence == 'P' ? 'green' : 'red'; 
								
					if($a == count($result1))
					{
					print "<b style=color:$myclass>".$result->attendence."</br></b>";					
					}
					else
					print "<b style=color:$myclass>".$result->attendence."</br></b>";
				$a+=1;
				
				}
				print "</td>";
				
			}
			else
			{
				print '<td> - </td>'; 
			}
		$stud_no++;	
			
		
		  }
			$all_attendance = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND st_id='.$stud_tran_id.' AND sub_id='.$selsub.' AND year(attendence_date)='.$year));	
			$present_attendance = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND st_id='.$stud_tran_id.' AND sub_id='.$selsub.' AND year(attendence_date)='.$year.' AND attendence = "P"'));
			$total=count($all_attendance);
			$present=count($present_attendance);
			$percentage=0;
			if($total!=0)
			   $percentage = ($present*100)/$total;

			print "<td>";
				 echo $total;
			print "</td>";
			print "<td>";
				 echo $present;
			print "</td>";
			print "<td>";
				 echo round($percentage,2).'%';
			print "</td>";

			print "</tr>";
	

	}
	print "</table>";			
}
?>
</div>
</div>
