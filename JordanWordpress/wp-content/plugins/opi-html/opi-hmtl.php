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
 * Name of all of the options that have been created for future usage:
 * 
 * ['html']                     // string of html
 * 
 * ['location']                 // Integer to designate the html code set to be inserted
 * ['paragraph_limit']          // The minimum number of paragraphs needed to insert the code set
 * 
 * ['include_cat_filter']       // Array of cat_ids that should include the code set
 * ['exclude_cat_filter']       // Array of cat_ids that should exclude the code set 
 * 
 * ['toggle']                   // A string that has the values of enabled or disabled
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

/**
 * Use the options that have been previously defined to load html code sets into the posts
 * 
 * Use the content filter to add the code set to the posts based on the option's values
 */
add_filter('the_content', 'append_html_code_set', PHP_INT_MAX);

function append_html_code_set($content) {
    $options = get_option('opi_plugin_options');

    // Retrieve the category objects for this post
    $current_post_categories = get_the_category();

    $include = false;
    $exclude = false;
    foreach($current_post_categories as $cat_obj) {
        // If the current category is to be included
        if (in_array($cat_obj->cat_ID, $options['include_cat_filter'])) {
            $include = true;
        }
        // If the current category is to be excluded
        if (in_array($cat_obj->cat_ID, $options['exclude_cat_filter'])) {
            $exclude = true;
        }
    }

    /**
     * Parse the post's content using DOMDocument to determine code set location 
     * and if the paragraph limit has been met.
    */
    // TODO: 
    $dom = new DOMDocument;
    $dom->loadHTML($content);
    
    foreach($dom->getElementsByTagName('p') as $node) {
        $paragraphs[] = $dom->saveHTML($node);
    }

    // Could also use is_single to make sure that it can only be on singular posts (so not the home page).
    if (in_the_loop()) {
        // If the toggle option is enabled and this post is to be included and not excluded then add the html
        if ($options['toggle'] == 'enabled' && $include == true && $exclude == false && count($paragraphs) >= $options['paragraph_limit']) {
            $content .= $options['html'];
        }
    }
    
    return $content;
}