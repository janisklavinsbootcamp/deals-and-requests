<?php


namespace Core;

class View
{
    public static function show(string $path, array $variables = []):void
    {
        extract($variables);
        require 'app/View/' . $path;
    }
}