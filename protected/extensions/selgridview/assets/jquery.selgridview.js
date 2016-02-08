(function ($) {
    var methods,
    selGridSettings = [];
    
    methods = {
        init: function (options) {
            var selSettings = $.extend({
                selVar: 'sel'
            }, options || {});

            return this.each(function () {
                var $grid = $(this),
                id = $grid.attr('id'),
                beforeAjaxUpdateOrig;

                selGridSettings[id] = selSettings;

                //overloading beforeAjaxUpdate 
                var settings = $.fn.yiiGridView.settings[id];
                if(settings.beforeAjaxUpdate !== undefined) {
                    beforeAjaxUpdateOrig = settings.beforeAjaxUpdate;
                } else {
                    beforeAjaxUpdateOrig = function(id, options) {}; 
                }

                delete settings.beforeAjaxUpdate;
                settings.beforeAjaxUpdate = function(id, options) {
                    var selVar = selGridSettings[id].selVar,
                    selection = $('#' + id).selGridView('getAllSelection'),
                    params = $.deparam.querystring(options.url);

                    if(!selection.length) {  //if nothing selected in whole grid -> clear selVar in request
                        params[selVar] = [];
                    } else {                //otherwise set selVar to array of selected keys
                        params[selVar] = selection;
                    }                    

                    options.url = $.param.querystring(options.url, params);

                    //call user's handler
                    beforeAjaxUpdateOrig(id, options);
                }

            });
        },        
          
        getAllSelection: function () {
            var settings = $.fn.yiiGridView.settings[this.attr('id')],
            selVar = selGridSettings[this.attr('id')].selVar,
            url = this.yiiGridView('getUrl');

            var params = $.deparam.querystring(url);

            //rows selected by GET
            var checkedInQuery = (params[selVar]) ? params[selVar] : [];
            if(!$.isArray(checkedInQuery)) checkedInQuery = [checkedInQuery];

            //rows selected on current page
            var checkedInPage = this.yiiGridView('getSelection');

            /*
              if only one row can be selected:
                1. if selected on current page - return it
                2. if nothing selected on current page - return previous selection
            */
            if(settings.selectableRows == 1) {
                if(checkedInPage.length) {
                    return checkedInPage;
                } else {
                    return checkedInQuery;
                }
            }

            /*
            if selectableRows > 1 - merge selected on current page with selected on other pages
            We need go though all keys on current page because user could deselect some of previously selected - we should delete it
            */

            //iterating all keys of this page
            this.find(".keys span").each(function (i) {
                var key = $(this).text();

                //row found in GET params: means row was selected on page load
                var indexInQuery = $.inArray(key, checkedInQuery);

                //row is checked on current page
                var indexInChecked = $.inArray(key, checkedInPage);

                //row is selected and not in GET params --> adding to GET params
                if(indexInChecked >= 0 && indexInQuery == -1) {
                    checkedInQuery.push(key); 
                }

                //row not selected, but in GET params due to selected on page load --> deleting from GET params
                if(indexInChecked == -1 && indexInQuery >= 0) {
                    checkedInQuery.splice(indexInQuery, 1); 
                }
            });     

            return checkedInQuery;

            if(!checkedInQuery) {   //if nothing selected in whole grid -> delete "sel" variable from request
                if(params[selVar]) delete params[selVar];
            } else {                //otherwise set "sel" var to array of selected keys
                params[selVar] = checkedInQuery;
            }                    

        },
        
        clearAllSelection: function() {
             //clear on current page
             this.find('tr.selected').click();

             //clear in url             
             var parsed = this.selGridView('parseUrl');
             parsed.params[parsed.selVar] = [];
  
             //set url back
             var newUrl = $.param.querystring(parsed.url, parsed.params);
             this.selGridView('setUrl', newUrl);
        },
        
        addSelection: function(keys) {
            if(!keys) return;
            if(!$.isArray(keys)) keys = [keys];

            var parsed = this.selGridView('parseUrl'),
                pageKeys = this.find(".keys span"),
                rows = this.find("tbody tr");
                
             //add to url params
             $.each(keys, function(index, value) {
                 if($.inArray(value, parsed.selected) === -1) {
                    parsed.selected.push(value); 
                    
                    //select row on grid
                    pageKeys.each(function (i) {
                        if($(this).text() == value) {
                            rows.eq(i).click();
                        }
                    });
                 }
             });
  
             parsed.params[parsed.selVar] = parsed.selected; 
  
             //set url back
             var newUrl = $.param.querystring(parsed.url, parsed.params);
             this.selGridView('setUrl', newUrl);
        },
        
        /**
        * set new url of grid
        */
        setUrl: function(url) {
            var id = this.attr('id'),
                settings = $.fn.yiiGridView.settings[id],
                ws
             if(settings.url) {
                settings.url = url; 
             } else {
                this.children('.keys').attr('title', url);
             }  
        },
        
        /**
        * returns IDs selected in url.
        * internal. 
        */
        parseUrl: function() {
            var id = this.attr('id'),
                settings = $.fn.yiiGridView.settings[id],
                selVar = selGridSettings[id].selVar,
                url = this.yiiGridView('getUrl'),
                params, result;

                // bug in BBQ when url does not contain '?'. https://github.com/cowboy/jquery-bbq/issues/34   
                if(url.indexOf('?') === -1) {
                    params = [];   
                } else {
                    params = $.deparam.querystring(url);
                }               

                //rows selected by GET
                result = (params[selVar]) ? params[selVar] : [];
                if(!$.isArray(result)) result = [result]; 

                return {url: url, selVar: selVar, params: params, selected: result};
        }
        
    };


    $.fn.selGridView = function (method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        }else {
            $.error('Method ' + method + ' does not exist on jQuery.selGridView');
            return false;
        }
    };        

})(jQuery);
