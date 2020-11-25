<?php
/**
 * Plugin Name:     OPI HTML 
 * Plugin URI:      http://example.com
 * Description:     A plugin that allows users to create html code sets and insert them into their posts.
 * Version:         1.0.0
 * Author:          Jordan Ng
 * Author URI:      https://github.com/JordanNg/WordpressPlugin
 * License:         GPL v2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 */

 /*
 Copyright (C) yyyy  name of author
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/**
 * Start by creating the OPI HTML Settings menu by adding it as
 * a sub-menu to the existing top level Settings menu
 */

/**
 * Includes for the functions needed
 */
include plugin_dir_path(__FILE__) . '/src/settings-functions.php';

// Add the settings menu using the functions defined in the settings-functions file
add_action('admin_menu', 'opi_plugin_add_settings_menu');

/**
 * Use the Settings API to create the options that we wish to save
 * Register and define the settings
 */
add_action('admin_init', 'opi_plugin_admin_init');
