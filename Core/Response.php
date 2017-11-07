<?php
namespace Core;


class Response
{

    /**
     * @param $module
     * @param $view
     * @param array $params
     */
    public static function renderView($module, $view, $params = [])
    {
        chdir(dirname(__DIR__));
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        require "UserInterface/View/" . $module . "/" . $view . ".php";
    }
}