<?php
    include 'Model/dbConnection.php';

        if(!isset($_SESSION)){
        session_start();
    }

    $_SESSION['count'] = 0;
    // validate user input
    function test_Logininput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    if(isset($_GET) & !empty($_POST)){
        // sanitaise and validate user input
        $username = filter_var(test_Logininput($_POST['username']), FILTER_SANITIZE_STRING);
        $password = filter_var(test_Logininput($_POST['password']), FILTER_SANITIZE_STRING);

        $hashedPass = "SELECT password FROM login WHERE username= '$username'";
        $hashResult = $pdo->query($hashedPass);
        $hashReturn = $hashResult->fetchColumn();

        $checkUsername = "SELECT COUNT(*) FROM login WHERE username='$username'";
        $result = $pdo->query($checkUsername);
        $userResult = $result->fetchColumn();

    if($userResult > 0){
        if(password_verify($password, $hashReturn)) {
            $_SESSION['count'] = 1;
            $_SESSION['currentUser'] = $username;
    ?>
        <script type="text/javascript">
            window.location="View/pages/home.php";
        </script>
    <?php
        }
    }
}
?>