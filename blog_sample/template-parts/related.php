<?php
    $id = get_the_ID(); //ページID情報を取得して$idへ代入
    $cat = get_the_category();
    $cat_id = $cat[0]->cat_ID;
    $relate_query = new WP_Query(
        array(
            'post_type' => 'post',//投稿タイプを表示
            'posts_per_page' => 8, //最大8記事まで表示
            'post__not_in' => array($id), //現在の表示記事(ID)を含まない
            'orderby' => 'rand',//記事をランダムでh表示
            'category__in' => $cat_id,//現在のカテゴリに関連した記事を表示
        )
    );
?>
<div class="entry-related">
    <div class="related-title">関連記事</div>
    <?php if($relate_query->have_posts()): ?>
    <div class="related-items">
        <?php
            while($relate_query->have_posts()):
            $relate_query->the_post();
        ?>
        <a class="related-item" href="<?php the_permalink(); ?>">
            <div class="related-item-img">
                <?php
                    if(has_post_thumbnail()){
                        the_post_thumbnail('medium');
                    }else{
                        echo '<img src="'.esc_url(get_template_directory_uri()).'/img/noimg.png" alt="">';
                    }
                ?>
            </div><!-- /related-item-img -->
            <div class="related-item-title"><?php the_title(); ?></div><!-- /related-item-title -->
        </a><!-- /related-item -->
        <?php endwhile; ?>
    </div><!-- /related-items -->
    <?php endif; ?>
</div><!-- /entry-related -->
<?php wp_reset_postdata();//サブループをリセット?>