<?php get_header(); ?>
<?php get_sidebar(); ?>

    <main>
        <section class="detail__blog">
            <div class="detail__blog--container">
                <div class="detail__blog--main">
                    <div class="detail__blog--main__content">
                        <div class="detail__blog--main__img">
                            <img src="<?php echo get_the_post_thumbnail_url (); ?>" alt="img">
                        </div>
                        <div class="detail__blog--main__info">
                            <div class="detail__blog--main__category">
                                <?php the_category(); ?>
                            </div>
                            <div class="detail__blog--main__time">
                                20/7/2024
                            </div>
                        </div>
                        <p class="detail__blog--main__title">
                            <?php the_title(); ?>
                        </p>
                        <div class="detail__blog--main__description">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="detail__blog--main__extra ">
                        <div class="detail__blog--main__extra--tag">
                        <?php foreach(get_the_tags($post->ID) as $tag) {?>
                           <a href="<?php echo home_url()."/tag/".$tag->slug; ?>"><?php echo $tag->name; ?></a>
                        <?php } ?>
                        </div>
                        <div class="detail__blog--main__extra--new ">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                                    <div class="carousel-inner">

                                    <?php  $args = array(
                                    'post_status' => 'publish', // Chỉ lấy những bài viết được publish 		
                                    'showposts' => 7, )// số lượng bài viết ); ?> 
                                    <?php $getposts = new WP_query($args); ?>
                                    <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?> 
                                    <div class="item active">
                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url (); ?>"></a>
                                                <span class="badge">MỚI</span>
                                                <p><?php echo wp_trim_words( get_the_title() , 50 ) ?></p>
                                            </div>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>

                                    </div>

                                    <div id="slider-control">
                                        <a class="left carousel-control" href="#itemslider" data-slide="prev"><ion-icon
                                                name="chevron-back-circle-outline"></ion-icon></a>
                                        <a class="right carousel-control" href="#itemslider" data-slide="next"><ion-icon
                                                name="chevron-forward-circle-outline"></ion-icon></ion-icon></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail__blog--suggest">
                    <div class="detail__blog--suggest__category">
                        <div class="detail__blog--suggest__category--header">
                            <p>Danh Mục Bài Viết</p>
                        </div>
                        <div class="blog__content--category__container">
                                <?php
                        

                                            $taxonomy     = 'category';
                                            $orderby      = 'name';  
                                            $show_count   = 0;      // 1 for yes, 0 for no
                                        $pad_counts   = 0;      // 1 for yes, 0 for no
                                        $hierarchical = 1;      // 1 for yes, 0 for no  
                                        $title        = '';  
                                        $empty        = 0;

                                        $args = array(
                                            'taxonomy'     => $taxonomy,
                                            'orderby'      => $orderby,
                                            'show_count'   => $show_count,
                                            'pad_counts'   => $pad_counts,
                                            'hierarchical' => $hierarchical,
                                            'title_li'     => $title,
                                            'hide_empty'   => $empty
                                        );
                                        $all_categories = get_categories( $args );
                                        foreach ($all_categories as $cat) {
                                        if($cat->category_parent == 0 && $cat->term_id != 1) {
                                            $category_id = $cat->term_id;?>  
                                            <div class="blog__content--category__list">
                                            <p><a href="<?php echo get_term_link($cat->slug, 'category'); ?>"><ion-icon name="link-outline"></ion-icon><?php echo $cat->name; ?></a></p> 
                                            
                                            <?php $args2 = array(
                                                    'taxonomy'     => $taxonomy,
                                                    'child_of'     => 0,
                                                    'parent'       => $category_id,
                                                    'orderby'      => $orderby,
                                                    'show_count'   => $show_count,
                                                    'pad_counts'   => $pad_counts,
                                                    'hierarchical' => $hierarchical,
                                                    'title_li'     => $title,
                                                    'hide_empty'   => $empty
                                            );
                                            $sub_cats = get_categories( $args2 );
                                            
                                            if($sub_cats) {
                                            ?><ul><?php

                                                foreach($sub_cats as $sub_category) { ?>
                                                
                                                    <li><a href="<?php echo get_term_link($sub_category->slug, 'category'); ?>"><?php echo $sub_category->name; ?></a></li>
                                                <?php } ?>
                                            </ul></div>
                                            <?php } ?>
                                            
                                        <?php }       
                                    }
                                ?>
                                </div>
                            </div>
                    </div>
                    <div class="detail__blog--suggest__relative">
                        <div class="detail__blog--suggest__relative--header">
                            <p>Bài Viết Liên quan</p>
                        </div>
                        <div class="detail__blog--suggest__relative--list">
                        <?php
                            $categories = get_the_category($post->ID);
                            if ($categories) 
                            {
                                $category_ids = array();
                                foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                        
                                $args=array(
                                'category__in' => $category_ids,
                                'post__not_in' => array($post->ID),
                                'showposts'=>5, // Số bài viết bạn muốn hiển thị.
                                'caller_get_posts'=>1
                                );
                                $my_query = new wp_query($args);
                                if( $my_query->have_posts() ) 
                                {
                                    while ($my_query->have_posts())
                                    {
                                        $my_query->the_post();
                                        ?>
                                        <a href="<?php the_permalink(); ?>" class="detail__blog--suggest__relative--item">
                                        <img src="<?php echo get_the_post_thumbnail_url (); ?>" alt="img">
                                        <p><?php the_title(); ?></p>
                                        </a>

                                        <?php
                                    }
                                }else{ ?>
                                    <div class="detail__blog--suggest__relative--list__not">
                                        <p>Không có bài viết liên quan</p>
                                    </div>
                                <?php }
                            }
                            ?>

                        </div>
                    </div>
                    <div class="detail__blog--suggest__tag">
                        <div class="detail__blog--suggest__tag--header">
                            <p>Tags</p>
                        </div>
                        <div class="detail__blog--suggest__tag--list">
                        <?php $tagalls = get_tags(array('hide_empty' => false));
                            foreach ($tagalls as $tagall) { ?>
                                <a href="<?php echo home_url()."/tag/".$tagall->slug;?>"><?php echo $tagall->name ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="detail__blog--suggest__follow">
                        <div class="detail__blog--suggest__follow--header">
                            <p>Follow</p>
                        </div>
                        <div class="detail__blog--suggest__follow--list">
                            <a href="#"><ion-icon name="logo-facebook"></ion-icon></a><a href="#"><ion-icon name="logo-instagram"></ion-icon></a><a href="#"><ion-icon name="logo-tiktok"></ion-icon></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<script src="<?php echo $theme_path; ?>/assets/js/detail-blog.js"></script>
<?php get_footer(); ?>