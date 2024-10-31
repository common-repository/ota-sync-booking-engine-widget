<?php
/**
 * Ota Sync Booking Engine Widget
 *
 * @package           Ota Sync Booking Engine Widget
 * @author            Ilija MIlovic
 * @copyright         2024 OTASYNC OU.
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Ota Sync Booking Engine Widget
 * Plugin URI:        https://otasync.me/
 * Description:       Booking Engine Widget for hospitality industry.
 * Version:           1.2.7
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Text Domain:       otasync-booking-engine
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace otasync\Ota_Sync_Booking_Engine_Widget;
 
if (!function_exists('install_otasync_cst_wiget_plugin')) {  
	register_activation_hook( __FILE__, __namespace__ . '\install_otasync_cst_wiget_plugin' );
	function install_otasync_cst_wiget_plugin(){
		update_option('otasync_w_type', 'single');
		update_option('show_destinations', '0');
		update_option('otasync_w_user_id', '');
		update_option('otasync_w_title', 'OTASync Widget');
		update_option('otasync_w_lang', 'en');
		update_option('otasync_w_currency', 'EUR');
		update_option('otasync_w_background_color', '');
		update_option('otasync_w_border_color', '#000');
		update_option('otasync_w_fields_text_color', '#000');
		update_option('otasync_w_button_background_color', '#000');
		
		update_option('otasync_w_fields_bg_color', '#fff');
		update_option('otasync_w_fields_border_color', '#000');
		
	}
}

if (!function_exists('fnc_otasync_w_settings')) {  
	add_action( 'admin_menu', __namespace__ . '\fnc_otasync_w_settings' );
	function fnc_otasync_w_settings() {
		add_menu_page( 'OTA Sync', 'OTA Sync', 'manage_options', 'otasync_w_options', __namespace__ . '\otasync_w_options', plugin_dir_url('ota-sync-booking-engine-widget/assets').'assets/logo.png');
		add_submenu_page( 'otasync_w_options', 'Wiget Settings', 'Wiget Settings', 'manage_options',  'otasync_widget_settings', __namespace__ . '\otasync_widget_settings_fnc' );
		add_submenu_page( 'otasync_w_options', 'Iframe Settings', 'Iframe Settings', 'manage_options',  'iframe_widget_settings', __namespace__ . '\otasync_cst_iframe_widget_settings_fnc' );
	}
}

if (!function_exists('otasync_w_options')) {
	function otasync_w_options(){
			
		?>
			<h1>OTA Sync Booking Engine Widget Plugin</h1>
			<div id="message" class="updated woocommerce-message">
				<p>Current Version Status: Updated (Latest Version 1.2.4)</p>
			</div>
			<p align="justify">This plugin will add OTA Sync widget.<p>
			<p align="justify">Version 1.2.5<p>
			<p align="justify">View <a href="https://intercom.help/otasync/en/articles/6816893-how-to-use-our-wordpress-plugin-for-booking-engine" target="_blank">Documentation</a><p>
			<p align="justify">Last updated on 17 April 2024<p>
			<span style="font-size:11px;"><a href="https://otasync.me">OTA Sync</a></span>
			<hr />
		<?php
			
	}
}

if (!function_exists('otasync_widget_settings_fnc')) {
	function otasync_widget_settings_fnc(){
		if(isset($_POST['update_settings'])){
			update_option('otasync_w_type', sanitize_text_field($_POST['otasync_w_type']));
			if(isset($_POST['show_destinations'])) update_option('show_destinations', sanitize_text_field($_POST['show_destinations'])); else update_option('show_destinations', '0');
			if(isset($_POST['otasync_w_destinations'])) update_option('otasync_w_destinations', sanitize_text_field($_POST['otasync_w_destinations'])); else update_option('otasync_w_destinations', '0');
			update_option('otasync_w_user_id', sanitize_text_field($_POST['otasync_w_user_id']));
			update_option('otasync_w_title', sanitize_text_field($_POST['otasync_w_title']));
			if(isset($_POST['otasync_w_hide_child_field'])) update_option('otasync_w_hide_child_field', sanitize_text_field($_POST['otasync_w_hide_child_field'])); else update_option('otasync_w_hide_child_field', '0');
			if(isset($_POST['otasync_w_vertical_view'])) update_option('otasync_w_vertical_view', sanitize_text_field($_POST['otasync_w_vertical_view'])); else update_option('otasync_w_vertical_view', '0');
			update_option('otasync_w_lang', sanitize_text_field($_POST['otasync_w_lang']));
			update_option('otasync_w_currency', sanitize_text_field($_POST['otasync_w_currency']));
			update_option('otasync_w_background_color', sanitize_text_field($_POST['otasync_w_background_color']));
			update_option('otasync_w_border_color', sanitize_text_field($_POST['otasync_w_border_color']));
			update_option('otasync_w_fields_text_color', sanitize_text_field($_POST['otasync_w_fields_text_color']));
			update_option('otasync_w_fields_bg_color', sanitize_text_field($_POST['otasync_w_fields_bg_color']));
			update_option('otasync_w_fields_border_color', sanitize_text_field($_POST['otasync_w_fields_border_color']));
			update_option('otasync_w_button_background_color', sanitize_text_field($_POST['otasync_w_button_background_color']));
			update_option('otasync_w_button_text_color', sanitize_text_field($_POST['otasync_w_button_text_color']));
			
			?>
			<br />
			<div id="message" class="updated message">
				<p>Changes updated successfully</p>
			</div>
			<?php
		}
		
		if(isset($_POST['update2'])){
			
			$_POST['update2']=str_replace('\"', '"', $_POST['update2']);
			$_POST['update2']=str_replace("\'", "'", $_POST['update2']);
			$_POST['otasync_w_code']=$_POST['update2'];
			//echo $_POST['otasync_w_code'];
			update_option('otasync_w_code', $_POST['otasync_w_code']);
			update_option('propert_id', sanitize_text_field($_POST['propert_id']));
			
			
			update_option('buttonBorderColor', $_POST['buttonBorderColor']);
			update_option('inputBorderColor', $_POST['inputBorderColor']);
			update_option('widgetBorderColor', $_POST['widgetBorderColor']);
			update_option('buttonBorderThickness', $_POST['buttonBorderThickness']);
			update_option('inputBorderThickness', $_POST['inputBorderThickness']);
			update_option('widgetBorderThickness', $_POST['widgetBorderThickness']);
			update_option('buttonBorderRadius', $_POST['buttonBorderRadius']);
			update_option('inputBorderRadius', $_POST['inputBorderRadius']);
			update_option('borderRadius', $_POST['borderRadius']);
			update_option('fixedBottomPosition', $_POST['fixedBottomPosition']);
			update_option('enablePromo', $_POST['enablePromo']);
			update_option('enableChildren', $_POST['enableChildren']);
			update_option('backgroundImage', $_POST['backgroundImage']);
			update_option('gradient', $_POST['gradient']);
			update_option('calendarDrops', $_POST['calendarDrops']);
			update_option('view', $_POST['view']);
			update_option('language', $_POST['language']);
			update_option('propertyType', $_POST['propertyType']);
			update_option('textAlignment', $_POST['textAlignment']);
			update_option('textColor', $_POST['textColor']);
			update_option('searchButtonBackgroundColor', $_POST['searchButtonBackgroundColor']);
			update_option('backgroundColor', $_POST['backgroundColor']);
			
			
			?>
			<br />
			<div id="message" class="updated message">
				<p>Changes updated successfully</p>
			</div>
			<?php
		}
		
		?>
			<h1>OTA Sync Wiget Settings</h1>
			<hr />
			<p>Put this shortcode where you want to show the widget form <b>[OTASYNC_cst_show_widget]</b></p>
			
			
			
			<form action="?page=otasync_widget_settings" id="myForm" method="post">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous"
        integrity="sha512-usVBAd66/NpVNfBge19gws2j6JZinnca12rAe2l+d+QkLU9fiG02O1X8Q6hepIpr/EYKZvKx/I9WsnujJuOmBA=="
        referrerpolicy="no-referrer">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo plugin_dir_url( __FILE__ ).'/assets/a/'; ?>grapick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url( __FILE__ ).'/assets/a/'; ?>grapick.min.css">

<style>
    .vertical-align-bottom {
        vertical-align: bottom;
    }
</style>
	<?php echo @get_option('otasync_w_code'); ?>
    <section class="contain-fluid p-4">
        <h4 class="text-primary">Engine Widget Generator</h4>
        <section class="row">
            <div class="col-12">
                <div class="card" style="width: 100%; display: block !important; min-width: 100%;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="property_id" class="form-label">Property ID <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="propert_id" value="<?php echo @get_option( 'propert_id'); ?>" id="property_id">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <label for="backgroundColor" class="form-label vertical-align-bottom"> Widget Background</label>
                                    <input type="color" class="ms-3 float-end" name="backgroundColor" value="<?php echo @get_option( 'backgroundColor'); ?>" id="backgroundColor" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <label for="backgroundColor" class="form-label vertical-align-bottom">Search Button Background</label>
                                    <input type="color" class="ms-3 float-end" id="searchButtonBackgroundColor" name="searchButtonBackgroundColor" value="<?php echo @get_option( 'searchButtonBackgroundColor'); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <label for="textColor" class="form-label vertical-align-bottom">Text Color</label>
                                    <input type="color" class="ms-3 float-end" name="textColor" value="<?php echo @get_option( 'textColor'); ?>" id="textColor" value="#FFFFFF"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="textAlignment" class="form-label">Text Alignment</label>
                                    <select id="textAlignment" name="textAlignment" class="form-select">
                                        <option <?php if(@get_option( 'textAlignment')=="left") echo "selected"; ?>  value="left">Left</option>
                                        <option <?php if(@get_option( 'textAlignment')=="center") echo "selected"; ?> value="center">Center</option>
                                        <option <?php if(@get_option( 'textAlignment')=="right") echo "selected"; ?> value="right">Right</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="propertyType" class="form-label">Property Type</label>
                                    <select id="propertyType" name="propertyType" class="form-select">
                                        <option <?php if(@get_option( 'propertyType')=="Single") echo "selected"; ?> value="single">Single</option>
                                        <option <?php if(@get_option( 'propertyType')=="Multiple") echo "selected"; ?> value="multi">Multiple</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="language" class="form-label">Language</label>
                                    <select id="language" name="language" class="form-select">
                                        <option <?php if(@get_option( 'language')=="en") echo "selected"; ?> value="en">EN</option>
                                        <option <?php if(@get_option( 'language')=="es") echo "selected"; ?> value="es">ES</option>
                                        <option <?php if(@get_option( 'language')=="rs") echo "selected"; ?> value="rs">RS</option>
                                        <option <?php if(@get_option( 'language')=="me") echo "selected"; ?> value="me">ME</option>
                                        <option <?php if(@get_option( 'language')=="hr") echo "selected"; ?> value="hr">HR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="view" class="form-label">View</label>
                                    <select id="view" name="view" class="form-select">
                                        <option <?php if(@get_option( 'view')=="horizontal") echo "selected"; ?> value="horizontal">Horizontal</option>
                                        <option <?php if(@get_option( 'view')=="vertical") echo "selected"; ?> value="vertical">Vertical</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="calendarDrops" class="form-label">Calendar Open Direction</label>
                                    <select id="calendarDrops" name="calendarDrops" class="form-select">
                                        <option <?php if(@get_option( 'calendarDrops')=="auto") echo "selected"; ?> value="auto">Auto</option>
                                        <option <?php if(@get_option( 'calendarDrops')=="up") echo "selected"; ?> value="up">Up</option>
                                        <option <?php if(@get_option( 'calendarDrops')=="down") echo "selected"; ?> value="down">Down</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div id="gp" class="mt-4"></div>
                            </div>

                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="gradient" class="form-label">Background Gradient Color</label>
                                    <input type="text" value="<?php echo @get_option( 'gradient'); ?>" class="form-control" name="gradient" id="gradient">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="backgroundImage" class="form-label">Background Image URL</label>
                                    <input type="text" class="form-control" value="<?php echo @get_option( 'backgroundImage'); ?>" id="backgroundImage" name="backgroundImage">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?php echo @get_option( 'enableChildren'); ?>" name="enableChildren" id="enableChildren">
                                    <label class="form-check-label" for="enableChildren">
                                        Add Children Section
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?php echo @get_option( 'enablePromo'); ?>" name="enablePromo" id="enablePromo">
                                    <label class="form-check-label" for="enablePromo">
                                        Add Promo Section
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="<?php echo @get_option( 'fixedBottomPosition'); ?>" name="fixedBottomPosition" id="fixedBottomPosition">
                                    <label class="form-check-label" for="fixedBottomPosition">
                                        Stick to bottom
                                    </label>
                                </div>
                            </div>
							
                            <div class="col-md-4">
                                <label for="borderRadius" class="form-label">Widget Border Radius: </label>
                                <span id="borderRadiusValue">8</span>
                                <input type="range" class="form-range"  name="borderRadius" id="borderRadius" min="0" max="50" value="<?php echo @get_option( 'borderRadius'); ?>" onchange="updateBorderValue(this.value,'borderRadiusValue')">
                            </div>
                            <div class="col-md-4">
                                <label for="inputBorderRadius" class="form-label">Input Border Radius: </label>
                                <span id="inputBorderRadiusValue">8</span>
                                <input type="range" class="form-range" name="inputBorderRadius" id="inputBorderRadius" min="0" max="50" value="<?php echo @get_option( 'inputBorderRadius'); ?>" onchange="updateBorderValue(this.value,'inputBorderRadiusValue')">
                            </div>
                            <div class="col-md-4">
                                <label for="buttonBorderRadius" class="form-label">Button Border Radius: </label>
                                <span id="buttonBorderRadiusValue">8</span>
                                <input type="range" class="form-range" name="buttonBorderRadius" id="buttonBorderRadius" min="0" max="50" value="<?php echo @get_option( 'buttonBorderRadius'); ?>" onchange="updateBorderValue(this.value,'buttonBorderRadiusValue')">
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="widgetBorderThickness" class="form-label">Widget Border Thickness: </label>
                                <span id="widgetBorderThicknessValue">1</span>
                                <input type="range" class="form-range" name="widgetBorderThickness" id="widgetBorderThickness" min="1" max="10" value="<?php echo @get_option( 'widgetBorderThickness'); ?>" onchange="updateBorderValue(this.value,'widgetBorderThicknessValue')">
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="inputBorderThickness" class="form-label">Input Border Thickness: </label>
                                <span id="inputBorderThicknessValue">1</span>
                                <input type="range" class="form-range" name="inputBorderThickness" id="inputBorderThickness" min="1" max="10" value="<?php echo @get_option( 'inputBorderThickness'); ?>" onchange="updateBorderValue(this.value,'inputBorderThicknessValue')">
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="buttonBorderThickness" class="form-label">Button Border Thickness: </label>
                                <span id="buttonBorderThicknessValue">1</span>
                                <input type="range" class="form-range" name="buttonBorderThickness" id="buttonBorderThickness" min="1" max="10" value="<?php echo @get_option( 'buttonBorderThickness'); ?>" onchange="updateBorderValue(this.value,'buttonBorderThicknessValue')">
                            </div>
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <label for="widgetBorderColor" class="form-label vertical-align-bottom">Widget Border Color</label>
                                    <input type="color" class="ms-3 float-end" name="widgetBorderColor" id="widgetBorderColor" value="<?php echo @get_option( 'widgetBorderColor'); ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <label for="inputBorderColor" class="form-label vertical-align-bottom">Input Border Color</label>
                                    <input type="color" class="ms-3 float-end" name="inputBorderColor" id="inputBorderColor" value="<?php echo @get_option( 'inputBorderColor'); ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-4">
                                    <label for="buttonBorderColor" class="form-label vertical-align-bottom">Button Border Color</label>
                                    <input type="color" class="ms-3 float-end" name="buttonBorderColor" id="buttonBorderColor" value="<?php echo @get_option( 'buttonBorderColor'); ?>"
                                        required>
                                </div>
                            </div>
                        </div>
						<input type="hidden" name="update2" id="update2" value="1" />
						<textarea class="form-control" name="otasync_w_code" id="code" rows="15" style="font-size: 14px; height: 250px;"
                        ></textarea>
                        <button onclick="update_code()" type="button" class="btn btn-primary mt-2">Generate</button>
                    </div>
                </div>
            </div>
            <div class="col-12 pt-4">
                <div class="form-floating">
                    
                    <label for="code">Code</label>
                </div>
            </div>
        </section>
    </section>

    <h4 class="text-primary mt-4 p-4" id="result">Result</h4>
    <section id="engine-section"></section>

    <script src="<?php echo plugin_dir_url( __FILE__ ).'/assets/a/'; ?>script.js?v=1"></script>
    <script>
		function update_code(){
			generateCode(); 
			setTimeout(
			function() {
				document.getElementById('update2').value=document.getElementById('code').value;
				//alert(document.getElementById('update2').value);
			  document.getElementById('myForm').submit();
			}, 2000);
		}
	
        window.onload = function () {
            const gp = new Grapick({ el: '#gp' });

            // Handlers are color stops
            gp.addHandler(0, 'red');
            gp.addHandler(100, 'blue');

            gp.setType('linear');
            gp.setDirection('right')
            // Do stuff on change of the gradient
            gp.on('change', complete => {
                document.getElementById('gradient').value = gp.getValue();
            })

            document.getElementById('property_id').focus();
        }
    </script>
			
			
	</form>
			
			
			<hr />
			<div align="center"><span style="font-size:11px;">&copy; Copyright All Rights Reserved <?php echo date('Y'); ?> By <a href="https://otasync.me">otasync.me</a></span></div>
			
		<?php
	}
}

if (!function_exists('otasync_cst_iframe_widget_settings_fnc')) {
	function otasync_cst_iframe_widget_settings_fnc(){
		$property_id=esc_html(get_option( 'propert_id' ));
		if(empty($property_id)) $property_id=276;
		?>
			<h1>OTASYNC Iframe Settings</h1>
			<hr />
			<p>Put this shortcode where you want to embed the OTA SYNC iframe <b>[OTASYNC_iframe]</b></p>
			<iframe style="width:100%; min-height:700px; border:none; " src="https://app.otasync.me/<?php if(get_option( 'otasync_w_type')=="single") echo "engine"; else echo "multiproperty"; ?>/<?php echo get_option( 'otasync_w_lang'); ?>/index.php?<?php if(get_option( 'otasync_w_type')=="single") echo "id_properties"; else echo "id_multiproperties"; ?>=<?php echo $property_id; ?>&dfrom=2022-02-24&dto=2022-02-28&adults=1&chlidren=0&currency=RSD&children=0"></iframe>
		<?php
	}
}

wp_register_style( 'otasync_custom_css_file', plugin_dir_url( __FILE__ ).'assets/css.css' );
wp_register_style( 'otasync_bs_css_file', plugin_dir_url( __FILE__ ).'assets/bs.css' );
wp_register_style( 'otasync_datepicker_css_file', plugin_dir_url( __FILE__ ).'assets/datepicker.css' );
wp_register_style( 'otasync_style_css_file2', plugin_dir_url( __FILE__ ).'assets/style.css' );

wp_register_style( 'otasync_style_css_file3', plugin_dir_url( __FILE__ ).'assets/a/grapick.min.css' );


if (!function_exists('OTASYNC_cst_show_widget_fnc')) {
	function OTASYNC_cst_show_widget_fnc(){
		global $content, $wpdb;
		ob_start();
		
		   echo '<div style="overflow:hidden; z-index:9999;">'.@get_option( 'otasync_w_code').'</div>';
	}

add_shortcode( 'OTASYNC_cst_show_widget', __namespace__ . '\OTASYNC_cst_show_widget_fnc' );

}

if (!function_exists('OTASYNC_wgt_iframe_fnc')) {
	function OTASYNC_wgt_iframe_fnc(){
		global $content, $wpdb;
		ob_start();
		$property_id=esc_html(get_option( 'propert_id' ));
		if(empty($property_id)) $property_id=276;
		?>
			<iframe style="width:100%; min-height:1000px; border:none; " src="https://app.otasync.me/<?php if(get_option( 'otasync_w_type')=="single") echo "engine"; else echo "multiproperty"; ?>/<?php echo get_option( 'otasync_w_lang'); ?>/index.php?<?php if(get_option( 'otasync_w_type')=="single") echo "id_properties"; else echo "id_multiproperties"; ?>=<?php echo $property_id; ?>&dfrom=2022-02-24&dto=2022-02-28&adults=1&chlidren=0&currency=RSD&children=0"></iframe>
		<?php

		$output = ob_get_clean();
		return $output;    
	}

	add_shortcode( 'OTASYNC_wgt_iframe', __namespace__ . '\OTASYNC_wgt_iframe_fnc' );
	
}



use WP_Widget;



class OTA_Sync_widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'OTA_Sync_widget',  // Base ID
			'OTA Sync Booking'   // Name
		);
		
	}

	public $args = array(
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
		'before_widget' => '<div class="widget-wrap">',
		'after_widget'  => '</div></div>',
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		$property_id=esc_html(get_option( 'otasync_w_user_id' ));
		if(empty($property_id)) $property_id=276;
		?>
			<iframe style="width:100%; min-height:1000px; border:none; " src="https://app.otasync.me/engine/<?php echo get_option( 'otasync_w_lang'); ?>/index.php?id_properties=<?php echo $property_id; ?>&dfrom=2022-02-24&dto=2022-02-28&adults=1&chlidren=0&currency=RSD&children=0"></iframe>
		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		    <?php
    		    $property_id=esc_html(get_option( 'otasync_w_user_id' ));
        		if(empty($property_id)) $property_id=276;
    		?>
			    <iframe style="width:100%; min-height:1000px; border:none; " src="https://app.otasync.me/engine/<?php echo get_option( 'otasync_w_lang'); ?>/index.php?id_properties=<?php echo $property_id; ?>&dfrom=2022-02-24&dto=2022-02-28&adults=1&chlidren=0&currency=RSD&children=0"></iframe>
		</p>
		
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		
		return $instance;
	}
}
//$my_widget = new OTA_Sync_widget();


add_action( 'widgets_init', __namespace__ .'\wpdocs_register_widgets' );
function wpdocs_register_widgets() {
	register_widget( __namespace__ .'\OTA_Sync_widget' );
}

function get_between_data($string, $start, $end)
{
$pos_string = stripos($string, $start);
$substr_data = substr($string, $pos_string);
$string_two = substr($substr_data, strlen($start));
$second_pos = stripos($string_two, $end);
$string_three = substr($string_two, 0, $second_pos);
// remove whitespaces from result
$result_unit = trim($string_three);
// return result_unit
return $result_unit;
}