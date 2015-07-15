//<![CDATA[
//$.noConflict();
  jQuery(document).ready(function($) {
  	/* MOBILE SUBMENU */
	   	$('a.mob-nav-parent').click(function(e){
	   		console.log("menu click");
	  		e.preventDefault();
	  		$(this).siblings('.mob-subnav').toggle();
	  	});
  	/* END MOBILE SUBMENU */
	
	$(".carousel").jCarouselLite({
	  btnNext: ".next",
	  btnPrev: ".prev",
	  visible: 6
	});
    $(".carousel ul li a img").css("opacity", "1");
      $(".carousel ul li a img").hover(function(){
     	$(this).animate({opacity:"0.6"}, "fast")
     	 	}, function(){
	 	$(this).animate({opacity:"1"}, "fast")
    });
	
	$(".carouselQuote").jCarouselLite({
	  btnNext: ".next",
	  btnPrev: ".prev",
	  visible: 1
	});
	$(".carouselQuote ul li a img").css("opacity", "1");
      $(".carouselQuote ul li a img").hover(function(){
     	$(this).animate({opacity:"0.6"}, "fast")
     	 	}, function(){
	 	$(this).animate({opacity:"1"}, "fast")
    });
	
	/* BXSLIDER */
	$('#sliderlist').bxSlider({
		mode: 'fade',
		infiniteLoop: true,
		auto: true,
		pause: 7000,
		controls: false
	});
	
	$('#sliderlistone').bxSlider({
		mode: 'fade',
		infiniteLoop: true,
		auto: true,
		pause: 5000,
		prevImage: 'images/bigprev.png',
		nextImage: 'images/bignext.png',
		pager: true,
   			buildPager: function(slideIndex){
			    switch (slideIndex){
		        case 0:
        		  return '<a href="" class="dot"><img src="images/circle.png" /></a>';
		        case 1:
        		  return '<a href="" class="dot"><img src="images/circle.png" class="last" /></a>';
		        }
		    }
	});
	/* END OF BXSLIDER */
	
	if($('#slider').length) {
	/*$('#sliderlist').jcarousel({
        auto: 0,
		animation: 'slow',
        wrap: 'circular',
		scroll: 1,
        initCallback: mycarousel_initCallback,
		buttonNextHTML: '<div><img src="images/bigslides/bignext.png" alt="" style="display:none !important;" /></div>',
		buttonPrevHTML: '<div><img src="images/bigslides/bigprev.png" alt="" style="display:none !important;" /></div>'
    }); */
	}
	
	$("#q").blur(function() {
		if ($(this).val() == '') {
			$(this).val("SEARCH"); 
		}
	});
	$("#q").focus(function() {
		if ($(this).val() == 'SEARCH') {
			$(this).val(""); 
		}
	});
	
	$("ul.tabs").tabs("div.panes > div");

function mycarousel_initCallback(carousel)
{	
	$(".circle").show();
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
		$(".circle").hide();
		setTimeout("showcircle()",800);
    });
    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
		$(".circle").hide();
		setTimeout("showcircle()",800);
    });
    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
} //end of mycarousel function

if($(window).width() >= 768) {
	$("#mainnav ul li a").click(function() {
		$("#mainnav ul li").removeClass("current");
		$(this).parent().addClass("current");
	});
}

$("a[rel^='modal']").prettyPhoto({
  show_title: false, /* true/false */
  social_tools: false
});

$("a[rel^='prettyPhoto']").prettyPhoto({
  show_title: false, /* true/false */
  default_width: 400,
  social_tools: false,
  theme: 'facebook'
});

/*$("#accordion").accordion({ header: "h3", collapsible: true, autoHeight: false });*/
$("#accordion").accordion({ header: "h3", collapsible: true, autoHeight: false, active:false });

var string = getvars();
var mode = string['mode'];
if (mode == '5') {
	$("#accordionpas").accordion({ header: "h3", collapsible: true, autoHeight: false, active: 5});
	$('html, body').animate({
        scrollTop: $("#videos").offset().top
    }, 2000);
} else {
	$("#accordionpas").accordion({ header: "h3", collapsible: true, autoHeight: false, active: false });
}

$('#dialog_link, ul#icons li').hover(
	function() { $(this).addClass('ui-state-hover'); }, 
	function() { $(this).removeClass('ui-state-hover'); }
);

$("a[rel^='modal']").prettyPhoto({
  show_title: false, /* true/false */
  default_width: 456,
  social_tools: false
});

$("a[rel^='imgmodal']").prettyPhoto({
  social_tools: false,
  theme: 'facebook',
  overlay_gallery: false,
  slideshow:5000, 
  autoplay_slideshow:false
});

$("a[rel^='slideshow']").prettyPhoto({
    social_tools: false,
    theme: 'facebook',
    overlay_gallery: false,
    slideshow:5000, 
    autoplay_slideshow:true
});

});
//end of document ready

function open_slideshow() {
    var where = '';
    var title = '';
    var comment = '';
    $.prettyPhoto.open(where, title, comment);
}
function showcircle() {
	$(".circle").show();
}

function autoanim() {
	$(".jcarousel-next").click();
}

function getvars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }

    return vars;
}

function open_slideshow() {
    api_images = ['images/fullscreen/image1.jpg','images/fullscreen/image2.jpg','images/fullscreen/image3.jpg'];
    api_titles = ['Title 1','Title 2','Title 3'];
    api_descriptions = ['Description 1','Description 2','Description 3']
    $.prettyPhoto.open();
    
}
//]]>