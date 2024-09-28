<?php

use Fernando\Doctrine\Entity\Student;
use Fernando\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';


$entityManager = EntityManagerFactory::createEntityManager();

$studentRepo = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepo->findAll();

foreach ($studentList as $student) {
  echo "ID: $student->id $student->name\nEmail: $student->email\nData de nascimento: " . $student->birthDate->format('d/m/Y') . PHP_EOL;
}

/** @var Student $s*/
$s = $studentRepo->findOneBy(["name" => "Fernando"]);

echo "Quantidade de estudantes: " . $studentRepo->count();
