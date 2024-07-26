<?php 
        global $theme_path;
        $theme_path = get_template_directory_uri();
        add_theme_support( 'post-thumbnails' );

        add_action( 'after_setup_theme', 'woocommerce_support' );
        function woocommerce_support() {
            add_theme_support( 'woocommerce' );
        }

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
function paginated_category( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( $query->is_category() ) {
            $query->set( 'posts_per_page', 1 );
        } 
    } 
}
add_action( 'pre_get_posts', 'paginated_category' );

function register_my_menu() {
    register_nav_menu('main-menu',__( 'Menu chính' ));
    register_nav_menu('mobile-menu',__( 'Menu di động' ));
}
add_action( 'init', 'register_my_menu' );