<?php

$currentTime = date('Y-m-d H:i:s');

// Zapisz informację o uruchomieniu serwera w logach
$logMessage = sprintf("Serwer uruchomiony o godzinie %s przez Patryka Gajewskiego na porcie %s", $currentTime, $_SERVER['SERVER_PORT']);
file_put_contents('/app/log.txt', $logMessage . PHP_EOL, FILE_APPEND);

// Pobranie adresu IP naszego komputera
$clientIP =  getHostByName(getHostName());

// Generuj strony informacyjną dla klienta
$html = "<html><body>";
$html .= "<h1>Witaj!</h1>";
$html .= "<p>Twoje IP: $clientIP</p>";
$html .= "<p>Aktualny czas: $currentTime</p>";
$html .= "</body></html>";

// Wyświetlenie informacji na temat adresu IP oraz czasu strefowego
echo $html;
