<?php

class HelperHtml
{
    public static function secureParams($variables)
    {
        if (is_array($variables)) {
            foreach ($variables as $key => $value) {
                if (is_array($value)) {
                    self::secureParams($value);
                } else {
                    $value = self::xss($value);
                }
            }
        } else $variables = self::xss($variables);
        return $variables;
    }

    protected static function xss($string)
    {
        $string = strip_tags($string);
        $string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
        $string = htmlentities($string);
        $string = html_entity_decode($string);
        return $string;
    }

    public static function getArrayData($key, $value)
    {
        $array = [
            $key => $value,
        ];
        return $array;
    }

}