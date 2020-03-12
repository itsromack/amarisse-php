<?php

namespace Raw\Core;

class BaseController
{
    public function get($index)
    {
        return $this->getFromArray($_GET, $index);
    }

    public function post($index)
    {
        return $this->getFromArray($_POST, $index);
    }

    protected function getFromArray($array, $index)
    {
        if (!isset($index))
        {
            return null;
        }
        if (!isset($array))
        {
            return null;
        }
        if (!isset($array[$index]))
        {
            return null;
        }
        $value = $array[$index];

        return $value;
    }
}