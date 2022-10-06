<?php

namespace App\Entity\Public;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity()]
class ApplicationEntity
{

    #[Id]
    #[GeneratedValue]
    #[Column]
    protected int $id;
    #[Column]
    protected string $name;
    #[Column]
    protected string $discord;
    #[Column]
    protected int $age;
    #[Column]
    protected string $email;
    #[Column]
    protected string $about;
    #[Column]
    protected string $qualities;
    #[Column(nullable: true)]
    protected string $comments;

    /**
     * @return
     */


    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDiscord() : string
    {
        return $this->discord;
    }

    /**
     * @param mixed $discord
     */
    public function setDiscord($discord): void
    {
        $this->discord = $discord;
    }

    /**
     * @return mixed
     */
    public function getAge() : string
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAbout() : string
    {
        return $this->about;
    }

    /**
     * @param mixed $about
     */
    public function setAbout($about): void
    {
        $this->about = $about;
    }

    /**
     * @return mixed
     */
    public function getQualities() : string
    {
        return $this->qualities;
    }

    /**
     * @param mixed $qualities
     */
    public function setQualities($qualities): void
    {
        $this->qualities = $qualities;
    }

    /**
     * @return mixed
     */
    public function getComments() : string
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


}