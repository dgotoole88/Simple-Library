<?php
    if(isset($_POST['delete'])){
        $work = $_POST['delete'];
        $sqlD = "DELETE FROM book WHERE BookID = $work";
        $dResult = $pdo->prepare($sqlD);
        $delete = $dResult->execute();

        header('Location: ../../View/pages/home.php');
    }
?>