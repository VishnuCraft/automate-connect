<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

?>
<style>
   
	.ghl_container input[type="text"], .ghl_container select#triger {
		margin-block: 8px 15px;
		border-radius: 4px;
		max-width: 600px;
		width: 100%;
        height: 40px;
        border-color: #cfd4d9;
	}
	form#ac-ghl-triger-submission {
		margin-bottom: 20px;
	}
	.wp_tab_action_col{
		display: flex;
	}
	
	.recipes_table_wrapper {
		overflow-x: auto;
	}
	.ac_btn_botom_wrap {
		display: flex;
		flex-wrap: wrap;
		width: 100%;
		max-width: 600px;
	}

	
	
    input:focus {
        outline: none;
        border-color: #c48782;
    }
    .error {
        color: red;
    }
   

    
    
	#ac-ghl-triger-submission label {
		font-weight: 500;
	}
    .ghl-container-wrappper {
        padding: 20px;
        border: 1px solid #cfd4d9;
        margin-top: 30px;
        background-color: #f8f9fa;
        margin-right: 20px;
    }
    .ghl-container-wrappper h2 {
        padding-top: 10px;
    }
</style>
<style type="text/css">
    .automate_option_tooltip_content_main {
   width: 25%;
  
    
    font-size: 15px;
    font-weight: 600;
    }
    .mds_main_wrapper  { 
    margin-right: 16px;
        background-color: #fff;
        max-width: 100%;
        border: none;
        box-shadow: 0 5px 30px rgb(0 0 0 / 10%);
        border-radius: 15px;
        color: #32373c;
    padding: 25px 30px 25px 30px;
    }
    .form-header {
        display: flex;
        align-items: center;
        gap: 15px;
        border-bottom: 1px solid #ccc;
    }
    .checkbox-outer{
        padding: 7px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .mds_main_wrapper  .row {
        display: flex;
        flex-wrap: wrap;
    margin-top: 15px;
    align-items: center;
    gap: 15px;
    
    }
    .mds_main_wrapper input[type=text], .mds_main_wrapper input[type=number], .mds_main_wrapper input[type=password], .mds_main_wrapper input[type=email] {
        width: 100%;
        border: 1px solid #ccc;
        padding:5px 10px 5px 10px;
    }
    .mds_main_wrapper .row  .input-div {
        width: 25%;
        
    }
    .mds_main_wrapper  .btn {
        background-color: #559DA8;
        border: 1px solid #559DA8;
        padding: 8px 20px 8px 20px;
        border-radius: 3px;
        text-align: center; 
        font-size: 16px;
        color: #fff;
        cursor: pointer;
        margin-top: 40px;

    }
    .rwd-table {
    
    
    
    width: 100%;
    border-collapse: collapse;
    }

    .rwd-table  thead th {
    border-top: none;
    background: #125166;
    color: #fff !important;
    }
    .rwd-table tr {
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    background-color: #F0F0F0;
    }



    .rwd-table th {
    display: none;
    }

    .rwd-table td {
    display: block;
    }

    .rwd-table td:first-child {
    margin-top: .5em;
    }

    .rwd-table td:last-child {
    margin-bottom: .5em;
    }


    .rwd-table th,
    .rwd-table td {
    text-align: left;
    display: table-cell;
        padding: .25em .5em;
    }

    .rwd-table {
    color: #333;
    border-radius: .4em;
    overflow: hidden;
    }

    .rwd-table tr {
    border-color: #bfbfbf;
    }

    .rwd-table th,
    .rwd-table td {
    padding: 1em ;
    }
    @media screen and (max-width: 1400px) {
    .table-wrap {
        overflow-x: scroll;

    }
    }

    .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    }

    .pagination a {
    color: #333;
    text-decoration: none;
    padding: 8px 16px;
    margin: 0 4px;
    border: 1px solid #ddd;
    border-radius: 4px;
    }

    .pagination a.active {
    background-color: #DF5703;
    color: #fff;
    border-color: #DF5703;
    }

    .pagination a:hover {
    background-color: #DF5703;
    color: #fff;
    }

    .pagination a.prev,
    .pagination a.next {
    background-color: #f5f5f5;
    border-color: #ddd;
    }

    .pagination a.prev:hover,
    .pagination a.next:hover {
    background-color: #DF5703;
    color: #fff;
    }
    @media (max-width: 768px) {
    .mds_main_wrapper  .row {
        flex-direction: column;
        align-items: start;
    }
    .mds_main_wrapper .row  .input-div {
    width: 100%;  
    }
    .automate_option_tooltip_content_main {
        
        width: 100%;
    }
    }
    @media (min-width: 769px) and (max-width: 1024px) {
    .mds_main_wrapper .row  .input-div {
    width: 60%;
    }
    }
    .btn-group-div {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .trg {
        border: 1px solid #125166;
        border-radius: 4px; 
        padding: 3px;
        background-color: #125166;
        cursor: pointer; height: 27px;
    }
    .editbtn {
    border: 1px solid #125166;
        border-radius: 4px; 
        padding: 3px; 
        background-color: #125166;
        cursor: pointer; height: 18px;
    }
    .delbtn {
    border: 1px solid #125166;
        border-radius: 4px; 
        padding: 3px; 
        background-color: #125166;
        cursor: pointer;
        height: 18px;


    }
</style>
<?php
$recipes_name = $triger = $webhook = '';
$errors = array();
$success_message = '';

function sanitize_and_validate($input) {
    return sanitize_text_field(trim($input));
}

function map_triger_to_readable_text($triger) {
    $readable_text = ucwords(str_replace('_', ' ', $triger));
    return $readable_text;
}


/** ac ghl triger record edit */
$edit_id = 0;
if (isset($_GET['editid'])) {
    // $edit_id = sanitize_and_validate(wp_unslash($_GET['editid']));
    $edit_id = sanitize_text_field(wp_unslash($_GET['editid']));

    global $wpdb;
    $table_name = $wpdb->prefix . 'ac_ghl_recipes';
    $edit_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $edit_id), ARRAY_A);

    $recipes_name = $edit_data['recipes_name'];
    $triger = $edit_data['recipes_trigger'];
    $webhook = $edit_data['webhook'];

    echo '<input type="hidden" name="edit_id" value="' . esc_attr($edit_id) . '">';
}

if(isset($_SERVER['REQUEST_METHOD'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ac_save_triger'])) {
        if (empty($_POST['recipes_name'])) {
            $errors['recipes_name'] = '<span class="errors">Please enter the recipes name.</span>';
        } else {
            $recipes_name = sanitize_and_validate(wp_unslash($_POST['recipes_name']));
        }

        if (empty($_POST['triger'])) {
            $errors['triger'] = '<span class="errors">Please select a triger.</span>';
        } else {
            $triger = sanitize_and_validate(wp_unslash($_POST['triger']));
        }

        if (empty($_POST['webhook'])) {
            $errors['webhook'] = '<span class="errors">Please enter the webhook.</span>';
        } else {
            $webhook = sanitize_and_validate(wp_unslash($_POST['webhook']));
        }

        if (empty($errors)) {
            $user_id = get_current_user_id();
            $current_datetime = current_time('mysql');

            /** Assign values properly here */
            $recipes_name = sanitize_and_validate(wp_unslash($_POST['recipes_name']));
            $triger = sanitize_and_validate(wp_unslash($_POST['triger']));
            $webhook = sanitize_and_validate(wp_unslash($_POST['webhook']));

            if ($edit_id > 0) {
                /** Update the existing record */
                global $wpdb;
                $table_name = $wpdb->prefix . 'ac_ghl_recipes';
                $wpdb->update(
                    $table_name,
                    array(
                        'recipes_name' => $recipes_name,
                        'recipes_trigger' => $triger,
                        'webhook' => $webhook,
                        'edit_date' => $current_datetime,
                        'edit_by' => $user_id,
                    ),
                    array('id' => $edit_id),
                    array('%s', '%s', '%s', '%s', '%d'),
                    array('%d')
                );

                $success_message = '<h3 style="color:green;">Data updated successfully!</h3>';
            } else {
                /** Insert a new record */
                global $wpdb;
                $table_name = $wpdb->prefix . 'ac_ghl_recipes';
                $wpdb->insert(
                    $table_name,
                    array(
                        'recipes_name' => $recipes_name,
                        'recipes_trigger' => $triger,
                        'webhook' => $webhook,
                        'add_date' => $current_datetime,
                        'edit_date' => $current_datetime,
                        'add_by' => $user_id,
                        'edit_by' => $user_id,
                    ),
                    array('%s', '%s', '%s', '%s', '%s', '%d', '%d')
                );

                $success_message = '<h3 style="color:green;">Data saved successfully!</h3>';
            }

            $recipes_name = $triger = $webhook = '';
        }
    }
}
/** Delete functionality */
if (isset($_GET['deleteid'])) {
    $delete_id = sanitize_and_validate(wp_unslash($_GET['deleteid']));

    global $wpdb;
    $table_name = $wpdb->prefix . 'ac_ghl_recipes';
    $wpdb->delete($table_name, array('id' => $delete_id), array('%d'));

    $success_message = '<h3 style="color:red;">Record deleted successfully!</h3>';
}

/** Get Custom table data **/
global $wpdb;
$table_name = $wpdb->prefix . 'ac_ghl_recipes';
$results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);
/** get all custom post ( CPT ) */
$post_types = get_post_types();
?>

<div class="mds_main_wrapper">
    <div class="form-header">
        <svg enable-background="new 0 0 512 512" height="30" viewBox="0 0 512 512" width="30" xmlns="http://www.w3.org/2000/svg" id="fi_5529864"><g id="_x32_7_Checklist"><g><g><g><path d="m385.138 55.617h-100.211v-26.694c0-15.943-12.968-28.911-28.911-28.911s-28.911 12.968-28.911 28.911v26.695h-100.243c-17.241 0-31.269 14.03-31.269 31.272v393.828c0 17.241 14.028 31.272 31.269 31.272h258.277c17.241 0 31.269-14.03 31.269-31.272v-393.829c0-17.241-14.028-31.272-31.27-31.272zm-142.199-26.694c0-7.211 5.866-13.077 13.077-13.077s13.077 5.866 13.077 13.077v26.695h-26.153v-26.695zm157.634 451.794c0 8.51-6.925 15.437-15.435 15.437h-258.276c-8.51 0-15.435-6.928-15.435-15.437v-393.828c0-8.51 6.925-15.437 15.435-15.437.528.014 205.496.003 258.277 0 8.51 0 15.435 6.928 15.435 15.437v393.828z" fill="#3f3f3f"></path></g></g><g><g><path d="m335.864 55.341v23.203c0 12.897-10.455 23.352-23.352 23.352h-113.023c-12.897 0-23.352-10.455-23.352-23.352v-23.203c0-6.449 5.228-11.676 11.676-11.676h136.375c6.448 0 11.676 5.228 11.676 11.676z" fill="#7cc558"></path></g></g><g><g><g><g><g><circle cx="181.38" cy="190.603" fill="#7cc558" r="40.191"></circle></g></g><g><g><path d="m175.184 208.971c-2.026 0-4.051-.773-5.598-2.319l-8.513-8.51c-3.093-3.087-3.093-8.103-.003-11.195 3.093-3.093 8.105-3.093 11.198 0l2.915 2.912 15.334-15.334c3.093-3.093 8.103-3.093 11.195 0 3.093 3.093 3.093 8.103 0 11.195l-20.932 20.932c-1.545 1.546-3.57 2.319-5.596 2.319z" fill="#fff"></path></g></g></g><g><g><g><path d="m370.802 175.823h-118.864c-4.374 0-7.917-3.546-7.917-7.917s3.544-7.917 7.917-7.917h118.863c4.374 0 7.917 3.546 7.917 7.917s-3.543 7.917-7.916 7.917z" fill="#3f3f3f"></path></g></g><g><g><path d="m311.369 214.522h-59.43c-4.374 0-7.917-3.546-7.917-7.917s3.544-7.917 7.917-7.917h59.43c4.374 0 7.917 3.546 7.917 7.917s-3.544 7.917-7.917 7.917z" fill="#3f3f3f"></path></g></g></g></g><g><g><g><g><circle cx="181.38" cy="304.437" fill="#7cc558" r="40.191"></circle></g></g><g><g><path d="m175.184 322.806c-2.026 0-4.051-.773-5.598-2.319l-8.513-8.51c-3.093-3.087-3.093-8.103-.003-11.195 3.093-3.093 8.105-3.093 11.198 0l2.915 2.912 15.334-15.334c3.093-3.093 8.103-3.093 11.195 0 3.093 3.093 3.093 8.103 0 11.195l-20.932 20.932c-1.545 1.546-3.57 2.319-5.596 2.319z" fill="#fff"></path></g></g></g><g><g><g><path d="m370.802 289.658h-118.864c-4.374 0-7.917-3.546-7.917-7.917s3.544-7.917 7.917-7.917h118.863c4.374 0 7.917 3.546 7.917 7.917.001 4.371-3.543 7.917-7.916 7.917z" fill="#3f3f3f"></path></g></g><g><g><path d="m311.369 328.358h-59.43c-4.374 0-7.917-3.546-7.917-7.917s3.544-7.917 7.917-7.917h59.43c4.374 0 7.917 3.546 7.917 7.917 0 4.37-3.544 7.917-7.917 7.917z" fill="#3f3f3f"></path></g></g></g></g><g><g><g><g><circle cx="181.38" cy="418.271" fill="#7cc558" r="40.191"></circle></g></g><g><g><path d="m175.184 436.641c-2.026 0-4.051-.773-5.598-2.319l-8.513-8.51c-3.093-3.087-3.093-8.103-.003-11.195 3.093-3.093 8.105-3.093 11.198 0l2.915 2.912 15.334-15.334c3.093-3.093 8.103-3.093 11.195 0 3.093 3.093 3.093 8.103 0 11.195l-20.932 20.932c-1.545 1.546-3.57 2.319-5.596 2.319z" fill="#fff"></path></g></g></g><g><g><g><path d="m370.802 403.493h-118.864c-4.374 0-7.917-3.546-7.917-7.917s3.544-7.917 7.917-7.917h118.863c4.374 0 7.917 3.546 7.917 7.917s-3.543 7.917-7.916 7.917z" fill="#3f3f3f"></path></g></g><g><g><path d="m311.369 442.193h-59.43c-4.374 0-7.917-3.546-7.917-7.917s3.544-7.917 7.917-7.917h59.43c4.374 0 7.917 3.546 7.917 7.917s-3.544 7.917-7.917 7.917z" fill="#3f3f3f"></path></g></g></g></g></g></g></g></svg>
    <h1>Recipes</h1>
</div>
    <h2>Create Recipe</h2>
    <div class="ghl_container">
        <?php if (!empty($success_message)) : ?>
            <p class="success-message"><?php echo esc_html($success_message); ?></p>
        <?php endif; ?>
        <form action="" method="post" id="ac-ghl-triger-submission">
            <div class="row">
                <div class="automate_option_tooltip_content_main">
            <div><label for="recipes_name">Recipe Name</label></div>
        </div>
        <div class="input-div">
            <input type="text" name="recipes_name" id="recipes_name" value="<?php echo esc_attr($recipes_name); ?>" placeholder="Enter A Recipes Name">
            <span class="error"><?php echo isset($errors['recipes_name']) ? esc_html($errors['recipes_name']) : ''; ?></span>
        </div>
    </div>
    <div class="row">
                <div class="automate_option_tooltip_content_main">
            <div><label for="triger">Trigger</label></div>
        </div>
        <div class="input-div">
            <select name="triger" id="triger">
                <option value="">Select A Trigger</option>
                <?php if (is_plugin_active('woocommerce/woocommerce.php')) {?>
                <option value="Subscription_Status_Change" <?php selected($triger, 'Subscription_Status_Change'); ?>>Subscription Status Change</option>
                <option value="Order_created" <?php selected($triger, 'Order_created'); ?>>Order created</option>
                <option value="Order_payment_failed" <?php selected($triger, 'Order_payment_failed'); ?>>Order Payment Failed</option>
                <?php }else{echo '';}?>
                <?php if (is_plugin_active('the-events-calendar/the-events-calendar.php')) {?>
                <option value="Order_created_att" <?php selected($triger, 'Order_created_att'); ?>>Order created(Attendes)</option>
                <option value="Mark_event_attendees" <?php selected($triger, 'Mark_event_attendees'); ?>>Mark Attendees (Events)</option>
                <option value="event_Order_payment_failed" <?php selected($triger, 'event_Order_payment_failed'); ?>>Event Order Payment Failed</option>
                <?php }else{echo '';}?>
                <?php if (is_plugin_active('woocommerce/woocommerce.php')) {?>
                <option value="Subscription_created" <?php selected($triger, 'Subscription_created'); ?>>Subscription created</option>
                <?php }else{echo '';}?>
                <option value="User_created" <?php selected($triger, 'User_created'); ?>>User created</option>
                <option value="User_updated" <?php selected($triger, 'User_updated'); ?>>User updated</option>
                <?php
                    $selected_post_types = get_option('selected_post_types', array());
                    if (!empty($selected_post_types)) {
                        foreach ($selected_post_types as $selected_post_type) {
                            $post_type_object = get_post_type_object($selected_post_type);
                            $post_type_title = $post_type_object->labels->name;
                            $post_type_slug = $post_type_object->name;

                            $create_option_value = $selected_post_type . '|||created';
                            //$update_option_value = $selected_post_type . '|||updated';

                            // Include the slug in the option label
                            $option_label = esc_html($post_type_title);
                            $created_label = '' . $option_label.' Created'. ' ('.$post_type_slug.')';
                            //$updated_label = '' . $option_label.' Updated'. ' ('.$post_type_slug.')';

                            echo '<option value="' . esc_attr($create_option_value) . '" ' . selected($triger, $create_option_value) . '>' . esc_html($created_label) . '</option>';
                            //echo '<option value="' . esc_attr($update_option_value) . '" ' . selected($triger, $update_option_value) . '>' . $updated_label . '</option>';
                        }
                    }
                ?>
            </select>
        
            <span class="error"><?php echo isset($errors['triger']) ? esc_html($errors['triger']) : ''; ?></span>
        </div>
    </div>
            <div class="row">
                <div class="automate_option_tooltip_content_main">
            <div><label for="webhook">Webhook</label></div>
        </div>
         <div class="input-div">
            <input type="text" name="webhook" id="webhook" value="<?php echo esc_attr($webhook); ?>" placeholder="Enter A Webhook URL">
            <span class="error"><?php echo isset($errors['webhook']) ? esc_html($errors['webhook']) : ''; ?></span>
        </div>
    </div>
    <div class="row">
            <input type="submit" value="Save" name="ac_save_triger" class="button-style btn">
            <input type="submit" value="Test trigger" name="test_webhook" id="ac_test_webhook" class="button-style btn" onclick="return confirm('Are you sure you want to Triger this record?');">
    </div>
        </form>
        <?php if (!empty($results)) { ?>
        <div class="recipes_table_wrapper">
            <h2>All Triggers</h2>
            <div class="table-wrap">
            <table class="widefat rwd-table">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Recipe Name</th>
                        <th>Trigger</th>
                        <th>Add Date</th>
                        <th>Added By</th>
                        <th>Webhook</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $current_page_link = admin_url('admin.php?page=automate-connect-recipes');
                    $sr_no = 1;
                    foreach ($results as $row)
                    {
                        $edit_url     =   add_query_arg( array('editid' => $row['id']), $current_page_link);
                        $delete_url   =   add_query_arg( array('deleteid' => $row['id']), $current_page_link);
                        ?>
                        <tr>
                            <td><?php echo esc_html($sr_no++); ?></td>
                            <td><?php echo esc_html($row['recipes_name']); ?></td>
                            <td><?php echo esc_html(implode(' ', explode('|||', map_triger_to_readable_text($row['recipes_trigger'])))); ?></td>
                            <td><?php echo esc_html($row['add_date']);?></td>
                            <td>
                            <?php
                            if (!empty($row['add_by'])) {
                                $user_id = $row['add_by'];
                                $user_info = get_userdata($user_id);
                                echo esc_html($user_info->display_name);
                            } else {
                                echo '';
                            }
                            ?>
                            </td>
                            <td><?php echo esc_html($row['webhook']); ?></td>
                            <td class="wp_tab_action_col">
                                <div class="btn-group-div">
                                <form method="POST" action="">
                                    <input type="hidden" name="test_webhook_tr" value="<?php echo esc_attr($row['recipes_trigger']); ?>">
                                    <input type="hidden" name="test_webhook_wk" value="<?php echo esc_attr($row['webhook']); ?>">
                                    <button  value="Test trigger" name="test_webhook_list_single" class="button-style_2_nd trg" onclick="return confirm('Are you sure you want to Trigger this record?');"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M230.974 65.765c-55.891 0-101.36 45.469-101.36 101.36 0 30.688 13.711 58.232 35.326 76.835 0-60.052-.094-55.879.249-59.988a67.781 67.781 0 0 1-2.118-16.846c0-37.444 30.461-67.904 67.903-67.904 37.442 0 67.903 30.46 67.903 67.903 0 5.814-.737 11.458-2.118 16.847.331 3.98.249 2.065.249 39.393a65.728 65.728 0 0 1 16.622 2.367c11.773-16.557 18.704-36.788 18.704-58.606 0-55.891-45.469-101.361-101.36-101.361z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M230.974 0C138.821 0 63.85 74.971 63.85 167.124c0 68.71 41.685 127.861 101.091 153.513v-37.33c-40.364-23.03-67.634-66.479-67.634-116.182 0-73.703 59.963-133.667 133.667-133.667s133.667 59.964 133.667 133.667c0 26.898-7.993 51.961-21.719 72.952a65.823 65.823 0 0 1 18.359-2.601c6.901 0 13.55 1.081 19.808 3.054 10.886-22.171 17.009-47.084 17.009-73.404C398.098 74.971 323.126 0 230.974 0z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M421.004 291.565c-14.993 0-27.147 12.154-27.147 27.147v-15.203c0-17.991-14.585-32.577-32.577-32.577s-32.577 14.585-32.577 32.577v-14.117c0-17.991-14.585-32.577-32.577-32.577S263.55 271.4 263.55 289.392v-99.901c0-17.991-14.585-32.577-32.577-32.577s-32.577 14.585-32.577 32.577v276.227c0 25.766 18.93 46.282 46.282 46.282h158.408c27.352 0 45.064-23.777 45.064-42.35V318.711c.001-14.992-12.152-27.146-27.146-27.146z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg>
                                    </button>
                                </form>
                                <a href="<?php echo esc_url($edit_url); ?>" class="editbtn"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m11.007 9.815-.956 2.869a1.007 1.007 0 0 0 1.265 1.264l2.869-.956a1.007 1.007 0 0 0 .39-.241l6.736-6.736a2.354 2.354 0 0 0 0-3.327 2.356 2.356 0 0 0-3.326 0l-6.736 6.737a1 1 0 0 0-.242.39z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M21 9a1 1 0 0 0-1 1v7a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h7a1 1 0 0 0 0-2H7a5.006 5.006 0 0 0-5 5v10a5.006 5.006 0 0 0 5 5h10a5.006 5.006 0 0 0 5-5v-7a1 1 0 0 0-1-1z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg></a>
                                <a href="<?php echo esc_url($delete_url); ?>" onclick="return confirm('Are you sure you want to delete this record?');" class="button-style_2_nd btn_del_wrap_warn delbtn"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M21 5H3a1 1 0 0 0 0 2h2v12a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V7h2a1 1 0 0 0 0-2zM11 16a1 1 0 0 1-2 0v-5a1 1 0 0 1 2 0zm4 0a1 1 0 0 1-2 0v-5a1 1 0 0 1 2 0zM10 4h4a1 1 0 0 0 0-2h-4a1 1 0 0 0 0 2z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg></a>
                            </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php

/** send dummy data on GHL On Test Integration Btn */
    $triggers_dummy_data = [
        'User_created' => [
            'user_id'           => 1,
            'first_name'        => 'First Name',
            'last_name'         => 'Last Name',
            'user_nicename'     => 'admin',
            'user_email'        => 'testemail@gmail.com',
            'user_registered'   => '2022-11-04 23:22:37',
            'display_name'      => 'Test',
            'role'              => 'administrator',
            'user_meta' => [
                'Address 1'     => 'Test Address_1',
                'Address 2'     => 'Test Address_2',
                'City'          => 'Test City',
                'State'         => 'Test State',
            ]

        ],

        'User_updated' => [
            'user_id'           =>  1,
            'first_name'        =>  'First Name',
            'last_name'         =>  'Last Name',
            'user_nicename'     =>  'admin',
            'user_email'        =>  'testemail@gmail.com',
            'user_registered'   =>  '2022-11-04 23:22:37',
            'display_name'      =>  'Test',
            'role'              =>  'administrator',
            'user_meta' => [
                'Address 1'     => 'Test Address_1',
                'Address 2'     => 'Test Address_2',
                'City'          => 'Test City',
                'State'         => 'Test State',
            ]
        ],
        'Order_created' => [
            'order_id'          => 1206,
            'order_status'      => 'processing',
            'total'             => '115.00',
            'customer_id'       => 1,
            'payment_method'    => 'stripe',
            'product_title'     => 'Product 1',
            'order_type'     => 'Other Order',
            'billing_details' => [
                'first_name'  => 'First Name',
                'last_name'   => 'Last Name',
                'company'     => 'Company Name',
                'address_1'   => 'Address 1',
                'address_2'   => 'Address 2',
                'city'        => 'Test City',
                'state'       => 'State',
                'postcode'    => '11111',
                'country'     => 'Country',
                'email'       => 'testemail@gmail.com',
                'phone'       => '7128986452',
            ],
            'applied_coupons_1' => [
            'code' => 'h38qh5u6',
            'amount' => 30,
            'type' => 'fixed_cart',
            'discount_amount' => 30,
            ],
            'applied_coupons_2' => [
                'code' => 'qsy559fm',
                'amount' => 10,
                'type' => 'fixed_cart',
                'discount_amount' => 10,
                ]
        ],
        'Order_payment_failed' => [
            'order_id'          => 1365,
            'order_status'      => 'Failed',
            'total'             => '115.00',
            'customer_id'       => 1,
            'payment_method'    => 'stripe',
            'payment_status'    => 'Failed',
            'product_title'     => 'Product 1',
            'billing_details' => [
                'first_name'  => 'First Name',
                'last_name'   => 'Last Name',
                'company'     => 'Company Name',
                'address_1'   => 'Address 1',
                'address_2'   => 'Address 2',
                'city'        => 'Test City',
                'state'       => 'State',
                'postcode'    => '11111',
                'country'     => 'Country',
                'email'       => 'testemail@gmail.com',
                'phone'       => '7128986452',
            ]
        ],
        'event_Order_payment_failed' => [
            'order_id'          => 1214,
            'order_status'      => 'Failed',
            'total'             => '120.00',
            'customer_id'       => 1,
            'payment_method'    => 'stripe',
            'payment_status'    => 'Failed',
            'event_title'       => 'Event 1',
            'order_type'        => 'subscription',
            'billing_details' => [
                'first_name'  => 'First Name',
                'last_name'   => 'Last Name',
                'company'     => 'Company Name',
                'address_1'   => 'Address 1',
                'address_2'   => 'Address 2',
                'city'        => 'Test City',
                'state'       => 'State',
                'postcode'    => '11111',
                'country'     => 'Country',
                'email'       => 'testemail@gmail.com',
                'phone'       => '7128986452',
            ]
        ],
        'Subscription_created' => [
            'subscription_id'           => 1111,
            'product_title'             => 'Academic Membership',
            'subscription_status'       => 'active',
            'subscription_type'         => 'monthly',
            'subscription_category'     => 'Membership',
            'order_type'                => 'subscription',
            'customer_id' => 1,
            'purchase_date'            	=> '2024-01-16 15:30:00',
            'renewal_date'             	=> '2024-01-16 15:30:00',
            'billing_details' => [
                'first_name'  => 'First Name',
                'last_name'   => 'Last Name',
                'company'     => 'Company Name',
                'address_1'   => 'Address 1',
                'address_2'   => 'Address 2',
                'city'        => 'Test City',
                'state'       => 'State',
                'postcode'    => '11111',
                'country'     => 'Country',
                'email'       => 'testemail@gmail.com',
                'phone'       => '7128986452',
            ]

        ],
        'Subscription_Status_Change' => [
            'order_id'         	    => 23313,
            'subscription_id' 	    => 12321,
            'customer_id'        	=> 2,
            'old_status'            => 'active',
            'new_status'            => 'expired',
            'order_type'            => 'subscription',
            'order_action' 			=> 	'new order',
            'status_change_date'    => '2024-01-16 15:30:00',
            'billing_details' => [
                'first_name'  => 'First Name',
                'last_name'   => 'Last Name',
                'company'     => 'Company Name',
                'address_1'   => 'Address 1',
                'address_2'   => 'Address 2',
                'city'        => 'Test City',
                'state'       => 'State',
                'postcode'    => '11111',
                'country'     => 'Country',
                'email'       => 'testemail@gmail.com',
                'phone'       => '7128986452',
            ]
        ],
        'Order_created_att' => [
                'event_id'  		 => 1234,
                'order_id' 			 => 2123,
                'attendee_name'      => 'Attendee Name',
                'attendee_email'     => 'testemail@gmail.com',
                'attendee_mobile'    => '7128986452',
                'event_name'  		 => 'Event Name',
                'order_type'  		 => 'Event',
                'mark_attendee'  	 => 'No',
                'event_date'  		 => '2024-01-21 21:11:22'
        ],
        'Mark_event_attendees' => [
            'event_id'  		 => 1234,
            'attendee_name'      => 'Attendee Name',
            'attendee_email'     => 'testemail@gmail.com',
            'attendee_mobile'    => '7128986452',
            'event_name'  		 => 'Event Name',
            'event_attended'  	 => 'Yes',
            'event_date'  		 => '2024-01-21 21:11:22'
    ],
    ];

    $selected_post_types = get_option('selected_post_types', array());
    $option_values = array();

    if (!empty($selected_post_types)) {
        foreach ($selected_post_types as $selected_post_type) {
            $create_option_value = $selected_post_type . '|||created';
            $update_option_value = $selected_post_type . '_updated';

            $option_values[$create_option_value] = [
                'post_id'       => 123,
                'post_title'    => 'Post Title',
                'post_link'     => 'http://sample.com/post-slug',
                'post_excerpt'  => 'This is a sample post excerpt.',
                'category'      => 'General',
                'post_type'     => $selected_post_type,
                'post_status'   => 'Publish',
                'author' => [
                    'name'      => 'Author Name',
                    'email'     => 'author@gmail.com',
                ],
                'post_date' => '2024-01-16 15:30:00',
            ];

            $option_values[$update_option_value] = [
                'post_id'       => 123,
                'post_title'    => 'Post Title',
                'post_link'     => 'http://sample.com/post-slug',
                'post_excerpt'  => 'This is a sample post excerpt.',
                'category'      => 'General',
                'post_type'     => 'Post',
                'post_status'   => 'Publish',
                'author' => [
                    'name'      => 'Author Name',
                    'email'     => 'author@gmail.com',
                ],
                'post_date' => '2024-01-16 15:30:00',
            ];

            $triggers_dummy_data = array_merge($triggers_dummy_data, $option_values);
        }
    }



    if (isset($_POST['test_webhook_list_single'])) {

        if(isset($_POST['test_webhook_tr'])){
            $test_webhook_tr = sanitize_text_field(wp_unslash($_POST['test_webhook_tr']));
        }
        if(issat($_POST['test_webhook_wk'])){
            $test_webhook_wk = sanitize_text_field(wp_unslash($_POST['test_webhook_wk']));
        }
        
        if (!empty($test_webhook_tr) && !empty($test_webhook_wk) && array_key_exists($test_webhook_tr, $triggers_dummy_data)) {
            ac_trigger_post_request_ghl($test_webhook_wk, $triggers_dummy_data[$test_webhook_tr]);
        } else {
            echo "Trigger data not found or invalid for: " . esc_html($test_webhook_tr);
        }
    }

    if (isset($_POST['test_webhook'])) {
        $selected_trigger = isset($_POST['triger']) ? sanitize_text_field(wp_unslash($_POST['triger'])) : '';
        $webhook_value = !empty($_POST['webhook']) ? sanitize_text_field(wp_unslash($_POST['webhook'])) : '';

        if (!empty($selected_trigger) && array_key_exists($selected_trigger, $triggers_dummy_data)) {
            ac_trigger_post_request_ghl($webhook_value, $triggers_dummy_data[$selected_trigger]);
        } else {
            echo "Trigger data not found or invalid for: " . esc_html($selected_trigger);
        }
    }

    /** ac ghl data triger function */
    function ac_trigger_post_request_ghl($webhook_value, $ghl_data)
    {
        wp_remote_post( $webhook_value, [
            'body' => wp_json_encode( $ghl_data ),
            'headers' => ['Content-Type' => 'application/json'],
        ]);
        ?>
        <script>
            alert("Webhook triggered successfully.");
        </script>
        <?php
    }

    ?>
