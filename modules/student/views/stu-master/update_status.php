<?php
use yii\helpers\Html;



if(isset($_POST['value']))
{
	$value=$_POST['value'];
mysql_query("update choice set choice='$value' where id='1'");
echo "<h2>You have Chosen the button status as:" .$value."</h2>";
}
?>
