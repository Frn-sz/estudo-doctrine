<?php

use Fernando\Doctrine\Entity\Student;
use Fernando\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';


$entityManager = EntityManagerFactory::createEntityManager();

$studentRepo = $entityManager->getRepository(Student::class);

$student = $studentRepo->find($argv[1]);
$student->name = $argv[2];

$entityManager->flush();
