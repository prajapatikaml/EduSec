<?php
//echo "Hello";
//echo $_REQUEST['id'];
//echo $_REQUEST['organization_name'];
$company = Organization::model()->findByPk($_REQUEST['organization_name']);
echo $company->organization_name;
?>
