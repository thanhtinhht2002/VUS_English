<?php get_header(); ?>
<?php get_sidebar(); ?>




<main>

	<div class="product__list--container">
		<?php do_action('woocommerce_before_main_content'); ?>
		<div class="product__list--box">
			<div class="product__list--navbar">
				<div class="product__list--navbar__filter">
					Danh sách cửa hàng
				</div>
				<div class="product__list--navbar__title">
					<?php
					// Get the queried object to determine the current category
					$term = get_queried_object();

					if ($term && is_a($term, 'WP_Term')) {
						echo esc_html($term->name);
					}
					woocommerce_result_count();
					?>
				</div>
				<div class="product__list--navbar__sorted">
					Sản phẩm gợi ý
				</div>


			</div>

			<div class="product__list--navbar__product">

				<div class="product__list--navbar__product--filter">
					<div class="product__list--navbar__product--filter__title">
						Tìm kiếm theo từ khóa
					</div>

					<input class="product__list--navbar__product--filter__input" type="text"
						placeholder="Nhập từ khóa để tìm kiếm . . .">
					<button class="product__list--navbar__product--filter__btn">
						Tìm kiếm
					</button>
					<div class="product__list--navbar__product--filter__desc">
						Sắp xếp sản phẩm
					</div>
					<?php woocommerce_catalog_ordering(); ?>
					<div class="product__list--navbar__product--filter__sorted">
						<div class="product__list--navbar__product--filter__tags">
							<div class="product__list--tags__list">
								<p><a href="#"><ion-icon name="link-outline"></ion-icon>Loại sản phẩm</a></p>

								<ul>





									<?php
									$taxonomy = 'product_cat';
									$orderby = 'name';
									$show_count = 0;      // 1 for yes, 0 for no
									$pad_counts = 0;      // 1 for yes, 0 for no
									$hierarchical = 1;      // 1 for yes, 0 for no
									$title = '';
									$empty = 0;

									$args = array(
										'taxonomy' => $taxonomy,
										'orderby' => $orderby,
										'show_count' => $show_count,
										'pad_counts' => $pad_counts,
										'hierarchical' => $hierarchical,
										'title_li' => $title,
										'hide_empty' => $empty,
									);

									$all_categories = get_categories($args);
									$current_slug = basename($_SERVER['REQUEST_URI']);

									foreach ($all_categories as $cat) {
										if ($cat->slug == 'place') {
											$category_id = $cat->term_id;
											$args2 = array(
												'taxonomy' => $taxonomy,
												'child_of' => 0,
												'parent' => $category_id,
												'orderby' => $orderby,
												'show_count' => $show_count,
												'pad_counts' => $pad_counts,
												'hierarchical' => $hierarchical,
												'title_li' => $title,
												'hide_empty' => $empty,
											);
											$sub_cats = get_categories($args2);
											if ($sub_cats) {
												foreach ($sub_cats as $sub_category) {
													$active_class = ($current_slug == $sub_category->slug) ? ' active' : '';
													?>
													<li class="product__list--categories <?php echo $active_class; ?>">
														<a href="<?php echo home_url() ?>/<?php echo $sub_category->slug ?>" id=""
															class="product__list--right__fitter--title"><?php echo $sub_category->name ?>
														</a>
													</li>
													<?php
												}
											}
										}
									}
									?>







									<li><a href="#">Name Category 2</a></li>

								</ul>

							</div>

						</div>
					</div>
				</div>

				<div class="product__list--navbar__product--items">


					<?php
					if (wc_get_loop_prop('total')) {
						while (have_posts()) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action('woocommerce_shop_loop');

							global $product; // Sử dụng biến $product của WooCommerce
							?>
							<a class="product__list--navbar__items">
								<!-- img -->
								<div class="product__list--navbar__items--image">
									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail('woocommerce_thumbnail'); ?>
									<?php else: ?>
										<img src="https://picsum.photos/300" alt="<?php the_title(); ?>">
									<?php endif; ?>
								</div>
								<!-- rating -->
								<div class="product__list--rating">
									<?php
									// Hiển thị xếp hạng sản phẩm
									if ( $average = $product->get_average_rating() ) {
										echo wc_get_rating_html( $average );
									} else {
										echo __('Chưa có mục đánh giá', 'woocommerce'); // Hiển thị thông báo nếu chưa có đánh giá
									}
									?>
								</div>
								
								<!-- type/ desc -->
								<div class="product__list--navbar__product--inf">
									<div class="product__list--navbar__product--type">
										<?php the_title(); ?>
									</div>
									<div class="product__list--navbar__product--desc">
										<?php the_excerpt(); ?>
									</div>
									<!-- price -->
									<div class="product__list--navbar__product--price">
										<?php echo $product->get_price_html(); ?>
									</div>
								</div>
							</a>
							<?php
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action('woocommerce_after_shop_loop');
					?>

				



				</div>
				<!-- ================================================ -->
				<div class="product__numpage--pagination">
					<div class="product__numpage--pagination__list">
						<div class="product__numpage--pagination__item">
							<a href="#"><ion-icon name="caret-back-outline"></ion-icon></a>
						</div>
						<div class="product__numpage--pagination__item">
							<a href="#">1</a>
						</div>
						<div class="product__numpage--pagination__item">
							<a href="#">2</a>
						</div>
						<div class="product__numpage--pagination__item">
							<a href="#"><ion-icon name="caret-forward-outline"></ion-icon></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</main>