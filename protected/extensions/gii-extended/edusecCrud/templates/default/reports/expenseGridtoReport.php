<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}
</style>
<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.BootGridView',array(
        'type'=>'striped',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}",
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
        ?>
         array(
        <?php
	echo "\t\t'name'=>'".$column->name."',\n";
         ?>
        <?php
	echo "\t\t'sortable'=>false,\n";
         ?>
        <?php
	echo "\t\t'type'=>'row',\n";
         ?>
        <?php
	echo "\t\t'value'=>'\$data->".$column->name."',\n";
         ?>
         <?php
	echo "\t\t'headerHtmlOptions'=>array('width'=>'80'),\n";
         ?>
         <?php
	echo "\t\t'htmlOptions'=>array('width'=>'80'),\n";
         ?>
        
             ),     
<?php
          
}
if($count>=7)
	echo "\t\t*/\n";
?>
	),
)); ?>
