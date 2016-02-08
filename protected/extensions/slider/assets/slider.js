
function startCycle(container, width, height, infos, timeout){
	if(infos) setInfo(width, height);
	var slider = $('.'+container);

	slider.cycle({
		fx: 'fade,curtainY', // blindX, blindY, blindZ, cover, curtainX, curtainY, fade, fadeZoom, growX, growY, none, scrollUp, scrollDown, scrollLeft, scrollRight, scrollHorz, scrollVert, shuffle, slideX, slideY, toss, turnUp, turnDown, turnLeft, turnRight, uncover, wipe, zoom,.
		randomizeEffects: true,
		timeout: parseInt(timeout),
		after: function(){$('.infoSlider').html(slider.find('img:visible').attr('alt'));}
	});
}

function setInfo(width, height){
	var hInfo = 10;
	var padd = 10;
	var tp = 2*padd;
	var w = (parseInt(width)-tp);
	var marginTop = hInfo+tp;
	$('.infoSlider').css({
		'width': w+'px', 
		'height':hInfo+'px', 
		'padding': padd+'px', 
		'margin-top': -marginTop+'px'
	});
}






