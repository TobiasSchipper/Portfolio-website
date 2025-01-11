<?php
// Include Composer autoload
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Initialize Dotenv and load the .env file
try {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../', 'token.env');
    $dotenv->load();
} catch (Exception $e) {
    die('Could not load .env file.');
}

// Check if the token is passed via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_token = isset($_POST['token']) ? $_POST['token'] : null;
    $valid_token = $_ENV['TOKEN']; // Assuming TOKEN is stored in the .env file

    // Validate the token
    if ($input_token === $valid_token) {
        // Token is valid, proceed to the portfolio page
        ;
    } else {
        // Token is invalid, show an error message
        echo "<script>
                alert('Verkeerde Token ingevoerd!');
                window.location.href = 'login.html';
            </script>";
        exit;
    }
} else {
    // If the request method is not POST, redirect to the login page
    header("Location: ../pages/login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tobiasschipper - Portfolio</title>
    <link rel="stylesheet" href="../css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="stylesheet" href="../css/portfolio.css" type="text/css">
</head>
<body>
    <div class="main">  
        <div class="header">
            <a href="../index.html">
                <h1>Tobias</h1>
            </a>
            <div>
                <img src="../svg/Stenden_logo_wit.svg" alt="NHLSTENDEN">
            </div>
            
            <ul>
                <a href="../pages/about.html">
                    <li>About</li>
                </a>
                <a href="login.html">
                    <li>Portfolio</li>
                </a>
            </ul>
        </div>
        <div class="content">
            <div class="dropdownButtons">
                <div class="dropdown">
                    <button class="dropbtn">Jaar 1, Semester 1</button>
                    <div class="dropdown-content">
                        <button onclick="loadPDF('../load_pdf.php?file=Jaar1/Semester1/Professional_Skills/Portfolio_2024_2025.pdf')">Edumondo</button>
                        <button onclick="loadPDF('../load_pdf.php?file=pdf2.pdf')">Load PDF 2</button>
                        <button onclick="loadPDF('../load_pdf.php?file=pdf3.pdf')">Load PDF 3</button>
                    </div>
                </div>
                <!-- More dropdowns here -->
            </div>
            <div id="pdf-container" style="margin-top: 20px;">
                <!-- The PDF will be displayed here -->
            </div>
        </div>
        <div class="footer">
            <p>&#169; 2024 Tobias Schipper</p>
        </div>
    </div>

    <script>
        // Function to load the PDF into the iframe
        function loadPDF(url) {
            document.getElementById('pdf-container').innerHTML = 
                '<iframe src="' + url + '" width="100%" height="700px"></iframe>';
        }
    </script>
</body>
</html>
