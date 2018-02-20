<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <?php 
            include 'header.php';
            include '../../Controller/session.php';
            include '../../Model/dbConnection.php';
        ?>
        <link rel="stylesheet" type="text/css" href="../css/myBooks.css" media="screen"/>
        <title>Book Library</title>
    </head>
    <body>
        <div id="bookLibrary">
            <h2>Book Library</h2>
        </div>
        <div id="container">
            <div id="cover">
                <?php include '../../Controller/bookDisplay.php'; ?>
            </div>
        </div>
        <footer>
            <?php include 'footer.php'; ?>
        </footer>
    </body>
</html>