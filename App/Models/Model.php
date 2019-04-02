<?php

namespace App\Models;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Model {

    protected $entityManager = null;
    public function __construct() {
        
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), getenv('DEBUG'));
                
        // database configuration parameters
        $conn = array(
            'driver' => getenv('DB_CONNECTION'),
            'host' => getenv('DB_HOST'),
            'port' => getenv('DB_PORT'),
            'dbname' => getenv('DB_DATABASE'),
            'user' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),            
        );
        var_dump($conn);
        $this->entityManager = EntityManager::create($conn, $config);
    }
}