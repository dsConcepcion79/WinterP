<?php
/**
 * Fourty North Ventures functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fourty_North_Ventures
 */
 

if ( ! function_exists( 'fourty_north_ventures_setup' ) ) :
	
	function fourty_north_ventures_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Fourty North Ventures, use a find and replace
		 * to change 'fourty-north-ventures' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fourty-north-ventures', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

	}
endif;
add_action( 'after_setup_theme', 'fourty_north_ventures_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fourty_north_ventures_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fourty_north_ventures_content_width', 640 );
}
add_action( 'after_setup_theme', 'fourty_north_ventures_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function fourty_north_ventures_scripts() {
	wp_enqueue_style( 'fourty-north-ventures-style', get_stylesheet_uri() );
    
    wp_enqueue_style( 'fourty-north-ventures-font-awesome', get_template_directory_uri() . '/css/fontawesome.min.css');

	wp_enqueue_script( 'fourty-north-ventures-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'fourty-north-ventures-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fourty_north_ventures_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * TGMPA
 */

//require get_template_directory() . '/lib/TGM-Plugin-Activation-develop/class-tgm-plugin-activation.php';
//require get_template_directory() . '/lib/TGM-Plugin-Activation-develop/functions.php';



if (class_exists('Timber')) {

    // Modules
    include_once('utils/modules.php');
    
    // Load modules
    $modules = RA\Modules::singleton();
    $modules->init_modules('page_modules', 'page');
    $modules->load_modules(get_stylesheet_directory() . '/modules/');
    $modules->load_modules(get_stylesheet_directory() . '/fields/');


}
// Serve a static HTML page if the Timber plugin is not activated
if (!class_exists('Timber')) {
    add_action('admin_notices', function() {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
    });
/*
    add_filter('template_include', function($template) {
        return get_stylesheet_directory() . '/static/no-timber.html';
    });
*/
    return;
}

// Adds directories for Twig files
Timber::$dirname = ['templates'];

// Turns off Twig autoescape feature
Timber::$autoescape = false;

/**
 * Class StandardIndustries
 */
class StandardIndustries extends Timber\Site
{
    /**
     * StandardIndustries constructor, sets up Timber support
     */
    public function __construct()
    {
        // Disable Gutenberg editor
        // add_filter('use_block_editor_for_post', '__return_false');

        // Default registrations
        add_action('after_setup_theme', [$this, 'theme_supports']);
        add_filter('timber_context', [$this, 'add_to_context']);
        add_filter('get_twig', [$this, 'add_to_twig']);

        // Custom image sizes
        add_action('after_setup_theme', [$this, 'register_image_sizes']);
        add_filter('image_size_names_choose', [$this, 'register_image_size_names']);

        // Custom types
        add_action('init', [$this, 'register_menus']);
        add_action('init', [$this, 'register_post_types']);
        add_action('init', [$this, 'register_taxonomies']);

        // Disable comments
        add_action('admin_init', [$this, 'disable_comments_admin_init']);
        add_filter('comments_open', '__return_false', 20, 2);
        add_filter('pings_open', '__return_false', 20, 2);
        add_filter('comments_array', '__return_empty_array', 10, 2);
        add_action('admin_menu', [$this, 'disable_comments_admin_menu']);
        add_action('init', [$this, 'disable_comments_init']);

        // Disable pages in search
        //add_filter('pre_get_posts', [$this, 'disable_search_results_pages']);

        // Enqueue theme files
        add_action('wp_enqueue_scripts', [$this, 'enqueue_theme']);

        parent::__construct();
    }

    /**
     * Adds items to the Timber context
     * @param $context
     * @return mixed
     */
    public function add_to_context($context)
    {
        $context['menu_header'] = new Timber\Menu('header');
        $context['menu_footer'] = new Timber\Menu('footer');
        $context['menu_copyright'] = new Timber\Menu('copyright');
        $context['menu_news'] = new Timber\Menu('news');
        $context['theme_settings'] = get_fields('option');
        $context['site'] = $this;
        return $context;
    }

    /**
     * Registers extensions to Twig
     * @param $twig
     * @return mixed
     */
    public function add_to_twig($twig)
    {
        $twig->addExtension(new Twig_Extension_StringLoader());
        $twig->addFilter(new Twig_SimpleFilter('exclaim', [$this, 'exclaim']));
        return $twig;
    }

    /**
     * Disables comments on admin_init hook
     */
    public function disable_comments_admin_init()
    {
        // Redirect any user trying to access comments page
        global $pagenow;

        if ($pagenow === 'edit-comments.php') {
            wp_redirect(admin_url());
            exit;
        }

        // Remove comments metabox from dashboard
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

        // Disable support for comments and trackbacks in post types
        foreach (get_post_types() as $post_type) {
            if (post_type_supports($post_type, 'comments')) {
                remove_post_type_support($post_type, 'comments');
                remove_post_type_support($post_type, 'trackbacks');
            }
        }
    }

    /**
     * Disables comments on admin_menu hook
     */
    public function disable_comments_admin_menu()
    {
        remove_menu_page('edit-comments.php');
    }

    /**
     * Disables comments on init hook
     */
    public function disable_comments_init()
    {
        if (is_admin_bar_showing()) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        }
    }

    /**
     * Disables the comment status
     * @return bool
     */
    public function disable_comments_status()
    {
        return false;
    }

    /**
     * Removes pages from search results
     * @param $query
     * @return mixed
     */
    public function disable_search_results_pages($query) {
        if (!is_admin() && $query->is_search) {
            $query->set('post_type', 'post');
        }
        return $query;
    }

    /**
     * Enqueues theme styles and scripts
     */
    public function enqueue_theme() {
        wp_enqueue_style('fourty-north-ventures-styles', get_stylesheet_directory_uri() . '/dist/app.css');
        wp_enqueue_script('fourty-north-ventures-scripts', get_stylesheet_directory_uri() . '/dist/bundle.js', null, false, true);
    }

    /**
     * Example filter to be added to Twig, adds and exclamation mark
     * @param $text
     * @return string
     */
    public function exclaim($text)
    {
        $text .= '!';
        return $text;
    }

    /**
     * Registers custom image sizes
     */
    public function register_image_sizes() {
        add_image_size('extra_large', 1440, 1440);
        add_image_size('header_large', 1920, 1920);
    }

    /**
     * Registers custom image size names for admin
     * @param $sizes
     * @return array
     */
    public function register_image_size_names($sizes) {
        return array_merge($sizes, [
            'medium_large' => __('Medium Large'),
            'extra_large' => __('Extra Large'),
            'header_large' => __('Header Large')
        ]);
    }

    /**
     * Registers nav menus
     */
    public function register_menus()
    {
        register_nav_menus([
            'header' => __('Header', 'fourty-north-ventures'),
            'footer' =>  __('Footer', 'fourty-north-ventures'),
            'copyright' => __('Copyright', 'fourty-north-ventures'),
            'news' => __('News', 'fourty-north-ventures')
        ]);
    }

    /**
     * Registers custom post types
     */
    public function register_post_types()
    {
        register_post_type('team-member', [
            'label' => __('Team Member', 'fourty-north-ventures'),
            'description' => __('Team member profiles.', 'fourty-north-ventures'),
            'labels' => [
                'name'                  => _x('Team Members', 'Post Type General Name', 'fourty-north-ventures'),
                'singular_name'         => _x('Team Member', 'Post Type Singular Name', 'fourty-north-ventures'),
                'menu_name'             => __('Team Members', 'fourty-north-ventures'),
                'name_admin_bar'        => __('Team Members', 'fourty-north-ventures'),
                'archives'              => __('Team Members Archive', 'fourty-north-ventures'),
                'attributes'            => __('Team Members Attributes', 'fourty-north-ventures'),
                'parent_item_colon'     => __('Parent Item:', 'fourty-north-ventures'),
                'all_items'             => __('All Team Members', 'fourty-north-ventures'),
                'add_new_item'          => __('Add New Team Member', 'fourty-north-ventures'),
                'add_new'               => __('Add New', 'fourty-north-ventures'),
                'new_item'              => __('New Team Member', 'fourty-north-ventures'),
                'edit_item'             => __('Edit Team Member', 'fourty-north-ventures'),
                'update_item'           => __('Update Team Member', 'fourty-north-ventures'),
                'view_item'             => __('View Team Member', 'fourty-north-ventures'),
                'view_items'            => __('View Team Members', 'fourty-north-ventures'),
                'search_items'          => __('Search Team Members', 'fourty-north-ventures'),
                'not_found'             => __('Not found', 'fourty-north-ventures'),
                'not_found_in_trash'    => __('Not found in Trash', 'fourty-north-ventures'),
                'featured_image'        => __('Featured Image', 'fourty-north-ventures'),
                'set_featured_image'    => __('Set featured image', 'fourty-north-ventures'),
                'remove_featured_image' => __('Remove featured image', 'fourty-north-ventures'),
                'use_featured_image'    => __('Use as featured image', 'fourty-north-ventures'),
                'insert_into_item'      => __('Insert into Team Member', 'fourty-north-ventures'),
                'uploaded_to_this_item' => __('Uploaded to this Team Member', 'fourty-north-ventures'),
                'items_list'            => __('Team Members list', 'fourty-north-ventures'),
                'items_list_navigation' => __('Team Members list navigation', 'fourty-north-ventures'),
                'filter_items_list'     => __('Filter Team Members list', 'fourty-north-ventures')
            ],
            'supports' => ['title', 'thumbnail', 'custom-fields', 'revisions'],
            'hierarchical' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'publicly_queryable' => true,
            'rewrite' => false,
        ]);
		
    }

    /**
     * Registers custom taxonomies
     */
    public function register_taxonomies()
    {

    }

    /**
     * Registers theme supports
     */
    public function theme_supports()
    {
        // Add default posts and comments RSS feed links to head
        add_theme_support('automatic-feed-links');

        // Add title tag support
        add_theme_support('title-tag');

        // Add featured image / post thumbnail support
        add_theme_support('post-thumbnails');

        // Add html5 markup support for search form, comment form, comments
        add_theme_support('html5', [
            'gallery',
            'caption'
        ]);

        // Add support for post formats (https://codex.wordpress.org/Post_Formats)
        add_theme_support('post-formats', []);

        // Add support for menus
        add_theme_support('menus');
    }
}

new StandardIndustries();


/*
 * 
 * Register Sidebar
 * 
 * */

register_sidebar( array(
	'name' => 'Single Page Sidebar',
	'id' => 'single_right',
	'before_widget' => '<div class="widget_content">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-heading">',
	'after_title' => '</h4>',
) );



/*
 * Header logo CSS function
 * */

function hn_header_logo_css(){
	?>
<style type="text/css">
.global-header__link {
    background-image: url(<?php echo get_template_directory_uri();?>/images/logo.png) !important;
    width: 120px !important;
    min-height: 30px !important;
    background-size: contain !important;
}

.body--inverted:not(.body--pinned) .global-header__link {
    background-image: url(<?php echo get_template_directory_uri();?>/images/logo.png) !important;
    background-size: contain !important;
    width: 120px !important;
    min-height: 30px !important;
}
.body--inverted:not(.body--pinned) .global-header__link {
    background-image: url(<?php echo get_template_directory_uri();?>/images/logo.png ) !important;
    background-size: contain !important;
    width: 120px !important;
	min-height: 30px !important;align-content
}
</style>
	<?php 
}
add_action('wp_head', 'hn_header_logo_css', 99);

