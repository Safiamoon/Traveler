<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoyageRepository")
 */
class Voyage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateVoyage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Destination", inversedBy="Voyage_Destination")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Destination;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Photo", inversedBy="Voyage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateVoyage(): ?\DateTimeInterface
    {
        return $this->DateVoyage;
    }

    public function setDateVoyage(\DateTimeInterface $DateVoyage): self
    {
        $this->DateVoyage = $DateVoyage;

        return $this;
    }

    public function getDestination(): ?Destination
    {
        return $this->Destination;
    }

    public function setDestination(?Destination $Destination): self
    {
        $this->Destination = $Destination;

        return $this;
    }

    public function getPhoto(): ?Photo
    {
        return $this->photo;
    }

    public function setPhoto(?Photo $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
