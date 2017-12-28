jQuery(document).ready(function($){
	$(window).scroll(function(){
		var wscroll = $(window).scrollTop();
		if (wscroll > 100) {
			$('#navbar-scroll').removeClass('navbar').addClass('navbar-2');
		}
		else {
			$('#navbar-scroll').removeClass('navbar-2').addClass('navbar');
		}
	});
	$(document).ready(function() {     
    	$('#googleMap').hover(function(){     
        	$('#navbar-scroll').removeClass('navbar').addClass('navbar-2');   
    },     
    function(){    
        $('#navbar-scroll').removeClass('navbar-2').addClass('navbar');
    });
});   
});
jQuery(document).ready(function($) {
        
   /* activate the carousel */
   $("#modal-carousel").carousel({interval:false});

   /* change modal title when slide changes */
   $("#modal-carousel").on("slid.bs.carousel",       function () {
        $(".modal-title")
        .html($(this)
        .find(".active img")
        .attr("title"));
   });

   /* when clicking a thumbnail */
   $(".row .thumbnail").click(function(){
    var content = $(".carousel-inner");
    var title = $(".modal-title");
  
    content.empty();  
    title.empty();
  
  	var id = this.id;  
     var repo = $("#img-repo .item");
     var repoCopy = repo.filter("#" + id).clone();
     var active = repoCopy.first();
  
    active.addClass("active");
    title.html(active.find("img").attr("title"));
  	content.append(repoCopy);

    // show the modal
  	$("#modal-gallery").modal("show");
  });

});