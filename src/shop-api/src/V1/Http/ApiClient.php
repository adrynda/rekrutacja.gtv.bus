<?php

namespace ShopApi\V1\Http;

use Throwable;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\RequestFactoryInterface;
use ShopApi\V1\Exception\ApiClientRequestException;


final class ApiClient
{
    protected ApiResponseValidator $apiResponseValidator;

    public function __construct(
        protected readonly ApiConfig $apiConfig,
        protected readonly ClientInterface $client,
        protected readonly RequestFactoryInterface $requestFactory,
    ) {
        $this->apiResponseValidator = new ApiResponseValidator();
    }

    public function sendGetRequest(string $uri, array $queryParams = []): array
    {
        if (!empty($queryParams)) {
            $separator = str_contains($uri, '?') ? '&' : '?';
            $uri .= $separator . http_build_query($queryParams);
        }

        $request = $this->createRequest('GET', $uri);

        return $this->sendRequest($request);
    }

    public function sendPostRequest(string $uri, array $data = []): array
    {
        $request = $this->createRequest('POST', $uri);

        if (!empty($data)) {
            $request->getBody()->write(json_encode($data));
            $request->withHeader('Content-Type', 'application/json');
        }

        return $this->sendRequest($request);
    }

    private function createRequest(string $method, string $uri): RequestInterface
    {
        return $this->requestFactory
            ->createRequest($method, $this->apiConfig->apiUrl . $uri)
            ->withHeader(
                'Authorization',
                'Basic ' . base64_encode(
                    sprintf(
                        '%s:%s',
                        $this->apiConfig->login,
                        $this->apiConfig->password,
                    ),
                ),
            )
        ;
    }

    private function sendRequest(RequestInterface $request): array
    {
        try {
            $response = $this->client->sendRequest($request);
        } catch (Throwable $e) {
            throw new ApiClientRequestException($e->getMessage(), $e->getCode(), $e);
        }

        $this->apiResponseValidator->validateResponse($response);

        $responseData = json_decode($response->getBody()->getContents(), true);

        return $responseData;
    }
}
