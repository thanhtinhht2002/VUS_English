<?php global $theme_path; ?>
<header class="shadow">
        <div class="navbar__mobile">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
        <div class="navbar__mobile--list">
            <a href="<?php echo home_url(); ?>/gio-hang">Giỏ Hàng</a>
            <a href="<?php echo home_url(); ?>">Trang chủ</a>
            <a onclick="categoryBlog()">Danh Mục Bài Viết <ion-icon name="chevron-up-outline"></ion-icon><ion-icon
                    name="chevron-down-outline"></ion-icon></a>
            <div class="navbar__mobile--category__blog">
                <a href="#">Danh mục bài viết 1</a>
                <a href="#">Danh mục bài viết 1</a>
                <a href="#">Danh mục bài viết 1</a>
                <a href="#">Danh mục bài viết 1</a>
            </div>

            <a id="header__category--product" onclick="categoryProduct()">Danh Mục Sản Phẩm <ion-icon
                    name="chevron-up-outline"></ion-icon><ion-icon name="chevron-down-outline"></ion-icon></a>
            <div class="navbar__mobile--category__product">
                <a href="#">Danh mục Sản Phẩm 1</a>
                <a href="#">Danh mục Sản Phẩm 1</a>
                <a href="#">Danh mục Sản Phẩm 1</a>
                <a href="#">Danh mục Sản Phẩm 1</a>
            </div>
            <a href="#">Liên Hệ</a>
        </div>
        <div class="header__blur">

        </div>
        <div class="head__logo">
            <img src="<?php echo $theme_path; ?>/assets/images/img1.svg" alt="img" />
        </div>
        <div class="head__navbar">
            <a href="#">
                <ion-icon name="home-outline"></ion-icon>
                <span>trang chủ</span>
            </a>
            <a href="#">
                <ion-icon name="call"></ion-icon>
                <span>(028) 7308 3333</span>
            </a>
        </div>
    </header>