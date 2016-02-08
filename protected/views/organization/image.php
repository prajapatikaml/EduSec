<?php
//$filename = $model->logo;  

header('Content-Type: '.$model->file_type);
print $model->logo; 

exit(); 
?>
