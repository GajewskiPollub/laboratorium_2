# Tworzenie etapu budowania na bazie obrazu php:8.2-cli
FROM php:8.2-cli AS builder

# Ustawienie katalogu roboczego na /app
WORKDIR /app

# Kopiowanie zawartości bieżącego katalogu do katalogu /app w kontenerze
COPY . .

# Kopiowanie pliku composer.json do katalogu /app w kontenerze
COPY composer.json .

# Pobieranie skryptu instalacyjnego Composer'a, instalowanie Composera i usuwanie skryptu instalacyjnego
RUN \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

# Instalowanie zależności projektu za pomocą Composer'a
RUN composer install --no-dev --no-scripts --optimize-autoloader

# Tworzenie etapu finalnego na bazie obrazu php:8.2-cli
FROM php:8.2-cli

# Ustawienie etykiety "author" na "Patryk Gajewski"
LABEL author="Patryk Gajewski"

# Ustawienie katalogu roboczego na /app
WORKDIR /app

# Kopiowanie plików z etapu budowania do katalogu /app w etapie finalnym
COPY --from=builder /app /app

# Utworzenie pustego pliku logów log.txt
RUN touch /app/log.txt

# Deklaracja, że kontener nasłuchuje na porcie 8080
EXPOSE 8080

# Polecenie healthcheck - wykonywane jest zapytanie co 30 sekund i czas oczekiwania na wiadomość wynosi 5 sekund. Jeśli odpowiedź nie jest otrzymywana po 3 próbach, to healtcheck kończy się i kontener oznaczany jest jako "unhealthy"
HEALTHCHECK --interval=30s --timeout=5s --start-period=5s --retries=3 \
    CMD curl -f http://localhost:8080/ || exit 1

# Uruchomienie wbudowanego serwera PHP na porcie 8080 w katalogu /app
CMD php -S 0.0.0.0:8080 -t /app
