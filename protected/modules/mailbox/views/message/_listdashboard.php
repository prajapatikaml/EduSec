<?php

$userid = $this->module->getUserId();

if($this->getAction()->getId()=='sent') {
	$counterUserId = $data->recipient_id;
}
else {
	if($this->module->getUserId() == $data->initiator_id)
		$counterUserId = $data->interlocutor_id;
	else
		$counterUserId = $data->initiator_id;
}
$username = $this->module->getFromLabel($counterUserId);

if($username && ($this->module->isAdmin() || $this->module->linkUser)) {
	$url = $this->module->getUrl($counterUserId);
	$viewLink = $this->createUrl('message/view',array('id'=>$data->conversation_id));
	if($url)
		$username = '<a href="'.$viewLink.'">'.$username.'</a>';
}
elseif(!$username)
	$username = '<span class="mailbox-deleted-user">'.$this->module->deletedUser.'</span>';

//$viewLink = $this->createUrl('message/view',array('id'=>$data->conversation_id));

if($this->getAction()->getId()=='sent') {
	$received = $this->module->getDate($data->created);
	if($this->module->recipientRead)
		$itemCssClass = ($data->isRead($userid))? 'msg-read' : 'msg-deliver';
	else
		$itemCssClass = 'msg-sent';
}
else{ 
	$received = $this->module->getDate($data->modified);
	$itemCssClass = $data->isNew($userid)? 'msg-new' : 'msg-read';
}
switch($itemCssClass)
{
	case 'msg-read': $status = ($this->getAction()->getId()=='sent')? 'Recipient has read your message' : 'Message has been read' ; break;
	case 'msg-deliver':  $status = 'Recipient has not read your message yet';
	case 'msg-new': $status =  ($this->getAction()->getId()=='sent')? 'Recipient has not read your message yet' : 'You received a new message'; break;
	case 'msg-sent': $status = "You sent message {$username} a message";
}
$subject  = '<span class="mailbox-subject-text">';
$subject .= '<a class="mailbox-link" title="'.$status.'" href="'.$viewLink.'">';
$subjectSeperator = ' - ';
if(strlen($data->subject) > $this->module->subjectMaxCharsDisplay)
{
	$subject .= substr($data->subject,0,$this->module->subjectMaxCharsDisplay - strlen($this->module->ellipsis) ). $this->module->ellipsis . '</a></span>';
}
else
{
	$subject .= $data->subject .'</a></span><span class="mailbox-msg-brief">';
	if(strlen($data->subject) + strlen($data->text) + strlen($subjectSeperator) > $this->module->subjectMaxCharsDisplay)
		$subject .= $this->module->ellipsis;
}
$subject = preg_replace('/[\n\r]+/','',$subject);
$subject.= '</span>';
?>
<tr class="mailbox-item <?php echo $itemCssClass; ?> <?php if($this->getAction()->getId()!='sent') echo 'mailbox-draggable-row'; ?>" style="font-size:11px;">
	
    <td>
		<div  class="mailbox-item-wrapper mailbox-from mailbox-ellipsis" style="width: 100px;word-wrap: break-word;"><?php echo $username; ?></div>
    </td>
    <td class="mailbox-subject-brief">
	    <div class="mailbox-item-wrapper mailbox-item-outer mailbox-subject" style="text-align: left;">
			<?php echo $subject; ?>
		</div>
    </td>
    <td class="mailbox-received">
		<div align="right" class="mailbox-item-wrapper" >
			<?php if($data->is_replied) : ?>
			<div class="mailbox-replied" title="this message has been replied to">&nbsp;&nbsp;</div>
			<?php endif; ?>
			<?php echo $received; ?>
		</div>

    </td>
</tr>




