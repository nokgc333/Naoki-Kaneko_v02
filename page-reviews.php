<?php
/*
Template Name: 卒業生の声
Template Post Type: page
*/
get_header(); ?>

<main>
    <?php // 共通の背景やポップアップ表示 (ソースコード①から流用) ?>
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
            <source media="(min-width: 768px)" data-srcset="<?php echo get_theme_file_uri('/assets/img/common/popup-pc.jpg'); ?>">
            <img data-src="<?php echo get_theme_file_uri('/assets/img/common/popup-sp.jpg'); ?>" alt="最終課題をクリアした方限定!3万円キャッシュバック※条件：納期、クオリティをクリアした方キャッシュバック詳細はこちら＞＞" width="335" height="324">
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
            <h1 class="c-top__ttl"><?php the_title(); ?></h1>
            <p class="c-top__en en">Reviews</p>
          </div>
          <p class="c-top__copy">未経験者から現役エンジニアまで様々な受講生の声をまとめました。</p>
        </div>
      </div>

      <?php
      $sections_to_display = array(
          'voice' => array(
              'title' => '卒業生の声',
              'archive_text' => '卒業生の声一覧はこちら',
              'cpt_slug' => 'voice',
              'archive_link_url' => home_url('/voice_stable/'),
          ),
          'article' => array(
              'title' => '卒業生インタビュー',
              'archive_text' => 'インタビュー一覧はこちら',
              'cpt_slug' => 'article',
          ),
      );
      ?>

      <?php foreach ($sections_to_display as $section_key => $section_details) : ?>
          <?php
          $args = array(
              'post_type' => $section_details['cpt_slug'],
              'posts_per_page' => 3,
              'orderby' => 'date',
              'order' => 'DESC',
          );
          $query = new WP_Query($args);

          $section_wrapper_class = ($section_key === 'voice') ? 'p-reviews__voice c-section' : 'p-reviews__article c-section';
          $inner_wrapper_class = ($section_key === 'voice') ? 'c-inner' : 'inner';
          $list_wrapper_class = ($section_key === 'voice') ? 'p-voice__list p-reviews__voice-list' : 'p-reviews__article-list';
          $additional_list_wrapper_start = ($section_key === 'article') ? '<div class="l-archive__list">' : '';
          $additional_list_wrapper_end = ($section_key === 'article') ? '</div>' : '';

          $button_link_url = '';
          if (isset($section_details['archive_link_url'])) {
              $button_link_url = $section_details['archive_link_url'];
          } else {
              $button_link_url = get_post_type_archive_link($section_details['cpt_slug']);
          }
          ?>

        <div class="<?php echo esc_attr($section_wrapper_class); ?>">
          <div class="<?php echo esc_attr($inner_wrapper_class); ?>">
            <h2 class="p-reviews__ttl"><?php echo esc_html($section_details['title']); ?></h2>
            <div class="<?php echo esc_attr($list_wrapper_class); ?>">
              <?php echo $additional_list_wrapper_start; ?>

              <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <?php if ($section_key === 'voice') : ?>
                    <?php
                        $voice_name = get_field('voice_name') ?: get_the_title();
                        $voice_about = get_field('voice_about');
                        $voice_title = get_field('voice_review_title');
                        $voice_image = get_field('voice_image');
                        $voice_content = get_field('voice_content_detail');
                        $voice_video_link = get_field('voice_video_url');

                        $image_url_voice = '';
                        $image_alt_voice = esc_attr($voice_name);
                        if ($voice_image) {
                            $image_url_voice = is_array($voice_image) ? $voice_image['sizes']['medium'] : $voice_image;
                            if(is_array($voice_image) && !empty($voice_image['alt'])) $image_alt_voice = esc_attr($voice_image['alt']);
                        } elseif (has_post_thumbnail()) {
                            $image_url_voice = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                            $image_alt_voice = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true) ?: $image_alt_voice;
                        }
                    ?>
                    <div class="p-voice__item">
                      <div class="p-voice__item-head">
                        <div class="p-voice__item-pic c-img">
                          <?php if ($image_url_voice) : ?>
                            <img class="lazyload" data-src="<?php echo esc_url($image_url_voice); ?>" alt="<?php echo $image_alt_voice; ?>">
                          <?php else: ?>
                            <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/common/no-image-voice.png'); ?>" alt="<?php echo esc_attr($voice_name); ?>">
                          <?php endif; ?>
                        </div>
                        <div class="p-voice__item-info only-sp">
                          <p class="p-voice__item-name"><?php echo esc_html($voice_name); ?></p>
                          <p class="p-voice__item-about"><?php echo esc_html($voice_about); ?></p>
                        </div>
                      </div>
                      <div class="p-voice__item-body">
                        <div class="p-voice__item-body--top">
                          <div class="p-voice__item-body--head">
                            <div class="p-voice__item-info only-pc">
                              <p class="p-voice__item-name"><?php echo esc_html($voice_name); ?></p>
                              <p class="p-voice__item-about"><?php echo esc_html($voice_about); ?></p>
                            </div>
                            <p class="p-voice__item-ttl"><?php echo esc_html($voice_title); ?></p>
                          </div>
                          <?php if ($voice_video_link) : ?>
                          <div class="p-voice__link-box only-pc">
                            <a target="_blank" href="<?php echo esc_url($voice_video_link); ?>" class="p-voice__link">
                              <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23.467" height="16.5" viewBox="0 0 23.467 16.5">
                                  <g id="グループ_252" data-name="グループ 252" transform="translate(-1228.642 -7246.5)">
                                    <path class="fill" id="パス_126" data-name="パス 126"
                                      d="M23.618-13.918a2.949,2.949,0,0,0-2.075-2.088c-1.83-.494-9.168-.494-9.168-.494s-7.338,0-9.168.494a2.949,2.949,0,0,0-2.075,2.088,30.932,30.932,0,0,0-.49,5.685,30.932,30.932,0,0,0,.49,5.685A2.9,2.9,0,0,0,3.207-.494C5.037,0,12.375,0,12.375,0s7.338,0,9.168-.494a2.9,2.9,0,0,0,2.075-2.055,30.932,30.932,0,0,0,.49-5.685A30.932,30.932,0,0,0,23.618-13.918ZM9.975-4.744v-6.978l6.133,3.489Z"
                                      transform="translate(1228 7263)" fill="#fff" />
                                  </g>
                                </svg>
                              </span>
                              <span class="txt">受講生インタビューはこちら</span>
                              <span class="arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9.297" viewBox="0 0 6 9.297">
                                  <g id="次に_" data-name="次に２" transform="translate(103.294 160.05)">
                                    <path class="fill" id="パス_283" data-name="パス 283"
                                      d="M5.8,5.142l-3.95,3.95a.694.694,0,0,1-.985,0L.2,8.436a.694.694,0,0,1,0-.985L3,4.651.2,1.852A.694.694,0,0,1,.2.867L.858.2a.694.694,0,0,1,.985,0l3.95,3.95A.7.7,0,0,1,5.8,5.142Z"
                                      transform="translate(-103.294 -160.05)" fill="#fff" />
                                  </g>
                                </svg>
                              </span>
                            </a>
                          </div>
                          <?php endif; ?>
                        </div>
                        <p class="p-voice__item-txt c-txt">
                          <?php echo wp_trim_words(strip_tags($voice_content ?: get_the_excerpt()), 152, '･･･'); ?>
                          <a target="_blank" class="p-reviews__voice-link" href="<?php echo esc_url(home_url('/voice_stable/')); ?>">続きを読む</a>
                        </p>
                      </div>
                      <?php if ($voice_video_link) : ?>
                      <div class="p-voice__link-box only-sp">
                        <a href="<?php echo esc_url($voice_video_link); ?>" class="p-voice__link">
                          <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23.467" height="16.5" viewBox="0 0 23.467 16.5">
                              <g id="グループ_252-sp" data-name="グループ 252" transform="translate(-1228.642 -7246.5)">
                                <path id="パス_126-sp" data-name="パス 126"
                                  d="M23.618-13.918a2.949,2.949,0,0,0-2.075-2.088c-1.83-.494-9.168-.494-9.168-.494s-7.338,0-9.168.494a2.949,2.949,0,0,0-2.075,2.088,30.932,30.932,0,0,0-.49,5.685,30.932,30.932,0,0,0,.49,5.685A2.9,2.9,0,0,0,3.207-.494C5.037,0,12.375,0,12.375,0s7.338,0,9.168-.494a2.9,2.9,0,0,0,2.075-2.055,30.932,30.932,0,0,0,.49-5.685A30.932,30.932,0,0,0,23.618-13.918ZM9.975-4.744v-6.978l6.133,3.489Z"
                                  transform="translate(1228 7263)" fill="#fff" />
                              </g>
                            </svg>
                          </span>
                          <span class="txt">受講生インタビューはこちら</span>
                          <span class="arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9.297" viewBox="0 0 6 9.297">
                              <g id="次に_-sp" data-name="次に２" transform="translate(103.294 160.05)">
                                <path id="パス_283-sp" data-name="パス 283"
                                  d="M5.8,5.142l-3.95,3.95a.694.694,0,0,1-.985,0L.2,8.436a.694.694,0,0,1,0-.985L3,4.651.2,1.852A.694.694,0,0,1,.2.867L.858.2a.694.694,0,0,1,.985,0l3.95,3.95A.7.7,0,0,1,5.8,5.142Z"
                                  transform="translate(-103.294 -160.05)" fill="#fff" />
                              </g>
                            </svg>
                          </span>
                        </a>
                      </div>
                      <?php endif; ?>
                    </div>
                  <?php elseif ($section_key === 'article') : ?>
                    <article class="c-card">
                      <a href="<?php the_permalink(); ?>" class="c-card__link">
                        <div class="c-card__img c-img">
                          <?php if (has_post_thumbnail()) : ?>
                            <img class="lazyload" data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>" alt="<?php the_title_attribute(); ?>">
                          <?php else: ?>
                            <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/common/no-image-article.png'); ?>" alt="<?php the_title_attribute(); ?>">
                          <?php endif; ?>
                        </div>
                        <div class="c-card__body">
                          <time class="c-card__date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('Y/m/d'); ?></time>
                          <p class="c-card__ttl"><?php the_title(); ?></p>
                        </div>
                      </a>
                    </article>
                  <?php endif; ?>
                <?php endwhile; ?>
              <?php else : ?>
                <p><?php echo esc_html($section_details['title']); ?>はまだありません。</p>
              <?php endif; ?>
              <?php wp_reset_postdata(); ?>

              <?php echo $additional_list_wrapper_end; ?>
            </div>

            <div class="c-btn__box">
              <a href="<?php echo esc_url($button_link_url); ?>" class="c-btn -lg">
                <?php echo esc_html($section_details['archive_text']); ?>
                <span class="arrow">
                  <svg xmlns="http://www.w3.org/2000/svg" width="12.372" height="14.744" viewBox="0 0 12.372 14.744">
                    <path d="M476,303.7l10,6-10,6" transform="translate(-474.628 -302.327)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                  </svg>
                </span>
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
</main>

<?php get_footer(); ?>