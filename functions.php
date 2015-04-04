<?php
/**
 * Pu-Sa Theme functions and definitions
 *
 * @package Pu-Sa-Timber Theme
 */
if ( ! class_exists( 'Timber' ) ) {
    add_action( 'admin_notices', function() {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
    } );
    return;
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

add_filter('timber_context', function($data){
    /* So here you are adding data to Timber's context object, i.e... */
//    $data['foo'] = 'I am some other typical value set in your functions.php file, unrelated to the menu';
    $data['menu'] = new TimberMenu();
    return $data;
});

include_once 'functions-front.php';
include_once 'functions-book.php';
include_once 'functions-woocommerce-twig.php';

class StarterSite extends TimberSite {

    function __construct() {
        add_theme_support( 'post-formats' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'menus' );
        add_filter( 'timber_context', array( $this, 'add_to_context' ) );
        add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
        add_action( 'init', array( $this, 'register_post_types' ) );
        add_action( 'init', array( $this, 'register_taxonomies' ) );
        parent::__construct();
    }

    function register_post_types() {
        //this is where you can register custom post types
    }

    function register_taxonomies() {
        //this is where you can register custom taxonomies
    }

    function add_to_context( $context ) {
//        $context['notes'] = 'These values are available everytime you call Timber::get_context();';*/
        $context['is_front_page'] = (is_front_page()) ? true : false;
        $context['menu'] = new TimberMenu();
        $context['site'] = $this;
        if (is_front_page()) {
            include_once 'functions-front.php';
            $context['front_page_items'] = set_front_page_items();
        }
        $context['topbar'] = Timber::get_widgets('top_bar');
        $context['dynamic_sidebar'] = Timber::get_widgets('sidebar-1');
        $context = get_wc_cart($context);
        return $context;
    }

    function add_to_twig( $twig ) {
        /* this is where you can add your own fuctions to twig */
/*        $twig->addExtension( new Twig_Extension_StringLoader() );
        $twig->addFilter( 'myfoo', new Twig_Filter_Function( 'myfoo' ) );*/
        return $twig;
    }

}

new StarterSite();
