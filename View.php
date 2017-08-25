<?php

use exceptions\TplFileNotFoundException;
use exceptions\TplFileIsEmptyException;

class View
{
    const MODE_NATIVE = 0;
    const MODE_USER = 1;

    /** @var null|self */

    public static $instance = null;
    protected $ext = '.tpl.php';
    protected $tpl_dir = 'tmpl/';


    public static function run()
    {
        if (self::$instance === null)
            self::$instance = new self();
        return self::$instance;
    }

    // метод для выбора расширения файла шаблона, по  умолчанию *.tpl.php
    public static function ext($tpl = '.tpl.php')
    {
        if (self::$instance !== null) {
            self::$instance->ext = $tpl;
        }
    }

    // метод для выбора названия папки с шаблонами, по  умолчанию tmpl
    public static function tmplDirRegister($tpl_dir = 'tmpl')
    {
        self::$instance->tpl_dir = $tpl_dir;
    }

    // метод для выбора шаблона
    private function getTemplate($templateName)
    {

        $template = $this->tpl_dir . $templateName . $this->ext;
        // исключения,  коды 111, 112 для примера
        if (!file_exists($template)) {
            throw new TplFileNotFoundException('File ' . $templateName . $this->ext . ' is not found!', 111);
        }
        if (filesize($template) === 0) {
            throw new TplFileIsEmptyException('File ' . $templateName . $this->ext . ' is empty!', 112);
        }
        return $template;
    }

    // метод для вывода обработанного шаблона в зависимости от типа шаблона
    public function render($templateName, $variables = [], $mode = 0)
    {
        $template = $this->getTemplate($templateName);
        // шаблон основан на чистом php
        if ($mode === self::MODE_NATIVE) {
            ob_start();
            extract($variables);
            require $template;
            return ob_get_clean();
            // шаблон на подобие twig
        } elseif ($mode === self::MODE_USER) {
            $templateContent = file_get_contents($template);
            foreach ($variables as $variable => $value) {
                if ($value != NULL) {
                    $variable = '{{ ' . $variable . ' }}';
                    $templateContent = str_replace($variable, $value, $templateContent);
                }
            }
            return $templateContent;
        } else return false;

    }

    protected function __construct()
    {
    }

    protected function __wakeup()
    {
    }

    protected function __clone()
    {
    }
}