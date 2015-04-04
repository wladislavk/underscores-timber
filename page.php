<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Pu-Sa Theme
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render('templates/page.twig', $context);
