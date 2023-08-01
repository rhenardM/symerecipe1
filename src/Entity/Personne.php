<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
class Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length (min :2, max: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length (min :2, max: 50)]
    private ?string $postNom = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length (min :2, max: 50)]
    private ?string $prenom = null;

    #[ORM\Column(nullable: true)]
    #[Assert\NotBlank()]
    #[Assert\Positive()]
    #[Assert\LessThan(80)]
    private ?int $Age = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    #[Assert\Positive()]
    #[Assert\LessThan(11)]
    private ?int $telephone = null;

    #[ORM\Column(length: 50)]
    private ?string $function = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $createdAt = null;

     /**
     * constructeur 
     */

     function __construct() 
     {
         $this->createdAt = new \DateTimeImmutable();    
     }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPostNom(): ?string
    {
        return $this->postNom;
    }

    public function setPostNom(string $postNom): static
    {
        $this->postNom = $postNom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(?int $Age): static
    {
        $this->Age = $Age;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getFunction(): ?string
    {
        return $this->function;
    }

    public function setFunction(string $function): static
    {
        $this->function = $function;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
