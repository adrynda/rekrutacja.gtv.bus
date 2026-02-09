<?php

namespace ShopApi\V1\Http;

use Psr\Http\Message\ResponseInterface;

class ApiResponseValidator
{
    public function validateResponse(ResponseInterface $response): void
    {

        if ($response->getStatusCode() < 400) {
            return;
        }
        dd($response, $response->getBody()->getContents());
    }
}
