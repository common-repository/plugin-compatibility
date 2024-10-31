<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="wrap wpcompatible-wrap wpcompatible">
    <h1 class="wp-heading-inline"><?php echo esc_html__('Plugin Compatibility', 'plugincompatibility'); ?></h1>
    <br /><br />
    <div class="wpcompatible-body">
        <div class="postbox" style="display: block;">
            <div class="postbox-header">
                <h3><?php echo esc_html__('How plugin works?', 'plugincompatibility'); ?></h3>
            </div>
            <div class="inside">
                <div class="wpcompatible_multilingual-about">
                    <div class="wpcompatible_multilingual-about-info">
                        <div class="top-content">
                            <p class="plugin-description">
                                <?php echo esc_html__('Plugin automatically detect your WP version and PHP version', 'plugincompatibility'); ?>
                            </p>
                            <p class="plugin-description">
                                <?php echo esc_html__('You will enter wanted plugin name or select from currently installed', 'plugincompatibility'); ?>
                            </p>
                            <p class="plugin-description wpcompatible-alert">
                                <?php echo esc_html__('Plugin will help you to detect latest plugin version compatible with your server', 'plugincompatibility'); ?>
                            </p>
                            <p class="plugin-description wpcompatible-alert">
                                <?php echo esc_html__('Plugin database currently contain 5000 most popular plugins from WordPress Plugin repository', 'plugincompatibility'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wpcompatible_colors-container">


            <div class="logo_button"><a href="https://wpcompatible.com/" target="_blank"><img src="<?php echo esc_attr(PLCOM_URL); ?>admin/img/wpcompatible-logo.png" /></a></div>


            <div class="slogan">
                <h1>We will help you to Detect <b>Compatible</b> <br />WordPress / <b>Plugin</b> Version</h1>
            </div>

            <div class="form">
                <form class="wow fadeInUp wdk-ajax-loading url-form" data-wow-delay="0.7s" method="get" target="_blank" action="https://wpcompatible.com/" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                <div class="wpcompatible-row">
                    <div class="wpcompatible-col-s150">
                        <select name="wp" id="wp">
                            <option value="" >WordPress Version</option>
                            <option value="<?php echo esc_attr(bloginfo('version'))?>" selected="true"><?php echo esc_html(bloginfo('version'))?></option>

                            <?php for($i=63;$i>=10;$i--): ?>
                                <option value="<?php echo esc_attr($i/10); ?>" <?php echo ''; ?>><?php echo esc_html($i/10); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="wpcompatible-col-s150">
                        <select name="php" id="PHP">
                            <option value="">PHP Version</option>
                            <option value="<?php echo esc_attr(phpversion())?>" selected="true"><?php echo esc_html(phpversion())?></option>
                            <?php for($i=85;$i>=40;$i--): ?>
                                <option value="<?php echo esc_attr($i/10); ?>"><?php echo esc_html($i/10); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="wpcompatible-col-s150">
                        <input type="text" name="plugin" value="" class="plugin_name" placeholder="Enter Plugin Name">
                    </div>
                    <div class="wpcompatible-col-s150">
                        <button class="btn btn_submit f_size_15 f_500" type="submit">Find Compatible <i class="fas fa-spinner fa-spin hidden fa-ajax-indicator"></i></button>
                    </div>
                </div>
                </form>
            </div>

            <div class="plugins-cloud">
<?php

global $wpdb;


if ( function_exists( 'get_plugins' ) ) {
    $existing_plugins = get_plugins();

    foreach($existing_plugins as $slug=>$plugin)
    {
        if(strpos($slug, 'wpcompatible') !== FALSE)
            continue;

        $slug_exploded = explode('/', $slug);

        if(count($slug_exploded) == 2)
        {
            $slug_only = $slug_exploded[0];
        }
        else
        {
            $slug_only = basename(
                $slug, // Get the key which holds the folder/file name
                '.php' // Strip away the .php part
            );
        }

        echo '<a href="#'.esc_attr($slug_only).'" rel="'.esc_attr($slug_only).'" class="plugin_select">'.esc_html($plugin["Name"]).'</a>';

        //var_dump($plugin);
    }


}


?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

jQuery(document).ready(function($)
{
    $('a.plugin_select').on( "click", function() 
    {
        $('.plugin_name').val($(this).attr('rel'));

        return false;
    });
});



</script>