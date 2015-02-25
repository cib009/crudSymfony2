<?php

namespace CrudBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="student")
 */
class student {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", scale=2)
     */
    protected $surname;



    /**
     * @ORM\ManyToOne(targetEntity="classroom")
     * @ORM\JoinColumn(name="idClassroom", referencedColumnName="id")
     **/
    protected $Classroom;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return student
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return student
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set Classroom
     *
     * @param \CrudBundle\Entity\classroom $classroom
     * @return student
     */
    public function setClassroom(\CrudBundle\Entity\classroom $classroom = null)
    {
        $this->Classroom = $classroom;

        return $this;
    }

    /**
     * Get Classroom
     *
     * @return \CrudBundle\Entity\classroom 
     */
    public function getClassroom()
    {
        return $this->Classroom;
    }
}
