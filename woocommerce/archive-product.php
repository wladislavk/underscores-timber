<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 * If you use Timber, you have to completely override everything here, repeating Timber::get_context() etc from your primary
 * .php file (page.php in this example). There is a workaround for that, proposed by Timber author, but this approach 
 * is easier, since you have only a finite number of special Woocommerce pages (catalog, cart, checkout).
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$context = Timber::get_context();
$posts = Timber::get_posts();
$context['products'] = $posts;
$context['title'] = get_the_title(get_option( 'woocommerce_shop_page_id' ));

$args = array( 'post_type' => 'product', 'posts_per_page' => -1 );
query_posts( $args );
$formats = [];
$permalinks = [];
while ( have_posts() ) {
    the_post();
    $wc_product = new WC_Product(get_the_ID());
    foreach ($context['products'] as $product) {
        if ($product->id == $wc_product->id) {
            $formats[$product->id] = Books2Products::get_product_file_format($wc_product);
            $permalinks[$product->id] = kill_double_slash(get_permalink($GLOBALS['books2products_by_product'][$wc_product->id]['book_id']));
            break;
        }
    }
    unset($wc_product);
}
$context['formats'] = $formats;
$context['permalinks'] = $permalinks;

Timber::render('templates/woocommerce/archive-product.twig', $context);
