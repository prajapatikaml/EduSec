<?php if($this->constrainImage):?>
	<a href='<?php echo $url;?>'>
	<img width="<?php echo $this->width;?>px" height="<?php echo $this->height;?>px" src='<?php echo $src;?>' alt='<?php echo $alt;?>' /></a>
<?php else: ?>
	<a href='<?php echo $url;?>'><img  src='<?php echo $src;?>' alt='<?php echo $alt;?>' /></a>
<?php endif ?>
