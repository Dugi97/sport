<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SportRepository")
 */
class Sport
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Athlete", mappedBy="sport")
     */
    private $athlete;

    public function __construct()
    {
        $this->athlete = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Athlete[]
     */
    public function getAthlete(): Collection
    {
        return $this->athlete;
    }

    public function addAthlete(Athlete $athlete): self
    {
        if (!$this->athlete->contains($athlete)) {
            $this->athlete[] = $athlete;
            $athlete->setSport($this);
        }

        return $this;
    }

    public function removeAthlete(Athlete $athlete): self
    {
        if ($this->athlete->contains($athlete)) {
            $this->athlete->removeElement($athlete);
            // set the owning side to null (unless already changed)
            if ($athlete->getSport() === $this) {
                $athlete->setSport(null);
            }
        }

        return $this;
    }
}
