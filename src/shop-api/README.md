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

