<?php

namespace ShopApi\V1\Repository;

use ShopApi\V1\Model\Producer;
use ShopApi\V1\Mapper\ProducerMapper;

final class ProducerRepository extends AbstractRepository
{
    private const string MAIN_URI = '/producers';

    public function createOne(Producer $producer): Producer
    {
        $response = $this->apiClient->sendPostRequest(self::MAIN_URI, ProducerMapper::createRequestFromModel($producer));

        return ProducerMapper::singleFromApi($response);
    }

    public function getAll(): array
    {
        $response = $this->apiClient->sendGetRequest(self::MAIN_URI);

        return ProducerMapper::collectionFromApi($response);
    }
}
