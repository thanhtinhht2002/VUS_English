<?php 
        global $theme_path;
        $theme_path = get_template_directory_uri();
        add_theme_support( 'post-thumbnails' );

        add_action( 'after_setup_theme', 'woocommerce_support' );
        function woocommerce_support() {
            add_theme_support( 'woocommerce' );
        }