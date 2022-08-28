# Opis zadania:

Przygotowanie fetch RSS/Atom w PHP

Celem zadania jest napisanie prostego programu PHP uruchamianego z CLI (Windows CMD, Unix
Shell), który z danego adresu URL pobierze dane RSS/Atom i zapisze je do pliku *.csv

Napisany program ma wykonywać 2 polecenia:

- ~~csv:simple URL PATH - pobranie z URL danych RSS/Atom i zapisanie ich do pliku PATH.csv
określonego przez w ścieżce PATH. Stare dane z pliku PATH.csv mają być nadpisane.~~
- ~~csv:extended URL PATH - pobranie z URL danych RSS/Atom i dopisanie ich do pliku
PATH.csv określonego przez w ścieżce PATH. Stare dane z pliku PATH.csv mają być
dopisane.~~


Dodatkowe wymagania:

- ~~URL testowy to http://feeds.nationalgeographic.com/ng/News/News_Main~~
- ~~plik *.csv określany przez ścieżkę PATH ma mieć kolumny z nagłówkami "title",
"description", "link, "pubDate", "creator" i wartości tych kolumn.~~
- ~~wartość z kolumny "pubDate" powinna być w formacie np.: 16 października 2018 15:31:33~~
- ~~wartość z kolumny "description" powinna być oczyszczona z HTML a także linków tzn.
adresów URL~~
- ~~pliki źródłowe programu powinny być zawarte w podkatalogu "src/", natomiast
"namespace" aplikacji powinien nazywać się ImieNazwiskoRekrutacjaHRtec np.: <?php
namespace ImieNazwiskoRekrutacjaHRtec\ExampleCatalog\ExampleClass~~
- ~~plik startowy do uruchamiania z CLI powinien nazywać się "src/console.php", tak aby np.
zadziałało uruchomienie z konsoli polecenie: "php src/console.php csv:simple
http://feeds.nationalgeographic.com/ng/News/News_Main simple_export.csv"~~
- program ma mieć testy jednostkowe (zgodne phpunit) umieszczone w podkatalogu "test/",
tak aby można je uruchomić przez polecenie w konsoli: "phpunit" lub z PhpStorm
- do programu ma być załączona dokumentacja instalacji i uruchomienia w formie *.md lub
program ma sam się dokumentować np.: https://github.com/SammyK/package-skeleton
aby było wiadomo jak odpalić projekt/program
- Kod aplikacji musi być napisany w PHP 7.1

Dodatkowe informacje:

- ~~można użyć szkieletu przykładowego szkieletu composera np.:
https://github.com/SammyK/package-skeleton (można wybrać inny szkielet z Internetu,
ważne aby bazował na composer)~~
- ~~można dociągać dowolne pakiety i biblioteki zgodne ze standardem composera, jeżeli
zostanie wybrany jakiś pakiet to proszę odpowiedzieć w mailu na pytanie dlaczego akurat
ten pakiet? Drugie pytanie, czym się kierowano podczas jego wyboru?~~
- ~~dobrze będą oceniane zastosowane standardy kodowania PSR, czytelność kodu, wzorce
projektowe, organizacja struktury programu i rozbicia komponentów, zabezpieczenia na
sytuacje wyjątkowe/nieprzewidziane/niebezpieczne i odpowiednie komunikaty aplikacji o
stanie wykonywanych operacji~~
- ~~brak błędów w aplikacji (jeżeli będą błędy otrzymasz odpowiedz na mail aby to poprawić)~~

~~Kod zadania proszę umieścić na github.com lub innym repozytorium i podesłać link do
repozytorium na adres email rekrutacja-it@hrtec.pl~~