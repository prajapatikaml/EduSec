<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<?php
$this->breadcrumbs=array(
	'Photo Gallery'=>array('admin'),
	'All Photos'
);
?>
	<div id="main" >

		<ul class="gallery clearfix edusec-screenshot">
		<?php foreach($imags as $index=>$val) { 
		$desc_text = $val; 
		if($desc[$index] != "")
		$desc_text = $desc[$index];
		?>	
		<div><li>
				<span class="screen-text"><b><?php echo $desc_text;?></b></span>
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/college_data/gallery/album1/<?php echo $val;?>"  rel="prettyPhoto[gallery2]" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/college_data/gallery/album1/<?php echo $val;?>" width="280" height="128" alt="<?php echo $desc[$index];?>" /></a>
		</li></div>

			<?php } ?>
</ul>
	
			<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
	

	</div>

