<?php

namespace App\Utils;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Dotenv\Dotenv;

class DoctrineProvider {

    private static $instance = null;

    private $entintyManager = null;

    private function __construct() {
        $dotenv = Dotenv::create(__DIR__ . "/../../");
        $dotenv->load();

        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/../Models/"), getenv('DEBUG'));
        // $config = Setup::createXMLMetadataConfiguration(array(__DIR__ . "//xml//"), getenv('DEBUG'));
        // $config = Setup::createYAMLMetadataConfiguration(array(__DIR__ . "/../../config/yaml"), getenv('DEBUG'));
       // var_dump($config) && die();          
        // database configuration parameters
        $conn = array(
            'driver' => getenv('DB_CONNECTION'),
            'host' => getenv('DB_HOST'),
            'port' => getenv('DB_PORT'),
            'dbname' => getenv('DB_DATABASE'),
            'user' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),            
        );

        $this->entityManager = EntityManager::create($conn, $config);
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getEntityManager() {
        return $this->entityManager;
    }
}