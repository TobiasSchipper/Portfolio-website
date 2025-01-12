<?php
// Load .env file with token
require_once __DIR__ . '/vendor/autoload.php';
use Dotenv\Dotenv;

try {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/', 'token.env');
    $dotenv->load();
} catch (Exception $e) {
    die('Could not load .env file.');
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_token = !empty($_POST['token']) ? $_POST['token'] : false;
    $token = $_ENV['TOKEN'];

    // Validate the token
    if ($input_token === $token) {
        // Redirect to portfolio page with token as a GET parameter
        header("Location: ./pages/portfolio.php?token=" . urlencode($token));
        exit;
    } else {
        // If the token is incorrect, show an alert and stay on the login page
        echo "<script>
                alert('Verkeerde Token ingevoerd!');
                window.location.href = './pages/login.html';
              </script>";
        exit;
    }
} else {
    // If the form is not submitted, show the login page
    header("Location: ./pages/login.html");
    exit;
}
?>
