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
                'name'                     => 'WP Migrate DB',
                'slug'                     => 'wp-migrate-db',
                //'source'                 => '',
                'required'                 => true,
                'force_activation'         => true,
                'force_deactivation'       => true,
            )

        ));
    }
}