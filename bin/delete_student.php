<?php


use Fernando\Doctrine\Entity\Student;
use Fernando\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';


$entityManager = EntityManagerFactory::createEntityManager();

$student = $entityManager->getReference(Student::class, $argv[1]);

try {
    $entityManager->remove($student);
} catch (\Doctrine\ORM\Exception\ORMException $e) {
    echo $e->getMessage();
}

$entityManager->flush();
