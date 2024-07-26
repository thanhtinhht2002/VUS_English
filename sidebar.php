<?php global $theme_path; ?>
<header class="shadow">
        <div class="navbar__mobile">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
        <div class="navbar__mobile--list">
        <?php wp_nav_menu( array( // Hiển thị menu di động
                'container' => 'nav',
                'container_class' => 'mobile-menu',
                'menu_id' => 'main-menu'
            ) ); ?>
        </div>
        <div class="header__blur">

        </div>
        <a href="<?php echo home_url(); ?>" class="head__logo">
            <img src="<?php echo $theme_path; ?>/assets/images/img1.svg" alt="img" />
        </a>
        <div class="head__navbar">

        <?php wp_nav_menu( array( // Hiển thị menu Desktop
                'container' => 'nav',
                'menu_id' => 'main-menu',
                'container_class' => 'main-menu'
            ) ); ?>

        </div>
    </header>