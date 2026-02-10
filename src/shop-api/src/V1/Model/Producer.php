<?php

namespace ShopApi\V1\Model;

final class Producer
{
    // Dokumentacja nie pozwala na null'e ale w rzeczywistości jest inaczej
    public function __construct(
        public ?int $id,
        public ?string $name,
        public ?string $siteUrl,
        public ?string $logoFilename,
        public ?int $ordering,
        public ?string $sourceId,
    ) {
    }
}
