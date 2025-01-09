<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tobiasschipper - Login</title>
    <link rel="stylesheet" href="./css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
</head>
<body>
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
                <a href="../pages/projects.html">
                    <li>Projects</li>
                </a>
            </ul>
        </div>
        <div class="content">
            <div class="login">
                    <form action="login.php" method="post">
                        <h2>Voer Token in</h2>
                        <div class="tokenInput">
                            <input type="text" name="token" id="token" maxlength="99" required>
                            <label for="token">Token</label>
                            <i class='bx bxs-key'></i>
                        </div>
                        <button class="login" type="submit">Login</button>
                    </form>
            </div>
        </div>
        <div class="footer">
            <p>&#169; 2024 Tobias Schipper</p>
        </div>
    </div>
</body>
</html>
</body>
</html>