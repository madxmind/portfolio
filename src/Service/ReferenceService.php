<?php

namespace App\Service;

use App\Entity\Reference;

class ReferenceService
{
    /**
     * @param  Reference $reference
     * @return void
     */
    public function removeEmptyMedia(Reference $reference)
    {
        foreach ($reference->getMedias() as $media) {
            if ($media->getFile() === null and $media->getPath() === null) {
                $reference->removeMedia($media);
            }
        }
    }
}
