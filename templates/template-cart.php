<?php
/*
 * Template Name: TemplateCart
 */
?>
<?php get_header();?>
<?php get_sidebar(); ?>
<div class="cart__container">
<div class="cart__container--content">
<?php wc_get_template('cart/cart.php'); ?>
</div>
<div class="cart__container--content">
<?php wc_get_template('cart/cart-totals.php'); ?>
</div>
</div>
<?php get_footer(); ?>