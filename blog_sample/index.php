<!-- header -->
<?php get_header();?>

	<!-- pickup -->
	<?php get_template_part('template-parts/pickup_by_tag'); ?>


	<!-- content -->
	<div id="content">
		<div class="inner">

			<!-- primary -->
			<main id="primary">

				<?php if(have_posts()): ?>

				<!-- entries -->
				<div class="entries">
					<?php
					//記事数分ループ
					while(have_posts()):
						the_post();
					?>

					<!-- entry-item -->
					<a href="<?php the_permalink();//記事のリンク表示 ?>" class="entry-item">

						<!-- entry-item-img -->
						<div class="entry-item-img">
							<?php if(has_post_thumbnail()){
								the_post_thumbnail('large');
							}else{
							//なければNo Imageをデフォルトで表示
							echo '<img src="'.esc_url(get_template_directory_uri()).'/img/noimg.png" alt="">';
							} ?>
						</div><!-- /entry-item-img -->

						<!-- entry-item-body -->
						<div class="entry-item-body">

							<div class="entry-item-meta">
								<div class="entry-item-tag">
									<!-- trueを渡すとリンク付き、falseを渡すとリンクなし -->
									<?php my_the_post_category(false);?>
								</div>
								<!-- 公開日時を動的に表示する -->
								<time class="entry-item-published" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time><!-- /entry-item-published -->
							</div><!-- /entry-item-meta -->

							<h2 class="entry-item-title"><?php the_title();//タイトル表示 ?></h2><!-- /entry-item-title -->

							<div class="entry-item-excerpt">
								<p><?php the_excerpt(); ?></p>
							</div><!-- /entry-item-excerpt -->

						</div><!-- /entry-item-body -->
						
					</a><!-- /entry-item -->

					<?php endwhile; ?>
				</div><!-- /entries -->
				<?php endif; ?>

				<!-- pagination -->
				<?php get_template_part('template-parts/pagination'); ?>

			</main><!-- /primary -->

			<!-- sidebar -->
			<?php get_sidebar();?>
		</div><!-- /inner -->
	</div><!-- /content -->
	<!-- 問い合わせボタン -->
	<div class="contact-btn">
		<div class="inner">
			<h4>お問い合わせは以下のボタンからお気軽にどうぞ</h4>
			<?php echo do_shortcode('[btn link="https://localhost:8888/contact/"]お問い合わせはこちら[/btn]');?>
		</div>
	</div>
	<!-- footer -->
	<?php get_footer();?>