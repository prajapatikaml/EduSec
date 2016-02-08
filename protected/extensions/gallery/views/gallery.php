<html>
<head>
<link rel="stylesheet" type="text/css" href="css/colorbox.css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.colorbox.js"></script>
<script>/*
function showBox(var url)
{
  var width = document.documentElement.clientWidth + document.documentElement.scrollLeft;
  alert("Hi");

  var layer = document.createElement('div');
  layer.style.zIndex = 2;
  layer.id = 'layer';
  layer.style.position = 'absolute';
  layer.style.top = '0px';
  layer.style.left = '0px';
  layer.style.height = document.documentElement.scrollHeight + 'px';
  layer.style.width = width + 'px';
  layer.style.backgroundColor = 'black';
  layer.style.opacity = '.6';
  layer.style.filter += ("progid:DXImageTransform.Microsoft.Alpha(opacity=60)");
  document.body.appendChild(layer);

  var div = document.createElement('div');
  div.style.zIndex = 3;
  div.id = 'box';
  div.style.position = (navigator.userAgent.indexOf('MSIE 6') > -1) ? 'absolute' : 'fixed';
  div.style.top = '200px';
  div.style.left = (width / 2) - (400 / 2) + 'px'; 
  div.style.height = '50px';
  div.style.width = '400px';
 // div.style.backgroundColor = 'white';
//  div.style.border = '2px solid silver';
  div.style.padding = '20px';
  document.body.appendChild(div);

  var p = document.createElement('img');
  img.width='400';
  img.height='400';
  img.src= url;
 // img.innerHTML = '';
  div.appendChild(p);

  var a = document.createElement('a');
  a.innerHTML = '';
  a.href = 'javascript:void(0)';
  a.onclick = function()
  {
    document.body.removeChild(document.getElementById('layer'));
    document.body.removeChild(document.getElementById('box'));
  };
 
  div.appendChild(a);
}*/
</script> 
<script type="text/javascript">
//function a_onClick() {
//	
//	$("#test-link").colorbox({width:"70%", height:"400px", inline:true, href:"#test-content"});
  	//alert("hello");	
  //}
</script>
</head>
<body>
<div id="<?php echo $id; ?>">
	<?php if(!empty($albums)): ?>
	<?php if($showNav): ?>
		<p class="gallery_nav"><?php //echo $name; ?></p>
	<?php endif; ?>
	<ul class="egallery">
	<?php
	$i=1;
	foreach($albums as $album): ?>
		<li<?php if($albumsPerRow!=0 && $i%$albumsPerRow==1) echo ' class="newRow"'; ?>>
			<a href="<?php echo $this->controller->createUrl($this->controller->action->id,array('dir'=>$album['name'])); ?>" title="<?php echo $album['title']; ?>">
				<img src="<?php echo $album['thumb']; ?>" alt="<?php echo $album['title']; ?>" />
				<?php echo $album['title']; ?>
			</a>
			<?php //if($displayNumImages){ printf(ngettext("%d image", "%d images", $album['count']), $album['count']); } ?>
		</li>
	<?php
		$i++;
	endforeach; ?>
	</ul>
	<div class="newRow"></div>
	<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

	<?php elseif(!empty($images)): ?>
	<?php if($showNav): ?>
		<p class="gallery_nav"><?php echo CHtml::link($name,
			$this->controller->createUrl($this->controller->action->id)); ?> -> <?php echo $details['name']; ?></p>
		<?php if(!empty($details['description'])): ?>
			<p class="gallery_description"><?php echo $details['description']; ?></p>
		<?php endif; ?>
	<?php endif; ?>
	<ul class="egallery">
	<?php
	$i=1;
	/*foreach($images as $image): ?>
		<li<?php if($imagesPerRow!=0 && $i%$imagesPerRow==1) echo ' class="newRow"'; ?>><a href="<?php echo $image['url']; ?>" title="<?php echo $image['alt']; ?>"><img src="<?php echo $image['thumb']; ?>" alt="<?php echo $image['alt']; ?>" /><?php echo $image['alt']; ?></a></li>

	
	<?php 
		$i++;
	 ?>
		
	<?php endforeach;*/?>

<marquee direction="right" onmouseover="this.stop();" onmouseout="this.start();">

<?php
	
	$i=1;
	foreach($images as $image): 
	if($imagesPerRow!=0 && $i%$imagesPerRow==1)	
?>
	<a href="<?php echo $image['url']; ?>" title="<?php echo $image['alt'];?>" id="table<?php echo $i;?>"><img src="<?php echo $image['thumb']; ?>" style="float:left" "alt="none" border="0" /></a>
	<!--<a href="#" id="test-link"><img src="<?php echo $image['thumb']; ?>" style="float:left" "alt="none" border="0" onClick="a_onClick()"/></a>-->
	<?php
			 $config = array( 
					'scrolling' => 'no',
					'autoDimensions' => false,
					'width' => 'auto',
					'height' => 'auto', 
				 //   'titleShow' => false,
				       'overlayColor' => '#000',
				       'padding' => '0',
				       'showCloseButton' => true,			
				       'onClose' => function() {
						return window.location.reload();
					},

				// change this as you need
				);
				$this->widget('application.extensions.fancybox.EFancyBox', array('target'=>'#table'.$i, 'config'=>$config));?>
	<?php 
	//echo $image['url'];
	$i++;	
?>
	
	<?php endforeach;?>
	
</div>	</marquee>
	
	      
	
	<div class="newRow"></div>
	
	<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>

	<?php endif; ?>
</div>
</body>
</html>
