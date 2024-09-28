<?php

namespace Fernando\Doctrine\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;

#[Entity]
class Course
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[ManyToMany(Student::class, mappedBy: "courses")]
    public Collection $students;

    public function __construct(
        #[Column]
        public readonly string $name
    )
    {

    }

    /**
     * @return Collection<Student>
     */
    public function students(): Collection
    {
        return $this->students;
    }

    public function addStudent(Student $student): void
    {
        if ($this->students->contains($student))
            return;

        $this->students->add($student);
        $student->enrollInCourse($this);
    }


}