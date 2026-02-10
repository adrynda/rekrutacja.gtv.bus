<?php

namespace ShopApi\V1\Http;

use Psr\Http\Message\ResponseInterface;
use ShopApi\V1\Exception\ApiClientRequestException;
use ShopApi\V1\Exception\ApiNotFoundException;
use ShopApi\V1\Exception\ApiVersionNotFoundException;
use ShopApi\V1\Exception\InternalServerErrorException;
use ShopApi\V1\Exception\InvalidDataForObjectException;
use ShopApi\V1\Exception\InvalidLangCodeInQueryStringException;
use ShopApi\V1\Exception\InvalidRequestDataException;
use ShopApi\V1\Exception\MalformedRequestBodyException;
use ShopApi\V1\Exception\ResourceNotFoundException;
use ShopApi\V1\Exception\RouteNotFoundOrMethodNotAllowedException;
use ShopApi\V1\Exception\UnauthorizedException;

class ApiResponseValidator
{
    public function validateResponse(ResponseInterface $response): void
    {
        // // W response'ach z API nie było wrapper'ów dlatego kod jest zakomentowany
        // if ($response->getStatusCode() < 400) {
        //     return;
        // }

        // $responseData = json_decode($response->getBody()->getContents());
        // if (is_string($responseData)) {
        //     throw new ApiClientRequestException($responseData, $response->getStatusCode());
        // }

        // $error = $responseData->error;

        // $exception = match ($error->reason_code) {
        //     'API_NOT_FOUND' => new ApiNotFoundException('', $response->getStatusCode(), messages: $$responseData->messages),
        //     'API_VERSION_NOT_FOUND' => new ApiVersionNotFoundException('', $response->getStatusCode(), messages: $$responseData->messages),
        //     "INTERNAL_SERVER_ERROR" => new InternalServerErrorException('', $response->getStatusCode(), messages: $$responseData->messages),
        //     'INVALID_DATA_FOR_OBJECT' => new InvalidDataForObjectException('', $response->getStatusCode(), messages: $$responseData->messages),
        //     'INVALID_LANG_CODE_IN_QUERY_STRING' => new InvalidLangCodeInQueryStringException('', $response->getStatusCode(), messages: $$responseData->messages),
        //     'INVALID_REQUEST_DATA' => new InvalidRequestDataException('', $response->getStatusCode(), messages: $$responseData->messages),
        //     'MALFORMED_REQUEST_BODY' => new MalformedRequestBodyException('', $response->getStatusCode(), messages: $$responseData->messages),
        //     'RESOURCE_NOT_FOUND' => new ResourceNotFoundException('', $response->getStatusCode(), messages: $$responseData->messages),
        //     'ROUTE_NOT_FOUND_OR_METHOD_NOT_ALLOWED' => new RouteNotFoundOrMethodNotAllowedException('', $response->getStatusCode(), messages: $$responseData->messages),
        //     'UNAUTHORIZED' => new UnauthorizedException('', $response->getStatusCode(), messages: $$responseData->messages),
        //     default => null,
        // };

        // if (!empty($exception)) {
        //     throw $exception;
        // }

        // throw new ApiClientRequestException('Unknown reason code', $response->getStatusCode());
    }
}
