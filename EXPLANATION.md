Pierwsze co się rzuca w oczy jest użycie readerów - wykorzystano wzorzec pełnomocnik. W przypadku pobierania
jakichkolwiek danych z zewnętrznego zasobu (REST api, SOAP itd.), w pewnym momencie żądania o zasób mogą zostać
przyblokowane w związku z np. przekroczeniem ilości żądań na sekundę/godzinę/dobę. W związku z tym wynik żądania dobrze
by było cache'ować. Jeśli użyjemy pełnomocnika, to napisanie takiej klasy staje się bardzo proste. Aby to zobrazować
dodałem klasę CacheNationalGeographicReader, która żądanie cache'uje. Dzięki temu, że kod jest tak napisany, spełniona
jest zasada SOLID - open/close principle.


Wykorzystane pakiety:

symfony/console     - możliwość w łatwy sposób stworzenia commandów wraz z przekazywaniem parametrów.
                      Programuję w symfony i bardzo dobrze znam tą bibliotekę.
guzzlehttp/guzzle   - chyba najbardziej popularna biblioteka z klientem HTTP. Bardzo intuicyjna i z bardzo dobrą dokumentacją.
                      Bardzo dobra dokumentacja czyni tą bibliotekę godną polecenia. Nie raz używałem w pisanych przeze mnie projektach.
jms/serializer      - biblioteka w łatwy sposób pozwala na serializację obiektów do formatu xml czy json oraz deserializację
                      formatów na obekty. Dzięki czytaniu adnotacji możliwe jest w łatwy sposób formatowanie zaczytywanych danych
                      oraz ich "normalizacja", np. ze typu string na DateTime w przypadku poprawnego formatu.
psr/log             - interface do loggowania
                        