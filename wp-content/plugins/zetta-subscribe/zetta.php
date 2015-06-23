<?php
/*
Plugin Name: Zetta Subscribe
Plugin URI: http://www.zetta.net/
Description: Internal Plugin
Version: 1.0
Author: Zetta
Author URI: http://www.zetta.net/
License: Private
*/

//Set Up Class
if (!class_exists("zetta")) {		
   	class zetta {
		static function install() {
            // do not generate any output here
			// this function is ran at first plugin activation
			global $wpdb;
			$table_name = $wpdb->prefix . "zettasubscribe";
			$sql = "CREATE TABLE $table_name (
 				id mediumint(9) NOT NULL AUTO_INCREMENT,
				name VARCHAR(100) NOT NULL,
				email VARCHAR(100) NOT NULL,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				UNIQUE KEY id (id)
			);";

			require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
			dbDelta($sql);
     	}
		
       	function zetta_construct() { //constructor
			$url = plugins_url();
			$url = $url."/zetta-subscribe/";
			wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js' );    
			wp_enqueue_script('jquery'); 
		}
		
		function adminmenu() {
			$url = plugins_url();
			$url = $url."/zetta-subscribe/";
			/* register styles */
			wp_register_style( 'domainstyle', $url.'styles/style.css' );
			wp_enqueue_style( 'domainstyle' );
			/* register scripts */			
			wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js' );    
			wp_enqueue_script('jquery'); 
			wp_enqueue_script( 'common' );
  
			include('main.php');
		}
		
		function ConfigureMenu() {
			add_menu_page('Zetta Subscribe', 'Zetta Subscribe', 'administrator', 'zetta', array('zetta','adminmenu'), plugins_url('zetta-subscribe/images/icon.png'), 6);  
		}				
   	}
}

//Create new instance of class
if (class_exists("zetta")) {
	$zetta = new zetta();
}

//Actions and Filters
if(isset($zetta)){
	register_activation_hook( __FILE__, array($zetta, 'install') );
	add_action('admin_menu', array($zetta,'ConfigureMenu'));
}

add_action("widgets_init", array('Zettaw', 'register'));
class Zettaw {
  function widget($args){
	$url = plugins_url();
	$url = $url."/zetta-subscribe/";
    echo $args['before_widget'];
    //echo $args['before_title'] . 'Your widget title' . $args['after_title']; ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
    <div id="newOptin" class="newWidget" style="width:174px;">
		
        <h2 class="newSideTitle" style="display:inline-block;">Subscribe</h2>
        <a href="/blog/feed" target="_blank" class="feedSubscribe"></a>
        <p>Get the latest posts delivered to your inbox.</p>
		<input type="hidden" name="subname" id="subname" value="No Name">
		<input type="email" class="newInput" name="subemail" id="subemail" placeholder="Email address">
		<input type="submit" class="newSubmit helv" name="subsubmit" id="subsubmit" value="Subscribe">     
	</div>
    <div id="resultszetta" style="display:none; font-weight: bold; font-size: 14px; text-align:center;">Thank you for subscribing to Zetta Newsletter</div>   
 
    <script type="text/javascript">
	/*$("#subname").focus(function() {
		if ($(this).val() == 'Full Name') {
			$(this).val('');
		}
	})
	$("#subname").blur(function() {
		if ($(this).val() == '' || $(this).val() == ' ') {
			$(this).val('Full Name');
		}
	})
	$("#subemail").focus(function() {
		if ($(this).val() == 'Email Address') {
			$(this).val('');
		}
	})
	$("#subemail").blur(function() {
		if ($(this).val() == '' || $(this).val() == ' ') {
			$(this).val('Email Address');
		}
	})*/
	$("#subsubmit").click(function() {
		var subname = $("#subname").val();
		var subemail = $("#subemail").val();
		var test = 0;
		if (subname == '' || subname == "Full Name") {
			$("#subname").focus();
			alert("Your Name is required");
			test = 1;
		} else { test = 0; }
		if (subemail == '' || subemail == "Email Address") {
			$("#subemail").focus();
			alert("Email address is required");
			test = 1;
		} else { test = 0; }
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(subemail)){
			test = 0;
		} else {
			$("#subemail").focus();
			alert("A valid email address is required");
			test = 1;
		}
		if (test == 0) {
			console.log("email trying to send");
			var url = "http://www-stage.zetta.net/blog/wp-content/plugins/zetta-subscribe/";
			console.log("url = " + url);
			$.get(url + 'process.php', { subname: subname, subemail: subemail }, function(data) {
  				//$('#formholderzetta').fadeOut('fast');
				$('#resultszetta').fadeIn('fast');
		
			});
		}
	})
	</script>
<?php echo $args['after_widget'];
  }
  function register(){
    register_sidebar_widget('Zetta Subscribe Box', array('Zettaw', 'widget'));
  }
}

?>