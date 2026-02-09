<?php

namespace ShopApi\V1\Model;

final class Producer
{
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
