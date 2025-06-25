<?php
/*
Template Name: 授業内容
Template Post Type: page
*/
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

        <div class="c-top">
            <div class="c-top__inner c-inner">
                <div class="c-top__head">
                    <h1 class="c-top__ttl">授業内容</h1>
                    <p class="c-top__en en">Curriculum</p>
                </div>
                <p class="c-top__copy">卒業後、すぐに現場の最前線で活躍できる授業。<br class="only-pc">ここでしか学べない実践型カリキュラム。</p>
            </div>
        </div>

        <div class="p-lesson c-section">
            <div class="p-lesson__inner c-inner">
                <h2 class="p-lesson__ttl c-ttl"><span class="strong">卒業と同時に即戦力</span>となる<span style="display: inline-block;">スキルを習得できる</span></h2>
                <div class="p-lesson__list">
                    <div class="p-lesson__item">
                        <div class="p-lesson__item-pic c-img">
                            <img class="lazyload" data-src="https://stock-sun.com/techelite/wp-content/themes/tech_elite_theme/assets/img/lesson/lesson01.jpg" alt="実務型カリキュラム">
                        </div>
                        <div class="p-lesson__item-body">
                            <p class="p-lesson__item-ttl">実務型カリキュラム</p>
                            <p class="p-lesson__item-copy">「現場」をとことん再現した環境でのラーニング</p>
                            <ul class="p-lesson__item-list">
                                <li class="p-lesson__item-list--item">基礎を学びながらすぐにアウトプットをしていく実践型</li>
                                <li class="p-lesson__item-list--item">実際の仕事の流れを限りなく忠実に反映</li>
                                <li class="p-lesson__item-list--item">即戦力を育てるためのロールプレイ形式(上司・部下想定)</li>
                                <li class="p-lesson__item-list--item">週ごとに講師との1on1セッションで疑問点をクリア</li>
                                <li class="p-lesson__item-list--item">納期遵守のためのスケジュール設計を体験</li>
                                <li class="p-lesson__item-list--item">実務で遭遇しがちなアクシデントを学ぶ</li>
                                <li class="p-lesson__item-list--item">顧客やデザイナーからの要望の調整スキルが身につく</li>
                            </ul>
                        </div>
                    </div>

                    <div class="p-lesson__item">
                        <div class="p-lesson__item-pic c-img">
                            <img class="lazyload" data-src="https://stock-sun.com/techelite/wp-content/themes/tech_elite_theme/assets/img/lesson/lesson02.jpg" alt="課題提出（納品）">
                        </div>
                        <div class="p-lesson__item-body">
                            <p class="p-lesson__item-ttl">課題提出<span class="sm">（納品）</span></p>
                            <p class="p-lesson__item-copy">現役エンジニア講師の現場さながらのフィードバック</p>
                            <ul class="p-lesson__item-list">
                                <li class="p-lesson__item-list--item">最適なコードの提案</li>
                                <li class="p-lesson__item-list--item">納品前の最終検品</li>
                                <li class="p-lesson__item-list--item">スケジュール設計の徹底コーチング</li>
                            </ul>
                        </div>
                    </div>

                    <div class="p-lesson__item">
                        <div class="p-lesson__item-pic c-img">
                            <img class="lazyload" data-src="https://stock-sun.com/techelite/wp-content/themes/tech_elite_theme/assets/img/lesson/lesson03.jpg" alt="最終課題（実務レベルになるまで取り組む）">
                        </div>
                        <div class="p-lesson__item-body">
                            <p class="p-lesson__item-ttl">最終課題<span class="sm">（実務レベルになるまで取り組む）</span></p>
                            <p class="p-lesson__item-copy">納期までにサイトを完成</p>
                            <ul class="p-lesson__item-list">
                                <li class="p-lesson__item-list--item">細やかなフィードバッグを通して顧客に自信を持って納品できる品質へ</li>
                                <li class="p-lesson__item-list--item">納期から逆算した要件調整・期日管理やペース配分方法のレクチャー</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-course c-section">
            <div class="p-course__inner c-inner">
                <h2 class="p-course__ttl c-ttl" id="application">自分に合った<br class="only-sp">カリキュラムを選択</h2>
                <!-- <p class="p-course__ttl-sub">TechElite（テックエリート）では現在2つのカリキュラムを提供しております</p> -->
                <div class="p-course__body">
                    <div class="p-course__block">
                        <figure class="p-course__block-figure">
                            <img class="lazyload" data-src="https://stock-sun.com/techelite/wp-content/themes/tech_elite_theme/assets/img/top/course01.jpg" alt="LP制作コース">
                        </figure>
                        <div class="p-course__block-body">
                            <h3 class="p-course__block-ttl">LP制作コース</h3>
                            <ul class="p-course__block-list">
                                <li class="p-course__block-list--item scroll-item">Webプログラミングをしっかり学べる</li>
                                <li class="p-course__block-list--item scroll-item">デザインを完璧に実装することができる</li>
                                <li class="p-course__block-list--item scroll-item">現場で実際に使用される水準でのフィードバック</li>
                                <li class="p-course__block-list--item scroll-item">実践に沿ったコードレビュー</li>
                            </ul>
                        </div>
                        <a  class="p-course__block-link" href="" target="_blank">説明会不要で決済したい方はコチラ</a>
                    </div>
                    <div class="p-course__block">
                        <figure class="p-course__block-figure">
                            <img class="lazyload" data-src="https://stock-sun.com/techelite/wp-content/themes/tech_elite_theme/assets/img/top/course02.jpg" alt="ホームページ制作">
                        </figure>
                        <div class="p-course__block-body">
                            <h3 class="p-course__block-ttl">ホームページ制作</h3>
                            <ul class="p-course__block-list">
                                <li class="p-course__block-list--item scroll-item">Wordpressを用いたCMSを学べる</li>
                                <li class="p-course__block-list--item scroll-item">実務レベルでホームページ制作ができるレベルに</li>
                                <li class="p-course__block-list--item scroll-item">実案件のデザインデータを使い、本格的なホームページ制作を行う</li>
                                <li class="p-course__block-list--item scroll-item">現場で実際に使用される水準でのフィードバック</li>
                                <li class="p-course__block-list--item scroll-item">実践に沿ったコードレビュー</li>
                            </ul>
                        </div>
                        <a  class="p-course__block-link" href="" target="_blank">説明会不要で決済したい方はコチラ</a>
                    </div>
                </div>
                <div class="p-course__bottom">
                    <div class="c-course">
                        <div class="c-course__body">
                            <div class="c-course__ttl">
                                <p class="label">新プラン</p>
                                <p class="txt">2日で学ぶLP制作合宿</p>
                            </div>
                            <div class="c-course__img c-img">
                                <picture>
                                    <source media="(min-width: 768px)"  data-srcset="https://stock-sun.com/techelite/wp-content/themes/tech_elite_theme/assets/img/course/lp-course-pc.png">
                                    <img class="lazyload" data-src="https://stock-sun.com/techelite/wp-content/themes/tech_elite_theme/assets/img/course/lp-course-sp.png" alt="2日で学ぶLP制作合宿">
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

        <div class="p-benefits c-section">
            <div class="p-benefits__inner c-inner">
                <h2 class="p-benefits__ttl c-ttl">卒業特典</h2>
                <div class="p-benefits__list">
                    <div class="p-benefits__item">
                        <div class="p-benefits__item-head">
                            <div class="p-benefits__item-pic">
                            <img class="lazyload" data-src="https://stock-sun.com/techelite/wp-content/themes/tech_elite_theme/assets/img/lesson/benefit01.png" alt="StockSun発行の          認定証・実績ポートフォリオ">
                            </div>
                            <h3 class="p-benefits__item-ttl">StockSun発行の<br>認定証・実績ポートフォリオ</h3>
                        </div>
                        <p class="p-benefits__item-txt">最終課題ではStockSunの実案件のLP/HPを開発・納品してもらいます。納品後は実際の現場同様、StockSunから成果物に対するお支払いをします。実績ポートフォリオとして活用可能。更にStockSun発行の認定証も発行します！</p>
                    </div>
                    <div class="p-benefits__item">
                        <div class="p-benefits__item-head">
                            <div class="p-benefits__item-pic">
                            <img class="lazyload" data-src="https://stock-sun.com/techelite/wp-content/themes/tech_elite_theme/assets/img/lesson/benefit02.png" alt="よく実務で使用する          ソースコードを共有">
                            </div>
                            <h3 class="p-benefits__item-ttl">よく実務で使用する<br>ソースコードを共有</h3>
                        </div>
                        <p class="p-benefits__item-txt">実際の開発現場では1つのソースコードを複数の開発案件で使用することが多いです。実際に我々が現場で使用している雛形のソースコードをお渡しします。実務での使用はもちろんOKで、すぐ活用いただけます。</p>
                    </div>
                    <div class="p-benefits__item">
                        <div class="p-benefits__item-head">
                            <div class="p-benefits__item-pic">
                            <img class="lazyload" data-src="https://stock-sun.com/techelite/wp-content/themes/tech_elite_theme/assets/img/lesson/benefit03.png" alt="便利なツールや          ライブラリーの共有">
                            </div>
                            <h3 class="p-benefits__item-ttl">便利なツールや<br>ライブラリーの共有</h3>
                        </div>
                        <p class="p-benefits__item-txt">我々が今まで実務を行なってきた中で、便利なツールやライブラリーを共有します。実際の業務を行っている人と同じツール、ライブラリーを使って、より成長していきましょう。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php // .c-contents の閉じタグ ?>
</main>

<?php get_footer(); ?>