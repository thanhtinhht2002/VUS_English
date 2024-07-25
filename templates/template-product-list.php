<?php
/*
 * Template Name: TemplateCart
 */
?>
<?php get_header();?>
<?php get_sidebar(); ?>
<?php wc_get_template('cart/cart.php'); ?>
<?php wc_get_template('cart/cart-totals.php'); ?>
<?php get_footer(); ?>