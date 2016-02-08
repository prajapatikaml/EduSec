<?php

if($this->getAction()->getId()!='index') 
$this->breadcrumbs=array(
		ucfirst($this->module->id)=>array('news/'),
		ucfirst($this->getAction()->getId()) 
);
else
	$this->breadcrumbs=array('Site News');

//$this->renderpartial('_menu');

if(isset($_GET['Mailbox_sort']))
	$sortby = $_GET['Mailbox_sort'];
else
	$sortby = '';

echo '<div class="news-list ui-helper-clearfix" sortby="'.$sortby.'">';

$this->renderpartial('../message/_flash');

if($dataProvider->getItemCount() > 0) {
?>
<h1>Site News</h1>
<form id="message-list-form" action="<?php echo $this->createUrl($this->getId().'/'.$this->getAction()->getId()); ?>" method="post">
	<div class="mailbox-clistview-container ui-helper-clearfix">
	<?php
	if($this->module->isAdmin() && $dataProvider->getItemCount() > 1) : ?>
		<div class="btn-group mailbox-checkall-buttons">
			<button class="checkall" />Check All</button>
			<button class="uncheckall" />Uncheck All</button>
		</div>
	<?php
	endif;

$this->widget('zii.widgets.CListView', array(
    'id'=>'mailbox',
    'dataProvider'=>$dataProvider,
    'itemView'=>'_news_list',
    'itemsTagName'=>'table',
    'template'=>'<div class="mailbox-summary">{summary}</div>{sorter}<div id="mailbox-items" class="ui-helper-clearfix">{items}</div>{pager}',
    'sortableAttributes'=>array('modified'=>'News Date'),
    'loadingCssClass'=>'mailbox-loading',
    'ajaxUpdate'=>'mailbox-list',
    'afterAjaxUpdate'=>'$.yiimailbox.updateMailbox',
    'emptyText'=>'<div style="width:100%"><h3>No news to report.</h3></div>',
    //'htmlOptions'=>array('class'=>'ui-helper-clearfix'),
    'sorterHeader'=>'', 
    'sorterCssClass'=>'mailbox-sorter',
    'itemsCssClass'=>'mailbox-items-tbl ui-helper-clearfix',
    'pagerCssClass'=>'mailbox-pager',
    //'updateSelector'=>'.inbox',
));
?>
	<?php if($this->module->isAdmin()) : ?>
<div style="clear:left"> <span class="mailbox-buttons-label">With selected:</span> 
	<input type="submit" id="mailbox-action-delete" class="btn mailbox-button" name="button[delete]" value="delete" /> 
	
</div>	<?php endif; ?>
	</div>
</form>

<?php

}
else {
	echo '<div class="mailbox-empty">No news to report.</div>';
}

echo '</div>';

?>


