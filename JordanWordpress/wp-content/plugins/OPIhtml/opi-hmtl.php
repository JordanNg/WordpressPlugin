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

// Start by creating the settings menu for this plugin
add_action('admin_menu', 'opi_plugin_add_settings_menu');

function opi_plugin_add_settings_menu() {
    add_options_page('OPI HTML Plugin Settings', 'OPI HTML Settings', 'manage_options', 
    'opi_plugin', 'opi_render_plugin_options_page');
}

// Create the option page to set the HTML code variables
function opi_render_plugin_options_page() {
    ?>
    <div class="wrap">
        <h2>OPI HTML Plugin</h2>
        <form action="options.php" method="post">
        </form>
    </div>
<?php
}