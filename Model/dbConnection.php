<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
            $pdo = new PDO("mysql:host=$servername;dbname=mybooks", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
    catch(PDOException $e){
            $error_message = $e->getMessage();
            ?>
            <h1>Database Connection Error</h1>
            <p>There was an error connecting to the database.</p>
            <p>Error Message: <?php echo $error_message; ?></p>
            <?php
            die();
        }
            ?>