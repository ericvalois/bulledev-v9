<?php
/**
 * Bulledev V9 functions and definitions
 *
 * @package Bulledev V9
 */

if ( ! function_exists( 'bulledev_v9_setup' ) ) :
    function bulledev_v9_setup() {

    	// Add default posts and comments RSS feed links to head.
    	add_theme_support( 'automatic-feed-links' );

    	add_theme_support( 'title-tag' );

    	add_theme_support( 'post-thumbnails' );

    	add_theme_support( 'html5', array(
    		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    	) );

    	add_theme_support( 'post-formats', array(
    		'aside', 'image', 'video', 'quote', 'link',
    	) );

    }
endif; 
add_action( 'after_setup_theme', 'bulledev_v9_setup' );

function bulledev_v9_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bulledev-v9' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'bulledev_v9_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bulledev_scripts_and_styles() {

    // Only on stage
    if( !strpos($_SERVER['SERVER_NAME'], 'bulledev.com') ){
        wp_enqueue_style( 'bulledev-v9-style', get_stylesheet_uri() );
    }
	
    // jQuery
    if( is_page(203) || is_page(1485)  ){
        wp_enqueue_script( 'jquery' ); 
    }
}

// Defer all script
function add_async( $tag, $handle ) {
    if( is_admin() || is_page(203) || is_page(1485) ) {
        return $tag;
    }else{
        return str_replace( ' src', ' async src', $tag );
    }
}


// Critical CSS only for main domain
if( strpos($_SERVER['SERVER_NAME'], 'bulledev.com') ){
    add_action('wp_head','hook_css', 5);
}

function hook_css()
{
    $critical_syle = "<style>";

    if( is_front_page() ){
        $critical_syle .= file_get_contents( get_bloginfo("template_directory") . "/critical/home.min.css");
    }elseif( is_page(203) ){
        $critical_syle .= file_get_contents( get_bloginfo("template_directory") . "/critical/nous-joindre.min.css");
    }elseif( get_post_type() == 'question' ){
        $critical_syle .= file_get_contents( get_bloginfo("template_directory") . "/critical/single-question.min.css");
    }else{
        $critical_syle .= file_get_contents( get_bloginfo("template_directory") . "/critical/single.min.css");
    }

    $critical_syle .= "</style>";

    echo $critical_syle;

    echo '<script>';
        echo 'function loadCSS( href, before, media ){';
            echo '"use strict";';
            echo 'var ss = window.document.createElement( "link" );';
            echo 'var ref = before || window.document.getElementsByTagName( "script" )[ 0 ];';
            echo 'var sheets = window.document.styleSheets;';
            echo 'ss.rel = "stylesheet";';
            echo 'ss.href = href;';
            echo 'ss.media = "only x";';
            echo 'ref.parentNode.insertBefore( ss, ref );';
            echo 'function toggleMedia(){';
                echo 'var defined;';
                echo 'for( var i = 0; i < sheets.length; i++ ){';
                    echo 'if( sheets[ i ].href && sheets[ i ].href.indexOf( href ) > -1 ){';
                        echo 'defined = true;';
                    echo '}';
                echo '}';
                echo 'if( defined ){';
                    echo 'ss.media = media || "all";';
                echo '}';
                echo 'else {';
                    echo 'setTimeout( toggleMedia );';
                echo '}';
            echo '}';
            echo 'toggleMedia();';
            echo 'return ss;';
        echo '}';

        echo 'loadCSS( "' . get_bloginfo("template_directory") . '/style.css" );';
    echo ' </script>';

    echo '<noscript><link href="' . get_bloginfo("template_directory") . '/style.css" rel="stylesheet"></noscript>';
}

function validate_gravatar($email) {
    // Craft a potential url and test its headers
    $hash = md5(strtolower(trim($email)));
    $uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
    $headers = @get_headers($uri);
    if (!preg_match("|200|", $headers[0])) {
        $has_valid_avatar = FALSE;
    } else {
        $has_valid_avatar = TRUE;
    }
    return $has_valid_avatar;
}

add_filter("gform_field_value_avatar_color", "avatar_color");
function avatar_color($value){

    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

    return $color;
}

add_filter( 'gform_submit_button', 'theme_t_wp_submit_button', 10, 2 );
function theme_t_wp_submit_button( $button, $form ){
 
  return '<button class="button button-blue button-big" type="submit" name="action" id="gform_submit_button_'.$form["id"].'">'.$form["button"]["text"]. '</button>';
 
}

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button button-blue btn_page"';
}

add_action('after_setup_theme','bulledev_startup');
function bulledev_startup() {
    // launching operation cleanup
    add_action('init', 'bulledev_head_cleanup');
    // remove WP version from RSS
    add_filter('the_generator', 'bulledev_rss_version');

    // enqueue base scripts and styles
    add_action('wp_enqueue_scripts', 'bulledev_scripts_and_styles', 999);

    // Remove Disqus script when not needed
    add_filter('wp_footer', 'remove_disqus_count');
} 

// Remove Disqus script when not needed
function remove_disqus_count(){
    if( !is_single() ){
        wp_dequeue_script('dsq_count_script');
    } 
}

// Some cleanup
function bulledev_head_cleanup() {
    remove_action( 'wp_head', 'rsd_link' );
    // windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // index link
    remove_action( 'wp_head', 'index_rel_link' );
    // previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // start link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    // WP version
    remove_action( 'wp_head', 'wp_generator' );

    // remove WP version from css
    add_filter( 'style_loader_src', 'bulledev_remove_wp_ver_css_js', 9999 );
    // remove Wp version from scripts
    add_filter( 'script_loader_src', 'bulledev_remove_wp_ver_css_js', 9999 );

    // Defer script
    add_filter( 'script_loader_tag', 'add_async', 10, 2 );

} /* end head cleanup */

// remove WP version from RSS
function bulledev_rss_version() { return ''; }

// remove WP version from scripts
function bulledev_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}


function notify_question_author($comment_id, $comment = null) {
    global $post;
    if( 'question' == get_post_type($post->ID) ){
        $to = get_post_meta( $post->ID, 'question-courriel', true );
        $subject = 'Une nouvelle réponse à votre question!';
        $message = 'Il y a une nouvelle réponse à votre question: ' . get_permalink($post->ID);
        $headers[] = 'From: bulledev.com <no-reply@bulledev.com>';

        wp_mail( $to, $subject, $message, $headers );
    }
}
add_action('wp_insert_comment', 'notify_question_author');