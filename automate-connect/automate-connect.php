<?php
/*
Plugin Name:   Automate Connect
Plugin URI:    http://webdevops.ltd/
Description:   Automate Connect plugin is used to connect a variety of services, e.g. connect woocommerce with GoHighLevel.
Version:       1.1.0
Author:        Automate Connect
Author URI:    http://webdevops.ltd/
Text Domain:   automate-connect
Domain Path:   /languages
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

define("ACONNECT_PLUGIN_PATH", plugin_dir_path(__FILE__));
define("ACONNECT_PLUGIN_URL", plugin_dir_url(__FILE__));


/** Plugin init file */
require ACONNECT_PLUGIN_PATH . 'includes/class-ac-init.php';
 /** One time code, use it to re-authorize and get token. */
 if(isset($_GET['code']))
 {
     $code = wp_unslash($_GET['code']);
     ACCommonFunctions::acgenerateAccessToken_func($code);
     echo "Token generated successfully!";
 }
/** create a custom table on plugin activation */
register_activation_hook(__FILE__, 'ac_plugin_activation_tbl');
function ac_plugin_activation_tbl() {
    global $wpdb;
    $table_name_ghl = $wpdb->prefix . 'ac_ghl_recipes';
    $table_user_log = $wpdb->prefix . 'ac_user_add_update_log';
    $table_order_sub_log = $wpdb->prefix . 'ac_order_sub_log';
    $table_posts_log = $wpdb->prefix . 'ac_posts_log';
    $table_attend_log = $wpdb->prefix . 'ac_atte_log';
    $table_ghl_integ = $wpdb->prefix . 'ac_ghl_inte_form';

    $charset_collate = $wpdb->get_charset_collate();

    /** Table 1: ac_ghl_recipes */
    $sql_ghl_set = "CREATE TABLE IF NOT EXISTS $table_name_ghl (
        id INT NOT NULL AUTO_INCREMENT,
        recipes_name VARCHAR(255) NOT NULL,
        recipes_trigger VARCHAR(255) NOT NULL,
        webhook VARCHAR(500) NOT NULL,
        add_date DATETIME NOT NULL,
        edit_date DATETIME NOT NULL,
        add_by INT NOT NULL,
        edit_by INT NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    /** Table 2: ac_user_sub_log */
    $sql_user_log = "CREATE TABLE IF NOT EXISTS $table_user_log (
        id INT NOT NULL AUTO_INCREMENT,
        user_id INT NOT NULL,
        email VARCHAR(255) NOT NULL,
        first_name VARCHAR(255) NOT NULL,
        last_name VARCHAR(255) NOT NULL,
        add_date DATETIME NOT NULL DEFAULT current_timestamp(),
        edit_date DATETIME NOT NULL DEFAULT current_timestamp(),
        trigger_status VARCHAR(255) NOT NULL,
        trigger_type VARCHAR(255) NOT NULL,
        log_data TEXT NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    /** Table 3: ac_order_sub_log */
    $sql_order_sub_log = "CREATE TABLE IF NOT EXISTS $table_order_sub_log (
        id INT NOT NULL AUTO_INCREMENT,
        order_id INT NOT NULL,
        subscription_id INT NOT NULL,
        user_id INT NOT NULL,
        email VARCHAR(255) NOT NULL,
        order_name VARCHAR(255) NOT NULL,
        first_name VARCHAR(255) NOT NULL,
        last_name VARCHAR(255) NOT NULL,
        order_status VARCHAR(255) NOT NULL,
        add_date DATETIME NOT NULL DEFAULT current_timestamp(),
        edit_date DATETIME NOT NULL DEFAULT current_timestamp(),
        trigger_status VARCHAR(255) NOT NULL,
        trigger_type VARCHAR(255) NOT NULL,
        log_data TEXT NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    /** Table 4: ac_posts_log */
    $sql_post_log = "CREATE TABLE IF NOT EXISTS $table_posts_log (
        id INT NOT NULL AUTO_INCREMENT,
        post_id INT NOT NULL,
        email VARCHAR(255) NOT NULL,
        post_title VARCHAR(255) NOT NULL,
        add_date DATETIME NOT NULL DEFAULT current_timestamp(),
        edit_date DATETIME NOT NULL DEFAULT current_timestamp(),
        trigger_status VARCHAR(255) NOT NULL,
        trigger_type VARCHAR(255) NOT NULL,
        post_type VARCHAR(255) NOT NULL,
        log_data TEXT NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    /** Table 5: ac_posts_log */
    $sql_atte_log = "CREATE TABLE IF NOT EXISTS $table_attend_log (
        id INT NOT NULL AUTO_INCREMENT,
        event_id INT NOT NULL,
        order_id INT NOT NULL,
        attendee_name VARCHAR(255) NOT NULL,
        attendee_email VARCHAR(255) NOT NULL,
        attendee_mobile VARCHAR(255) NOT NULL,
        event_name VARCHAR(255) NOT NULL,
        add_date DATETIME NOT NULL DEFAULT current_timestamp(),
        edit_date DATETIME NOT NULL DEFAULT current_timestamp(),
        trigger_status VARCHAR(255) NOT NULL,
        trigger_type VARCHAR(255) NOT NULL,
        log_data TEXT NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    /** Table 6: ac_ghl_inte_form */
    $sql_ghl_integ_form = "CREATE TABLE IF NOT EXISTS $table_ghl_integ (
        id INT NOT NULL AUTO_INCREMENT,
        ac_ghl_form_title VARCHAR(255) NOT NULL,
        ac_ghl_form_scr VARCHAR(255) NOT NULL,
        ac_ghl_form_desc TEXT NOT NULL,
        add_date DATETIME NOT NULL DEFAULT current_timestamp(),
        edit_date DATETIME NOT NULL DEFAULT current_timestamp(),
        PRIMARY KEY  (id)
    ) $charset_collate;";

    $wpdb->query($sql_ghl_set);
    $wpdb->query($sql_user_log);
    $wpdb->query($sql_order_sub_log);
    $wpdb->query($sql_post_log);
    $wpdb->query($sql_atte_log);
    $wpdb->query($sql_ghl_integ_form);
}
