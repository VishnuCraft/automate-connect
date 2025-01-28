<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

if (!class_exists('ACBackendCommon'))
{
	class ACBackendCommon
	{
		/** Constructor. */
		function __construct()
		{
			$this->init_hooks();
		}

		/* admin hooks. */
		public function init_hooks()
		{
            /** Admin menus */
			add_action( 'admin_menu', array( $this, 'ac_admin_menu_settings_func'));
			/** send subscription status update/change data to ac intigration */
			add_action('woocommerce_subscription_status_updated', array( $this, 'ac_get_customer_data_from_change_subscription_status'), 10, 3);
			/** send create user data to ac intigration */
			add_action('user_register', array( $this, 'ac_get_customer_data_from_create_user'), 10, 1);
			/** send user update data to ac intigration */
			add_action('profile_update', array( $this, 'ac_get_customer_data_from_update_user'), 10, 1);
			/** send order create data to ac intigration */
			add_action('woocommerce_thankyou', array( $this, 'ac_get_customer_data_from_order'), 10, 1);
			/** send create subscription data to ac intigration */
			add_action('woocommerce_thankyou', array( $this, 'ac_get_customer_data_from_create_subscription'), 10, 1);
			/** send all post type data to ac intigration */
			add_action('save_post', array($this, 'ac_ghl_triger_run_on_cpt_func'), 10,3 );
			/** send attendes data to ac intigration */
			add_action('woocommerce_thankyou', array($this, 'send_multi_attendees_data_to_ac_intigration_func'), 10, 1);
			//add_action('save_post', array($this, 'ac_ghl_triger_run_on_cpt_post_update_func'), 10,3 );

			/** custom payment status success or faield action */
			add_action('woocommerce_order_status_failed', array( $this, 'ac_create_subscription_get_payemnt_status'), 10, 1);
			add_action('woocommerce_order_status_failed', array( $this, 'ac_create_event_get_payemnt_status'), 10, 1);

			/** custom post type resigter */
			add_action('init', array( $this, 'ac_knowledge_base_custom_taxonomy_register_fun'), 4);
			add_action('init', array( $this, 'ac_knowledge_base_custom_post_register_fun'), 0);

			/** ac daily note data send ghl shortcode */
			add_shortcode('ac_ghl_daily_notification_settings', array($this, 'ac_ghl_daily_notification_settings_func'));

			/** ac ghl embed shortode script */
			add_shortcode('ac_ghl_embed_script_src', array($this, 'ac_ghl_embed_script_func'));


			/** Custom menu in woocommerce */
			$ac_ghl_set_enabled = get_option('ac_ghl_set_enable');
			if(!empty($ac_ghl_set_enabled) && $ac_ghl_set_enabled == 'yes')
			{
				add_filter('woocommerce_account_menu_items', array($this, 'ac_add_custom_account_menu_item_func'),40);
				add_action( 'init', array($this, 'ac_misha_add_endpoint'));
				add_action( 'woocommerce_account_dnd-settings_endpoint', array($this, 'ac_my_account_endpoint_content'));
			}

			/** ac ghl code script embed ajax */
			add_action('wp_ajax_view_data_action', array($this, 'view_data_function'));
        	add_action('wp_ajax_nopriv_view_data_action', array( $this, 'view_data_function'));

			/** DND settings change daily notification */
			add_action('wp_ajax_dnd_ac_change_daily_notification', array($this, 'dnd_ac_change_daily_notification_func'));
        	add_action('wp_ajax_nopriv_dnd_ac_change_daily_notification', array( $this, 'dnd_ac_change_daily_notification_func'));

			/** automate connect user dashborad defult shortcode */
			add_shortcode('automate_connect_user_dashboard_src', array($this, 'automate_connect_defult_user_dashborad_func'));
			add_shortcode('automate_connect_user_dashboard_menu_src', array($this, 'automate_connect_defult_user_dashborad_menu_func'));
			add_shortcode('ac_user_dashboard_center_menu_src', array($this, 'automate_connect_defult_user_dashborad_center_menu_func'));
			add_shortcode('automate_connect_login_form', array($this,'automate_connect_login_form_shortcode'));

			/** automate connect user dashboard save left menus secrion setting ajax functions */
			add_action('wp_ajax_ac_save_dashboard_settings', array($this, 'ac_user_save_dashboard_settings'));
			add_action('wp_ajax_nopriv_ac_save_dashboard_settings', array($this, 'ac_user_save_dashboard_settings'));

			/** automate connect user dashboard save center menus secrion setting ajax functions */
			add_action('wp_ajax_ac_save_dashboard_center_settings', array($this, 'ac_save_dashboard_center_settings'));
			add_action('wp_ajax_nopriv_ac_save_dashboard_center_settings', array($this, 'ac_save_dashboard_center_settings'));

			/** automate connect user dashboard save header menus secrion setting ajax functions */
			add_action('wp_ajax_ac_save_dashboard_header_settings', array($this, 'ac_save_dashboard_header_settings'));
			add_action('wp_ajax_nopriv_ac_save_dashboard_header_settings', array($this, 'ac_save_dashboard_header_settings'));

			/** automate connect save custom css setting ajax functions */
			add_action('wp_ajax_ac_save_custom_css', array($this, 'save_custom_css_callback'));
			add_action('wp_ajax_nopriv_ac_save_custom_css', array($this, 'save_custom_css_callback'));

			/* user login ajax hook */
            add_action('wp_ajax_ac_login_user', array($this, 'ac_login_user_func'));
            add_action('wp_ajax_nopriv_ac_login_user', array($this, 'ac_login_user_func'));

			add_action('wp_enqueue_scripts', 'enqueue_chart_js');
			add_action('wp_enqueue_scripts', 'enqueue_font_awesome'); 

		}

		
		public function enqueue_font_awesome() {
			wp_enqueue_style(
				'font-awesome',
				'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
				array(),
				null,
				'all'
			);
		}

		public function enqueue_chart_js() {
			wp_enqueue_script(
				'chart-js',
				'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js',
				array(),
				null,
				true
			);
		}
		
		// Callback function for login
		public function ac_login_user_func() {
			// Check if required POST data is set
			if (isset($_POST['nonce'])) {
				$nonce = sanitize_text_field(wp_unslash($_POST['nonce']));
				if (wp_verify_nonce($nonce, 'ac_login_nonce')) 
				{
					if(isset($_POST['action'])){

						$action = sanitize_text_field(wp_unslash($_POST['action']));

						if ($action == 'ac_login_user' && isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) 
						{
							$un_username = sanitize_text_field(wp_unslash($_POST['username']));
							$username = is_email(sanitize_email($un_username)) ? sanitize_email($un_username) : sanitize_text_field($un_username);
							
							$password = sanitize_text_field(wp_unslash($_POST['password']));

							$user_exists = false;
							if (is_email($username)) 
							{
								$user_exists = email_exists($username);
							} else 
							{
								$user_exists = username_exists($username);
							}		
							if ($user_exists != false && $user_exists > 0) {
								$user = get_user_by(is_email($username) ? 'email' : 'login', $username);
								if (wp_check_password($password, $user->user_pass, $user->ID)) 
								{
									wp_set_current_user($user->ID, $user->user_login);
									wp_set_auth_cookie($user->ID, true);		
									// Send success response
									$payload = array(
										"rcode"  => 1, 
										"msg"    => __("Logged in successfully.", "automate-connect"), 
										"user_id" => $user->ID
									);
									wp_send_json_success($payload);
								} else 
								{
									wp_send_json_error(array(
										"rcode" => 2, 
										"msg"   => __("Invalid password.", "automate-connect")
									));
								}
							} else 
							{
								wp_send_json_error(array(
									"rcode" => 2, 
									"msg"   => __("User not found.", "automate-connect")
								));
							}
						} 
					
					}
					else 
					{
						wp_send_json_error(array(
							"rcode" => 2, 
							"msg"   => __("Missing credentials.", "automate-connect")
						));
					}
				}
			}
			else 
			{
				wp_send_json_error(array(
					"rcode" => 2, 
					"msg"   => __("Invalid nonce.", "automate-connect")
				));
			}
		}		
		// Shortcode function to display login form
		public function automate_connect_login_form_shortcode($atts) {
			// Shortcode parameters for redirect URL, reset password URL, and signup URL
			$atts = shortcode_atts( array(
				'redirect_url' => '', // Redirect after login
				'reset_password_url' => '', // Reset password link
				'signup_url' => '', // Sign up link
			), $atts );
		
			ob_start();
			$is_user_logged_in = is_user_logged_in();
			$nonce = wp_create_nonce('ac_login_nonce');
			?>
			<div class="login_form" <?php echo $is_user_logged_in ? 'style="display:none;"' : ''; ?>>                
				<div class="dgird">
					<div class="img-container2"></div>
					<form action="" method="post" class="formbabyname_listed_last">
						<div class="row modal-shortlistname">
							<div class="col-lg-6 ">
								<label for="user_name"><span><?php esc_html_e('Username', 'automate-connect'); ?></span></label>
							</div>
							<div class="col-lg-6">
								<input type="text" class="user_name" name="user_name" id="user_name" placeholder="username/email" required="required" />
							</div>
						</div>
						<div class="row modal-shortlistname">
							<div class="col-lg-6 ">
								<label for="password"><span><?php esc_html_e('Password', 'automate-connect'); ?></span></label>
							</div>
							<div class="col-lg-6">
								<input type="password" class="password" name="password" id="password" required="required" />
							</div>
						</div>
						<input type="hidden" id="ac_login_nonce" value="<?php echo esc_attr($nonce); ?>" />
						<div class="row modal-shortlistname lastbutton-save">
							<button type="submit" id="login_user"><?php esc_html_e('Login', 'automate-connect'); ?></button>
							<div class="ac_reset_password_url">
								<?php
								if(!empty($atts['reset_password_url']))
								{
									?>
									<a href="<?php echo esc_url($atts['reset_password_url']); ?>" class="reset_password"><?php esc_html_e('Forgot Password', 'automate-connect'); ?></a>
									<?php
								}
								?>
							</div>
							<div class="ac_signup_url">
								<?php
								if(!empty($atts['signup_url']))
								{
									?>
									<span class="newuser"><?php esc_html_e('New user?', 'automate-connect'); ?> <a href="<?php echo esc_url($atts['signup_url']); ?>"><?php esc_html_e('Click here', 'automate-connect'); ?></a> <?php esc_html_e('to Sign Up', 'automate-connect'); ?></span>
									<?php
								}
								?>
							</div>
							<div class="ac_ajax_loader table-2" style="display:none;">
								<img width="35" src="<?php echo esc_url( plugin_dir_url(__FILE__) . 'assets/img/automate-loader.gif' ); ?>" />								
							</div>
						</div>
						<div class="row modal-shortlistname error_div"></div>
					</form>
				</div>
			</div>
			<script>
				jQuery(document).on("click", "#login_user", function(e) {
					e.preventDefault();
					var username = jQuery("#user_name").val();
					var password = jQuery("#password").val();
					var nonce = jQuery("#ac_login_nonce").val();
		
					// Basic validation for username and password
					if (username == "") {
						alert("<?php esc_html_e('Please enter username.', 'automate-connect'); ?>");
						return false;
					}
					if (password == "") {
						ac_ajax_loader("<?php esc_html_e('Please enter password.', 'automate-connect'); ?>");
						return false;
					}
		
					jQuery(".ac_ajax_loader").show();
					jQuery.ajax({
						url: "<?php echo esc_url(admin_url('admin-ajax.php')); ?>",
						type: 'POST',
						dataType: 'JSON',
						data: {
							action: 'ac_login_user',
							username: username,
							password: password,
							nonce: nonce 
						},
						success: function(resp_data) {    
							if (resp_data.success == true && resp_data.data.rcode == 1) {
								jQuery(".login_form").hide();
								jQuery(".shortlist_name_form_container").show();
								jQuery(".error_div").html("<?php esc_html_e('You are logged in now.', 'automate-connect'); ?>");
								jQuery("#current_user_id").val(resp_data.data.user_id);

								var redirectUrl = "<?php echo esc_js( $atts['redirect_url'] ); ?>";
								if (redirectUrl != "") {
									window.location.href = redirectUrl;
								} else {
									window.location.href = "<?php echo esc_url( home_url() ); ?>";
								}
							} else {
								jQuery(".error_div").html(resp_data.data.msg).css("color", "red");
							}
							jQuery(".ac_ajax_loader").hide();
						},
						error: function(jqXHR, textStatus, errorThrown) {
							jQuery(".error_div").html("<?php esc_html_e('Something went wrong, please try again.', 'automate-connect'); ?>");
							jQuery(".ac_ajax_loader").hide();
						}
					});
				});
			</script>
			<?php
			return ob_get_clean();
		}

		public function save_custom_css_callback() {
			if (isset($_POST['ac_custom_css'])) {

				$custom_css = sanitize_text_field(wp_unslash($_POST['ac_custom_css']));
				
				// Save the custom CSS (you can use update_option or other database methods)
				update_option('ac_custom_css',$custom_css);
		
				// Return success response
				wp_send_json_success('Data saved successfully!');
			} else {
				wp_send_json_error('No data received.');
			}
		}

		/** automate connect user dashboard save left menus section setting ajax functions callback */
		public function ac_user_save_dashboard_settings() {
			// Check for nonce security
			if (isset($_POST['nonce'])) {
				$nonce = sanitize_text_field(wp_unslash($_POST['nonce'])); 
				if (empty($nonce) || !wp_verify_nonce($nonce, 'save_ac_dashboard_settings_nonce')) {
					wp_send_json_error(array('message' => 'Nonce verification failed.'));
				}
			} else {
				wp_send_json_error(array('message' => 'Nonce is missing.'));
			}

			// Handle Menu Items
			$menu_items = array();
			if (isset($_POST['ac-left-menu-name']) && isset($_POST['ac-left-menu-icon-url']) && isset($_POST['ac-left-menu-url'])) {
				$names = sanitize_text_field(wp_unslash($_POST['ac-left-menu-name']));				
				$icons = sanitize_text_field(wp_unslash($_POST['ac-left-menu-icon-url']));
				$urls = sanitize_text_field(wp_unslash($_POST['ac-left-menu-url']));
				foreach ($names as $index => $name) {
					if (!empty($name) && !empty($icons[$index]) && !empty($urls[$index])) {
						$menu_items[] = array(
							'name' => sanitize_text_field($name),
							'icon' => esc_url_raw($icons[$index]),
							'url' => esc_url_raw($urls[$index])
						);
					}
				}
			}
			update_option('ac_dashboard_menu_items', serialize($menu_items));

			wp_send_json_success(array('message' => 'Data saved successfully.'));
		}

		/** automate connect user dashboard save center menus section setting ajax functions callback */
		public function ac_save_dashboard_center_settings() {
			// Check for nonce security
			if (isset($_POST['nonce'])) {
				$nonce = sanitize_text_field(wp_unslash($_POST['nonce'])); 
				if (empty($nonce) || !wp_verify_nonce($nonce, 'save_ac_dashboard_center_settings_nonce')) {
					wp_send_json_error(array('message' => 'Nonce verification failed.'));
				}
			} else {
				wp_send_json_error(array('message' => 'Nonce is missing.'));
			}

			// Save Dashboard Logo URL
			if (isset($_POST['ac-dash-heading-inp'])) {
				$dash_heading_inp = sanitize_text_field(wp_unslash($_POST['ac-dash-heading-inp']));
				update_option('ac_dashboard_center_heading', $dash_heading_inp);
			}
			if (isset($_POST['ac-dash-description-inp'])) {
				$dash_description_inp = sanitize_text_field(wp_unslash($_POST['ac-dash-description-inp']));
				update_option('ac_dashboard_center_heading', $dash_description_inp);
			}

			// Handle Menu Items
			$menu_items = array();
			if (isset($_POST['ac-center-menu-name']) && isset($_POST['ac-center-menu-icon-url']) && isset($_POST['ac-center-menu-url']) && isset($_POST['ac-center-menu-description'])) {
				$names = sanitize_text_field(wp_unslash($_POST['ac-center-menu-name']));
				$icons = sanitize_text_field(wp_unslash($_POST['ac-center-menu-icon-url']));
				$urls = sanitize_text_field(wp_unslash($_POST['ac-center-menu-url']));
				$description = sanitize_text_field(wp_unslash($_POST['ac-center-menu-description']));
				foreach ($names as $index => $name) {
					if (!empty($name) && !empty($icons[$index]) && !empty($urls[$index])) {
						$menu_items[] = array(
							'name' => sanitize_text_field($name),
							'icon' => esc_url_raw($icons[$index]),
							'url' => esc_url_raw($urls[$index]),
							'description' => sanitize_text_field($description[$index])
						);
					}
				}
			}
			update_option('ac_dashboard_center_menu_items', serialize($menu_items));

			wp_send_json_success(array('message' => 'Data saved successfully.'));
		}

		/** automate connect user dashboard save header menus section setting ajax functions callback */
		public function ac_save_dashboard_header_settings() {
			// Check for nonce security
			if (isset($_POST['nonce'])) {
				$nonce = sanitize_text_field(wp_unslash($_POST['nonce'])); 
				if (empty($nonce) || !wp_verify_nonce($nonce, 'save_ac_dashboard_header_settings_nonce')) {
					wp_send_json_error(array('message' => 'Nonce verification failed.'));
				}
			} else {
				wp_send_json_error(array('message' => 'Nonce is missing.'));
			}

			// Save Dashboard Logo URL
			if(isset($_POST['ac-dash-logo-url'])){
				$ac_dash_logo_url = sanitize_text_field(wp_unslash($_POST['ac-dash-logo-url']));
				update_option('ac_dashboard_logo_url', $ac_dash_logo_url);
			}
			if(isset($_POST['ac-dash-logo-link'])){
				$ac_dash_logo_link = sanitize_text_field(wp_unslash($_POST['ac-dash-logo-link']));
				update_option('ac_dashboard_logo_link', $ac_dash_logo_link);
			}

			// Handle Menu Items
			$menu_items = array();
			if (isset($_POST['ac-header-menu-icon-url']) && isset($_POST['ac-header-menu-url'])) {
				$names = sanitize_text_field(wp_unslash($_POST['ac-header-menu-icon-url']));
				$icons = sanitize_text_field(wp_unslash($_POST['ac-header-menu-url']));

				foreach ($names as $index => $name) {
					if (!empty($name) && !empty($icons[$index])) {
						$menu_items[] = array(
							'name' => sanitize_text_field($name),
							'icon' => esc_url_raw($icons[$index])
						);
					}
				}
			}
			update_option('ac_dashboard_header_menu_items', serialize($menu_items));

			$header_btn = array();
			if (isset($_POST['ac-more-button-name']) && isset($_POST['ac-more-button-link'])) {
				$names = sanitize_text_field(wp_unslash($_POST['ac-more-button-name']));
				$icons = sanitize_text_field(wp_unslash($_POST['ac-more-button-link']));

				foreach ($names as $index => $name) {
					if (!empty($name) && !empty($icons[$index])) {
						$header_btn[] = array(
							'name' => sanitize_text_field($name),
							'icon' => esc_url_raw($icons[$index])
						);
					}
				}
			}
			update_option('ac_dashboard_header_btn_menu_items', serialize($header_btn));

			wp_send_json_success(array('message' => 'Data saved successfully.'));
		}

		/** automate connect user dashborad shortcode 1 function callback */
		public function automate_connect_defult_user_dashborad_func()
		{
			if ( is_user_logged_in() )
			{
				ob_start();
				$ac_custom_css = get_option('ac_custom_css');
				?>
				<style type="text/css">
					<?php
					echo esc_html($ac_custom_css);?>
					?>
					li.woocommerce-MyAccount-navigation-link.woocommerce-MyAccount-navigation-link--pay-your-bill, li.woocommerce-MyAccount-navigation-link.woocommerce-MyAccount-navigation-link--service-request, li.woocommerce-MyAccount-navigation-link.woocommerce-MyAccount-navigation-link--spatial-demo, li.woocommerce-MyAccount-navigation-link.woocommerce-MyAccount-navigation-link--equipment-rental, li.woocommerce-MyAccount-navigation-link.woocommerce-MyAccount-navigation-link--appointments {
						display: none;
					}

					.logged-in #left-menu {
						position: fixed;
						top: 0;
						left: 0;
						width: 170px;
						background-color: #edf2fa;
						overflow-y: auto;
						height: 100vh;
						border-right: 1px solid #edf2fa;
						margin-top: 60px;
						-webkit-transition: all 0.3s ease-in-out;
						-o-transition: all 0.3s ease-in-out;
						transition: all 0.3s ease-in-out;
						overflow-x: hidden;
						z-index: 2;
					}
					#left-menu::-webkit-scrollbar
						{
						width: 5px;
						height: 5px;
					}

					#left-menu::-webkit-scrollbar-track {
						-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
						-webkit-border-radius: 10px;
						border-radius: 10px;
					}

					#left-menu::-webkit-scrollbar-thumb {
						-webkit-border-radius: 10px;
						border-radius: 10px;
						background: #1E6A37;
						-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
					}

					#left-menu::-webkit-scrollbar-thumb:window-inactive {
						background: rgba(255, 255, 255, 0.3);
					}
					#logo img {
						width: 80px;
					}
					#logo a {
						display: flex;
					}
					html{
						margin-top: 0px !important;
					}

					.logged-in  #logo {
						text-align:  center;
						position: fixed;
						top: 0;
						z-index: 2;
						left: 0;
						background-color: #000;
						border-color: #000;
						height: 70px;
						width: 170px;
						font-size: 30px;
						line-height: 2em;
						border-right: 1px solid #000;
						z-index: 4;
						color: #fff;
						padding-left: 15px;
						-webkit-transition: all 0.3s ease-in-out;
						-o-transition: all 0.3s ease-in-out;
						transition: all 0.3s ease-in-out;
						overflow: hidden;
						display: flex;
						align-items: center;
						justify-content: center;
					}
					.logged-in  #header {
						background-color: #000;
						height: 70px;
						border-bottom: 1px solid #000;
						position: fixed;
						top: 0;
						width: 100%;
						z-index: 3;
						display: flex;
						justify-content: space-between;
						align-items: center;
						left: 0;
					}
					#main-content {
						min-height: calc(100vh - 60px);
						clear: both;
						width: 100%;
					}
					#page-container {
						padding-left: 100px;
						padding-top: 13px;
						padding-right: 25px;
						-webkit-transition: all 0.3s ease-in-out;
						-o-transition: all 0.3s ease-in-out;
						transition: all 0.3s ease-in-out;
						margin-block-end: 50px;
					}
					#header .header-right {
						padding-right: 40px;
						display: flex;
						align-items: center;
						gap: 10px;
					}
					#header .header-right div svg, #header .header-right div {
						height: 37px;
						width: 37px
					}
					.fa-stack {
						cursor: pointer;
					}
					.usermain img {
						border-radius: 50%;
						width: 37px;
						height: 37px;
					}
					ul.menu-left{
						padding: 0px !important;
						margin: 0px;

					}
					ul.menu-left li {
						list-style: none;
						margin-top: 15px;
						padding: 7px 3px;
						transition: all .4s ease-in-out;
					}
					ul.menu-left li:hover{
						background-color: #1E6A37;
					}
					ul.menu-left li.active {
						background-color: #1E6A37;
					}
					ul.menu-left li.active .ic-box img, ul.menu-left li:hover .ic-box img {
						filter: invert(1) brightness(2);
					}
					ul.menu-left li.active a{
						color: #fff;
					}
					ul.menu-left li  a{
						display: block;
						color: #1E6A37;
						text-decoration: none;
					}
					.ic-box {
						display: flex;
						align-items: center;
						justify-content: center;
					}
					.ic-box img{
						width: 30px;
						height: 30px;
					}
					.ic-box svg path{
					   fill: #1E6A37;
					}
					.link-title {
						margin-top: 7px;
						font-size: 16px;
						text-transform: capitalize;
						text-align: center;
						line-height: 1em;
					}
					ul.menu-left li:hover a{
						color: #fff;
					}
					.row {
						display: flex;
						flex-wrap: wrap;
						gap: 1rem;
					}

					.card {
						flex: 1 1 calc(25% - 1rem); /* Adjust the card width for desktop */
						box-shadow: 0 4px 8px rgba(0,0,0,0.1);
						border-radius: 8px;
						padding: 1rem;
						background: white;
					}
					.cursorp{
						cursor: pointer;
					}
					.dropbox-hoder,.dropbox-hoder2,.dropbox-hoder3,.dropbox-hoder4,.dropbox-hoder5{
						position: absolute;
						height: auto;
						width: max-content;
						right: 188px;
						margin-top: 9px;
						display: none;
					}
					.dropbox, .dropbox2, .dropbox3, .dropbox4, .dropbox5{
						width: 250px !important;
						min-height:100px;
						max-height: 230px;
						box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
						background-color: #fff;
						border-radius: 10px;
						position: relative;
					}
					.dropbox:before,.dropbox2:before,.dropbox3:before,.dropbox4:before,.dropbox5:before{
						content: '';
						position: absolute;
						  width: 0;
						  height: 0;
						  border-style: solid;
						  border-right: 11px solid transparent;
						  border-left: 11px solid transparent;
						  border-bottom: 12px solid #fff;
						  border-top: 0;
						  bottom: 100%;
						  left: 80%;

					}

					ul.drop_list{
						padding: 0px;
						margin: 0px;
						overflow-y: auto;
						height: 100%;
					}
					.drop_list::-webkit-scrollbar
			        {
				        width: 5px;
				        height: 5px;
			        }

			        .drop_list::-webkit-scrollbar-track {
			            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
			            -webkit-border-radius: 10px;
			            border-radius: 10px;
			        }

			        .drop_list::-webkit-scrollbar-thumb {
			            -webkit-border-radius: 10px;
			            border-radius: 10px;
			            background: #DDD;
			            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
			        }

			        .drop_list::-webkit-scrollbar-thumb:window-inactive {
			            background: rgba(255, 255, 255, 0.3);
			        }
					.drop_list li{
						list-style: none;
					}
					.drop_list li a {
						display:block;
						padding: 8px 20px;
						border-bottom: 1px solid #e5e5e5;
						color: #000;
						text-decoration: none;
						font-size: 14px;
						font-weight: 600;
					}
					.ccx {
						position: relative;
						border-radius: 50%;
						background-color: #fff;
						border:1px solid #268846;
						box-shadow: inset 0px 0px 10px #268846;
					}
					.ccx svg path{
						fill: #268846;
					}


					header, footer, div#wpadminbar, .my-account-hero-section {
						display: none;
					}

					a.bp_back_to_shop_btn {
						color: #fff;
						align-content: center;
						padding-inline: 20px;
						background: -webkit-linear-gradient(180deg, hsla(147, 85%, 29%, 1) 0%, hsla(151, 94%, 21%, 1) 100%);
						border-radius: 40px;
						font-weight: 600;
						line-height: 1.1rem;
						font-family: 'Kumbh Sans';
						height: 37px;
					}
							@media (max-width: 992px) { /* Tablet view */
								.card {
									flex: 1 1 calc(50% - 1rem); /* Adjust the card width for tablet */
								}
							}

							@media (max-width: 768px) { /* Mobile view */
								.card {
									flex: 1 1 100%; /* Adjust the card width for mobile */
								}
							}
					@media only screen and (max-width: 768px) {
					#left-menu, #logo {
						width: 90px !important;
						}
					.link-title {
						display: none;
						}
					#page-container {
						padding-left: 51px;
						padding-right: 3px;
						}
					}
				</style>

				<script type="text/javascript">
					$(document).ready(function() {
						$(".useric").mouseenter(function() {
						// Hide all dropbox holders
						$(".dropbox-hoder").hide();

						// Show the corresponding dropbox holder
						var index = $(this).attr('class').match(/useric(\d*)/)[1];
						$(".dropbox-hoder" + index).show();
						});

						$(".dropbox-hoder").mouseleave(function() {
						// Hide the dropbox holder when the mouse leaves it
						$(this).hide();
						});
					});
				</script>

					<div id="header">
						<div class="header-left float-left">
							<i id="toggle-left-menu" class="fa fa-bars ion-android-menu"></i>

						</div>
						<div class="header-right float-right">
							<?php
							$menu_items = maybe_unserialize(get_option('ac_dashboard_header_menu_items'));
							$button_items = maybe_unserialize(get_option('ac_dashboard_header_btn_menu_items'));
							$dummy_image = site_url('wp-content/plugins/automate-connect/assets/img/user-profile-dummy.jpg');

								if(!empty($button_items))
								{
									foreach($button_items as $button_item)
									{
										?>
										<a href="<?php echo !empty($button_item['icon']) ? esc_url($button_item['icon']) : ''; ?>" class="bp_back_to_shop_btn">
											<?php echo !empty($button_item['name']) ? esc_html($button_item['name']) : ''; ?>
										</a>
										<?php
									}

								}

							if(!empty($menu_items))
							{
								foreach($menu_items as $menu_item => $item)
								{
									?>
									<div class="bullhorn useric<?php echo esc_attr($menu_item); ?> cursorp ccx">
										<a href="<?php echo !empty($item['icon']) ? esc_url($item['icon']) : ''; ?>">
											<img src="<?php echo !empty($item['name']) ? esc_html($item['name']) : ''; ?>" alt="">
										</a>
									</div>
									<?php
								}
							}
							?>
							<div class="usermain useric cursorp ccx">
								<img src="<?php echo esc_url($dummy_image); ?>">
								<div class="dropbox-hoder">
									<div class="dropbox">
									<ul class="drop_list">
										<li>
											<?php
											$current_user = wp_get_current_user();
											$first_name = $current_user->user_firstname;
											$last_name = $current_user->user_lastname;
											$username = $current_user->user_login;

											/** Display the first and last name if available, otherwise show the username */
											if (!empty($first_name) && !empty($last_name)) {
												echo '<a href="#">' . esc_html($first_name . ' ' . $last_name) . '</a>';
											} else {
												echo '<a href="#">' . esc_html($username) . '</a>';
											}
											?>
										</li>
										<li>
											<a href="<?php echo esc_url(wp_logout_url()); ?>">Log Out</a>
										</li>
									</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				 <?php
				return ob_get_clean();
			}
		}

		/** automate connect user dashborad shortcode 2 function callback */
		public function automate_connect_defult_user_dashborad_menu_func()
		{
			if ( is_user_logged_in() )
			{
				$ac_dashboard_logo_url = get_option('ac_dashboard_logo_url');
				$ac_dashboard_logo_link = get_option('ac_dashboard_logo_link');
				ob_start();
				?>
				<div id="logo">
					<a href="<?php echo !empty($ac_dashboard_logo_link) ? esc_url($ac_dashboard_logo_link) : esc_url(site_url()); ?>">
						<img  src="<?php echo !empty($ac_dashboard_logo_url) ? esc_url($ac_dashboard_logo_url) : ''; ?>">
					</a>
				</div>
				<div id="left-menu">

						<ul  class="menu-left">
							<?php
								$ac_user_dash_menus = unserialize(get_option('ac_dashboard_menu_items'));
								if(!empty($ac_user_dash_menus)){
									foreach($ac_user_dash_menus as $ac_user_dash_menu)
									{
										?>
										<li>
											<a href="<?php echo !empty($ac_user_dash_menu['url']) ? esc_url($ac_user_dash_menu['url']) : ''; ?>">
												<div class="ic-box">
													<img src="<?php echo !empty($ac_user_dash_menu['icon']) ? esc_url($ac_user_dash_menu['icon']) : ''; ?>" alt="">
												</div>
												<div class="link-title">
												<?php echo !empty($ac_user_dash_menu['name']) ? esc_html($ac_user_dash_menu['name']) : ''; ?>
												</div>
											</a>
										</li>
										<?php
										}
									}else{
										echo 'No Menus Found....';
									}
							?>
						</ul>

				</div>
				 <?php
				return ob_get_clean();
			 }
		}

		/** automate connect user dashborad shortcode 3 function callback */
		function automate_connect_defult_user_dashborad_center_menu_func()
		{
			if ( is_user_logged_in() )
			{
			ob_start();
			?>
			<style type="text/css">
				
				.dashboard-title h4, .thecardtext{
					margin-bottom: 0px;
					margin-top: 0px;
					font-weight: 600;
					font-size: 1.6rem;
				}
				.thecardtext{
						margin-bottom: 0px;
						margin-top: 0px;
						font-weight: 600;
						font-size: 1.3rem;
						text-transform: capitalize;
						margin-top: 15px;
					}
				.dashboard-title p {
				margin-bottom: 0px;
					margin-top: 0px;
					font-size: 16px;
					color: #595C5F;
					padding: 0px !important;
				}
				.first-row {
					display: flex;
					justify-content: space-between;
					align-items: center;
					border-bottom: 1px solid #ccc;
					padding:60px 0 9px 0;
					margin-block-end: 20px;
				}
				.svg-block {
					border-radius: 10px;
					background-color: #fff;
					width: 70px;
					height: 70px;
					display: flex;
					justify-content: center;
					align-items: center;
				}
				.total-div h3 {
					font-weight: 700;
					font-size: 2rem;
				}
				.growth-div {
					display: grid;
					grid-template-columns: repeat(2, 1fr);
					gap: 1rem;
					margin-top: 50px;
				}

				.inblock {
					background: white;
					padding: 1rem;
					box-shadow: 0 4px 8px rgba(0,0,0,0.1);
					border-radius: 8px;
				}
				.display_line {
					display: grid;
					grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
					gap: 15px;
				}
				.display_large {

					margin-block-start: 40px;

				}
				.display_large .card {
					width: 50%; /* Adjust the card width for desktop */
					box-shadow: 0 4px 8px rgba(0,0,0,0.1);
					border-radius: 8px;
					padding: 1rem;
					background: white;
					font-family: 'Kumbh Sans';
				}
				.display_line .card {
						width: 100%; /* Adjust the card width for desktop */
						box-shadow: 0 4px 8px rgba(0,0,0,0.1);
						border-radius: 8px;
						padding: 0;
						background: white;
						font-family: 'Kumbh Sans';
					}
				.display_line .card.dashshadow a {
						padding: 1rem;
						display: block;
					}
				.display_large .card h6.large_card_title {
					margin-bottom: 0px;
					margin-top: 0px;
					font-weight: 600;
					font-size: 1.5rem;
					font-family: 'Kumbh Sans';
					line-height: 20px;
				}
				.display_large .card .card-title-t{
					display: flex;
					align-items: center;
					gap: 5px;
				}
				.display_large .card   #page-container {
					padding-left: 0 ;
					padding-top: 0;
					padding-right: 0;
					-webkit-transition: all 0.3s ease-in-out;
					-o-transition: all 0.3s ease-in-out;
					transition: all 0.3s ease-in-out;
					margin-block-end: 0;
				}
				@media (max-width: 992px) { /* Tablet view */
					.growth-div {
						grid-template-columns: 1fr;
					}
					.display_large .card {
						width: 100%;
					}
				}

				@media (max-width: 768px) { /* Mobile view */
					.growth-div {
						grid-template-columns: 1fr;
					}
					.display_large .card {
						width: 100%;
					}
				}
				@media (min-width: 1025px) and (max-width: 1300px)  {
					.display_large .card {
						width: 70%;
					}
				}
			</style>
			<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->
			<div class="container-fluid px-4">
			<div class="first-row">
				<div class="col-11">
					<div class="dashboard-title">
						<?php

						$ac_dashboard_center_heading = get_option('ac_dashboard_center_heading');
						$ac_dashboard_center_description = get_option('ac_dashboard_center_description');
						$ac_dashboard_center_menu_items = unserialize(get_option('ac_dashboard_center_menu_items'));
						?>
						<h4 class="mb-0 mt-0"><?php echo !empty($ac_dashboard_center_heading) ? esc_html($ac_dashboard_center_heading) : 'Dashboard'; ?></h4>
						<p class="mt-0 text-muted"><?php echo !empty($ac_dashboard_center_description) ? esc_html($ac_dashboard_center_description) : 'Your current sale summry and activity'; ?></p>
					</div>
				</div>
				<div class="col-1 cursorp">
					<svg id="fi_9497023" height="25" viewBox="0 0 200 200" width="25" xmlns="http://www.w3.org/2000/svg"><g fill="#6ac259"><path d="m180 100c0-44.112-35.888-80.001-79.999-80.001-21.371 0-41.461 8.324-56.57 23.434l18.855 18.856c10.074-10.074 23.468-15.623 37.715-15.623 29.407 0 53.333 23.926 53.333 53.334h-20l33.332 33.334 33.334-33.334z"></path><path d="m100.001 153.334c-29.41 0-53.334-23.926-53.334-53.334h20l-33.333-33.334-33.334 33.334h20c0 44.112 35.887 80.001 80.001 80.001 21.37 0 41.46-8.323 56.568-23.434l-18.856-18.855c-10.073 10.073-23.468 15.622-37.712 15.622z"></path></g></svg>
				</div>
			</div>
			</div>
			<div class="display_line">
				<!-- automate connect user dashboard center menus section start -->
				 <?php
				 	if(!empty($ac_dashboard_center_menu_items))
					{
						foreach($ac_dashboard_center_menu_items as $ac_dashboard_center_menu_item)
						{
							?>
								<div class="card dashshadow ">
									<a target="" href="<?php echo !empty($ac_dashboard_center_menu_item['url']) ? esc_url($ac_dashboard_center_menu_item['url']) : ''; ?>">
										<div class="card-body">
											<div class="svg-block">
											<img src="<?php echo !empty($ac_dashboard_center_menu_item['icon']) ? esc_url($ac_dashboard_center_menu_item['icon']) : ''; ?>" alt="">
											</div>
											<div class="card-title-t text-capitalize">
												<h6 class="thecardtext"><?php echo !empty($ac_dashboard_center_menu_item['name']) ? esc_html($ac_dashboard_center_menu_item['name']) : ''; ?></h6>
											</div>
											<div class="card-description">
												<p class="the_card_description"><?php echo !empty($ac_dashboard_center_menu_item['description']) ? esc_html($ac_dashboard_center_menu_item['description']) : ''; ?></p>
											</div>
											<!-- <div class="total-div">
												<h3 class="">$ 0</h3>
											</div> -->
										</div>
									</a>
								</div>
							<?php
						}
					}else{
						echo '<h2 class="automate-empty-menus">Please Add Menus....</h2>';
					}

				?>
			<!-- automate connect user dashboard center menus section start -->
			</div>
			
			<?php echo do_shortcode('[bethel_power_dashboard_recent_appoin api_key="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2NhdGlvbl9pZCI6ImRKbnIxYmRNR09TY1VySjVHS1I1IiwiY29tcGFueV9pZCI6Ikw5alE1a3l1R0xJeW5uVFRCbHNDIiwidmVyc2lvbiI6MSwiaWF0IjoxNzEyNzA3NjQ5NzM5LCJzdWIiOiJ1c2VyX2lkIn0.SQOIBzJBV7rHJ5_vGsqQTQJ7IkmUTQRlqFCkY00mb-c"]'); ?>
				
			<?php
				return ob_get_clean();
				}else {
					echo '<style>.woocommerce {
					width: 400px;
					background: #f9f9f9;
					margin: 80px auto;
					padding: 0px !important;
				}
				.woocommerce h2 {
					text-align: left;
					color: #000;
					margin-bottom: 0;
					padding: 20px 20px;
					position: relative;
					font-weight: 700;
				}
				.woocommerce form.login {
					border: none !important;
					background-color: #fff;
					margin:0 !important;
				}
				.woocommerce .woocommerce-Input {
					display: block;
					width: 100% !important;
					height: auto;
					padding: 10px 19px !important;
					font-size: 1rem !important;
					line-height: 1.4 !important;
					color: #000 !important;
					background-color: #FFF !important;
					border: 1px solid #ccc !important;
					border-radius: .267rem !important;
				}
				.woocommerce p:not(.has-background):last-of-type {
					padding: 0px !important;
				}
				</style>';
					echo do_shortcode('[woocommerce_my_account]');
				}
		}

		/**Get post type in option value callback function */
		public function get_post_data_option_func()
		{
			if (!empty($_POST['action']) && $_POST['action'] == 'get_post_data_option' && !empty($_POST['post_type']) && !empty($_POST['select_bot_id']))
			{
				$post_types = sanitize_text_field(wp_unslash($_POST['post_type']));
				$bot_id = sanitize_text_field(wp_unslash($_POST['select_bot_id']));
				$options_data = [];
				if(!empty($post_types))
				{
					foreach ($post_types as $post_type)
					{
						$data = get_option('systembot_selected_post_and_file_name_' . $post_type . '_' . $bot_id, true);
						if(!empty($data))
						{
							$options_data[] = $data;
						}
					}
				}
				$post_ids = [];
				if(!empty($options_data))
				{
					foreach($options_data as $option_data)
					{
						if(!empty($option_data['systembot_selected_post_ids']))
						{
							foreach($option_data['systembot_selected_post_ids'] as $post_id)
							{
								$post_ids[] = $post_id;
							}
						}
					}
				}
				$post_ids = array_unique($post_ids);
				if(!empty($post_ids))
				{
					wp_send_json_success(array("rcode" => 1, "retdata" => $post_ids));
				}
			}
			wp_send_json_success(array("rcode" => 0, "retdata" => 'Something went wrong!'));
		}

		/** DND settings change daily notification callback function */
		public function dnd_ac_change_daily_notification_func()
		{
			if(!empty($_POST['action']) && $_POST['action'] == 'dnd_ac_change_daily_notification')
			{
				if(isset($_POST['smsValue']) && isset($_POST['emailValue']))
				{
					$status_sms = sanitize_text_field(wp_unslash($_POST['smsValue']));
					$status_email = sanitize_text_field(wp_unslash($_POST['emailValue']));

					$current_user = wp_get_current_user();
					$user_id = get_current_user_id();
					$user_email     = $current_user->user_email;
					$first_name     = get_user_meta($current_user->ID, 'first_name', true);
					$last_name      = get_user_meta($current_user->ID, 'last_name', true);
					$phone          = get_user_meta($current_user->ID, 'billing_phone', true);
					$company        = get_user_meta($current_user->ID, 'billing_company', true);
					$locationId     = get_option('hft_gohighlevel_locationId');

					$contactsid = get_user_meta( $user_id, 'hft_gohighlevel_contactsID', true );

					$userdata = [];

					$updateuserdata = [];
					if(!empty($contactsid))
					{
						$updateuserdata = [
							'dndSettings' => [
								'Email' => [
									'status' => $status_email,
									'message' => 'Updated by ' . (!empty($first_name) ? $first_name : '') . ' ' . (!empty($last_name) ? $last_name : ''),
									'code' => 'string'
								],
								'SMS' => [
									'status' => $status_sms,
									'message' => 'Updated by ' . (!empty($first_name) ? $first_name : '') . ' ' . (!empty($last_name) ? $last_name : ''),
									'code' => 'string'
								]
							]
						];
						$resp = ACCommonFunctions::ac_update_contacts($contactsid, $updateuserdata);

						if (!empty($resp) && empty($resp['statusCode']))
						{
							$commonstatus = $resp['contact']['dndSettings'];
							$emailstatus = $commonstatus['Email']['status'];
							//$callstatus = $commonstatus['Call']['status'];
							$smsstatus = $commonstatus['SMS']['status'];
							//update_user_meta( $user_id, 'ac_call_status', $callstatus);
							update_user_meta( $user_id, 'ac_email_status', $emailstatus);
							update_user_meta( $user_id, 'ac_sms_status', $smsstatus);
							$success_msg = array("rcode" => 1, "retdata" => 'DND settings saved successfully.');
						}
						else
						{
							$success_msg = array("rcode" => 0, "retdata" => "The user doesn't exist in GoHighLevel.");
						}
					}
					else if(!empty($user_email) && empty($contactsid))
					{
						$userdata = [
							'firstName' => !empty($first_name) ? $first_name : '',
							'lastName' => !empty($last_name) ? $last_name : '',
							'name' => (!empty($first_name) ? $first_name : '') . ' ' . (!empty($last_name) ? $last_name : ''),
							'email' => $user_email,
							'locationId' => $locationId,
							'phone' => !empty($phone) ? $phone : '',
							'timezone' => 'America/Chihuahua',
							'dndSettings' => [
								'Email' => [
									'status' => $status_email,
									'message' => 'Updated by ' . (!empty($first_name) ? $first_name : '') . ' ' . (!empty($last_name) ? $last_name : ''),
									'code' => 'string'
								],
								'SMS' => [
									'status' => $status_sms,
									'message' => 'Updated by ' . (!empty($first_name) ? $first_name : '') . ' ' . (!empty($last_name) ? $last_name : ''),
									'code' => 'string'
								]
							],
							'source' => 'public api',
							'companyName' => !empty($company) ? $company : ''
						];

						$responsedata = ACCommonFunctions::ac_check_ghl_user_exists($locationId, $user_email);
						if(!empty($responsedata))
						{
							update_user_meta($user_id, 'hft_gohighlevel_contactsID', $responsedata['contacts'][0]['id']);
							$success_msg = array("rcode" => 1, "retdata" => 'DND settings saved successfully.');
						}
						else
						{
							$responsedata = ACCommonFunctions::ac_contacts_create($userdata);
							if(!empty($responsedata))
							{
								$commonstatus = $responsedata['contact']['dndSettings'];
								$emailstatus = $commonstatus['Email']['status'];
								//$callstatus = $commonstatus['Call']['status'];
								$smsstatus = $commonstatus['SMS']['status'];
								//update_user_meta( $user_id, 'ac_call_status', $callstatus);
								update_user_meta( $user_id, 'ac_email_status', $emailstatus);
								update_user_meta( $user_id, 'ac_sms_status', $smsstatus);
								update_user_meta($user_id, 'hft_gohighlevel_contactsID', $responsedata['contact']['id']);
								$success_msg = array("rcode" => 1, "retdata" => 'DND settings saved successfully.');
							}
						}
					}

				}

				wp_send_json_success($success_msg);
			}
			wp_send_json_success(array("rcode" => 0, "retdata" => 'Something went wrong!'));
		}

		/** ac ghl code script embed ajax function callback */
		public function view_data_function() {
			global $wpdb;
			$table_name = $wpdb->prefix . 'ac_ghl_inte_form';

			if(isset($_POST['post_id']) && !empty($_POST['post_id'])){
				$post_id = sanitize_text_field(wp_unslash($_POST['post_id']));
				$sql = $wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $post_id);
				$result = $wpdb->get_row($sql, ARRAY_A);

				if ($result) {
					echo wp_json_encode($result);
				} else {
					echo wp_json_encode(array('error' => 'Data not found'));
				}
			}
			wp_die();
		}

		/** ac ghl integ shortcode and function */
		public function ac_ghl_embed_script_func($atts) {
			$atts = shortcode_atts(array(
				'shortcode_id' => '',
			), $atts, 'ac_ghl_embed_script_src');

			if (!empty($atts['shortcode_id'])) {
				$form_data = $this->ac_ghl_get_form_data_by_id($atts['shortcode_id']);
				if (!empty($form_data)) {
					$html_content = $form_data['ac_ghl_form_desc'];
					$decoded_content = html_entity_decode($html_content);
					return $decoded_content;
				} else {
					return 'Shortcode Content Not Found!';
				}
			}
		}

		public function ac_ghl_get_form_data_by_id($id) {
			global $wpdb;
			$table_name = $wpdb->prefix . 'ac_ghl_inte_form';

			$query = $wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id);
			$result = $wpdb->get_row($query, ARRAY_A);

			return $result;
		}


		/** Custom menu woocommerce */
		public function ac_add_custom_account_menu_item_func( $menu_links )
		{
			$menu_links = array_slice( $menu_links, 0, 5, true )
			+ array( 'dnd-settings' => 'DND Settings' )
			+ array_slice( $menu_links, 5, NULL, true );

			return $menu_links;
		}

		/** Custom menu endpoint */
		public function ac_misha_add_endpoint()
		{
			add_rewrite_endpoint( 'dnd-settings', EP_PAGES );
		}
 		/** Custom menu endpoint content */
		public function ac_my_account_endpoint_content()
		{
            echo do_shortcode('[ac_ghl_daily_notification_settings]');
        }

        /* Admin menu callback. */
		public function ac_admin_menu_settings_func()
		{
			$ac_icon_url = ACONNECT_PLUGIN_URL . 'assets/img/automate-portal-logo-icon.png';
			/** Main Menu */
			add_menu_page('Automate Connect', 'Automate Connect', 'manage_options', 'automate-connect', array($this, 'ac_ghl_settings_function'), $ac_icon_url, 10);
			/** Submenu Items */
			/** ac_dashboard_page_function */
			add_submenu_page('automate-connect', 'Dashboard', 'Dashboard', 'manage_options', 'automate-connect', array($this, 'ac_ghl_settings_function'));
			add_submenu_page('automate-connect', 'Recipes', 'Recipes', 'manage_options', 'automate-connect-recipes', array($this, 'ac_recipes_page_function'), 10);
			add_submenu_page('automate-connect', 'Logs', 'Logs', 'manage_options', 'automate-connect-logs', array($this, 'ac_logs_page_function'), 20);
			add_submenu_page('automate-connect', 'Settings', 'Settings', 'manage_options', 'automate-connect-settings', array($this, 'ac_settings_page_function'), 30);
			add_submenu_page('automate-connect', 'Shortcodes', 'Shortcodes', 'manage_options', 'automate-connect-shortcodes', array($this, 'ac_ghl_integration_page_function'), 30);
			add_submenu_page('automate-connect', 'Knowledge Base', 'Knowledge Base', 'manage_options', 'automate-connect-knowledge', array($this, 'ac_knowledge_base_view_page_function'), 40);
		}


		/** ac ghl integration page function */
		public function ac_ghl_integration_page_function()
		{
			include ACONNECT_PLUGIN_PATH.'templates/admin/ac-ghl-integration-form.php';
		}

		/** ac daily note file include and function callback */
		public function ac_ghl_daily_notification_settings_func()
		{
			$user_id = get_current_user_id();
           	$ac_sms     = get_user_meta($user_id, 'ac_sms_status', true);
			$ac_email     = get_user_meta($user_id, 'ac_email_status', true);
			$checked_ac_sms = '';
			$checked_ac_email = '';

			if ($ac_sms !== 'active') {
				$checked_ac_sms = "checked='checked'";
			}

			if ($ac_email !== 'active') {
				$checked_ac_email = "checked='checked'";
			}

			include ACONNECT_PLUGIN_PATH.'templates/admin/ac-ghl-daily-notification.php';
		}

		/** cpt function callback */
		public function ac_knowledge_base_custom_post_register_fun() {
			$labels = array(
				'name'                  => _x( 'Knowledge Base', 'Post Type General Name', 'automate-connect' ),
				'singular_name'         => _x( 'Knowledge Base', 'Post Type Singular Name', 'automate-connect' ),
				'menu_name'             => __( 'Knowledge Base', 'automate-connect' ),
				'name_admin_bar'        => __( 'Knowledge Base', 'automate-connect' ),
				'archives'              => __( 'Knowledge Base Archives', 'automate-connect' ),
				'attributes'            => __( 'Knowledge Base Attributes', 'automate-connect' ),
				'parent_item_colon'     => __( 'Parent Item:', 'automate-connect' ),
				'all_posts'             => __( 'Knowledge Base', 'automate-connect' ),
				'add_new'               => __( 'Add New', 'automate-connect' ),
				'add_new_item'          => __( 'Add New Knowledge Base', 'automate-connect' ),
				'new_item'              => __( 'New Knowledge Base', 'automate-connect' ),
				'edit_item'             => __( 'Edit Knowledge Base', 'automate-connect' ),
				'update_item'           => __( 'Update Knowledge Base', 'automate-connect' ),
				'view_item'             => __( 'View Knowledge Base', 'automate-connect' ),
				'all_items'             => __( 'All Knowledge Base', 'automate-connect' ),
				'view_items'            => __( 'View Knowledge Base', 'automate-connect' ),
				'search_items'          => __( 'Search Knowledge Base', 'automate-connect' ),
				'not_found'             => __( 'Not found', 'automate-connect' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'automate-connect' ),
				'featured_image'        => __( 'Featured Image', 'automate-connect' ),
				'set_featured_image'    => __( 'Set featured image', 'automate-connect' ),
				'remove_featured_image' => __( 'Remove featured image', 'automate-connect' ),
				'use_featured_image'    => __( 'Use as featured image', 'automate-connect' ),
				'insert_into_item'      => __( 'Insert into Knowledge Base', 'automate-connect' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Knowledge Base', 'automate-connect' ),
				'items_list'            => __( 'Knowledge Base list', 'automate-connect' ),
				'items_list_navigation' => __( 'Knowledge Base list navigation', 'automate-connect' ),
				'filter_items_list'     => __( 'Filter Knowledge Base list', 'automate-connect' ),
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'knowledge_base' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
			);

			register_post_type('knowledge_base', $args);
		}

		/** Register Custom Taxonomy */
		public function ac_knowledge_base_custom_taxonomy_register_fun() {
			$labels = array(
				'name'                       => _x( 'Knowledge Categories', 'Taxonomy General Name', 'automate-connect' ),
				'singular_name'              => _x( 'Knowledge Category', 'Taxonomy Singular Name', 'automate-connect' ),
				'menu_name'                  => __( 'Categories', 'automate-connect' ),
				'all_items'                  => __( 'All Categories', 'automate-connect' ),
				'parent_item'                => __( 'Parent Category', 'automate-connect' ),
				'parent_item_colon'          => __( 'Parent Category:', 'automate-connect' ),
				'new_item_name'              => __( 'New Category Name', 'automate-connect' ),
				'add_new_item'               => __( 'Add New Category', 'automate-connect' ),
				'edit_item'                  => __( 'Edit Category', 'automate-connect' ),
				'update_item'                => __( 'Update Category', 'automate-connect' ),
				'view_item'                  => __( 'View Category', 'automate-connect' ),
				'separate_items_with_commas' => __( 'Separate items with commas', 'automate-connect' ),
				'add_or_remove_items'        => __( 'Add or remove items', 'automate-connect' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'automate-connect' ),
				'popular_items'              => __( 'Popular Items', 'automate-connect' ),
				'search_items'               => __( 'Search Items', 'automate-connect' ),
				'not_found'                  => __( 'Not Found', 'automate-connect' ),
				'no_terms'                   => __( 'No items', 'automate-connect' ),
				'items_list'                 => __( 'Items list', 'automate-connect' ),
				'items_list_navigation'      => __( 'Items list navigation', 'automate-connect' ),
			);
			$args = array(
				'labels'                     => $labels,
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
			);

			register_taxonomy('knowledge_category', array('knowledge_base'), $args);
		}

		/** ac ghl knowledge base view function */
		public function ac_knowledge_base_view_page_function()
		{
			include ACONNECT_PLUGIN_PATH.'templates/admin/ac-ghl-knowledge-base-view.php';
		}

		/** ac ghl dashborad function */
		public function ac_ghl_settings_function()
		{
			include ACONNECT_PLUGIN_PATH.'templates/admin/ac-ghl-dash.php';
		}

		/** ac ghl recipes function */
        public function ac_recipes_page_function()
		{
			include ACONNECT_PLUGIN_PATH.'templates/admin/ac-ghl-recipes.php';
		}

		/** ac ghl logs function */
		public function ac_logs_page_function()
		{
			include ACONNECT_PLUGIN_PATH.'templates/admin/ac-ghl-logs.php';
		}

		/** ac ghl settings function */
		public function ac_settings_page_function()
		{
			$error_msg = '';
            $success_msg = '';

            if(isset($_POST['save']) && !empty($_POST['save']))
            {

				$ac_ghl_email_preferences = !empty($_POST['ac_ghl_email_preferences']) ? sanitize_text_field(wp_unslash($_POST['ac_ghl_email_preferences'])) : '';
                $hlwpw_client_id = !empty($_POST['hft_client_id']) ? sanitize_text_field(wp_unslash($_POST['hft_client_id'])) : '';
                $hlwpw_client_secret = !empty($_POST['hft_client_secret']) ? sanitize_text_field(wp_unslash($_POST['hft_client_secret'])) : '';
				$ac_ghl_set_enable = !empty($_POST['ac_ghl_set_enable']) ? sanitize_text_field(wp_unslash($_POST['ac_ghl_set_enable'])) : '';
                $hft_authorization_uri = !empty($_POST['hft_authorization_uri']) ? sanitize_text_field(wp_unslash($_POST['hft_authorization_uri'])) : '';


				update_option('ac_ghl_email_preferences', $ac_ghl_email_preferences);
				update_option('ac_ghl_set_enable', $ac_ghl_set_enable);


				if(!empty($ac_ghl_set_enable) && $ac_ghl_set_enable == 'yes')
				{

					if(!empty($hlwpw_client_id) && !empty($hlwpw_client_secret) && !empty($hft_authorization_uri))
					{

						update_option('ac_ghl_set_enable', $ac_ghl_set_enable);
						update_option('hft_gohighlevel_client_id', $hlwpw_client_id);
						update_option('hft_gohighlevel_client_secret', $hlwpw_client_secret);
						update_option('hft_authorization_uri', $hft_authorization_uri);
						$success_msg = '<span style="color:green;">Success saved settings.</span>';
					}
					else
					{
						$error_msg = '<span style="color:red;">Please enter data.</span>';
					}
				}
            }

            /** One time code, use it to re-authorize and get token. */
            if(isset($_GET['code']))
            {
				$code = sanitize_text_field(wp_unslash($_GET['code']));
                ACCommonFunctions::acgenerateAccessToken_func($code);
                echo "Token generated successfully!";
            }

            $client_id = get_option('hft_gohighlevel_client_id');
            $client_secret = get_option('hft_gohighlevel_client_secret');
            $authorization_uri = get_option('hft_authorization_uri');
			$ac_ghl_set_enabled = get_option('ac_ghl_set_enable');
			$ac_email_preferences = get_option('ac_ghl_email_preferences');

			include ACONNECT_PLUGIN_PATH.'templates/admin/ac-ghl-setting.php';
		}

		/** attendes order ( Event purches ) data get */
		public function send_multi_attendees_data_to_ac_intigration_func( $order_id )
		{
		  $Order_created_att = $this->ac_recipes_ghl_triger_function('Order_created_att');
			if (!empty($Order_created_att)) {
				$attendees_data = [];
				$attendees_data_send = [];
				if ( ! empty( $order_id ) ) {
					$args = array(
						'post_type'      => 'tribe_wooticket',
						'post_status'    => 'publish',
						'posts_per_page' => -1,
						'meta_query'     => array(
							array(
								'key'     => '_tribe_wooticket_order',
								'value'   => $order_id,
								'compare' => '=',
							),
						),
					);
					$attendees = new WP_Query( $args );
					$meta_key = '_tribe_tickets_meta';

					/** Check if the meta key exists */
					$meta_data = get_post_meta($order_id, $meta_key, true);
					$order_type = '';
					if (!empty($meta_data)) {
						$order_type = 'Event';
					} else {
						$order_type = '';
					}
					$event_id = '';
						if ( ! empty( $attendees ) ) {
							foreach ( $attendees->posts as $attendee ) {
								if ( ! empty( $attendee ) ) {
									$attendee_name  = get_post_meta( $attendee->ID, '_tribe_tickets_full_name', true );
									$attendee_email = get_post_meta( $attendee->ID, '_tribe_tickets_email', true );
									$attendee_mobile = get_post_meta( $attendee->ID, '_tribe_tickets_meta', true );

									$event_id = get_post_meta( $attendee->ID, '_tribe_wooticket_event', true );
									$event_start_date = get_post_meta( $event_id, '_EventStartDate', true );
									$event_title = get_the_title($event_id);
									$order = wc_get_order($order_id);
									$user_id = $order->get_customer_id();
									/** Add more fields as needed */
									$attendees_data[] = [
										'event_id'  		 => $event_id,
										'order_id' 			 => $order_id,
										'attendee_name'      => $attendee_name,
										'attendee_email'     => $attendee_email,
										'attendee_mobile'    => $attendee_mobile['mobile'],
										'event_name'  		 => $event_title,
										'order_type'  		 => $order_type,
										'mark_attendee'  	 => 'No',
										'event_date'  		 => $event_start_date
									];

									$attendees_data_send[] = [
										'event_id'  		 => $event_id,
										'order_id' 			 => $order_id,
										'attendee_name'      => $attendee_name,
										'attendee_email'     => $attendee_email,
										'attendee_mobile'    => $attendee_mobile['mobile'],
										'event_name'  		 => $event_title,
										'edit_date'          => current_time('mysql'),
										'trigger_status'     => 'success',
										'trigger_type'       => 'Attendee',
									];
								}
							}


							foreach ($Order_created_att as $Order_created_at) {
								$ac_order_created_at = $Order_created_at['webhook'];

								/** Serialize the data before storing it in the database */
								foreach($attendees_data_send as $attendees_data_tbl)
								{
									$serialized_data = serialize($attendees_data);
									/** Insert or update data in custom table */
									global $wpdb;
									$table_name = $wpdb->prefix . 'ac_atte_log';
									/** If entry doesn't exist, insert it */
									$wpdb->insert($table_name, ['log_data' => $serialized_data] + $attendees_data_tbl);
								}
								foreach($attendees_data as $attendees_data_wdo)
								{
									$responses = $this->ac_triger_data_function($ac_order_created_at, $attendees_data_wdo);
								}
						}
					}
				}
			}
		}

		/** ac subscription status change triger function */
		public function ac_get_customer_data_from_change_subscription_status($subscription_id, $old_status, $new_status)
		{
			$Subscription_Status = $this->ac_recipes_ghl_triger_function('Subscription_Status_Change');
			/** Check if the subscription status has changed */
			if ($old_status !== $new_status) {
				/** Get subscription object */
				$subscription = wcs_get_subscription($subscription_id);
				/** Get order ID */
				$order_id = $subscription->get_parent_id();
				/** Get user ID */
				$user_id = $subscription->get_customer_id();
				/** Get subscription ID */
				$subscription_id = $subscription->get_id();
				/** Get user info */
				$user_info = get_userdata($user_id);
				$user_email = $user_info->user_email;
				$user_first_name = $user_info->first_name;
				$user_last_name = $user_info->last_name;

				/** Determine if it's a new order or a renewal */
				$order_action = '';
				if($old_status == 'active')
				{
					$order_action = 'New Order';
				}else
				{
					$order_action = 'Renewal';
				}

				/** Get product name */
				$product_names = [];
				foreach ($subscription->get_items() as $item) {
					$product_names[] = $item->get_name();
				}

				foreach ($product_names as $product_name) {
					$subsc_send_status_data = [
						'order_id'         		=> 	$order_id,
						'subscription_id' 		=>	$subscription_id,
						'customer_id'        	=> 	$user_id,
						'old_status'      		=> 	$new_status,
						'new_status'      		=> 	$old_status,
						'order_type'            => 'subscription',
						'order_action' 			=> 	$order_action,
						'status_change_date'    => current_time('mysql'),
						'billing_details' => [
								'first_name'  => $subscription->get_billing_first_name(),
								'last_name'   => $subscription->get_billing_last_name(),
								'company'     => $subscription->get_billing_company(),
								'address_1'   => $subscription->get_billing_address_1(),
								'address_2'   => $subscription->get_billing_address_2(),
								'city'        => $subscription->get_billing_city(),
								'state'       => $subscription->get_billing_state(),
								'postcode'    => $subscription->get_billing_postcode(),
								'country'     => $subscription->get_billing_country(),
								'email'       => $subscription->get_billing_email(),
								'phone'       => $subscription->get_billing_phone(),
						]
					];

					$subsc_status_data = [
						'order_id'         		=> 	$order_id,
						'subscription_id' 		=> 	$subscription_id,
						'user_id'        		=> 	$user_id,
						'email'      			=> 	$user_email,
						'order_name'      		=> 	$product_name,
						'first_name'      		=> 	$user_first_name,
						'last_name'       		=> 	$user_last_name,
						'order_status'      	=> 	$old_status,
						'edit_date'         	=> 	current_time('mysql'),
						'trigger_status'      	=> 	'success',
						'trigger_type'      	=> 	'Subscription Status Change',
					];

					if (!empty($Subscription_Status)) {
						foreach ($Subscription_Status as $status) {
							$ac_sub_status = $status['webhook'];
							/** Serialize the data before storing it in the database */
							$serialized_data = serialize($subsc_send_status_data);
							/** Insert or update data in custom table */
							global $wpdb;
							$table_name = $wpdb->prefix . 'ac_order_sub_log';
							/** If entry doesn't exist, insert it */
							$wpdb->insert($table_name, ['log_data' => $serialized_data] + $subsc_status_data);
							$responses = $this->ac_triger_data_function($ac_sub_status, $subsc_send_status_data);
						}
					}
				}
			}
		}

		/** ac create user triger function */
		public function ac_get_customer_data_from_create_user($user_id)
		{
			$User_created = $this->ac_recipes_ghl_triger_function('User_created');
			$user_data = get_userdata($user_id);
    		$user_email = $user_data->user_email;
			$create_user_data = [
				'user_id' 			=> $user_id,
				'first_name' 		=> get_user_meta($user_id, 'first_name', true),
				'last_name' 		=> get_user_meta($user_id, 'last_name', true),
				'user_nicename' 	=> get_user_meta($user_id, 'user_nicename', true),
				'user_email' 		=> $user_email,
				'user_registered' 	=> get_userdata($user_id)->user_registered,
				'display_name' 		=> get_user_meta($user_id, 'display_name', true),
				'roles' 			=> get_userdata($user_id)->roles,
				'user_meta' => []
			];

			$create_user_data_send = [
				'user_id'         	=> $user_id,
				'email'      		=> $user_email,
				'first_name'      	=> get_user_meta($user_id, 'first_name', true),
				'last_name'       	=> get_user_meta($user_id, 'last_name', true),
				'trigger_status'    => 'success',
				'trigger_type'      => 'User Create',
				'edit_date'         => current_time('mysql'),
			];

			$dynamic_user_meta = get_user_meta($user_id);
			if (!empty($dynamic_user_meta)) {
				foreach ($dynamic_user_meta as $meta_key => $meta_values) {
					$create_user_data['user_meta'][$meta_key] = $meta_values[0];
				}
			}
			if (!empty($User_created)) {
					foreach ($User_created as $User_create) {
						$ac_user_create = $User_create['webhook'];
						$serialized_data = serialize($create_user_data);
						/** Insert data in custom table */
						global $wpdb;
						$table_name = $wpdb->prefix . 'ac_user_add_update_log';
						$wpdb->insert($table_name, ['log_data' => $serialized_data] + $create_user_data_send);
						$responses = $this->ac_triger_data_function($ac_user_create, $create_user_data);
					}
				}
		}

		/** ac update user triger function */
		public function ac_get_customer_data_from_update_user($user_id)
		{
			$User_updated = $this->ac_recipes_ghl_triger_function('User_updated');
			if (!empty($User_updated)) {
				$user_data = get_userdata($user_id);
				$user_email = $user_data->user_email;

				$update_user_data = [
					'ID'               => $user_id,
					'first_name'       => get_user_meta($user_id, 'first_name', true),
					'last_name'        => get_user_meta($user_id, 'last_name', true),
					'user_nicename'    => get_user_meta($user_id, 'user_nicename', true),
					'user_email'       => $user_email,
					'user_registered'  => $user_data->user_registered,
					'display_name'     => get_user_meta($user_id, 'display_name', true),
					'roles' 			=> get_userdata($user_id)->roles[0],
					'user_meta' => []
				];

				$update_user_data_send = [
					'user_id'          => $user_id,
					'email'            => $user_email,
					'first_name'       => get_user_meta($user_id, 'first_name', true),
					'last_name'        => get_user_meta($user_id, 'last_name', true),
					'trigger_status'   => 'success',
					'trigger_type'     => 'User Update',
					'edit_date'        => current_time('mysql'),
				];

				$user_meta_data = get_user_meta($user_id);
				if (!empty($user_meta_data)) {
					foreach ($user_meta_data as $meta_key => $meta_values) {
						$update_user_data['user_meta'][$meta_key] = $meta_values[0];
					}
				}

				foreach ($User_updated as $User_update) {
					$ac_user_update = $User_update['webhook'];
					$serialized_data = serialize($update_user_data);
					global $wpdb;
						$table_name = $wpdb->prefix . 'ac_user_add_update_log';
						/** some issues in hook */
						//$wpdb->insert($table_name, ['log_data' => $serialized_data] + $update_user_data_send);
						//$responses = $this->ac_triger_data_function($ac_user_update, $update_user_data);
				}
			}
		}

		/** ac create new order triger function */
		public function ac_get_customer_data_from_order($order_id)
		{
			$Order_created = $this->ac_recipes_ghl_triger_function('Order_created');
			if (!empty($Order_created)) {
				$order = wc_get_order($order_id);
				$user_id = $order->get_customer_id();
				$items = $order->get_items();
				$product_titles = [];
				/** Coupon details initialization */
				$coupon_details = [];
				$total_discount_amount = 0;

				foreach ($items as $item_id => $item) {
					$product = $item->get_product();
					if ($product) {
						$product_titles[] = $product->get_title();
					}
				}
				$meta_key = '_tribe_tickets_meta';
				$meta_data = get_post_meta($order_id, $meta_key, true);
				$order_member_type = '';
				if (!empty($meta_data)) {
					$order_member_type = 'Event';
				} elseif (function_exists('wcs_order_contains_subscription')) {
					if (wcs_order_contains_subscription($order_id)) {
						$order_member_type = 'Subscription';
					} else {
						$order_member_type = 'Other Order';
					}
				} else {
					$order_member_type = 'Other Order';
				}
				

				/** Retrieve applied coupons */
				$applied_coupons = $order->get_coupon_codes();

				/** Limit to maximum two coupons */
				$applied_coupons = array_slice($applied_coupons, 0, 2);

				/** Loop through applied coupons to get details */
				$index = 1;
				foreach ($applied_coupons as $coupon_code) {
					$coupon = new WC_Coupon($coupon_code);
					$coupon_details["applied_coupons_$index"] = [
						'code' => $coupon->get_code(),
						'amount' => $coupon->get_amount(),
						'type' => $coupon->get_discount_type(),
						'discount_amount' => $coupon->get_amount(),
					];
					/** Add to total discount amount */
					$total_discount_amount += $coupon->get_amount();
					$index++;
				}

				$customer_data = [
					'order_id'         => $order_id,
					'order_status'     => $order->get_status(),
					'total'            => $order->get_total(),
					'customer_id'      => $order->get_user_id(),
					'payment_method'   => $order->get_payment_method(),
					'product_title'    => $product_titles[0],
					'order_type'       => $order_member_type,
					'billing_details'  => [
						'first_name'  => $order->get_billing_first_name(),
						'last_name'   => $order->get_billing_last_name(),
						'company'     => $order->get_billing_company(),
						'address_1'   => $order->get_billing_address_1(),
						'address_2'   => $order->get_billing_address_2(),
						'city'        => $order->get_billing_city(),
						'state'       => $order->get_billing_state(),
						'postcode'    => $order->get_billing_postcode(),
						'country'     => $order->get_billing_country(),
						'email'       => $order->get_billing_email(),
						'phone'       => $order->get_billing_phone(),
					],
					'total_discount'   => $total_discount_amount, /** Total discount applied */
				];

				$customer_data = array_merge($customer_data, $coupon_details);

				$product_names = [];
				foreach ($order->get_items() as $item) {
					$product_names[] = $item->get_name();
				}

				$order_create_data = null;
				$subscriptions = wcs_get_subscriptions_for_order($order_id);

				if (!empty($product_names)) {
					$first_product_name = reset($product_names);

					$order_create_data = [
						'order_id'        => $order_id,
						'subscription_id' => '',
						'user_id'         => $user_id,
						'email'           => $order->get_billing_email(),
						'order_name'      => $first_product_name,
						'first_name'      => $order->get_billing_first_name(),
						'last_name'       => $order->get_billing_last_name(),
						'order_status'    => $order->get_status(),
						'trigger_status'  => 'success',
						'trigger_type'    => 'Order',
						'edit_date'       => current_time('mysql'),
					];

					if (!empty($Order_created)) {
						foreach ($Order_created as $Order_create) {
							$ac_order_created = $Order_create['webhook'];
							/** Serialize the data before storing it in the database */
							$serialized_data = serialize($customer_data);
							/** Insert data in custom table */
							global $wpdb;
							$table_name = $wpdb->prefix . 'ac_order_sub_log';
							$wpdb->insert($table_name, ['log_data' => $serialized_data] + $order_create_data);
							$responses = $this->ac_triger_data_function($ac_order_created, $customer_data);
						}
					}
				}
			}
		}

		/** ac create new subscription triger function */
		public function ac_get_customer_data_from_create_subscription($order_id)
		{
			$Subscription_created = $this->ac_recipes_ghl_triger_function('Subscription_created');
			/** get order to subscription id  */
			if (!empty($Subscription_created)) {
				$subscriptions_order_id = wcs_get_subscriptions_for_order($order_id);
				foreach ($subscriptions_order_id as $subscription) {
					$subscription_id = $subscription->get_id();
					/** get subscription id to subscriptioin data */
					$subscription = wcs_get_subscription($subscription_id);
					$order = wc_get_order($order_id);
					$items = $order->get_items();
					$product_ids = [];
					foreach ($items as $item) {
						$product_id = $item->get_product_id();
						$product_ids[] = $product_id;
					}
					$product_ids = $product_ids[0];
					$product = wc_get_product($product_id);

					/** Get product category IDs */
					$category_ids = wc_get_product_term_ids($product_ids, 'product_cat');

					/**  Get product category names */
					$category_names = [];
					foreach ($category_ids as $category_id) {
						$term = get_term($category_id, 'product_cat');
						if ($term && !is_wp_error($term)) {
							$category_names[] = $term->name;
						}
					}

					/** Get user ID */
					$user_id = $subscription->get_customer_id();
					$billing_period = $subscription->get_billing_period();
					$billing_interval = $subscription->get_billing_interval();
					$subscription_type = $billing_interval . ' ' . $billing_period;
					if (!empty($subscription)) {
						$items = $subscription->get_items();

						$product_names = [];
						foreach ($items as $item) {
							$product = $item->get_product();
							if ($product) {
								$product_names[] = $product->get_name();
							}
						}

						// Get purchase and renewal dates
						$purchase_date = $subscription->get_date('start');  // Purchase date
						$renewal_date = $subscription->get_date('next_payment');  // Renewal date

						$meta_key = '_tribe_tickets_meta';
						$meta_data = get_post_meta($order_id, $meta_key, true);
						$order_member_type = '';
						if (!empty($meta_data)) {
							$order_member_type = 'Event';
						} elseif (wcs_order_contains_subscription($order_id)) {
							$order_member_type = 'Subscription';
						}else{
							$order_member_type = 'Other Order';
						}

						$subsc_data = [
							'subscription_id' 			=> $subscription_id,
							'product_title'   			=> $product_names[0],
							'subscription_status'  		=> $subscription->get_status(),
							'subscription_type' 		=> $subscription_type,
							'subscription_category' 	=> $category_names[0],
							'order_type' 				=> $order_member_type,
							'customer_id'        		=> $user_id,
							'purchase_date'            	=> $purchase_date,
                    		'renewal_date'             	=> $renewal_date,
							'billing_details' => [
								'first_name'  => $subscription->get_billing_first_name(),
								'last_name'   => $subscription->get_billing_last_name(),
								'company'     => $subscription->get_billing_company(),
								'address_1'   => $subscription->get_billing_address_1(),
								'address_2'   => $subscription->get_billing_address_2(),
								'city'        => $subscription->get_billing_city(),
								'state'       => $subscription->get_billing_state(),
								'postcode'    => $subscription->get_billing_postcode(),
								'country'     => $subscription->get_billing_country(),
								'email'       => $subscription->get_billing_email(),
								'phone'       => $subscription->get_billing_phone(),
							],
						];

						$subsc_create_data = [
							'order_id'         	=> $order_id,
							'subscription_id' 	=> $subscription_id,
							'user_id'        	=> $user_id,
							'email'      		=> $subscription->get_billing_email(),
							'order_name'      	=> $product_names[0],
							'first_name'      	=> $subscription->get_billing_first_name(),
							'last_name'       	=> $subscription->get_billing_last_name(),
							'order_status'      => 'Active',
							'edit_date'         => current_time('mysql'),
							'trigger_status'    => 'success',
							'trigger_type'      => 'Subscription',
						];


						foreach ($Subscription_created as $Subscription_create) {
							$ac_subscription_created = $Subscription_create['webhook'];
							/** Serialize the data before storing it in the database */
							$serialized_data = serialize($subsc_data);
							/** Insert or update data in custom table */
							global $wpdb;
							$table_name = $wpdb->prefix . 'ac_order_sub_log';
							/** If entry doesn't exist, insert it */
							$wpdb->insert($table_name, ['log_data' => $serialized_data] + $subsc_create_data);
							$responses = $this->ac_triger_data_function($ac_subscription_created, $subsc_data);
						}
					}
				}
			}
		}

		/** posts create and save trigers function */
		public function ac_ghl_triger_run_on_cpt_func($post_id, $post, $update)
		{
			$doing_autosave = (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE);

			if ($doing_autosave || wp_is_post_revision($post_id) || wp_doing_cron() || wp_doing_ajax()) {
				return;
			}

			if ($post->post_status != 'publish') {
				return;
			}

			$existing_timestamp = get_post_meta($post_id, 'ac_ghl_save_post_time', true);

			if (!$existing_timestamp) {
				$current_timestamp = current_time('timestamp');
				add_post_meta($post_id, 'ac_ghl_save_post_time', $current_timestamp, true);
			}

			$post_id = $post->ID;
			$post_status = $post->post_status;
			$post = get_post($post_id);
			$post_type = $post->post_type;
			$post_save_trigers_data = $this->ac_recipes_ghl_triger_function($post_type . '|||created');
			
			$formatted_time = gmdate('H:i:s', get_post_meta($post_id, 'ac_ghl_save_post_time', true));

			$taxonomies = get_object_taxonomies(get_post($post_id));
			$first_taxonomy_categories = array();
			foreach ($taxonomies as $taxonomy) {
				$categories = get_the_terms($post_id, $taxonomy);

				if ($categories && !is_wp_error($categories)) {
					$category_names = wp_list_pluck($categories, 'name');
					/** some issues in line */
					$first_taxonomy_categories = implode(', ', $category_names);
					break;
				}
			}

			$data_to_insert = [
				'post_id'       => $post_id,
				'post_title'    => $post->post_title,
				'post_link'     => get_permalink($post_id),
				'post_excerpt'  => $post->post_excerpt,
				'category'      => $first_taxonomy_categories,
				'post_type'     => $post_type,
				'post_status'   => $post_status,
				'author'        => [
					'name'  => get_the_author_meta('display_name', $post->post_author),
					'email' => get_the_author_meta('user_email', $post->post_author),
				],
				'post_date'     => $post->post_date,
			];


			$create_post_data_send = [
				'post_id'       => $post_id,
				'email'         => get_the_author_meta('user_email', $post->post_author),
				'post_title'    => $post->post_title,
				'trigger_status'=> 'Success',
				'trigger_type'  => 'Post Create',
				'post_type'     => $post_type,
				'edit_date'     => current_time('mysql'),
			];

			/** Check if the data has already been inserted */
			if (!get_post_meta($post_id, 'ac_data_inserted', true)) {
				if (!empty($post_save_trigers_data)) {
					foreach ($post_save_trigers_data as $post_save_trigers) {
						$ac_post_save_trigers = $post_save_trigers['webhook'];
						$serialized_data = serialize($data_to_insert);
						/** Insert data in custom table */
						global $wpdb;
						$table_name = $wpdb->prefix . 'ac_posts_log';
						$wpdb->insert($table_name, ['log_data' => $serialized_data] + $create_post_data_send);
						$responses = $this->ac_triger_data_function($ac_post_save_trigers, $data_to_insert);
					}
					/** Set a flag indicating that data has been inserted */
					update_post_meta($post_id, 'ac_data_inserted', true);
				}
			}
		}

		/** update any post type trigers function */
		public function ac_ghl_triger_run_on_cpt_post_update_func($post_id, $post, $update)
		{
			if ($post->post_status != 'publish') {
				return;
			}

			if ($update != 1) {
				return;
			}

			$post_update_trigers_data = $this->ac_recipes_ghl_triger_function($post_type . '|||updated');
			$post_id = $post->ID;
			$post_status = $post->post_status;
			$post = get_post($post_id);
			$post_type = $post->post_type;

			$taxonomies = get_object_taxonomies(get_post($post_id));
			$first_taxonomy_categories = array();
			foreach ($taxonomies as $taxonomy) {
				$categories = get_the_terms($post_id, $taxonomy);

				if ($categories && !is_wp_error($categories)) {
					$category_names = wp_list_pluck($categories, 'name');
					$first_taxonomy_categories = implode(', ', $category_names);
					break;
				}
			}
			$update_data_to_insert = [
			'post_id' 		=> $post_id,
			'post_title' 	=> $post->post_title,
			'post_link' 	=> get_permalink($post_id),
			'post_excerpt' 	=> $post->post_excerpt,
			'category' 		=> $first_taxonomy_categories,
			'post_type' 	=> $post_type,
			'post_status' 	=> $post_status,
			'author' => array(
				'name' => get_the_author_meta('display_name', $post->post_author),
				'email' => get_the_author_meta('user_email', $post->post_author),
			),
			'post_date' => $post->post_date,
			];


			$update_post_data_send = [
				'post_id'       => $post_id,
				'email'         => get_the_author_meta('user_email', $post->post_author),
				'post_title'    => $post->post_title,
				'trigger_status'=> 'Success',
				'trigger_type'  => 'Post Update',
				'post_type'     => $post_type,
				'edit_date'     => current_time('mysql'),
			];


			if (!empty($post_update_trigers_data)) {
				foreach ($post_update_trigers_data as $post_update_trigers) {
					$ac_post_update_trigers = $post_update_trigers['webhook'];
					/** Serialize the data before storing it in the database */
					$serialized_data = serialize($update_data_to_insert);
					/** Insert or update data in custom table */
					global $wpdb;
					$table_name = $wpdb->prefix . 'ac_posts_log';
					$existing_entry = $wpdb->get_row("SELECT * FROM $table_name WHERE post_id = $post_id");
					/** Check if the existing entry's data is different from the updated data */
					$existing_data = ($existing_entry) ? unserialize($existing_entry->log_data) : null;

					if ($existing_entry) {
						/*** post update hook run three time ( Some Issues ) */
						//$wpdb->insert($table_name, ['log_data' => $serialized_data] + $update_post_data_send);
					}
				}
			}
		}

		/** automate connect order payment failed function */
		public function ac_create_subscription_get_payemnt_status($order_id)
		{
			if ( ! $order_id ) {
				return;
			}

			$Order_pay_failed = $this->ac_recipes_ghl_triger_function('Order_payment_failed');
			if (!empty($Order_pay_failed))
			{
				$order = wc_get_order($order_id);
				$user_id = $order->get_customer_id();
				$items = $order->get_items();
				$product_titles = [];

				foreach ($items as $item_id => $item) {
					$product = $item->get_product();
					if ($product) {
						$product_titles[] = $product->get_title();
					}
				}
				$customer_failed_data = [
					'order_id' 			=> 	$order_id,
					'order_status'  	=> 	$order->get_status(),
					'total'      		=> 	$order->get_total(),
					'customer_id'  		=> 	$order->get_user_id(),
					'payment_method'  	=> 	$order->get_payment_method(),
					'payment_status' 	=> 'Failed',
					'product_title'  	=> 	$product_titles[0],
					'billing_details' => [
						'first_name' 	=> 	$order->get_billing_first_name(),
						'last_name' 	=> 	$order->get_billing_last_name(),
						'company' 		=> 	$order->get_billing_company(),
						'address_1' 	=> 	$order->get_billing_address_1(),
						'address_2' 	=> 	$order->get_billing_address_2(),
						'city' 			=> 	$order->get_billing_city(),
						'state' 		=> 	$order->get_billing_state(),
						'postcode' 		=> 	$order->get_billing_postcode(),
						'country' 		=> 	$order->get_billing_country(),
						'email' 		=> 	$order->get_billing_email(),
						'phone' 		=> 	$order->get_billing_phone(),
					],
				];


				$product_names = [];
				foreach ($order->get_items() as $item) {
					$product_names[] = $item->get_name();
				}

				$subscriptions = wcs_get_subscriptions_for_order($order_id);
				$subscription_id = array();
				if (!empty($subscriptions)) {
					foreach ($subscriptions as $subscription) {
						$subscription_id[] = $subscription->get_id();
					}
				}

				$subscription_id = array_filter($subscription_id);
				$order_create_failed_data = null;
				if (!empty($product_names)) {
					$first_product_name = reset($product_names);
					$order_create_failed_data = [
						'order_id'        => $order_id,
						'subscription_id' => $subscription_id[0],
						'user_id'         => $user_id,
						'email'           => $order->get_billing_email(),
						'order_name'      => $first_product_name,
						'first_name'      => $order->get_billing_first_name(),
						'last_name'       => $order->get_billing_last_name(),
						'order_status'    => $order->get_status(),
						'trigger_status'  => 'success',
						'trigger_type'    => 'Order Payment Failed',
						'edit_date'       => current_time('mysql'),
					];

					foreach ($Order_pay_failed as $Order_pay_fail) {
						$ac_Order_pay_fail = $Order_pay_fail['webhook'];
						/** Serialize the data before storing it in the database */
						$serialized_data = serialize($customer_failed_data);
						/** Insert data in custom table */
						global $wpdb;
						$table_name = $wpdb->prefix . 'ac_order_sub_log';
						$wpdb->insert($table_name, ['log_data' => $serialized_data] + $order_create_failed_data);
						$responses = $this->ac_triger_data_function($ac_Order_pay_fail, $customer_failed_data);
					}
				}
			}
		}

		/** ac create event get payemnt status function */
		public function ac_create_event_get_payemnt_status($order_id)
		{
			if ( ! $order_id ) {
				return;
			}

			$event_pay_failed = $this->ac_recipes_ghl_triger_function('event_Order_payment_failed');
			if (!empty($event_pay_failed))
			{
				$order = wc_get_order($order_id);
				$user_id = $order->get_customer_id();

				$ticket_ids_array = get_post_meta($order_id, '_tribe_tickets_meta', true);
				if(!empty($ticket_ids_array))
				{
					$ticket_id = '';
					if (!empty($ticket_ids_array)) {
						$ticket_keys = array_keys($ticket_ids_array);
						$ticket_id =  implode(', ', $ticket_keys);
					} else {
						$ticket_id = '';
					}
					$event_id = get_post_meta($ticket_id, '_tribe_wooticket_for_event', true);
					$event_title = get_the_title($event_id);

					$meta_key = '_tribe_tickets_meta';
						$meta_data = get_post_meta($order_id, $meta_key, true);
						$order_member_type = '';
						if (!empty($meta_data)) {
							$order_member_type = 'Event';
						} elseif (wcs_order_contains_subscription($order_id)) {
							$order_member_type = 'Subscription';
						}else{
							$order_member_type = 'Other Order';
						}

					$event_failed_data = [
						'order_id' 			=> 	$order_id,
						'order_status'  	=> 	$order->get_status(),
						'total'      		=> 	$order->get_total(),
						'customer_id'  		=> 	$order->get_user_id(),
						'payment_method'  	=> 	$order->get_payment_method(),
						'payment_status' 	=> 'Failed',
						'event_title'  		=> 	$event_title,
						'order_type'  		=> 	$order_member_type,
						'billing_details' => [
							'first_name' 	=> 	$order->get_billing_first_name(),
							'last_name' 	=> 	$order->get_billing_last_name(),
							'company' 		=> 	$order->get_billing_company(),
							'address_1' 	=> 	$order->get_billing_address_1(),
							'address_2' 	=> 	$order->get_billing_address_2(),
							'city' 			=> 	$order->get_billing_city(),
							'state' 		=> 	$order->get_billing_state(),
							'postcode' 		=> 	$order->get_billing_postcode(),
							'country' 		=> 	$order->get_billing_country(),
							'email' 		=> 	$order->get_billing_email(),
							'phone' 		=> 	$order->get_billing_phone(),
						],
					];

					if (!empty($event_title)) {
						$event_create_failed_data = [
							'order_id'        => $order_id,
							'subscription_id' => '',
							'user_id'         => $user_id,
							'email'           => $order->get_billing_email(),
							'order_name'      => $event_title,
							'first_name'      => $order->get_billing_first_name(),
							'last_name'       => $order->get_billing_last_name(),
							'order_status'    => $order->get_status(),
							'trigger_status'  => 'success',
							'trigger_type'    => 'Event Ticket payment Failed',
							'edit_date'       => current_time('mysql'),
						];

						foreach ($event_pay_failed as $event_pay_fail) {
							$ac_event_pay_fail = $event_pay_fail['webhook'];
							/** Serialize the data before storing it in the database */
							$serialized_data = serialize($event_failed_data);
							/** Insert data in custom table */
							global $wpdb;
							$table_name = $wpdb->prefix . 'ac_order_sub_log';
							$wpdb->insert($table_name, ['log_data' => $serialized_data] + $event_create_failed_data);
							$responses = $this->ac_triger_data_function($ac_event_pay_fail, $event_failed_data);
						}
					}
				}
			}
		}

		/** all trigers get recipes data function */
		public function ac_recipes_ghl_triger_function($trigger_name)
		{
			global $wpdb;
			$table_name = $wpdb->prefix . 'ac_ghl_recipes';
			$sql = $wpdb->prepare("SELECT * FROM $table_name WHERE recipes_trigger LIKE %s", $trigger_name);
			$results_from_table = $wpdb->get_results($sql, ARRAY_A);

			if (!empty($results_from_table)) {
				return $results_from_table;
			}

			return "";
		}

		/** send data on webhook function */
		public function ac_triger_data_function($ac_webhook_url, $ac_data)
		{
			if(!empty($ac_webhook_url) && !empty($ac_data))
			{
				$responses = wp_remote_post($ac_webhook_url, [
					'body'    => wp_json_encode($ac_data),
					'headers' => ['Content-Type' => 'application/json'],
				]);
				$responseresultjson = json_decode(wp_remote_retrieve_body($responses),true);
				return $responseresultjson;
			}
			return false;
		}

	}
	$executeclass = new ACBackendCommon();
}
