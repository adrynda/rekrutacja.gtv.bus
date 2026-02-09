<?php

namespace ShopApi\V1\Http;

final class ApiConfig
{
    public function __construct(
        public readonly string $apiUrl,
        public readonly string $login,
        public readonly string $password,
    ) {
    }
}
