<?php

namespace App;

use App\Ajax\AjaxRealty;
use App\Base\Singleton;
use App\PostType\Realty;
use App\Taxonomy\DistrictCategory;


/**
 * Core theme class
 *
 * @package App
 * @method static PluginInitialize getInstance()
 * @var PluginInitialize $instance
 */
final class PluginInitialize extends Singleton
{
    /**
     * Core constructor.
     */
    protected function __construct()
    {
        parent::__construct();


        add_action('init', [$this, 'themeSetup']);
        add_action('wp_enqueue_scripts', [$this, 'themeEnqueueScripts']);
        add_action('after_setup_theme', [$this, 'registerNavMenus']);
        add_filter('upload_mimes', [$this, 'registerMimeTypes']);
        add_action('admin_notices', [$this, 'requiredPluginsNotice']);
        //Change ACF Local JSON save location to /acf folder inside this plugin
        add_filter('acf/settings/save_json', [$this, 'acf_save_json']);
        //template redefinition
        add_filter('single_template', [$this, 'loadRealtySingleTemplate'] );
        add_filter('archive_template', [$this, 'loadRealtyArchiveTemplate']);
        //RealtyShortcode
        add_shortcode('realty_filer', [RealtyShortcode::class, 'realtyFiler']);

        $this->postTypeSetup();
        $this->ajax();

    }

    public function themeSetup(): void
    {

        add_theme_support('menus');
        add_theme_support('widgets');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');

        # Example of image sizes:
        add_image_size('hd-size', 1920, 1080, ['center', 'center']);

    }

    public function postTypeSetup():void
    {

        /**
         * Post type Reviews
         */
        new Realty();
        new DistrictCategory();

    }

    public function ajax():void
    {
        new AjaxRealty();
    }

    public function themeEnqueueScripts(): void
    {

        wp_enqueue_script('tbc-jQuery', 'https://code.jquery.com/jquery-1.11.2.min.js', [], '1.0.0', true);
        wp_enqueue_style('tbc-style', RPT_PLUGIN_URL . '/dist/app.css');
        wp_enqueue_script('tbc-script', RPT_PLUGIN_URL . '/dist/app.js', [], '1.0.0', true);
        wp_localize_script('tbc-script', 'tbcAjax',
            array(
                'ajaxUrl' => admin_url('admin-ajax.php')
            )
        );

    }

    public function registerNavMenus(): void
    {

        $menus = [
            'primary' => esc_html__('Primary', 'tbc')
        ];

        register_nav_menus($menus);

    }

    public function registerMimeTypes(): array
    {

        $mimes['svg'] = 'image/svg+xml';
        $mimes['jpeg'] = 'image/jpeg';
        $mimes['jpg'] = 'image/jpg';
        $mimes['png'] = 'image/png';
        return $mimes;

    }

    public function requiredPluginsNotice(): void
    {

        if (is_plugin_active('advanced-custom-fields/acf.php') ) {
            return;
        }
        if ( is_plugin_active('advanced-custom-fields-pro/acf.php') ) {
            return;
        }

        error_log("Please, install ACF plugin");
        include RPT_PLUGIN_PATH . 'templates/admin/notice-admin-template.php';
        deactivate_plugins('realty-post-type/index.php');

    }

    public function acf_save_json(): string
    {

        return dirname(__FILE__) . '/acf-json';

    }

    public function loadRealtySingleTemplate(string $template ): string
    {

        global $post;

        if ( 'realty' === $post->post_type && locate_template( ['single-realty.php'] ) !== $template ) {
            return RPT_PLUGIN_PATH . 'templates/single-realty.php';
        }

        return $template;

    }

    public function loadRealtyArchiveTemplate(string $archive_template): string
    {

        global $post;

        if (is_post_type_archive('realty')){
            $archive_template = RPT_PLUGIN_PATH . 'templates/archive-realty.php';
        }

        return $archive_template;

    }

}
