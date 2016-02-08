<br />
<h2>Institute details are successfully saved. We have sent you login credential on your organization email.</h2>

<p> For login : <?php echo CHtml::link('Click here..',Yii::app()->createUrl('site/login'));?>  </p>


<div style="color: green; font-size: 17px; font-weight: 700;">
<?php //$userCount = User::model()->count();
	$user = User::model()->findByPk(1);
	echo 'Your UserName and Password is : '.$user->user_organization_email_id."\n";
  //}
?>
</div>
