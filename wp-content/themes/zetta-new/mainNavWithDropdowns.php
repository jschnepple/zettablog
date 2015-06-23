<?php
	$home = "";
	$prod = "";
	$use = "";
	$cust = "";
	$part = "";
	$newsEvents = "";
	$resources = "";
	$about = "";

	// home
	if ( $mainNavId === "home" && $rtNavId === "" ) {
		$home = '<li class="leftEndOn menuItem" id="ho">' .
			      '<div class="navUpper">' .
				    '<div>Home</div>' .
					'<div class="navLower"></div>' .
				  '</div>' .
				'</li>';
	} else {
		$home = '<li class="leftEndOff menuItem" id="ho">' .
			      '<div class="navUpper">' .
				    '<div><a href="'.$sp.'index.php">Home</a></div>' .
					'<div class="navLower"></div>' .
				  '</div>' .
				'</li>';
	}

	// products
	if ( $mainNavId === "products" ) {
		$prod = '<li class="innerOn menuItem" id="pr">' .
			       '<div class="navUpper">' .
			         '<div><a href="'.$sp.'Zetta-Data-Protect.php">Products</a></div>' .
				     '<div class="navLower"></div>' .
				   '</div>' .
				   '<div class="ddown">' .
				     '<ul>' .
				       '<li><a href="'.$sp.'Zetta-Data-Protect.php">Zetta DataProtect</a></li>' .
				       '<li><a href="'.$sp.'architecture.php">Architecture</a></li>' .
				       '<li><a href="'.$sp.'screenshots.php">Screenshots</a></li>' .
			         '</ul>' .
				   '</div>' .
				 '</li>';
	} else {
		$prod = '<li class="innerOff menuItem" id="pr">' .
			      '<div class="navUpper">' .
				    '<div><a href="'.$sp.'Zetta-Data-Protect.php">Products</a></div>' .
				    '<div class="navLower"></div>' .
				  '</div>' .
			      '<div class="ddown">' .
				    '<ul>' .
				       '<li><a href="'.$sp.'Zetta-Data-Protect.php">Zetta DataProtect</a></li>' .
				       '<li><a href="'.$sp.'architecture.php">Architecture</a></li>' .
				       '<li><a href="'.$sp.'screenshots.php">Screenshots</a></li>' .
			        '</ul>' .
				  '</div>' .
				'</li>';
	}

	// use cases
/*	if ( $mainNavId === "solutions" ) {
		$use = '<li class="innerOn menuItem" id="so">' .
			     '<div class="navUpper">' .
				   '<div><a href="'.$sp.'solutions.php">Solutions</a></div>' .
				   '<div class="navLower"></div>' .
			     '</div>' .
			      '<div class="ddown">' .
				    '<ul>' .
				       '<li><a href="'.$sp.'Zetta-Data-Protect.php">Zetta Data Protect</a></li>' .
				       '<li class="last"><a href="'.$sp.'online-archive.php">Online Archive</a></li>' .
			        '</ul>' .
				  '</div>' .
			   '</li>';
	} else {
		$use = '<li class="innerOff menuItem" id="so">' .
			     '<div class="navUpper">' .
				   '<div><a href="'.$sp.'solutions.php">Solutions</a></div>' .
				   '<div class="navLower"></div>' .
				 '</div>' .
			      '<div class="ddown">' .
				    '<ul>' .
				       '<li><a href="'.$sp.'Zetta-Data-Protect.php">Zetta Data Protect</a></li>' .
				       '<li class="last"><a href="'.$sp.'online-archive.php">Online Archive</a></li>' .
			        '</ul>' .
				  '</div>' .
			  '</li>';
	}
*/
	// customers
    if ( $mainNavId === "customers" ) {
		$cust = '<li class="innerOn menuItem" id="cu">' .
			      '<div class="navUpper">' .
				    '<div><a href="'.$sp.'customers.php">Customers</a></div>' .
					'<div class="navLower"></div>' .
				  '</div>' .
			      '<div class="ddown">' .
				    '<ul>' .
				       '<li><a href="'.$sp.'case-studies.php">Case Studies</a></li>' .
				       '<li><a href="'.$sp.'businessServices.php">Business Services</a></li>' .
				       '<li><a href="'.$sp.'education.php">Education</a></li>' .
				       '<li><a href="'.$sp.'financial-services.php">Financial Services</a></li>' .
				       '<li><a href="'.$sp.'legal-services.php">Legal Services</a></li>' .
				       '<li><a href="'.$sp.'media-and-entertainment.php">Media &amp; Entertainment</a></li>' .
				       '<li class="last"><a href="'.$sp.'software-and-technology.php">Software &amp; Technology</a></li>' .
			        '</ul>' .
				  '</div>' .
				'</li>';
	} else {
		$cust = '<li class="innerOff menuItem" id="cu">' .
			      '<div class="navUpper">' .
				    '<div><a href="'.$sp.'customers.php">Customers</a></div>' .
					'<div class="navLower"></div>' .
				  '</div>' .
			      '<div class="ddown">' .
				    '<ul>' .
				       '<li><a href="'.$sp.'case-studies.php">Case Studies</a></li>' .
				       '<li><a href="'.$sp.'businessServices.php">Business Services</a></li>' .
				       '<li><a href="'.$sp.'education.php">Education</a></li>' .
				       '<li><a href="'.$sp.'financial-services.php">Financial Services</a></li>' .
				       '<li><a href="'.$sp.'legal-services.php">Legal Services</a></li>' .
				       '<li><a href="'.$sp.'media-and-entertainment.php">Media &amp; Entertainment</a></li>' .
				       '<li class="last"><a href="'.$sp.'software-and-technology.php">Software &amp; Technology</a></li>' .
			        '</ul>' .
				  '</div>' .
				'</li>';
	}

	// partners
	if ( $mainNavId === "partners" ) {
		$part = '<li class="innerOn menuItem" id="pa">' .
			      '<div class="navUpper">' .
				    '<div><a href="http://pages.zetta.net/partners.html">Partners</a></div>' .
					'<div class="navLower"></div>' .
				  '</div>' .
				'</li>';
	} else {
		$part = '<li class="innerOff menuItem" id="pa">' .
			      '<div class="navUpper">' .
				    '<div><a href="http://pages.zetta.net/partners.html">Partners</a></div>' .
					'<div class="navLower"></div>' .
				  '</div>' .
				'</li>';
	}

	// news and events
	if ( $mainNavId === "newsEvents" ) {
		$newsEvents = '<li class="innerOn menuItem" id="ne">' .
			            '<div class="navUpper">' .
				          '<div><a href="'.$sp.'news.php">News &amp; Awards</a></div>' .
				          '<div class="navLower"></div>' .
			            '</div>' .
				        '<div class="ddown">' .
				          '<ul>' .
					        '<li><a href="'.$sp.'news.php">Zetta in the News</a></li>' .
				            '<li><a href="'.$sp.'pressReleases.php">Zetta Press Releases</a></li>' .
				            '<li class="last"><a href="'.$sp.'awards.php">Awards</a></li>' .
			              '</ul>' .
				        '</div>' .
			          '</li>';
	} else {
		$newsEvents = '<li class="innerOff menuItem" id="ne">' .
			            '<div class="navUpper">' .
				          '<div><a href="'.$sp.'news.php">News &amp; Awards</a></div>' .
				          '<div class="navLower"></div>' .
				        '</div>' .
				        '<div class="ddown">' .
				          '<ul>' .
					        '<li><a href="'.$sp.'news.php">Zetta in the News</a></li>' .
				            '<li><a href="'.$sp.'pressReleases.php">Zetta Press Releases</a></li>' .
				            '<li class="last"><a href="'.$sp.'awards.php">Awards</a></li>' .
			              '</ul>' .
				        '</div>' .
			          '</li>';
	}

	// resources
	if ( $mainNavId === "resources" ) {
		$resources = '<li class="innerOn menuItem" id="re">' .
			            '<div class="navUpper">' .
				          '<div><a href="'.$sp.'productAndService.php">Resources</a></div>' .
				          '<div class="navLower"></div>' .
			            '</div>' .
				        '<div class="ddown">' .
				          '<ul>' .
					        '<li><a href="'.$sp.'productAndService.php">Product Info</a></li>' .
				            '<li><a href="'.$sp.'productAndService.php?mode=5">Videos</a></li>' .
					        '<li><a href="http://info.zetta.net/">Blog</a></li>' .
				            '<li class="last"><a href="'.$sp.'webinarSchedule.php">Webinars</a></li>' .
			              '</ul>' .
				        '</div>' .
			          '</li>';
	} else {
		$resources = '<li class="innerOff menuItem" id="re">' .
			            '<div class="navUpper">' .
				          '<div><a href="'.$sp.'productAndService.php">Resources</a></div>' .
				          '<div class="navLower"></div>' .
				        '</div>' .
				        '<div class="ddown">' .
				          '<ul>' .
					        '<li><a href="'.$sp.'productAndService.php">Product Info</a></li>' .
				            '<li><a href="'.$sp.'productAndService.php?mode=5">Videos</a></li>' .
					        '<li><a href="http://info.zetta.net/">Blog</a></li>' .
				            '<li class="last"><a href="'.$sp.'webinarSchedule.php">Webinars</a></li>' .
			              '</ul>' .
				        '</div>' .
			          '</li>';
	}

	// about us
	if ( $mainNavId === "aboutUs" ) {
		$about = '<li class="outerOnRt menuItem" id="ab">';
	} else {
		$about = '<li class="outerOffRt menuItem" id="ab">';
	}
	$about .= '<div class="navUpper">' .
			    '<div><a href="'.$sp.'aboutUs.php">About Us</a></div>' .
				'<div class="navLower"></div>' .
				'</div>' .
				  '<div class="ddown">' .
				    '<ul>' .
					  '<li><a href="'.$sp.'management.php">Management</a></li>' .
					  '<li><a href="'.$sp.'boardOfDirectors.php">Board of Directors</a></li>' .
					  '<li><a href="'.$sp.'investors.php">Investors</a></li>' .
					  '<li><a href="'.$sp.'careers.php">Careers</a></li>' .
					  '<li class="last"><a href="http://pages.zetta.net/contact-us.html">Contact Us</a></li>' .
					'</ul>' .
				  '</div>' .
			  '</li>';

	if ( $mainNavId === "docs" && $rtNavId === "" ) {
		$doNothing = null;
	}
?>
		<!-- BEGIN MAIN NAV FRAME -->
		<div id="mainNavFrame">
			<ul>
				<?php echo $home . "\n"; ?>
				<li class="separator"></li>
				<?php echo $prod . "\n"; ?>
				<li class="separator"></li>
				<?php echo $cust . "\n"; ?>
				<li class="separator"></li>
				<?php echo $part . "\n"; ?>
				<li class="separator"></li>
				<?php echo $newsEvents . "\n"; ?>
				<li class="separator"></li>
				<?php echo $resources . "\n"; ?>
				<li class="separator"></li>
				<?php echo $about . "\n"; ?>
				<!--
				<li class="separator"></li>
				<li class="fillRt"></li>
        		<li class="rtEdge"></li>
				-->
			</ul>
		</div>
		<!-- END MAIN NAV FRAME -->
