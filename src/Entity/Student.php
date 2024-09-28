<?php

namespace Fernando\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Student
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: 'integer')]
    public int $id;

    public function __construct(
        #[Column(type: 'string')]
        public string             $name,
        #[Column(type: 'string')]
        public string             $email,
        #[Column(type: 'date')]
        public \DateTime $birthDate
    )
    {
    }
}
