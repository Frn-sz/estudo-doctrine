<?php

use Fernando\Doctrine\Entity\Student;
use Fernando\Doctrine\Entity\Phone;
use Fernando\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$em = EntityManagerFactory::createEntityManager();

// Criação do estudante
$student = new Student($argv[1], $argv[2], new DateTime($argv[3]));

// Criação de telefones
$phones = [
    new Phone("5599006721"),
    new Phone("5599991234"),
    new Phone("5598885678")
];

// Adiciona os telefones ao estudante
foreach ($phones as $phone) {
    $student->addPhone($phone);
}

// Persiste o estudante e seus telefones
$em->persist($student);

// Fluxo de dados
echo "Criando estudante com " . count($phones) . " telefones.\n";
echo "Nome: {$student->name}\n";


// Salva os dados no banco de dados
try {
    $em->flush();
    echo "Dados salvos com sucesso!\n";
} catch (\Doctrine\ORM\OptimisticLockException $e) {
    echo "Erro de bloqueio otimista: " . $e->getMessage();
} catch (\Doctrine\ORM\Exception\ORMException $e) {
    echo "Erro na ORM: " . $e->getMessage();
} catch (\Doctrine\DBAL\Exception\NotNullConstraintViolationException $e) {
    echo "Erro inesperado: " . $e->getMessage();
}
