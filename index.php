<?php
/**
 * Plugin Name: Realty post type
 * Description: Plugin that initializes a new post-type "Real Estate" and taxonomy "District".
 * Plugin URI:  https://github.com/AlexShevchenko1985
 * Author URI:  https://github.com/AlexShevchenko1985
 * Author:      AlexShevchenko1985
 * Version:     0.1
 *
 * Text Domain: tbc
 * Requires PHP: 7.4
 *
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// PLUGIN SETUP

/**
 * PSR-4 class autoloader
 */
if (file_exists(__DIR__ . "/" . "vendor/autoload.php")) {
    require_once __DIR__ . "/" . "vendor/autoload.php";
} else {
    error_log("Please, install composer dependencies in a theme directory: " . __DIR__);
}

define('RPT_PLUGIN_FILE', __FILE__);
define('RPT_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('RPT_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('RPT_PLUGIN_URL', plugin_dir_url(__FILE__));

use App\PluginInitialize;
$theme = PluginInitialize::getInstance();
