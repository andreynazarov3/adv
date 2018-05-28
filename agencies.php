<?php
/*
Template Name: Агентства
*/
get_header();
$agencies = get_posts(array(
    'category_name' => 'agencies'
));
?>
    <main>
        <?
        foreach ($agencies as $agency) {
            $meta = get_post_meta($agency->ID);
            ?>
            <div class="agencies__main">
                <div class="agencies__main__title">
                    <span data-cool-transition-second data-href="<?= get_permalink($agency) ?>"
                          class="agencies__main__title_main"><?= str_replace(array("[:ru]", "[:en]", "[:]"), "", $agency->post_title) ?></span>
                    <span class="agencies__main__title_sub">/ <?= $meta['Дивизион'][0] ?></span>
                    <span data-cool-transition-second data-href="<?= get_permalink($agency) ?>" class="arrow"></span>
                </div>
                <div class="agencies__main__text">
                    <p>
                        <?= str_replace(array("[:ru]", "[:en]", "[:]"), "", $agency->post_excerpt) ?>
                    </p>
                </div>
            </div>
            <?
        }
        ?>
    </main>
<?
get_footer();
?>