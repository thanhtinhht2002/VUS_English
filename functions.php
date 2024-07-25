<?php 
        global $theme_path;
        $theme_path = get_template_directory_uri();
        add_theme_support( 'post-thumbnails' );

        add_action( 'after_setup_theme', 'woocommerce_support' );
        function woocommerce_support() {
            add_theme_support( 'woocommerce' );
        }
        // Add the cart link to menu
function wpexplorer_add_menu_cart_item_to_menus( $items, $args ) {

        // Make sure your change 'main_menu' to your Menu location !!!!
        if ( 'main_menu' === $args->theme_location ) {
            $css_class = 'menu-item menu-item-type-cart menu-item-type-woocommerce-cart';
            if ( function_exists( 'is_cart' ) && is_cart() ) {
                $css_class .= ' current-menu-item';
            }
            $items .= '<li class="' . esc_attr( $css_class ) . '">';
                $items .= wpexplorer_menu_cart_item();
            $items .= '</li>';
        }
    
        return $items;
    }
    add_filter( 'wp_nav_menu_items', 'wpexplorer_add_menu_cart_item_to_menus', 10, 2 );
    
    // Function returns the main menu cart link
    function wpexplorer_menu_cart_item() {
        $output = '';
    
        $cart_count = absint( WC()->cart->cart_contents_count );
        $cart_total = WC()->cart->get_cart_total();
    
        if ( $cart_count ) {
            $url = wc_get_cart_url();
        } else {
            $url = wc_get_page_permalink( 'shop' );
        }
    
        $icon = '<svg xmlns="https://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>';
    
        $output .= '<a href="'. esc_url( $url ) .'" class="menu-cart-total">';
    
            $output .= $icon . wp_kses_post( $cart_total );
    
        $output .= '</a>';
    
        return $output;
    }
    
    
    // Update cart link with AJAX
    function wpexplorer_main_menu_cart_link_fragments( $fragments ) {
        $fragments['.menu-cart-total'] = wpexplorer_menu_cart_item();
        return $fragments;
    }
    add_filter( 'add_to_cart_fragments', 'wpexplorer_main_menu_cart_link_fragments' );


// ====================================================================================================
function Tao_banner_home()
    {
    
    
        /*
         * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
         */
        $label = array(
            'name' => 'Banner Home', //Tên post type dạng số nhiều
            'singular_name' => 'Banner Trang chủ' //Tên post type dạng số ít
        );
    
    
        /*
         * Biến $args là những tham số quan trọng trong Post Type
         */
        $args = array(
            'labels' => $label, //Gọi các label trong biến $label ở trên
            'description' => 'Tạo Banner Home', //Mô tả của post type
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'author',
                'thumbnail',
                'comments',
                'trackbacks',
                'revisions',
                'custom-fields'
            ),
            //Các tính năng được hỗ trợ trong post type
            
            'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
            'public' => true, //Kích hoạt post type
            'show_ui' => true, //Hiển thị khung quản trị như Post/Page
            'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
            'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
            'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
            'menu_position' => 4, //Thứ tự vị trí hiển thị trong menu (tay trái)
            // 'menu_icon' =>  home_url(). '/wp-content/uploads/2024/04/sale.png', //Đường dẫn tới icon sẽ hiển thị
            'can_export' => true, //Có thể export nội dung bằng Tools -> Export
            'has_archive' => true, //Cho phép lưu trữ (month, date, year)
            'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
            'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
            'capability_type' => 'post',
        );
    
    
        register_post_type('home-banner', $args); 
    
    
    }
    /* Kích hoạt hàm tạo custom post type */
    add_action('init', 'Tao_banner_home');
    
    add_filter('pre_get_posts','lay_custom_post_type');

function lay_custom_post_type($query) {
  if (is_home() && $query->is_main_query ())
    $query->set ('post_type', array ('post','home-banner'));
    return $query;
}

