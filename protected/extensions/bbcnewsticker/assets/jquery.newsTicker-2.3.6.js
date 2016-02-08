/*
News ticker plugin (BBC news style)
Bryan Gullan,2007-2011
version 2.3.6
updated 2011-03-16
Documentation at http://www.makemineatriple.com/news-ticker-documentation/
Demo at http://www.makemineatriple.com/jquery/?newsTicker
Use and distrubute freely with this header intact.
*/

(function($) {
	
	var name='newsTicker';
	var debugMode = false; // enabling this turns on console logging for interactions
	
	function runTicker(settings) {
		
		tickerData = $(settings.newsList).data('newsTicker');
		
		if(tickerData.currentItem > tickerData.newsItemCounter){
			// if we've looped to beyond the last item in the list, start over
			tickerData.currentItem = 0;
		}
		else if (tickerData.currentItem < 0) {
			// if we've looped back before the first item, move to the last one
			tickerData.currentItem = tickerData.newsItemCounter;
		}
		
		if(tickerData.currentPosition == 0) {
			if(tickerData.newsLinks[tickerData.currentItem].length > 0) {
				$(tickerData.newsList).empty().append('<li><a '+ tickerData.newsAttributes[tickerData.currentItem] +'></a></li>');
			}
			else {
				$(tickerData.newsList).empty().append('<li></li>');
			}
		}
		
		//only start the ticker itself if it's defined as animating: otherwise it's paused or under manual advance
		if (tickerData.animating) {
			
			if( tickerData.currentPosition % 2 == 0) {
					var placeHolder = tickerData.placeHolder1;
			}
			else {
				var placeHolder = tickerData.placeHolder2;
			}
			
			if( tickerData.currentPosition < tickerData.newsItems[tickerData.currentItem].length) {
				// we haven't completed ticking out the current item
				
				var tickerText = tickerData.newsItems[tickerData.currentItem].substring(0,tickerData.currentPosition);
				if(tickerData.newsLinks[tickerData.currentItem].length > 0) {
					$(tickerData.newsList + ' li a').text(tickerText + placeHolder);
				}
				else {
					$(tickerData.newsList + ' li').text(tickerText + placeHolder);
				}
				tickerData.currentPosition ++;
				setTimeout(function(){runTicker(settings); settings = null;},tickerData.tickerRate);
			}
			
			else {
				// we're on the last letter of the current item
				
				if(tickerData.newsLinks[tickerData.currentItem].length > 0) {
					$(tickerData.newsList + ' li a').text(tickerData.newsItems[tickerData.currentItem]);
				}
				else {
					$(tickerData.newsList + ' li').text(tickerData.newsItems[tickerData.currentItem]);
				}
				
				setTimeout(function(){
					if (tickerData.animating) {
						tickerData.currentPosition = 0;
						tickerData.currentItem ++;
						runTicker(settings); settings = null;
					}
				},tickerData.loopDelay);
				
			}
		}
		
		else {// settings.animating == false 
			
			// display the full text of the current item
			var tickerText = tickerData.newsItems[tickerData.currentItem];
			
			if(tickerData.newsLinks[tickerData.currentItem].length > 0) {
				$(tickerData.newsList + ' li a').text(tickerText);
			}
			else {
				$(tickerData.newsList + ' li').text(tickerText);
			}
					
		}
		
	}

	
	// Core plugin setup and config
	jQuery.fn[name] = function(options) {
 
	  // Add or overwrite options onto defaults
	  var settings = jQuery.extend({}, jQuery.fn.newsTicker.defaults, options);
	 
    var newsItems = new Array();
		var newsLinks = new Array();
		var newsAttributes = new Array();
		var newsItemCounter = 0;
		
		// Hide the static list items
		$(settings.newsList + ' li').hide();
		
		// Store the items and links in arrays for output
		$(settings.newsList + ' li').each(function(){
			if($(this).children('a').length) {
				newsItems[newsItemCounter] = $(this).children('a').text();
				newsLinks[newsItemCounter] = $(this).children('a').attr('href');
				
				var linkAttributes = new Object();
			  	var attrs = $(this).children('a')[0].attributes;
					for (var i=0;i<attrs.length;i++) {
					linkAttributes[attrs[i].nodeName] = attrs[i].nodeValue;
				}
				if (debugMode){ 
					console.log(linkAttributes);
				}
				
		    var linkAttributesProcessed = '';
 				for (var prop in linkAttributes) {
 					// print out the attributes as a string ready for output within the anchor tag
    			linkAttributesProcessed = linkAttributesProcessed + prop + '="' + linkAttributes[prop] + '" ';
 				}
 				if (debugMode){ 
					console.log(linkAttributesProcessed);
				}
 				
				newsAttributes[newsItemCounter] = linkAttributesProcessed;
				
			}
			else {
				newsItems[newsItemCounter] = $(this).text();
				newsLinks[newsItemCounter] = '';
				newsAttributes[newsItemCounter] = '';
			}
			newsItemCounter ++;
		});
        
        var tickerElement = $(settings.newsList); // for quick reference below
        
        tickerElement.data(name, {
        	newsList: settings.newsList,
					tickerRate: settings.tickerRate,
					startDelay: settings.startDelay,
					loopDelay: settings.loopDelay,
					placeHolder1: settings.placeHolder1,
					placeHolder2: settings.placeHolder2,
					controls: settings.controls,
					ownControls: settings.ownControls,
					stopOnHover: settings.stopOnHover,
					resumeOffHover: settings.resumeOffHover,
          newsItems: newsItems,
					newsLinks: newsLinks,
					newsAttributes: newsAttributes,
					newsItemCounter: newsItemCounter - 1, // -1 because we've incremented even after the last item (above)
					currentItem: 0,
					currentPosition: 0,
					firstRun:1
        })
        .bind({
			stop: function(event) {
				// show remainder of the current item immediately
		    	tickerData = tickerElement.data(name);
		    	if (tickerData.animating) { // only stop if not already stopped
            		tickerData.animating = false;
            		if (debugMode){ 
            			console.log('stop'+tickerData.currentItem + ' ' + tickerData.animating);
            		}
               	}
		  	},
		  	play: function(event) {
		  		// show 1st item with startdelay
		    	tickerData = tickerElement.data(name);
		    	if (!tickerData.animating) { // if already animating, don't start animating again
	            	tickerData.animating = true;
	            	if (debugMode){ 
            			console.log('play'+tickerData.currentItem + ' ' + tickerData.animating);
            		}
	            	setTimeout(function(){runTicker(tickerData); tickerData = null;},tickerData.startDelay);
	            }
		  	},
		  	resume: function(event) {
		  		// start from next item, with no delay
		    	tickerData = tickerElement.data(name);
		    	if (!tickerData.animating) { // if already animating, don't start animating again
	            	tickerData.animating = true;
	            	// set the character position as 0 to ensure on resume we start at the right point
					tickerData.currentPosition = 0;
	            	tickerData.currentItem ++;
	            	if (debugMode){ 
            			console.log('resume'+tickerData.currentItem + ' ' + tickerData.animating);
            		}
		            runTicker(tickerData); // no delay when resuming.
		        }
		  	},
		  	next: function(event) {
		  		// show whole of next item
		  		tickerData = tickerElement.data(name);
		  		// stop (which sets as non-animating), and call runticker
		  		$(tickerData.newsList).trigger("stop");
		  		// set the character position as 0 to ensure on resume we start at the right point
				tickerData.currentPosition = 0;
	            tickerData.currentItem ++;
	            if (debugMode){ 
            			console.log('next'+tickerData.currentItem + ' ' + tickerData.animating);
            		}
		  		runTicker(tickerData);
		  	},
		  	previous: function(event) {
				// show whole of previous item
				tickerData = tickerElement.data(name);
		  		// stop (which sets as non-animating), and call runticker
		  		$(tickerData.newsList).trigger("stop");
		  		// set the character position as 0 to ensure on resume we start at the right point
				tickerData.currentPosition = 0;
	            tickerData.currentItem --;
	            if (debugMode){ 
            			console.log('previous'+tickerData.currentItem + ' ' + tickerData.animating);
            		}
		  		runTicker(tickerData);
			}
		}); 	
		if (settings.stopOnHover) {
	    	tickerElement.bind({			    	
			  	mouseover: function(event) {
			  		tickerData = tickerElement.data(name);
			    	if (tickerData.animating) { // stop if not already stopped
				  		$(tickerData.newsList).trigger("stop");
				  		if (tickerData.controls) { // ensure that the ticker can be resumed if controls are enabled
				  			$('.stop').hide();
			        		$('.resume').show();
				  		}
			  		}
			  	}
			});
			if (settings.resumeOffHover) { // only allowed if stopOnHover enabled
		    	tickerElement.bind({			    	
				  	mouseout: function(event) {
				  		tickerData = tickerElement.data(name);
				    	if (!tickerData.animating) { // if already animating, don't start animating again
			            	$(tickerData.newsList).trigger("resume");
			            	if (debugMode){ 
		            			console.log('resumeoffhover'+tickerData.currentItem + ' ' + tickerData.animating);
		            		}
				        }
				  	}
				});
    		}
    	}
    	
    	tickerData = tickerElement.data(name);
    	
    	// set up control buttons if the option is on
		if (tickerData.controls || tickerData.ownControls) {
			if (!tickerData.ownControls) {
				$('<ul class="ticker-controls"><li class="play"><a href="#play">Play</a></li><li class="resume"><a href="#resume">Resume</a></li><li class="stop"><a href="#stop">Stop</a></li><li class="previous"><a href="#previous">Previous</a></li><li class="next"><a href="#next">Next</a></li></ul>').insertAfter($(tickerData.newsList));
			}
			$('.play').hide();
		    $('.resume').hide();
			
		    $('.play').click(function(event){
		        $(tickerData.newsList).trigger("play");
		        $('.play').hide();
		        $('.resume').hide();
		        $('.stop').show();
		        event.preventDefault();
		    });
		    $('.resume').click(function(event){
		        $(tickerData.newsList).trigger("resume");
		        $('.play').hide();
		        $('.resume').hide();
		        $('.stop').show();
		        event.preventDefault();
		    });
			$('.stop').click(function(event){
		        $(tickerData.newsList).trigger("stop");
		        $('.stop').hide();
		        $('.resume').show();
		        event.preventDefault();
		    });
		    $('.previous').click(function(event){
		        $(tickerData.newsList).trigger("previous");
		        $('.stop').hide();
			    $('.resume').show();
		        event.preventDefault();
		    });
		    $('.next').click(function(event){
		        $(tickerData.newsList).trigger("next");
		        $('.stop').hide();
			    $('.resume').show();
		        event.preventDefault();
		    });

	    };
    	
    	// tell it to play
    	$(tickerData.newsList).trigger("play");
	};

	// News ticker defaults 
	jQuery.fn[name].defaults = {
	  newsList: "#news",
		tickerRate: 80,
		startDelay: 100,
		loopDelay: 3000,
		placeHolder1: " |",
		placeHolder2: "_",
		controls: true,
		ownControls: false,
		stopOnHover: true,
		resumeOffHover: false
	}

})(jQuery);