<?php get_header(); ?>

<main>
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
    <div class="c-fv">
      <div class="c-fv__inner c-inner">
        <div class="c-fv__head">
          <div class="c-fv__box">
            <?php $archive_title = '卒業生インタビュー'; ?>
            <h1 class="c-fv__box-ttl"><?php echo esc_html( $archive_title ); ?></h1>
            <p class="c-fv__box-en en">ARTICLE LIST</p>
          </div>
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
            // 自作またはテーマ標準のパンくずがない場合のフォールバック
            // echo '<div class="l-breadcrumb"><div class="l-breadcrumb__inner inner"><a href="'.home_url().'">ホーム</a> > <span>'.esc_html($archive_title).'</span></div></div>';
        }
        ?>
      </div>
    </div>

    <div class="l-archive">
      <div class="l-archive__inner inner">
        <div class="l-archive__block">
          <h2 class="l-archive__ttl"><span class="txt">新着記事</span></h2>
          <?php if ( have_posts() ) : ?>
            <div class="l-archive__list">
              <?php while ( have_posts() ) : the_post(); ?>
                <article class="c-card">
                  <a href="<?php the_permalink(); ?>" class="c-card__link">
                    <div class="c-card__img c-img">
                      <?php if ( has_post_thumbnail() ) : ?>
                        <?php
                        // アイキャッチ画像を取得し、lazyload用にdata-srcを設定
                        $thumbnail_id = get_post_thumbnail_id();
                        $image_src = wp_get_attachment_image_src( $thumbnail_id, 'large' ); // 'large' や 'medium_large' など適切なサイズを指定
                        $image_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
                        if ( empty( $image_alt ) ) {
                            $image_alt = get_the_title();
                        }
                        ?>
                        <img class="lazyload" data-src="<?php echo esc_url( $image_src[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                      <?php else: // アイキャッチがない場合のプレースホルダー ?>
                        <img class="lazyload" data-src="https://via.placeholder.com/300x200.png?text=No+Image" alt="<?php the_title_attribute(); ?>">
                      <?php endif; ?>
                    </div>
                    <div class="c-card__body">
                      <time class="c-card__date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date( 'Y/m/d' ); ?></time>
                      <p class="c-card__ttl"><?php the_title(); ?></p>
                    </div>
                  </a>
                </article>
              <?php endwhile; ?>
            </div>

                        <?php
            // ページネーション
            global $wp_query;

            // 投稿が存在する場合のみページネーション処理を試みる
            if ( $wp_query->max_num_pages > 0 ) {
                // c-pagination-wrapper は、元コードの paginate_links の呼び出し箇所で
                // echo '<div class="c-pagination-wrapper">'; があったため、維持します。
                // 不要であればこの行と対応する閉じタグを削除してください。
                echo '<div class="c-pagination-wrapper">';

                if ( $wp_query->max_num_pages == 1 ) {
                    // 総ページ数が1の場合でも、ページネーション「1」を表示
                    echo '<div class="c-pagination"><ul class="c-pagination__list">';
                    echo '<li class="c-pagination__num pagination-sp current"><span class="page-numbers current">1</span></li>';
                    echo '</ul></div>';
                } else {
                    // 総ページ数が1より大きい場合は、通常のページネーションを表示
                    $big = 999999999; // need an unlikely integer
                    $pages = paginate_links( array(
                        'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format'       => '?paged=%#%',
                        'current'      => max( 1, get_query_var('paged') ),
                        'total'        => $wp_query->max_num_pages,
                        'type'         => 'array', // 配列で取得
                        'prev_next'    => true,
                        'prev_text'    => __('«'), // 元のコードに合わせて '«' を使用（'<', '前へ' なども可）
                        'next_text'    => __('»'), // 元のコードに合わせて '»' を使用（'>', '次へ' なども可）
                        'show_all'     => false,
                        'end_size'     => 1,
                        'mid_size'     => 2,
                        // 'screen_reader_text' は paginate_links では直接指定できないが、
                        // aタグの aria-current や span.current でスクリーンリーダーは解釈可能
                    ) );

                    if ( is_array( $pages ) ) {
                        echo '<div class="c-pagination"><ul class="c-pagination__list">';
                        foreach ( $pages as $page ) {
                            // paginate_links() は 'page-numbers current' クラスを span タグに付与する
                            // 'dots' クラスが span タグに付与されることもある
                            if (strpos($page, 'current') !== false) {
                                echo '<li class="c-pagination__num pagination-sp current">' . $page . '</li>';
                            } else {
                                // <a>タグ、または 'dots' の場合
                                echo '<li class="c-pagination__num pagination-sp">' . $page . '</li>';
                            }
                        }
                        echo '</ul></div>';
                    }
                }
                echo '</div>'; // c-pagination-wrapper の閉じタグ
            }
            ?>

          <?php else : ?>
            <p>まだ記事がありません。</p>
          <?php endif; ?>
        </div>

        <div class="l-archive__block"> <?php // 人気記事のブロック ?>
          <h2 class="l-archive__ttl"><span class="txt">人気記事</span></h2>
          <div class="l-archive__list"> <?php // 新着記事と同じクラス名を使用 ?>
            <?php
            if ( class_exists( 'WordPressPopularPosts\\Query' ) ) : // プラグインのQueryクラスが存在するか確認

                $popular_posts_args = array(
                    'limit'     => 3, // 表示する記事の数 (添付画像1枚目に合わせて3件)
                    'post_type' => 'article',
                    'range'     => 'all', // または 'last7days', 'last30days' など
                    'order_by'  => 'views',
                    // 必要であれば他のパラメータも追加
                    // 'freshness' => 1, // 古い投稿を除外する場合など
                );
                $popular_posts_query = new \WordPressPopularPosts\Query( $popular_posts_args );
                $popular_items       = $popular_posts_query->get_posts();

                if ( $popular_items && is_array( $popular_items ) ) :
                    $rank = 0;
                    foreach ( $popular_items as $popular_post_item ) :
                        $rank++;
                        // $popular_post_item は WPP_Post オブジェクト (またはそれに類するオブジェクト)
                        // $popular_post_item->id で投稿IDを取得できる
                        $post_id = $popular_post_item->id;
                        // WordPressの標準関数を使うために、一時的にグローバル$postをセットアップ
                        // ただし、メインループ外なので setup_postdata は使わず、直接IDを指定して関数を呼び出す
            ?>
            <article class="c-card"> <?php // 新着記事と同じカードのHTML構造を使用 ?>
              <a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" class="c-card__link">
                <div class="c-card__img c-img -popular"> <?php // -popular クラスを追加 ?>
                  <?php if ($rank <= 3): // ランキングバッジ (必要に応じて調整) ?>
                    <span class="c-card__rank-badge -rank-<?php echo $rank; ?>">
                      <?php // 王冠アイコンのSVGや画像などをここに配置 ?>
                      <?php echo $rank; ?>
                    </span>
                  <?php endif; ?>
                  <?php if ( has_post_thumbnail( $post_id ) ) : ?>
                    <?php
                    // サムネイル画像の取得と表示
                    // 'large' や 'medium_large' などのサイズを指定
                    // get_the_post_thumbnail() は直接 img タグを出力する
                    // lazyload を適用するには、URLを取得して自分で img タグを組む必要がある
                    $thumbnail_id = get_post_thumbnail_id( $post_id );
                    $image_attributes = wp_get_attachment_image_src( $thumbnail_id, 'large' ); // 'large' は例
                    $image_alt = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ) ?: get_the_title( $post_id );
                    if ( $image_attributes ) :
                    ?>
                    <img class="lazyload" data-src="<?php echo esc_url( $image_attributes[0] ); ?>"
                         width="<?php echo esc_attr( $image_attributes[1] ); ?>"
                         height="<?php echo esc_attr( $image_attributes[2] ); ?>"
                         alt="<?php echo esc_attr( $image_alt ); ?>">
                    <?php else: // wp_get_attachment_image_src が false を返した場合など ?>
                    <img class="lazyload" data-src="https://via.placeholder.com/300x200.png?text=No+Image" alt="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">
                    <?php endif; ?>
                  <?php else : // アイキャッチがない場合 ?>
                    <img class="lazyload" data-src="https://via.placeholder.com/300x200.png?text=No+Image" alt="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">
                  <?php endif; ?>
                </div>
                <div class="c-card__body">
                  <time class="c-card__date" datetime="<?php echo esc_attr( get_the_date( 'c', $post_id ) ); ?>"><?php echo esc_html( get_the_date( 'Y/m/d', $post_id ) ); ?></time>
                  <p class="c-card__ttl"><?php echo esc_html( get_the_title( $post_id ) ); ?></p>
                </div>
              </a>
            </article>
            <?php
                    endforeach;
                else :
                    echo '<p>現在、人気記事はありません。</p>';
                endif; // if ( $popular_items )

            elseif ( current_user_can( 'manage_options' ) ) : // プラグインが無効、またはQueryクラスが存在しない場合
                echo '<p style="padding:15px; background:#fff; border:1px solid #ccc; color:red;">人気記事を表示するには「WordPress Popular Posts」プラグインをインストールし、有効化してください。（Queryクラスが見つかりません）</p>';
            endif; // if class_exists
            ?>
          </div> <?php // .l-archive__list ?>
        </div> <?php // 人気記事のブロック終了 ?>

        <!-- カテゴリー一覧は必要に応じてコメントアウトを解除して実装 -->
        <!--
        <div class="l-archive__block">
          <h2 class="l-archive__ttl"><span class="txt">カテゴリー</span></h2>
          <div class="l-archive__category">
            <?php
            /*
            $categories = get_categories( array(
                'orderby' => 'name',
                'order'   => 'ASC',
                'hide_empty' => true,
            ) );
            if ( $categories ) :
                foreach ( $categories as $category ) :
            ?>
            <div class="l-archive__category-block">
              <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="l-archive__category-ttl">
                <?php echo esc_html( $category->name ); ?>
                <span class="count">(<?php echo esc_html( $category->count ); ?>)</span>
              </a>
            </div>
            <?php
                endforeach;
            endif;
            */
            ?>
          </div>
        </div>
        -->
      </div>
    </div>
</main>

<?php get_footer(); ?>