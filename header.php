<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/css/swiper.min.css"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>"/>
    <script defer src="<?= get_template_directory_uri() ?>/js/index.js"></script>
    <title><?=get_the_title()?></title>
    <?wp_head();?>
</head>
<body>
<?
$current_page = parse_url(get_page_link(), PHP_URL_PATH);
if (($current_page == '/' || $current_page == '/tech') && !wp_is_mobile()) {
    $header_class = 'white';
} else {
    $header_class = 'black';
}

$c = get_the_category();

if ($c && $c[0]->slug == 'news') {
    $back_link = '/news';
}
else {
    $back_link = '/agencies';
}
?>
<? 

$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if (!isset($_SESSION['loaded']) || $pageWasRefreshed)
{
	global $wp;
	if(!strstr($wp->request, '/')){
		get_flash_curtain();
	}	
}
	$_SESSION['loaded'] = true;
?>
	
<header class="<?=$header_class?>">
    <? if (!is_page() && !is_category()) { ?>
        <a href="<?=$back_link?>" class="header-back"></a>
    <? } ?>
    <span class="header-logo header-logo--white">
        <img src="<?= get_template_directory_uri() ?>/images/logo-white.svg" alt="">
    </span>
    <span class="header-logo header-logo--black">
        <img src="<?= get_template_directory_uri() ?>/images/logo-black.svg" alt="">
    </span>
    <a class="header-lang to-orange-text-hover" href="#">
        En
    </a>
</header>
<?
get_cool_menu_desktop();
?>