<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function get_wc_cart($context) {
    $context['cart_is_empty'] = 1;
    $product_prices = [];
    $product_names = [];
    if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {

                $product_names[] = apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key);
                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                $product_prices[] = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
            }
        }
        $context['cart_is_empty'] = 0;
        $context['cart_product_names'] = $product_names;
        $context['cart_product_prices'] = $product_prices;
        $context['cart_url'] = WC()->cart->get_cart_url();
        $context['checkout_url'] = WC()->cart->get_checkout_url();
    }
    return $context;
}
