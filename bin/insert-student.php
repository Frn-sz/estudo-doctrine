<?php

use Fernando\Doctrine\Entity\Student;
use Fernando\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$em = EntityManagerFactory::createEntityManager();

$student = new Student($argv[1], $argv[2], new DateTime($argv[3]));

try {
    $em->persist($student);
    $em->flush();
} catch (\Doctrine\ORM\OptimisticLockException $e) {
    echo $e->getMessage();
} catch (\Doctrine\ORM\Exception\ORMException $e) {
    echo $e->getMessage();
}
