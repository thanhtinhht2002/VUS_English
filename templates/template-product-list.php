<?php
/*
 * Template Name: TemplateProduct
 */
?>
<?php get_header();?>
<?php get_sidebar(); ?>
 <?php wc_get_template('cart/cart.php'); ?>
<?php wc_get_template('cart/cart-totals.php'); ?> 
<div class="cart__container">
<div class="cart__container--content">
<?php wc_get_template('cart/cart.php'); ?>
</div>
<div class="cart__container--content">
<?php wc_get_template('cart/cart-totals.php'); ?>
<?php get_footer(); ?>