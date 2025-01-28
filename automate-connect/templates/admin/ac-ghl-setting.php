<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}
?>
<style>


    .mb-5 {
        margin-bottom: 5px;
    }
    .ac-ghl-setting {
        display: flex;
        align-items: center;
        gap: 15px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 7px;
    }
    .ac-ghl-setting h2 {
        color: #3498db;
    }
    input[type=checkbox], input[type=radio] {
        border: 1px solid #8c8f94 !important;
    }
    .ac_setting_save_btn_wrap input[type="submit"] {
         background-color: #559DA8;
    border: 1px solid #559DA8;
    padding: 8px 20px 8px 20px;
    border-radius: 3px;
    text-align: center;
    font-size: 16px;
    color: #fff;
    cursor: pointer;
    margin-top: 15px;
    }


    .tablink {
         background-color: #559DA8;
    border: 1px solid #559DA8;
    padding: 8px 20px 8px 20px;
    border-radius: 3px;
    text-align: center;
    font-size: 16px;
    color: #fff;
    cursor: pointer;
    margin-top: 15px;
    }
    .ac_setting_save_btn_wrap {
        margin-top: 10px;
    }
    .tablink.active,.tablink:hover {
         background-color: #125166;
    border: 1px solid #125166;
    }

    .tabcontent {
        display: none;

    background-color: #fff;
    max-width: 100%;
    border: none;
   
    border-radius: 5px;
    color: #32373c;
    padding: 15px;
    }

    .tabcontent.active {
        display: block;

    }

    /** vs custom css for success and error message */
    .ac-message-container {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .ac-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    .ac-error {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
    }
    /** New css added sm */


    .ac-ghl-setting h2 {
        
        color: #343a40;
    }

    .ac_ghl_settings {
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        margin-top: 20px;

    }

    .ac_ghl_settings label {
        
        font-weight: bold;
        color: #495057;
    }

    .ac_my_ghl_sett_chec {
        margin-bottom: 16px;
    }

    .ac_ghl_container {

        background: #fff;
        border: 1px solid #ced4da;
        box-shadow: 0 1px 2px rgba(0,0,0,.075);
        border-radius: 4px;
        padding: 15px;
        margin-top: 20px;
    }

    .ac_ghl_container label {
        display: block;
        margin-bottom: 8px;
        color: #495057;
    }

    .ac_ghl_container input[type="text"] {
        margin-bottom: 16px;
        border-radius: 4px;
        border: 1px solid #ced4da;
        width: 40%; /* Set the width to 40% */
        padding: 8px;
        box-sizing: border-box;
    }



    .authorization-link {
        color: #007bff; /* Set link color */
        text-decoration: none; /* Remove underline */
    }

    .authorization-link:hover {
        text-decoration: underline; /* Add underline on hover */
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
    .mds_main_wrapper input[type=text], .mds_main_wrapper input[type=number], .mds_main_wrapper input[type=password], .mds_main_wrapper input[type=email], .mds_main_wrapper input[type=url], .mds_main_wrapper textarea {
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
        margin-top: 30px;

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
    .tooltip {
            position: relative;
            margin: 3px 5px;
        }
    div#
     {
        width: 100%;
    }
    .tooltip .top {
        min-width: 200px;
        top: -20px;
        left: 50%;
        transform: translate(-50%, -100%);
        padding: 10px 20px;
        color: #444444;
        background-color: #fff;
        font-weight: normal;
        font-size: 13px;
        border-radius: 8px;
        position: absolute;
        z-index: 99999999;
        box-sizing: border-box;
        box-shadow: 0 0 8px #ccc;
        display: none;
    }
    .close-tooltip {
        background-color: #f00;
        color: #fff;
        padding: 3px 4px;
        width: max-content;
        border-radius: 50%;
        float: right;
        font-size: 9px;
        margin-top: -5px;
        margin-right: -15px;
        cursor: pointer;
    }
    .submenu-wrap {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }
    .submenu-wrap button {
        box-shadow: rgba(0, 0, 0, 0.09) 0px 3px 12px;
        border-radius: 4px;
        background-color: #6C90B8;
        padding: 7px 15px;
        text-align: center;
        font-size: 14px;
        border: 1px solid #6C90B8;
        color: #fff;
        cursor: pointer;
    }
    .submenu-wrap button.active {
        background-color: #43658B;
    }
    .leftmenu-wraps {
        display: flex;
        gap: 10px;
        align-items: center;
        margin: 25px 0;
    }
    .leftmenu-wraps h4 {
        font-size: 1.2rem;
        font-weight: 600;
        padding: 0;
        margin: 0;
    }
    .menu-item span, .menu-item label{
        display: block;
        font-size: 16px;
        font-weight: 600;
        margin-top: 2px;
    }
    #menu-items-container, #dashboard-center-form, #dashboard-header-form{
        width: 50%;
    }
   .menu-item input[type=text], .menu-item input[type=url]{
    margin-top: 5px;
    margin-bottom: 15px;
    }
    .menu-item button, .remove-more-item{
        background-color: #FFA8A8;
        color: #000;
        border: 1px solid #FFA8A8;
        text-align: center;
        padding: 5px 10px;
        border-radius: 3px;
        margin-top: 10px;
        cursor: pointer;
    }
    .menu-item {
        border: 1px solid #dedede;
        margin-block-end: 15px;
        padding: 15px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
        background-color: #559da817;
    }
    #add-menu-item, #add-center-menu-item, #add-header-menu-item, #add-more-button{
        background-color: #559da8;
        border: 1px solid #559da8;
        text-align: center;
        padding: 8px 20px 8px 20px;
        border-radius: 3px;
        text-align: center;
        font-size: 16px;
        color: #fff;
        cursor: pointer;
        margin-top: 30px;
    }
    #add-header-menu-item {
        margin-top: 10px;
    }
    .menu-item textarea{
        width: 100%;
        height: 150px;
        margin-top: 5px;

    }
    @media (max-width: 1100px) {
    #menu-items-container, #dashboard-center-form, #dashboard-header-form{
            width: 100%;
        }
    }
</style>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<div class="mds_main_wrapper">
    <div class="form-header">
        <svg id="fi_3953226" enable-background="new 0 0 512.207 512.207" height="30" viewBox="0 0 512.207 512.207" width="30" xmlns="http://www.w3.org/2000/svg"><g><path d="m466.104 256.049c0-4.883-.174-9.82-.52-14.754l46.624-39.918-2.277-9.018c-3.12-12.358-7.163-24.574-12.022-36.324-4.866-11.729-10.645-23.225-17.176-34.17l-4.767-7.987-61.095 4.734c-6.515-7.517-13.567-14.581-21.075-21.108l4.743-61.208-7.987-4.766c-10.946-6.533-22.442-12.312-34.185-17.184-11.735-4.853-23.951-8.896-36.308-12.016l-9.018-2.277-39.847 46.54c-5.05-.362-10.071-.542-15.089-.542l-45 44.997 45 45c66.168 0 120 53.832 120 120s-53.832 120-120 120l-45 45 45 44.998c4.911 0 9.82-.172 14.754-.518l39.918 46.624 9.018-2.277c12.358-3.12 24.574-7.163 36.324-12.022 11.729-4.866 23.226-10.645 34.169-17.177l7.987-4.766-4.734-61.095c7.517-6.514 14.581-13.567 21.108-21.075l61.208 4.743 4.766-7.987c6.533-10.946 12.312-22.442 17.184-34.185 4.853-11.735 8.896-23.951 12.016-36.308l2.277-9.018-46.54-39.847c.361-5.05.544-10.099.544-15.089z" fill="#587aa1"></path><path d="m46.104 256.049c0-4.883.174-9.82.52-14.754l-46.624-39.918 2.277-9.018c3.12-12.358 7.163-24.574 12.022-36.324 4.866-11.729 10.645-23.225 17.176-34.17l4.767-7.987 61.095 4.734c6.515-7.517 13.567-14.581 21.075-21.108l-4.743-61.208 7.987-4.766c10.946-6.533 22.442-12.312 34.185-17.184 11.735-4.853 23.951-8.896 36.308-12.016l9.018-2.277 39.847 46.54c5.05-.362 10.071-.542 15.089-.542v89.997c-66.168 0-120 53.832-120 120s53.832 120 120 120v89.998c-4.911 0-9.82-.172-14.754-.518l-39.918 46.624-9.018-2.277c-12.358-3.12-24.574-7.163-36.324-12.022-11.729-4.866-23.226-10.645-34.169-17.177l-7.987-4.766 4.734-61.095c-7.517-6.514-14.581-13.567-21.108-21.075l-61.208 4.743-4.766-7.987c-6.533-10.946-12.312-22.442-17.184-34.185-4.853-11.735-8.896-23.951-12.016-36.308l-2.277-9.018 46.54-39.847c-.362-5.05-.544-10.099-.544-15.089z" fill="#6c90b8"></path><path d="m256.104 106.049-30 30 30 30c49.626 0 90 40.374 90 90s-40.374 90-90 90l-30 30 30 30c82.711 0 150-67.289 150-150s-67.29-150-150-150z" fill="#81a6c7"></path><path d="m166.104 256.049c0-49.626 40.374-90 90-90v-60c-82.711 0-150 67.289-150 150s67.289 150 150 150v-60c-49.626 0-90-40.374-90-90z" fill="#97bedb"></path></g></svg>
    <h1>Automate Connect Settings</h1>
</div>
    <div class="ac-ghl-se-tab">
        <button class="tablink" data-tab="ac-triger-cpt-set">CPT Trigger</button>
        <button class="tablink" data-tab="ac-api-key">GHL API Setting</button>
        <button class="tablink" data-tab="ac-knowledge-base">Knowledge Base</button>
        <button class="tablink" data-tab="ac-dash-menu">Dashboard Setting</button>

        <!-- Triger CPTs -->
        <div id="ac-triger-cpt-set" class="tabcontent" style="display: none;">
        <div class="mb-5 pb=2 ac-ghl-setting">
            <svg enable-background="new 0 0 512 512" height="30" viewBox="0 0 512 512" width="30" xmlns="http://www.w3.org/2000/svg" id="fi_5529864"><g id="_x32_7_Checklist"><g><g><g><path d="m385.138 55.617h-100.211v-26.694c0-15.943-12.968-28.911-28.911-28.911s-28.911 12.968-28.911 28.911v26.695h-100.243c-17.241 0-31.269 14.03-31.269 31.272v393.828c0 17.241 14.028 31.272 31.269 31.272h258.277c17.241 0 31.269-14.03 31.269-31.272v-393.829c0-17.241-14.028-31.272-31.27-31.272zm-142.199-26.694c0-7.211 5.866-13.077 13.077-13.077s13.077 5.866 13.077 13.077v26.695h-26.153v-26.695zm157.634 451.794c0 8.51-6.925 15.437-15.435 15.437h-258.276c-8.51 0-15.435-6.928-15.435-15.437v-393.828c0-8.51 6.925-15.437 15.435-15.437.528.014 205.496.003 258.277 0 8.51 0 15.435 6.928 15.435 15.437v393.828z" fill="#3f3f3f"></path></g></g><g><g><path d="m335.864 55.341v23.203c0 12.897-10.455 23.352-23.352 23.352h-113.023c-12.897 0-23.352-10.455-23.352-23.352v-23.203c0-6.449 5.228-11.676 11.676-11.676h136.375c6.448 0 11.676 5.228 11.676 11.676z" fill="#7cc558"></path></g></g><g><g><g><g><g><circle cx="181.38" cy="190.603" fill="#7cc558" r="40.191"></circle></g></g><g><g><path d="m175.184 208.971c-2.026 0-4.051-.773-5.598-2.319l-8.513-8.51c-3.093-3.087-3.093-8.103-.003-11.195 3.093-3.093 8.105-3.093 11.198 0l2.915 2.912 15.334-15.334c3.093-3.093 8.103-3.093 11.195 0 3.093 3.093 3.093 8.103 0 11.195l-20.932 20.932c-1.545 1.546-3.57 2.319-5.596 2.319z" fill="#fff"></path></g></g></g><g><g><g><path d="m370.802 175.823h-118.864c-4.374 0-7.917-3.546-7.917-7.917s3.544-7.917 7.917-7.917h118.863c4.374 0 7.917 3.546 7.917 7.917s-3.543 7.917-7.916 7.917z" fill="#3f3f3f"></path></g></g><g><g><path d="m311.369 214.522h-59.43c-4.374 0-7.917-3.546-7.917-7.917s3.544-7.917 7.917-7.917h59.43c4.374 0 7.917 3.546 7.917 7.917s-3.544 7.917-7.917 7.917z" fill="#3f3f3f"></path></g></g></g></g><g><g><g><g><circle cx="181.38" cy="304.437" fill="#7cc558" r="40.191"></circle></g></g><g><g><path d="m175.184 322.806c-2.026 0-4.051-.773-5.598-2.319l-8.513-8.51c-3.093-3.087-3.093-8.103-.003-11.195 3.093-3.093 8.105-3.093 11.198 0l2.915 2.912 15.334-15.334c3.093-3.093 8.103-3.093 11.195 0 3.093 3.093 3.093 8.103 0 11.195l-20.932 20.932c-1.545 1.546-3.57 2.319-5.596 2.319z" fill="#fff"></path></g></g></g><g><g><g><path d="m370.802 289.658h-118.864c-4.374 0-7.917-3.546-7.917-7.917s3.544-7.917 7.917-7.917h118.863c4.374 0 7.917 3.546 7.917 7.917.001 4.371-3.543 7.917-7.916 7.917z" fill="#3f3f3f"></path></g></g><g><g><path d="m311.369 328.358h-59.43c-4.374 0-7.917-3.546-7.917-7.917s3.544-7.917 7.917-7.917h59.43c4.374 0 7.917 3.546 7.917 7.917 0 4.37-3.544 7.917-7.917 7.917z" fill="#3f3f3f"></path></g></g></g></g><g><g><g><g><circle cx="181.38" cy="418.271" fill="#7cc558" r="40.191"></circle></g></g><g><g><path d="m175.184 436.641c-2.026 0-4.051-.773-5.598-2.319l-8.513-8.51c-3.093-3.087-3.093-8.103-.003-11.195 3.093-3.093 8.105-3.093 11.198 0l2.915 2.912 15.334-15.334c3.093-3.093 8.103-3.093 11.195 0 3.093 3.093 3.093 8.103 0 11.195l-20.932 20.932c-1.545 1.546-3.57 2.319-5.596 2.319z" fill="#fff"></path></g></g></g><g><g><g><path d="m370.802 403.493h-118.864c-4.374 0-7.917-3.546-7.917-7.917s3.544-7.917 7.917-7.917h118.863c4.374 0 7.917 3.546 7.917 7.917s-3.543 7.917-7.916 7.917z" fill="#3f3f3f"></path></g></g><g><g><path d="m311.369 442.193h-59.43c-4.374 0-7.917-3.546-7.917-7.917s3.544-7.917 7.917-7.917h59.43c4.374 0 7.917 3.546 7.917 7.917s-3.544 7.917-7.917 7.917z" fill="#3f3f3f"></path></g></g></g></g></g></g></g></svg>
            <!-- <h2>All CPTs Triggers</h2> -->
            <div class="automate_option_tooltip_content_main">
                    <label for="prompt_text">All CPTs Triggers*</label>
                    <i class="fa fa-question-circle tooltip" aria-hidden="true">
                        <div class="top">
                            <div class="close-tooltip">X</div>
                            <!-- <h3>Lorem Ipsum</h3> -->
                            <p>Please select the post types that will be used to create recipes. </p>
                        </div>
                    </i>
                </div>
        </div>
            <?php
                $message = '';
                if(isset($_SERVER['REQUEST_METHOD'])){
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_settings'])) {
                        // $selected_post_types = isset($_POST['selected_post_types']) ? array_map('sanitize_text_field' 'wp_unslash', $_POST['selected_post_types']) : array() ;
                        
                        $selected_post_types = isset($_POST['selected_post_types']) ? array_map(function($value) {
                            return sanitize_text_field(wp_unslash($value));
                        }, $_POST['selected_post_types']) : array();
                        
                        update_option('selected_post_types', $selected_post_types);
                        $message = 'Settings saved successfully!';
                    }
                }

                $selected_post_types = get_option('selected_post_types', array());
                $post_types = get_post_types();

                ?>
                <?php if ($message){ ?>
                    <div class="updated notice is-dismissible">
                        <p><?php echo esc_html($message); ?></p>
                    </div>
                <?php } ?>

                <?php
                if (is_plugin_active('woocommerce/woocommerce.php')) {
                ?>
                <div class="checkbox-outer">
                    <input type="checkbox" name="Subscription_Status_Change" checked disabled> <span>Subscription Status Change</span>
                </div>
                <div class="checkbox-outer">
                <input type="checkbox" name="Order_created" checked disabled><span> Order created</span>
                </div>
                <div class="checkbox-outer">
                <input type="checkbox" name="Order_payment_failed" checked disabled> <span>Order Payment Failed</span>
                </div>
                <?php }else{echo '';}
                if (is_plugin_active('the-events-calendar/the-events-calendar.php')) {
                ?>
                <div class="checkbox-outer">
                <input type="checkbox" name="Order_created_att" checked disabled> <span>Order created (Attendes)</span>
                </div>
                <div class="checkbox-outer">
                <input type="checkbox" name="Mark_event_attendees" checked disabled><span> Mark Attendees (Events)</span>
                </div>
                <div class="checkbox-outer">
                <input type="checkbox" name="event_Order_payment_failed" checked disabled><span> Event Order Payment Failed</span>
                </div>
                <?php } else{echo '';}
                if (is_plugin_active('woocommerce/woocommerce.php')) {
                    ?>
                 <div class="checkbox-outer">
                <input type="checkbox" name="Subscription_created" checked disabled><span> Subscription created</span>
                </div>

                <?php }else{echo '';} ?>
                 <div class="checkbox-outer">
                <input type="checkbox" name="User_created" checked disabled><span> User created</span>
                </div>
                <div class="checkbox-outer">
                <input type="checkbox" name="User_updated" checked disabled><span> User updated</span>
                </div>

                <form method="post" action="">
                <?php
               $post_types = get_post_types([], 'objects');
               if (!empty($post_types)) {
                   usort($post_types, function ($a, $b) {
                       return strcasecmp($a->labels->name, $b->labels->name);
                   });

                   foreach ($post_types as $post_type) {
                       $name = $post_type->labels->name;
                       $post_type_slug = $post_type->name;

                       $post_type_label = $name . ' (' . $post_type_slug . ')';
                       $checked = in_array($post_type->name, $selected_post_types) ? 'checked' : '';

                       echo ' <div class="checkbox-outer"><input type="checkbox" name="selected_post_types[]" value="' . esc_attr($post_type->name) . '" ' . esc_attr($checked) . '> <span>' . esc_html($post_type_label) . '</span></div>';
                   }
               }
                ?>
                        <div class="ac_setting_save_btn_wrap">
                            <input type="submit" name="save_settings" class="user_submit_btn" value="Save Settings">
                        </div>
                </form>
        </div>

        <!-- Add two more tab contents -->
        <div id="ac-api-key" class="tabcontent" style="display: none;">
        <!-- <label for="ac-ghl-sett-chec">Enable GHL API Setting</label>
        <input type="checkbox" name="ac-ghl-set-enable" id="ac-ghl-sett-chec" class="ac-my-ghl-sett-chec"> -->
        <?php
            $ac_api_message = '';

            function ac_get_server_user_api_data_func($username, $password, $url) {
                $allowed_username = '7e3188fc-4ae8-4edd-9d60-b04508151807';
                $allowed_password = 'wIyGNKyKcw5lxqAKJTgxV9kRsEe8VfKc';
                $allowed_url = 'https://api.wpengineapi.com/v1/status';

                if ($username == $allowed_username && $password == $allowed_password && $url == $allowed_url) {
                    $response = wp_remote_get($url, array(
                        'headers' => array(
                            'Authorization' => 'Basic ' . base64_encode($username . ':' . $password),
                        ),
                    ));

                    if (is_array($response) && !is_wp_error($response)) {
                        $body = wp_remote_retrieve_body($response);
                        $data = json_decode($body, true);

                        if (isset($data['success']) && $data['success'] == 1) {
							return "Yes";
						} else {
							return "No";
						}
                    } else {
						return "No";
					}
                } else {
                    return false;
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ac-api-key-save'])) {
                $ac_api_username = sanitize_text_field($_POST['ac-client-id-val']);
                $ac_api_password = sanitize_text_field($_POST['ac-client-secret-val']);
                $ac_api_redirect_url = sanitize_text_field($_POST['ac-auth-re-url-val']);

                if (ac_get_server_user_api_data_func($ac_api_username, $ac_api_password, $ac_api_redirect_url)) {
                    update_option('ac_client_id', $ac_api_username);
                    update_option('ac_client_secret', $ac_api_password);
                    update_option('ac_auth_redirect_url', $ac_api_redirect_url);

                    $ac_api_message = "Settings saved successfully.";
                } else {
                    $ac_api_message = "API data not valid. Please enter valid API credentials.";
                }
            }
            ?>

                <div class="ac-api-key-sett-sec">
                    <div class="mb-5 pb-2 ac-ghl-setting">
                        <h2>GoHighLevel API Settings</h2>
                    </div>
                    <form action="" method="post">
                        <div class="ac_ghl_settings">
                            <label for="ac_ghl_sett_chec">Enable DND Setting</label>
                            <input type="checkbox" name="ac_ghl_set_enable" id="ac_ghl_sett_chec" class="ac_my_ghl_sett_chec" value="yes" <?php echo !empty($ac_ghl_set_enabled) ? "checked='checked'" : ''; ?>>
                        </div>
                        <?php
                        // Uncomment and adjust the following lines when needed
                         echo !empty($success_msg) ? '<h3>' . esc_html($success_msg) . '</h3>' : '<h3>' . esc_html($error_msg) . '</h3>';
                        ?>
                        <div class="ac_ghl_container" style="<?php echo (!empty($ac_ghl_set_enabled) && $ac_ghl_set_enabled == 'yes') ? '' : 'display:none;'; ?>">
                            <label for="clientID">Client ID</label>
                            <input type="text" name="hft_client_id" id="clientID" value="<?php echo !empty($client_id) ? esc_attr($client_id) : ''; ?>">
                            <label for="clientSecret">Client Secret</label>
                            <input type="text" name="hft_client_secret" id="clientSecret" value="<?php echo !empty($client_secret) ? esc_attr($client_secret) : ''; ?>">
                            <label for="hft_authorization">Authorization Redirect URI</label>
                            <input type="text" name="hft_authorization_uri" id="hft_authorization" value="<?php echo !empty($authorization_uri) ? esc_attr($authorization_uri) : ''; ?>"><br>
                            <?php
                            if(!empty($client_id) && !empty($authorization_uri))
                            {
                                ?>
                                <div class="ac_authorization_url">
                                    <p>
                                        <a href="https://marketplace.gohighlevel.com/oauth/chooselocation?response_type=code&redirect_uri=<?php echo urlencode($authorization_uri); ?>&client_id=<?php echo esc_attr($client_id); ?>&scope=contacts.readonly contacts.write" class="authorization-link">
                                            <?php echo esc_url("https://marketplace.gohighlevel.com/oauth/chooselocation?response_type=code&redirect_uri=$authorization_uri&client_id=$client_id&scope=contacts.readonly contacts.write"); ?>
                                        </a>
                                    </p>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <!--
                        <div class="ac_ghl_settings">
                            <label for="ac_ghl_email_preferences">Enable Email Preferences Setting</label>
                            <input type="checkbox" name="ac_ghl_email_preferences" id="ac_ghl_email_preferences" class="ac_my_ghl_email_preferences" value="yes" <?php //echo (!empty($ac_email_preferences) && $ac_email_preferences == 'yes') ? "checked='checked'" : ''; ?>>
                        </div>
                        -->
                        <div class="ac_ghl_submit">
                            <input class="btn" type="submit" value="Save" name="save">
                        </div>
                    </form>
                </div>

        </div>

        <!-- GHL Log  -->
        <div id="ac-knowledge-base" class="tabcontent" style="display: none;">
            <div class="ac-kb-whmcs-sec">
                <form action="" method="post">
                    <input class="btn" type="submit" name="ac-whmcs-get-data" value="Sync Knowledge base from WHMCS">
                </form>
            </div>
        </div>
        <!-- automate connect defult dashboard left menu section start -->
        <div id="ac-dash-menu" class="tabcontent" style="display: none;">
             <!-- Dashboard Setting content goes here -->
             <div class="submenu-wrap">
                <button class="sub-tablink" data-subtab="dash-general">Sidebar Menu Settings</button>
                <button class="sub-tablink" data-subtab="dash-advanced">Dashboard Content Settings</button>
                <button class="sub-tablink" data-subtab="dash-reports">Header Settings</button>
                <button class="sub-tablink" data-subtab="ac-custom-css">Custom Css</button>
            </div>
            <div id="ac-custom-css" class="sub-tabcontent" style="display: none;">
                <div class="ac-dash-menu-sec">
                    <div id="success-message" style="display: none; color: green;">
                        Data saved successfully!
                    </div>
                    <!-- Loading overlay -->
                    <div id="loading-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 9999;">
                        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white;">
                            <img src="<?php echo esc_url(site_url('wp-content/plugins/automate-connect/assets/img/automate-loader.gif')); ?>" alt="Automate Dashboard Loader" width="80px">
                        </div>
                    </div>
                    <?php
                        $ac_custom_css = get_option('ac_custom_css');
                    ?>
                    <div class="leftmenu-wraps">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512">
                            <g><path d="M7.94 10s-.13-.07-.15 0C5 14 1 19.32 1 19.32v8.18A3.5 3.5 0 0 0 4.5 31h15.23S12 17 7.94 10z" fill="#3a7c78"></path>
                            <circle cx="21.5" cy="9.5" r="1.5" fill="#3a7c78"></circle>
                            <path d="M27.5 1h-23A3.5 3.5 0 0 0 1 4.5v11.41l5.17-7.14A2.09 2.09 0 0 1 9.69 9L22 31h5.5a3.5 3.5 0 0 0 3.5-3.5v-23A3.5 3.5 0 0 0 27.5 1zm-6 12A3.5 3.5 0 1 1 25 9.5a3.5 3.5 0 0 1-3.5 3.5z" fill="#3a7c78"></path></g>
                        </svg>
                        <h4>Custom Css</h4>
                    </div>
                    <div class="menu-item">
                        <textarea name="ac_custom_css" rows="4" cols="50" id="ac_custom_css_add" value="<?php echo !empty($ac_custom_css) ? esc_attr($ac_custom_css) : ''; ?>"><?php echo !empty($ac_custom_css) ? esc_html($ac_custom_css) : ''; ?></textarea>
                        <input class="btn" type="submit" id= "save-ac-custom-css" name="ac-custom-css-data" value="Save">
                    </div>
                    <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        jQuery('#save-ac-custom-css').on('click', function() {
                            jQuery('#loading-overlay').show();
                            var customCSS = jQuery('#ac_custom_css_add').val();
                            jQuery.ajax({
                                url: '<?php echo esc_url(admin_url('admin-ajax.php')); ?>',
                                type: 'POST',
                                data: {
                                    action: 'ac_save_custom_css',
                                    ac_custom_css: customCSS
                                },
                                success: function(response) {
                                    jQuery('#loading-overlay').hide();
                                    jQuery('#success-message').show().delay(3000).fadeOut();
                                },
                                error: function() {
                                    jQuery('#loading-overlay').hide(); // Hide loading overlay
                                    alert('There was an error saving the data.');
                                }
                            });
                        });
                    });
                    </script>
                </div>
            </div>
                <!-- left menus section setting start -->
                <div id="dash-general" class="sub-tabcontent" style="display: none;">
                    <div class="ac-dash-menu-sec">
                        <div id="success-message" style="display: none; color: green;">
                            Data saved successfully!
                        </div>
                        <!-- Loading overlay -->
                        <div id="loading-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 9999;">
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white;">
                                <img src="<?php echo esc_url(site_url('wp-content/plugins/automate-connect/assets/img/automate-loader.gif')); ?>" alt="Automate Dashboard Loader" width="80px">
                            </div>
                        </div>

                        <form id="dashboard-form" action="" method="post">
                            <!-- Automate Connect Dashboard Left Section Menu -->
                            <div id="menu-items-container">
                                <div class="leftmenu-wraps">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#3a7c78" d="M60.7 0h117.6C211.8 0 239 27.2 239 60.7v117.9c0 33.5-27.2 60.7-60.7 60.7H60.7C27.2 239.3 0 212.1 0 178.6V60.7C0 27.2 27.2 0 60.7 0z" opacity="1" data-original="#2c5ede"></path><path fill="#529daa" d="M333.7 0h117.6C484.8 0 512 27.2 512 60.7v117.9c0 33.5-27.2 60.7-60.7 60.7H333.7c-33.5 0-60.7-27.2-60.7-60.7V60.7C273 27.2 300.2 0 333.7 0z" opacity="1" data-original="#95baf9" class=""></path><g fill="#2c5ede"><path d="M60.7 272.7h117.6c33.5 0 60.7 27.2 60.7 60.7v117.9c0 33.5-27.2 60.7-60.7 60.7H60.7C27.2 512 0 484.8 0 451.3V333.4c0-33.5 27.2-60.7 60.7-60.7zM333.7 272.7h117.6c33.5 0 60.7 27.2 60.7 60.7v117.9c0 33.5-27.2 60.7-60.7 60.7H333.7c-33.5 0-60.7-27.2-60.7-60.7V333.4c0-33.5 27.2-60.7 60.7-60.7z" fill="#3a7c78" opacity="1" data-original="#2c5ede"></path></g></g></svg>
                                <h4>Sidebar Menu Settings</h4>
                            </div>
                                <?php
                                $menu_items = unserialize(get_option('ac_dashboard_menu_items'));
                                if ($menu_items) {
                                    foreach ($menu_items as $index => $item) {
                                        echo '<div class="menu-item" data-index="' . esc_html($index) . '">';
                                        echo '<span>Menu Name:- </span><input type="text" name="ac-left-menu-name[]" placeholder="Menu Name" value="' . esc_attr($item['name']) . '">';
                                        echo '<span>Menu Icon URL:- </span><input type="url" name="ac-left-menu-icon-url[]" placeholder="Enter menu icon URL" value="' . esc_url($item['icon']) . '">';
                                        echo '<span>Menu URL:- </span><input type="url" name="ac-left-menu-url[]" placeholder="Menu URL" value="' . esc_url($item['url']) . '">';
                                        echo '<button type="button" class="remove-menu-item">Remove</button>';
                                        
                                        echo '</div>';
                                    }
                                } else {
                                    echo '<div class="menu-item" data-index="0">';
                                    echo '<span>Menu Name:- </span><input type="text" name="ac-left-menu-name[]" placeholder="Menu Name">';
                                    echo '<span>Menu Icon URL:- </span><input type="url" name="ac-left-menu-icon-url[]" placeholder="Enter menu icon URL">';
                                    echo '<span>Menu URL:- </span><input type="url" name="ac-left-menu-url[]" placeholder="Menu URL">';
                                   
                                    echo '</div>';
                                }
                                ?>
                            </div>
                            <button type="button" id="add-menu-item">Add Menu Item</button>
                            <input class="btn" type="submit" name="ac-dash-get-data" value="Save">
                        </form>
                        <!-- Automate Connect User Dashboard Setting Script -->
                        <script type="text/javascript">
                            jQuery(document).ready(function($) {
                                let itemIndex = $('#menu-items-container .menu-item').length;

                                // Add new menu item
                                $('#add-menu-item').on('click', function() {
                                    const newItem = $('<div>').addClass('menu-item').attr('data-index', itemIndex).html(`
                                        <span>Menu Name:- </span><input type="text" name="ac-left-menu-name[]" placeholder="Menu Name">
                                        <span>Menu Icon URL:- </span><input type="url" name="ac-left-menu-icon-url[]" placeholder="Enter menu icon URL">
                                        <span>Menu URL:- </span><input type="url" name="ac-left-menu-url[]" placeholder="Menu URL">
                                        <button type="button" class="remove-menu-item">Remove</button>
                                        
                                    `);
                                    $('#menu-items-container').append(newItem);
                                    itemIndex++;
                                });

                                // Remove menu item
                                $('#menu-items-container').on('click', '.remove-menu-item', function() {
                                    $(this).parent().remove();
                                });

                                // Prevent empty form submission
                                $('#dashboard-form').on('submit', function(e) {
                                    e.preventDefault(); // Prevent the default form submission

                                    let valid = true;
                                    $('#menu-items-container .menu-item').each(function() {
                                        const name = $(this).find('input[name="ac-left-menu-name[]"]').val();
                                        const icon = $(this).find('input[name="ac-left-menu-icon-url[]"]').val();
                                        const url = $(this).find('input[name="ac-left-menu-url[]"]').val();
                                        if (!name || !icon || !url) {
                                            valid = false;
                                        }
                                    });

                                    if (!valid) {
                                        alert('Please fill in all menu item fields.');
                                        return;
                                    }

                                    // Show loading overlay
                                    $('#loading-overlay').show();

                                    // Send AJAX request
                                    $.ajax({
                                        url: ajaxurl,
                                        type: 'POST',
                                        data: {
                                            action: 'ac_save_dashboard_settings',
                                            nonce: '<?php echo esc_js(wp_create_nonce('save_ac_dashboard_settings_nonce')); ?>',
                                            'ac-left-menu-name': $('input[name="ac-left-menu-name[]"]').map(function() { return $(this).val(); }).get(),
                                            'ac-left-menu-icon-url': $('input[name="ac-left-menu-icon-url[]"]').map(function() { return $(this).val(); }).get(),
                                            'ac-left-menu-url': $('input[name="ac-left-menu-url[]"]').map(function() { return $(this).val(); }).get()
                                        },
                                        success: function(response) {
                                            if (response.success) {
                                                $('#success-message').show().delay(3000).fadeOut();
                                            } else {
                                                alert(response.data.message);
                                            }
                                        },
                                        error: function() {
                                            alert('An error occurred. Please try again.');
                                        },
                                        complete: function() {
                                            // Hide loading overlay
                                            $('#loading-overlay').hide();
                                        }
                                    });
                                });
                            });
                        </script>
                        <!-- Automate Connect Default Dashboard Left Menu Section End -->
                    </div>
                </div>
                <!-- left menus section setting end -->

                <!-- center menus section setting start -->
                <div id="dash-advanced" class="sub-tabcontent" style="display: none;">
                    <!-- Advanced Settings content goes here -->
                    <div class="ac-dash-menu-sec">
                        <div id="success-message-center" style="display: none; color: green;">
                            Data saved successfully!
                        </div>
                        <!-- Loading overlay -->
                        <div id="loading-overlay-center" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 9999;">
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white;">
                                <img src="<?php echo esc_url(site_url('wp-content/plugins/automate-connect/assets/img/automate-loader.gif')); ?>" alt="Automate Dashboard Loader" width="80px">
                            </div>
                        </div>

                        <form id="dashboard-center-form" action="" method="post">
                            <div class="leftmenu-wraps">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512">
                                    <g><path d="M7.94 10s-.13-.07-.15 0C5 14 1 19.32 1 19.32v8.18A3.5 3.5 0 0 0 4.5 31h15.23S12 17 7.94 10z" fill="#3a7c78"></path>
                                    <circle cx="21.5" cy="9.5" r="1.5" fill="#3a7c78"></circle>
                                    <path d="M27.5 1h-23A3.5 3.5 0 0 0 1 4.5v11.41l5.17-7.14A2.09 2.09 0 0 1 9.69 9L22 31h5.5a3.5 3.5 0 0 0 3.5-3.5v-23A3.5 3.5 0 0 0 27.5 1zm-6 12A3.5 3.5 0 1 1 25 9.5a3.5 3.5 0 0 1-3.5 3.5z" fill="#3a7c78"></path></g>
                                </svg>
                                <h4>Dashboard Welcome Note</h4>
                            </div>
                            <div class="menu-item">
                                <label for="ac-dash-headeing">Dashboard Heading:</label>
                                <input type="text" name="ac-dash-heading-inp" id="ac-dash-headeing" placeholder="Enter Dashboard Heading" value="<?php echo esc_attr(get_option('ac_dashboard_center_heading')); ?>">
                                <label for="ac-dash-description">Dashboard Description:</label>
                                <textarea name="ac-dash-description-inp" id="ac-dash-description"><?php echo esc_textarea(get_option('ac_dashboard_center_description')); ?></textarea>
                            </div>
                            <!-- Automate Connect Dashboard center Section Menu -->
                            <div id="menu-items-center-container">
                                <?php
                                $menu_items = unserialize(get_option('ac_dashboard_center_menu_items'));
                                if ($menu_items) {
                                    foreach ($menu_items as $index => $item) {
                                        echo '<div class="menu-item" data-index="' . esc_html($index) . '">';
                                        echo '<span>Menu Name:- </span><input type="text" name="ac-center-menu-name[]" placeholder="Menu Name" value="' . esc_attr($item['name']) . '">';
                                        echo '<span>Menu Icon URL:- </span><input type="url" name="ac-center-menu-icon-url[]" placeholder="Enter menu icon URL" value="' . esc_url($item['icon']) . '">';
                                        echo '<span>Menu URL:- </span><input type="url" name="ac-center-menu-url[]" placeholder="Menu URL" value="' . esc_url($item['url']) . '">';
                                        echo '<span>Menu Description:- </span><textarea name="ac-center-menu-description[]" placeholder="Menu Description">' . esc_textarea($item['description']) . '</textarea>';
                                        echo '<button type="button" class="remove-menu-item">Remove</button>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo '<div class="menu-item" data-index="0">';
                                    echo '<span>Menu Name:- </span><input type="text" name="ac-center-menu-name[]" placeholder="Menu Name">';
                                    echo '<span>Menu Icon URL:- </span><input type="url" name="ac-center-menu-icon-url[]" placeholder="Enter menu icon URL">';
                                    echo '<span>Menu URL:- </span><input type="url" name="ac-center-menu-url[]" placeholder="Menu URL">';
                                    echo '<span>Menu Description:- </span><textarea name="ac-center-menu-description[]" placeholder="Menu Description"></textarea>';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                            <button type="button" id="add-center-menu-item">Add Menu Item</button>
                            <input class="btn" type="submit" name="ac-dash-get-data" value="Save">
                        </form>

                        <script type="text/javascript">
                            jQuery(document).ready(function($) {
                                let itemIndex = $('#menu-items-center-container .menu-item').length;

                                // Add new menu item
                                $('#add-center-menu-item').on('click', function() {
                                    const newItem = $('<div>').addClass('menu-item').attr('data-index', itemIndex).html(`
                                        <span>Menu Name:- </span><input type="text" name="ac-center-menu-name[]" placeholder="Menu Name">
                                        <span>Menu Icon URL:- </span><input type="url" name="ac-center-menu-icon-url[]" placeholder="Enter menu icon URL">
                                        <span>Menu URL:- </span><input type="url" name="ac-center-menu-url[]" placeholder="Menu URL">
                                        <span>Menu Description:- </span><textarea name="ac-center-menu-description[]" placeholder="Menu Description"></textarea>
                                        <button type="button" class="remove-menu-item">Remove</button>
                                    `);
                                    $('#menu-items-center-container').append(newItem);
                                    itemIndex++;
                                });

                                // Remove menu item
                                $('#menu-items-center-container').on('click', '.remove-menu-item', function() {
                                    $(this).parent().remove();
                                });

                                // Prevent empty form submission
                                $('#dashboard-center-form').on('submit', function(e) {
                                    e.preventDefault(); // Prevent the default form submission

                                    let valid = true;
                                    $('#menu-items-center-container .menu-item').each(function() {
                                        const name = $(this).find('input[name="ac-center-menu-name[]"]').val();
                                        const icon = $(this).find('input[name="ac-center-menu-icon-url[]"]').val();
                                        const url = $(this).find('input[name="ac-center-menu-url[]"]').val();
                                        const description = $(this).find('textarea[name="ac-center-menu-description[]"]').val();  // Adjusted for textarea
                                        if (!name || !icon || !url) {
                                            valid = false;
                                        }
                                    });

                                    if (!valid) {
                                        alert('Please fill in all menu item fields.');
                                        return;
                                    }

                                    // Show loading overlay
                                    $('#loading-overlay-center').show();

                                    // Send AJAX request
                                    $.ajax({
                                        url: ajaxurl,
                                        type: 'POST',
                                        data: {
                                            action: 'ac_save_dashboard_center_settings',
                                            nonce: '<?php echo esc_js(wp_create_nonce('save_ac_dashboard_center_settings_nonce')); ?>',
                                            'ac-dash-heading-inp': $('input[name="ac-dash-heading-inp"]').val(),
                                            'ac-dash-description-inp': $('textarea[name="ac-dash-description-inp"]').val(),
                                            'ac-center-menu-name': $('input[name="ac-center-menu-name[]"]').map(function() { return $(this).val(); }).get(),
                                            'ac-center-menu-icon-url': $('input[name="ac-center-menu-icon-url[]"]').map(function() { return $(this).val(); }).get(),
                                            'ac-center-menu-url': $('input[name="ac-center-menu-url[]"]').map(function() { return $(this).val(); }).get(),
                                            'ac-center-menu-description': $('textarea[name="ac-center-menu-description[]"]').map(function() { return $(this).val(); }).get()  // Adjusted for textarea
                                        },
                                        success: function(response) {
                                            if (response.success) {
                                                $('#success-message-center').show().delay(3000).fadeOut();
                                            } else {
                                                alert(response.data.message);
                                            }
                                        },
                                        error: function() {
                                            alert('An error occurred. Please try again.');
                                        },
                                        complete: function() {
                                            // Hide loading overlay
                                            $('#loading-overlay-center').hide();
                                        }
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
                <!-- center menus section setting end -->

                <!-- header menus section setting start -->
                <div id="dash-reports" class="sub-tabcontent" style="display: none;">
                <div class="ac-dash-menu-sec">
    <div id="success-message-header" style="display: none; color: green;">
        Data saved successfully!
    </div>
    <!-- Loading overlay -->
    <div id="loading-overlay-header" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 9999;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white;">
            <img src="<?php echo esc_url(site_url('wp-content/plugins/automate-connect/assets/img/automate-loader.gif')); ?>" alt="Automate Dashboard Loader" width="80px">
        </div>
    </div>

    <form id="dashboard-header-form" action="" method="post">
        <div class="leftmenu-wraps">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path d="M7.94 10s-.13-.07-.15 0C5 14 1 19.32 1 19.32v8.18A3.5 3.5 0 0 0 4.5 31h15.23S12 17 7.94 10z" fill="#3a7c78" opacity="1" data-original="#000000"></path><circle cx="21.5" cy="9.5" r="1.5" fill="#3a7c78" opacity="1" data-original="#000000"></circle><path d="M27.5 1h-23A3.5 3.5 0 0 0 1 4.5v11.41l5.17-7.14A2.09 2.09 0 0 1 9.69 9L22 31h5.5a3.5 3.5 0 0 0 3.5-3.5v-23A3.5 3.5 0 0 0 27.5 1zm-6 12A3.5 3.5 0 1 1 25 9.5a3.5 3.5 0 0 1-3.5 3.5z" fill="#3a7c78" opacity="1" data-original="#000000"></path></g></svg>
            <h4>Header Logo</h4>
        </div>
        <div class="menu-item">
        <label for="ac-dash-logo-url">Dashboard Logo URL:</label>
        <input type="url" name="ac-dash-logo-url" id="ac-dash-logo-url" placeholder="Enter logo URL" value="<?php echo esc_url(get_option('ac_dashboard_logo_url')); ?>">
        <label for="ac-dash-logo-link">Logo URL:</label>
        <input type="url" name="ac-dash-logo-link" id="ac-dash-logo-link" placeholder="Enter logo Link" value="<?php echo esc_url(get_option('ac_dashboard_logo_link')); ?>">
        </div>

        <!-- Ageency Connect Dashboard Header Section Menu -->
        <div id="menu-items-header-container">
            <div class="leftmenu-wraps">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#3a7c78" d="M60.7 0h117.6C211.8 0 239 27.2 239 60.7v117.9c0 33.5-27.2 60.7-60.7 60.7H60.7C27.2 239.3 0 212.1 0 178.6V60.7C0 27.2 27.2 0 60.7 0z" opacity="1" data-original="#2c5ede"></path><path fill="#529daa" d="M333.7 0h117.6C484.8 0 512 27.2 512 60.7v117.9c0 33.5-27.2 60.7-60.7 60.7H333.7c-33.5 0-60.7-27.2-60.7-60.7V60.7C273 27.2 300.2 0 333.7 0z" opacity="1" data-original="#95baf9" class=""></path><g fill="#2c5ede"><path d="M60.7 272.7h117.6c33.5 0 60.7 27.2 60.7 60.7v117.9c0 33.5-27.2 60.7-60.7 60.7H60.7C27.2 512 0 484.8 0 451.3V333.4c0-33.5 27.2-60.7 60.7-60.7zM333.7 272.7h117.6c33.5 0 60.7 27.2 60.7 60.7v117.9c0 33.5-27.2 60.7-60.7 60.7H333.7c-33.5 0-60.7-27.2-60.7-60.7V333.4c0-33.5 27.2-60.7 60.7-60.7z" fill="#3a7c78" opacity="1" data-original="#2c5ede"></path></g></g></svg>
            <h4> Header Icons Settings</h4>
        </div>
            
            <?php
            $menu_items = maybe_unserialize(get_option('ac_dashboard_header_menu_items'));
            if ($menu_items) {
                foreach ($menu_items as $index => $item) {
                    ?>
                    <div class="menu-item" data-index="<?php echo esc_attr($index); ?>">
                        <span>Menu Icon URL: </span><input type="url" name="ac-header-menu-icon-url[]" placeholder="Enter menu icon URL" value="<?php echo esc_url($item['name']); ?>">
                        <span>Menu URL: </span><input type="url" name="ac-header-menu-url[]" placeholder="Menu URL" value="<?php echo esc_url($item['icon']); ?>">
                        <button type="button" class="remove-menu-item">Remove</button>
                       
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="menu-item" data-index="0">
                    <span>Menu Icon URL: </span><input type="url" name="ac-header-menu-icon-url[]" placeholder="Enter menu icon URL">
                    <span>Menu URL: </span><input type="url" name="ac-header-menu-url[]" placeholder="Menu URL">
                    <button type="button" class="remove-menu-item">Remove</button>
                   
                </div>
                <?php
            }
            ?>
        </div>
        <button type="button" id="add-header-menu-item">Add Menu Item</button>

        <!-- Add More Section -->
        <div id="add-more-container">
            <div class="leftmenu-wraps">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><linearGradient id="a" x1="0" x2="512" y1="256" y2="256" gradientUnits="userSpaceOnUse"><stop stop-opacity="1" stop-color="#529daa" offset="0"></stop><stop stop-opacity="1" stop-color="#529daa" offset="1"></stop></linearGradient><path fill="url(#a)" d="M512 256c0 141.387-114.613 256-256 256S0 397.387 0 256 114.613 0 256 0s256 114.613 256 256zm0 0" opacity="1" data-original="url(#a)" class=""></path><g fill="#fff"><path d="M155.875 245.066c-36.871 0-66.867-29.996-66.867-66.867 0-36.87 29.996-66.867 66.867-66.867s66.867 29.996 66.867 66.867c0 36.871-29.996 66.867-66.867 66.867zm0-103.734c-20.328 0-36.867 16.54-36.867 36.867s16.539 36.867 36.867 36.867 36.867-16.539 36.867-36.867-16.539-36.867-36.867-36.867zM246.645 163.2h176.347v30H246.645zm0 0" fill="#ffffff" opacity="1" data-original="#ffffff" class=""></path><path d="M155.875 165.23c-7.148 0-12.965 5.82-12.965 12.97 0 7.148 5.817 12.964 12.965 12.964 7.152 0 12.969-5.816 12.969-12.965 0-7.148-5.817-12.969-12.969-12.969zM155.875 400.668c-36.871 0-66.867-29.996-66.867-66.867 0-36.871 29.996-66.867 66.867-66.867s66.867 29.996 66.867 66.867c0 36.87-29.996 66.867-66.867 66.867zm0-103.734c-20.328 0-36.867 16.539-36.867 36.867s16.539 36.867 36.867 36.867 36.867-16.54 36.867-36.867-16.539-36.867-36.867-36.867zM246.645 318.8h176.347v30H246.645zm0 0" fill="#ffffff" opacity="1" data-original="#ffffff" class=""></path></g></g></svg>
            <h4>Header Buttons Settings</h4>
        </div>
            
            <?php
            $button_items = maybe_unserialize(get_option('ac_dashboard_header_btn_menu_items'));
            if ($button_items) {
                foreach ($button_items as $index => $item) {
                    ?>
                    <div class="add-more-item menu-item" data-index="<?php echo esc_attr($index); ?>">
                        <span>Button Name: </span><input type="text" name="ac-more-button-name[]" placeholder="Button Name" value="<?php echo esc_html($item['name']); ?>">
                        <span>Button Link: </span><input type="url" name="ac-more-button-link[]" placeholder="Button Link" value="<?php echo esc_url($item['icon']); ?>">
                        <button type="button" class="remove-more-item">Remove</button>
                        
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="add-more-item menu-item" data-index="0">
                    <span>Button Name: </span><input type="text" name="ac-more-button-name[]" placeholder="Button Name">
                    <span>Button Link: </span><input type="url" name="ac-more-button-link[]" placeholder="Button Link">
                    <button type="button" class="remove-more-item">Remove</button>
                    
                </div>
                <?php
            }
            ?>
        </div>
        <button type="button" id="add-more-button">Add More</button>

        <input class="btn" type="submit" name="ac-dash-get-data" value="Save">
    </form>

    <!-- Automate Connect User Dashboard Setting Script -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            let itemIndex = $('#menu-items-header-container .menu-item').length;
            let moreItemIndex = $('#add-more-container .add-more-item').length;

            // Add new menu item
            $('#add-header-menu-item').on('click', function() {
                const newItem = $('<div>').addClass('menu-item').attr('data-index', itemIndex).html(`
                    <span>Menu Icon URL: </span><input type="url" name="ac-header-menu-icon-url[]" placeholder="Enter menu icon URL">
                    <span>Menu URL: </span><input type="url" name="ac-header-menu-url[]" placeholder="Menu URL">
                    <button type="button" class="remove-menu-item">Remove</button>
                    
                `);
                $('#menu-items-header-container').append(newItem);
                itemIndex++;
            });

            // Remove menu item
            $('#menu-items-header-container').on('click', '.remove-menu-item', function() {
                $(this).parent().remove();
            });

            // Add new "More" button item
            $('#add-more-button').on('click', function() {
                const newMoreItem = $('<div>').addClass('add-more-item').attr('data-index', moreItemIndex).html(`
                    <span>Button Name: </span><input type="text" name="ac-more-button-name[]" placeholder="Button Name">
                    <span>Button Link: </span><input type="url" name="ac-more-button-link[]" placeholder="Button Link">
                    <button type="button" class="remove-more-item">Remove</button>
                    
                `);
                $('#add-more-container').append(newMoreItem);
                moreItemIndex++;
            });

            // Remove "More" button item
            $('#add-more-container').on('click', '.remove-more-item', function() {
                $(this).parent().remove();
            });

            // Prevent empty form submission
            $('#dashboard-header-form').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                let valid = true;

                // Validate menu items
                $('#menu-items-header-container .menu-item').each(function() {
                    const icon = $(this).find('input[name="ac-header-menu-icon-url[]"]').val();
                    const url = $(this).find('input[name="ac-header-menu-url[]"]').val();
                    if (!icon || !url) {
                        valid = false;
                    }
                });

                // Validate "More" button items
                $('#add-more-container .add-more-item').each(function() {
                    const buttonName = $(this).find('input[name="ac-more-button-name[]"]').val();
                    const buttonLink = $(this).find('input[name="ac-more-button-link[]"]').val();
                    if (!buttonName || !buttonLink) {
                        valid = false;
                    }
                });

                if (!valid) {
                    alert('Please fill in all required fields.');
                    return;
                }

                // Show loading overlay
                $('#loading-overlay-header').show();

                // Send AJAX request
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'ac_save_dashboard_header_settings',
                        nonce: '<?php echo esc_js(wp_create_nonce('save_ac_dashboard_header_settings_nonce')); ?>',
                        'ac-dash-logo-url': $('#ac-dash-logo-url').val(),
                        'ac-dash-logo-link': $('#ac-dash-logo-link').val(),
                        'ac-header-menu-icon-url': $('input[name="ac-header-menu-icon-url[]"]').map(function() { return $(this).val(); }).get(),
                        'ac-header-menu-url': $('input[name="ac-header-menu-url[]"]').map(function() { return $(this).val(); }).get(),
                        'ac-more-button-name': $('input[name="ac-more-button-name[]"]').map(function() { return $(this).val(); }).get(),
                        'ac-more-button-link': $('input[name="ac-more-button-link[]"]').map(function() { return $(this).val(); }).get()
                    },
                    success: function(response) {
                        $('#loading-overlay-header').hide(); // Hide loading overlay
                        if (response.success) {
                            $('#success-message-header').show().delay(3000).fadeOut();
                        } else {
                            alert('There was an error saving the data.');
                        }
                    },
                    error: function() {
                        $('#loading-overlay-header').hide(); // Hide loading overlay
                        alert('There was an error with the request.');
                    }
                });
            });
        });
    </script>
</div>


                </div>
                <!-- header menus section setting end -->


        </div>
<!-- tab script with tab name get in url perameaters -->

<script type="text/javascript">
    jQuery(document).ready(function () {

        /** GHL settings on  */
        jQuery(document).on("change", "#ac_ghl_sett_chec", function(){
            if(jQuery(this).is(":checked")) {
                jQuery(".ac_ghl_container").show();
            } else {
                jQuery(".ac_ghl_container").hide();
            }
        });

        jQuery(".tablink").on("click", function () {
            var tabId = jQuery(this).data("tab");
            jQuery(".tabcontent").hide().removeClass("active");
            jQuery(".tablink").removeClass("active");
            jQuery("#" + tabId).show().addClass("active");
            jQuery(this).addClass("active");

            // Hide all sub-tabs and reset to default if needed
            if (tabId === 'ac-dash-menu') {
                jQuery("#" + tabId + " .sub-tabcontent").hide();
                jQuery("#" + tabId + " .sub-tablink").removeClass("active");
                jQuery("#dash-general").show().addClass("active");
                jQuery(".sub-tablink[data-subtab='dash-general']").addClass("active");
            } else {
                jQuery("#" + tabId + " .sub-tabcontent").hide();
                jQuery("#" + tabId + " .sub-tablink").removeClass("active");
            }
        });

        jQuery(".sub-tablink").on("click", function () {
            var subTabId = jQuery(this).data("subtab");
            var parentTabId = jQuery(this).closest(".tabcontent").attr("id");

            jQuery("#" + parentTabId + " .sub-tabcontent").hide().removeClass("active");
            jQuery("#" + parentTabId + " .sub-tablink").removeClass("active");
            jQuery("#" + subTabId).show().addClass("active");
            jQuery(this).addClass("active");
        });

        // Initial load setup
        var urlParams = new URLSearchParams(window.location.search);
        var tabFromURL = urlParams.get('tab');
        var subTabFromURL = urlParams.get('subtab');

        if (tabFromURL) {
            jQuery(".tablink[data-tab='" + tabFromURL + "']").trigger("click");
            if (subTabFromURL) {
                jQuery("#" + subTabFromURL).show().addClass("active");
                jQuery(".sub-tablink[data-subtab='" + subTabFromURL + "']").addClass("active");
            }
        } else {
            // Default to "ac-triger-cpt-set" tab if no tab is specified in URL
            jQuery("#ac-triger-cpt-set").show().addClass("active");
            jQuery(".tablink[data-tab='ac-triger-cpt-set']").addClass("active");
            
            // Default sub-tab for "Dashboard Setting" if applicable
            jQuery("#ac-dash-menu .sub-tabcontent").hide();
            jQuery("#ac-dash-menu #dash-general").show().addClass("active");
            jQuery("#ac-dash-menu .sub-tablink[data-subtab='dash-general']").addClass("active");
        }

        /** tooltip js */
        jQuery(document).on('click', '.tooltip', function(){
            jQuery(this).find('.top').toggle();
        });
        jQuery(document).on('click', '.top', function(event){
            event.stopPropagation();
        });

        // Click event for close button
        jQuery(document).on('click', '.close-tooltip', function(event){
            event.stopPropagation(); // Prevent the click from triggering the tooltip toggle
            jQuery(this).closest('.top').hide();
        });
    });
</script>



<!-- <script type="text/javascript">
   jQuery(document).ready(function () {

            /** GHL settings on  */
            jQuery(document).on("change", "#ac_ghl_sett_chec", function(){
                if(jQuery(this).is(":checked")) {
                    jQuery(".ac_ghl_container").show();
                } else {
                    jQuery(".ac_ghl_container").hide();
                }
            });

            function updateURL(tabId, subTabId) {
                var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname + '?page=automate-connect-settings';

                if (tabId) {
                    newURL += '&tab=' + tabId;
                }

                if (subTabId) {
                    newURL += '&subtab=' + subTabId;
                }

                window.history.pushState({ path: newURL }, '', newURL);
            }

            jQuery(".tablink").on("click", function () {
                var tabId = jQuery(this).data("tab");
                jQuery(".tabcontent").hide().removeClass("active");
                jQuery(".tablink").removeClass("active");
                jQuery("#" + tabId).show().addClass("active");
                jQuery(this).addClass("active");

                // Hide all sub-tabs and reset to default if needed
                if (tabId === 'ac-dash-menu') {
                    jQuery("#" + tabId + " .sub-tabcontent").hide();
                    jQuery("#" + tabId + " .sub-tablink").removeClass("active");
                    jQuery("#dash-general").show().addClass("active");
                    jQuery(".sub-tablink[data-subtab='dash-general']").addClass("active");
                } else {
                    jQuery("#" + tabId + " .sub-tabcontent").hide();
                    jQuery("#" + tabId + " .sub-tablink").removeClass("active");
                }

                updateURL(tabId);
            });

            jQuery(".sub-tablink").on("click", function () {
                var subTabId = jQuery(this).data("subtab");
                var parentTabId = jQuery(this).closest(".tabcontent").attr("id");

                jQuery("#" + parentTabId + " .sub-tabcontent").hide().removeClass("active");
                jQuery("#" + parentTabId + " .sub-tablink").removeClass("active");
                jQuery("#" + subTabId).show().addClass("active");
                jQuery(this).addClass("active");

                updateURL(jQuery(".tablink.active").data("tab"), subTabId);
            });

            // Initial load setup
            var urlParams = new URLSearchParams(window.location.search);
            var tabFromURL = urlParams.get('tab');
            var subTabFromURL = urlParams.get('subtab');

            if (tabFromURL) {
                jQuery(".tablink[data-tab='" + tabFromURL + "']").trigger("click");
                if (subTabFromURL) {
                    jQuery("#" + subTabFromURL).show().addClass("active");
                    jQuery(".sub-tablink[data-subtab='" + subTabFromURL + "']").addClass("active");
                }
            } else {
                // Default to "ac-triger-cpt-set" tab if no tab is specified in URL
                jQuery("#ac-triger-cpt-set").show().addClass("active");
                jQuery(".tablink[data-tab='ac-triger-cpt-set']").addClass("active");
                updateURL('ac-triger-cpt-set');

                // Default sub-tab for "Dashboard Setting" if applicable
                jQuery("#ac-dash-menu .sub-tabcontent").hide();
                jQuery("#ac-dash-menu #dash-general").show().addClass("active");
                jQuery("#ac-dash-menu .sub-tablink[data-subtab='dash-general']").addClass("active");
            }

            /** tooltip js */
            jQuery(document).on('click', '.tooltip', function(){
                jQuery(this).find('.top').toggle();
            });
            jQuery(document).on('click', '.top', function(event){
                event.stopPropagation();
            });

            // Click event for close button
            jQuery(document).on('click', '.close-tooltip', function(event){
                event.stopPropagation(); // Prevent the click from triggering the tooltip toggle
                jQuery(this).closest('.top').hide();
            });
    });
</script> -->
</div>