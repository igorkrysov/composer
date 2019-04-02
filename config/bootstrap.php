<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Dotenv\Dotenv;
use App\Utils\DoctrineProvider;

echo __DIR__ . "/../vendor/autoload.php\n";
require_once __DIR__ . "/../vendor/autoload.php";

$doctrineProvider = DoctrineProvider::getInstance();
// $dotenv = Dotenv::create(__DIR__ . "/../");
// $dotenv->load();


// // $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/../App/Models/"), getenv('DEBUG'));
// // $config = Setup::createXMLMetadataConfiguration(array(__DIR__ . "//xml//"), getenv('DEBUG'));
// $config = Setup::createYAMLMetadataConfiguration(array(__DIR__ . "/yaml"), getenv('DEBUG'));
                
// // database configuration parameters
// $conn = array(
//     'driver' => getenv('DB_CONNECTION'),
//     'host' => getenv('DB_HOST'),
//     'port' => getenv('DB_PORT'),
//     'dbname' => getenv('DB_DATABASE'),
//     'user' => getenv('DB_USERNAME'),
//     'password' => getenv('DB_PASSWORD'),            
// );

// $entityManager = EntityManager::create($conn, $config);