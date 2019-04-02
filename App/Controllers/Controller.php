<?php

namespace App\Controllers;

use Jenssegers\Blade\Blade;

class Controller {
    
    protected $blade = null;

    public function __construct() {
        $this->blade = new Blade('/var/www/composer/Resources/Views', '/var/www/composer/App/Storage/Cache/Views');
    }
}