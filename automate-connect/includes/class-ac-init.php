<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('ACPluginInit'))
{
    class ACPluginInit
    {
        private static $_instance = null;
        public static function get_instance()
        {
            if ( null == static::$_instance )
			{
                static::$_instance = new self;
            }
            return static::$_instance;
        }
        private function __construct()
        {
            /** Include if admin section. */

			$this->includes_admin();

        }

        /** Include Admin files. */
        public function includes_admin()
        {
            require_once ACONNECT_PLUGIN_PATH . 'includes/classes/class-ac-admin-common.php';
            require_once ACONNECT_PLUGIN_PATH . 'includes/classes/class-ac-admin-common-function.php';
        }
    }
    /** class definition ends */
    function ac_plugin_init_func()
    {
        return ACPluginInit::get_instance();
    }
    ac_plugin_init_func();
}