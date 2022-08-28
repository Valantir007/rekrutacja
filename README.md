Zadanie rekrutacyjne
================

## Uruchomienie skryptów:

Aby uruchomić zadanie należy mieć zainstalowanego dockera.

Wchodzimy do głównego katalogu projektu i wykonujemy:

```bash
docker build -t zadanie .
```

Następnie uruchamiamy kontener:

```bash
docker container run -d zadanie
```

W odpowiedzi dostaniemy hash naszego kontenera, np:

19bc8cdeffdcf4525b1d6f4c37e8458a146ebec02f278dbf51b1b3b8a21f721e

Następnie wchodzimy do kontenera:

```bash
docker container exec -it 19bc8cdeffdcf4525b1d6f4c37e8458a146ebec02f278dbf51b1b3b8a21f721e sh
```

W tym momencie możemy zacząć wykonywać skrypty:

Eksport danych do pliku:

```php
php src/console.php csv:simple "https://blog.nationalgeographic.org/feed/" "file.csv" -vv
```

Eksport danych do pliku (z zachowaniem poprzednich danych):

```php
php src/console.php csv:extended "https://blog.nationalgeographic.org/feed/" "file.csv" -vv
```

##Uruchamianie testów:

Aby uruchomić testy, należy wykonać polecenie:

```
./vendor/bin/phpunit
```