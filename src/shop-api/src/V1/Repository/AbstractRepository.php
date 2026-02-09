<?php

namespace ShopApi\V1\Repository;

use ShopApi\V1\Http\ApiClient;

abstract class AbstractRepository
{
    public function __construct(
        public readonly ApiClient $apiClient,
    ) {
    }
}
