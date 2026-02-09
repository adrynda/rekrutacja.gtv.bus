<?php

namespace ShopApi\V1\Mapper;

use ShopApi\V1\Model\Producer;

final class ProducerMapper
{
    public static function collectionFromApi(array $list): array
    {
        $collection = [];

        foreach ($list as $item) {
            $collection[] = self::singleFromApi($item);
        }
        
        return $collection;
    }

    public static function singleFromApi(array $item): Producer
    {
        return new Producer(
            id: $item['id'],
            name: $item['name'],
            siteUrl: $item['site_url'],
            logoFilename: $item['logo_filename'],
            ordering: $item['ordering'],
            sourceId: $item['source_id'],
        );
    }
    
    public static function createRequestFromModel(Producer $producer): array
    {
        // todo: walidacja ???
        return [
            'producer' => [
                'id' => $producer->id,
                'name' => $producer->name,
                'site_url' => $producer->siteUrl,
                'logo_filename' => $producer->logoFilename,
                'ordering' => $producer->ordering,
                'source_id' => $producer->sourceId,
            ],
        ];
    }
}
