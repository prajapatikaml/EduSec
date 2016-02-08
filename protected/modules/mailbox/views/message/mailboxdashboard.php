<style>

.mailbox-summary {
    font-size: 1em !important;
}
.ui-button .ui-button-text {
    line-height: 0.4 !important;
}
</style>
<?php
//echo $dataProvider->getItemCount();

if($this->getAction()->getId()!='inbox') 
$this->breadcrumbs=array(
		ucfirst($this->module->id)=>array('inbox'),
		ucfirst($this->getAction()->getId()) 
);
else
	$this->breadcrumbs=array($this->module->id);

//$this->renderpartial('_menu');

if(isset($_GET['Message_sort']))
	$sortby = $_GET['Message_sort'];
elseif(isset($_GET['Mailbox_sort']))
	$sortby = $_GET['Mailbox_sort'];
else
	$sortby = '';
$ie6br = <<<EOD
<!--[if lt IE 6]>
<br clear="all" />
<![endif]-->
EOD;
echo '<div id="mailbox-list" style="width: 90%;"class="mailbox-list ui-helper-clearfix" sortby="'.$sortby.'">';

$this->renderpartial('_flash');

if($dataProvider->getItemCount() > 0) {
?>
<form id="message-list-form" action="<?php echo $this->createUrl($this->getId().'/'.$this->getAction()->getId()); ?>" method="post">
	<input type="hidden" class="mailbox-count" name="ui[]" value="<?php echo $dataProvider->getItemCount(); ?>" />
	<input type="hidden" class="mailbox-sortby" name="ui[]" value="<?php echo $sortby; ?>" />
	<div class="mailbox-clistview-container ui-helper-clearfix">
	<?php
$this->widget('zii.widgets.CListView', array(
    'id'=>'mailbox',
    'dataProvider'=>$dataProvider,
    'itemView'=>'_listdashboard',
    'itemsTagName'=>'table',
    'template'=>'<div class="mailbox-summary"><div style="float:left;">'.$this->getId().'&nbsp;</div>{summary}</div>{sorter}'.$ie6br.'<div id="mailbox-items" class="ui-helper-clearfix">{items}</div>{pager}',
    'sortableAttributes'=>$this->getAction()->getId()=='sent'?
	array('created'=>'Date Sent') :
	array('modified'=>'Date Received'),
    'loadingCssClass'=>'mailbox-loading',
    'ajaxUpdate'=>'mailbox-list',
    'afterAjaxUpdate'=>'$.yiimailbox.updateMailbox',
    'emptyText'=>'<div style="width:100%"><h3>You have no messages in your inbox</h3></div>',
    //'htmlOptions'=>array('class'=>'ui-helper-clearfix'),
    'sorterHeader'=>'', 
    'sorterCssClass'=>'mailbox-sorter',
    'itemsCssClass'=>'mailbox-items-tbl ui-helper-clearfix',
    'pagerCssClass'=>'mailbox-pager',
    //'updateSelector'=>'.inbox',
));
?>
	</div>
</form>

<?php

}
else {
	$this->renderpartial('_extendempty');
} 
?>
</div>

<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
	$('.message-subject').hide();
});
/*]]>*/
</script>
