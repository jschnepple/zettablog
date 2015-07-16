<?php
include('../../../wp-load.php');
global $wpdb;
$table_name = $wpdb->prefix . "zettasubscribe";
$name = $_GET['subname'];
$email = $_GET['subemail'];
$admin = get_option('zetta-admin-email');

$to      = $admin;
$subject = 'New Subscriber to Zetta Newsletter';
$message = 'New Subscriber:' . "\r\n";
$message .= 'Name: ' . $name . "\r\n";
$message .= 'Email: ' . $email . "\r\n";
$headers = 'From: noreply@zetta.net' . "\r\n" .
   		   'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
$rows_affected = $wpdb->insert( $table_name, array( 'name' => $name, 'email' => $email, 'time' => current_time('mysql') ) );
?>