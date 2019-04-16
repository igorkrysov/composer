<?php

namespace App\Controllers;

use Jenssegers\Blade\Blade;

class Controller {
    
    protected $blade = null;

    public function __construct() {
        $root = __DIR__ . "/../../";
        // var_dump($root . 'Resources/Views');
        // die();
        $this->blade = new Blade($root . 'Resources/Views', $root.'App/Storage/Cache/Views');
    }
}