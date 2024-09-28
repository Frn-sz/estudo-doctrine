<?php

namespace Fernando\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Student
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: 'integer')]
    public int $id;

    #[OneToMany(targetEntity: Phone::class, mappedBy: 'student', cascade: ['persist', 'remove'])]
    private iterable $phones;

    #[ManyToMany(targetEntity: Course::class, inversedBy: 'students')]
    public Collection $courses;

    public function __construct(
        #[Column(type: 'string')]
        public string    $name,
        #[Column(type: 'string')]
        public string    $email,
        #[Column(type: 'date')]
        public \DateTime $birthDate
    )
    {
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function addPhone(Phone $phone): void
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }

    /**
     * @return Collection<Phone>
     */
    public function phones(): Collection
    {
        return $this->phones;
    }

    /**
     * @return Collection<Course>
     */
    public function courses(): Collection
    {
        return $this->courses;
    }

    public function enrollInCourse(Course $course): void
    {
        if ($this->courses->contains($course))
            return;

        $this->courses->add($course);
        $course->addStudent($this);
    }
}
