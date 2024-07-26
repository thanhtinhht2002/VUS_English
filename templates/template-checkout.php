<?php
/*
 * Template Name: TemplateCheckout
 */
?>
<?php get_header();?>
<?php get_sidebar(); ?>

    <div class="checkouts">
    <div class="checkout__container shadow">
    <?php
        $uri = $_SERVER['REQUEST_URI'];
        $requesturl = explode("/",  $uri); ?>
    <?php if(isset($requesturl[4])){ ?>

    <?php wc_get_template('checkout/thankyou.php');?> 
    <div class="thankyou-home">
        <a href="<?php echo home_url();?>"> Quay về Trang chủ</a>
    </div>
    <?php }else{ ?>

    <?php wc_get_template('checkout/form-checkout.php');?>

    </div>
    </div>
    <?php } ?>
<?php  get_footer(); ?>