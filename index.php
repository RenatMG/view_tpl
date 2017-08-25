<?php
require_once 'autoload.php';
define('DEV_MODE', true); // мод для разработчика, true/false
try {
    $page = View::run();
//    View::tmplDirRegister('template_directory');

    // Тестовые данные
    $menuData = [
        'menu' => [
            'Topic_1', 'Topic_2', 'Topic_3', 'Topic_4',
        ]
    ];
    $topicData = [
        'topic' => [
            'About', 'Contacts', 'Price',
        ]
    ];
    $tpData = [
        'tp' => [
            '1', '2', '3', '4', '<h2>5</h2>', // Здесь мы применим обработчик HelperHtml
        ]
    ];

    $data = [
        'article' => 'Привет Мир!!!!',
        'header' => $page->render('header', array('shop_name'=>'MyShop'), 1), // Здесь мы применяем тип переменных по подобию Twig
        'menu' => $page->render('menu', $menuData),
        'auth' => $page->render('auth'),
        'topic' => $page->render('topic', $topicData),
        'main_topic' => $page->render('main_topic', array('article_1'=>'This is my topic!','article_2'=>'This is my topic too!')),
        'tp' => $page->render('topic_pagination', $tpData),
        'search' => $page->render('search'),
    ];
    // рендер основного шаблона
    echo $page->render('main', $data);

} catch (Exception $e){
    echo 'Ошибка: '. $e->getMessage().'<br>';
    if(DEV_MODE){
        echo 'Ошибка в файле: '. $e->getFile().'<br>';
        echo 'Ошибка в строке: '. $e->getLine().'<br>';
        echo 'Код ошибки: '.$e->getCode().'<br>';
    }
}