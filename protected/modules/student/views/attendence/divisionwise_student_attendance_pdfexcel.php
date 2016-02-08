<?php

if($subject)
{
  $key = array_search($_REQUEST['sb_id'], $subjectid);
  echo "<h4>Subject Name:-".$subject[$key]."</h4>";	
  echo "<h4>Division :-".Division::model()->findByPk($_REQUEST['div_id'])->division_code."</h4>";	
$t=-1;
$m=0;
$sel_month= $_REQUEST['month'];
if(!empty($_REQUEST['sb_id']) && $_REQUEST['sb_id']!=''){
echo '<table class="table_data" >';
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
		    echo '<tr class="table_header"><th>Sr No.</th><th>En.No.</th><th>Name</th>';	 
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


}


else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";

}

?>
