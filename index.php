<?php get_header(); ?>

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
           <!-- <a target="_blank" href="https://stock-sun.com/coaching/engineer/" class="c-cta__btn -counsel">
               <p class="sub -dark">毎日無料個別説明会実施中</p>
               <hr class="c-cta__hr -dark">
               <p class="txt -dark">無料個別説明会はこちら</p>
           </a> -->
           <!-- <button type="button" id="popup-open" class="c-cta__btn -cashback">
               <p class="sub">3万円キャッシュバック</p>
               <hr class="c-cta__hr">
               <p class="txt">キャッシュバック詳細はこちら</p>
           </button> -->
       </div>

       <div class="l-fv">
           <div class="l-fv__inner c-inner">
               <p class="l-fv__txt">本物の即戦力人材へ</p>
               <p class="l-fv__ttl en">Tech<span class="strong">E</span>lite</p>
           </div>
           <div class="l-fv__bg"></div>
       </div>

       <div class="l-about c-section">
           <div class="l-about__inner c-inner">
               <div class="l-about__head fade-item">
                   <div class="l-about__head-top">
                       <p class="c-en">ABOUT</p>
                       <h2 class="c-ttl -white">TechEliteとは</h2>
                   </div>
                   <div class="l-about__head-bottom">
                       <p class="l-about__txt">TechElite（テックエリート）はカリキュラムを<span class="strong">成果物</span>や<span class="strong">あなたのゴールから</span>逆算して設計する他にはないプログラミングスクールです。</p>
                       <p class="l-about__txt">あなたを<span class="strong">現場で求められる人材へ</span>導きます。</p>
                       <p class="l-about__txt">本物の<span class="strong">即戦力人材</span>を輩出。</p>
                   </div>
               </div>
               <div class="l-about__slider swiper-container fade-item" id="top-slider">
                   <div class="l-about__slider-wrapper swiper-wrapper">
                       <div class="l-about__slider-item swiper-slide c-img">
                           <picture>
                               <source media="(min-width: 768px)" data-srcset="<?php echo get_theme_file_uri('/assets/img/top/slide01.jpg'); ?>">
                               <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/slide01.jpg'); ?>" alt="TechEliteとは">
                           </picture>
                       </div>
                       <div class="l-about__slider-item swiper-slide c-img">
                           <picture>
                               <source media="(min-width: 768px)" data-srcset="<?php echo get_theme_file_uri('/assets/img/top/slide02.jpg'); ?>">
                               <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/slide02.jpg'); ?>" alt="TechEliteとは">
                           </picture>
                       </div>
                       <div class="l-about__slider-item swiper-slide c-img">
                           <picture>
                               <source media="(min-width: 768px)" data-srcset="<?php echo get_theme_file_uri('/assets/img/top/slide03.jpg'); ?>">
                               <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/slide03.jpg'); ?>" alt="TechEliteとは">
                           </picture>
                       </div>
                       <div class="l-about__slider-item swiper-slide c-img">
                           <picture>
                               <source media="(min-width: 768px)" data-srcset="<?php echo get_theme_file_uri('/assets/img/top/slide04.jpg'); ?>">
                               <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/slide04.jpg'); ?>" alt="TechEliteとは">
                           </picture>
                       </div>
                       <div class="l-about__slider-item swiper-slide c-img">
                           <picture>
                               <source media="(min-width: 768px)" data-srcset="<?php echo get_theme_file_uri('/assets/img/top/slide05.jpg'); ?>">
                               <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/slide05.jpg'); ?>" alt="TechEliteとは">
                           </picture>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <div class="l-strong c-section">
           <div class="l-strong__inner c-inner">
               <div class="fade-item">
                   <p class="c-en">OUR strength</p>
                   <h2 class="c-ttl">TechElite3つの強み</h2>
               </div>
               <div class="l-strong__list">
                   <div class="l-strong__item fade-item">
                       <div class="l-strong__item-pic c-img -point01">
                           <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/point01.jpg'); ?>" alt="完全に実務を想定したカリキュラム">
                       </div>
                       <div class="l-strong__item-body">
                           <h3 class="l-strong__item-point">カリキュラム</h3>
                           <h3 class="l-strong__item-ttl">完全に実務を想定したカリキュラム</h3>
                           <p class="l-strong__item-txt">実際の成果物（アウトプット）からカリキュラムを作成。
                           どのくらいの成果物を提出すれば実際の現場で通用するのかを理解している我々にしか作れないカリキュラムをご提供。</p>
                       </div>
                   </div>
                   <div class="l-strong__item fade-item">
                       <div class="l-strong__item-pic c-img -point02">
                           <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/point03.jpg'); ?>" alt="上司、部下の関係で課題に取り組む">
                       </div>
                       <div class="l-strong__item-body">
                           <h3 class="l-strong__item-point">徹底的な管理</h3>
                           <h3 class="l-strong__item-ttl">上司、部下の関係で課題に取り組む</h3>
                           <p class="l-strong__item-txt">講師が上司役、受講生が部下役としてカリキュラムを進めていく。上司のフィードバックはかなり厳しめに実務レベルで行い、加えて進捗具合の管理も徹底されるため実戦的なスキルが身につく。</p>
                       </div>
                   </div>
                   <div class="l-strong__item fade-item">
                       <div class="l-strong__item-pic c-img -point03">
                           <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/point02.jpg'); ?>" alt="上位1%の現役エンジニアによる徹底的指導">
                       </div>
                       <div class="l-strong__item-body">
                           <h3 class="l-strong__item-point">講師の質</h3>
                           <h3 class="l-strong__item-ttl">上位1%の現役エンジニアによる<span style="display:inline-block;">徹底的指導</span></h3>
                           <p class="l-strong__item-txt">今も最前線で実務をこなしているエンジニアが講師（上司役）としてフィードバックを行う。実務で通用するレベルで徹底指導。</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <div class="l-diff c-section lazyloaded">
           <div class="l-diff__inner c-inner fade-item">
               <p class="l-diff__ttl -item1">他のスクールとの違い</p>
               <p class="l-diff__ttl -item2"><span class="lg">それは「<span class="strong">実務型</span>」と「<span class="strong">管理</span>」</span></p>
               <p class="l-diff__txt c-txt -white">まずは実践で、その実践の過程で実務的な内容と基礎的な内容を教えます。<br>
               実務レベルのを受け、実際の案件で納品できるレベルに到達するまで何度でも繰り返します。<br>卒業後に即戦力として活躍できるレベルで輩出します。</p>
           </div>
       </div>

       <div class="l-course c-section">
           <div class="l-course__inner c-inner">
               <div class="fade-item">
                   <p class="c-en">curriculum</p>
                   <h2 class="c-ttl">自分に合ったカリキュラムを選択</h2>
                   <!-- <p class="" style="margin-top:-2em;margin-bottom:3em">TechElite（テックエリート）では現在2つのカリキュラムを提供しております</p> -->
               </div>
               <div class="l-course__body">
                   <div class="l-course__block fade-item">
                       <figure class="l-course__block-figure c-img">
                           <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/course01.jpg'); ?>" alt="LP制作コース">
                       </figure>
                       <div class="l-course__block-body">
                           <h3 class="l-course__block-ttl">LP制作コース</h3>
                           <ul class="l-course__block-list">
                               <li class="l-course__block-list--item scroll-item">Webプログラミングをしっかり学べる</li>
                               <li class="l-course__block-list--item scroll-item">デザインを完璧に実装することができる</li>
                               <li class="l-course__block-list--item scroll-item">現場で実際に使用される水準でのフィードバック</li>
                               <li class="l-course__block-list--item scroll-item">実践に沿ったコードレビュー</li>
                           </ul>
                       </div>
                   </div>
                   <div class="l-course__block fade-item">
                       <figure class="l-course__block-figure c-img">
                           <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/course02.jpg'); ?>" alt="ホームページ制作">
                       </figure>
                       <div class="l-course__block-body">
                           <h3 class="l-course__block-ttl">ホームページ制作</h3>
                           <ul class="l-course__block-list">
                               <li class="l-course__block-list--item scroll-item">Wordpressを用いたCMSを学べる</li>
                               <li class="l-course__block-list--item scroll-item">実務レベルでホームページ制作ができるレベルに</li>
                               <li class="l-course__block-list--item scroll-item">実案件のデザインデータを使い、本格的なホームページ制作を行う</li>
                               <li class="l-course__block-list--item scroll-item">現場で実際に使用される水準でのフィードバック</li>
                               <li class="l-course__block-list--item scroll-item">実践に沿ったコードレビュー</li>
                           </ul>
                       </div>
                   </div>
               </div>
               <div class="l-course__bottom fade-item">
                   <div class="c-course">
                       <div class="c-course__body">
                           <div class="c-course__ttl">
                               <p class="label">新プラン</p>
                               <p class="txt">2日で学ぶLP制作合宿</p>
                           </div>
                           <div class="c-course__img c-img">
                               <picture>
                                   <source media="(min-width: 768px)"  data-srcset="<?php echo get_theme_file_uri('/assets/img/course/lp-course-pc.png'); ?>">
                                   <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/course/lp-course-sp.png'); ?>" alt="2日で学ぶLP制作合宿">
                               </picture>
                           </div>
                           <div class="c-course__list">
                               <div class="c-course__item">
                                   <p class="label">対象者</p>
                                   <p class="txt">短期間、少額投資でフリーランス・副業への第一歩を踏み出したい人</p>
                               </div>
                               <div class="c-course__item">
                                   <p class="label">学習方法</p>
                                   <p class="txt">2日間に及びzoomを8時間×2日にかけて徹底指導</p>
                               </div>
                               <div class="c-course__item">
                                   <p class="label">金額</p>
                                   <p class="txt">15万円（税込）</p>
                               </div>
                               <div class="c-course__item">
                                   <p class="label">備考</p>
                                   <p class="txt">適性テストを受けていただく必要があります（説明会で説明します）</p>
                               </div>
                           </div>
                       </div>
                       <div class="c-course__img-box"></div>
                   </div>   
               </div>
           </div>
       </div>

       <div class="l-skill c-section">
           <div class="c-inner">
               <div class="fade-item">
                   <p class="c-en">SKILLS</p>
                   <h2 class="c-ttl -white">身につくスキル</h2>
               </div>
               <div class="l-skill__body fade-item">
                   <div class="l-skill__block">
                       <h3 class="l-skill__block-ttl">LP制作コース</h3>
                       <p class="l-skill__block-txt">実案件レベルのLPを制作できるようになるコース</p>
                       <ul class="l-skill__block-list">
                           <li class="l-skill__block-list--item">HTML</li>
                           <li class="l-skill__block-list--item">CSS</li>
                           <li class="l-skill__block-list--item">JavaScript</li>
                           <li class="l-skill__block-list--item">PHP</li>
                       </ul>
                   </div>
                   <div class="l-skill__block">
                       <h3 class="l-skill__block-ttl">HP制作コース</h3>
                       <p class="l-skill__block-txt">実案件レベルのHPを制作できるようになるコース</p>
                       <ul class="l-skill__block-list">
                           <li class="l-skill__block-list--item">HTML</li>
                           <li class="l-skill__block-list--item">CSS</li>
                           <li class="l-skill__block-list--item">JavaScript</li>
                           <li class="l-skill__block-list--item">PHP</li>
                           <li class="l-skill__block-list--item">Wordpress</li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>

       <div class="l-support c-section">
           <div class="l-support__inner c-inner">
               <div class="l-support__head fade-item">
                   <div class="l-support__head-top">
                       <p class="c-en">SUPPORT</p>
                       <h2 class="l-support__ttl c-ttl">サポート体制も充実</h2>
                   </div>
                   <p class="l-support__head-bottom c-txt">
                   プログラミング学習は一般的に継続が難しいとされています。しかしTechEliteでは初心者でも継続的に学習を進めていけるようなサポート体制が整っています。また、スクール卒業後についても手厚いサポートを行なっています。</p>
               </div>
               <div class="l-support__list">
                   <div class="l-support__item fade-item">
                       <div class="l-support__item-pic c-img">
                           <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/support01.jpg'); ?>" alt="1on1でのレクチャー">
                       </div>
                       <div class="l-support__item-body">
                           <h3 class="l-support__item-ttl">1on1でのレクチャー</h3>
                           <p class="l-support__item-txt">TechEliteでは初心者の方でも挫折しないような環境を作っています！課題を進めていった際に分からない箇所が出てきた場合、講師に連絡し、1on1での疑問点の解消、レクチャーを受けることが可能です！</p>
                       </div>
                   </div>
                   <div class="l-support__item fade-item">
                       <div class="l-support__item-pic c-img">
                           <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/support02.jpg'); ?>" alt="独立のサポート">
                       </div>
                       <div class="l-support__item-body">
                           <h3 class="l-support__item-ttl">独立のサポート</h3>
                           <p class="l-support__item-txt">授業で作成した成果物はご自身のポートフォリオに！プロジェクト全体のフローから、フリーランスになった際に必要な書類関係のテンプレートも貰えるため、卒業後も安心！卒業後すぐにエンジニアとして独立、活躍するためのサポートが充実！</p>
                       </div>
                   </div>
                   <div class="l-support__item fade-item">
                       <div class="l-support__item-pic c-img">
                           <img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/support03.jpg'); ?>" alt="卒業後の転職や仕事の紹介">
                       </div>
                       <div class="l-support__item-body">
                           <h3 class="l-support__item-ttl">卒業後の転職や仕事の紹介</h3>
                           <p class="l-support__item-txt">期日を守り、優秀な成績を収めた方は、StockSunエンジニアバンクに登録！<br>StockSunから依頼がある可能性も！<br><span class="sm">※「エンジニアバンク」とはStockSunパートナーや幹部人がエンジニア採用に際して目を通すリストを指します。</span></p>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <div class="l-goal c-section">
           <div class="l-goal__inner c-inner">
               <div class="l-goal__head fade-item">
                   <p class="c-en">the goal</p>
                   <h2 class="c-ttl">TechEliteの目指すもの</h2>
               </div>
               <ul class="l-goal__list">
                   <li class="l-goal__item fade-item">
                       <span class="icon"><img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/goal01.png'); ?>" alt="技術力" height="80" width="60"></span>
                       <span class="txt">業界トップレベルの技術力を伝授</span>
                   </li>
                   <li class="l-goal__item fade-item">
                       <span class="icon"><img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/goal02.png'); ?>" alt="ビジネススキル" height="80" width="64"></span>
                       <span class="txt">業界に通用するビジネススキルを習得</span>
                   </li>
                   <li class="l-goal__item fade-item">
                       <span class="icon"><img class="lazyload" data-src="<?php echo get_theme_file_uri('/assets/img/top/goal03.png'); ?>" alt="ゴールへの最短距離" height="80" width="64"></span>
                       <span class="txt">あなたのゴールへの最短距離を導く</span>
                   </li>
               </ul>
           </div>
       </div>

       <div class="l-curriculum c-section">
           <div class="l-curriculum__inner c-inner fade-item">
               <p class="l-curriculum__en c-en">curriculum</p>
               <h2 class="l-curriculum__ttl c-ttl">Youtubeにて<br class="only-sp">講義の一部を無料公開</h2>
               <!-- <div class="l-curriculum__mov">
               </div> -->
               <div class="c-btn__box">
                   <a href="https://www.youtube.com/@TechElite_YT" target="_blank" rel="noopener noreferrer" class="c-btn">
                       <span class="icon">
                           <svg xmlns="http://www.w3.org/2000/svg" width="23.467" height="16.5" viewBox="0 0 23.467 16.5">
                               <g id="グループ_253" data-name="グループ 253" transform="translate(-1228.642 -7246.5)">
                                   <path id="パス_126" data-name="パス 126" d="M23.618-13.918a2.949,2.949,0,0,0-2.075-2.088c-1.83-.494-9.168-.494-9.168-.494s-7.338,0-9.168.494a2.949,2.949,0,0,0-2.075,2.088,30.932,30.932,0,0,0-.49,5.685,30.932,30.932,0,0,0,.49,5.685A2.9,2.9,0,0,0,3.207-.494C5.037,0,12.375,0,12.375,0s7.338,0,9.168-.494a2.9,2.9,0,0,0,2.075-2.055,30.932,30.932,0,0,0,.49-5.685A30.932,30.932,0,0,0,23.618-13.918ZM9.975-4.744v-6.978l6.133,3.489Z" transform="translate(1228 7263)" fill="#fff" />
                               </g>
                           </svg>
                       </span>
                       授業内容はこちら
                       <span class="arrow">
                           <svg xmlns="http://www.w3.org/2000/svg" width="12.372" height="14.744" viewBox="0 0 12.372 14.744">
                               <path id="パス_219" data-name="パス 219" d="M476,303.7l10,6-10,6" transform="translate(-474.628 -302.327)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2" />
                           </svg>
                       </span>
                   </a>
               </div>
           </div>
       </div>
   </div>
<?php // .c-contents の閉じタグ ?>
</main>

<?php get_footer(); ?>