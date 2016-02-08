<?php
$newMsgs = $this->module->getNewMsgs();
$action = $this->getAction()->getId();

if($this->module->authManager)
{
	$authNew = Yii::app()->user->checkAccess("Mailbox.Message.New");
	$authInbox = Yii::app()->user->checkAccess("Mailbox.Message.Inbox");
	$authSent = Yii::app()->user->checkAccess("Mailbox.Message.Sent");
	$authTrash = Yii::app()->user->checkAccess("Mailbox.Message.Trash");
}
else
{
	$authNew = $this->module->sendMsgs && (!$this->module->readOnly || $this->module->isAdmin());
	$authInbox = ( !$this->module->readOnly || $this->module->isAdmin() );
	$authTrash = $this->module->trashbox && (!$this->module->readOnly || $this->module->isAdmin());
	$authSent = $this->module->sentbox && (!$this->module->readOnly || $this->module->isAdmin());
}
?>
<div class="mailbox-menu  ui-helper-clearfix">
	<div class="mailbox-menu-folders ui-helper-clearfix">
		<?php
		if($authInbox):?>
		<div id="mailbox-inbox" class="mailbox-menu-item <?php echo ($action=='inbox')? 'mailbox-menu-current' : '' ; ?>">
			<a href="<?php echo $this->createUrl('message/inbox'); ?>">Inbox <?php echo $newMsgs? '('.$newMsgs.')' : null ; ?></a>
		</div>
		<?php endif;
		if($authSent) : ?>
		<div  id="mailbox-sent" class="mailbox-menu-item <?php if($action=='sent') echo 'mailbox-menu-current '; ?>">
			<a href="<?php echo $this->createUrl('message/sent'); ?>">Sent Mail</a>
		</div>
		<?php endif;
		if($authTrash) : ?>
		<div id="mailbox-trash" class="mailbox-menu-item <?php if($action=='trash') echo 'mailbox-menu-current '; ?>">
			<a href="<?php echo $this->createUrl('message/trash'); ?>">Trash </a> 
		</div>
		<?php endif; ?>
	</div>
<?php
if($authNew) :
	?>
	<div class="mailbox-menu-newmsg  ui-helper-clearfix mailbox-menu-item" align="center">
		<span><a href="<?php echo $this->createUrl('message/new'); ?>">New Message</a></span>
	</div>
<?php endif; ?>

</div>
