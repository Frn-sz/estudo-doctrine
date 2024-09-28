<?php

use Fernando\Doctrine\Entity\Student;
use Fernando\Doctrine\Entity\Phone;
use Fernando\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$em = EntityManagerFactory::createEntityManager();

$course = new \Fernando\Doctrine\Entity\Course($argv[1]);

$em->persist($course);

$em->flush();