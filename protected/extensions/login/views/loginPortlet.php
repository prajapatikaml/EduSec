<div class="form">
<?php echo CHtml::form(); ?>
<div class="simple">
<?php echo CHtml::activeLabel($user,'username'); ?>

<?php echo CHtml::activeTextField($user,'username') ?>
<?php echo CHtml::error($user,'username'); ?>
</div>

<div class="simple">
<?php echo CHtml::activeLabel($user,'password'); ?>

<?php echo CHtml::activePasswordField($user,'password') ?>
<?php echo CHtml::error($user,'password'); ?>
</div>

<div class="action">
<?php if($this->enableRememberMe): ?>
<?php echo CHtml::activeCheckBox($user,'rememberMe'); ?> Remember me next time<br/>
<?php endif; ?>
<?php echo CHtml::submitButton('Login'); ?>
</div>

</form>
</div>