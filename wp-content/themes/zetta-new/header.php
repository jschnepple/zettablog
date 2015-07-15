<?php
//header("Access-Control-Allow-Origin: *"); 
//ini_set('display_errors',1);
//error_reporting(E_ALL);
/**
 * @package WordPress
 * @subpackage Zetta_Theme
 */

// use this for generation URLs that refer to the main site
// Note that this won't work for paths to include files - use symlinks for 
// those.
$sp = "/";
?>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> style="margin-top: 0px !important;">

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta content="IE=8" http-equiv="X-UA-Compatible" />
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />

<title><?php wp_title('&laquo;', true, 'right'); ?> </title>
<link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="all" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- <script src="<?php bloginfo('template_directory'); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="/js/cufon/zettahelv_400-zettahelv_700.font.js" type="text/javascript"></script> 
<script src="<?php bloginfo('template_directory'); ?>/js/zettahelv_400-zettahelv_700.font.js" type="text/javascript"></script>
<script type="text/javascript">
  Cufon.replace("#mainnav ul li a", {hover:true, fontFamily: 'zettahelv'});
		Cufon.replace('.helvetica', {hover: true});
		Cufon.replace('.helv', {hover: true});
		Cufon.replace('#mainnav ul li a');
		Cufon.replace('#slideonebut', {textShadow: '#333 -1px -1px'});
		Cufon.replace('.subheaderof');
		Cufon.replace('#newfreetrial', {textShadow: '#d25515 -1px -1px'});
	/*	Cufon.replace('.slidebox .title', {textShadow: '-1px -1px 0 #1b749f'});
		Cufon.replace('.slidebox .text1', {textShadow: '1px 1px 0 #1b749f'});
		Cufon.replace('.slidebox .text2', {textShadow: '1px 1px 0 #1b749f'});  */
</script> -->

<!-- also include the yahoo reset and fonts and the main site stylesheet -->
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/combo?3.3.0/build/cssfonts/fonts-min.css&3.3.0/build/cssreset/reset-min.css">
<link rel="stylesheet" href="/site.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/responsive.css" type="text/css" media="all" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

<!--Universal GA Script -->
<script>
  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  	ga('create', 'UA-9296505-8', 'zetta.net');
  	ga('send', 'pageview');

</script>
<!--END Universal GA Script -->

<!-- Google Analytics snippet -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-9296505-1']);
  _gaq.push(['_setDomainName', 'zetta.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- End Google Analytics snippet -->
<?php if ( is_singular() ){ $thisPost = get_post(); if ($thisPost->post_title == 'Disaster Recovery as a Service in the Cloud'){?> 

<script src="//platform.twitter.com/oct.js" type="text/javascript"></script>
<script type="text/javascript">
twttr.conversion.trackPid('l63z1', { tw_sale_amount: 0, tw_order_quantity: 0 });</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=l63z1&p_id=Twitter&tw_…" />
<img height="1" width="1" style="display:none;" alt="" src="//t.co/i/adsct?txn_id=l63z1&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" /></noscript>

 <?php } }  ?>
</head>
<body>
    <script type="text/javascript">
        // Facebook shizzle
        window.fbAsyncInit = function() {
            var a = "let's try Facebook";
            FB.init( {
                appId  : '232053710158192',
                status : true, // check login status
                cookie : true, // enable cookies to allow the server to access the session
                xfbml  : true  // parse XFBML
            } );
        };
    </script>
	<!-- BEGIN STICKY FOOTER WRAPPER -->
	<div class="stickyFooterWrap">
		<!-- BEGIN OUTER FRAME -->
		<div id="outerFrame">
        <div id="lpChatBtn">
            <!-- BEGIN LivePerson Button Code -->
            <div id="lpButDivID-1313166174343"></div>
            <script type="text/javascript" charset="UTF-8" src="https://server.iad.liveperson.net/hc/30095182/?cmd=mTagRepstate&site=30095182&buttonID=12&divID=lpButDivID-1313166174343&bt=1&c=1"></script>
            <!-- END LivePerson Button code -->
        </div>
        
<!-- BEGIN HEADER FRAME -->
<div id="header" class="new" style="background-image: none;">
    <div itemscope itemtype="http://schema.org/Organization" id="logo" >
	<a href="http://www.zetta.net/" id="headerLogo"><img src="<?php bloginfo('template_directory'); ?>/images/new_logo.png" alt="Zetta logo" /></a>
    </div>
    <div class="tagline">
	<p class="nospace helv">Enterprise-grade Cloud Backup<br> and Disaster Recovery</p>
    </div>
    <div id="topnav" class="nospace">
        <a href="https://admin.zetta.net/" class="helv" title="Login">Login</a>
        <a href="http://blog.zetta.net" class="helv" title="Blog">Blog</a>
        <a href="http://pages.zetta.net/contact-us.html" class="helv" title="Contact Us">Contact Us</a>
        <a href="http://pages.zetta.net/pricing.html" class="last helv" title="Pricing">Pricing</a>
    </div>
    <a href = "http://pages.zetta.net/contact-us.html" style="display:block; float:left; font-size: 18px; font-weight: bold; color: #4d4d4d; padding-left: 20px; background: url(<?php bloginfo('template_directory'); ?>/images/phoneIcon_new.png) no-repeat 0px 0px; position: absolute; top: 16px; right: 0px;" class="helv">1.877.469.3882</a>
    <a href="http://pages.zetta.net/free-trial.html" id="topfreetrialnew"></a>
</div>
<div id="marketomenu" class="blog">
<!-- BEGIN MAIN NAV FRAME -->
        
    <div id="mainnav" class="">
        <a href="javascript:void(0)" onclick="jQuery('ul.mobileNav').toggle()" class="mobIcon"></a>
        <span class="menu-mobile" style="display:none;">Menu</span>
        <!-- MOBILE MENU -->
        <ul class="mobileNav">
            <li class="mob-nav-item">
                <a class="mob-nav-parent helvcondlight" href="#">Products</a>
                <ul class="mob-subnav">
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/Zetta-Data-Protect.php">Zetta DataProtect</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/architecture.php">Architecture</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/screenshots.php">Screenshots</a></li>
                </ul>
            </li>
            <li class="mob-nav-item">
                <a class="mob-nav-parent helvcondlight" href="#">IT Initiatives</a>
                <ul class="mob-subnav">
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/disaster-recovery-as-a-service-cloud-solution.php">Disaster Recovery as a Service</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/server-backup/index.php">Windows Server Backup</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/exchange-server-cloud-backup/">Exchange Server Backup</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/sql-server-backup.php">SQL Server Backup</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/Multi-Platform-Backups.php">Multi-Platform Server Backups</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/server-image-cloud-backup.php">Server Image Backup</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/remote-offsite-server-backup.php">Offsite Data Backup and DR</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/offsite-backup-calculator.php">Tape Replacement - ROI Calculator</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/bare-metal-restore-servers/index.php">Bare Metal Restore</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/netapp/">NetApp Offsite Backup &amp; DR</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/it-disaster-recovery-plan.php">IT Disaster Recovery Planning</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/backup-appliance-comparison.php">Appliance-free Backup &amp; DR</a></li>
                </ul>
            </li>
            <li class="mob-nav-item">
                <a class="mob-nav-parent helvcondlight" href="#">Resources</a>
                <ul class="mob-subnav">
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/resources-datasheets-whitepapers.php">Datasheets &amp; Whitepapers</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/resources-videos.php">Videos</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/resources-analyst-reports.php">Analyst Reports</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/resources-tools.php">Tools</a></li>                        
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/resources-webinars.php">Webinars</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/zetta-competitor-reviews.php">Zetta vs. Competitors</a>
                </ul>
            </li>
            <li class="mob-nav-item">
                <a class="mob-nav-parent helvcondlight" href="#">Customers</a>
                <ul class="mob-subnav">
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/case-studies.php">Case Studies</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/business-services.php">Business Services</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/customers-education.php">Education</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/financial-services.php">Financial Services</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/legal-services.php">Legal Services</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/media-and-entertainment.php">Media &amp; Entertainment</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/software-and-technology.php">Software &amp; Technology</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/manufacturing-industry.php">Manufacturing Industry</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/non-profit-organizations.php">Non-Profit Organizations</a></li>
                </ul>
            </li>
            <li class="mob-nav-item">
                <a class="mob-nav-parent helvcondlight" href="#">Partners</a>
                <ul class="mob-subnav">
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/partners-home.php">Why Partner with Zetta?</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://pages.zetta.net/online-backup-MSP-program.html">Become a Zetta Partner</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/connect-wise.php">ConnectWise Integration</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/partner-resource-center.php">Partner Resources</a></li>
                </ul>
            </li>
            <li class="mob-nav-item">
                <a class="mob-nav-parent helvcondlight" href="#">About us</a>
                <ul class="mob-subnav">
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/news.php">Zetta in the news</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/awards.php">Awards</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/pressReleases.php">Zetta press releases</a></li>                        
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/management.php">Management</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/boardOfDirectors.php">Board of Directors</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/investors.php">Investors</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://www.zetta.net/careers.php">Careers</a></li>
                    <li class="m-item-sec helvcondlight"><a href="http://pages.zetta.net/contact-us.html">Contact Us</a></li>
                </ul>
            </li>
        </ul>
        <!-- END MOBILE MENU -->

        <ul style="width: 733px;" class="mainnavul">
            <li class="first <?php if ($mainNavId == 'products') {echo 'active';} ?>"><a href="http://www.zetta.net/Zetta-Data-Protect.php">Products</a>
                <ul class="subnav first" style="position:absolute;">
                    <li><a href="http://www.zetta.net/Zetta-Data-Protect.php">Zetta DataProtect</a>
                        <ul class="subnav second" style="position:absolute;">
                            <li><a href="http://www.zetta.net/Zetta-Data-Protect.php">Overview</a></li>
                            <li><a href="http://www.zetta.net/architecture.php">Architecture</a></li>
                            <li><a href="http://www.zetta.net/screenshots.php">Screenshots</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            
            <li class="<?php if ($mainNavId == 'it-initiatives') {echo 'active';} ?>"><a href="http://www.zetta.net/Multi-Platform-Backups.php">IT Initiatives</a>
                <ul class="subnav first">
                    <li><a href="http://www.zetta.net/disaster-recovery-as-a-service-cloud-solution.php">Disaster Recovery as a Service</a></li>
                    <li><a href="http://www.zetta.net/server-backup/index.php">Server Backup</a>
                        <ul class="subnav second" style="position:absolute;">
                                <li><a href="http://www.zetta.net/server-backup/index.php">Windows Server Backup</a></li>
                                <li><a href="http://www.zetta.net/exchange-server-cloud-backup/">Exchange Server Backup</a></li>
                                <li><a href="http://www.zetta.net/sql-server-backup.php">SQL Server Backup</a></li>
                                <li><a href="http://www.zetta.net/Multi-Platform-Backups.php">Multi-Platform Server Backups</a></li>
                        </ul>
                    </li>
                    <li><a href="http://www.zetta.net/server-image-cloud-backup.php">Server Image Backup</a></li>
                    <li><a href="http://www.zetta.net/remote-offsite-server-backup.php">Offsite Data Backup and DR</a></li>
                    <li><a href="http://www.zetta.net/offsite-backup-calculator.php">Tape Replacement - ROI Calculator</a></li>
                    <li><a href="http://www.zetta.net/bare-metal-restore-servers/index.php">Bare Metal Restore</a></li>
                    <li><a href="http://www.zetta.net/netapp/">NetApp Offsite Backup &amp; DR</a></li>
                    <li><a href="http://www.zetta.net/it-disaster-recovery-plan.php">IT Disaster Recovery Planning</a></li>
                    <li><a href="http://www.zetta.net/backup-appliance-comparison.php">Appliance-free Backup &amp; DR</a></li>
                </ul>
            </li>
            
            <li class="<?php if ($mainNavId == 'resources') {echo 'active';} ?>"><a href="http://www.zetta.net/productAndService.php">Resources</a>
                <ul class="subnav first">
                    <!-- <li><a href="/productAndService.php">Product Info</a></li> -->
                    <li><a href="http://www.zetta.net/resources-datasheets-whitepapers.php">Datasheets &amp; Whitepapers</a></li>
                    <li><a href="http://www.zetta.net/resources-videos.php">Videos</a></li>
                    <li><a href="http://www.zetta.net/resources-analyst-reports.php">Analyst Reports</a></li>
                    <li><a href="http://www.zetta.net/resources-tools.php">Tools</a></li>                        
                    <li><a href="http://www.zetta.net/resources-webinars.php">Webinars</a></li>
                    <li><a href="http://www.zetta.net/zetta-competitor-reviews.php">Zetta vs. Competitors</a>
                        <ul class="subnav second" style="position:absolute;">
                            <li><a href="http://www.zetta.net/acronis-backup-alternative.php">Zetta vs. Acronis</a></li>
                            <!--<li><a href="/amazon-s3-cloud-backup-alternative.php">Zetta vs. Amazon S3</a></li>-->
                            <li><a href="http://www.zetta.net/appassure-backup-solution-alternative.php">Zetta vs. AppAssure</a></li>
                            <li><a href="http://www.zetta.net/barracuda-cloud-backup-alternative.php">Zetta vs. Barracuda</a></li>
                            <li><a href="http://www.zetta.net/carbonite-backup-recovery-alternative.php">Zetta vs. Carbonite</a></li>
                            <li><a href="http://www.zetta.net/evault-backup-solution-alternative.php">Zetta vs. eVault</a></li>
                            <li><a href="http://www.zetta.net/microsoft-azure-backup-alternative.php">Zetta vs. Microsoft Azure</a></li>
                            <li><a href="http://www.zetta.net/mozypro-online-backup-alternative.php">Zetta vs. Mozy Pro</a></li>
                            <li><a href="http://www.zetta.net/symantec-backup-exec-alternative.php">Zetta vs. Symantec Backup Exec</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="/blog/">Blog</a></li>
                    <li><a href="/history-of-computer-storage">History of Storage</a></li>
                    <li><a href="/online-backup-definitions-glossary.php">Online Backup Glossary</a></li> -->
                </ul>
            </li>
            
            <li class="<?php if ($mainNavId == 'customers') {echo 'active';} ?>"><a href="http://www.zetta.net/customers.php">Customers</a>
                <ul class="subnav first">
                    <li><a href="http://www.zetta.net/case-studies.php">Case Studies</a></li>
                    <li><a href="#">Industries</a>
                        <ul class="subnav second" style="position:absolute;">
                            <li><a href="http://www.zetta.net/business-services.php">Business Services</a></li>
                            <li><a href="http://www.zetta.net/customers-education.php">Education</a></li>
                            <li><a href="http://www.zetta.net/financial-services.php">Financial Services</a></li>
                            <li><a href="http://www.zetta.net/legal-services.php">Legal Services</a></li>
                            <li><a href="http://www.zetta.net/media-and-entertainment.php">Media &amp; Entertainment</a></li>
                            <li><a href="http://www.zetta.net/software-and-technology.php">Software &amp; Technology</a></li>
                            <li><a href="http://www.zetta.net/manufacturing-industry.php">Manufacturing Industry</a></li>
                            <li><a href="http://www.zetta.net/non-profit-organizations.php">Non-Profit Organizations</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            
            <li class="<?php if ($mainNavId == 'newsEvents') {echo 'active';} ?>"><a href="http://www.zetta.net/partners-home.php">Partners</a>
                <ul class="subnav first">
                    <li><a href="http://www.zetta.net/partners-home.php">Why Partner with Zetta?</a></li>
                    <li><a href="http://pages.zetta.net/online-backup-MSP-program.html">Become a Zetta Partner</a></li>
                    <li><a href="http://www.zetta.net/connect-wise.php">ConnectWise Integration</a></li>
                    <li><a href="http://www.zetta.net/partner-resource-center.php">Partner Resource Center</a></li>
                </ul>
            </li>

            <li class="last <?php if ($mainNavId == 'aboutUs') {echo 'active';} ?>" style=""><a href="http://www.zetta.net/aboutUs.php">About Us</a>
                <ul class="subnav first">
                    <li><a href="http://www.zetta.net/news.php">Zetta in the news</a></li>
                    <li><a href="http://www.zetta.net/awards.php">Awards</a></li>
                    <li><a href="http://www.zetta.net/pressReleases.php">Zetta press releases</a></li>                        
                    <li><a href="http://www.zetta.net/management.php">Management</a></li>
                    <li><a href="http://www.zetta.net/boardOfDirectors.php">Board of Directors</a></li>
                    <li><a href="http://www.zetta.net/investors.php">Investors</a></li>
                    <li><a href="http://www.zetta.net/careers.php">Careers</a></li>
                    <li><a href="http://pages.zetta.net/contact-us.html">Contact Us</a></li>
                </ul>
            </li>
        </ul>
        <form id="search" name="search" action="<?php bloginfo('url'); ?>" method="get">
            <input type="text" name="s" id="q" value="SEARCH" class="bold nospace" onfocus="if (jQuery(this).val() == 'SEARCH') { jQuery(this).val(''); }"  onblur="if (jQuery(this).val() == '') { jQuery(this).val('SEARCH'); }" />
            <input type="submit" name="submit" value="go" />
            <input type="hidden" name="start" value="1" />
            <input type="hidden" name="page" value="1" />
        </form>
        
        <div class="clear"></div>
    </div>
<!-- END MAIN NAV FRAME -->

</div>
<!-- END HEADER FRAME -->

			<!-- BEGIN BODY FRAME -->
			<div id="bodyFrame">
				<div id="container2of2">
					<div id="container1of2">
						<div id="col1of2" class="blog">
                        	<?php if (!is_author() && !is_search()) { ?>
                            <div class="header-title">
								<h3 class="helv">The Zetta.net Blog</h3>
                                <h2 class="helv">News, Information & Opinion on Cloud Backup + Disaster Recovery</h2>
                            </div>
                            <?php } ?>							