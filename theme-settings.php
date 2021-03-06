<?php
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Theme\ThemeSettings;
use Drupal\system\Form\ThemeSettingsForm;
use Drupal\Core\Form;

function byu_d8_form_system_theme_settings_alter(&$form, Drupal\Core\Form\FormStateInterface $form_state) {


    // ----------- GENERAL -----------
    $form['options']['general'] = array(
        '#type' => 'fieldset',
        '#title' => t('General'),
    );
    // Breadcrumbs
//    $form['options']['general']['breadcrumbs'] = array(
//        '#type' => 'checkbox',
//        '#title' => 'Breadcrumbs',
//        '#default_value' => theme_get_setting('breadcrumbs'),
//    );

    // Loader Setting
    $form['options']['general']['loader'] = array(
        '#type' => 'checkbox',
        '#title' => 'On/Off Loader',
        '#default_value' => theme_get_setting('loader'),
    );

    // RTL
    /* $form['options']['general']['rtl'] = array(
         '#type' => 'checkbox',
         '#title' => 'On/Off RTL',
         '#default_value' => theme_get_setting('rtl'),
     );*/




    // ----------- DESIGN -----------
    $form['options']['design'] = array(
        '#type' => 'vertical_tabs',
        '#title' => 'BYU Style Options: Design Your Site',
        '#open' => FALSE,
    );
    // component versions
    $form['components'] = array(
        '#type' => 'details',
        '#title' => t('BYU Component Settings'),
        '#group' => 'design',
    );
    $form['components']['components_version'] = array(
        '#type' => 'select',
        '#title' => t('Which version of BYU Web components do you want to load?'),
        '#description' => t('1.x.x. is recommended because it will incorporate all new features and bug fixes without big changes that may require manual adjustments.'),
        '#options' => array(
            '1.x.x' => t('1.x.x - Get new features & bug fixes'),
            '1.2.x' => t('1.2.x - Stay on version 1.2 and only get bug fixes, no features'),
            'latest' => t('Latest - every update, including major version changes.'),
            'master' => t('Master - Latest development, Use for Development & Testing.'),
            'none' => t('Don\'t load components. This is primarily for testing purposes.'),
        ),
        '#default_value' => theme_get_setting('components_version'),
    );

    // Fonts
    $form['fonts'] = array(
        '#type' => 'details',
        '#title' => t('BYU Font Settings'),
        '#group' => 'design',
    );
    $form['fonts']['font_package'] = array(
        '#type' => 'select',
        '#title' => t('Which font package do you want to load?'),
        '#description' => t('If you want Sentinel to show as an option below, select the FULL font package. Save this page and return to set the other settings.'),
        '#options' => array(
            'fonts-basic' => t('Basic: Vitesse & Gotham'),
            'fonts-full' => t('Full: Vitesse, Gotham, Sentinel & a few others'),
        ),
        '#default_value' => theme_get_setting('font_package'),
    );
    $form['fonts']['fontawesome_use'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Load FontAwesome 4 library'),
        '#default_value' => theme_get_setting('fontawesome_use'),
    );
    $form['fonts']['libreberville_use'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Load Libre Baskerville font'),
        '#default_value' => theme_get_setting('libreberville_use'),
        '#description' => t('This serif font is a google font alternative, and may load faster. Click Save, and then this font will be available in the options below.'),
    );
    $form['fonts']['sourcesans_use'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Load Source Sans font'),
        '#default_value' => theme_get_setting('sourcesans_use'),
        '#description' => t('This sans-serif font is a google font alternative, and may load faster. Click Save, and then this font will be available in the options below.'),
    );
    $libre_en = theme_get_setting('libreberville_use');
    $sourcesans_en = theme_get_setting('sourcesans_use');
    $sentinel_en = (theme_get_setting('font_package') == 'fonts-full');

    $fontOptions = array(
        "vitesse" => "Vitesse",
        "gotham" => "Gotham",
    );
    if($sentinel_en == true) {
        $fontOptions['sentinel'] = 'Sentinel';
    }
    if($libre_en == true) {
        $fontOptions['libreb'] = 'Libre Baskerville';
    }
    if($sourcesans_en == true) {
        $fontOptions['sourcesans'] = 'Source Sans';
}

    $form['fonts']['font_one'] = array(
        '#type' => 'select',
        '#title' => t('H1 Font'),
        '#options' => $fontOptions,
        '#default_value' => theme_get_setting('font_one'),
    );
    $form['fonts']['font_one_color'] = array(
        '#type' => 'select',
        '#title' => t('H1 Color'),
        '#options' => array(
            'h1-navy' => t('Navy'),
            'h1-gray' => t('Gray'),
            'h1-black' => t('Black'),
        ),
        '#default_value' => theme_get_setting('font_one_color'),
    );
    $form['fonts']['font_two'] = array(
        '#type' => 'select',
        '#title' => t('H2 Font'),
        '#options' => $fontOptions,
        '#default_value' => theme_get_setting('font_two'),
    );
    $form['fonts']['font_two_color'] = array(
        '#type' => 'select',
        '#title' => t('H2 Color'),
        '#options' => array(
            'h2-navy' => t('Navy'),
            'h2-gray' => t('Gray'),
            'h2-black' => t('Black'),
        ),
        '#default_value' => theme_get_setting('font_two_color'),
    );
    $form['fonts']['font_three'] = array(
        '#type' => 'select',
        '#title' => t('H3 Font'),
        '#options' => $fontOptions,
        '#default_value' => theme_get_setting('font_three'),
    );
    $form['fonts']['font_three_color'] = array(
        '#type' => 'select',
        '#title' => t('H3 Color'),
        '#options' => array(
            'h3-navy' => t('Navy'),
            'h3-gray' => t('Gray'),
            'h3-black' => t('Black'),
        ),
        '#default_value' => theme_get_setting('font_three_color'),
    );

    $form['fonts']['font_four'] = array(
        '#type' => 'select',
        '#title' => t('H4 Font'),
        '#options' => $fontOptions,
        '#default_value' => theme_get_setting('font_four'),
    );
    $form['fonts']['font_four_color'] = array(
        '#type' => 'select',
        '#title' => t('H4 Color'),
        '#options' => array(
            'h4-navy' => t('Navy'),
            'h4-gray' => t('Gray'),
            'h4-black' => t('Black'),
        ),
        '#default_value' => theme_get_setting('font_four_color'),
    );
    $form['fonts']['font_five'] = array(
        '#type' => 'select',
        '#title' => t('H5 Font'),
        '#options' => $fontOptions,
        '#default_value' => theme_get_setting('font_five'),
    );
    $form['fonts']['font_five_color'] = array(
        '#type' => 'select',
        '#title' => t('H5 Color'),
        '#options' => array(
            'h5-navy' => t('Navy'),
            'h5-gray' => t('Gray'),
            'h5-black' => t('Black'),
        ),
        '#default_value' => theme_get_setting('font_five_color'),
    );

    $pFontOptions = array(
        'default' => t('Default'),
        'gotham' => t('Gotham (san-serif)'),
    );
    if($libre_en == true) {
        $pFontOptions['libreb'] = 'Libre Baskerville';
    }
    if($sourcesans_en == true) {
        $pFontOptions['sourcesans'] = 'Source Sans';
    }
    $form['fonts']['p_font'] = array(
        '#type' => 'select',
        '#title' => t('Paragraph Font'),
        '#options' => $pFontOptions,
        '#default_value' => theme_get_setting('p_font'),
    );




    // Header Option
    $form['header_style'] = array(
        '#type' => 'details',
        '#title' => 'BYU Header',
        '#group' => 'design',
);
//    $form['header_style']['header_option'] = array(
//        '#type' => 'select',
//        '#title' => 'Select a header style option:',
//        '#default_value' => theme_get_setting('header_option'),
//        '#options' => array(
////            'none' => 'None',
//            'h_default' => 'Header Default - Set Width',
//            'h_fullwidth' => 'Header FullWidth',
//            'h_center_identity' => 'Header - Center Identity',
////            'h_default_big_logo' => 'Header Default + Big Logo',
////            'h_flat' => 'Header Flat',
////            'h_flat_topbar' => 'Header Flat + Top Bar',
////            'h_flat_colored_topbar' => 'Header Flat + Colored Top Bar',
////            'h_flat_topbar_search' => 'Header Flat + Topbar Search',
////            'h_center' => 'Header Center',
////            'h_narrow' => 'Header Narrow',
////            'h_transparent' => 'Header Transparent',
////            'h_transparent_bottom_border' => 'Header Transparent bottom border',
////            'h_semi_transparent' => 'Header Semi Transparent',
////            'h_semi_transparent_light' => 'Header Semi Transparent Light',
////            'h_navbar' => 'Header Navbar',
////            'h_navbar_extra_info' => 'Header Navbar + Extra Info',
////            'h_without_menu' => 'Header Without Menu',
//
////            'h_below_slider' => 'Header Below Slider',
//        ),
//    );

    $form['header_style']['subtitle'] = array(
        '#type' => 'fieldset',
        '#title' => 'Subtitle Settings',
        '#open' => FALSE,
    );
    $form['header_style']['subtitle']['subtitle_use'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Use Subtitle'),
        '#default_value' => theme_get_setting('subtitle_use'),
        '#description'   => t("Add Sub Title to the site header."),
    );
    $form['header_style']['subtitle']['subtitle_above'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Subtitle Above'),
        '#default_value' => theme_get_setting('subtitle_above'),
        '#description'   => t("Place the subtitle above the Main Title."),
    );
    $form['header_style']['subtitle']['subtitle_italic'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Subtitle Italic'),
        '#default_value' => theme_get_setting('subtitle_italic'),
        '#description'   => t("Italicize the subtitle."),
    );
    $form['header_style']['subtitle']['subtitle_text'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Site Subtitle'),
        '#default_value' => theme_get_setting('subtitle_text'),
        '#description'   => t("The subtitle appears below (or above) the Main Title."),
    );


    $form['header_style']['user_info'] = array(
        '#type' => 'fieldset',
        '#title' => 'User Information & SIgn In Settings',
        '#open' => TRUE,
    );
    $form['header_style']['user_info']['login_use'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Display Sign In/Out block'),
        '#default_value' => theme_get_setting('login_use'),
        '#description'   => t("Choose to display a Sign In link."),
    );

    $form['header_style']['user_info']['login_url'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Login Url'),
        '#default_value' => theme_get_setting('login_url'),
        '#description'   => t("The subtitle appears below (or above) the Main Title. Default value if blank is '../user'. If you are using the CAS module, use '../cas'."),
    );
    $form['header_style']['user_info']['logout_url'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Logout Url'),
        '#default_value' => theme_get_setting('logout_url'),
        '#description'   => t("The subtitle appears below (or above) the Main Title.  Default value if blank is '../user/logout'. If you are using the CAS module, use '../caslogout'."),
    );
    $form['header_style']['user_info']['myaccount_use'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('My Account'),
        '#default_value' => theme_get_setting('myaccount_use'),
        '#description'   => t("Link the username / name display to a user account page."),
    );
    $form['header_style']['user_info']['myaccount_url'] = array(
        '#type'          => 'textfield',
        '#title'         => t('My Account Url'),
        '#default_value' => theme_get_setting('myaccount_url'),
//        '#default_value' => variable_get('myaccount_url', '../user/'),
//        '#default_value' => '../user',
        '#description'   => t("Provide the relative url for my account. Default value if blank is '../user'."),
    );


// Search Settings

    $form['header_style']['search'] = array(
        '#type' => 'fieldset',
        '#title' => 'Search Settings',
        '#open' => FALSE,
    );
    $form['header_style']['search']['search_use'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Display a Search bar in the header'),
        '#default_value' => theme_get_setting('search_use'),
//        '#description'   => t("Choose to display a Sign In link."),
    );
//    $form['header_style']['search']['placeholder_text'] = array(
//        '#type'          => 'textfield',
//        '#title'         => t('Search Placeholder'),
//        '#default_value' => theme_get_setting('placeholder_text'),
//        '#description'   => t("This text displays as a placeholder inside the default Drupal search form."),
//    );
    $form['header_style']['search']['search_input'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Alternate Search Input'),
        '#default_value' => theme_get_setting('search_input'),
        '#description'   => t("If you're using a different search module and the component is having difficulty finding the search input, enter the class, id, or attribute name (include the period, hashtag, or brackets) of your search input. This will tell the component exactly what content to search. For example: [data-drupal-selector=\'edit-keys\'] or #my-search-input. Please note that, in Drupal, some IDs change, so make sure you're picking a permanent one. Also note that you should use single quotes instead of double quotes, as this will be wrapped in double quotes inside the component."),
    );
    $form['header_style']['search']['search_submit'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Alternate Search Submit'),
        '#default_value' => theme_get_setting('search_submit'),
        '#description'   => t("If you're using a different search module and the component is having difficulty finding the submit button, enter the class, id, or attribute name (include the period, hashtag, or brackets) of your submit button. This will tell the component exactly what button to trigger. For example: [data-drupal-selector=\'edit-submit\'] or #my-submit-button. Please note that, in Drupal, some IDs change, so make sure you're picking a permanent one. Also note that you should use single quotes instead of double quotes, as this will be wrapped in double quotes inside the component."),
    );
    $form['header_style']['search']['search_info'] = array(
        '#markup' => '<p>For more information on how the search component works, go to <a href="http://2017-components-demo.cdn.byu.edu/byu-search.html">http://2017-components-demo.cdn.byu.edu/byu-search.html</a>.</p>',
    );
//    $form['header_style']['user_info']['logout_url'] = array(
//        '#type'          => 'textfield',
//        '#title'         => t('Custom Search Url'),
//        '#default_value' => theme_get_setting('logout_url'),
//        '#description'   => t("The subtitle appears below (or above) the Main Title.  Default value if blank is '../user/logout'. If you are using CAS, use '../caslogout'."),
//    );

//Header Actions Settings
    $form['header_style']['header_actions'] = array(
        '#type' => 'fieldset',
        '#title' => t('Action Links'),
        '#open' => FALSE,
    );
    $form['header_style']['header_actions']['actions_info'] = array(
        '#markup' => '<p>Action Links are very short links for a unique user action. For instance, this could be an "Apply" link or "Cart".
There should only ever be 2 one-word links or one 2-word link, as this space is minimal. To place these links, go to
the <a href="../admin/structure/block" target="_blank">blocks page</a> and place a block into the Header Actions region.</p><p>Action links
are placed at the bottom of the menu in mobile views. Please make sure your content fits at various breakpoints.</p>',
    );
    $form['header_style']['header_actions']['actions_bg'] = array(
        '#type' => 'select',
        '#title' => t('Action Link Button Style'),
        '#description' => t('If enabled, the site name and main menu will appear in a bar along the top of the page. You will want to make sure that the menu background is set to transparent.'),
        '#options' => array(
            'none' => t("No button style"),
            'royal'=> t('Royal Blue button'),
        ),
        '#default_value' => theme_get_setting('actions_bg'),
    );

//Menu Settings
    $form['header_style']['menu'] = array(
        '#type' => 'fieldset',
        '#title' => t('Menu Settings'),
        '#open' => FALSE,
    );
    $form['header_style']['menu']['menu_disable'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Disable the menu.'),
        '#default_value' => theme_get_setting('menu_disable'),
//        '#description'   => t("This allows part of the hero to show through behind the menu."),
    );
    $form['header_style']['menu']['transparent'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Make menu background transparent'),
        '#default_value' => theme_get_setting('transparent'),
        '#description'   => t("This allows part of the hero to show through behind the menu."),
    );

// Hero
    $form['header_style']['hero'] = array(
        '#type' => 'fieldset',
        '#title' => t('Hero Settings'),
        '#open' => FALSE,
    );

    $form['header_style']['hero']['hero_width'] = array(
        '#type' => 'select',
        '#title' => t('Hero Space Width'),
        '#options' => array(
            0 => t("Full Width (default)"),
            1 => t('Custom Width'),
        ),
        '#description' => t('The custom page width setting is under BYU General Page. See the next section of settings.'),
        '#default_value' => theme_get_setting('hero_width'),
    );

    $form['header_style']['hero']['hero_vs_menu'] = array(
        '#type' => 'select',
        '#title' => t('How do you want the Hero space & Menu to be?'),
        '#default_value' => theme_get_setting('hero_vs_menu'),
        '#description' => t('If enabled, the site name and main menu will appear in a bar along the top of the page. You will want to make sure that the menu background is set to transparent.'),
        '#options' => array(
            0 => t("Show hero below the menu (default)"),
            1 => t('Show hero behind menu'),
        ),
    );

    $form['header_style']['hero']['hero_image_width'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Make images stretch full width'),
        '#default_value' => theme_get_setting('hero_image_width'),
        '#description'   => t("Whether you are using a full width or constrained width hero, use this setting to tell images to expand to the full width of the hero space."),
    );

//    $form['header_style']['hero']['hero_constrained_image_width'] = array(
//        '#type'          => 'checkbox',
//        '#title'         => t('Constrained width: Make images stretch to container width'),
//        '#default_value' => theme_get_setting('hero_constrained_image_width'),
//        '#description'   => t("If you are using constrained hero region..."),
//    );


    /* ---- General Page settings -- */
    $form['general_page'] = array(
        '#type' => 'details',
        '#title' => t('BYU General Page'),
//        '#collapsible' => TRUE,
        '#group' => 'design',
    );
    $form['general_page']['full_width'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Full Width instead of Constrained Width'),
        '#default_value' => theme_get_setting('full_width'),
        '#description'   => t("Choose to have all pages extend full width. This applies to BYU Header, page content, and BYU Footer. The hero space has it's own setting for width, and this will not override that."),
    );
//    $form['general_page']['custom_width'] = array(
//        '#type' => 'select',
//        '#title' => 'Custom Page Width',
//        '#default_value' => theme_get_setting('custom_width'),
//        '#options' => array(
//            '1200' => '1200px',
//            '1024' => '1024px',
//            '1000' => '1000px',
//        ),
//    );

    $form['general_page']['custom_width'] = array(
        '#type'          => 'textfield',
        '#title'         => t('Custom Page Width'),
        '#default_value' => theme_get_setting('custom_width'),
        '#description'   => t("Enter the number of pixels you would like. i.e. '1200' fof 1200px. Defaults to 1000px."),
    );

    $form['general_page']['min_page_height'] = array(
        '#type' => 'select',
        '#title' => 'Custom Page Height',
        '#default_value' => theme_get_setting('min_page_height'),
        '#options' => array(
            'none' => 'None',
            '300' => '300px',
            '500' => '500px',
        ),
    );

//        '#type'          => 'textfield',
//        '#title'         => t('Minimum page Height'),
//        '#default_value' => theme_get_setting('min_page_height'),
//        '#description'   => t("Specify '500' if you want to set a min-height of 500px on your page content area. This is for pages with very minimal content, where you don't want the
//        footer to come up too high. Use this if you'd rather have white space on extremely short-content pages."),
//    );

    $form['general_page']['byu_styles'] = array(
        '#type' => 'fieldset',
        '#title' => t('Extra BYU Styles'),
        '#open' => FALSE,
    );

    $form['general_page']['byu_styles']['byu_styles_info'] = array(
        '#markup' => '<p>Enabling these styles doesn\'t necessarily mean the styles will immediately take effect. Most of these styles make byu classes available for use as you choose to apply them.</p>',
    );

    $form['general_page']['byu_styles']['byu_buttons'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('BYU Button Styles'),
        '#default_value' => theme_get_setting('byu_buttons'),
    );

    $form['general_page']['byu_styles']['byu_tables'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('BYU Table Styles'),
        '#default_value' => theme_get_setting('byu_tables'),
    );

    $form['general_page']['byu_styles']['byu_box_shadows'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('BYU Box Shadow Styles'),
        '#default_value' => theme_get_setting('byu_box_shadows'),
    );

    $form['general_page']['your_css'] = array(
        '#type' => 'textarea',
        '#title' => 'Add Your CSS',
        '#default_value' => theme_get_setting('your_css'),
    );





// Page Header
//    $form['page_header'] = array(
//        '#type' => 'details',
//        '#title' => 'Page Header Style',
//        '#group' => 'design',
//    );
//    $form['page_header']['page_header_option'] = array(
//        '#type' => 'select',
//        '#title' => 'Select a header style option:',
//        '#default_value' => theme_get_setting('page_header_option'),
//        '#options' => array(
//            'none' => 'None',
//            'ph_default' => 'Default',
//            'ph_light' => 'Light',
//            'ph_light_reverse' => 'Light - Reverse',
//            'ph_parallax' => 'Parallax',
//            'ph_center' => 'Center',
//        ),
//    );
//    // Page Header
//    $form['page_header']['page_header_color'] = array(
//        '#type' => 'fieldset',
//        '#title' => 'Page Header Color',
//        '#description' => 'This Feature just support for Page Header Default',
//    );
//    $form['page_header']['page_header_color']['page_header_color_option'] = array(
//        '#type' => 'select',
//        '#title' => 'Select a header style option:',
//        '#default_value' => theme_get_setting('page_header_color_option'),
//        '#options' => array(
//            'none' => 'None',
//            'page-header-primary' => 'Primary Color',
//            'page-header-secondary' => 'Secondary Color',
//            'page-header-tertiary' => 'Tertiary Color',
//            'page-header-quaternary' => 'Quaternary Color',
//        ),
//
//        '#states' => array (
//            'visible' => array(
//                'select[name = page_header_option]' => array('value' => 'ph_default')
//            )
//        )
//    );
    // Header Below Slider
//    $form['below_slider'] = array(
//        '#type' => 'details',
//        '#title' => 'Header Below Slider',
//        '#description' => 'This Feature just support for Header Below Slider',
//        '#group' => 'design',
//    );
//    $form['below_slider']['below_slider_option'] = array(
//        '#type' => 'checkbox',
//        '#title' => 'Show Page Header Below Slider',
//        '#default_value' => theme_get_setting('below_slider_option'),
//        '#states' => array (
//            'visible' => array(
//                'select[name = header_option]' => array('value' => 'h_below_slider')
//            )
//        )
//    );
//    //Side Header Semi Transparent
//    $form['h_semi_transparent'] = array(
//        '#type' => 'details',
//        '#title' => 'Side Header Semi Transparent',
//        '#description' => 'This Feature just support for Header Left Side',
//    );
//    $form['h_semi_transparent']['h_semi_transparent_option'] = array(
//        '#type' => 'checkbox',
//        '#title' => 'Side Header Semi Transparent',
//        '#default_value' => theme_get_setting('h_semi_transparent_option'),
//        '#states' => array (
//            'visible' => array(
//                'select[name = header_option]' => array('value' => 'h_left'),
//            )
//        )
//    );



    // Footer Option
    $form['footer_style'] = array(
        '#type' => 'details',
        '#title' => 'BYU Footer',
        '#group' => 'design',
    );

    // Footer Option
    $form['footer_style']['sticky_footer'] = array(
        '#type' => 'fieldset',
        '#title' => t('Sticky Footer Settings'),
        '#open' => FALSE,
    );
    $form['footer_style']['sticky_footer']['footer_sticky'] = array(
        '#type'          => 'checkbox',
        '#title'         => t('Make the footer sticky'),
        '#default_value' => theme_get_setting('footer_sticky'),
        '#description'   => t("A sticky footer will automatically stick to the bottom of the page until there is enough content to force it farther down."),
    );
    $form['footer_style']['footer_option'] = array(
        '#type' => 'select',
        '#title' => 'Select a footer style option:',
        '#default_value' => theme_get_setting('footer_option'),
        '#options' => array(
            'normal' => 'Normal: 4 Even Columns',
            'one_two_merged' => 'Double wide, normal, normal (2:1:1 columns) - leave Footer 4 empty.',
            'two_three_merged' => 'Normal, double wide, normal (1:2:1 columns) - leave Footer 4 empty.',
            'three_four_merged' => 'Normal, normal, double wide (1:1:2 columns) - leave Footer 4 empty.',
        ),
        '#description' => 'If you select any footer layout besides normal, do not place content in the Footer 4 region. It will not be used.',
    );
    $form['footer_style']['footer_info'] = array(
        '#markup' => '<p>Note: If you are selecting a double wide column layout, you are responsible for formatting your content inside that wide column. That means if you want it to contain two columns of links, you need to add a class to do that.</p><p>The class "two-columns" is available if you would like to use that.</p>',
    );
    $form['footer_style']['footer_regions'] = array(
        '#markup' => '<p>To place content in the footer:<br>1.Make sure you have the module <a 
href="https://www.drupal.org/project/block_class">block class</a> downloaded and enabled. <br>2. Go to 
the <a href="../admin/structure/block" target="_blank">blocks page</a> 
and place blocks into one of the footer regions. Each time you place a block, add the class "byu-footer" to each block. Footer 1, Footer 2, Footer 3, and Footer 4 correspond to the 4 footer columns.</p><p>The header for the footer column will be the block title of the first block in the region.</p>',
    );
    // Footer Colour
//    $form['footer_color'] = array(
//        '#type' => 'details',
//        '#title' => 'Footer color',
//    );

    // Footer Colour
//    $form['footer_color']['footer_color_option'] = array(
//        '#type' => 'select',
//        '#title' => 'Select a footer style option:',
//        '#default_value' => theme_get_setting('footer_color_option'),
//        '#options' => array(
//            'none' => 'None',
//            'color-primary' => 'Primary Color',
//            'color-secondary' => 'Secondary Color',
//            'color-tertiary' => 'Tertiary Color',
//            'color-quaternary' => 'Quaternary Color',
//        ),
//    );

    // Sticky Header
//    $form['header_sticky'] = array(
//        '#type' => 'fieldset',
//        '#title' => '<div class="plus"></div><h3 class="options_heading">Header Sticky</h3>',
//    );
//    // Sticky Header Option
//    $form['header_sticky']['header_sticky_option'] = array(
//        '#type' => 'select',
//        '#title' => 'Select a style option:',
//        '#default_value' => theme_get_setting('header_sticky_option'),
//        '#options' => array(
//            'none' => 'Disable',
//            'always_sticky' => 'Always Sticky',
//        ),
//    );
    // Navigation
//    $form['navigation'] = array(
//        '#type' => 'fieldset',
//        '#title' => '<div class="plus"></div><h3 class="options_heading">Setting Navigation</h3>',
//    );
//    // Navigation Option
//    $form['navigation']['navigation_option'] = array(
//        '#type' => 'select',
//        '#title' => 'Select a style option:',
//        '#default_value' => theme_get_setting('navigation_option'),
//        '#options' => array(
//            'none' => 'None',
//            'header-nav-dark-dropdown' => 'Dark Dropdown',
//            'header-nav-top-line' => 'Top line'
//        ),
//    );

    // Layout Option
//    $form['layout_style'] = array(
//        '#type' => 'details',
//        '#title' => 'Layout Style',
//    );
//
//    $form['layout_style']['layout_option'] = array(
//        '#type' => 'select',
//        '#title' => 'Select a layout style:',
//        '#default_value' => theme_get_setting('layout_option'),
//        '#options' => array(
//            'boxed' => 'Boxed',
//            'dark' => 'Dark',
//            'widescreen' => 'Widescreen (default)',
//
//        ),
//    );
//    // Skins
//    $form['skin'] = array(
//        '#type' => 'details',
//        '#title' => '<div class="plus"></div><h3 class="options_heading">Skins</h3>',
//    );
//
//    $form['skin']['skin_option'] = array(
//        '#type' => 'select',
//        '#title' => 'Select a Skin Style:',
//        '#default_value' => theme_get_setting('skin_option'),
//        '#options' => array(
//            'none' => 'None',
//            'default' => 'Default',
//            'skin-corporate-3' => 'Corporate 3',
//            'skin-corporate-4' => 'Corporate 4',
//            'skin-corporate-5' => 'Corporate 5',
//            'skin-corporate-6' => 'Corporate 6',
//            'skin-corporate-7' => 'Corporate 7',
//            'skin-corporate-8' => 'Corporate 8',
//        ),
//    );

    // Contact
    $form['contact'] = array(
        '#type' => 'details',
        '#title' => 'Contact',
        '#description' => 'Show in header : Default + Language Dropdown',
        '#group' => 'design',
    );
    $form['contact']['contact_option'] = array(
        '#type' => 'textfield',
        '#default_value' => theme_get_setting('contact_option'),
        '#description' => 'Show in header : Default + Language Dropdown',
    );
    $form['contact']['contact_about_link'] = array(
        '#type' => 'textfield',
        '#title' => 'Link',
        '#default_value' => theme_get_setting('contact_about_link'),
        '#description' => 'Show in header : Default + Language Dropdown',
    );
    $form['contact']['contact_about'] = array(
        '#type' => 'textfield',
        '#title' => 'Title',
        '#default_value' => theme_get_setting('contact_about'),
        '#description' => 'Show in header : Default + Language Dropdown',
    );
    $form['contact']['contact_us_link'] = array(
        '#type' => 'textfield',
        '#title' => 'Link',
        '#default_value' => theme_get_setting('contact_us_link'),
        '#description' => 'Show in header : Default + Language Dropdown',
    );
    $form['contact']['contact_us'] = array(
        '#type' => 'textfield',
        '#title' => 'Title',
        '#default_value' => theme_get_setting('contact_us'),
    );

}
