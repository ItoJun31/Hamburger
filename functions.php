<?php register_nav_menu('category-menu', 'Hamburger'); // １つのメニューバー表示
//add_theme_support('menus') テーマチェック対策;
add_theme_support('title-tag');
add_action('init', function () {
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'global_nav' => 'グローバルナビゲーション'
    ]);
});


function add_my_files()
{
    //スタイルシートの読み込み
    wp_enqueue_script('jquery', esc_url(get_template_directory_uri()) . '/js/jquery-3.5.1.min.js', "", "3.5.1", true);
    wp_enqueue_script('base-script', esc_url(get_template_directory_uri()). '/js/script.js', array(), '1.0.0', true);
    wp_enqueue_style('style', esc_url(get_template_directory_uri()). '/style.css', array(), '1.0.0');
    wp_enqueue_style( 'reset', '//unpkg.com/ress/dist/ress.min.css', array() );
    wp_enqueue_style( 'mplus1p', '//mplus-webfonts.sourceforge.jp/mplus-1m-bold.ttf', array() );
    wp_enqueue_style( 'mplus1p', '//mplus-webfonts.sourceforge.jp/mplus-1m-regular.ttf', array() );
    wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
}
add_action('wp_enqueue_scripts', 'add_my_files');

//ウィジェットの追加
function hamburgershop_widgets_init()
{
    register_sidebar(
        array(
            'name'          => 'カテゴリーウィジェット',
            'id'            => 'category_widget',
            'description'   => 'カテゴリー用ウィジェットです',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2><i class="fa fa-folder-open" aria-hidden="true"></i>',
            'after_title'   => "</h2>\n",
        )
    );
}
add_action('widgets_init', 'hamburgershop_widgets_init');

/**
 * サイト内検索の範囲に、カテゴリー名、タグ名、を含める
 */
function custom_search($search, $wp_query)
{
    global $wpdb;

    //サーチページ以外だったら終了
    if (!$wp_query->is_search)
        return $search;

    if (!isset($wp_query->query_vars))
        return $search;

    // ユーザー名とか、タグ名・カテゴリ名も検索対象に
    $search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
    if (count($search_words) > 0) {
        $search = '';
        foreach ($search_words as $word) {
            if (!empty($word)) {
                $search_word = $wpdb->escape("%{$word}%");
                $search .= " AND (
                {$wpdb->posts}.post_title LIKE '{$search_word}'
                OR {$wpdb->posts}.post_content LIKE '{$search_word}'
                OR {$wpdb->posts}.post_author IN (
                    SELECT distinct ID
                    FROM {$wpdb->users}
                    WHERE display_name LIKE '{$search_word}'
                    )
                OR {$wpdb->posts}.ID IN (
                    SELECT distinct r.object_id
                    FROM {$wpdb->term_relationships} AS r
                    INNER JOIN {$wpdb->term_taxonomy} AS tt ON r.term_taxonomy_id = tt.term_taxonomy_id
                    INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
                    WHERE t.name LIKE '{$search_word}'
                OR t.slug LIKE '{$search_word}'
                OR tt.description LIKE '{$search_word}'
                )
            ) ";
            }
        }
    }

    return $search;
}
add_filter('posts_search', 'custom_search', 10, 2);

//以下、テーマチェック対策
add_theme_support('automatic-feed-links');

function body_hook()
{
    echo '<!--wp_body_open action hook-->';
}
add_action('wp_body_open', 'body_hook');

if (!isset($content_width)) {
    $content_width = 1320;
}

function wpbeg_theme_setup()
{
    load_theme_textdomain('wpbeg', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'wpbeg_theme_setup');
