
<?php
// Laad de Composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Initialiseer Dotenv en laad .env-bestand
try {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/', 'token.env');
    $dotenv->load();
} catch (Exception $e) {
    die('Could not load .env file.');
}


// Check of de user niet probeert te skippen
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: ./index.html");
    exit;
}

// Haal info uit de POST
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $input_token = !empty($_POST['token']) ? $_POST['token'] : false;

    $token = $_ENV['TOKEN'];

    if($input_token === $token) {
        echo "<script> window.location.href = './pages/portfolio.html';</script>";
    }
    else {
        echo "<script> 
                alert('Verkeerde Token ingevoerd!');
                window.location.href = './pages/login.html';
                </script>";

        exit;

    }

}

?>