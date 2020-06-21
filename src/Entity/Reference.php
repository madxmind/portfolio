<?php

namespace App\Entity;

use App\Repository\ReferenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ReferenceRepository::class)
 */
class Reference
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"get"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     * @Groups({"get"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     * @Groups({"get"})
     */
    private $company;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     * @Groups({"get"})
     */
    private $description;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     * @Groups({"get"})
     */
    private $startedAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     * @Groups({"get"})
     */
    private $endedAt;

    /**
     * @ORM\OneToMany(targetEntity=Media::class, mappedBy="reference", cascade={"persist"}, orphanRemoval=true)
     * @Assert\Count(min = 1, minMessage = "Au moins 1 images requise")
     * @Groups({"get"})
     */
    private $medias;

    public function __construct()
    {
        $this->medias = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStartedAt(): ?\DateTimeImmutable
    {
        return $this->startedAt;
    }

    public function setStartedAt(\DateTimeImmutable $startedAt): self
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getEndedAt(): ?\DateTimeImmutable
    {
        return $this->endedAt;
    }

    public function setEndedAt(?\DateTimeImmutable $endedAt): self
    {
        $this->endedAt = $endedAt;

        return $this;
    }

    /**
     * @return Collection|Media[]
     */
    public function getMedias(): Collection
    {
        return $this->medias;
    }

    public function addMedia(Media $media): self
    {
        if (!$this->medias->contains($media)) {
            $this->medias[] = $media;
            $media->setReference($this);
        }

        return $this;
    }

    public function removeMedia(Media $media): self
    {
        if ($this->medias->contains($media)) {
            $this->medias->removeElement($media);
            // set the owning side to null (unless already changed)
            if ($media->getReference() === $this) {
                $media->setReference(null);
            }
        }

        return $this;
    }
}
