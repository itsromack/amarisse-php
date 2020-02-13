<?php

namespace Raw\Core;

class Template
{
    /**
     * @param String $template_file
     * @param Array $params
     */
    public static function render($template_file, $params)
    {
        return self::applyParamsToTemplate('self::display', $template_file, $params);
    }

    /**
     * @param String $template_file
     * @param Array $params
     */
    public static function display($template_file, $params)
    {
        extract($params);
        include $template_file;
    }

    /**
     * @link https://stackoverflow.com/questions/1312300/how-to-pass-parameters-to-php-template-rendered-with-include
     */
    public static function applyParamsToTemplate($fn)
    {
        $args = func_get_args();
        unset($args[0]);

        ob_start();
        call_user_func_array($fn, $args);
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}