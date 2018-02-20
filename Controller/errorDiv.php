<?php
if(isset($_GET) & !empty($_POST)){
    if($_SESSION['count'] == 0){
        echo '<h2>Oops something went wrong, please try again!</h2>';
    }
}
?>