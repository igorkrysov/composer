<?php

namespace App\Controllers;

use App\Models\User;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use App\Utils\DoctrineProvider;
use App\Utils\Dump;

class UserController extends Controller{
    
    private $entityManager = null;

    public function __construct() {
        parent::__construct();
        $doctrineProvider = DoctrineProvider::getInstance();
        $this->entityManager = $doctrineProvider->getEntityManager();
    }

    public function getUsers() {
        // $user = new User();
        // $user->connect();
        // $users = $user->getUsers();
        // return new View('User/list.php', ['users' => $users]);

        $qb = $this->entityManager->createQueryBuilder();
        $qb->select('u')->from('User', 'u')
            ->orderBy('u.name', 'ASC');
        $query = $qb->getQuery();
        $result = $query->getScalarResult();        
        
        echo $this->blade->make('users', ['users' => $result]);
    }

    public function getUser() {
        $user = $this->entityManager->find(User::class, 1);        
        // Dump::printDie($user->getPosts()->getValues());
        echo $this->blade->make('user', ['user' => $user]);
    }

    public function createUser() {
        echo 'createUser<br>';
        $user = new User();
        $user->setName("Steave");
        $user->setEmail('steave@mail.com');

        
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        echo 'createdUser<br>';
    }

}