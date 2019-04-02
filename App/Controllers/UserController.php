<?php

namespace App\Controllers;

use App\Models\User;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use App\Utils\DoctrineProvider;

class UserController extends Controller{
    
    public function getUsers() {
        // $user = new User();
        // $user->connect();
        // $users = $user->getUsers();
        // return new View('User/list.php', ['users' => $users]);


        echo $this->blade->make('users', ['users' => ['John Doe', 'Tom Cruse']]);
    }

    public function createUser() {
        echo 'createUser<br>';
        $user = new User();
        $user->setName("Steave");
        $user->setEmail('steave@mail.com');

        $doctrineProvider = DoctrineProvider::getInstance();
        $entityManager = $doctrineProvider->getEntityManager();
        $entityManager->persist($user);
        $entityManager->flush();
        echo 'createdUser<br>';
    }

}