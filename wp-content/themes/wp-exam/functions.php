<?php

/**
 * <title>タグを出力する
 */
add_theme_support('title-tag');

/**
 *  アイキャッチ画像を使用可能にする
 */
add_theme_support('post-thumbnails');

/**
 * メインクエリを変更する
 */
add_action('pre_get_posts', 'my_pre_get_posts');
function my_pre_get_posts($query)
{
    // 管理画面、メインクエリ以外には設定しない
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    // トップページの場合は
    if ($query->is_home()) {
        $query->set('posts_per_page', 3);
        return;
    }
}

/**
 * カスタムメニュー機能を使用可能にする
 */
add_theme_support('menus');
