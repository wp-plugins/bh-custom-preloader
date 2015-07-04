<?php

/*
Plugin Name: BH Custom Preloader
Plugin URI: http://getmasum.net/plugins/bh-custom-preloader-wordPress
Description: This is BH Custom Preloader WordPress plugin.It will be enable Preloader on your web site. You can change Every things from settings
Author: Masum Billah
Author URI: http://getmasum.net
Version: 1.0
*/

// Call Latest jQuery From wordpress library
function bh_latest_jquery(){
	wp_enqueue_script('jquery');
	
}

add_action('init' , 'bh_latest_jquery');

// Some configure
define('BH_CUSTOM_PRELOADER_WORDPRESS' , WP_PLUGIN_URL .'/' . plugin_basename(dirname(__FILE__)) . '/');

// Adding css and jquery files
function bh_custom_preloader_files(){
	wp_enqueue_style('' , BH_CUSTOM_PRELOADER_WORDPRESS .'css/bh_custom_preloader.css' );		
}

add_action('wp_enqueue_scripts' , 'bh_custom_preloader_files');


// Adding Admin files
function bh_custom_preloader_color_pickr_function( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('js/color-pickr.js', __FILE__ ), array( 'wp-color-picker' ), false, true );   

	wp_enqueue_script( 'bh_custom_preloader_js', plugins_url('js/bh_media_uploader.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	
	wp_enqueue_media();
}

add_action( 'admin_enqueue_scripts', 'bh_custom_preloader_color_pickr_function' );

// Adding BH Custom preloader Menu
function add_bhcusotmpreloader_options()  
{  
	add_options_page('BH Custom Preloader Settings', 'BH Custom Preloader Settings', 'manage_options', 'bhcustom-preloader-settings','bh_custom_preloader_settings');  
}  
add_action('admin_menu', 'add_bhcusotmpreloader_options');

// Default options values
$hbcustom_preloader_options = array(
	'preloader_bg_color' => '#fff',
	'preloader_delay' => '350',
	'preloader_opacity' => '1',
	'body_delay' => '350',
	'preloader_fadeout_mode' => 'slow',
	'preloader_images' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader1.gif',
	'preloader_effects' => 'fadeOut'

);


if ( is_admin() ) : // Load only if we are viewing an admin page

function bh_custom_pleloader_register_settings() {
	// Register settings and call sanitation functions
	register_setting( 'bhcustom_preloader_p_options', 'hbcustom_preloader_options', 'bhcustom_pleloader_validate_options' );
}

add_action( 'admin_init', 'bh_custom_pleloader_register_settings' );

function bh_custom_preloader_plugin_actions( $links ) {

		$settings_link = '<a href="' . admin_url( 'options-general.php?page=bhcustom-preloader-settings' ) . '">' . __('Settings') . '</a>';
		array_unshift( $links, $settings_link ); // before other links

	return $links;
}
add_filter( 'plugin_action_links', 'bh_custom_preloader_plugin_actions', 10, 2 );


// Store layouts views in array
$preloader_fadeout_mode = array(
	'preloader_fadeout_fast' => array(
		'value' => 'fast',
		'label' => 'Fast'
	),
	'preloader_fadeout_slow' => array(
		'value' => 'slow',
		'label' => 'Slow'
	),
);

// Store layouts views in array
$preloader_effects = array(
	'preloader_fadeout' => array(
		'value' => 'fadeOut',
		'label' => 'FadeOut'
	),
	'preloader_slideup' => array(
		'value' => 'slideUp',
		'label' => 'SlideUp'
	),
);

// Store layouts views in array
$preloader_images = array(
	'preloader_images1' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader1.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader1.gif'
	),
	'preloader_images2' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader2.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader2.gif'
	),	
	'preloader_images3' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader3.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader3.gif'
	),	
	'preloader_images4' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader4.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader4.gif'
	),	
	'preloader_images5' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader5.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader5.gif'
	),	
	'preloader_images6' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader6.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader6.gif'
	),	
	'preloader_images7' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader7.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader7.gif'
	),	
	'preloader_images8' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader8.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader8.gif'
	),	
	'preloader_images9' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader9.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader9.gif'
	),	
	'preloader_images10' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader10.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader10.gif'
	),	
	'preloader_images11' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader11.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader11.gif'
	),	
	'preloader_images12' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader12.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader12.gif'
	),	
	'preloader_images13' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader13.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader13.gif'
	),	
	'preloader_images14' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader14.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader14.gif'
	),	
	'preloader_images15' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader15.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader15.gif'
	),	
	'preloader_images16' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader16.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader16.gif'
	),	
	'preloader_images17' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader17.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader17.gif'
	),	
	'preloader_images18' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader18.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader18.gif'
	),	
	'preloader_images19' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader19.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader19.gif'
	),	
	'preloader_images20' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader20.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader20.gif'
	),	
	'preloader_images21' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader21.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader21.gif'
	),	
	'preloader_images22' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader22.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader22.gif'
	),	
	'preloader_images23' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader23.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader23.gif'
	),	
	'preloader_images24' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader24.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader24.gif'
	),	
	'preloader_images25' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader25.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader25.gif'
	),	
	'preloader_images26' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader26.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader26.gif'
	),	
	'preloader_images27' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader27.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader27.gif'
	),	
	'preloader_images28' => array(
		'value' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader28.gif',
		'img' => BH_CUSTOM_PRELOADER_WORDPRESS.'img/preloader28.gif'
	)
);


// Function to generate options page
function bh_custom_preloader_settings() {

	global $hbcustom_preloader_options, $preloader_fadeout_mode, $preloader_effects, $preloader_active_mode, $preloader_images;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted.		
?>
	<div class="wrap">

	
	<h2>BH Custom Preloader WordPress Settings</h2>

	<?php if ( false !== $_REQUEST['updated'] ) : ?>
	<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>

	<form method="post" action="options.php">

	<?php $settings = get_option( 'hbcustom_preloader_options', $hbcustom_preloader_options ); ?>
	
	<?php settings_fields( 'bhcustom_preloader_p_options' );
	/* This function outputs some hidden fields required by the form,
	including a nonce, a unique number used to ensure the form has been submitted from the admin page
	and not somewhere else, very important for security */ ?>

	
	<table class="form-table"><!-- Grab a hot cup of coffee, yes we're using tables! -->
	
		<tr valign="top">
		<th scope="row"><label for="background_color">Preloader Images</label></th>
		<td>
			<?php foreach( $preloader_images as $activate ) : ?>
			<div style="margin-right:15px; display: inline-block; line-height: 50px;">
			<input type="radio" id="<?php echo $activate['value']; ?>" name="hbcustom_preloader_options[preloader_images]" value="<?php esc_attr_e( $activate['value'] ); ?>" <?php checked( $settings['preloader_images'], $activate['value'] ); ?> />
			<label for="<?php echo $activate['value']; ?>"><img src="<?php echo $activate['img']; ?>" alt="" width="70" /></label>
			</div>
			<?php endforeach; ?>
		</td>
		</tr>	
		<tr valign="top">
		<th scope="row"><label for="image_url">Preloader Image Uploader</label></th>
		<td>
			<input type="text" name="hbcustom_preloader_options[image_url]" id="image_url" class="regular-text" value="<?php echo stripslashes($settings['image_url']); ?>">
			<input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
			<p class="description">You can Upload your Desire image.Image size will be maximum width: 200px and maximum height : 200px</p>
		</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="preloader_bg_color">Preloader background color</label></th>
			<td>
				<input id="preloader_bg_color" type="text" name="hbcustom_preloader_options[preloader_bg_color]" value="<?php echo stripslashes($settings['preloader_bg_color']); ?>" class="my-color-field" /><p class="description">Please Select preloader background color here. You can also add html HEX color code.</p>
			</td>
		</tr>		
		
		<tr valign="top">
		<th scope="row"><label for="preloader_effects">Preloader Effects</label></th>
			<td>
				<?php foreach( $preloader_effects as $activate ) : ?>
				<input type="radio" id="<?php echo $activate['value']; ?>" name="hbcustom_preloader_options[preloader_effects]" value="<?php esc_attr_e( $activate['value'] ); ?>" <?php checked( $settings['preloader_effects'], $activate['value'] ); ?> />
				<label for="<?php echo $activate['value']; ?>"><?php echo $activate['label']; ?></label>
				<?php endforeach; ?>
			</td>
		</tr>	
		
		<tr valign="top">
			<th scope="row"><label for="preloader_delay">Preloader Delay time</label></th>
			<td>
				<input id="preloader_delay" type="text" name="hbcustom_preloader_options[preloader_delay]" value="<?php echo stripslashes($settings['preloader_delay']); ?>" /><p class="description">Please put delay time, only use number. Default value is 350. Example: 350</p>
			</td>
		</tr>				
			
		<tr valign="top">
			<th scope="row"><label for="body_delay">Body Delay time</label></th>
			<td>
				<input id="body_delay" type="text" name="hbcustom_preloader_options[body_delay]" value="<?php echo stripslashes($settings['body_delay']); ?>" /><p class="description">Please put delay time, only use number. Default value is 350. Example: 350</p>
			</td>
		</tr>		
		<tr valign="top">
			<th scope="row"><label for="preloader_opacity">Preloader body Opacity</label></th>
			<td>
				<input id="preloader_opacity" type="text" name="hbcustom_preloader_options[preloader_opacity]" value="<?php echo stripslashes($settings['preloader_opacity']); ?>" /><p class="description">Please put Opacity, only use number. Default value is 1. Example: .8 You can learn more about opacity <a href="http://www.w3schools.com/cssref/css3_pr_opacity.asp" target="_blank">Click Here</a> </p>
			</td>
		</tr>
		
		<tr valign="top">
			<th scope="row"><label for="background_color">Preloader Fadeout Speed</label></th>
			<td>
				<?php foreach( $preloader_fadeout_mode as $activate ) : ?>
				<input type="radio" id="<?php echo $activate['value']; ?>" name="hbcustom_preloader_options[preloader_fadeout_mode]" value="<?php esc_attr_e( $activate['value'] ); ?>" <?php checked( $settings['preloader_fadeout_mode'], $activate['value'] ); ?> />
				<label for="<?php echo $activate['value']; ?>"><?php echo $activate['label']; ?></label>
				<?php endforeach; ?>
			</td>
			</tr>	
			
	</table>

	<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>
	</form>

	</div>

	<?php

}

function bhcustom_pleloader_validate_options( $input ) {
	global $hbcustom_preloader_options, $preloader_fadeout_mode, $preloader_effects, $preloader_images;

	$settings = get_option( 'hbcustom_preloader_options', $hbcustom_preloader_options );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS

	$input['preloader_bg_color'] = wp_filter_post_kses( $input['preloader_bg_color'] );
	$input['preloader_delay'] = wp_filter_post_kses( $input['preloader_delay'] );
	$input['body_delay'] = wp_filter_post_kses( $input['body_delay'] );
	$input['preloader_opacity'] = wp_filter_post_kses( $input['preloader_opacity'] );
	$input['image_url'] = wp_filter_post_kses( $input['image_url'] );
			
	// We select the previous value of the field, to restore it in case an invalid entry has been given
	$prev = $settings['layout_only'];
	// We verify if the given value exists in the layouts array
	if ( !array_key_exists( $input['layout_only'], $preloader_fadeout_mode ) )
		$input['layout_only'] = $prev;	
		
	// We select the previous value of the field, to restore it in case an invalid entry has been given
	$prev = $settings['layout_only'];
	// We verify if the given value exists in the layouts array
	if ( !array_key_exists( $input['layout_only'], $preloader_effects ) )
		$input['layout_only'] = $prev;	
			
	// We select the previous value of the field, to restore it in case an invalid entry has been given
	$prev = $settings['layout_only'];
	// We verify if the given value exists in the layouts array
	if ( !array_key_exists( $input['layout_only'], $preloader_images ) )
		$input['layout_only'] = $prev;		
	
	return $input;
}

endif;  // EndIf is_admin() 


// Adding Preloader options css
function bh_custom_preloader_option_css(){ ?>
<?php global $hbcustom_preloader_options; $bh_preloader_settings = get_option( 'hbcustom_preloader_options', $hbcustom_preloader_options ); ?>

	<?php $uploadimage= $bh_preloader_settings['image_url'] ;?>
	
	<style type="text/css">
		#preloader{
			background-color: <?php echo $bh_preloader_settings['preloader_bg_color']; ?>; /* change if the mask should have another color then white */
			opacity: <?php echo $bh_preloader_settings['preloader_opacity']; ?>;
		}
		#status {
			<?php if($uploadimage){ ?>
			background-image:url(<?php echo $bh_preloader_settings['image_url']; ?>); /* path to your loading animation */
			<?php } else { ?>
			background-image:url(<?php echo $bh_preloader_settings['preloader_images']; ?>); /* path to your loading animation */
			<?php } ?>
		}
	</style>
<?php	
}
add_action('wp_head' , 'bh_custom_preloader_option_css');

// Adding Preloader
function bh_custom_preloader_section(){ 
	
?>
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>

<?php }
add_action('wp_footer' , 'bh_custom_preloader_section');

// Adding Preloader Active jQuery
function bhcustom_preloader_js(){ 

global $hbcustom_preloader_options; $bh_preloader_settings = get_option( 'hbcustom_preloader_options', $hbcustom_preloader_options ); ?>

<script type="text/javascript">
	jQuery(window).load(function(){	
		jQuery('#status').fadeOut('<?php echo $bh_preloader_settings['preloader_fadeout_mode']; ?>'); // will first fade out the loading animation
		jQuery('#preloader').delay(<?php echo $bh_preloader_settings['preloader_delay']; ?>).<?php echo $bh_preloader_settings['preloader_effects']; ?>('<?php echo $bh_preloader_settings['preloader_fadeout_mode']; ?>'); // will fade out the white DIV that covers the website.
		jQuery('.home').delay(<?php echo $bh_preloader_settings['body_delay']; ?>).css({'overflow':'visible'});
	})
</script>

<?php	
}
add_action('wp_footer' , 'bhcustom_preloader_js');

