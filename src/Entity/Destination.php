<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DestinationRepository")
 */
class Destination
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
    private $Ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pays;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Latitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Ing;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateCreation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $UpdateDate;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Voyage", mappedBy="Destination")
     */
    private $Voyage_Destination;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photo", mappedBy="destination")
     */
    private $destination_photo;

    public function __construct()
    {
        $this->Voyage_Destination = new ArrayCollection();
        $this->destination_photo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->Pays;
    }

    public function setPays(string $Pays): self
    {
        $this->Pays = $Pays;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->Latitude;
    }

    public function setLatitude(string $Latitude): self
    {
        $this->Latitude = $Latitude;

        return $this;
    }

    public function getIng(): ?string
    {
        return $this->Ing;
    }

    public function setIng(string $Ing): self
    {
        $this->Ing = $Ing;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    public function setDateCreation(\DateTimeInterface $DateCreation): self
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }

    public function getUpdateDate(): ?\DateTimeInterface
    {
        return $this->UpdateDate;
    }

    public function setUpdateDate(\DateTimeInterface $UpdateDate): self
    {
        $this->UpdateDate = $UpdateDate;

        return $this;
    }

    /**
     * @return Collection|Voyage[]
     */
    public function getVoyageDestination(): Collection
    {
        return $this->Voyage_Destination;
    }

    public function addVoyageDestination(Voyage $voyageDestination): self
    {
        if (!$this->Voyage_Destination->contains($voyageDestination)) {
            $this->Voyage_Destination[] = $voyageDestination;
            $voyageDestination->setDestination($this);
        }

        return $this;
    }

    public function removeVoyageDestination(Voyage $voyageDestination): self
    {
        if ($this->Voyage_Destination->contains($voyageDestination)) {
            $this->Voyage_Destination->removeElement($voyageDestination);
            // set the owning side to null (unless already changed)
            if ($voyageDestination->getDestination() === $this) {
                $voyageDestination->setDestination(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Photo[]
     */
    public function getDestinationPhoto(): Collection
    {
        return $this->destination_photo;
    }

    public function addDestinationPhoto(Photo $destinationPhoto): self
    {
        if (!$this->destination_photo->contains($destinationPhoto)) {
            $this->destination_photo[] = $destinationPhoto;
            $destinationPhoto->setDestination($this);
        }

        return $this;
    }

    public function removeDestinationPhoto(Photo $destinationPhoto): self
    {
        if ($this->destination_photo->contains($destinationPhoto)) {
            $this->destination_photo->removeElement($destinationPhoto);
            // set the owning side to null (unless already changed)
            if ($destinationPhoto->getDestination() === $this) {
                $destinationPhoto->setDestination(null);
            }
        }

        return $this;
    }
}
