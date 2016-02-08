<?php

//CVarDumper::dump($data); return;

$userid =& $this->module->getUserId();


$viewLink = $this->createUrl('news/info',array('id'=>$data->conversation_id));
//$deleteLink = $this->createUrl('message/delete',array('id'=>$data->conversation_id));


$received = $this->module->getDate($data->modified);
$itemCssClass = $data->isNew($userid)? 'msg-new' : 'msg-read';

$status = "View this news update";
?>
<tr class="mailbox-item <?php echo $itemCssClass; ?> <?php if($this->getAction()->getId()!='sent') echo 'mailbox-draggable-row'; ?>">
	<?php if(false): // add dragdrop handle ?>
    <td width="25"><div class="mailbox-item-wrapper mailbox-drag">&nbsp;</div></td>
	<?php endif; ?>
    
	<?php if( $this->module->isAdmin() ) : ?>
    <td width="25">
		<label class="ui-helper-reset" for="conv_<?php echo $data->conversation_id; ?>">
		<div class="mailbox-item-wrapper mailbox-check">
			<input class="mailbox-check " id="conv_<?php echo $data->conversation_id; ?>" type="checkbox" name="convs[]" value="<?php echo $data->conversation_id; ?>" />
		</div>
		</label>
    </td>
	<?php endif; ?>
    <td class="mailbox-subject-brief">
		<div class="mailbox-item-wrapper mailbox-subject mailbox-ellipsis">
			<span class="mailbox-subject-text"><a class="mailbox-link" title="<?php echo $status; ?>" href="<?php echo $viewLink; ?>"><?php echo preg_replace('/[\s]+/','&nbsp;',(($data->subject)? $data->subject : $this->module->defaultSubject)); ?></a></span><span class="mailbox-msg-brief">&nbsp;-&nbsp;<?php echo preg_replace('/[\s]+/','&nbsp;',substr($data->text,0,50)); ?></span>
		</div>
    </td>
    <td class="mailbox-received">
		<div align="right" class="mailbox-item-wrapper mailbox-ellipsis">
			<?php if($data->is_replied) : ?>
			<div class="mailbox-replied" title="this message has been replied to"></div>
			<?php endif; ?>
			<?php echo $received; ?>
		</div>

    </td>
</tr>




