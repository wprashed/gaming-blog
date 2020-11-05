<?php

/**
 *
 * @wordpress-plugin
 * Plugin Name:       ofi Core
 * Description:       Support plugin for maggie theme.
 * Version:           1.0.0
 * Author:            Tortoiz
 * Author URI:        https://tortoiz.com
 * Text Domain:       maggie-core
 * Domain Path:       /languages
 */


require_once( __DIR__ . '/functions.php' );


// Custom Post

require_once( __DIR__ . '/inc/portfolio.php' );
require_once( __DIR__ . '/inc/service.php' );
require_once( __DIR__ . '/inc/taxonomy.php' );