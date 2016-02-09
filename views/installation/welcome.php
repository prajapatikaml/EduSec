<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Welcome Edusec Application Installer';
?>

<div class="installation-box-body installation-header">
	<h1>Edusec Installation</h1>
</div>
<div class="installation-box-body">
	<?php $form = ActiveForm::begin(); ?>
	<h3>License Agreement</h3>
<pre style="height: 200px;overflow-y: scroll;">

EduSec - School/College Management System
	
Developed by RudraSoftech
    
Copyright (C) 2015 Rudra Softech <a href="http://rudrasoftech.com/" target="_blank">(http://rudrasoftech.com)</a>
	
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <a href="http://www.gnu.org/licenses/" target="_blank">http://www.gnu.org/licenses</a>. 
</pre>

	<?= $form->field($model, 'is_agree')->checkbox(); ?>

	<div class="form-group">
		<?= Html::submitButton('Continue <i class="fa fa-angle-double-right"></i>', ['class' =>'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>
</div>
