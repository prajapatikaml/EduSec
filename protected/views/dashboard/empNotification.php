<?php 
  $empNotice = Yii::app()->db->createCommand()
    ->select('et.employee_transaction_id, ep.employee_photos_path, ef.employee_first_name, ef.employee_last_name, en.title, u.user_id, en.id')
    ->from('employee_transaction et')
    ->join('employee_info ef', 'ef.employee_id=et.employee_transaction_id')
    ->join('employee_photos ep', 'ep.employee_photos_id=et.employee_transaction_emp_photos_id')
    ->join('employee_notification en', 'en.emp_notice_to=et.employee_transaction_id')
    ->join('user u', 'u.user_id=et.employee_transaction_user_id')
    ->where('et.employee_transaction_id=:eid AND et.employee_status = 0', array('eid'=> Yii::app()->user->getState('emp_id')))
    ->order(array('en.id desc'))
    ->limit(10)
    ->queryAll();

?>

<div class="wob wob-in-top-threshold wob-0-degrees read-only" style="height: 444px; width: 43%; z-index: 1;">
<div class="timeline textstream widget news-stream google-news vertical">
<div class="widget-header">
  <i class="header-icon"></i>
  <div class="title">Notice Board</div>
</div>
<div class="timeline-items-wrapper">
  <div class="timeline-items-bevel">
    <ul class="timeline-items">
      <?php 
	foreach($empNotice as $list) { ?>
         <li class="timeline-item">
           <div class="item-text">
	     <div class="user-icon" style="float: left; margin-right: 15px;"><?php echo CHtml::image(Yii::app()->baseUrl.'/college_data/emp_images/'.$list['employee_photos_path'], 'Employee', array('width'=>50, 'height'=>50, 'style'=>'border-radius: 50%;')); ?></div>
	     <div class="news-source"><?php echo $list['employee_first_name'].' '.$list['employee_last_name']; ?></div>
	     <div class="title"><?php echo CHtml::link($list['title'],Yii::app()->baseUrl.'/notification/employeeNotification/Read?id='.$list['id']); ?></div>
             
           </div>
        </li>
	<?php  }
	?>
    </ul>
  </div>
</div>
</div>
</div>
