<?php
$this->breadcrumbs=array(
	'Site News'=>array('news/'),
	'News Update',
);

?>
<div class="mailbox-news-story">


<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<div class="mailbox-message-subject"><?php echo ($conv->subject)? $conv->subject : $this->module->defaultSubject; ?></div>

<br />
<?php
$first_message=1;
foreach($conv->messages as $msg): 
	$sender = $this->module->getUserName($msg->sender_id);
	if(!$sender)
		$sender = $this->module->deletedUser;
	?>

	<div class="mailbox-message-text"><?php echo $msg->text; ?></div>
	
	
	
	<div class="mailbox-message-header">
		<div class="message-sender">
<?php	echo 'Author: ' . ucfirst($sender); ?></div>
		<div class="message-date">Last Updated: <?php echo date("Y-m-d H:i a",$msg->created); ?></div>
		<br />
	</div>
	
	<br />
<?php $first_message=0;
endforeach; 

if($this->module->authManager)
	$authReply = Yii::app()->user->checkAccess("Mailbox.Message.Reply");
else
	$authReply = $this->module->sendMsgs;
?>
</div>

