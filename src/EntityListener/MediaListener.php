<?php

namespace App\EntityListener;

use App\Entity\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Uid\Uuid;

class MediaListener
{
    private $uploadDir;
    private $uploadAbsoluteDir;

    public function __construct(string $uploadDir, string $uploadAbsoluteDir)
    {
        $this->uploadDir = $uploadDir;
        $this->uploadAbsoluteDir = $uploadAbsoluteDir;
    }


    /**
     * @param  Media $media
     * @return void
     */
    public function prePersist(Media $media): void
    {
        $this->upload($media);
    }

    /**
     * @param  Media $media
     * @return void
     */
    public function preUpdate(Media $media): void
    {
        $this->upload($media);
    }

    /**
     * @param  Media $media
     * @return void
     */
    public function upload(Media $media): void
    {
        if ($media->getFile() instanceof UploadedFile) {
            $filename = Uuid::v4() . '.' . $media->getFile()->getClientOriginalExtension();
            $media->getFile()->move($this->uploadAbsoluteDir, $filename);
            $media->setPath($this->uploadDir . '/' . $filename);
        }
    }
}
