<script>
    // JS functions to allow modal to open and close. onclick.
    function closeModal(){
        document.getElementById('modal').style.display = "none";
    }
    function openModal(){
        document.getElementById('modal').style.display = "block";
    }
</script>
<?php 
    include '../../Controller/session.php';
    include '../../Model/dbConnection.php';
    include 'delete.php';

    $table = $pdo->prepare("SELECT * FROM book");
    $table->execute();

    $result = $table->setFetchMode(PDO::FETCH_ASSOC);

    if(!empty($result)){
        foreach (($table->fetchAll()) as $k=>$v){
            ?>
                <form class="bookCover">
                    <div><img src="<?php echo $v['BookCover']; ?>" height="297" width="203" alt="<?php echo $v['BookTitle']; ?>"/></div>
                    <div id="editDelete">
                        <form action="" method="post">
                            <button id="eb" name="sendToEdit" onclick="openModal()" type="submit" value="<?php echo  $v['BookID'] ?>">View / Edit Book</button>
                        </form>
                        <form action="" method="post">
                            <button name="delete" type="submit" value="<?php echo  $v['BookID'] ?>">Delete Book</button>
                        </form>
                    </div>
                </form>
            <?php
        }
        if(isset($_GET['sendToEdit'])){
            $_SESSION['bookID'] = $_GET['sendToEdit'];
        }else{
            $_SESSION['bookID'] = 0;
            ?>
            <script>setTimeout(closeModal, 100);</script>
            <?php
        }
        ?>
        <div id="modal">
            <?php include 'update.php'; ?>
        </div>
        <?php
    }
?>