<?php

namespace App\Utils;

class Dump {
    public static function print($var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }

    public static function printDie($var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
        die();
    }
}