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

<header class="black">
    <? if (!is_page()) { ?>
        <a href="../" class="header-back"></a>
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