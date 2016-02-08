<?php
$this->breadcrumbs=array(
	'Division Report',
	
);
?>
<style>
   #btnSubmit{
	margin-left:53px;
  }
</style>
<script>
$(document).ready(function() {
		var str = "<?php echo Yii::app()->request->baseUrl;?>"+"/student/attendence/attendencedivisionreport?div_id="+"<?php echo $_REQUEST['div_id']; ?>&subject=view";	

		var urlParams;
		(window.onpopstate = function () {
		   var match,
		       pl     = /\+/g,  // Regex for replacing addition symbol with a space
		       search = /([^&=]+)=?([^&]*)/g,
		       decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
		       query  = window.location.search.substring(1);

		   urlParams = {};
		   while (match = search.exec(query))
		      urlParams[decode(match[1])] = decode(match[2]);

		   
		})();
		

		$('#grt').change(function() {
			var greate = $('#grt').val();
			d = str+"&greate="+greate;
			if(urlParams['sb_id'] !=='undefined') {
			var d = d+"&sb_id="+urlParams['sb_id'];	
			}
			if(urlParams['less'] !=="undefined") {
			var d = d+"&less="+urlParams['less'];	
			}
			if(urlParams['month'] !=="undefined") {
			var d = d+"&month="+urlParams['month'];	
			}
			window.location = d;
			
   		});
		$('#less').change(function() {
			var ls = $('#less').val();
			r = str+"&less="+ls;
			if(urlParams['sb_id'] !=='undefined') {
			var r = r+"&sb_id="+urlParams['sb_id'];	
			}
			if(urlParams['greate'] !=='undefined') {
			var r = r+"&greate="+urlParams['greate'];	
			}
			if(urlParams['month'] !=="undefined") {
			var r = r+"&month="+urlParams['month'];	
			}
			window.location = r;
			
   		});
		$("#btnSubmit").click(function(){
			var ls = $('#month').val();
			d = str+"&month="+ls;
			if(urlParams['sb_id'] !=='undefined') {
			var d = d+"&sb_id="+urlParams['sb_id'];	
			}
			if(urlParams['less'] !=="undefined") {
			var d = d+"&less="+urlParams['less'];	
			}
			if(urlParams['greate'] !=='undefined') {
			var d = d+"&greate="+urlParams['greate'];	
			}
			window.location = d;
    		}); 	
});
</script>
<?php
$this->menu[]=array('label'=>'', 'url'=>array('attendencedivisionreport','studentpdf'=>'studentpdf','div_id'=>$_REQUEST['div_id'],'sb_id'=>$_REQUEST['sb_id'],'greate'=>$_REQUEST['greate'],'less'=>$_REQUEST['less'],'month'=>$_REQUEST['month']),'linkOptions'=>array('class'=>'export-pdf','title'=>'Export Student Data','target'=>'_blank'));
		$this->menu[]=array('label'=>'', 'url'=>array('attendencedivisionreport','studentexcel'=>'studentexcel','div_id'=>$_REQUEST['div_id'],'sb_id'=>$_REQUEST['sb_id'],'greate'=>$_REQUEST['greate'],'less'=>$_REQUEST['less'],'month'=>$_REQUEST['month']),'linkOptions'=>array('class'=>'export-excel','title'=>'Export Student Data','target'=>'_blank'));


     $div_model = Division::model()->findByPk($_REQUEST['div_id']);
     $acd_model = AcademicTerm::model()->findByPk($div_model->academic_name_id);
     $key = array_search($_REQUEST['sb_id'], $subjectid);	 
     $d1 = strtotime($acd_model->academic_term_start_date);
     $d2 = strtotime($acd_model->academic_term_end_date);
     $min_date = min($d1, $d2);
     $max_date = max($d1, $d2);
     $i = 0;
     $m_num = date('m',$min_date);
     $month_array[$m_num]=date("F", mktime(0, 0, 0, $m_num, 10));

while (($min_date = strtotime("+1 MONTH", $min_date)) <= $max_date) {
    $m_num = date('m',$min_date);
    $month_array[$m_num]=date("F", mktime(0, 0, 0, $m_num, 10));
}


?></br>
<div>
<div style="float:left;height:150px;">
<table  border="2px" id="twoColThinTable">
<tr class="row">
	<td class="col1">Subject </td>
	<td class="col2"><?php echo  $subject[$key];?></td>
</tr>
	<tr class="row">	
	<td class="col1">Division </td> 
	<td class="col2"><?php echo $div_model->division_code;?></td>
</tr>	
<tr class="row">
	<td class="col1">Semester </td> 
	<td class="col2"> <?php echo $acd_model->academic_term_name;?></td>
</tr>
	<tr class="row">	
	<td class="col1"> Branch </td> 
	<td class="col2"><?php echo Branch::model()->findByPk($div_model->branch_id)->branch_name; ?></td>
</tr>
	</table>
</div>
<div class="form" style="width:40%;">
<?php
	$percentage = range(0, 100, 5);
?> 
	<label style="width:30px !important; margin-left:10px;">>=% </label>
<?php
	$grts = '';
	if(!empty($_REQUEST['greate']) && $_REQUEST['greate']!='')
		$grts = $_REQUEST['greate'];
	echo CHtml::dropDownList('grt', null, $percentage,
array('options' => array($grts=>array('selected'=>true))));
 

	if(!empty($_REQUEST['month']))
	{
		$sel_month= $_REQUEST['month'];
		$m = explode(",", $_REQUEST['month']);
                foreach ($m as $p)
                {
                         $pp[$p] = array('selected'=>'selected');
                }
	}
	else
	{
		$pp[$sel_month] = array('selected'=>'selected');	
	}
	


?>	<label style="width:38px !important; margin-left:10px;">Month </label>
	<?php echo CHtml::ListBox('month',null,$month_array,array('multiple' => 'multiple','options' => $pp)); ?>
	<label style="width:30px !important; margin-left:10px;"><=% </label>

<?php
	$lesser = '';
	if(!empty($_REQUEST['less']) && $_REQUEST['less']!='')
		$lesser = $_REQUEST['less'];

	echo CHtml::dropDownList('less', null, $percentage ,
array('options' => array($lesser=>array('selected'=>true))));
		
?>

	<?php echo CHtml::button('Select Month',array('id'=>'btnSubmit','class'=>'submit')); ?>
</div>

</div>

<?php
$t=-1;
$m=0;
if(!empty($_REQUEST['sb_id']) && $_REQUEST['sb_id']!=''){
echo '</br><table class="table_data" >';
foreach($all_data as $list)
{
		if(($t%2) == 0)
		{
		  $class = "odd";
		}
		else
		{
		  $class = "even";
		}

		if($t==-1){
		    echo '<tr class="table_header"><th>SI No.</th><th>En.No.</th><th>Name</th>';
		    $key = array_search($_REQUEST['sb_id'], $subjectid);	 
 		    echo '<th>Total</th><th>Present</th><th>%</th>';	   
		    echo '</tr>';
			++$t;
		}
		
		
			

		$tcon = count(Attendence::model()->findAll(array('condition'=>'sub_id='.$_REQUEST['sb_id'].' and st_id='.$list['st_id'].' and month(attendence_date) in('.$sel_month.')')));
		$pcon = count(Attendence::model()->findAll(array('condition'=>'sub_id='.$_REQUEST['sb_id'].' and st_id='.$list['st_id'].' and attendence="P" and month(attendence_date) in('.$sel_month.')')));
		$perc = 0;
		if($pcon > 0)
		{
		   $perc = (double)($pcon*100/$tcon);
		   $perc = round($perc,2);	
		}
		$stud_model = StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$list['st_id']));
		
		if( ($_REQUEST['less']*5)>=$perc && ($_REQUEST['greate']*5)<=$perc)
		{
			echo '<tr class='.$class.'><td>'.++$t.'</td><td>'.$stud_model->student_enroll_no.'</td><td>'.$stud_model->student_first_name.'</td>';		
	
			echo '<td>'.$tcon.'</td><td>'.$pcon.'</td><td>'.$perc.'%</td>';
	    
			echo '</tr>';
	 	 	continue;
		}
}
echo '</table>';

}
