<?php
/**
 * WP PHPUnit bootstrap file.
 *
 * This file bootstraps the entire test suite. Individual plugins include their own bootstrap file,
 * which handle the loading of the plugin.
 */

// Composer autoloader must be loaded before WP_PHPUNIT__DIR will be available.
require_once dirname( __DIR__ ) . '/vendor/autoload.php';

// Give access to test helper functions.
require_once getenv( 'WP_PHPUNIT__DIR' ) . '/includes/functions.php';

// Start up the WP testing environment.
require getenv( 'WP_PHPUNIT__DIR' ) . '/includes/bootstrap.php';
