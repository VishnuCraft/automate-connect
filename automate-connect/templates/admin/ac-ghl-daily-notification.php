<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}
?>
<style>
    .hft_continer {

        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .hft_continer_lb {
        display: flex;

    }

    .hft_continer label {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        margin-right: 15px;
        font-size: 16px;
        font-weight: 500;
        margin-top: 5px;
    }

    .hft_continer input[type="checkbox"] {
        margin-right: 10px;
    }

    .hft_continer input[type="button"] {
        background-color: #a5231a;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: fit-content;
        padding: 10px 25px;
        font-size: 16px;
        font-weight:500;
    }

    input[type="button"]:hover {
        background-color: #af9d80;
    }
    .ac_wrap_content {
        display: inline-flex;
    }
    div#ac_loader_gif {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
    div#ac_loader_gif img {
        width: auto;
        height: 42px;
    }
</style>

<div class="hft_continer">
    <h2>DND Settings</h2>
    <h6>Check to enable, uncheck to disable.</h6>
    <!-- <form action="" method="post"> -->
    <div class="hft_continer_lb">
        <!-- <label>
            <input type="checkbox" id="hft_call" name="hft_call" value="inactive">
            Call
        </label> -->
        <label>
            <input type="checkbox" id="hft_sms" name="hft_sms" value="inactive" <?php echo !empty($checked_ac_sms)  ? esc_html($checked_ac_sms) : ''; ?>>
            SMS
        </label>
        <label>
            <input type="checkbox" id="hft_email" name="hft_email" value="inactive" <?php echo !empty($checked_ac_email) ? esc_html($checked_ac_email) : ''; ?>>
            Email
        </label>
    </div>
        <!-- <input type="button" value="Update" id="ac_update_daily_notification"> -->
        <div class="ac_wrap_content">
            <input type="button" value="Update" id="ac_update_daily_notification">
            <div class="ac_loader_gif" id="ac_loader_gif" style="display:none;">
                <img width="100" src="<?php echo esc_url(ACONNECT_PLUGIN_URL.'/assets/img/acloader.gif'); ?>">
            </div>
        </div>
    <!-- </form> -->
</div>

<script type="text/javascript">
    jQuery(document).ready(function(){

        jQuery(document).on("click", "#ac_update_daily_notification", function() {
            /** Call function. */
            //var callValue = "active";
            var smsValue = "active";
            var emailValue = "active";
            /*
            if (jQuery("#hft_call").prop("checked")) {
                callValue = jQuery("#hft_call").val();
            }
            */
            jQuery("#ac_loader_gif").show();
            if (jQuery("#hft_sms").prop("checked")) {
                smsValue = jQuery("#hft_sms").val();
            }
            if (jQuery("#hft_email").prop("checked")) {
                emailValue = jQuery("#hft_email").val();
            }

            /** Now you can use these variables as needed */
            ac_change_daily_notification(smsValue, emailValue);
        });

        function ac_change_daily_notification(smsValue, emailValue) {
            var adminajaxurl = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>';
            jQuery.ajax({
                url: adminajaxurl,
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'dnd_ac_change_daily_notification',
                    smsValue: smsValue,
                    emailValue: emailValue,
                },
                success: function (response) {
                    if(response.data.rcode == 1) {
                        alert(response.data.retdata);
                    } else {
                        alert(response.data.retdata);
                    }
                    jQuery("#ac_loader_gif").hide();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Failed: ' + textStatus);
                    jQuery("#ac_loader_gif").hide();
                }
            });
        }
    });
</script>