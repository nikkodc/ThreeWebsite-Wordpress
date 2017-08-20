<?php 

function thereeWebsite_resources(){
	//function to call style.css
    wp_enqueue_style('style',get_stylesheet_directory_uri() . '/style.css');
    
                                       //dependencies,version,load in true footer false header
	wp_enqueue_script('custom_javascript',get_template_directory_uri() . '/scripts/javascript.js', null, null, true);
    
    // Authentication security and prevent cross-site exploit
    //name of scripta file, ogject name
    wp_localize_script('custom_javascript','hideData',array(
        'nonce' => wp_create_nonce('wp_rest'),
        'siteURL' => get_site_url()
    ));

    //include jquery functions
    wp_register_script('custom_script', get_template_directory_uri() . '/scripts/jquery.js', array('jquery'),null, true );
    wp_enqueue_script('custom_script');
    //include CDN jquery
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), null, true);
    
    // include CDN bootstrap
    wp_deregister_script('bootstrap');
    wp_enqueue_script('bootstrap','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',array(), null, true);
    // bootstrap css
    wp_enqueue_style('bootstrap_css','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    // include CDN fontawesome
    wp_enqueue_style('fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts','thereeWebsite_resources');

//register images
//suggested images
$header_images = array(
    'header_image' => array(
            'url'           => get_template_directory_uri() . '/images/banner_01.jpg',
            'thumbnail_url' => get_template_directory_uri() . '/images/banner_01.jpg',
            'description'   => 'Sunset',
    ),
    'footer_image' => array(
            'url'           => get_template_directory_uri() . '/images/footer_35.jpg',
            'thumbnail_url' => get_template_directory_uri() . '/images/footer_35.jpg',
            'description'   => 'Flower',
    ),  
);
register_default_headers( $header_images );

//custom header image
$args = array(
	'flex-width'   => true,
	'width'    => 980,
	'flex-height'  => true,
	'height'   => 200,
	'default-image'    => get_template_directory_uri() . '/images/banner_01.jpg',
);
add_theme_support( 'custom-header', $args );

// Image feature
function threeWebsite_setup(){
    //navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu'),
    ));
    //Add the support
    add_theme_support('post-thumbnails');
    add_image_size('portfolio-thumbnail',560,420);
    add_image_size('project-image',150, 150, true);
    //set_post_thumbnail_size( 50, 50 );
}
add_action('after_setup_theme','threeWebsite_setup');

//Remove pages from search results
function mySearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','mySearchFilter');

// GET SUBPAGES ID
function get_subpage_id() {
    global $post;
    if ($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    return $post->ID;
}

// Does page have children?
function has_children() {
    global $post;
    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);
}

// Excerpt length
// portfolio excerpt
function custom_excerpt_length(){
    return 20;
}

function project_content_length(){
    return 45;
}

add_filter('excerpt_length','custom_excerpt_length');

// limit the content of the_content
function content_length($content){
    // Take the existing content and return a subset of it
    return substr($content, 0, 200);
}
// add_filter("the_content", "content_length");

// Add widget function
function threeWebsite_sidebar_widget(){
    // sidebar 1
    register_sidebar(array(
        'name' => 'Sidebar1',
        'id' => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>'
    ));
    //sidebar 2
    register_sidebar(array(
        'name' => 'Sidebar2',
        'id' => 'sidebar2',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>'
    ));
    // sidebar 3
    register_sidebar(array(
        'name' => 'Sidebar3',
        'id' => 'sidebar3',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>'
    ));
    // sidebar 4
    register_sidebar(array(
        'name' => 'Sidebar4',
        'id' => 'sidebar4',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>'
    ));
}

add_action('widgets_init','threeWebsite_sidebar_widget');

// // CREATING FAVICON
// function add_my_favicon() {
//    $favicon_path = get_template_directory_uri() . '/images/favicon.ico';
//    echo '<link rel="shortcut icon" href="' . $favicon_path . '" />';
// }
// add_action( 'wp_head', 'add_my_favicon' ); //front end
