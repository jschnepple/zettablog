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
  });
//]]>