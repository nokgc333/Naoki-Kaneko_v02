<?php
// Template Name や Template Post Type のコメントは single.php には不要なので削除します。
get_header(); ?>

<main>
    <?php // mainタグは元のHTMLにはありませんでしたが、構造上ここにあると適切 ?>
    <div class="c-bg">
      <div class="c-bg__inner c-inner">
        <div class="c-bg__item"></div>
        <div class="c-bg__item"></div>
        <div class="c-bg__item"></div>
        <div class="c-bg__item"></div>
      </div>
    </div>
    <div class="c-popup" id="popup">
      <div class="c-popup__bg" id="popup-close"></div>
      <div class="c-popup__body">
        <a target="_blank" href="https://stock-sun.com/coaching/engineer/" class="c-popup__link">
          <picture>
            <source media="(min-width: 768px)" data-srcset="https://stock-sun.com/techelite/wp-content/themes/tech_elite_theme/assets/img/common/popup-pc.jpg">
            <img data-src="https://stock-sun.com/techelite/wp-content/themes/tech_elite_theme/assets/img/common/popup-sp.jpg" alt="最終課題をクリアした方限定!3万円キャッシュバック※条件：納期、クオリティをクリアした方キャッシュバック詳細はこちら＞＞" width="335" height="324">
          </picture>
        </a>
      </div>
    </div>
    <div class="c-contents" id="contents">
      <div class="c-cta">
        <a target="_blank" href="https://stock-sun.com/coaching/engineer/" class="c-cta__btn2">
          <span class="sub">毎日無料個別説明会実施中</span>
          <span class="txt">無料個別説明会はこちら<span class="arrow"></span></span>
        </a>
      </div>

      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

          <div class="c-fv">
            <div class="c-fv__inner c-inner">
              <div class="c-fv__head">
                <time class="c-fv__date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date( 'Y/m/d' ); ?></time>
                <h1 class="c-fv__ttl"><?php the_title(); ?></h1>
              </div>
              <?php
              // パンくずリスト (もしテーマやプラグインで提供されているものがあれば、それを使用)
              if ( function_exists( 'bcn_display' ) ) { // Breadcrumb NavXT プラグインの場合
                  echo '<div class="l-breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/"><div class="l-breadcrumb__inner inner">';
                  bcn_display();
                  echo '</div></div>';
              } elseif ( function_exists( 'yoast_breadcrumb' ) ) { // Yoast SEO プラグインの場合
                  yoast_breadcrumb( '<div class="l-breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/"><div class="l-breadcrumb__inner inner">', '</div></div>' );
              } else {
                  // 自作またはテーマ標準のパンくずがない場合のフォールバック (より詳細なものにすることも可能)
                  // echo '<div class="l-breadcrumb"><div class="l-breadcrumb__inner inner"><a href="'.home_url().'">ホーム</a> > <a href="'.esc_url(get_post_type_archive_link('article')).'">記事一覧</a> > <span>'.get_the_title().'</span></div></div>'; // 注意: ここも'article'に変更するなら
              }
              ?>
            </div>
          </div>

          <div class="l-single__container">
            <div class="l-single__inner">
              <div class="l-single__main">
                <?php if ( has_post_thumbnail() ) : ?>
                  <div class="l-single__thumb">
                    <?php
                    $thumbnail_id = get_post_thumbnail_id();
                    $image_src_full = wp_get_attachment_image_src( $thumbnail_id, 'full' ); // フルサイズの画像URL
                    $image_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
                    if ( empty( $image_alt ) ) {
                        $image_alt = get_the_title();
                    }
                    ?>
                    <img src="<?php echo esc_url( $image_src_full[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                  </div>
                <?php endif; ?>
                <div class="l-single__body user-content"> <?php // user-contentクラスなどを追加してCSSでスタイル調整しやすくする ?>
                  <?php the_content(); // 投稿本文を表示 ?>
                </div>
              </div>

              <aside class="c-sidebar"> <?php // asideタグに変更 ?>
                <div class="c-sidebar__block">
                  <p class="c-sidebar__block-ttl">カテゴリー</p>
                  <div class="c-sidebar__category">
                    <?php
                    $categories = get_the_category();
                    if ( $categories ) :
                        foreach ( $categories as $category ) :
                    ?>
                    <div class="c-sidebar__category-block">
                      <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="c-sidebar__category-ttl">
                        <?php echo esc_html( $category->name ); ?>
                      </a>
                    </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                  </div>
                </div>
                <div class="c-sidebar__block">
                  <p class="c-sidebar__block-ttl">人気記事</p>
                  <div class="c-sidebar__article">
                    <?php
                    if ( class_exists( 'WordPressPopularPosts\\Query' ) ) : // プラグインのQueryクラスが存在するか確認
                        $popular_posts_args = array(
                            'limit'     => 3,       // 表示する記事の数
                            'post_type' => 'article', // ★変更点: 'post' から 'article' へ
                            'range'     => 'all',   // 集計期間 (all, last24hours, last7days, last30days, custom)
                            'order_by'  => 'views', // views（閲覧数順）または comments（コメント数順）など
                            // 'freshness' => 1,    // 必要であれば古い投稿を除外（例: 1 = 24時間以内に更新されたもののみ）
                        );
                        $popular_posts_query = new \WordPressPopularPosts\Query( $popular_posts_args );
                        $popular_items       = $popular_posts_query->get_posts();

                        if ( $popular_items && is_array( $popular_items ) && !empty($popular_items) ) :
                            $rank = 0;
                            foreach ( $popular_items as $popular_post_item ) :
                                $rank++;
                                $post_id = $popular_post_item->id; // 投稿ID

                                // 投稿情報を取得
                                $post_title     = get_the_title( $post_id );
                                $post_permalink = get_permalink( $post_id );
                                $post_date_display = get_the_date( 'Y/m/d', $post_id ); // 表示用日付
                                $post_date_iso   = get_the_date( 'c', $post_id );     // datetime属性用ISO形式日付

                                // サムネイル画像を取得
                                $thumbnail_html = '';
                                if ( has_post_thumbnail( $post_id ) ) {
                                    // 添付画像3のサイズ感を参考に、適宜サイズを指定してください。
                                    // 例: array(150, 100) や 'thumbnail', 'medium' などテーマで定義されたサイズ
                                    $thumbnail_html = get_the_post_thumbnail( $post_id, array(150, 100), array( 'alt' => esc_attr( $post_title ) ) );
                                } else {
                                    // アイキャッチがない場合のプレースホルダー画像
                                    $thumbnail_html = '<img src="https://via.placeholder.com/150x100.png?text=No+Image" alt="' . esc_attr( $post_title ) . '" width="150" height="100">';
                                }

                                // ランキングバッジのHTML（CSSでスタイリング）
                                // 添付画像3のバッジには王冠アイコンがあります。これはCSSの::beforeや画像で追加します。
                                $rank_badge_html = '<span class="popular-item__rank rank-badge--' . $rank . '"><span class="rank-badge__number">' . $rank . '</span></span>';

                    ?>
                    <article class="c-sidebar__article-item">
                      <a href="<?php echo esc_url( $post_permalink ); ?>" class="c-sidebar__article-link">
                        <div class="c-sidebar__article-img c-img -popular">
                          <?php echo $rank_badge_html; // ランキングバッジ ?>
                          <?php echo $thumbnail_html; // サムネイル画像 ?>
                        </div>
                        <div class="c-sidebar__article-body">
                          <time class="c-sidebar__article-date" datetime="<?php echo esc_attr( $post_date_iso ); ?>"><?php echo esc_html( $post_date_display ); ?></time>
                          <p class="c-sidebar__article-ttl"><?php echo esc_html( $post_title ); ?></p>
                        </div>
                      </a>
                    </article>
                    <?php
                            endforeach; // foreach ( $popular_items as $popular_post_item )
                        else: // if ( $popular_items && is_array( $popular_items ) && !empty($popular_items) )
                            echo '<p>人気記事はありません。</p>';
                        endif; // $popular_items
                    else: // if ( class_exists( 'WordPressPopularPosts\\Query' ) )
                        // WordPress Popular Posts プラグインが有効でないか、Queryクラスが見つからない場合
                        // ソースコード①のwpp_get_mostpopular関数を使った元のコードをフォールバックとして残すこともできます。
                        // ここでは、プラグインがない場合はメッセージを表示します。
                        echo '<p>人気記事を表示できません (プラグインが見つかりません)。</p>';
                        // もし元のwpp_get_mostpopularでの表示を残したい場合は、ソースコード①の該当部分をここに記述
                        /*
                        if ( function_exists( 'wpp_get_mostpopular' ) ) {
                            $popular_posts_args_fallback = array( // (略) ソースコード①の引数 ... );
                            wpp_get_mostpopular( $popular_posts_args_fallback );
                        }
                        */
                    endif; // class_exists
                    ?>
                  </div><?php // .c-sidebar__article ?>
                </div><?php // .c-sidebar__block (人気記事) ?>
                <div class="c-sidebar__block">
                  <p class="c-sidebar__block-ttl">新着記事</p>
                  <div class="c-sidebar__article">
                    <?php
                    $recent_posts_args = array(
                        'post_type'      => 'article', // ★変更点: 'post' から 'article' へ
                        'posts_per_page' => 5,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'post__not_in'   => array( get_the_ID() ), // 現在表示中の記事は除外
                    );
                    $recent_query = new WP_Query( $recent_posts_args );
                    if ( $recent_query->have_posts() ) :
                        while ( $recent_query->have_posts() ) : $recent_query->the_post();
                    ?>
                    <article class="c-sidebar__article-item">
                      <a href="<?php the_permalink(); ?>" class="c-sidebar__article-link">
                        <div class="c-sidebar__article-img c-img">
                          <?php if ( has_post_thumbnail() ) : ?>
                            <?php
                            $recent_thumb_id = get_post_thumbnail_id();
                            $recent_image_src = wp_get_attachment_image_src( $recent_thumb_id, 'thumbnail' ); // サイドバー用に小さいサイズ
                            $recent_image_alt = get_post_meta( $recent_thumb_id, '_wp_attachment_image_alt', true );
                            if ( empty( $recent_image_alt ) ) {
                                $recent_image_alt = get_the_title();
                            }
                            ?>
                            <img class="lazyload" data-src="<?php echo esc_url( $recent_image_src[0] ); ?>" alt="<?php echo esc_attr( $recent_image_alt ); ?>">
                          <?php else: ?>
                            <img class="lazyload" data-src="https://via.placeholder.com/150x100.png?text=No+Image" alt="<?php the_title_attribute(); ?>">
                          <?php endif; ?>
                        </div>
                        <div class="c-sidebar__article-body">
                          <time class="c-sidebar__article-date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date( 'Y/m/d' ); ?></time>
                          <p class="c-sidebar__article-ttl"><?php the_title(); ?></p>
                        </div>
                      </a>
                    </article>
                    <?php
                        endwhile;
                        wp_reset_postdata(); // WP_Query のループの後に必要
                    else:
                        echo '<p>新着記事はありません。</p>';
                    endif;
                    ?>
                  </div>
                </div>
              </aside> <?php // .c-sidebar ?>
            </div> <?php // .l-single__inner ?>
          </div> <?php // .l-single__container ?>

        <?php endwhile; ?>
      <?php else : ?>
        <p class="c-inner">該当する記事が見つかりませんでした。</p>
      <?php endif; ?>

    </div><?php // .c-contents ?>
</main>

<?php get_footer(); ?>