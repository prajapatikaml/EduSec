$(function() {
  $(".nav-tabs li a").click(function() {
    history.pushState({}, '', $(this).attr("href"));
    
  });
});

$(function() {
   $(window).scrollTop(1);
   var url = document.location.toString();
   if (url.match('#')) {
      $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
   } 
   $('.nav-tabs a').on('shown', function (e) {
      window.location.hash = e.target.hash;
   })
});
