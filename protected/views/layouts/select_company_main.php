<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/newstyle.css'); ?>
<?php Yii::app()->clientScript->registerCss('selectCompany','
.submit {
  background-color: #4D90FE;
  color: white;
  cursor: pointer;
  height: 40px;
  line-height: 30px;
  margin-left: 40px;
  width: 80px;
  border: 1px solid #E5E5E5;
  float: left;
}') ?>
<div id="content">
    <?php echo $content; ?>
</div>


