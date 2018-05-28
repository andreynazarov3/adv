<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ADV.RU
 * @since ADV.RU 0.1
 */
$cat = get_the_category();
get_header();
if (have_posts()) {
    while (have_posts()) {
        the_post();
        if (in_category('news')) {
            ?>
            <main class="news-detail">
                <?
                the_content(); ?>
            </main>
            <?
        } else {
            the_content();
        }
    }
}
if (count($cat) > 0 && $cat[0]->slug == 'news') {
    get_footer('detail');
} else {
    get_footer();
}