<?php

//require_once 'autoload.php';
require_once 'View.php';


try {
    $inst = View::run();
    $data = [
        'article' => 'Привет Мир!!!!',
        'menu' => $inst->render('menu', $menuData),
        'auth' => $inst->render('auth'),
        'topic' => $inst->render('topic', $topicData),
        'main_topic' => $inst->render('main_topic', array('text' => 'Helooooo'), 1),
        'tp' => $inst->render('topic_paggination', $tpData),
        'search' => $inst->render('search'),
    ];
    echo $inst->render('main', $data);

} catch (Exception $e){
    echo 'Ошибка: '. $e->getMessage().'<br>';
    if(DEV_MODE){
        echo 'Ошибка в файле: '. $e->getFile().'<br>';
        echo 'Ошибка в строке: '. $e->getLine().'<br>';
        echo 'Код ошибки: '.$e->getCode().'<br>';
    }

}