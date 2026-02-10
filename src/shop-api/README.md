# Shop API PHP SDK

PHP SDK do komunikacji z Shop API (wersja v1).  
Biblioteka została zaprojektowana jako niezależny pakiet vendor (framework-agnostic) z myślą o łatwej rozbudowie o kolejne modele i endpointy API.

---

## Lokalizacja kodu

Kod SDK znajduje się w katalogu `src/` głównego projektu, jednak został zaprojektowany tak, jakby miał zostać wydzielony do osobnego pakietu vendor (Composer package).

Architektura opiera się na:
- abstrakcjach i separacji warstw,
- zgodności ze standardami PSR,
- braku bezpośrednich zależności od frameworka,
- wersjonowaniu API w strukturze katalogów.

Dzięki temu moduł może zostać łatwo wyodrębniony do osobnego repozytorium i opublikowany jako niezależny pakiet Composer.

---

## ✨ Funkcjonalności

- Zgodność z PSR-4 (autoload)
- Wsparcie dla PSR-18 (HTTP Client)
- Wsparcie dla PSR-17 (Request Factory)
- Modele danych (DTO)
- Warstwa Repository dla endpointów API
- Mappery do mapowania payloadów API ↔ modele
- Centralna walidacja odpowiedzi API
- Dedykowane wyjątki dla kodów błędów API
- Struktura wersjonowana (`V1`, przyszłe `V2`)
- Architektura niezależna od frameworka

---

## 🧩 Wymagania

- PHP 8.1+
- Implementacja PSR-18 HTTP Client (np. Guzzle, Symfony HttpClient, HTTPlug)
- Implementacja PSR-17 Request Factory

---

## 📦 Instalacja

W celu wydzielenia SDK jako osobnego pakietu wystarczy przenieść katalog `src/shop-api` do osobnego repozytorium i dodać konfigurację `composer.json` z PSR-4 autoloadingiem.

---

## ⚙️ Użycie

Paczka pozwala na operacje dodawania nowego oraz pobranie listy wcześniej dodanych producentów. Do skorzystania z "SDK" potrzebna jest konfiguracja

### ShopApi\V1\Http\ApiConfig

 - `$apiUrl` - domena API
 - `$login` - login dostępu do API
 - `$password` - hasło dostępu do API

### ShopApi\V1\Http\ApiClient

 - `$apiConfig` - `ShopApi\V1\Http\ApiConfig`
 - `$client` - `Psr\Http\Client\ClientInterface`
 - `$requestFactory` - `Psr\Http\Message\RequestFactoryInterface`

### ShopApi\V1\Repository\ProducerRepository

 - `$apiClient` - `ShopApi\V1\Http\ApiClient`
 
 Repozytorium pozwala na wykonanie operacji:
 - `createOne(Producer $producer)` - utwórz nowego producenta
 - `public function getAll()` - pobierz listę producentó, zwraca `Producer[]`

 ### ShopApi\V1\Model\Producer

 - `$id`
 - `$name`
 - `$siteUrl`
 - `$logoFilename`
 - `$ordering`
 - `$sourceId`

 Jest obiektem reprezentującym producenta w API.

### Przykładowe użycie

```
use ShopApi\V1\Http\ApiConfig;
use ShopApi\V1\Http\ApiClient;
use ShopApi\V1\Repository\ProducerRepository;

...

$apiConfig = new ApiConfig(/* odpowiednie dane */);
$apiClient = new ApiClient($apiConfig, /* wybrane paczki */);
$producerRepository = new ProducerRepository($apiClient);

// pobranie listy producentó
$list = $producerRepository->getAll();

// dodanie nowego producenta
$producer = new Producer(
    id: 5,
    name: 'name',
    siteUrl: 'site url',
    logoFilename: 'logo filename',
    ordering: 11,
    sourceId: 'source id',
);
$producerRepository->createOne($producer);
```

## 🚀 Rozbudowa

Dodanie nowego zasobu (np. Category):
1. Stwórz `Model/Category.php`
2. Stwórz `Mapper/CategoryMapper.php`  
3. Stwórz `Repository/CategoryRepository.php` extends `AbstractRepository`
