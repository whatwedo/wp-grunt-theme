<?php
namespace WPFW;

require_once(WPFW_DIR . '/../vendor/class-tgm-plugin-activation.php');

class Plugins
{
    public function __construct()
    {
        add_action('tgmpa_register', array(&$this, 'requiredPlugins'));
    }

    function requiredPlugins()
    {
        tgmpa(array(

            array(
                'name'                     => 'WP Migrate DB Pro',
                'slug'                     => 'wp-migrate-db-pro',
                //'source'                 => '',
                'required'                 => true,
                'force_activation'         => true,
                'force_deactivation'       => true,
            ),

            array(
                'name'                     => 'Advanced Custom Fields',
                'slug'                     => 'advanced-custom-fields',
                'required'                 => true,
                'force_activation'         => true,
                'force_deactivation'       => true,
            ),

            array(
                'name'                     => 'WordPress SEO by Yoast',
                'slug'                     => 'wordpress-seo',
                'required'                 => false,
                'force_activation'         => true,
                'force_deactivation'       => false,
            ),

            array(
                'name'                     => 'Advanced Custom Fields - Flexible Content',
                'slug'                     => 'acf-flexible-content',
                //'source'                 => '',
                'required'                 => true,
                'force_activation'         => true,
                'force_deactivation'       => true,
            ),

            array(
                'name'                     => 'Advanced Custom Fields - Gallery Field',
                'slug'                     => 'acf-gallery',
                //'source'                 => '',
                'required'                 => true,
                'force_activation'         => true,
                'force_deactivation'       => true,
            ),

            array(
                'name'                     => 'Advanced Custom Fields - Options Page',
                'slug'                     => 'acf-options-page',
                //'source'                 => '',
                'required'                 => true,
                'force_activation'         => true,
                'force_deactivation'       => true,
            ),

            array(
                'name'                     => 'Advanced Custom Fields - Repeater Field',
                'slug'                     => 'acf-repeater',
                //'source'                 => '',
                'required'                 => true,
                'force_activation'         => true,
                'force_deactivation'       => true,
            ),

            array(
                'name'                     => 'Advanced Custom Fields - Location Field',
                'slug'                     => 'acf-location-field',
                'source'                   => 'https://github.com/elliotcondon/acf-location-field/archive/master.zip',
                'required'                 => true,
                'force_activation'         => true,
                'force_deactivation'       => true,
            ),

        ));
    }
}