<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use App\EntityListener\MediaListener;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=MediaRepository::class)
 * @ORM\EntityListeners({MediaListener::class})
 */
class Media
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"get"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"get"})
     */
    private $path;

    /**
     * @Assert\Image
     */
    private $file;

    /**
     * @ORM\ManyToOne(targetEntity=Reference::class, inversedBy="medias")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $reference;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getReference(): ?Reference
    {
        return $this->reference;
    }

    public function setReference(?Reference $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    public function setFile(?UploadedFile $file): self
    {
        $this->file = $file;

        return $this;
    }
}
