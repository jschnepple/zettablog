<?php 
global $wpdb;
$table_name = $wpdb->prefix . "zettasubscribe";
?>
<!-- FORM SUBMISSION -->
<?php
if ($_POST['saveoptions']) {
    update_option('zetta-admin-email', $_POST['adminemail']);       
    $updated_msg = '<div id="message" class="updated below-h2"><p>Settings saved</p></div>';
} else {
    $updated_msg = '';
}

?>
<!-- END FORM SUBMISSION -->  

<?php include("script/scripts.php"); ?>

<div class="wrap">
    <div class="mainbox">   
        <div class="left">
            <h2>Zetta Subscribe</h2>
            <div class="content"> 
            
                <?php echo $updated_msg; ?>     
                <form action="" method="post">
                    <label>Fill out the email where new subscription notifications should go to</label>
                    <input type="text" style="width: 200px;" value="<?php echo get_option('zetta-admin-email'); ?>" name="adminemail" />
                    <input type="submit" name="saveoptions" value="Save Options" />
                </form>
                <div class="clear">&nbsp;</div>
                <hr />
                <div class="clear">&nbsp;</div>
                <h3>Current Subscribers</h3>
                <table width="100%" cellspacing="5" cellpadding="10">
                    <tr>
                        <th style="text-align:left; background-color:#39F; color:#fff;">ID</th>
                        <!--<th style="text-align:left; background-color:#39F; color:#fff;">Name</th>-->
                        <th style="text-align:left; background-color:#39F; color:#fff;">Email</th>
                        <th style="text-align:left; background-color:#39F; color:#fff;">Joined Date</th>
                    </tr>
                    <?php
                    $i = 0;
                    $row = $wpdb->get_results("SELECT * FROM $table_name ORDER BY time DESC", ARRAY_A);
                    if ($row) {
                    foreach($row as $data) { 
                    if($data['name'] != "") {
                        $i++; ?>
                        <tr style=" <?php if ($i % 2 == 0) echo 'background-color:#fafafa;'; else echo 'background-color:#f8f8f8;'; ?>">
                            <td><? echo $i; ?></td>
                            <!--<td><? echo $data['name']; ?></td>-->
                            <td><? echo $data['email']; ?></td>
                            <td><? echo date( 'F d, Y - H:i:s', strtotime($data['time'])); ?></td>
                        </tr>
                    <? } }
                    } else { echo "<h3>No subscribers yet.</h3>"; }
                    ?>
                </table>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>