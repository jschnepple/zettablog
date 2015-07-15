<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
$sp = "/";
?>

<!--
<hr />
<div id="footer">
-->
<!--
<p>
		<?php bloginfo('name'); ?> is proudly powered by
		<a href="http://wordpress.org/">WordPress</a>
		<br /><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
		and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
-->
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
<!--
</p>
</div>
-->

<!-- START FOOTER -->
<div id="footerholder">
		<div id="footercontent">
        	<div class="column products" style="margin-left:100px;">
            	<h3 class="helv">Products</h3>
                <a href="/Zetta-Data-Protect.php">Product Info</a>
                <a href="/screenshots.php">Screenshots</a>
                <a href="http://pages.zetta.net/requestquoteservices.html">Request Quote</a>
                <a href="http://pages.zetta.net/free-trial.html">Free Trial</a>
            </div>
            
            <div class="column initiatives">
            	<h3 class="helv">IT Initiatives</h3>
                <a href="/server-backup/index.php">Window Server Backup</a>
                <a href="/affordable-disaster-recovery.php">Disaster Recovery Solutions</a>
                <a href="/offsite-backup-calculator.php">Tape Replacement</a>
                <a href="/remote-offsite-server-backup.php">Remote Office Server Backup</a>
            </div>
            
            <div class="column partners">
            	<h3 class="helv">Partners</h3>
                <a href="http://pages.zetta.net/partner-program.html">Partners Program</a>
                <a href="/partners-home.php">Why Zetta</a>
                <a href="http://pages.zetta.net/online-backup-MSP-program.html">Become a Partner</a>
            </div>
            
            <div class="column company last">
            	<h3 class="helv">Our Company</h3>
                <a href="/aboutUs.php">About Us</a>
                <a href="/blog/">Blog</a>
                <a href="/careers.php">Careers</a>
		<a href="/sitemap.php">Site Map</a>
                <a href="http://pages.zetta.net/contact-us.html">Contact Us</a>
            </div>
            
            <div class="clear"></div>
			<center>
				<br><br>
				<a href="/legal.php">Privacy & Terms</a> | 
                
				<a href="/sitemap.php">Site Map</a>
<div class="socialFooter">
                	<a href="https://www.facebook.com/zettastorage" class="icFb"></a>
                    <a href="http://www.linkedin.com/company/zetta-inc." class="icLi"></a>
                    <a href="https://www.youtube.com/user/zettabackup" class="icYt"></a>
                    <a href="https://plus.google.com/+ZettaNetBackup/posts" class="icGp"></a>
                    <a href="https://twitter.com/zettanet" class="icTw"></a>
                    <a href="http://community.spiceworks.com/pages/zetta" class="icSp"></a>
                    <a href="http://www.slideshare.net/Zettanet" class="icSs last"></a>
                </div>
                <a href="javascript:void(0)">&copy; <?php echo date('Y'); ?> Zetta, Inc. All rights reserved..</a>
			</center> 
        </div>
	</div>
<!-- END FOOTER -->

<?php wp_footer(); ?>
<script type="text/javascript">
(function() {
  var didInit = false;
  function initMunchkin() {
    if(didInit === false) {
      didInit = true;
      Munchkin.init('247-HTV-339');
    }
  }
  var s = document.createElement('script');
  s.type = 'text/javascript';
  s.async = true;
  s.src = '//munchkin.marketo.net/munchkin.js';
  s.onreadystatechange = function() {
    if (this.readyState == 'complete' || this.readyState == 'loaded') {
      initMunchkin();
    }
  };
  s.onload = initMunchkin;
  document.getElementsByTagName('head')[0].appendChild(s);
})();
</script>  
</body>
</html>
