<?php
/*
Template Name: Контакты
*/

get_header();
$meta = get_post_meta(get_the_ID());
?>
    <main class="contacts">
        <div class="contacts_top_block wrapper">
            <div class="contacts_top__addresse">
                <?= $meta['Адрес'][0] ?>
            </div>
            <div class="contacts_top__phone">
                <?= $meta['Телефон'][0] ?>
            </div>
            <a href="mailto:<?= $meta['Почта'][0] ?>" class="contacts_top__email"><?= $meta['Почта'][0] ?></a>
        </div>
        <div class="contacts_bottom_block wrapper">
            <div class="contacts_bottom__item">
                <p>
                    <?=$meta['description'][0]?>
                </p>
                <a href="mailto:<?=$meta['mail'][0]?>"><?=$meta['mail'][0]?></a>
            </div>
            <div class="contacts_bottom__item">
                <p>
                    <?=$meta['description_2'][0]?>
                </p>
                <a href="mailto:<<?=$meta['mail_2'][0]?>"><?=$meta['mail_2'][0]?></a>
            </div>
            <div class="contacts_bottom__item">
                <div class="contacts_bottom__man contacts_bottom__man--d">
                    <i></i><i></i><i></i>
                    <img src="<?= get_template_directory_uri() ?>/images/man.svg"
                         alt="">
                </div>
            </div>
        </div>
        <div class="adv_s__soc adv_s__soc--contacts">
            <a class="adv_s__soc__item adv_s__soc__item--wide adv_s__soc__item--fb" href="#"><img
                        src="<?= get_template_directory_uri() ?>/images/facebook.svg" alt=""></a>
            <a class="adv_s__soc__item adv_s__soc__item--wide adv_s__soc__item--tg" href="#"><img
                        src="<?= get_template_directory_uri() ?>/images/tg.svg"
                        alt=""></a>
            <a class="adv_s__soc__item adv_s__soc__item--wide adv_s__soc__item--tw" href="#"><img
                        src="<?= get_template_directory_uri() ?>/images/twitter.svg" alt=""></a>
            <div class="contacts_bottom__man contacts_bottom__man--m">
                <i></i><i></i><i></i>
                <img src="<?= get_template_directory_uri() ?>/images/man.svg" alt="">
            </div>
        </div>
    </main>
<?
get_footer();