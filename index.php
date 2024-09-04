<?php
// Obtener la dirección IP del visitante
$ipAddress = $_SERVER['REMOTE_ADDR'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Mostrar la IP y User-Agent
echo "IP del visitante: $ipAddress<br>";
echo "User-Agent: $userAgent<br>";

// Tu token de IPinfo
$token = "3f87d67be85736";
$url = "https://ipinfo.io/{$ipAddress}/json?token={$token}";

// Realizar la solicitud HTTP GET
$response = file_get_contents($url);
$data = json_decode($response, true);

// Verificar si la solicitud fue exitosa


if ($data && isset($data['country'])) {

    $country = $data['country'] ?? 'Desconocido';
    $region = $data['region'] ?? 'Desconocido';
    $city = $data['city'] ?? 'Desconocido';
    
    // Mostrar información de geolocalización
    echo "IP: {$ipAddress}<br>";
    echo "País: {$country}<br>";
    echo "Región: {$region}<br>";
    echo "Ciudad: {$city}<br>";
} else {
    echo "No se pudo obtener la información de geolocalización.<br>";
}



?>
