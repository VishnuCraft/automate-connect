<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}
?>
<style type="text/css">
	
	.body-main {
		background-color: #559da81c;
    margin-top: 50px;
    border-radius: 15px;
	}
	.header {
		background-color: #125166;
		border-radius: 10px 10px 0 0;
		padding: 25px 30px;
		
	}
	
	.ap-logo img {
		width: 190px;
	}
	.header-inner {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.h-colinner {
		display:flex;
		justify-content:space-between;
	}
	.h-colinner svg path{
		fill:#fff;
	}
	.svgbox {
		width:60px;
		text-align:center;
	}
	.online-status {
		display: flex;
		align-items: center;
		gap: 5px;
		color:#fff;
	}
	.welcome-box {
		
	}
	.welcome-box h2 {
		font-size:3rem;
		text-align:center;
		color: #125166;
	}
	
	
	.login-wrap, .info-box{
		width: auto;
		padding: 30px;
		border-radius: 19px;
		background-color: #fff;
		
		
	}
	.svg-login svg {
		width:30px;
		height:30px;
	}
	.svg-login svg path{
		fill: #125166;
	}
	ul.header-list {
		display: flex;
		align-items: center;
		gap: 10px;
		border-bottom: solid 1px #ccc;
		padding: 0 0 15px 0;
		margin: 0 0 25px 0;
	}
	ul.header-list li {
		display: flex;
		align-items: center;
		gap: 10px;
		width: max-content;
		border:1px solid #ccc;
		border-radius: 7px;
		padding: 5px 30px ;
		text-align: center;
		justify-content: center;
		cursor: pointer;
		transition: all .3s ease-in-out;
		width:calc(100% - 10px);
		list-style: none;
	}
	.form-control {
    display: block;
    width: 100%;
    height: auto;
    padding: 15px 19px !important;
    font-size: 1rem;
    line-height: 1.4 !important;
    color: #475F7B !important;
    background-color: #dfe7e924  !important;
    border: 1px solid #DFE3E7 !important;
    border-radius: .267rem !important;
    -webkit-transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
	}
	.form-control:focus {
	    color: #475F7B !important;
	    background-color: #FFF !important;
	    border-color: #5A8DEE !important;
	    outline: 0 !important;
	    box-shadow: 0 3px 8px 0 rgb(0 0 0 / 10%) !important;
	}
	label { display:block; margin:10px 0; }
	.button-wrap { text-align: center; margin-top:30px; }
	.button-wrap button {
		background-color: #125166;
		color: #fff;;
		border-radius: 5px;
		text-align: center;
		font-size: 16px;
		padding: 10px 40px;
		border: 1px solid #125166;
		cursor: pointer;
	}
	.learnmore-wrap { display:flex; justify-content:center; }
	

	.learnmore-wrap a.button:hover { background-color: #125166; }
	ul.header-list li.active { border:1px solid #0D1E67; color: #fff; background-color:#125166; }
	ul.header-list li.active .svg-login svg path{
		fill: #fff;
	}
	ul.header-list li.active h2 {
		color: #fff;
	}
	ul.header-list li:hover { border:1px solid #125166; color: #fff; background-color:#125166; }
	ul.header-list li:hover .svg-login svg path{
		fill: #fff;
	}
	ul.header-list li:hover h2 {
		color: #fff;
	}
	.tab-data { display:none; }
	.tab-data.active {
            display: block;
        } 
        .introblock p {
        	text-align: center;
		    font-size: 16px;
		    color: #4B544E;
		    margin-top: 40px;
		}
        
        a.what-isbtn {
        	display: flex;
        	align-items: center;
        	gap: 7px;
        	justify-content: center;
			box-shadow: -23px 17px 5px -3px rgba(0,0,0,.5);
			background-color: #000;
			text-align: center;
			border-radius: 10px;
			padding: 10px 40px;
			color: #fff;
			font-size: 22px;
			text-decoration: none;
			cursor: pointer;

        }
        .svgfooter2 {
        	margin:auto;
        	width:max-content;
        }
        .svgfooter2 svg path{ fill:#125166; }
        .bot-section p{ color:#000; font-size:19px; }
        
        .hoder-box {
        	display: grid;
  			grid-template-columns: 1fr 1fr;
        	gap: 25px;
        	width: 1060px;
        	margin: auto;
        }
         .connect-botwrap { text-align:center; margin:8px auto; }
        .connect-botwrap button, .learnmore-wrap a.button {
        	display: flex;
        	align-items: center;
        	gap: 7px;
        	border:1px solid #559DA8;
        	border-radius: 8px;
        	color: #fff;
        	font-weight: 600;
        	text-align: center;
        	padding: 9px 30px;
        	background-color: #559DA8;
        	cursor: pointer;
        	margin: auto;
        }
        .learnmore-wrap a.button:hover { color:#fff; background-color:#000; }
         .connect-botwrap button svg { width:30px; height:30px; }
         .connect-botwrap button svg path{
         	fill: #fff;
         }
         .body-main { margin-right:15px; }
         .infobottom { margin-top:15px; }
         .footer-block2 {
         	background-color: #fff;
         	padding: 25px 30px;
         	border-radius: 19px;
         	margin: 25px auto;
         	width: 1008px;
         }
         .footer-block2 .footer-inner h2 {
         	font-size:2rem;
         	color: #000;
         	margin-bottom: 0;
         	margin-top: 0;
         	line-height: 2.7rem;
         	text-align: center;
         }
         .footer-block2 .footer-inner address {
         	margin-top: 15px;
         	font-size: 16px;
         	color: #000;
         	text-align: center;
         }
         .footer-block {
         	background-color: #125166;
         	padding: 25px 30px;
         	border-radius: 0 0 10px 10px;
         	margin-top:50px;
         }
         .footer-inner a {
         	color: #fff;

         }
         .footer-inner a:hover { #fff; }
         .footer-inner p {
         	font-size:15px;
         	color: #fff;
         	margin-bottom: 0;
         	margin-top: 0;
         	line-height: 2.7rem;
         	text-align: center;
         }
        
         @media (max-width:1400px){
         	 .hoder-box {
        	display: grid;
  			grid-template-columns: 1fr ;
        	width: 90%;
        }
        .footer-block2 {
        	width: 100%;
        	padding: 25px 9px;
        }
         	
         }
         
</style>
<script type="text/javascript">
	 jQuery(document).ready(function() {
        jQuery('.tab-link').on('click', function() {
            // Remove active class from all tabs
            jQuery('.tab-link').removeClass('active');
            
            // Add active class to the clicked tab
            jQuery(this).addClass('active');

            // Hide all tab content
            jQuery('.tab-data').removeClass('active');
            
            // Show the content of the clicked tab
            var tabId = jQuery(this).data('tab');
            
            jQuery('#' + tabId).addClass('active');
        });
    });
</script>
<?php
			   /** server status up function on dashborad */
				function ac_get_server_status() {
					$ac_api_username = '7e3188fc-4ae8-4edd-9d60-b04508151807';
					$ac_api_password = 'wIyGNKyKcw5lxqAKJTgxV9kRsEe8VfKc';

					$url = 'https://api.wpengineapi.com/v1/status';
					$response = wp_remote_get($url, array(
						'headers' => array(
							'Authorization' => 'Basic ' . base64_encode($ac_api_username . ':' . $ac_api_password),
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
				}

				$ac_server_status = ac_get_server_status();
				
				
			$ac_logo_url = ACONNECT_PLUGIN_URL . 'assets/img/AutomatePortal-Logo-White.png';

				?>
				<div class="body-main">
					<div class="header">
						<div class="header-inner">
							<div class="h-col">
								<div class="ap-logo">
									<img  src="<?php echo esc_url($ac_logo_url); ?>" alt="Automate Logo">
								</div>
							</div>
							<div class="h-col">
								<div class="online-status">
									<span>Online Status</span>
									<?php
												if (isset($ac_server_status) && $ac_server_status == 'Yes') {
													echo '<svg id="fi_11762483" width="30" height="30" enable-background="new 0 0 100 100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" fill="#54b435" r="30"></circle></svg>';
												} elseif (isset($ac_server_status) && $ac_server_status == 'No') {
													echo '<svg id="fi_11735415" width="30" height="30" enable-background="new 0 0 100 100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" fill="#005795" r="30"></circle></svg>';
												} else {
													echo '';
												}
											?>
									 
								</div>
							</div>
							<div class="h-col">
								<div class="h-colinner">
									<div class="svgbox">
										<svg fill="none" height="30" viewBox="0 0 24 24" width="30" xmlns="http://www.w3.org/2000/svg" id="fi_9311178"><g fill="rgb(0,0,0)"><path d="m16.7502 3.56v-1.56c0-.41-.34-.75-.75-.75s-.75.34-.75.75v1.5h-6.49997v-1.5c0-.41-.34-.75-.75-.75s-.75.34-.75.75v1.56c-2.7.25-4.01 1.86-4.21 4.25-.02.29.22.53.5.53h16.91997c.29 0 .53-.25.5-.53-.2-2.39-1.51-4-4.21-4.25z"></path><path d="m20 9.84009h-16c-.55 0-1 .45001-1 1.00001v6.16c0 3 1.5 5 5 5h8c3.5 0 5-2 5-5v-6.16c0-.55-.45-1.00001-1-1.00001zm-10.79 8.37001c-.05.04-.1.09-.15.12-.06.04-.12.07-.18.09-.06.03-.12.05-.18.06-.07.01-.13.02-.2.02-.13 0-.26-.03-.38-.08-.13-.05-.23-.12-.33-.21-.18-.19-.29-.45-.29-.71s.11-.52.29-.71c.1-.09.2-.16.33-.21.18-.08.38-.1.58-.06.06.01.12.03.18.06.06.02.12.05.18.09l.15.12c.18.19.29.45.29.71s-.11.52-.29.71zm0-3.5c-.19.18-.45.29-.71.29s-.52-.11-.71-.29c-.18-.19-.29-.45-.29-.71s.11-.52.29-.71c.28-.28.72-.37 1.09-.21.13.05.24.12.33.21.18.19.29.45.29.71s-.11.52-.29.71zm3.5 3.5c-.19.18-.45.29-.71.29s-.52-.11-.71-.29c-.18-.19-.29-.45-.29-.71s.11-.52.29-.71c.37-.37 1.05-.37 1.42 0 .18.19.29.45.29.71s-.11.52-.29.71zm0-3.5c-.05.04-.1.08-.15.12-.06.04-.12.07-.18.09-.06.03-.12.05-.18.06-.07.01-.13.02-.2.02-.26 0-.52-.11-.71-.29-.18-.19-.29-.45-.29-.71s.11-.52.29-.71c.09-.09.2-.16.33-.21.37-.16.81-.07 1.09.21.18.19.29.45.29.71s-.11.52-.29.71zm3.5 3.5c-.19.18-.45.29-.71.29s-.52-.11-.71-.29c-.18-.19-.29-.45-.29-.71s.11-.52.29-.71c.37-.37 1.05-.37 1.42 0 .18.19.29.45.29.71s-.11.52-.29.71zm0-3.5c-.05.04-.1.08-.15.12-.06.04-.12.07-.18.09-.06.03-.12.05-.18.06-.07.01-.14.02-.2.02-.26 0-.52-.11-.71-.29-.18-.19-.29-.45-.29-.71s.11-.52.29-.71c.1-.09.2-.16.33-.21.18-.08.38-.1.58-.06.06.01.12.03.18.06.06.02.12.05.18.09.05.04.1.08.15.12.18.19.29.45.29.71s-.11.52-.29.71z"></path></g></svg>
								</div>
								<div class="svgbox">
									<svg fill="none" height="30" viewBox="0 0 24 24" width="30" xmlns="http://www.w3.org/2000/svg" id="fi_9741176"><path d="m16.19 2h-8.38c-3.64 0-5.81 2.17-5.81 5.81v8.38c0 3.64 2.17 5.81 5.81 5.81h8.38c3.64 0 5.81-2.17 5.81-5.81v-8.38c0-3.64-2.17-5.81-5.81-5.81zm-6.22 12.9-2.25 2.25c-.15.15-.34.22-.53.22s-.39-.07-.53-.22l-.75-.75c-.3-.29-.3-.77 0-1.06.29-.29.76-.29 1.06 0l.22.22 1.72-1.72c.29-.29.76-.29 1.06 0 .29.29.29.77 0 1.06zm0-7-2.25 2.25c-.15.15-.34.22-.53.22s-.39-.07-.53-.22l-.75-.75c-.3-.29-.3-.77 0-1.06.29-.29.76-.29 1.06 0l.22.22 1.72-1.72c.29-.29.76-.29 1.06 0 .29.29.29.77 0 1.06zm7.59 8.72h-5.25c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h5.25c.42 0 .75.34.75.75s-.33.75-.75.75zm0-7h-5.25c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h5.25c.42 0 .75.34.75.75s-.33.75-.75.75z" fill="rgb(0,0,0)"></path></svg>
								</div>
								<div class="svgbox">
									<svg id="fi_13062144" height="30" width="30" enable-background="new 0 0 511.996 511.996" viewBox="0 0 511.996 511.996" xmlns="http://www.w3.org/2000/svg"><g><path d="m174.62 347.588c-54.464-53.489-75.817-135.466-55.51-208.81-119.959 45.513-158.014 197.945-73.8 294.74l-23.69 68.19 76.17-26.46c83.833 46.035 195.081 15.969 244.26-65.17-62.292 4.449-123.359-18.201-167.43-62.49z"></path><path d="m471.68 310.698c96.395-119.583 8.786-301.126-144.922-300.408-102.909-.43-185.838 85.422-185.158 185.159 0 102.099 83.07 185.16 185.16 185.16 30.534.109 60.199-7.533 87.29-21.72l76.17 26.46-23.69-68.19zm-231.81-48.63c-6.986-2.662-21.045-8.014-28.03-10.67 8.174-21.482 50.137-131.661 59.2-155.46l26.92-.03 58.69 155.53c-6.997 2.637-21.076 7.949-28.07 10.59-1.284-3.399-8.567-22.713-10.01-26.54h-68.58c-2.885 7.614-7.233 18.98-10.12 26.58zm188.38.29h-30v-80.97h30zm0-116.569h-30v-30h30z"></path><path d="m284.44 145.048-23.02 60.441h45.83z"></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
								</div>
								<div class="svgbox">
									<svg id="fi_9333993" width="30" height="30" enable-background="new 0 0 548.25 548.25"  viewBox="0 0 548.25 548.25"  xmlns="http://www.w3.org/2000/svg"><g><g id="Icon_00000093895562345236468680000002635522421730978688_"><path clip-rule="evenodd" d="m341.292 17.672s19.099 55.412 19.099 55.386c15.886 6.809 30.881 15.478 44.702 25.831l57.553-11.169c6.681-1.3 13.566 1.071 18.054 6.197 23.333 26.775 41.259 57.809 52.76 91.417 2.218 6.452.816 13.592-3.647 18.742 0 0-38.428 44.242-38.428 44.217 2.04 17.161 2.04 34.501 0 51.637l38.428 44.242c4.463 5.151 5.865 12.291 3.647 18.742-11.501 33.609-29.427 64.642-52.76 91.417-4.488 5.126-11.373 7.497-18.054 6.197 0 0-57.553-11.169-57.528-11.169-13.846 10.353-28.866 19.023-44.727 25.806l-19.099 55.411c-2.219 6.451-7.701 11.22-14.382 12.546-34.858 6.834-70.711 6.834-105.57 0-6.681-1.326-12.163-6.095-14.382-12.546 0 0-19.099-55.411-19.099-55.386-15.887-6.809-30.88-15.478-44.702-25.832l-57.553 11.172c-6.681 1.301-13.566-1.071-18.054-6.197-23.333-26.775-41.259-57.809-52.76-91.418-2.219-6.452-.816-13.591 3.646-18.742 0 0 38.429-44.242 38.429-44.217-2.04-17.162-2.04-34.501 0-51.638l-38.428-44.242c-4.462-5.151-5.865-12.291-3.647-18.742 11.501-33.609 29.427-64.642 52.759-91.418 4.488-5.126 11.373-7.497 18.054-6.196 0 0 57.553 11.169 57.528 11.169 13.847-10.353 28.866-19.023 44.727-25.806l19.099-55.411c2.219-6.451 7.701-11.22 14.382-12.546 34.858-6.834 70.711-6.834 105.57 0 6.682 1.326 12.164 6.094 14.383 12.546zm-67.167 143.718c-62.22 0-112.736 50.515-112.736 112.736s50.515 112.735 112.736 112.735 112.735-50.516 112.735-112.736-50.515-112.735-112.735-112.735zm0 38.25c41.106 0 74.485 33.38 74.485 74.485s-33.379 74.485-74.485 74.485-74.485-33.379-74.485-74.485 33.379-74.485 74.485-74.485z" fill-rule="evenodd"></path></g></g></svg>
								</div>
								</div>
							</div>
						</div>
					</div>
					<div class="body-content">
						<div class="welcome-box">
							<h2>Welcome!</h2>
						</div>
						<div class="hoder-box">
						<div class="login-wrap">
							<div class="login-inner">
								<div class="login-header">
									<ul class="header-list">
										<li   data-tab="Ahome1" class="tab-link active ">
											<div class="svg-login">
												<svg  viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg" id="fi_1166192"><path d="m196 301h120c0-33.089844-26.910156-60-60-60s-60 26.910156-60 60zm0 0"></path><path d="m256 121c-16.539062 0-30 13.460938-30 30s13.460938 30 30 30 30-13.460938 30-30-13.460938-30-30-30zm0 0"></path><path d="m497 331h-482c-8.285156 0-15 6.714844-15 15v30c0 8.289062 6.710938 15 15 15h482c8.289062 0 15-6.710938 15-15v-30c0-8.285156-6.714844-15-15-15zm0 0"></path><path d="m119.425781 301h46.574219c0-49.628906 40.371094-90 90-90-33.089844 0-60-26.910156-60-60s26.910156-60 60-60 60 26.910156 60 60-26.910156 60-60 60c49.628906 0 90 40.371094 90 90h46.578125l21.757813-218.527344c4.398437-44.21875-30.390626-82.472656-74.636719-82.472656h-167.398438c-44.257812 0-79.035156 38.261719-74.636719 82.472656zm0 0"></path><path d="m31 497c0 8.285156 6.714844 15 15 15h420c8.285156 0 15-6.714844 15-15v-76h-450zm0 0"></path></svg>
											</div>
											<h2>Automate Portal</h2>
										</li>
										<li   data-tab="Chome2" class="tab-link">
											<div class="svg-login">
												<svg id="fi_5859382"  viewBox="0 0 512 512"  xmlns="http://www.w3.org/2000/svg"><g id="users-three-Filled"><path id="users-three-Filled-2" d="m434.133 143.146a78.8 78.8 0 0 1 -55.68 75.307 126.1 126.1 0 0 0 5.547-37.12 127.792 127.792 0 0 0 -62.507-109.864 80.342 80.342 0 0 1 33.707-7.469 79.071 79.071 0 0 1 78.933 79.146zm-16 97.922a35.1 35.1 0 0 0 -26.667 3.2 70.983 70.983 0 0 1 -29.652 8.744 108.776 108.776 0 0 1 -14.934 18.136 115.726 115.726 0 0 1 78.08 91.521h14.72a26.209 26.209 0 0 0 23.254-13.438 54.441 54.441 0 0 0 6.4-25.818v-15.147c-.001-31.787-21.12-59.308-51.201-67.198zm-227.626-169.599a80.342 80.342 0 0 0 -33.707-7.469 78.985 78.985 0 0 0 -23.252 154.453 126.1 126.1 0 0 1 -5.548-37.12 127.792 127.792 0 0 1 62.507-109.864zm-25.387 199.677a108.776 108.776 0 0 1 -14.934-18.136 70.983 70.983 0 0 1 -29.652-8.744 35.1 35.1 0 0 0 -26.667-3.2c-30.081 7.89-51.2 35.411-51.2 67.2v15.145a54.441 54.441 0 0 0 6.4 25.818 26.118 26.118 0 0 0 23.041 13.438h14.932a115.726 115.726 0 0 1 78.08-91.521zm167.254 29.015a49.758 49.758 0 0 0 -11.308-1.494 43.323 43.323 0 0 0 -21.119 5.547 91.058 91.058 0 0 1 -87.894 0 43.323 43.323 0 0 0 -21.119-5.547 49.758 49.758 0 0 0 -11.308 1.494 84.375 84.375 0 0 0 -62.293 81.7v18.562a65.558 65.558 0 0 0 7.894 31.146c5.333 10.239 16 16.427 27.946 16.427h205.654c11.946 0 22.613-6.188 27.946-16.427a65.558 65.558 0 0 0 7.894-31.146v-18.558a84.375 84.375 0 0 0 -62.293-81.704zm19.626-118.828a96 96 0 1 0 -96 96 96 96 0 0 0 96-96z" data-name="users-three-Filled"></path></g></svg>
											</div>
											<h2>Client Portal</h2>
										</li>
									</ul>
									
								</div>
								<div class="tab-content-wrap">
									<div id="Ahome1" class="tab-data active">
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" name="email">
										</div>
										<div class="form-group">
											<label>Password</label>
											<input type="password" class="form-control" name="password">
										</div>
										<div class="button-wrap">
											<button>Login</button>
										</div>
										<div class="introblock">
											<p>Maintenance Level:None</p>
										</div>
									</div>
									<div id="Chome2" class="tab-data">
										<div class="form-group">
											<label>Enter API Key</label>
											<input type="text" class="form-control" name="email">
										</div>
										<div class="button-wrap">
											<button>Login</button>
										</div>
										<div class="introblock">
											<p>Automate Connect is here! If you dont't have access, please click learn more below.</p>
										</div>
										<div class="learnmore-wrap ">
											<a class="button" href="#">Learn More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="info-box">
							<div class="info-inner">
								
							<div class="info-body">
								<div class="bot-section">
								
							
								
								<div class="svgfooter2">
									<svg id="fi_4526832" height="45" viewBox="0 0 100 100" width="45" xmlns="http://www.w3.org/2000/svg"><g><path d="m84.234 78.581c-2.014-5.994-10.041-9.746-15.764-12.261-2.242-.982-8.449-2.648-9.195-5.471-.267-1.017-.231-1.976-.012-2.895-.345.066-.695.105-1.057.105h-3.729c-2.977 0-5.396-2.422-5.396-5.397 0-2.973 2.42-5.39 5.396-5.39h3.729c1.232 0 2.4.417 3.342 1.161 1.381-.184 2.713-.479 3.955-.866 1.631-3.417 2.903-7.503 3.188-11.02 1.217-15.048-8.008-23.852-21.235-22.33-9.617 1.107-15.362 8.278-15.983 17.51-.628 9.41 2.861 16.36 6.567 21.458 1.623 2.229 3.328 3.662 3.066 6.348-.304 3.176-3.7 4.061-6.129 5.037-2.878 1.156-5.978 2.91-7.442 3.721-5.043 2.785-10.578 6.139-11.822 10.727-2.755 10.168 6.549 13.248 14.23 14.67 6.592 1.216 14.025 1.312 20.139 1.312 11.059 0 30.945-.443 34.152-8.756.912-2.359.521-6.118 0-7.663z"></path><path d="m60.566 51.143c-.506-.771-1.371-1.283-2.358-1.283h-3.729c-1.556 0-2.811 1.257-2.811 2.805 0 1.554 1.255 2.813 2.811 2.813h3.729c1.089 0 2.013-.621 2.479-1.519 5.199-.409 9.721-1.997 12.895-4.342.729.47 1.591.745 2.521.745h.234c2.592 0 4.688-2.098 4.688-4.693v-9.368c0-1.866-1.094-3.476-2.672-4.224-.688-15.043-13.141-27.077-28.353-27.077s-27.667 12.034-28.352 27.077c-1.581.749-2.674 2.358-2.674 4.224v9.368c0 2.595 2.098 4.693 4.684 4.693h.237c2.588 0 4.687-2.098 4.687-4.693v-9.368c0-1.839-1.063-3.425-2.608-4.192.669-12.675 11.187-22.778 24.026-22.778 12.834 0 23.357 10.103 24.023 22.778-1.543.768-2.605 2.353-2.605 4.192v9.368c0 .622.121 1.201.334 1.742-2.732 1.955-6.709 3.348-11.186 3.732z"></path></g></svg>
								</div>
								<div class="connect-botwrap">
									<button>
									<span>Open Bot</span>
									<svg id="fi_11686655" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m37.75 42.61a6.047 6.047 0 0 0 6.04-6.04v-2.92a6.05 6.05 0 0 0 -6.04-6.05h-8.6a6.05 6.05 0 0 0 -6.04 6.05v2.92a6.047 6.047 0 0 0 6.04 6.04zm.8-11.34a1.57 1.57 0 1 1 -1.56 1.57 1.573 1.573 0 0 1 1.56-1.57zm-11.77 1.57a1.57 1.57 0 1 1 1.57 1.57 1.573 1.573 0 0 1 -1.57-1.57zm1.62 5.67a1 1 0 0 1 1-1 .965.965 0 0 1 .71.3 15.713 15.713 0 0 0 3.34.27 15.631 15.631 0 0 0 3.34-.27.965.965 0 0 1 .71-.3 1 1 0 0 1 1 1c0 .62 0 1.57-5.05 1.57s-5.05-.95-5.05-1.57z"></path><path d="m48.52 42.22a7 7 0 0 0 .48-.84.037.037 0 0 0 .01-.03 8.979 8.979 0 0 0 .45-1l.09-.24a11.246 11.246 0 0 0 .68-3.87v-5.2a8.428 8.428 0 0 0 -.06-1.01c-.03-.33-.07-.66-.13-.98a11.339 11.339 0 0 0 -11.15-9.25h-10.87a11.342 11.342 0 0 0 -11.16 9.25c-.06.32-.1.65-.13.98a8.428 8.428 0 0 0 -.06 1.01v5.2a11.206 11.206 0 0 0 .77 4.11 8.979 8.979 0 0 0 .45 1 7.449 7.449 0 0 0 .49.87 11.317 11.317 0 0 0 9.64 5.36h10.87a11.3 11.3 0 0 0 9.63-5.36zm-27.41-5.65v-2.92a8.055 8.055 0 0 1 8.04-8.05h8.6a8.055 8.055 0 0 1 8.04 8.05v2.92a8.053 8.053 0 0 1 -8.04 8.04h-8.6a8.053 8.053 0 0 1 -8.04-8.04z"></path><path d="m51.07 29.17a9.289 9.289 0 0 1 .12 1.06 9.1 9.1 0 0 1 .04.91v5.1a12.238 12.238 0 0 1 -.65 3.94.142.142 0 0 1 -.02.06 10.117 10.117 0 0 1 -.43 1.08 10.01 10.01 0 0 1 -.53 1.03c-.19.33-.39.65-.61.96a8 8 0 0 1 -7.99 7.69h-3.18a2.868 2.868 0 0 1 0 2h3.18a10.016 10.016 0 0 0 10-10v-.8a6.381 6.381 0 0 0 5-6.23v-.59a6.337 6.337 0 0 0 -4.93-6.21z"></path><path d="m16.34 40.24a12.342 12.342 0 0 1 -.67-4v-5.1a9.1 9.1 0 0 1 .04-.91 9.289 9.289 0 0 1 .12-1.06 6.348 6.348 0 0 0 -4.93 6.21v.59a6.385 6.385 0 0 0 6.38 6.38h.02a10.01 10.01 0 0 1 -.53-1.03 10.117 10.117 0 0 1 -.43-1.08z"></path><path d="m32.45 15.01v3.79h2v-3.79a4.227 4.227 0 0 1 -2 0z"></path><path d="m32.46 13.99a3.57 3.57 0 0 0 1.98 0 3.4 3.4 0 1 0 -1.98 0z"></path><path d="m35 50h-1a2.015 2.015 0 0 0 -2 2 2.006 2.006 0 0 0 2 2h1a1.955 1.955 0 0 0 1.41-.59 1.669 1.669 0 0 0 .34-.45 1.968 1.968 0 0 0 0-1.92 2 2 0 0 0 -1.75-1.04z"></path></svg>
								</button>
								</div>
									<p>To unlock access to our support bot, please singn up for a business-level maintenance plan or higher</p>
									<a href="#" class="what-isbtn">
									<div class="svgfooter">
										<svg fill="none" height="45" viewBox="0 0 24 24" width="45" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="fi_15775976"><linearGradient id="paint0_linear_3_7045" gradientUnits="userSpaceOnUse" x1="2" x2="2" y1="2" y2="22"><stop offset="0" stop-color="#e100ff"></stop><stop offset="1" stop-color="#7f00ff"></stop></linearGradient><path clip-rule="evenodd" d="m12.0001 4c-1.6785 0-3.31388 1.14438-4.38496 3.19601-.09452.18105-.2422.32882-.4232.42343-2.04912 1.07117-3.19194 2.70546-3.19194 4.38276 0 1.6782 1.14391 3.3132 3.1948 4.3843.18093.0945.32861.2421.4232.423 1.0712 2.0482 2.7051 3.1905 4.3821 3.1905s3.3108-1.1423 4.382-3.1906c.0946-.1809.2423-.3285.4232-.423 2.0508-1.0711 3.1947-2.7061 3.1947-4.3842 0-1.6773-1.1428-3.31152-3.1918-4.38269-.181-.09462-.3287-.24239-.4232-.42343-1.0711-2.05168-2.7065-3.19608-4.3849-3.19608zm-6.00921 1.99584c1.30745-2.3291 3.44828-3.99584 6.00921-3.99584 2.5609 0 4.7017 1.66678 6.0092 3.99593 2.3263 1.30766 3.9907 3.44728 3.9907 6.00627 0 2.5604-1.6661 4.7009-3.9944 6.0084-1.3077 2.3257-3.447 3.9894-6.0055 3.9894-2.55855 0-4.69784-1.6637-6.00556-3.9893-2.32841-1.3076-3.99454-3.4481-3.99454-6.0085 0-2.55904 1.66443-4.6987 3.99089-6.00636zm6.13201 3.51999c-.2559-.0439-.5192.0042-.743.13574-.2239.13155-.3939.33803-.4801.58283-.1833.521-.7542.7947-1.2752.6114-.52098-.1833-.79472-.7542-.61141-1.2752.24293-.69043.7224-1.27258 1.35341-1.64338.6311-.37079 1.373-.50633 2.0944-.38261.7214.12371 1.3757.49869 1.8471 1.05858.4713.55971.7293 1.26808.7284 1.99971-.0001.5239-.1302.9768-.3791 1.3648-.2368.3689-.5446.6202-.7926.7999-.1603.1161-.2947.2072-.4099.2853-.2971.2012-.4664.316-.6203.5491-.3043.4609-.9246.5879-1.3855.2837-.4609-.3043-.5879-.9246-.2837-1.3855.398-.6028.9997-1.001 1.3481-1.2316.0712-.0471.1317-.0872.1779-.1206.1744-.1264.2459-.2031.2827-.2604.0245-.0382.0624-.1099.0624-.2854v-.0015c.0004-.2595-.0911-.5108-.2583-.70935-.1672-.19858-.3993-.33162-.6553-.37552zm2.9136 1.08707v.0008l-1-.0015h1zm-4.0435 4.8971c0-.5523.4477-1 1-1h.007c.5523 0 1 .4477 1 1s-.4477 1-1 1h-.007c-.5523 0-1-.4477-1-1z" fill="url(#paint0_linear_3_7045)" fill-rule="evenodd"></path></svg>
									</div>
									<span>
									What is Automateconnect ?
									</span>
								</a>
							</div>
							</div>
							</div>
							<!-- <div class="info-inner infobottom">
								<div class="info-body">
									<h4>Premium Plugin Licenses Active</h4>
									<address>
										Smash Balloon: YouTube Feed, 
										Rank Math SEO, 
										WP Forms, 
										Automate Hub, 
										AutomateConnect
									</address>
								</div>
							</div> -->
						</div>
					</div>
					<div class="footer-block2">
						<div class="footer-inner">
							<h2>Premium Plugin Licenses Active </h2>
							<address>
								Smash Balloon: YouTube Feed,
								Rank Math SEO, 
								WP Forms, 
								Automate Hub, 
								AutomateConnect
							</address>
						</div>
					</div>
					<div class="footer-block">
						<div class="footer-inner">
							<p>Automate Connect Powered By <a href="#">Automate Portal</a> | <a href="#">Support</a></p>
							
						</div>
					</div>
					</div>
					
				</div>