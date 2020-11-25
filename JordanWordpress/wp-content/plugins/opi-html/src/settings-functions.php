<?php
/**
 * Render the form for our settings page
 */
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
        <?php
            settings_fields('opi_plugin_options');
            do_settings_sections('opi_plugin');
            submit_button('Apply Changes', 'primary');
        ?> 
        </form>
    </div>
<?php
}

// Draw the section header
function opi_plugin_section_text() {
    echo '<p>Enter your settings here.</p>';
}

/**
 * Register and define the sections and settings
 */
function opi_plugin_admin_init() {

    // Define the settings args
    $args = array(
        'type'              => 'string',
        'sanitize_callback' => 'opi_plugin_validate_options',
        'default'           => NULL
    );

    // Register our settings
    register_setting('opi_plugin_options', 'opi_plugin_options', $args);

    // Add a settings section
    add_settings_section(
        'opi_plugin_main',
        'OPI Plugin Settings',
        'opi_plugin_section_text',
        'opi_plugin'
    );

    // Create our settings field for the html code set
    add_settings_field(
        'opi_plugin_html',
        'Your HTML Code Set',
        'opi_plugin_setting_html',
        'opi_plugin',
        'opi_plugin_main'
    );

     // Create our settings field for the location
     add_settings_field(
        'opi_plugin_location',
        'Place Code Set After Paragraph',
        'opi_plugin_setting_location',
        'opi_plugin',
        'opi_plugin_main'
    );

    // Create our settings field for the paragraph_limit
    add_settings_field(
        'opi_plugin_paragraph_limit',
        'Paragraph Limit',
        'opi_plugin_setting_paragraph_limit',
        'opi_plugin',
        'opi_plugin_main'
    );

    // Create a settings field for the include category filter
    add_settings_field(
        'opi_plugin_include_categories',
        'Include Category',
        'opi_plugin_setting_include_categories',
        'opi_plugin',
        'opi_plugin_main'
    );

    // Create a settings field for the exclude category filter
    add_settings_field(
        'opi_plugin_exclude_categories',
        'Exclude Category',
        'opi_plugin_setting_exclude_categories',
        'opi_plugin',
        'opi_plugin_main'
    );

    // Create our settings field for the enable setting
    add_settings_field(
        'opi_plugin_toggle',
        'Enable HTML Code Set',
        'opi_plugin_setting_toggle',
        'opi_plugin',
        'opi_plugin_main'
    );
}

/**
 * Define the callback functions for the settings page
 * 
 * Display and fill the html code set fields using the callback functions
 */
function opi_plugin_setting_html() {
    // get option 'html' value from the database
    $options = get_option('opi_plugin_options');
    $html = $options['html'];

    // echo the field
    echo "<textarea id='html' name='opi_plugin_options[html]' 
    rows='7' cols='50' type='textarea'>{$options['html']}</textarea>";
}

function opi_plugin_setting_location() {
    // get option 'location' value from the database
    $options = get_option('opi_plugin_options');
    $location = $options['location'];

    echo "<input type='number' id='location' name='opi_plugin_options[location]' 
    value='".$location."'>";
}

function opi_plugin_setting_paragraph_limit() {
    // get option 'location' value from the database
    $options = get_option('opi_plugin_options');
    $paragraph_limit = $options['paragraph_limit'];

    echo "<input type='number' id='paragraph_limit' name='opi_plugin_options[paragraph_limit]' 
    value='".$paragraph_limit."'>";
}

// Display and select the categories select field
function opi_plugin_setting_include_categories() {
    // Get an array of the options
    $options = get_option('opi_plugin_options');
    $include_cat_filter = isset($options['include_cat_filter']) ? (array) $options['include_cat_filter'] : [];

    $all_cats = get_categories();

    foreach($all_cats as $cat) {
        echo "<input type='checkbox' name='opi_plugin_options[include_cat_filter][]' value='".$cat->cat_ID."' "
        .checked(in_array($cat->cat_ID, $include_cat_filter), true, false)."/>";

        echo "<label>".$cat->name."</label><br>";
    }
}

// Display and select the categories select field
function opi_plugin_setting_exclude_categories() {
    // Get an array of the options
    $options = get_option('opi_plugin_options');
    $exclude_cat_filter = isset($options['exclude_cat_filter']) ? (array) $options['exclude_cat_filter'] : [];

    $all_cats = get_categories();

    foreach($all_cats as $cat) {
        echo "<input type='checkbox' name='opi_plugin_options[exclude_cat_filter][]' value='".$cat->cat_ID."' "
        .checked(in_array($cat->cat_ID, $exclude_cat_filter), true, false)."/>";

        echo "<label>".$cat->name."</label><br>";
    }
}

// Display and set the enable radio button field
function opi_plugin_setting_toggle() {
    // Get option 'enable' value from the database
    // Set to 'disabled' as the default if the option does not exist
    $options = get_option('opi_plugin_options', ['toggle' => 'disabled']);
    $toggle = $options['toggle'];

    // Define the radio button options
    $items = array('enabled', 'disabled');

    foreach($items as $item) {
        // Loop the two radio button options and select if set in the option value
        echo "<label><input ".checked($toggle, $item, false)."
        value= '" . esc_attr($item) . "' name='opi_plugin_options[toggle]'
        type='radio'/>" . esc_html($item) . "</label><br/>";
    }
}

/**
 * Validation and Sanitization Function
 * 
 * Validate and Sanitize the inputs so that the form is more secure
 */
function opi_plugin_validate_options($input) {
    $valid = array();
    /**
     * This is not proper sanitization or validation, 
     * still need to figure out how to properly sanitize adn validate these types of data.
    */
    $valid['html'] = $input['html'];

    $valid['location'] = $input['location'];
    $valid['paragraph_limit'] = $input['paragraph_limit'];

    $valid['include_cat_filter'] = $input['include_cat_filter'];
    $valid['exclude_cat_filter'] = $input['exclude_cat_filter'];

    $valid['toggle'] = sanitize_text_field($input['toggle']);
    
    return $valid;
}