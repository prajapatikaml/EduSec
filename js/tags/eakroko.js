	// Chosen (chosen)
	if($('.chosen-select').length > 0)
	{
		$('.chosen-select').each(function(){
			var $el = $(this);
			var search = ($el.attr("data-nosearch") === "true") ? true : false,
			opt = {};
			if(search) opt.disable_search_threshold = 9999999;
			$el.chosen(opt);
		});
	}

	if($(".select2-me").length > 0){
		$(".select2-me").select2();
	}
