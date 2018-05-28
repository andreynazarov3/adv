<footer>
    <div class="share_button"></div>
    <div class="share_buttons">
        <a class="adv_s__soc__item adv_s__soc__item--orange adv_s__soc__item--fb" href="#"><img
                    src="<?= get_template_directory_uri() ?>/images/facebook.svg" alt=""></a>
        <a class="adv_s__soc__item adv_s__soc__item--orange adv_s__soc__item--tg" href="#"><img
                    src="<?= get_template_directory_uri() ?>/images/tg.svg" alt=""></a>
        <a class="adv_s__soc__item adv_s__soc__item--orange adv_s__soc__item--tw" href="#"><img
                    src="<?= get_template_directory_uri() ?>/images/twitter.svg" alt=""></a>
    </div>
    <div class="wrapper">
        <form class="es_shortcode_form" data-es_form_id="es_shortcode_form">
            <span>Подписаться</span>
            <div>
                <input type="email" name="es_txt_email_pg" required placeholder="Введите Ваш e-mail">
                <input id="es_txt_button_pg" type="submit" value="" class="submit">
            </div>
        </form>
    </div>
</footer>
<div class="menu_m__open">
    <div class="menu_m__open__button" data-menu="open"><i></i><i></i><i></i></div>
</div>
<div class="menu_m">
    <a href="#" class="menu_m__logo">
        <img src="<?= get_template_directory_uri() ?>/images/logo-black.svg" alt="">
    </a>
    <div class="menu_m__list">
        <a href="/" class="menu_m__item">Мы</a>
        <a href="/agencies" class="menu_m__item">Агентства</a>
        <a href="/tech" class="menu_m__item">Технологии</a>
        <a href="/news" class="menu_m__item menu_m__item--this">Журнал</a>
        <a href="/contacts" class="menu_m__item">Контакты</a>
    </div>
    <div class="menu_m__last">
        <div class="adv_s__soc">
            <a class="adv_s__soc__item adv_s__soc__item--fb" href="#"><img
                        src="<?= get_template_directory_uri() ?>/images/facebook.svg"
                        alt=""></a>
            <a class="adv_s__soc__item adv_s__soc__item--tg" href="#"><img
                        src="<?= get_template_directory_uri() ?>/images/tg.svg"
                        alt=""></a>
        </div>
        <a href="#" class="menu_m__lang">En</a>
    </div>
    <div class="menu_m__open menu_m__open--borderless menu_m__open--in-menu">
        <div class="menu_m__open__button menu_m__open__button--borderless" data-menu="close"><i></i><i></i><i></i></div>
    </div>
</div>
<? wp_footer(); ?>
</body>
</html>