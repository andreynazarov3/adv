<div class="menu_m__open">
    <div class="menu_m__open__button" data-menu="open"><i></i><i></i><i></i></div>
</div>
<div class="menu_m">
    <a href="#" class="menu_m__logo">
        <img src="<?=get_template_directory_uri()?>/images/logo-black.svg" alt="">
    </a>
    <?
    get_cool_menu_mobile();
    ?>
    <div class="menu_m__last">
        <div class="adv_s__soc">
            <a class="adv_s__soc__item adv_s__soc__item--fb" href="#"><img src="<?=get_template_directory_uri()?>/images/facebook.svg"
                                                                           alt=""></a>
            <a class="adv_s__soc__item adv_s__soc__item--tg" href="#"><img src="<?=get_template_directory_uri()?>/images/tg.svg"
                                                                           alt=""></a>
        </div>
        <a href="#" class="menu_m__lang">En</a>
    </div>
    <div class="menu_m__open menu_m__open--borderless menu_m__open--in-menu">
        <div class="menu_m__open__button menu_m__open__button--borderless" data-menu="close"><i></i><i></i><i></i></div>
    </div>
</div>
<?wp_footer()?>
</body>
</html>