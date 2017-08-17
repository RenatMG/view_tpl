<?php
require_once 'config' . DIRECTORY_SEPARATOR . 'config.php';
require_once 'data' . DIRECTORY_SEPARATOR . 'page_data.php';
require_once 'view_class.php';


$html = new View(TEMPLATE_ROOT);


$data = [
    'article' => 'Привет Мир!!!!',
    'menu' => $html->render('menu', $menuData),
    'auth' => $html->render('auth'),
    'topic' => $html->render('topic', $topicData),
    'main_topic' => $html->render('main_topic'),
    'tp' => $html->render('topic_pagination', $tpData),
    'search' => $html->render('search'),
];
echo $html->render('main', $data);

