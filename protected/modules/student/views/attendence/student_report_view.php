<?php
$this->breadcrumbs=array(
	'Student Attendance Report View',
	
);
if(Yii::app()->user->checkAccess('Student.Attendene.StudentAttendenceReport'))
{
$this->menu=array(
	array('label'=>'', 'url'=>array('studentwisereportpdf','studenewisereportpdf'=>'stud','student_enroll_no'=>$student_data['student_enroll_no'],'start'=>$start,'end'=>$end),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export to PDF')),
	array('label'=>'', 'url'=>array('studentwisereportpdf','studenewisereportexcel'=>'stud','student_enroll_no'=>$student_data['student_enroll_no'],'start'=>$start,'end'=>$end),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel')),
);
}
?>
<div class="portlet box yellow" style="width:100%;margin-top:20px;">
    <i class="icon-reorder"></i>
    <div class="portlet-title"><span class="box-title">Batchwise Student History Report</span>
    	<div class="operation">
	  <?php echo CHtml::link('Back', array('documentsearch'), array('class'=>'btnback'));?>	
	</div>
    </div>
<div class="portlet-body" >
<?php
$org = Organization::model()->findAll();
	$org_data=$org[0];
$n = ucfirst(Yii::app()->controller->action->id);
if($n=="StudentAttendenceReport" )
{
 echo CHtml::link('GO BACK',Yii::app()->user->returnUrl);?>
<div>&nbsp;</div>
<table  border="2px" id="twoColThinTable" style="float:left;width:40%">
<?php
}
else {
 echo CHtml::link('GO BACK',Yii::app()->createUrl('student/attendence/studentwisereport'));?>
<table class="report-table" border=2 > 
<?php
}
?>

<tr class="row">
	<td class="col1">Name :</td>
	<td class="col2"><?php echo '<span style=text-transform:capitalize;>'.strtolower($student_data['student_first_name']).'</span>';?></td>
</tr>	
<tr class="row">	
	<td class="col1">Enrollment No. :</td> 
	<td class="col2"><?php echo $student_data['student_enroll_no'];?></td>
</tr>	
<tr class="row">
	<td class="col1">Roll No. :</td> 
	<td class="col2"> <?php echo $student_data['student_roll_no'];?></td>
</tr>	
<tr class="row">	
	<td class="col1">Current Semester  :</td> 
	<td class="col2">
Sem:-<?php echo AcademicTerm::model()->findByPk($student_data['student_academic_term_name_id'])->academic_term_name; ?></td>
</tr>	
</table>
<?php 
if($n=="StudentAttendenceReport" )
{
 echo $this->renderPartial('student_attendence_report', array('model'=>$model)); 
}
?>
<div>&nbsp;</div>
<?php 
$i=0;
$m=1;
if($subject_data)
{
$res_str=array();
foreach($subject_data as $list) {
			
		$total_att = Attendence::model()->findAll(array('condition'=>'st_id='.$student_data['student_transaction_id'].' AND sub_id='.$list['subject_master_id'].' AND attendence_date BETWEEN "'.$start.'" AND "'.$end.'"'));
		$pre_att = Attendence::model()->findAll(array('condition'=>'st_id='.$student_data['student_transaction_id'].' AND attendence="P"'.' AND sub_id='.$list['subject_master_id'].' AND attendence_date BETWEEN "'.$start.'" AND "'.$end.'"'));

			
		$sem_name = AcademicTerm::model()->findByPk($list['subject_master_academic_terms_name_id'])->academic_term_name;	
		$percentage=0;
		$totalcount=count($total_att);
		$precount=count($pre_att);
		if(count($total_att)!=0)
			$percentage = (count($pre_att)*100)/count($total_att);
		$subject=$list['subject_master_name'].'('.SubjectType::model()->findByPk($list['subject_master_type_id'])->subject_type_name.")";
		$res_str[]=array($subject,round($percentage,2));
}
if(!empty($res_str))
{
echo "<div id='piechart'>";
echo "<div id=\"container\" style=\"width:30%;height: 400px;float:left;margin: 0 auto\"></div>";
$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
     
      'chart'=> array(
            'renderTo'=>'container',
            'plotBackgroundColor'=>'#D5DEE5',
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
	 
      'title' => array('text' => ''),
        'tooltip'=>array(
                'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>: "+ this.point.y +" %"; }'
                     ),
        'plotOptions'=>array(
            'pie'=>array(
                'allowPointSelect'=> true,
                'cursor'=>'pointer',

                'dataLabels'=>array(
                    'enabled'=> false,
                    'color'=>'#000000',
		    'connectorColor'=>'#000000',
		    'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>"; }'  
                                  ),
		'showInLegend'=>'true',
		        ),
                 ),
    
      'series' => array(
         array('type'=>'pie','name' => 'Browser share', 'data' =>$res_str,
	),
	),
	'exporting'=> array('enabled' =>false)
 	   )
));?>
</div>
<?php
}
echo '<table class="report-table" border=2 > ';

echo "<tr align=center> <th  colspan = 60 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";
	echo "<th colspan=\"6\" style=\"font-size: 18px; color: rgb(255, 255, 255);\">";
	echo 'Attendance Report From-Date:'.date("d-m-Y", strtotime($start))." To-Date: ".date("d-m-Y", strtotime($end));
        echo '</th></tr><tr class="table_header"><th>SI No.</th><th>Subject Name</th><th>Semester</th><th>Total</th><th>Present</th><th>Attendance %</th></tr>';
foreach($subject_data as $list) {
		if(($m%2) == 0)
		{
		  $class = "odd";
		}
		else
		{
		  $class = "even";
		}
		$total_att = Attendence::model()->findAll(array('condition'=>'st_id='.$student_data['student_transaction_id'].' AND sub_id='.$list['subject_master_id'].' AND attendence_date BETWEEN "'.$start.'" AND "'.$end.'"'));
		$pre_att = Attendence::model()->findAll(array('condition'=>'st_id='.$student_data['student_transaction_id'].' AND attendence="P"'.' AND sub_id='.$list['subject_master_id'].' AND attendence_date BETWEEN "'.$start.'" AND "'.$end.'"'));
		$sem_name = AcademicTerm::model()->findByPk($list['subject_master_academic_terms_name_id'])->academic_term_name;	
		$percentage=0;
		$totalcount=count($total_att);
		$precount=count($pre_att);
		if(count($total_att)==0)
		{
			
			echo '<tr class='.$class.'><td>'.++$i.'</td><td>'.$list['subject_master_name'].'('.SubjectType::model()->findByPk($list['subject_master_type_id'])->subject_type_name.")".'</td><td>'.$sem_name.'</td><td>'.count($total_att).'</td><td>'.count($pre_att).'</td><td>'.$percentage.'%</td></tr>';
			
		}
		else
		{
			$percentage = (count($pre_att)*100)/count($total_att);
			echo '<tr class='.$class.'><td>'.++$i.'</td><td>'.$list['subject_master_name'].'('.SubjectType::model()->findByPk($list['subject_master_type_id'])->subject_type_name.")".'</td><td>'.$sem_name.'</td><td>'.count($total_att).'</td><td>'.count($pre_att).'</td><td>'.round($percentage,2).'%</td></tr>';
			
		}
$m++;		
}
echo '</table>';
}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
}
?>
