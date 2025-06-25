<?php
/**
* TechElite Theme functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package TechElite_Theme
*/

// function assets_css() {
//     wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
// }
// add_action('wp_enqueue_scripts', 'assets_css');

// function assets_js() {
//     wp_enqueue_script('javascript', get_template_directory_uri() . '/assets/js/index.js', array('jquery'), false, true);
// }
// add_action('wp_enqueue_scripts', 'assets_js');

if ( ! defined( 'TECHELITE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'TECHELITE_VERSION', '1.0.0' );
}

if ( ! function_exists( 'techelite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function techelite_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'techelite-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Register navigation menus.
		register_nav_menus(
			array(
				'primary_navigation' => esc_html__( 'Primary Navigation', 'techelite-theme' ),
				'footer_navigation'  => esc_html__( 'Footer Navigation', 'techelite-theme' ),
			)
		);

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 30, // 推測値
				'width'       => 150, // 推測値
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

        // Gutenbergサポート
        add_theme_support( 'wp-block-styles' ); // ブロックエディタ用の基本スタイル
        add_theme_support( 'align-wide' );      // 幅広・全幅配置のサポート
        add_theme_support( 'editor-styles' );   // エディタ用カスタムスタイルの読み込み
        add_editor_style( 'assets/css/editor-style.css' ); // エディタ用CSSファイル（必要なら作成）

        // レスポンシブな埋め込みコンテンツ
        add_theme_support( 'responsive-embeds' );

	}
endif;
add_action( 'after_setup_theme', 'techelite_setup' );

/**
 * Enqueue scripts and styles.
 */
function techelite_scripts() {
	// Google Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Poppins:wght@800&display=swap', array(), null );

	// Swiper CSS
	wp_enqueue_style( 'swiper-css', get_theme_file_uri( '/assets/css/swiper.min.css' ), array(), 'VER_SWIPER' ); // VER_SWIPER はSwiperのバージョン

	// Theme stylesheet (style.css がメインだが、実際は style.min.css を読み込む想定)
	wp_enqueue_style( 'techelite-style', get_theme_file_uri( '/assets/css/style.min.css' ), array('swiper-css'), TECHELITE_VERSION );
    // もし style.css に全てのスタイルを書くなら wp_enqueue_style( 'techelite-style', get_stylesheet_uri(), array(), TECHELITE_VERSION );

    // 元HTMLにあったインラインスタイル <style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>
    // これは style.css (style.min.css) に含めるか、ここでインラインで追加
    $custom_css = "img:is([sizes=\"auto\" i], [sizes^=\"auto,\" i]) { contain-intrinsic-size: 3000px 1500px; }";
    wp_add_inline_style( 'techelite-style', $custom_css );


	// jQuery (WordPressに同梱されているものを利用) - 通常は依存関係で自動的に読み込まれる
	// wp_enqueue_script( 'jquery' );

	// Swiper JS
	wp_enqueue_script( 'swiper-js', get_theme_file_uri( '/assets/js/swiper.js' ), array(), 'VER_SWIPER', true );

	// GSAP JS
	wp_enqueue_script( 'gsap-js', get_theme_file_uri( '/assets/js/gsap.min.js' ), array(), 'VER_GSAP', true );
	wp_enqueue_script( 'scrolltrigger-js', get_theme_file_uri( '/assets/js/ScrollTrigger.min.js' ), array('gsap-js'), 'VER_SCROLLTRIGGER', true );

	// Lazysizes JS
	wp_enqueue_script( 'lazysizes-js', get_theme_file_uri( '/assets/js/lazysizes.min.js' ), array(), 'VER_LAZYSIZES', true );
	
	// Custom script
	wp_enqueue_script( 'techelite-script', get_theme_file_uri( '/assets/js/script.js' ), array('jquery', 'swiper-js', 'gsap-js', 'scrolltrigger-js', 'lazysizes-js'), TECHELITE_VERSION, true );


	// WordPress Popular PostsのJS/CSSはプラグインが自動で読み込むはずなので、通常テーマ側でのエンキューは不要。
	// wp_enqueue_script( 'wpp-js', get_theme_file_uri( '/wp-content/plugins/wordpress-popular-posts/assets/js/wpp.min.js' ), array('jquery'), '6.4.2', true );
	// wp_enqueue_style( 'wpp-css', get_theme_file_uri( '/wp-content/plugins/wordpress-popular-posts/assets/css/wpp.css' ), array(), '6.4.2' );


    // WordPressの絵文字スクリプト設定
    // $wpemojiSettings は wp_head() で出力されるが、もしカスタマイズが必要な場合はここで wp_localize_script を使うこともある
    /*
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    */
}
add_action( 'wp_enqueue_scripts', 'techelite_scripts' );


// Google Tag Managerの<noscript>部分を<body>直後に追加
function techelite_gtm_body_open_script() {
    // GTM-MNZJXJB の ID を使用
    ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MNZJXJB"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
}
// add_action( 'wp_body_open', 'techelite_gtm_body_open_script' );
// GTMの<script>部分はheader.phpに直接記述するか、ここでwp_headにフックして追加も可能
// ただし、lazyAnalyticsScript のような遅延読み込みロジックと併用する場合は注意が必要。
// GTMの推奨は<head>内のできるだけ上と<body>直後。

/**
 * カスタムナビゲーションウォーカーの例 (liやaにクラスを付与するため)
 * header.phpやfooter.phpで使用しているカスタムウォーカーの定義が必要です。
 * 以下は非常に基本的な例です。実際の要件に合わせて調整してください。
 */
class Custom_Walker_Nav_Menu_Header extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        // 'l-header__nav-item' を追加
        $classes[] = 'l-header__nav-item';
        $classes[] = 'menu-item-' . $item->ID;


        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        // 'l-header__nav-link' を追加
        $atts['class']  = 'l-header__nav-link';
        if ($depth === 0) { // 必要に応じて条件分岐
           // $atts['class'] .= ' some-other-class';
        }


        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

class Custom_Walker_Nav_Menu_Footer extends Walker_Nav_Menu {
    // 上記と同様にフッター用のカスタムウォーカーを定義
    // 例:
    // function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    //     // ... li と a に l-footer__nav-item, l-footer__nav-link を付与するロジック
    // }
}


// Speculation Rules API の追加 (WordPress 6.4以降でコアに機能が入りつつある)
// 元のHTMLにあったものは、テーマが対応していれば自動で、またはこのようにフックで追加可能
function techelite_add_speculation_rules() {
    ?>
    <script type="speculationrules">
    {"prefetch":[{"source":"document","where":{"and":[{"href_matches":"\/techelite\/*"},{"not":{"href_matches":["\/techelite\/wp-*.php","\/techelite\/wp-admin\/*","\/techelite\/wp-content\/uploads\/*","\/techelite\/wp-content\/*","\/techelite\/wp-content\/plugins\/*","\/techelite\/wp-content\/themes\/tech_elite_theme\/*","\/techelite\/*\\?(.+)"]}},{"not":{"selector_matches":"a[rel~=\"nofollow\"]"}},{"not":{"selector_matches":".no-prefetch, .no-prefetch a"}}]},"eagerness":"conservative"}]}
    </script>
    <?php
}
add_action( 'wp_footer', 'techelite_add_speculation_rules', 5 ); // wp_footerの早い段階で出力

function post_has_archive($args, $post_type) {
	if ('post' == $post_type) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'article'; // 一覧ページで使いたいURL
	}
	return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

add_theme_support('post-thumbnails');

add_filter('get_the_archive_title', function ($title) {

    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_archive()) {
        $title = "新着記事";
    }

    return $title;
});

/**
 * 標準投稿タイプにアーカイブページを持たせる
 */
function enable_post_archive( $args, $post_type ) {
    if ( 'post' == $post_type ) {
        $args['rewrite']     = true; // リライトルールを有効に
        $args['has_archive'] = 'articles'; // ★アーカイブページのスラッグ (例: 'articles', 'blog'など任意)
    }
    return $args;
}
add_filter( 'register_post_type_args', 'enable_post_archive', 10, 2 );

// パーマリンク設定の更新を促す
// このコードを追加・変更した後は、WordPress管理画面の「設定」>「パーマリンク設定」を開き、
// 何も変更せずに「変更を保存」ボタンをクリックしてください。これによりリライトルールが更新されます。

?>