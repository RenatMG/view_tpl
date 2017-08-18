<?php

use exceptions;

/**
 * @param $className
 */
function autoload($className){
    $fileName = str_replace('\\', '/', $className) . '.php';
  echo $fileName;
    if (file_exists($fileName)) {
        require_once $fileName;
    }
}

spl_autoload_register('autoload');
require_once 'data' . DIRECTORY_SEPARATOR . 'page_data.php';
require_once 'config' . DIRECTORY_SEPARATOR . 'config.php';


//spl_autoload_register();


/** TODO: autoload **/
/**
 * 1. Пользователь подключает автолоад в своем приложении +
 * 2. Регистрирует дирректорию с шаблонами NameClass::tmplDirRegister('./tmpl')
 * 3. NameClass::ext('tpl.php');
 * 3. NameClass::ext('my.php');
 * 4. NameClass::mode(NATIVE|NEW_MODE);
 * 5. Доступ к методу render(view, variables, mode)
 * 6. Pattern singleton
 * 7. README.md
 * 8. Исключения
 */


//echo $_SERVER['DOCUMENT_ROOT'];


