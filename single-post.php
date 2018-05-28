<?php
$cat = get_the_category();
get_header();
if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>
        <main>
            <?
            the_content(); ?>
        </main>
        <?
    }
}
if (count($cat) > 0 && $cat[0]->slug == 'news') {
    get_footer('detail');
} else {
    get_footer();
}

?>
