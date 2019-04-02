<?php

require "bootstrap.php";

$entityManager = $doctrineProvider->getEntityManager();
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);