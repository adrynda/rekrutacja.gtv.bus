# Shop API - Zadanie Rekrutacyjne

Implementacja klienta REST API dla systemu zarządzania sklepem, enpoint'y dotyczące producentów: CreateOne oraz GetAll.

## 🚀 Instalacja

```bash
composer install
composer dump-env dev
```

## ⚙️ Konfiguracja

Ustaw dane dostępowe do API w pliku `.env`:

```env
SHOP_API_URL=https://your-api-domain.com
SHOP_API_LOGIN=rest
SHOP_API_PASSWORD=vKTUeyrt1!
```

## 💻 Użycie

### Komendy konsolowe

#### Pobranie wszystkich producentów

```bash
php bin/console shop-api:producers:get-all
```

Pobiera i wyświetla wszystkich producentów z API.

#### Utworzenie producenta

```bash
php bin/console shop-api:producers:create-one
```

Interaktywna komenda z formularzem do utworzenia nowego producenta. System poprosi o wprowadzenie:
- Identyfikatora
- Nazwy producenta
- Adresu URL strony
- Nazwy pliku logo
- Kolejności
- Source ID

## 👤 Autor

Aleksander Drynda
