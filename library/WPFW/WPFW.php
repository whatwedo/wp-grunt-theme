<?php
namespace WPFW;

class WPFW
{
    const ENABLE_ADMIN_FUNCTIONS = true;
    const ENABLE_CLEANUP_FUNCTIONS = true;
    const ENABLE_PLUGINS_FUNCTIONS = true;

    protected $admin;
    protected $cleanup;
    protected $plugins;

    public function __construct()
    {
        $this->requireFiles();
    }

    public function requireFiles()
    {
        if (self::ENABLE_ADMIN_FUNCTIONS) {
            require(WPFW_DIR . "/Admin.php");
            $this->admin = new Admin();
        }

        if (self::ENABLE_CLEANUP_FUNCTIONS) {
            require(WPFW_DIR . "/Cleanup.php");
            $this->cleanup = new Cleanup();
        }

        if (self::ENABLE_PLUGINS_FUNCTIONS) {
            require(WPFW_DIR . "/Plugins.php");
            $this->plugins = new Plugins();
        }
    }
}