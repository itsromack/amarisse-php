<?php

namespace Raw\Core;

class URLParser
{
    const DEFAULT_CONTROLLER = 'Index';
    const DEFAULT_METHOD = 'index';

    public static function parse()
    {
        $controller = self::DEFAULT_CONTROLLER;
        $method = self::DEFAULT_METHOD;

        $second_pos_slash = null;
        $third_pos_slash = null;

        $uri = $_SERVER['REQUEST_URI'];
        if (strlen($uri) > 1) {
            $controller = self::getStringBetweenSlashes($uri);
            if (!empty($controller)) {
                $controller = ucfirst($controller);
            }
            $method = self::getStringBetweenSlashes(substr($uri, strlen($controller) + 1));
            if (empty($method)) {
                $method = self::DEFAULT_METHOD;
            }
        }

        return [
            'host' => $_SERVER['HTTP_HOST'],
            'path' => $_SERVER['REQUEST_URI'],
            'controller' => self::getControllerName($controller),
            'method' => $method
        ];
    }

    public static function getStringBetweenSlashes($str)
    {
        $result = '';
        if ($str[0] !== '/') return false;
        $str = substr($str, 1);
        $slash_pos = strpos($str, '/');
        if ($slash_pos !== false) {
            $result = substr($str, 0, $slash_pos);
        } else {
            $result = substr($str, 0);
        }

        return $result;
    }

    public static function getControllerName($controller)
    {
        return $controller . 'Controller';
    }
}