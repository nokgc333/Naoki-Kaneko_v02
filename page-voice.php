<?php
/*
Template Name: 卒業生の声一覧
Template Post Type: page
*/
get_header(); ?>

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
      <div class="c-top">
        <div class="c-top__inner c-inner">
          <div class="c-top__head">
            <h1 class="c-top__ttl"><?php echo esc_html(get_the_title()); // 固定ページのタイトル ?></h1>
            <p class="c-top__en en">Voices</p>
          </div>
          <?php if (get_the_content()): // 固定ページの本文があれば表示 ?>
            <div class="c-top__copy user-content">
                <?php the_content(); ?>
            </div>
          <?php else: ?>
            <p class="c-top__copy">未経験者から現役エンジニアまで様々な受講生の声をまとめました。</p>
          <?php endif; ?>
        </div>
      </div>

      <div class="p-voice">
        <?php
        // 卒業生の声カテゴリー（タクソノミーのターム）を取得
        $voice_categories = get_terms( array(
            'taxonomy'   => 'voice_category', // CPT UIで設定したタクソノミースラッグ
            'hide_empty' => true,             // 投稿がないカテゴリーは非表示
            // 'orderby'    => 'slug',       // スラッグ順（主婦、会社員などの順序をCPT UIのターム編集画面で制御したい場合は、並び替えプラグインやACFで順序用フィールドを作る）
            // 'order'      => 'ASC',
        ) );

        // ソースコード②のナビゲーション順序に合わせるためのカスタムソート
        // もしカテゴリーの表示順が固定なら、この方法が手軽です。
        // タクソノミースラッグが 'shufu', 'kaishain', 'jieigyo', 'engineer' となっている前提
        $desired_order = ['shufu', 'kaishain', 'jieigyo', 'engineer']; // 希望するスラッグの順序
        if ( !empty($voice_categories) && !is_wp_error($voice_categories) ) {
            usort($voice_categories, function($a, $b) use ($desired_order) {
                $pos_a = array_search($a->slug, $desired_order);
                $pos_b = array_search($b->slug, $desired_order);
                if ($pos_a === false) $pos_a = count($desired_order); // 見つからないものは最後に
                if ($pos_b === false) $pos_b = count($desired_order);
                return $pos_a - $pos_b;
            });
        }


        if ( ! empty( $voice_categories ) && ! is_wp_error( $voice_categories ) ) :
        ?>
        <div class="p-voice__nav">
          <div class="p-voice__nav-inner c-inner">
            <?php foreach ( $voice_categories as $category ) : ?>
                <?php
                // ナビゲーションのhrefとブロックのidを一致させる
                // ソースコード②のURLエンコードされたIDを再現する場合:
                // $category_id_attr = urlencode($category->name);
                // より推奨されるのはスラッグを使う方法:
                $category_id_attr = esc_attr( $category->slug );
                ?>
                <a href="#<?php echo $category_id_attr; ?>" class="p-voice__nav-item">
                    <span class="txt"><?php echo esc_html( $category->name ); ?></span>
                </a>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="p-voice__container">
          <?php foreach ( $voice_categories as $category ) : ?>
            <?php
            // $category_id_attr = urlencode($category->name); // URLエンコードIDの場合
            $category_id_attr = esc_attr( $category->slug ); // スラッグをIDとして使用
            ?>
            <div class="p-voice__block">
              <div class="p-voice__block-inner c-inner">
                <p class="p-voice__block-ttl" id="<?php echo $category_id_attr; ?>"><?php echo esc_html( $category->name ); ?></p>
                <div class="p-voice__list">
                  <?php
                  $args = array(
                      'post_type'      => 'voice', // CPT UIで設定した投稿タイプスラッグ
                      'posts_per_page' => -1,      // そのカテゴリーの投稿を全件表示
                      'tax_query'      => array(
                          array(
                              'taxonomy' => 'voice_category',
                              'field'    => 'slug',
                              'terms'    => $category->slug,
                          ),
                      ),
                      'orderby'        => 'date', // または 'menu_order' などで並び替え
                      'order'          => 'DESC', // 新しい順 (または任意の順)
                  );
                  $voices_query = new WP_Query( $args );

                  if ( $voices_query->have_posts() ) :
                      while ( $voices_query->have_posts() ) : $voices_query->the_post();
                          // ACFからフィールド値を取得
                          $voice_name_acf  = get_field('voice_name');
                          $voice_about_acf = get_field('voice_about');
                          $voice_review_title_acf = get_field('voice_review_title');
                          $voice_image_data = get_field('voice_image'); // 画像配列またはURL
                          $voice_content_detail_acf = get_field('voice_content_detail');
                          $voice_video_url_acf = get_field('voice_video_url');

                          $image_url = '';
                          $image_alt = $voice_name_acf ?: get_the_title(); // デフォルトのalt
                          if ( $voice_image_data ) {
                              if ( is_array($voice_image_data) ) {
                                  $image_url = $voice_image_data['url'];
                                  $image_alt = $voice_image_data['alt'] ?: $image_alt;
                              } else {
                                  $image_url = $voice_image_data; // URL直接の場合
                              }
                          }
                  ?>
                  <div class="p-voice__item" id="review<?php echo get_the_ID(); // ソースコード②のid="reviewXX"形式に寄せる ?>">
                    <div class="p-voice__item-head">
                      <div class="p-voice__item-pic c-img">
                        <?php if ( $image_url ) : ?>
                        <img class="lazyload" data-src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                        <?php else: /* 画像がない場合のプレースホルダーなど */ ?>
                        <img class="lazyload" data-src="https://via.placeholder.com/150/f0f0f0/ccc?text=No+Image" alt="画像がありません">
                        <?php endif; ?>
                      </div>
                      <div class="p-voice__item-info only-sp">
                        <?php if($voice_name_acf): ?><p class="p-voice__item-name"><?php echo esc_html( $voice_name_acf ); ?></p><?php endif; ?>
                        <?php if($voice_about_acf): ?><p class="p-voice__item-about"><?php echo esc_html( $voice_about_acf ); ?></p><?php endif; ?>
                      </div>
                    </div>
                    <div class="p-voice__item-body">
                      <div class="p-voice__item-body--top">
                        <div class="p-voice__item-body--head">
                          <div class="p-voice__item-info only-pc">
                            <?php if($voice_name_acf): ?><p class="p-voice__item-name"><?php echo esc_html( $voice_name_acf ); ?></p><?php endif; ?>
                            <?php if($voice_about_acf): ?><p class="p-voice__item-about"><?php echo esc_html( $voice_about_acf ); ?></p><?php endif; ?>
                          </div>
                          <?php if($voice_review_title_acf): ?><p class="p-voice__item-ttl"><?php echo esc_html( $voice_review_title_acf ); ?></p><?php endif; ?>
                        </div>
                        <?php if ( $voice_video_url_acf ) : ?>
                        <div class="p-voice__link-box only-pc">
                          <a target="_blank" href="<?php echo esc_url( $voice_video_url_acf ); ?>" class="p-voice__link">
                            <span class="icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="23.467" height="16.5" viewBox="0 0 23.467 16.5">
                                <g id="グループ_252_pc_<?php echo get_the_ID(); ?>" data-name="グループ 252" transform="translate(-1228.642 -7246.5)">
                                  <path class="fill" id="パス_126_pc_<?php echo get_the_ID(); ?>" data-name="パス 126"
                                    d="M23.618-13.918a2.949,2.949,0,0,0-2.075-2.088c-1.83-.494-9.168-.494-9.168-.494s-7.338,0-9.168.494a2.949,2.949,0,0,0-2.075,2.088,30.932,30.932,0,0,0-.49,5.685,30.932,30.932,0,0,0,.49,5.685A2.9,2.9,0,0,0,3.207-.494C5.037,0,12.375,0,12.375,0s7.338,0,9.168-.494a2.9,2.9,0,0,0,2.075-2.055,30.932,30.932,0,0,0,.49-5.685A30.932,30.932,0,0,0,23.618-13.918ZM9.975-4.744v-6.978l6.133,3.489Z"
                                    transform="translate(1228 7263)" fill="#fff" />
                                </g>
                              </svg>
                            </span>
                            <span class="txt">受講生インタビューはこちら</span>
                            <span class="arrow">
                              <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9.297" viewBox="0 0 6 9.297">
                                <g id="次に_pc_<?php echo get_the_ID(); ?>" data-name="次に２" transform="translate(103.294 160.05)">
                                  <path class="fill" id="パス_283_pc_<?php echo get_the_ID(); ?>" data-name="パス 283"
                                    d="M5.8,5.142l-3.95,3.95a.694.694,0,0,1-.985,0L.2,8.436a.694.694,0,0,1,0-.985L3,4.651.2,1.852A.694.694,0,0,1,.2.867L.858.2a.694.694,0,0,1,.985,0l3.95,3.95A.7.7,0,0,1,5.8,5.142Z"
                                    transform="translate(-103.294 -160.05)" fill="#fff" />
                                </g>
                              </svg>
                            </span>
                          </a>
                        </div>
                        <?php endif; ?>
                      </div>
                      <?php if ( $voice_content_detail_acf ) : ?>
                      <div class="p-voice__item-txt c-txt">
                        <?php echo wpautop( $voice_content_detail_acf ); // WYSIWYGの内容を適切に表示 ?>
                      </div>
                      <?php endif; ?>
                    </div>
                    <?php if ( $voice_video_url_acf ) : ?>
                    <div class="p-voice__link-box only-sp">
                      <a target="_blank" href="<?php echo esc_url( $voice_video_url_acf ); ?>" class="p-voice__link">
                        <span class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="23.467" height="16.5" viewBox="0 0 23.467 16.5">
                            <g id="グループ_252_sp_<?php echo get_the_ID(); ?>" data-name="グループ 252" transform="translate(-1228.642 -7246.5)">
                              <path class="fill" id="パス_126_sp_<?php echo get_the_ID(); ?>" data-name="パス 126"
                                d="M23.618-13.918a2.949,2.949,0,0,0-2.075-2.088c-1.83-.494-9.168-.494-9.168-.494s-7.338,0-9.168.494a2.949,2.949,0,0,0-2.075,2.088,30.932,30.932,0,0,0-.49,5.685,30.932,30.932,0,0,0,.49,5.685A2.9,2.9,0,0,0,3.207-.494C5.037,0,12.375,0,12.375,0s7.338,0,9.168-.494a2.9,2.9,0,0,0,2.075-2.055,30.932,30.932,0,0,0,.49-5.685A30.932,30.932,0,0,0,23.618-13.918ZM9.975-4.744v-6.978l6.133,3.489Z"
                                transform="translate(1228 7263)" fill="#fff" />
                            </g>
                          </svg>
                        </span>
                        <span class="txt">受講生インタビューはこちら</span>
                        <span class="arrow">
                          <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9.297" viewBox="0 0 6 9.297">
                            <g id="次に_sp_<?php echo get_the_ID(); ?>" data-name="次に２" transform="translate(103.294 160.05)">
                              <path class="fill" id="パス_283_sp_<?php echo get_the_ID(); ?>" data-name="パス 283"
                                d="M5.8,5.142l-3.95,3.95a.694.694,0,0,1-.985,0L.2,8.436a.694.694,0,0,1,0-.985L3,4.651.2,1.852A.694.694,0,0,1,.2.867L.858.2a.694.694,0,0,1,.985,0l3.95,3.95A.7.7,0,0,1,5.8,5.142Z"
                                transform="translate(-103.294 -160.05)" fill="#fff" />
                            </g>
                          </svg>
                        </span>
                      </a>
                    </div>
                    <?php endif; ?>
                  </div><!-- /.p-voice__item -->
                  <?php
                      endwhile;
                      wp_reset_postdata(); // WP_Queryのループ後にはリセット
                  else:
                  ?>
                    <p>このカテゴリーの卒業生の声はまだありません。</p>
                  <?php endif; // $voices_query->have_posts() ?>
                </div><!-- /.p-voice__list -->
              </div><!-- /.p-voice__block-inner -->
            </div><!-- /.p-voice__block -->
          <?php endforeach; // $voice_categories loop ?>
        </div><!-- /.p-voice__container -->
        <?php else: ?>
            <p class="c-inner">卒業生の声カテゴリーが登録されていないか、該当する声がありません。</p>
        <?php endif; // ! empty( $voice_categories ) ?>
      </div><!-- /.p-voice -->

      <?php
      // ソースコード①にあったld+jsonスクリプト部分をそのまま出力
      // この部分はWordPressの投稿内容として入力するか、テーマのフックで動的に追加するのがより良い管理方法です。
      // ここではテンプレートに直接記述されていたものを再現します。
      $json_ld_script = locate_template('template-parts/json-ld-voice.php'); // 例えば別ファイルに分離
      if ($json_ld_script) {
          include($json_ld_script);
      } elseif (strpos(get_the_content(), '<script type="application/ld+json">') !== false) {
          // もし投稿本文にld+jsonが含まれていたら、それをそのまま出力（非推奨）
          // the_content() を使うとフィルタが適用されるため、ここでは直接取得を試みる例（ただし、この方法は推奨されません）
          // $page_content_raw = get_post_field('post_content', get_the_ID());
          // preg_match('/<script type="application\/ld\+json">.*?<\/script>/s', $page_content_raw, $matches);
          // if (!empty($matches[0])) {
          //     echo $matches[0];
          // }
          // 下記はソースコード①の末尾にあったものをコメントアウトとして残します。
          // 実際には、このJSON-LDデータはACFで管理するか、 functions.php 等で動的に生成すべきです。
          /*
          ?>
          <script type="application/ld+json">
            {"@context":"https:\/\/schema.org\/","@type":"Course","name":"LP\u5236\u4f5c\u30b3\u30fc\u30b9", ... }
            ...
            {"@context":"https:\/\/schema.org\/","@type":"Course","name":"HP\u5236\u4f5c\u30b3\u30fc\u30b9", ... }
          </script>
          <?php
          */
      }
      ?>
    </div><!-- /.c-contents -->
</main>

<?php get_footer(); ?>