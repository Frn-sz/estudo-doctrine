<?php

use Fernando\Doctrine\Entity\Student;
use Fernando\Doctrine\Entity\Phone;
use Fernando\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$em = EntityManagerFactory::createEntityManager();

$studentId = $argv[1];
$courseId = $argv[2];

$student = $em->find(Student::class, $studentId);
$course = $em->find(\Fernando\Doctrine\Entity\Course::class, $courseId);

$student->enrollInCourse($course);

$em->flush();