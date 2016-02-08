<?php $this->breadcrumbs = array($this->module->id); ?>

<h1>Notifications</h1>

<div style="text-align: center;">
    <div class="span-14 box first">
        <h3 class="box">Show with Flash messages</h3>
        <?php $number = 1; ?>
        <?php while (Yii::app()->user->hasFlash('success' . ($number))) : ?>
            <?php $message = Yii::app()->user->getFlash('success' . ($number)); ?>
            <?php echo '<div class="flash-success info">' . $message . "</div>\n"; ?>
            <?php $number = $number + 1; ?>
        <?php endwhile; ?>
    </div>
    <div class="span-7 box last">
        <h4>On the left you can see the list of notifications displayed as flash message.</h4>
    </div>
</div>

<div class="clear"></div>

<div style="text-align: center;">
    <div class="span-7 box first">
        <h4>On the right you can see the list of notifications. If you do not see any notification, just means that you have not already created notifications.</h4>
    </div>
    <div class="span-14 box last">
        <h3 class="box">Show from database ($notifiche)</h3>
        <?php foreach ($notifiche as $notifica) : ?>
            <?php if($notifica->isNotReaded()) : ?>
                <div class="box">
                    <a href="<?php echo $notifica->link; ?>"><?php echo $notifica->expire; ?></a> - 
                    <a href="<?php echo $notifica->link; ?>"><?php echo $notifica->content; ?></a> <br />
                    <a href="<?php echo $this->createUrl('/notifyii/default/read', array('id' => $notifica->id)); ?>">Show READ
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<div class="clear"></div>

<div style="text-align: center;">
    <div class="span-14 box first">
        <a href="<?php echo $this->createUrl('addEndOfWorld'); ?>">Refresh</a>
    </div>
    <div class="span-7 box last">
        <h4>On the right you can see the list of notifications. If you do not see any notification, just means that you have not already created notifications.</h4>
    </div>
</div>


