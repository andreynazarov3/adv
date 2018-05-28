<?php
$page = '/agencies';
get_header();
?>
    <main>
        <?
        while(have_posts()) {
            the_post();
        ?>
            <div class="agencies__main">
                <div class="agencies__main__title">
                    <span data-cool-transition-second data-href="<?= get_permalink() ?>"
                          class="agencies__main__title_main"><?=get_the_title(); ?></span>
                    <span class="agencies__main__title_sub">/ <?=get_post_meta(get_the_ID(), 'Дивизион', true)?></span>
                    <span data-cool-transition-second data-href="<?= get_permalink() ?>" class="arrow"></span>
                </div>
                <div class="agencies__main__text">
                    <p>
                        <?= get_the_excerpt() ?>
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