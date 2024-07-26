<?php
/*
 * Template Name: TemplateBlog
 */
?>
<?php global $theme_path; ?>
<?php get_header(); ?>
<?php get_sidebar(); ?>   
<?php $obj=get_queried_object();?>
<div class="blog__container">

<div class="blog__header">
    <p>Danh Sách Bài Viết</p><ion-icon name="options-outline"></ion-icon>
</div>
<div class="blog__content">
    <div class="blog__content--main">
        <?php
            $posts = new WP_Query(array(
            'post_type'=>'post',
            'post_status'=>'publish',
            'cat' => $obj->cat_ID,
            'orderby' => 'ID',
            'order' => 'DESC',
            'posts_per_page'=> 20));

            if($posts->found_posts>0){
        ?>

        <div class="blog__content--list">
            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
            <div class="blog__content--list__item">
                <div class="blog__content--list__item-view">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url (); ?>" alt="img">
                </a>
                <div class="blog__content--list__item--text">
                    <div class="blog__content--list__item--date">
                        <p><?php the_date(); ?></p>
                        <p>
                        <?php foreach(get_the_tags($post->ID) as $tag) {?>
                           <a href="<?php echo home_url()."/tag/".$tag->slug; ?>"><?php echo $tag->name; ?></a>
                        <?php } ?>
                        </p>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="blog__content--list__item--title">
                        <p><?php echo wp_trim_words( get_the_title() , 50 ) ?></p>
                    </a>
                    <div class="blog__content--list__item--description">
                        <p><?php echo wp_trim_words( get_the_excerpt() , 50 ) ?></p>
                    </div>
                    <div class="blog__content--list__item--readmore">
                        <a href="#">Xem chi tiết</a>
                    </div>
                    <div class="blog__content--list__item--category">
                       <?php the_category(); ?>
                    </div>
                </div>
            </div>
            <?php endwhile ; wp_reset_query() ;?>
        </div>
        <div class="blog__content--pagination">
            <div class="blog__content--pagination__list">
                <div class="blog__content--pagination__item">
                    <a href="#"><ion-icon name="caret-back-outline"></ion-icon></a>
                </div>
                <div class="blog__content--pagination__item">
                    <a href="#">1</a>
                </div>
                <div class="blog__content--pagination__item">
                    <a href="#">2</a>
                </div>
                <div class="blog__content--pagination__item">
                    <a href="#"><ion-icon name="caret-forward-outline"></ion-icon></a>
                </div>
            </div>
        </div>
        <?php } else { ?>
            <div class="blog__content--list__item--not">
                <p>Danh Sách Bài Viết Trống</p>
            </div>
        <?php }?>
    </div>
    <div class="blog__content--suggest">
        <div class="blog__content--contact">
            <p class="blog__content--contact_note">Lorem Ipsum is simply dummy text </p>
            <p class="blog__content--contact_text">Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. </p>
            <form class="blog__content--contact__form" action="#">
                <input type="text" placeholder="liên hệ với chúng tôi...">
                <button>Gửi Ngay!</button>
            </form>
        </div>
        <div class="blog__content--category">
            <div class="blog__content--category__header">
                <p>Danh Mục</p>
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
        <div class="blog__content--category">
            <div class="blog__content--category__header">
                <p>Danh Mục</p><ion-icon name="close-outline"></ion-icon>
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
        <div class="blog__content--recomend tag">
            <div class="blog__content--recomend__header">
                <p>Tag</p>
            </div>
            <div class="blog__content--recomend__list">
            <?php $tagalls = get_tags(array('hide_empty' => false));
                foreach ($tagalls as $tagall) { ?>
             <a href="<?php echo home_url()."/tag/".$tagall->slug;?>"><?php echo $tagall->name ?></a>
           <?php } ?>
            </div>
        </div>
        </div>
        <div class="blog__content--recomend">
            <div class="blog__content--recomend__header">
                <p>Bài Viết Mới Nhất</p>
            </div>
            <div class="blog__content--recomend__list">
            <?php  $args = array(
                'post_status' => 'publish', // Chỉ lấy những bài viết được publish 		
                'showposts' => 7, )// số lượng bài viết ); ?> 
                <?php $getposts = new WP_query($args); ?>
                <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                <?php while ($getposts->have_posts()) : $getposts->the_post(); ?> 
                <a href="<?php the_permalink(); ?>" class="blog__content--recomend--item">
                    <img src="<?php echo get_the_post_thumbnail_url (); ?>" alt="img">
                    <div class="blog__content--recomend--item__text">
                        <p class="blog__content--recomend--item__category"><?php echo wp_trim_words( get_the_title() , 50 ) ?></p>
                        <p class="blog__content--recomend--item__description"><?php echo wp_trim_words( get_the_excerpt() , 50 ) ?></p>
                    </div>
                </a>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
        <div class="blog__content--recomend tag">
            <div class="blog__content--recomend__header">
                <p>Tag</p>
            </div>
            <div class="blog__content--recomend__list">
            <?php $tagalls = get_tags(array('hide_empty' => false));
                foreach ($tagalls as $tagall) { ?>
             <a href="<?php echo home_url()."/tag/".$tagall->slug;?>"><?php echo $tagall->name ?></a>
           <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>

<?php get_footer(); ?>
<script src="<?php echo $theme_path; ?>/assets/js/blog.js"></script>