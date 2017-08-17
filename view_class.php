<?php

require_once 'config/config.php';

class View
{
    protected $tpl_dir;

    public function __construct($tpl_dir)
    {
        $this->tpl_dir = $tpl_dir;
    }

    public function secureParams($variables)
    {
        foreach ($variables as $key => $value) {
            if (is_array($value)) {
                $this->secureParams($value);
            } else {
                $variables[$key] = htmlspecialchars(strip_tags($value));
            }
        }
        return $variables;
    }

    private function getTemplate($templateName)
    {
        $template = $this->tpl_dir . $templateName . '.tpl.php';
        if (!is_file($template)) {
            echo 'File ' . $templateName . '.tpl.php not found!';
            exit(ERROR_NOT_FOUND);
        }
        if (filesize($template) === 0) {
            echo 'File ' . $templateName . '.tpl.php is empty!';
            exit(ERROR_TEMPLATE_EMPTY);
        }
        return $template;
    }


    public function getArrayData($key, $value)
    {
        $array = [
            $key => $value,
        ];
        return $array;
    }

    public function render($templateName, $variables = [])
    {
        $template = $this->getTemplate($templateName);
        ob_start();
        extract($variables);
        require $template;
        return ob_get_clean();
    }

}