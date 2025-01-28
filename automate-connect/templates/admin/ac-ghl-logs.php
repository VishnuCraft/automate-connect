<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}
?>
<h1>Logs</h1>
<style>
   
    .mb-5 {
        margin-bottom: 5px;
    }
	.pagination .page-numbers:first-child {
		margin-left: 0px;
	}
    .ac-ghl-setting h2 {
        color: #000;
    }
	.search_user_form_wrapper {
		margin-top: 10px;
	}
	.log_data_table_wrapper {
		overflow-x: auto;
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
    margin-top: 15px; text-decoration: none;
    }
	.modal_close_btn {
		position: absolute;
		top: 5px;
		right: 10px;
		padding: 0px;
		border: none;
		line-height: 1em;
		background-color: transparent;
		font-size: 19px;
		font-weight: 600;
		cursor:pointer;
	}
    .tablink.active,.tablink:hover {
        background-color: #125166;
        border: 1px solid #125166;
    }
	.user_submit_btn {
		 background-color: #559DA8;
    border: 1px solid #559DA8;
    padding: 8px 20px 8px 20px;
    border-radius: 3px;
    text-align: center; 
    font-size: 16px;
    color: #fff;
    cursor: pointer;
    margin-top: 40px; text-decoration: none;
	}

	.user_submit_btn:hover {
		background-color: #125166;
		border-color: #125166;
	}
    .tabcontent {
        display: none;
    }
    .tabcontent.active {
        display: block;
    }
   
    
    /** overlay css for logs pop up */

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7); /* dark semi-transparent background */
        display: none;
        z-index: 999;
    }
    .modal {
		position: fixed;
		top: 40%;
		left: 50%;
		transform: translate(-50%, -50%);
		background: #fff;
		padding: 20px ;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
		z-index: 1000;
		width: 100%;
		max-width: 600px;
        border-radius: 10px;
	}
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .data-table th, .data-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .data-table th {
        background-color: #f2f2f2;
    }
    .log-data-order {
        word-break: break-all;
    }
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
    }
    .pagination a, .pagination span {
        display: block;
        padding: 10px;
        margin: 5px;
        text-decoration: none;
        color: #333;
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 4px;
        cursor: pointer;
    }
    .pagination a:hover {
        background-color: #ddd;
    }
    .pagination .current {
        background-color: #3498db;
        color: #fff;
        cursor: default;
    }
    .tabcontent.active {
        
        margin-top: 20px;
        
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
        text-decoration: none;

    }
    .user-clear-filter, .order-clear-filter, .post-clear-filter {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .user-clear-filter svg path, .order-clear-filter svg path, .post-clear-filter svg path{ fill:#fff; }

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
    .mds_main_wrapper .btn { margin-top:15px; }
    }
    @media (min-width: 769px) and (max-width: 1024px) {
    .mds_main_wrapper .row  .input-div {
    width: 60%;
    }
    }
    .tablink.vga-btn {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .tablink.vga-btn svg path{ fill: #fff; }
    .rwd-table {
    
    margin-top: 30px; 

    width: 100%;
    border-collapse: collapse;
    }
    .rwd-table a { text-decoration:none; }
    .rwd-table  thead th {
    border-top: none;
    background: #125166;
    color: #fff;
    }
    .rwd-table  thead th:first-child { border-top-left-radius:4px; }
    .rwd-table  thead th:last-child { border-top-right-radius:4px; }
    .rwd-table.ttwo tr:first-child {
    border-top: none;
    background:#063853;
    color: #fff;
    }
    .rwd-table.three-table tr:first-child {
    border-top: none;
    background:#316BA0;
    color: #fff;
    }
    .rwd-table tr {
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    background-color: #f0f0f0;
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
    .rwd-table tr:last-child  { border-bottom:none; }
    @media screen and (max-width: 1400px) {
    .table-wrap {
        overflow-x: scroll;

    }
    }
    .trg {
        border: 1px solid #125166;
        border-radius: 4px; 
        padding: 3px;
        background-color: #125166;
        cursor: pointer;
        display: flex;
        align-items: center;
        width: 30px;
        justify-content: center;
    }
</style>
<div class="mds_main_wrapper">
    <div class="ac-ghl-se-tab">
        <div class="row">
        <?php
        $order_page_url = admin_url('admin.php?page=automate-connect-logs&tab=ac-order-sub-tab');
        $user_page_url = admin_url('admin.php?page=automate-connect-logs&tab=ac-user-create-tab');
        $posts_page_url = admin_url('admin.php?page=automate-connect-logs&tab=ac-post-save-tab');
        $event_atte_page_url = admin_url('admin.php?page=automate-connect-logs&tab=ac-event-attendees-tab');
        if (is_plugin_active('woocommerce/woocommerce.php')) {
        ?>
        <button class="tablink" data-tab="ac-order-sub-tab" onclick="location.href='<?php echo esc_url($order_page_url); ?>'">Orders & Subscriptions Logs</button>
        <?php }else
        {
            echo '';
        }?>
        <button class="tablink vga-btn" data-tab="ac-user-create-tab" onclick="location.href='<?php echo esc_url($user_page_url); ?>'"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 460.8 460.8" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M230.432 239.282c65.829 0 119.641-53.812 119.641-119.641C350.073 53.812 296.261 0 230.432 0s-119.64 53.812-119.64 119.641 53.812 119.641 119.64 119.641zM435.755 334.89c-3.135-7.837-7.314-15.151-12.016-21.943-24.033-35.527-61.126-59.037-102.922-64.784-5.224-.522-10.971.522-15.151 3.657-21.943 16.196-48.065 24.555-75.233 24.555s-53.29-8.359-75.233-24.555c-4.18-3.135-9.927-4.702-15.151-3.657-41.796 5.747-79.412 29.257-102.922 64.784-4.702 6.792-8.882 14.629-12.016 21.943-1.567 3.135-1.045 6.792.522 9.927 4.18 7.314 9.404 14.629 14.106 20.898 7.314 9.927 15.151 18.808 24.033 27.167 7.314 7.314 15.673 14.106 24.033 20.898 41.273 30.825 90.906 47.02 142.106 47.02s100.833-16.196 142.106-47.02c8.359-6.269 16.718-13.584 24.033-20.898 8.359-8.359 16.718-17.241 24.033-27.167 5.224-6.792 9.927-13.584 14.106-20.898 2.611-3.135 3.133-6.793 1.566-9.927z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg><span>User Created & Updated Logs</span></button>
        <button class="tablink vga-btn" data-tab="ac-post-save-tab" onclick="location.href='<?php echo esc_url($posts_page_url); ?>'"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M7.85 24C5.73 24 4 25.746 4 27.869V44.13C4 46.253 5.73 48 7.85 48h34.3c2.12 0 3.85-1.747 3.85-3.87V27.87c0-2.123-1.73-3.87-3.85-3.87zM11 30a1 1 0 0 1 1 1v9h5a1 1 0 0 1 1 1 1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1V31a1 1 0 0 1 1-1zm13.5 0c2.475 0 4.5 2.024 4.5 4.5v3c0 2.475-2.025 4.5-4.5 4.5a4.512 4.512 0 0 1-4.5-4.5v-3c0-2.476 2.024-4.5 4.5-4.5zm11 0c1.318 0 2.517.57 3.34 1.478a1 1 0 0 1-.073 1.412 1 1 0 0 1-1.412-.07A2.477 2.477 0 0 0 35.5 32a2.473 2.473 0 0 0-2.5 2.5v3c0 1.402 1.097 2.5 2.5 2.5 1.402 0 2.5-1.098 2.5-2.5V37h-2a1 1 0 0 1-1-1 1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v1.5c0 2.475-2.025 4.5-4.5 4.5a4.512 4.512 0 0 1-4.5-4.5v-3c0-2.476 2.024-4.5 4.5-4.5zm-11 2a2.473 2.473 0 0 0-2.5 2.5v3c0 1.402 1.097 2.5 2.5 2.5 1.402 0 2.5-1.098 2.5-2.5v-3c0-1.403-1.098-2.5-2.5-2.5z" fill="#529daa" opacity="1" data-original="#000000" class=""></path><path d="M23 4c-2.753 0-5 2.247-5 5v13h24.15c3.218 0 5.85 2.66 5.85 5.869V44.13c0 3.21-2.632 5.87-5.85 5.87H18v5c0 2.752 2.247 5 5 5h32c2.752 0 5-2.248 5-5V20H48c-2.2 0-4-1.802-4-4V4zm23 .47V16c0 1.125.874 2 2 2h11.337a3.524 3.524 0 0 0-.33-.407L46.714 5.007A3.281 3.281 0 0 0 46 4.47z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg><span>All Post Type Logs</span></button>
        <?php
        if (is_plugin_active('the-events-calendar/the-events-calendar.php')) {
        ?>
        <button class="tablink" data-tab="ac-att-save-tab" onclick="location.href='<?php echo esc_url($event_atte_page_url); ?>'">Attendees Logs</button>
        <?php }?>
    </div>
        <!-- Order & Subscription -->
        <?php
        if (is_plugin_active('woocommerce/woocommerce.php')) {
        ?>
		<div id="ac-order-sub-tab" class="tabcontent" style="display: none;">
        <div class="mb-5 pb=2 ac-ghl-setting"><h2>Orders & Subscriptions Logs</h2></div>
            <?php /*
                global $wpdb;
                $table_name = $wpdb->prefix . 'ac_order_sub_log';

                $per_page = 50;
                $offset = 0;
                $current_page = isset($_GET['paged']) ? absint($_GET['paged']) : 1;

                if (intval($current_page) && $current_page > 1) {
                    $offset = ($current_page - 1) * $per_page;
                }

                $sql = "SELECT * FROM $table_name ORDER BY id DESC LIMIT $offset, $per_page";
                
                $sqlp = "SELECT id FROM $table_name";

                if (isset($_POST['submit'])) {
                    $email_filter = isset($_POST['ac_email']) ? sanitize_text_field(wp_unslash($_POST['ac_email'])) : '';
                    $sql = '';
                    if (!empty($email_filter)) {
                        $sql = "SELECT * FROM $table_name WHERE email LIKE '%" . $email_filter . "%' ORDER BY id DESC";
                    }
                    $sqlp = "SELECT * FROM $table_name WHERE email LIKE '%" . $email_filter . "%' ORDER BY id DESC LIMIT $per_page OFFSET $offset";
                }

                $order_results = $wpdb->get_results($sql, ARRAY_A);
                $total_records = $wpdb->get_results($sqlp);
                */

                global $wpdb;
                $table_name = $wpdb->prefix . 'ac_order_sub_log';

                $per_page = 50;
                $offset = 0;
                $current_page = isset($_GET['paged']) ? absint($_GET['paged']) : 1;

                if (intval($current_page) && $current_page > 1) {
                    $offset = ($current_page - 1) * $per_page;
                }

                $sql = "SELECT * FROM $table_name ORDER BY id DESC LIMIT %d, %d";
                $sqlp = "SELECT COUNT(id) FROM $table_name";

                if (isset($_POST['submit'])) {
                    $email_filter = isset($_POST['ac_email']) ? sanitize_text_field(wp_unslash($_POST['ac_email'])) : '';
                    if (!empty($email_filter)) {
                        $sql = "SELECT * FROM $table_name WHERE email LIKE %s ORDER BY id DESC LIMIT %d, %d";
                        $sqlp = "SELECT COUNT(id) FROM $table_name WHERE email LIKE %s";
                    }
                }

                $query = $wpdb->prepare($sql, '%' . $wpdb->esc_like($email_filter) . '%', $offset, $per_page);
                $order_results = $wpdb->get_results($query, ARRAY_A);

                $total_records_query = $wpdb->prepare($sqlp, '%' . $wpdb->esc_like($email_filter) . '%');
                $total_records = $wpdb->get_var($total_records_query);
            ?>

          <div class="search_user_form_wrapper">
            <form method="POST" action="">
                <div class="row">
                    <div class="automate_option_tooltip_content_main">
                        <label for="ac_email">Search by Email:</label>
                    </div>
                    <div class="input-div">
                        <input type="text" name="ac_email" id="ac_email" value="<?php echo isset($_POST['ac_email']) ? esc_attr(sanitize_text_field(wp_unslash($_POST['ac_email']))) : ''; ?>">
                    </div>
                </div>
        <div class="row">
                <input type="submit" name="submit" value="Search" class="user_submit_btn btn">
                <a cl href="<?php echo esc_url(admin_url('admin.php?page=automate-connect-logs&tab=ac-order-sub-tab')); ?>" class="order-clear-filter btn"><svg width="20" height="20" id="fi_15847429" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m31.91.58a1 1 0 0 0 -.91-.58h-30a1 1 0 0 0 -.76 1.65l11.76 13.72v11.63a1 1 0 0 0 .45.83l6 4a1 1 0 0 0 1.55-.83v-15.63l11.76-13.72a1 1 0 0 0 .15-1.07zm-10.91 5.42h-10a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2z" fill="#414042"></path></svg>Clear Filter</a>
            </div>
            </form>
          </div>
            <?php if (!empty($order_results)) { ?>
                <div class="table-wrap">
                <table width="100%" class="ac-log-data-table rwd-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Order ID</th>
                            <th>Subscription ID</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i ='1';
                        foreach ($order_results as $order_result) { ?>
                            <tr>
                                <td><?php echo esc_html($i++); ?></td>
                                <td>
                                    <?php if (!empty($order_result['order_id'])): ?><a href="<?php echo esc_url(admin_url('post.php?post=' . $order_result['order_id'] . '&action=edit')); ?>" target="_blank"><?php echo esc_html($order_result['order_id']); ?></a><?php else: ?>N/A<?php endif; ?>
                                </td>
                                <td>
                                    <?php if (!empty($order_result['subscription_id'])): ?><a href="<?php echo esc_url(admin_url('post.php?post=' . $order_result['subscription_id'] . '&action=edit')); ?>" target="_blank"><?php echo esc_html($order_result['subscription_id']); ?></a><?php else: ?>N/A<?php endif; ?>
                                </td>
                                <td><?php echo !empty($order_result['email']) ? esc_html($order_result['email']) : 'N/A'; ?></td>
                                <td><?php echo !empty($order_result['first_name']) ? esc_html($order_result['first_name']) : 'N/A'; ?></td>
                                <td><?php echo !empty($order_result['add_date']) ? esc_html($order_result['add_date']) : 'N/A'; ?></td>
                                <td><a class="trg"  href="javascript:void(0);" onclick="showPopup('<?php echo esc_js($order_result['id']); ?>', '<?php echo esc_js($order_result['order_id']); ?>', '<?php echo esc_js($order_result['subscription_id']); ?>', '<?php echo esc_js($order_result['user_id']); ?>', '<?php echo esc_js($order_result['email']); ?>', '<?php echo esc_js($order_result['order_name']); ?>', '<?php echo esc_js($order_result['first_name']); ?>', '<?php echo esc_js($order_result['last_name']); ?>', '<?php echo esc_js($order_result['order_status']); ?>', '<?php echo esc_js($order_result['add_date']); ?>', '<?php echo esc_js($order_result['edit_date']); ?>', '<?php echo esc_js($order_result['trigger_status']); ?>', '<?php echo esc_js($order_result['trigger_type']); ?>')"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g data-name="Layer 2"><path d="M12 18.53a11.71 11.71 0 0 1-7.44-2.65l-3.09-2.53a1.74 1.74 0 0 1 0-2.7l3.09-2.53a11.78 11.78 0 0 1 14.88 0l3.09 2.53a1.74 1.74 0 0 1 0 2.7l-3.09 2.53A11.69 11.69 0 0 1 12 18.53zM12 7a10.22 10.22 0 0 0-6.49 2.28l-3.09 2.53a.25.25 0 0 0 0 .38l3.09 2.53a10.27 10.27 0 0 0 13 0l3.09-2.53a.25.25 0 0 0 0-.38l-3.11-2.53A10.24 10.24 0 0 0 12 7z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M12 18.25A6.25 6.25 0 1 1 18.25 12 6.25 6.25 0 0 1 12 18.25zm0-11A4.75 4.75 0 1 0 16.75 12 4.75 4.75 0 0 0 12 7.25z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M15 12a3 3 0 1 1-2.2-2.89 1.47 1.47 0 0 0-.3.89 1.5 1.5 0 0 0 1.5 1.5 1.47 1.47 0 0 0 .89-.3 3 3 0 0 1 .11.8z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></g></svg></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
                <?php
                /** Pagination for order subscription logs */
                $total_rec  = count($total_records);
                $total_pages = ceil($total_rec / $per_page);
                $pagination_order = paginate_links(array(
                    'base'      =>	add_query_arg('paged','%#%'),
                    'format' 	=>	'?paged=%#%',
                    'current' 	=>	$current_page,
                    'total' 	=>	$total_pages,
                    'next_text' =>	'&raquo',
                    'prev_text' =>	'&laquo'
                ));


                if ($pagination_order) {
                    echo '<div class="pagination">' . esc_html($pagination_order) . '</div>';
                }
                ?>
            <?php } else { ?>
                <p>No data found.</p>
            <?php } ?>
        </div>
        <?php }else
        {
            echo'';
        }?>
        <!-- User Create & Update -->
        <div id="ac-user-create-tab" class="tabcontent" style="display: none;">
        <div class="form-header">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M32 464V48c0-8.837 7.163-16 16-16h240v64c0 17.673 14.327 32 32 32h64v48h32v-64a15.997 15.997 0 0 0-4.64-11.36l-96-96A16.001 16.001 0 0 0 304 0H48C21.49 0 0 21.491 0 48v416c0 26.51 21.49 48 48 48h112v-32H48c-8.836 0-16-7.163-16-16zM480 320h-32v32h32v32h-64v-96h96c0-17.673-14.327-32-32-32h-64c-17.673 0-32 14.327-32 32v96c0 17.673 14.327 32 32 32h64c17.673 0 32-14.327 32-32v-32c0-17.673-14.327-32-32-32z" fill="#529daa" opacity="1" data-original="#000000"></path><path d="M304 256c-35.346 0-64 28.654-64 64v32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64v-32c0-35.346-28.654-64-64-64zm32 96c0 17.673-14.327 32-32 32-17.673 0-32-14.327-32-32v-32c0-17.673 14.327-32 32-32 17.673 0 32 14.327 32 32v32zM160 256h-32v144c0 8.837 7.163 16 16 16h80v-32h-64V256z" fill="#529daa" opacity="1" data-original="#000000"></path></g></svg>
            <h2>User Created & Updated Logs</h2></div>
        <?php
            /*
            global $wpdb;
            $table_name = $wpdb->prefix . 'ac_user_add_update_log';

            $per_page = 50;
            $offset = 0;
            $current_page = isset($_GET['paged']) ? absint($_GET['paged']) : 1;

            if (intval($current_page) && $current_page > 1) {
                $offset = ($current_page - 1) * $per_page;
            }

            $sql = "SELECT * FROM $table_name ORDER BY id DESC LIMIT $offset, $per_page";
            $sqlp = "SELECT id FROM $table_name";

            if (isset($_POST['user_submit'])) {
                $email_filter = isset($_POST['ac_user_email']) ? sanitize_text_field(wp_unslash($_POST['ac_user_email'])) : '';
                $sql = '';
                if (!empty($email_filter)) {
                    $sql = "SELECT * FROM $table_name WHERE email LIKE '%" . $email_filter . "%' ORDER BY id DESC";
                }
                $sqlp = "SELECT * FROM $table_name WHERE email LIKE '%" . $email_filter . "%' ORDER BY id DESC LIMIT $per_page OFFSET $offset";
            }

            $users_results = $wpdb->get_results($sql, ARRAY_A);
            $total_records = $wpdb->get_results($sqlp);
            */

            global $wpdb;
            $table_name = $wpdb->prefix . 'ac_user_add_update_log';
            
            $per_page = 50;
            $offset = 0;
            $current_page = isset($_GET['paged']) ? absint($_GET['paged']) : 1;
            
            if (intval($current_page) && $current_page > 1) {
                $offset = ($current_page - 1) * $per_page;
            }
            
            $query = $wpdb->prepare("SELECT * FROM $table_name ORDER BY id DESC LIMIT %d, %d", $offset, $per_page);

            $total_records_query = $wpdb->prepare("SELECT COUNT(id) FROM $table_name");
            
            if (isset($_POST['user_submit'])) {
                $email_filter = isset($_POST['ac_user_email']) ? sanitize_text_field(wp_unslash($_POST['ac_user_email'])) : '';
                if (!empty($email_filter)) {

                    $query = $wpdb->prepare( "SELECT * FROM $table_name WHERE email LIKE %s ORDER BY id DESC LIMIT %d, %d", 
                        '%' . $wpdb->esc_like($email_filter) . '%',
                        $offset,
                        $per_page
                    );
                    
                    $total_records_query = $wpdb->prepare("SELECT COUNT(id) FROM $table_name WHERE email LIKE %s" , '%' . $wpdb->esc_like($email_filter) . '%');
                }
            }
            
            $users_results = $wpdb->get_results($query, ARRAY_A);
            
            $total_records = $wpdb->get_var($total_records_query);
            
            ?>
            <div class="search_user_form_wrapper">
                <form method="POST" action="">
                    <div class="row">
                        <div class="automate_option_tooltip_content_main">
                    <label for="ac_user_email">Search by Email:</label>
                </div>
                <div class="input-div">
                    <input type="text" name="ac_user_email" id="ac_user_email" value="<?php echo isset($_POST['ac_user_email']) ? esc_attr(sanitize_text_field(wp_unslash($_POST['ac_user_email']))) : ''; ?>">
                </div>
            </div>
            <div class="row">
                    <input type="submit" name="user_submit" value="Search" class="user_submit_btn btn">
                    <a  href="<?php echo esc_url(admin_url('admin.php?page=automate-connect-logs&tab=ac-user-create-tab')); ?>" class="user-clear-filter btn"><svg width="20" height="20" id="fi_15847429" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m31.91.58a1 1 0 0 0 -.91-.58h-30a1 1 0 0 0 -.76 1.65l11.76 13.72v11.63a1 1 0 0 0 .45.83l6 4a1 1 0 0 0 1.55-.83v-15.63l11.76-13.72a1 1 0 0 0 .15-1.07zm-10.91 5.42h-10a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2z" fill="#414042"></path></svg><span>Clear Filter</span></a>
                </div>
                </form>
            </div>
            <?php if (!empty($users_results)) { ?>
                <div class="table-wrap">
                <table width="100%" class="ac-log-data-table rwd-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>User ID</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i ='1';
                        foreach ($users_results as $users_result) { ?>
                            <tr>
                            <td><?php echo esc_html($i++); ?></td>
                            <td>
                                <?php $user_id = !empty($users_result['user_id']) ? esc_html($users_result['user_id']) : 'N/A'; $editUserLink = admin_url('user-edit.php?user_id=' . $user_id); ?><a href="<?php echo esc_url($editUserLink); ?>" target="_blank"><?php echo esc_html($user_id); ?></a>
                            </td>
                            <td><?php echo !empty($users_result['email']) ? esc_html($users_result['email']) : 'N/A'; ?></td>
                            <td><?php echo !empty($users_result['first_name']) ? esc_html($users_result['first_name']) : 'N/A'; ?></td>
                            <td><?php echo !empty($users_result['add_date']) ? esc_html($users_result['add_date']) : 'N/A'; ?></td>
                            <td><a class="trg"  href="javascript:void(0);" onclick="showPopup_user('<?php echo esc_js($users_result['id']); ?>', '<?php echo esc_js($users_result['user_id']); ?>', '<?php echo esc_js($users_result['email']); ?>', '<?php echo esc_js($users_result['first_name']); ?>', '<?php echo esc_js($users_result['last_name']); ?>', '<?php echo esc_js($users_result['add_date']); ?>', '<?php echo esc_js($users_result['edit_date']); ?>', '<?php echo esc_js($users_result['trigger_status']); ?>', '<?php echo esc_js($users_result['trigger_type']); ?>')"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g data-name="Layer 2"><path d="M12 18.53a11.71 11.71 0 0 1-7.44-2.65l-3.09-2.53a1.74 1.74 0 0 1 0-2.7l3.09-2.53a11.78 11.78 0 0 1 14.88 0l3.09 2.53a1.74 1.74 0 0 1 0 2.7l-3.09 2.53A11.69 11.69 0 0 1 12 18.53zM12 7a10.22 10.22 0 0 0-6.49 2.28l-3.09 2.53a.25.25 0 0 0 0 .38l3.09 2.53a10.27 10.27 0 0 0 13 0l3.09-2.53a.25.25 0 0 0 0-.38l-3.11-2.53A10.24 10.24 0 0 0 12 7z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M12 18.25A6.25 6.25 0 1 1 18.25 12 6.25 6.25 0 0 1 12 18.25zm0-11A4.75 4.75 0 1 0 16.75 12 4.75 4.75 0 0 0 12 7.25z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M15 12a3 3 0 1 1-2.2-2.89 1.47 1.47 0 0 0-.3.89 1.5 1.5 0 0 0 1.5 1.5 1.47 1.47 0 0 0 .89-.3 3 3 0 0 1 .11.8z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></g></svg></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
                <?php
                /** Pagination for user create and user update logs */
                $total_rec  = count($total_records);
                $total_pages = ceil($total_rec / $per_page);
                $pagination_order = paginate_links(array(
                    'base'      =>	add_query_arg('paged','%#%'),
                    'format' 	=>	'?paged=%#%',
                    'current' 	=>	$current_page,
                    'total' 	=>	$total_pages,
                    'next_text' =>	'&raquo',
                    'prev_text' =>	'&laquo'
                ));


                if ($pagination_order) {
                    echo '<div class="pagination">' . esc_html($pagination_order) . '</div>';
                }
                ?>
            <?php } else { ?>
                <p>No data found.</p>
            <?php } ?>
        </div>

        <!-- Posts -->
        <div id="ac-post-save-tab" class="tabcontent" style="display: none;">
        <div class="mb-5 pb=2 ac-ghl-setting">
            <div class="form-header">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M7.85 24C5.73 24 4 25.746 4 27.869V44.13C4 46.253 5.73 48 7.85 48h34.3c2.12 0 3.85-1.747 3.85-3.87V27.87c0-2.123-1.73-3.87-3.85-3.87zM11 30a1 1 0 0 1 1 1v9h5a1 1 0 0 1 1 1 1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1V31a1 1 0 0 1 1-1zm13.5 0c2.475 0 4.5 2.024 4.5 4.5v3c0 2.475-2.025 4.5-4.5 4.5a4.512 4.512 0 0 1-4.5-4.5v-3c0-2.476 2.024-4.5 4.5-4.5zm11 0c1.318 0 2.517.57 3.34 1.478a1 1 0 0 1-.073 1.412 1 1 0 0 1-1.412-.07A2.477 2.477 0 0 0 35.5 32a2.473 2.473 0 0 0-2.5 2.5v3c0 1.402 1.097 2.5 2.5 2.5 1.402 0 2.5-1.098 2.5-2.5V37h-2a1 1 0 0 1-1-1 1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v1.5c0 2.475-2.025 4.5-4.5 4.5a4.512 4.512 0 0 1-4.5-4.5v-3c0-2.476 2.024-4.5 4.5-4.5zm-11 2a2.473 2.473 0 0 0-2.5 2.5v3c0 1.402 1.097 2.5 2.5 2.5 1.402 0 2.5-1.098 2.5-2.5v-3c0-1.403-1.098-2.5-2.5-2.5z" fill="#529daa" opacity="1" data-original="#000000" class=""></path><path d="M23 4c-2.753 0-5 2.247-5 5v13h24.15c3.218 0 5.85 2.66 5.85 5.869V44.13c0 3.21-2.632 5.87-5.85 5.87H18v5c0 2.752 2.247 5 5 5h32c2.752 0 5-2.248 5-5V20H48c-2.2 0-4-1.802-4-4V4zm23 .47V16c0 1.125.874 2 2 2h11.337a3.524 3.524 0 0 0-.33-.407L46.714 5.007A3.281 3.281 0 0 0 46 4.47z" fill="#529daa" opacity="1" data-original="#000000" class=""></path></g></svg>
                   <h2>All Posts Type Logs</h2>
            </div>
        </div>
        <?php
            global $wpdb;
            $table_name = $wpdb->prefix . 'ac_posts_log';

            $per_page = 50;
            $offset = 0;
            $current_page = isset($_GET['paged']) ? absint($_GET['paged']) : 1;

            if (intval($current_page) && $current_page > 1) {
                $offset = ($current_page - 1) * $per_page;
            }

            $sql = "SELECT * FROM $table_name ORDER BY id DESC LIMIT $offset, $per_page";
            $sqlp = "SELECT id FROM $table_name";

            if (isset($_POST['post_submit'])) {
                $email_filter = isset($_POST['ac_post_user_email']) ? sanitize_text_field(wp_unslash($_POST['ac_post_user_email'])) : '';
                $sql = '';
                if (!empty($email_filter)) {
                    $sql = "SELECT * FROM $table_name WHERE email LIKE '%" . $email_filter . "%' ORDER BY id DESC";
                }
                $sqlp = "SELECT * FROM $table_name WHERE email LIKE '%" . $email_filter . "%' ORDER BY id DESC LIMIT $per_page OFFSET $offset";
            }

            $posts_results = $wpdb->get_results($sql, ARRAY_A);
            $total_records = $wpdb->get_results($sqlp);
            ?>
            <div class="search_user_form_wrapper">
            <form method="POST" action="">
                <div class="row">
                    <div class="automate_option_tooltip_content_main">
                <label for="ac_post_user_email">Search by Email:</label>
            </div>
                <div class="input-div">
                    <input type="text" name="ac_post_user_email" id="ac_post_user_email" value="<?php echo isset($_POST['ac_post_user_email']) ? esc_attr(sanitize_email(wp_unslash($_POST['ac_post_user_email']))) : ''; ?>">
                </div>
            </div>
            <div class="row">
                <input type="submit" name="post_submit" value="Search" class="user_submit_btn btn">
                <a href="<?php echo esc_url(admin_url('admin.php?page=automate-connect-logs&tab=ac-post-save-tab')); ?>" class="post-clear-filter btn"><svg width="20" height="20" id="fi_15847429" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m31.91.58a1 1 0 0 0 -.91-.58h-30a1 1 0 0 0 -.76 1.65l11.76 13.72v11.63a1 1 0 0 0 .45.83l6 4a1 1 0 0 0 1.55-.83v-15.63l11.76-13.72a1 1 0 0 0 .15-1.07zm-10.91 5.42h-10a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2z" fill="#414042"></path></svg><span>Clear Filter</span></a>
            </div>
            </form>
            </div>

            <?php

            if (!empty($posts_results)) { ?>
                <div class="table-wrap">
                <table width="100%" class="ac-log-data-table rwd-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Post ID</th>
                            <th>Email</th>
                            <th>Post Title</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i ='1';
                        foreach ($posts_results as $posts_result) {
                                $single_post_url = get_permalink($posts_result['post_id']);
                            ?>
                            <tr>
                            <td><?php echo esc_html($i++); ?></td>
                            <td>
                                <?php if (!empty($posts_result['post_id'])): ?><a href="<?php echo esc_url(admin_url('post.php?post=' . $posts_result['post_id'] . '&action=edit')); ?>" target="_blank"><?php echo esc_html($posts_result['post_id']); ?></a><?php else: ?>N/A<?php endif; ?>
                            </td>
                            <td><?php echo !empty($posts_result['email']) ? esc_html($posts_result['email']) : 'N/A'; ?></td>
                            <td>
                                <?php if (!empty($posts_result['post_title'])): ?><a href="<?php echo esc_url(get_permalink($posts_result['post_id'])); ?>"target="_blank"><?php echo esc_html($posts_result['post_title']); ?></a><?php else: ?>N/A<?php endif; ?>
                            </td>
                            <td><?php echo !empty($posts_result['add_date']) ? esc_html($posts_result['add_date']) : 'N/A'; ?></td>
                            <td><a class="trg" href="javascript:void(0);" onclick="showPopup_post('<?php echo esc_js($posts_result['id']); ?>', '<?php echo esc_js($posts_result['post_id']); ?>', '<?php echo esc_js($posts_result['email']); ?>','<?php echo esc_js($posts_result['post_title']); ?>', '<?php echo esc_js($posts_result['add_date']); ?>', '<?php echo esc_js($posts_result['edit_date']); ?>', '<?php echo esc_js($posts_result['trigger_status']); ?>', '<?php echo esc_js($posts_result['trigger_type']); ?>','<?php echo esc_js($posts_result['post_type']); ?>','<?php echo esc_js($single_post_url); ?>')"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g data-name="Layer 2"><path d="M12 18.53a11.71 11.71 0 0 1-7.44-2.65l-3.09-2.53a1.74 1.74 0 0 1 0-2.7l3.09-2.53a11.78 11.78 0 0 1 14.88 0l3.09 2.53a1.74 1.74 0 0 1 0 2.7l-3.09 2.53A11.69 11.69 0 0 1 12 18.53zM12 7a10.22 10.22 0 0 0-6.49 2.28l-3.09 2.53a.25.25 0 0 0 0 .38l3.09 2.53a10.27 10.27 0 0 0 13 0l3.09-2.53a.25.25 0 0 0 0-.38l-3.11-2.53A10.24 10.24 0 0 0 12 7z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M12 18.25A6.25 6.25 0 1 1 18.25 12 6.25 6.25 0 0 1 12 18.25zm0-11A4.75 4.75 0 1 0 16.75 12 4.75 4.75 0 0 0 12 7.25z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M15 12a3 3 0 1 1-2.2-2.89 1.47 1.47 0 0 0-.3.89 1.5 1.5 0 0 0 1.5 1.5 1.47 1.47 0 0 0 .89-.3 3 3 0 0 1 .11.8z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></g></svg></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
                <?php
                /** Pagination for all post type logs */
                $total_rec  = count($total_records);
                $total_pages = ceil($total_rec / $per_page);
                $pagination_order = paginate_links(array(
                    'base'      =>	add_query_arg('paged','%#%'),
                    'format' 	=>	'?paged=%#%',
                    'current' 	=>	$current_page,
                    'total' 	=>	$total_pages,
                    'next_text' =>	'&raquo',
                    'prev_text' =>	'&laquo'
                ));


                if ($pagination_order) {
                    echo '<div class="pagination">' . esc_html($pagination_order) . '</div>';
                }
                ?>
            <?php } else { ?>
                <p>No data found.</p>
            <?php } ?>
        </div>
        <?php
        if (is_plugin_active('the-events-calendar/the-events-calendar.php')) {
        ?>
        <div id="ac-att-save-tab" class="tabcontent" style="display: none;">
            <div class="mb-5 pb=2 ac-ghl-setting"><h2>Attendees Logs</h2></div>
                <?php
                    global $wpdb;
                    $table_name = $wpdb->prefix . 'ac_atte_log';

                    $per_page = 50;
                    $offset = 0;
                    $current_page = isset($_GET['paged']) ? absint($_GET['paged']) : 1;

                    if (intval($current_page) && $current_page > 1) {
                        $offset = ($current_page - 1) * $per_page;
                    }

                    $sql = "SELECT * FROM $table_name ORDER BY id DESC LIMIT $offset, $per_page";
                    $sqlp = "SELECT id FROM $table_name";

                    if (isset($_POST['submit'])) {
                        $email_filter = isset($_POST['ac_att_email']) ? sanitize_text_field(wp_unslash($_POST['ac_att_email'])) : '';
                        $sql = '';
                        if (!empty($email_filter)) {
                            $sql = "SELECT * FROM $table_name WHERE attendee_email LIKE '%" . $email_filter . "%' ORDER BY id DESC";
                        }
                        $sqlp = "SELECT * FROM $table_name WHERE attendee_email LIKE '%" . $email_filter . "%' ORDER BY id DESC LIMIT $per_page OFFSET $offset";
                    }

                    $attendees_results = $wpdb->get_results($sql, ARRAY_A);
                    $att_total_records = $wpdb->get_results($sqlp);
                    ?>
                    <div class="search_user_form_wrapper">
                        <form method="POST" action="">
                            <label for="ac_att_email">Search by Email:</label>
                            <input type="text" name="ac_att_email" id="ac_att_email" value="<?php echo isset($_POST['ac_att_email']) ? esc_attr(sanitize_email(wp_unslash($_POST['ac_att_email']))) : ''; ?>">
                            <input type="submit" name="submit" value="Search" class="user_submit_btn">
                            <a href="<?php echo esc_url(admin_url('admin.php?page=automate-connect-logs&tab=ac-att-save-tab')); ?>" class="atte-clear-filter">Clear Filter</a>
                        </form>
                    </div>

                    <?php if (!empty($attendees_results)) { ?>
                        <div class="table-wrap">
                        <table width="100%" class="ac-log-data-table rwd-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Event ID</th>
                                    <th>Order ID</th>
                                    <th>Attendee Name</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i ='1';
                                foreach ($attendees_results as $attendees_result) {
                                        $single_event_url = get_permalink($attendees_result['event_id']);

                                    ?>
                                    <tr>
                                        <td><?php echo esc_html($i++); ?></td>
                                        <td>
                                            <?php if (!empty($attendees_result['event_id'])): ?><a href="<?php echo esc_url(admin_url('post.php?post=' . $attendees_result['event_id'] . '&action=edit')); ?>" target="_blank"><?php echo esc_html($attendees_result['event_id']); ?></a><?php else: ?>N/A<?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($attendees_result['order_id'])): ?><a href="<?php echo esc_url(admin_url('post.php?post=' . $attendees_result['order_id'] . '&action=edit')); ?>" target="_blank"><?php echo esc_html($attendees_result['order_id']); ?></a><?php else: ?>N/A<?php endif; ?>
                                        </td>
                                        <td><?php echo !empty($attendees_result['attendee_name']) ? esc_html($attendees_result['attendee_name']) : 'N/A'; ?></td>
                                        <td><?php echo !empty($attendees_result['attendee_email']) ? esc_html($attendees_result['attendee_email']) : 'N/A'; ?></td>
                                        <td>
                                        <?php if (!empty($attendees_result['event_name'])): ?><a href="<?php echo esc_url(get_permalink($attendees_result['event_id'])); ?>" target="_blank"><?php echo esc_html($attendees_result['event_name']); ?></a><?php else: ?>N/A<?php endif; ?>
                                        </td>
                                        <td><?php echo !empty($attendees_result['add_date']) ? esc_html($attendees_result['add_date']) : 'N/A'; ?></td>
                                        <td><a class="trg" href="javascript:void(0);" onclick="acshowPopup('<?php echo esc_js($attendees_result['id']); ?>', '<?php echo esc_js($attendees_result['event_id']); ?>', '<?php echo esc_js($attendees_result['order_id']); ?>','<?php echo esc_js($attendees_result['attendee_name']); ?>', '<?php echo esc_js($attendees_result['attendee_email']); ?>', '<?php echo esc_js($attendees_result['event_name']); ?>', '<?php echo esc_js($attendees_result['attendee_mobile']); ?>', '<?php echo esc_js($attendees_result['add_date']); ?>','<?php echo esc_js($attendees_result['edit_date']); ?>', '<?php echo esc_js($attendees_result['trigger_status']); ?>', '<?php echo esc_js($attendees_result['trigger_type']); ?>', '<?php echo esc_js($single_event_url); ?>')"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g data-name="Layer 2"><path d="M12 18.53a11.71 11.71 0 0 1-7.44-2.65l-3.09-2.53a1.74 1.74 0 0 1 0-2.7l3.09-2.53a11.78 11.78 0 0 1 14.88 0l3.09 2.53a1.74 1.74 0 0 1 0 2.7l-3.09 2.53A11.69 11.69 0 0 1 12 18.53zM12 7a10.22 10.22 0 0 0-6.49 2.28l-3.09 2.53a.25.25 0 0 0 0 .38l3.09 2.53a10.27 10.27 0 0 0 13 0l3.09-2.53a.25.25 0 0 0 0-.38l-3.11-2.53A10.24 10.24 0 0 0 12 7z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M12 18.25A6.25 6.25 0 1 1 18.25 12 6.25 6.25 0 0 1 12 18.25zm0-11A4.75 4.75 0 1 0 16.75 12 4.75 4.75 0 0 0 12 7.25z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M15 12a3 3 0 1 1-2.2-2.89 1.47 1.47 0 0 0-.3.89 1.5 1.5 0 0 0 1.5 1.5 1.47 1.47 0 0 0 .89-.3 3 3 0 0 1 .11.8z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></g></svg></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                        <?php
                         /** Pagination for attendees and mark attendees logs */
                        $total_rec  = count($att_total_records);
                        $total_pages = ceil($total_rec / $per_page);
                        $pagination_order = paginate_links(array(
                            'base'      =>	add_query_arg('paged','%#%'),
                            'format' 	=>	'?paged=%#%',
                            'current' 	=>	$current_page,
                            'total' 	=>	$total_pages,
                            'next_text' =>	'&raquo',
                            'prev_text' =>	'&laquo'
                        ));


                        if ($pagination_order) {
                            echo '<div class="pagination">' . esc_html($pagination_order) . '</div>';
                        }
                        ?>
                    <?php } else { ?>
                        <p>No data found.</p>
                    <?php } ?>
            </div>
            <?php }?>

    </div>

    <!-- tab script -->
    <script>
    jQuery(document).ready(function () {
        jQuery(".tablink").on("click", function () {
        var tabId = jQuery(this).data("tab");
        /** Update the URL to include the tab parameter */
        var newUrl = updateUrlParameter(window.location.href, 'tab', tabId);
        /** Remove the 'paged' parameter */
        newUrl = removeUrlParameter(newUrl, 'paged');
        window.history.pushState({ path: newUrl }, '', newUrl);
        /** Reload the page */
        location.reload();
    });

    /** Check if tab parameter exists in the URL and activate the corresponding tab */
    var urlParams = new URLSearchParams(window.location.search);
    var activeTab = urlParams.get('tab');
    if (!activeTab) {
        /** Add the default tab parameter if not present in the URL */
        var defaultTabUrl = updateUrlParameter(window.location.href, 'tab', 'ac-order-sub-tab');
        window.history.pushState({ path: defaultTabUrl }, '', defaultTabUrl);
    }
        /** Retrieve the updated tab parameter */
        activeTab = urlParams.get('tab');
        if (activeTab) {
            /** Show the tab content only if the page was reloaded */
            jQuery(".tabcontent").hide().removeClass("active");
            jQuery(".tablink").removeClass("active");
            /** Display the content after reloading */
            jQuery("#" + activeTab).show().addClass("active");
            jQuery(".tablink[data-tab='" + activeTab + "']").addClass("active");
        } else {
            /** Default active tab */
            jQuery("#ac-order-sub-tab").show().addClass("active");
            jQuery(".tablink[data-tab='ac-order-sub-tab']").addClass("active");
            //location.reload();
        }
    });

    /** Function to update or add URL parameters */
    function updateUrlParameter(url, param, value) {
        var newUrl = url;
        var re = new RegExp("([?&])" + param + "=.*?(&|$)", "i");
        var separator = newUrl.indexOf('?') !== -1 ? "&" : "?";

        if (newUrl.match(re)) {
            newUrl = newUrl.replace(re, '$1' + param + "=" + value + '$2');
        } else {
            newUrl = newUrl + separator + param + "=" + value;
        }

        return newUrl;
    }

    /** Function to remove URL parameters */
    function removeUrlParameter(url, param) {
        var newUrl = url;
        var re = new RegExp("([?&])" + param + "=.*?(&|$)", "i");

        newUrl = newUrl.replace(re, function(match, p1, p2) {
            return (p1 === '?' || p2 === '&') ? p1 : '';
        });

        /**  Remove trailing '?' or '&' if it exists */
        newUrl = newUrl.replace(/[?&]$/, '');

        return newUrl;
    }

    </script>
</div>
<!-- scripts for all log view show pop up and show data -->
<script type="text/javascript">
    /** create order and create subscription and change subscription status change pop up  */
    function showPopup(id, order_id, subscription_id, user_id, email, order_name, first_name, last_name, order_status, add_date, edit_date, trigger_status, trigger_type) {
        var overlay = document.createElement('div');
        var adminUrl = "<?php echo esc_url(admin_url()); ?>";
        var orderEditLink = adminUrl + 'post.php?post=' + order_id + '&action=edit';
        var subEditLink = adminUrl + 'post.php?post=' + subscription_id + '&action=edit';
        var sub_id ='';
        if (subscription_id !== '0' && subscription_id !== 'N/A') {
            sub_id += '<a href="' + subEditLink + '" target="_blank">' + subscription_id + '</a>';
        }else{
            sub_id +=  subscription_id;
        }
        overlay.className = 'overlay';
        var modal = document.createElement('div');
        modal.className = 'modal';
        modal.innerHTML = '<table class="data-table">' +
            '<tr><th>ID</th><td>' + id + '</td></tr>' +
            '<tr><th>Order ID</th><td><a href="' + orderEditLink + '" target="_blank">' + order_id + '</a></td></tr>'+
            '<tr><th>Subscription ID</th><td>' + sub_id + '</td></tr>'+
            '<tr><th>User ID</th><td>' + user_id + '</td></tr>' +
            '<tr><th>Email</th><td>' + email + '</td></tr>' +
            '<tr><th>Product Name</th><td>' + order_name + '</td></tr>' +
            '<tr><th>First Name</th><td>' + first_name + '</td></tr>' +
            '<tr><th>Last Name</th><td>' + last_name + '</td></tr>' +
            '<tr><th>Order Status</th><td>' + order_status + '</td></tr>' +
            '<tr><th>Add Date</th><td>' + add_date + '</td></tr>' +
            '<tr><th>Trigger Status</th><td>' + trigger_status + '</td></tr>' +
            '<tr><th>Trigger Type</th><td>' + trigger_type + '</td></tr>' +
            //'<tr><th>Trigger</th><td><a href="#">Re Run</a></td></tr>'+
            '</table>';

		var closeButton = document.createElement('button');
		closeButton.textContent = 'x';
		closeButton.classList.add('modal_close_btn');


		function closeOverlay() {
			document.body.removeChild(overlay);
		}

        closeButton.addEventListener('click', function() {
			closeOverlay();
		});
		overlay.addEventListener('click', function(event) {
			if (event.target.matches('.overlay')) {
				closeOverlay();
			}
		});

        modal.appendChild(closeButton);
        overlay.appendChild(modal);

        document.body.appendChild(overlay);
        overlay.style.display = 'block';
    }

    /** create user logs data pop up */
    function showPopup_user(id, user_id, email, first_name, last_name, add_date, edit_date, trigger_status, trigger_type) {
        var overlay = document.createElement('div');
        overlay.className = 'overlay';
        var adminUrl = "<?php echo esc_url(admin_url()); ?>";
        var userEditLink = adminUrl + 'user-edit.php?user_id=' + user_id;

        var modal = document.createElement('div');
        modal.className = 'modal';
        modal.innerHTML = '<table class="data-table">' +
            '<tr><th>ID</th><td>' + id + '</td></tr>' +
            '<tr><th>User ID</th><td><a href="' + userEditLink + '" target="_blank">' + user_id + '</a></td></tr>' +
            '<tr><th>Email</th><td>' + email + '</td></tr>' +
            '<tr><th>First Name</th><td>' + first_name + '</td></tr>' +
            '<tr><th>Last Name</th><td>' + last_name + '</td></tr>' +
            '<tr><th>Add Date</th><td>' + add_date + '</td></tr>' +
            '<tr><th>Trigger Status</th><td>' + trigger_status + '</td></tr>' +
            '<tr><th>Trigger Type</th><td>' + trigger_type + '</td></tr>' +
            //'<tr><th>Trigger</th><td><a href="#">Re Run</a></td></tr>'+
            '</table>';

        var closeButton = document.createElement('button');
		closeButton.textContent = 'x';
		closeButton.classList.add('modal_close_btn');

		function closeOverlay() {
			document.body.removeChild(overlay);
		}
        closeButton.addEventListener('click', function() {
			closeOverlay();
		});
		overlay.addEventListener('click', function(event) {
			if (event.target.matches('.overlay')) {
				closeOverlay();
			}
		});

        modal.appendChild(closeButton);
        overlay.appendChild(modal);

        document.body.appendChild(overlay);
        overlay.style.display = 'block';
    }
    /** save post logs pop up data */
    function showPopup_post(id, post_id, email, post_title, add_date, edit_date, trigger_status, trigger_type, post_type, single_post_url) {
            var overlay = document.createElement('div');
            var adminUrl = "<?php echo esc_url(admin_url()); ?>";
            var postEditLink = adminUrl + 'post.php?post=' + post_id + '&action=edit';
            overlay.className = 'overlay';

            var modal = document.createElement('div');
            modal.className = 'modal';
            modal.innerHTML = '<table class="data-table">' +
                '<tr><th>ID</th><td>' + id + '</td></tr>' +
                '<tr><th>Post ID</th><td><a href="' + postEditLink + '" target="_blank">' + post_id + '</a></td></tr>'+
                '<tr><th>Email</th><td>' + email + '</td></tr>' +
                '<tr><th>Post Title</th><td><a href="' + single_post_url + '" target="_blank">' + post_title + '</a></td></tr>' +
                '<tr><th>Add Date</th><td>' + add_date + '</td></tr>' +
                '<tr><th>Trigger Status</th><td>' + trigger_status + '</td></tr>' +
                '<tr><th>Trigger Type</th><td>' + trigger_type + '</td></tr>' +
                '<tr><th>Post Type</th><td>' + post_type + '</td></tr>' +
                //'<tr><th>Trigger</th><td><a href="#">Re Run</a></td></tr>'+
                '</table>';

            var closeButton = document.createElement('button');
			closeButton.textContent = 'x';
			closeButton.classList.add('modal_close_btn');


			function closeOverlay() {
				document.body.removeChild(overlay);
			}

			closeButton.addEventListener('click', function() {
				closeOverlay();
			});
			overlay.addEventListener('click', function(event) {
				if (event.target.matches('.overlay')) {
					closeOverlay();
				}
			});

			modal.appendChild(closeButton);
			overlay.appendChild(modal);

			document.body.appendChild(overlay);
			overlay.style.display = 'block';
		}


        /** ac attendees single data pop up function */
        function acshowPopup(id, event_id, order_id, attendee_name, attendee_email, event_name, attendee_mobile, add_date, edit_date, trigger_status, trigger_type, single_event_url) {
            var overlay = document.createElement('div');
            var adminUrl = "<?php echo esc_url(admin_url()); ?>";
            var eventEditLink = adminUrl + 'post.php?post=' + event_id + '&action=edit';
            overlay.className = 'overlay';
            var adminUrl = "<?php echo esc_url(admin_url()); ?>";
            var subEditLink = adminUrl + 'post.php?post=' + order_id + '&action=edit';
            var sub_id ='';
            if (order_id !== '0' && order_id !== 'N/A') {
                sub_id += '<a href="' + subEditLink + '" target="_blank">' + order_id + '</a>';
            }else{
                sub_id +=  order_id;
            }

            var modal = document.createElement('div');
            modal.className = 'modal';
            modal.innerHTML = '<table class="data-table">' +
                    '<tr><th>ID</th><td>' + id + '</td></tr>' +
                    '<tr><th>Event ID</th><td><a href="' + eventEditLink + '" target="_blank">' + event_id + '</a></td></tr>'+
                    '<tr><th>Order ID</th><td>' + sub_id + '</td></tr>'+
                    '<tr><th>Attendee Name</th><td>' + attendee_name + '</td></tr>' +
                    '<tr><th>Attendee Email</th><td>' + attendee_email + '</td></tr>' +
                    '<tr><th>Attendee Mobile</th><td>' + attendee_mobile + '</td></tr>' +
                    '<tr><th>Event Name</th><td><a href="' + single_event_url + '" target="_blank">' + event_name + '</a></td></tr>' +
                    '<tr><th>Add Date</th><td>' + add_date + '</td></tr>' +
                    '<tr><th>Trigger Status</th><td>' + trigger_status + '</td></tr>' +
                    '<tr><th>Trigger Type</th><td>' + trigger_type + '</td></tr>' +
                    //'<tr><th>Trigger</th><td><a href="#">Re Run</a></td></tr>'+
                    '</table>';

            var closeButton = document.createElement('button');
			closeButton.textContent = 'x';
			closeButton.classList.add('modal_close_btn');
			function closeOverlay() {
				document.body.removeChild(overlay);
			}

			closeButton.addEventListener('click', function() {
				closeOverlay();
			});
			overlay.addEventListener('click', function(event) {
				if (event.target.matches('.overlay')) {
					closeOverlay();
				}
			});

			modal.appendChild(closeButton);
			overlay.appendChild(modal);

			document.body.appendChild(overlay);
			overlay.style.display = 'block';
		}

</script>