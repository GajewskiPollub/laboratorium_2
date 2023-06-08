W katalogu .gitlab/workflows/ znajduje się plik opisujący łancuch Github Actions.  Klogu głównym zawiera zaś wszystkie pliki do dołączenia podczas tworzenia architektury linux/arm64/v8 oraz linux/amd64.<br>
## Ukazanie efektu poprawnego zbudowania się obrazów:<br>
*Poprawne wykonanie się Github Actions*<br>
![](1.png)<br><br>
*Dodanie obrazów do DockerHub*<br>
![](2.png)<br><br>
*Wyświetlenie się obrazów w Docker Desktop po ich pobraniu z DockerHuba*<br>
![](3.png)<br><br>
*Ukazanie utworzonych kontenerów na podstawie powyższych obrazów*<br>
![](4.png)<br><br>
*Uruchomienie kontenera na porcie 8080 wraz z wyświetlniem pliku index.php<br>
docker run ip 8080:8080 <nazwa obrazu> <br>
![](5.png)<br><br>
*Ukazanie logów
![](6.png)<br><br>
