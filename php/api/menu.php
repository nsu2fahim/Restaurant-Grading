<?php require('../lib/simple_html_dom.php') ?>
<?php 
    //li.blocked__content__body__grid__item
    $restaurant_link = $_GET['res_link'];
    $final_menu = [];
    $html = file_get_html($restaurant_link);
    foreach ($html->find('li.blocked__content__body__grid__item') as $menu) {
        $menuDetails = $menu->find('a', 0);
        $final_menu[] = $menuDetails->href;
    }
    echo(json_encode($final_menu, JSON_UNESCAPED_SLASHES));
?>