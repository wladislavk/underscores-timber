<?php
/**
 * Created by PhpStorm.
 * User: vkr
 * Date: 2/4/2558
 * Time: 20:06
 */

// Sad but true, if this file did not exist, Wordpress would revert to the file with same name in a parent theme,
// rather than going to the child theme page.php. If you do not have a parent theme or if you do not plan on ever using
// a parent theme as a stand-alone, you won't need a separate file for calling Timber::render() in every post type you use.
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$custom_fields = get_post_custom();
if ($custom_fields['product_ref'][0]) {
    $context['product_id'] = $custom_fields['product_ref'][0];
    $wc_product = new WC_Product($context['product_id']);
    $context['format'] = Books2Products::get_product_file_format($wc_product);
}
$context['custom_fields'] = $custom_fields;
$context['price'] = $GLOBALS['books2products_by_book'][$id]['price'];
Timber::render('templates/content-book.twig', $context);
