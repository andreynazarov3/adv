<?php
function register_my_session()
{
  if( !session_id() )
  {
    session_start();
  }
}

add_action('init', 'register_my_session');

function get_flash_curtain() {
    
	$flash_curtain_classes = Array();
	$flash_curtain_classes[0]['item'] = '';
	$flash_curtain_classes[0]['spacer'] = '';
	$flash_curtain_classes[1]['item'] = '';
	$flash_curtain_classes[2]['spacer'] = '';
	$flash_curtain_classes[3]['item'] = '';
	$flash_curtain_classes[3]['spacer'] = '';
	$flash_curtain_classes[4]['item'] = '';
	$flash_curtain_classes[4]['spacer'] = '';	    
	switch ($wp->request) {
		 case '':
			$flash_curtain_classes[0]['item'] = 'active';
			$flash_curtain_classes[0]['spacer'] = 'active';					
			break;
		case 'agencies':
			$flash_curtain_classes[0]['spacer'] = 'static';
			$flash_curtain_classes[1]['item'] = 'active';			
			$flash_curtain_classes[1]['spacer'] = 'active';
			break;
		case 'tech':		
			$flash_curtain_classes[0]['spacer'] = 'static';						
			$flash_curtain_classes[1]['spacer'] = 'static';
			$flash_curtain_classes[2]['item'] = 'active';			
			$flash_curtain_classes[2]['spacer'] = 'active';
			break;
		case 'tech':		
			$flash_curtain_classes[0]['spacer'] = 'static';						
			$flash_curtain_classes[1]['spacer'] = 'static';
			$flash_curtain_classes[2]['item'] = 'active';			
			$flash_curtain_classes[2]['spacer'] = 'active';
			break;
		case 'news':		
			$flash_curtain_classes[0]['spacer'] = 'static';						
			$flash_curtain_classes[1]['spacer'] = 'static';					
			$flash_curtain_classes[2]['spacer'] = 'static';
			$flash_curtain_classes[3]['item'] = 'active';
			$flash_curtain_classes[3]['spacer'] = 'active';
			break;
		case 'contacts':		
			$flash_curtain_classes[0]['spacer'] = 'static';						
			$flash_curtain_classes[1]['spacer'] = 'static';					
			$flash_curtain_classes[2]['spacer'] = 'static';
			$flash_curtain_classes[3]['spacer'] = 'static';
			$flash_curtain_classes[4]['item'] = 'active';			
			$flash_curtain_classes[4]['spacer'] = 'active';
			break;
	}
	?>
	<div class="flash-curtain">
      <div class="flash-curtain__item flash-curtain__item--<?=$flash_curtain_classes[0]['item'] ?>">
          <span>Мы</span>
      </div>
      <div class="flash-curtain__item flash-curtain__spacer flash-curtain__spacer--<?= $flash_curtain_classes[0]['spacer'] ?>"></div>
      <div class="flash-curtain__item flash-curtain__item--<?=$flash_curtain_classes[1]['item'] ?>">
          <span>Агентства</span>
      </div>
      <div class="flash-curtain__item flash-curtain__spacer flash-curtain__spacer--<?=$flash_curtain_classes[1]['spacer'] ?>"></div>
      <div class="flash-curtain__item flash-curtain__item--<?=$flash_curtain_classes[2]['item'] ?>">
          <span>Технологии</span>
      </div>
      <div class="flash-curtain__item flash-curtain__spacer flash-curtain__spacer--<?=$flash_curtain_classes[2]['spacer'] ?>"></div>
      <div class="flash-curtain__item flash-curtain__item--<?=$flash_curtain_classes[3]['item'] ?>">
          <span>Журнал</span>
      </div>
      <div class="flash-curtain__item flash-curtain__spacer flash-curtain__spacer--<?=$flash_curtain_classes[3]['spacer'] ?>"></div>
      <div class="flash-curtain__item flash-curtain__item--<?=$flash_curtain_classes[4]['item'] ?>">
          <span>Контакты</span>
      </div>     
      <div class="flash-curtain__item flash-curtain__spacer flash-curtain__spacer--last"></div>
</div>
<?
}
function get_cool_menu_desktop()
{
    $menu_items = array(
        "/" => "Мы",
        "/agencies" => "Агентства",
        "/tech" => "Технологии",
        "/news" => "Журнал",
        "/contacts" => "Контакты"
    );
    $c = get_the_category();
    if (!$c) {
        $current_page = parse_url(get_page_link(), PHP_URL_PATH);
    } else {
        $current_page = '/' . $c[0]->slug;
    }

    if (is_page() || is_category()) {
        ?>
        <div class="menu black">
            <div class="menu_left"><?
                $d = 'r';
                foreach ($menu_items

                as $key => $item) {
                if ($current_page == $key) { ?>
                <a data-cool-transition-top="<?= $d ?>" class="this" href="<?= $key ?>"><span
                            class="title"><?= $item ?></span></a>
            </div>
            <div class="menu_right">
                <?
                $d = 'l';
                }
                else {
                    ?>
                    <a data-cool-transition-top="<?= $d ?>" href="<?= $key ?>"><span
                                class="title"><?= $item ?></span></a>
                    <?
                }
                }
                ?>
            </div>
        </div>
        <?
    }
}

function get_cool_menu_mobile()
{
    $menu_items = array(
        "/" => "Мы",
        "/agencies" => "Агентства",
        "/tech" => "Технологии",
        "/news" => "Журнал",
        "/contacts" => "Контакты"
    );
    $current_page = parse_url(get_page_link(), PHP_URL_PATH);
    if (is_page()) {
        ?>
        <div class="menu_m__list"><?
            foreach ($menu_items as $key => $item) {
                if ($current_page == $key) {
                    ?>
                    <a data-cool-transition-top class="menu_m__item menu_m__item--this"
                       href="<?= $key ?>"><?= $item ?></a>
                    <?
                } else {
                    ?>
                    <a data-cool-transition-top class="menu_m__item" href="<?= $key ?>"><?= $item ?></a>
                    <?
                }
            }
            ?>
        </div>
        <?
    }
}

function my_wp_is_mobile()
{
    static $is_mobile;

    if (isset($is_mobile))
        return $is_mobile;

    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        $is_mobile = false;
    } elseif (
        strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
        $is_mobile = false;
    } else {
        $is_mobile = false;
    }

    return $is_mobile;
}

remove_filter('the_content', 'wpautop');