shop-api/
├── README.md
└── src/
    ├── V1/
    │   ├── Exception/ # ShopApi\Shared\Exception\ShopApiException
    │   │   ├── ApiClientRequestException.php
    │   │   ├── ApiNotFoundException.php
    │   │   ├── ApiVersionNotFoundException.php
    │   │   ├── InternalServerErrorException.php
    │   │   ├── InvalidDataForObjectException.php
    │   │   ├── InvalidLangCodeInQueryStringException.php
    │   │   ├── InvalidRequestDataException.php
    │   │   ├── MalformedRequestBodyException.php
    │   │   ├── ResourceNotFoundException.php
    │   │   ├── RouteNotFoundOrMethodNotAllowedException.php
    │   │   └── UnauthorizedException.php
    │   │
    │   ├── Http/
    │   │   ├── ApiClient.php
    |   |   |   - sendGetRequest()
    |   |   |   - sendPostRequest()
    |   |   |   - createRequest()
    |   |   |   - sendRequest()
    │   │   ├── ApiConfig.php
    |   |   |   - apiUrl
    |   |   |   - login
    |   |   |   - password
    │   │   └── ApiResponseValidator.php
    |   |       - validateResponse()
    │   │
    │   ├── Mapper/
    │   │   └── ProducerMapper.php
    |   |       - fromApiCollection()
    |   |       - fromApi()
    |   |       - toApi()
    │   │
    │   ├── Model/
    │   │   └── Producer.php
    |   |       - id
    |   |       - name
    |   |       - siteUrl
    |   |       - logoFilename
    |   |       - ordering
    |   |       - sourceId
    │   │
    │   └── Repository/
    │       ├── AbstractRepository.php
    │       └── ProducerRepository.php
    |           - createOne()
    |           - getAll()
    │
    └── Shared/
        └── Exception/
            └── ShopApiException.php
