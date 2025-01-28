<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}


?>
<style>


    .ghl_container {
		background: #fff;
		border: 1px solid #c3c4c7;
		border-left:solid 4px #3d4349;
		box-shadow: 0 1px 1px rgba(0,0,0,.04);
		margin: 20px 20px 0 0;
		padding: 1px 12px;
    }
	
	
	.wp_tab_action_col{
		display: flex;
	}
	a.button-style_2_nd {
		background-color: #ff0000;
		color: #fff;
		border-color: #ff0000;
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

	.button-style_2_nd:hover {
		color: #fff;
		
	}
    .view_data:hover {
        color: #fff;
        
    }
	
    input:focus {
        outline: none;
        border-color: #c48782;
    }
    .error {
        color: red;
    }
    .button-style {
        display: inline-block;
        padding: 8px 16px;
        margin: 3px;
        text-decoration: none;
        color: #fff;
        background-color: #3498db;
        border: 1px solid #3498db;
        border-radius: 5px;
        cursor: pointer;
    }

    .button-style_2_nd, .view_data {
        background-color: #559DA8;
    border: 1px solid #559DA8;
    padding: 8px 20px 8px 20px;
    border-radius: 3px;
    text-align: center; 
    font-size: 16px;
    color: #fff;
    cursor: pointer;
    }

    .button-style:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }
	#ac-ghl-triger-submission label {
		font-weight: bold;
	}

    .modal_close_btn {
    position: absolute;
    right: 6px;
    top: -1px;
    font-size: 16px;
    cursor: pointer;
    }


    /* The Modal (background) */
    .ac_ghl_modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    /* Modal Content */
    .ac_ghl_modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 30%;
    }

    /* The Close Button */
    .ac_ghl_close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .ac_ghl_close:hover,
    .ac_ghl_close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Table CSS */
   

    


</style>
<style>
     .automate_option_tooltip_content_main {
   width: 25%;
  
    
    font-size: 15px;
    font-weight: 600;
    }
      .main-wrap {
      margin-right: 16px; 
    background-color: #fff;
    max-width: 100%;
    border: none;
    box-shadow: 0 5px 30px rgb(0 0 0 / 10%);
    border-radius: 15px;
    color: #32373c;
    padding: 25px 30px 25px 30px;
        }
    .main-wrap   .form-header {
        display: flex;
        align-items: center;
        gap: 15px;
        border-bottom: 1px solid #ccc;
    }
    .main-wrap  .row {
        display: flex;
        flex-wrap: wrap;
    margin-top: 15px;
    align-items: center;
    gap: 15px;
    
    }
    .main-wrap input[type=text], .main-wrap input[type=number], .main-wrap input[type=password], .main-wrap input[type=email] , .main-wrap textarea {
        width: 100%;
        border: 1px solid #ccc;
        padding:5px 10px 5px 10px;
    }
    .main-wrap .row  .input-div {
        width: 25%;
        
    }
    .select2-container--default .select2-selection--single {
        padding:5px 10px 5px 10px;
        height: auto;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 7px;
        right: 6px;
    
    }
    .main-wrap .btn {
        background-color: #559DA8;
        border: 1px solid #559DA8;
        padding: 8px 20px 8px 20px;
        border-radius: 3px;
        text-align: center; 
        font-size: 16px;
        color: #fff;
        cursor: pointer;
    

    }
    .main-wrap .btn2 {
        background-color: #ccc;
        border: 1px solid #ccc;
        padding: 8px 20px 8px 20px;
        border-radius: 3px;
        text-align: center; 
        font-size: 16px;
        color: #000;
        cursor: pointer;
    

    }
    .main-wrap .btn3 {
        background-color: #fff;
        border: 1px solid #fff;
        padding: 8px 20px 8px 20px;
        border-radius: 3px;
        text-align: center; 
        font-size: 16px;
        color: #333;
        cursor: pointer;
    

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
    .ac-ghl-inte-tbl-main-cont {
        margin-top: 30px;
    }
    .btn-group-div {
        display: flex;
        align-items: center;
        gap: 5px;
        align-content: center;
    }
    .trg {
        border: 1px solid #125166;
        border-radius: 4px; 
        padding: 3px;
        background-color: #125166;
        cursor: pointer;
        height: 18px;
    }
    .editbtn {
    border: 1px solid #125166;
        border-radius: 4px; 
        padding: 3px; 
        background-color: #125166;
        cursor: pointer;
            height: 18px;
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
    global $wpdb;
    $table_name = $wpdb->prefix . 'ac_ghl_inte_form';

    $editresults = '';
    if (isset($_GET['edit_id'])) {
        $edit_id = intval($_GET['edit_id']);
        $sql = $wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $edit_id);
        $editresults = $wpdb->get_results($sql, ARRAY_A);


    }

?>
<div class="main-wrap">
    <div class="form-header">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="40" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M28.5 27a.5.5 0 0 1-.5-.5v-16a.5.5 0 0 0-.5-.5h-23a.5.5 0 0 0-.5.5v16a.5.5 0 0 1-1 0v-16C3 9.673 3.673 9 4.5 9h23c.827 0 1.5.673 1.5 1.5v16a.5.5 0 0 1-.5.5z" fill="#529daa" opacity="1" data-original="#000000"></path><path d="M12.559 22.176a.498.498 0 0 1-.329-.124l-3.059-2.676a.502.502 0 0 1 0-.752l3.059-2.676a.5.5 0 1 1 .658.753L10.26 19l2.628 2.3a.5.5 0 0 1-.329.876zM14.635 23.597a.5.5 0 0 1-.474-.658l2.73-8.193a.5.5 0 1 1 .949.316l-2.73 8.193a.503.503 0 0 1-.475.342zM19.441 22.176a.5.5 0 0 1-.329-.877L21.74 19l-2.628-2.3a.5.5 0 0 1 .658-.753l3.059 2.676a.502.502 0 0 1 0 .753l-3.059 2.676a.49.49 0 0 1-.329.124zM28.5 31h-25A2.503 2.503 0 0 1 1 28.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1H2.086c.206.582.762 1 1.414 1h25c.652 0 1.208-.418 1.414-1H19.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 .5.5c0 1.378-1.121 2.5-2.5 2.5zM22 10a.5.5 0 0 1-.5-.5V8.132l-1.018-.224a.501.501 0 0 1-.379-.372 4.436 4.436 0 0 0-.521-1.258.498.498 0 0 1 .007-.528l.563-.881-.521-.521-.881.564a.498.498 0 0 1-.528.006 4.148 4.148 0 0 0-1.249-.51.502.502 0 0 1-.381-.381L16.367 3h-.734l-.225 1.027a.5.5 0 0 1-.381.381 4.148 4.148 0 0 0-1.249.51.5.5 0 0 1-.528-.006l-.881-.564-.521.521.563.881a.5.5 0 0 1 .007.528 4.17 4.17 0 0 0-.51 1.25.499.499 0 0 1-.382.38l-1.42.31a.496.496 0 0 1-.594-.382.498.498 0 0 1 .382-.594l1.119-.245c.096-.326.228-.647.395-.961l-.618-.966a.5.5 0 0 1 .067-.623l1.09-1.09a.5.5 0 0 1 .623-.068l.966.618a5.1 5.1 0 0 1 .962-.394l.245-1.12A.498.498 0 0 1 15.23 2h1.539a.5.5 0 0 1 .488.393l.245 1.12c.325.095.647.227.962.394l.966-.618a.5.5 0 0 1 .623.068l1.09 1.09a.5.5 0 0 1 .067.623l-.618.966c.166.311.299.632.399.961l1.115.245c.231.05.394.253.394.488V9.5a.5.5 0 0 1-.5.5z" fill="#529daa" opacity="1" data-original="#000000"></path><path d="M13.697 9.975a.499.499 0 0 1-.46-.305A3.004 3.004 0 0 1 16 5.5a3.004 3.004 0 0 1 2.765 4.167.5.5 0 0 1-.922-.388 2 2 0 1 0-3.686.001.5.5 0 0 1-.46.695zM21.5 26c-.276 0-.5-.224-.5-.5s.224-.55.5-.55.5.174.5.45v.1a.5.5 0 0 1-.5.5zM23.5 26c-.276 0-.5-.224-.5-.5s.224-.55.5-.55.5.174.5.45v.1a.5.5 0 0 1-.5.5zM25.5 26c-.276 0-.5-.224-.5-.5s.224-.55.5-.55.5.174.5.45v.1a.5.5 0 0 1-.5.5z" fill="#529daa" opacity="1" data-original="#000000"></path></g></svg>
    <h2>Add new GHL Script Embed Shortcode</h2>
</div>
       <div class="ac-ghl-integ-mid">
        <form action="" method="post" id="addshortcode">
            <div id="error-title" style="color: red; display: none;"></div>
            <div class="row">
                <div class="automate_option_tooltip_content_main">
            <label for="form-title">Shortcode name:</label>
        </div>
        <div class="input-div">
            <input type="text" name="ac_ghl_form_title" id="form-title" value="<?php echo !empty($editresults[0]['ac_ghl_form_title']) ? esc_html($editresults[0]['ac_ghl_form_title']) : ''; ?>">
        </div>
    </div>
            <div id="error-desc" style="color: red; display: none;"></div>
             <div class="row">
                <div class="automate_option_tooltip_content_main">
                    <label for="form-desc">Enter GHL embed code/script:</label>
             </div>
        <div class="input-div">
            <textarea name="ac_ghl_form_desc" id="form-desc" cols="50" rows="10"><?php echo !empty($editresults[0]['ac_ghl_form_desc']) ? esc_html($editresults[0]['ac_ghl_form_desc']) : ''; ?></textarea>
        </div>
    </div>
     <div class="row">
            <?php if(!empty($editresults)): ?>
                <input type="hidden" name="edit_id" value="<?php echo esc_attr($editresults[0]['id']); ?>">
                <input class="btn" type="submit" name="update_ghl_src" value="Update">
            <?php else: ?>
                <input type="submit" name="create_ghl_src" value="Save" class="button-style_2_nd">
            <?php endif; ?>
        </div>
        </form>
    </div>
    <?php
    $error_message = '';

    if (isset($_POST['create_ghl_src'])) {

        $form_title = !empty($_POST['ac_ghl_form_title']) ? sanitize_text_field(wp_unslash($_POST['ac_ghl_form_title'])) : '';
        $form_desc = !empty($_POST['ac_ghl_form_desc']) ? sanitize_text_field(wp_unslash($_POST['ac_ghl_form_desc'])) : '';
        
        $errors = array();
        if (empty($form_title)) {
            $errors[] = 'Please enter a title.';
        }

        if (empty($form_desc)) {
            $errors[] = 'Please enter a description.';
        }

        if (!empty($errors)) {
            $error_message = '<span class="errors">' . implode('<br>', $errors) . '</span>';
        }

        if (empty($errors)) {
            $form_scr_value = 'ac_ghl_embed_script_src';

            $data = array(
                'ac_ghl_form_title' => $form_title,
                'ac_ghl_form_desc' => $form_desc,
                'ac_ghl_form_scr' => $form_scr_value
            );

            $format = array('%s', '%s', '%s');
            $wpdb->insert($table_name, $data, $format);

            $inserted_id = $wpdb->insert_id;

            $updated_form_scr_value = '[' . $form_scr_value . ' shortcode_id=' . $inserted_id . ']';
            $wpdb->update($table_name, array('ac_ghl_form_scr' => $updated_form_scr_value), array('ID' => $inserted_id), array('%s'), array('%d'));
        }
    }

/** Display the combined error message */
    ?>
    <div class="ac_ghl_errors"><span style="color:red;"><?php echo esc_html($error_message); ?></span></div>
    <?php

    /** ac ghl shortcode content form update */
    if (isset($_POST['update_ghl_src'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'ac_ghl_inte_form';

        $form_title = !empty($_POST['ac_ghl_form_title']) ? sanitize_text_field(wp_unslash($_POST['ac_ghl_form_title'])) : '';
        $form_desc = !empty($_POST['ac_ghl_form_desc']) ? sanitize_text_field(wp_unslash($_POST['ac_ghl_form_desc'])) : '';
        $edit_id = !empty($_POST['edit_id']) ? intval($_POST['edit_id']) : '';

        $form_scr_value = 'ac_ghl_embed_script_src';

        $data = array(
            'ac_ghl_form_title' => $form_title,
            'ac_ghl_form_desc' => $form_desc,
            'ac_ghl_form_scr' => $form_scr_value
        );

        $where = array('ID' => $edit_id);
        $format = array('%s', '%s', '%s');

        $wpdb->update($table_name, $data, $where, $format);

        $updated_form_scr_value = '[' . $form_scr_value . ' shortcode_id=' . $edit_id . ']';
        $wpdb->update($table_name, array('ac_ghl_form_scr' => $updated_form_scr_value), array('ID' => $edit_id), array('%s'), array('%d'));
    }



    /** data table section */
    global $wpdb;
    $table_name = $wpdb->prefix . 'ac_ghl_inte_form';

    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id_to_delete = intval($_GET['id']);
        $wpdb->delete($table_name, array('id' => $id_to_delete));
    }

    $sql = "SELECT * FROM $table_name";
    $results = $wpdb->get_results($sql, ARRAY_A);
    ?>

    <div class="ac-ghl-inte-tbl-main-cont">
        <div class="ac-copy-message-container">
            <div class="ac-copy-message"></div>
        </div>
        <h2>All GHL Script Embed Shortcodes</h2>
        <div class="recipes_table_wrapper">
            <div class="table-wrap">
            <table class="wp-list-table widefat rwd-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Shortcode</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($results)) {
                        $i = '1';
                        foreach ($results as $result) {
                            ?>
                            <tr class="ac_ghl_int_tbl_td_th">
                                <td><?php echo esc_html($i++); ?></td>
                                <td><?php echo esc_html($result['ac_ghl_form_title']); ?></td>
                                <td class="ac_ghl_copy_text"><?php echo esc_html($result['ac_ghl_form_scr']); ?></td>
                                <td class="wp_tab_action_col">
                                    <div class="btn-group-div">
                                    <a href="?page=automate-connect-shortcodes&action=edit&edit_id=<?php echo esc_attr($result['id']); ?>" class="editbtn"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="m11.007 9.815-.956 2.869a1.007 1.007 0 0 0 1.265 1.264l2.869-.956a1.007 1.007 0 0 0 .39-.241l6.736-6.736a2.354 2.354 0 0 0 0-3.327 2.356 2.356 0 0 0-3.326 0l-6.736 6.737a1 1 0 0 0-.242.39z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M21 9a1 1 0 0 0-1 1v7a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h7a1 1 0 0 0 0-2H7a5.006 5.006 0 0 0-5 5v10a5.006 5.006 0 0 0 5 5h10a5.006 5.006 0 0 0 5-5v-7a1 1 0 0 0-1-1z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg></a>
                                    
                                    <a href="?page=automate-connect-shortcodes&action=delete&id=<?php echo esc_attr($result['id']); ?>" onclick="return confirm('Are you sure you want to delete this record?')" class="delbtn "><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M21 5H3a1 1 0 0 0 0 2h2v12a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V7h2a1 1 0 0 0 0-2zM11 16a1 1 0 0 1-2 0v-5a1 1 0 0 1 2 0zm4 0a1 1 0 0 1-2 0v-5a1 1 0 0 1 2 0zM10 4h4a1 1 0 0 0 0-2h-4a1 1 0 0 0 0 2z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></svg></a>

                                    <a href="#" class="trg" data-id="<?php echo esc_attr($result['id']); ?>"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g data-name="Layer 2"><path d="M12 18.53a11.71 11.71 0 0 1-7.44-2.65l-3.09-2.53a1.74 1.74 0 0 1 0-2.7l3.09-2.53a11.78 11.78 0 0 1 14.88 0l3.09 2.53a1.74 1.74 0 0 1 0 2.7l-3.09 2.53A11.69 11.69 0 0 1 12 18.53zM12 7a10.22 10.22 0 0 0-6.49 2.28l-3.09 2.53a.25.25 0 0 0 0 .38l3.09 2.53a10.27 10.27 0 0 0 13 0l3.09-2.53a.25.25 0 0 0 0-.38l-3.11-2.53A10.24 10.24 0 0 0 12 7z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M12 18.25A6.25 6.25 0 1 1 18.25 12 6.25 6.25 0 0 1 12 18.25zm0-11A4.75 4.75 0 1 0 16.75 12 4.75 4.75 0 0 0 12 7.25z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path><path d="M15 12a3 3 0 1 1-2.2-2.89 1.47 1.47 0 0 0-.3.89 1.5 1.5 0 0 0 1.5 1.5 1.47 1.47 0 0 0 .89-.3 3 3 0 0 1 .11.8z" fill="#ffffff" opacity="1" data-original="#000000" class=""></path></g></g></svg></a>
                                </div>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr><td colspan="4">No data found.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<div id="ac_ghl_myModal" class="ac_ghl_modal">
    <!-- Modal content -->
    <div class="ac_ghl_modal-content">
        <span class="ac_ghl_close">&times;</span>
        <p id="ac_ghl_modal-text"></p>
    </div>
</div>

<!-- ac ghl integ single row all data pop up and shortcode script -->
<script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery(".ac_ghl_copy_text").click(function () {
                var element = jQuery(this);
                var $temp = jQuery("<input>");
                jQuery("body").append($temp);
                $temp.val(element.html()).select();
                document.execCommand("copy");
                $temp.remove();
                alert("Shortcode Copied!");
            });
        });

        /** show pop up ghl inte form */
        jQuery(document).ready(function ($) {
            jQuery('.view_data').on('click', function (e) {
                e.preventDefault();
                var postId = jQuery(this).data('id');

                jQuery.ajax({
                    type: 'POST',
                    url: '<?php echo esc_url(admin_url('admin-ajax.php')); ?>',
                    data: {
                        action: 'view_data_action',
                        post_id: postId,
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        var modalContent = '<table class="ac_ghl_table">' +
                                            '<tr><th>ID</th><td>' + data.id + '</td></tr>' +
                                            '<tr><th>Title</th><td>' + data.ac_ghl_form_title + '</td></tr>' +
                                            '<tr><th>Shortcode</th><td>' + data.ac_ghl_form_scr + '</td></tr>' +
                                            '<tr><th>Description</th><td><textarea readonly style="width:100%;" class="ac_ghl_form_desc_pop">' +
                                    data.ac_ghl_form_desc + '</textarea></td></tr>' +
                                        '</table>';
                        jQuery('#ac_ghl_modal-text').html(modalContent);
                        jQuery('#ac_ghl_myModal').show();
                    }
                });
            });

            jQuery('.ac_ghl_close').on('click', function () {
                jQuery('#ac_ghl_myModal').hide();
            });

            jQuery(window).on('click', function (e) {
                if (jQuery(e.target).is('#ac_ghl_myModal')) {
                    jQuery('#ac_ghl_myModal').hide();
                }
            });
        });


        /** form empty alert by javascript */
        document.getElementById("addshortcode").addEventListener("submit", function(event) {
        var formtitle = document.getElementById("form-title").value.trim();
        var form_desc = document.getElementById("form-desc").value.trim();
        var errorTitle = document.getElementById("error-title");
        var errorDesc = document.getElementById("error-desc");

        /** Clear previous error messages */
        errorTitle.style.display = "none";
        errorDesc.style.display = "none";

        if (formtitle === "") {
            errorTitle.innerHTML = "Please enter shortcode name.";
            errorTitle.style.display = "block";
            event.preventDefault();
        }

        if (form_desc === "") {
            errorDesc.innerHTML = "Please enter GHL embed code/script.";
            errorDesc.style.display = "block";
            event.preventDefault();
        }
    });
</script>