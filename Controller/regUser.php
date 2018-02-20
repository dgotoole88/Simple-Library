<?php
    include '../../Model/dbConnection.php';
    $count = 0;

    // validate user input
    function test_Reginput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(isset($_POST) & !empty($_POST)){
        // sanitise and validate user input
        $username = filter_var(test_Reginput($_POST['username']), FILTER_SANITIZE_STRING);
        $password = filter_var(test_Reginput($_POST['password']), FILTER_SANITIZE_STRING);
        $firstName = filter_var(test_Reginput($_POST['fName']), FILTER_SANITIZE_STRING);
        $surname = filter_var(test_Reginput($_POST['surname']), FILTER_SANITIZE_STRING);
        $selectR = filter_var(test_Reginput($_POST['selectR']), FILTER_SANITIZE_STRING);

        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        $sqlReserved = "SELECT COUNT(*) FROM login WHERE username='$username'";
        $res = $pdo->query($sqlReserved);
        $count = $res->fetchColumn();

        if($count == 0){
            $sqlLogin = "INSERT INTO login (Username, Password) VALUES ('$username', '$hashedPass')";
            $resultLogin = $pdo->query($sqlLogin);
    
            if($resultLogin){
                $sqlTourist = "INSERT INTO admin (FirstName, Surname, Role, LoginID) VALUES ('$firstName', '$surname', '$selectR', (SELECT LoginID FROM login WHERE Username='$username'))";
                $result = $pdo->query($sqlTourist);
                if($result){
                    ?>
                        <script>
                            alert('Registration Successful!');
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            alert('Registration Failed');
                        </script>
                    <?php
                }
            }else{
                ?>
                    <script>
                        alert('Registration Failed');
                    </script>
                <?php
            }
        }
    }
?>