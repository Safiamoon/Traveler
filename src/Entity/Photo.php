<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotoRepository")
 */
class Photo
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
    private $DatePhoto;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Voyage", mappedBy="photo")
     */
    private $Voyage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Destination", inversedBy="destination_photo")
     * @ORM\JoinColumn(nullable=false)
     */
    private $destination;

    public function __construct()
    {
        $this->Voyage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePhoto(): ?\DateTimeInterface
    {
        return $this->DatePhoto;
    }

    public function setDatePhoto(\DateTimeInterface $DatePhoto): self
    {
        $this->DatePhoto = $DatePhoto;

        return $this;
    }

    /**
     * @return Collection|Voyage[]
     */
    public function getVoyage(): Collection
    {
        return $this->Voyage;
    }

    public function addVoyage(Voyage $voyage): self
    {
        if (!$this->Voyage->contains($voyage)) {
            $this->Voyage[] = $voyage;
            $voyage->setPhoto($this);
        }

        return $this;
    }

    public function removeVoyage(Voyage $voyage): self
    {
        if ($this->Voyage->contains($voyage)) {
            $this->Voyage->removeElement($voyage);
            // set the owning side to null (unless already changed)
            if ($voyage->getPhoto() === $this) {
                $voyage->setPhoto(null);
            }
        }

        return $this;
    }

    public function getDestination(): ?Destination
    {
        return $this->destination;
    }

    public function setDestination(?Destination $destination): self
    {
        $this->destination = $destination;

        return $this;
    }
}
