<?php
    include '../../Model/dbConnection.php';

    // Function to validate user data
    function test_Addinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(isset($_POST) & !empty($_POST)){
        // Pass the user input through to functions. filter_var() for sanitisation and
        // test_Addinput() which will validate the user's data 
        $fName = filter_var(test_Addinput($_POST['fName']), FILTER_SANITIZE_STRING);
        $surname = filter_var(test_Addinput($_POST['surname']), FILTER_SANITIZE_STRING);
        $nationality = filter_var(test_Addinput($_POST['nat']), FILTER_SANITIZE_STRING);
        $birthYear = filter_var(test_Addinput($_POST['by']), FILTER_SANITIZE_STRING);
        $deathYear = filter_var(test_Addinput($_POST['dy']), FILTER_SANITIZE_STRING);
        $bookTitle = filter_var(test_Addinput($_POST['bookTitle']), FILTER_SANITIZE_STRING);
        $origTitle = filter_var(test_Addinput($_POST['origTitle']), FILTER_SANITIZE_STRING);
        $pubYear = filter_var(test_Addinput($_POST['pubYear']), FILTER_SANITIZE_STRING);
        $genre = filter_var(test_Addinput($_POST['genre']), FILTER_SANITIZE_STRING);
        $millionsSold = filter_var(test_Addinput($_POST['millionsSold']), FILTER_SANITIZE_STRING);
        $language = filter_var(test_Addinput($_POST['language']), FILTER_SANITIZE_STRING);
        $postImageName = filter_var(test_Addinput($_POST['imageName']), FILTER_SANITIZE_STRING);
        $postUrl = filter_var(test_Addinput($_POST['url']), FILTER_SANITIZE_STRING);
        $postExt = filter_var(test_Addinput($_POST['ext']), FILTER_SANITIZE_STRING);
        $postSource = filter_var(test_Addinput($_POST['plotSource']), FILTER_SANITIZE_STRING);
        $postPlot = filter_var(test_Addinput($_POST['plot']), FILTER_SANITIZE_STRING);

        // Allows a user to find a book cover image on the internet and store it in the database
        // by using the image's url
        $postImageName = str_replace(' ', '', $postImageName);
        @$rawImage = file_get_contents($postUrl);
        file_put_contents('../images/BookCovers/'.$postImageName.$postExt,$rawImage);
        $image = '../images/BookCovers/'.$postImageName.$postExt;

        // Tests the database to see if the author being added already exists in the database
        $sqlTestAuthor = "SELECT AuthorID FROM author WHERE Name='$fName' AND Surname='$surname'";
        $resTestA = $pdo->query($sqlTestAuthor);
        $testAuthor = $resTestA->fetchColumn();

        if($testAuthor > 0){    // if the author is already in the database. Do the following.

            // Tests the database to see if the book being added already exists in the database.
            $sqlTestBook = "SELECT BookID FROM book WHERE BookTitle='$bookTitle'";
            $resTestB = $pdo->query($sqlTestBook);
            $testBook = $resTestB->fetchColumn();

            if($testBook > 0){  // if the book is already in the database. Do the following.
                ?><script>alert("Book is already in Library");</script>
                <?php
            }else{              // if the book is NOT in the database. Do the following.
                $sqlBook = "INSERT INTO book (BookTitle, OriginalTitle, YearOfPublication, Genre, MillionsSold, LanguageWritten, AuthorID, BookCover) VALUES ('$bookTitle', '$origTitle', '$pubYear', '$genre', '$millionsSold', '$language',
                '$testAuthor', '$image')";
                $result = $pdo->query($sqlBook);
    
                if(isset($result)){
                    $sqlPlot = "INSERT INTO bookplot (Plot, PlotSource, BookID) VALUES ('$postPlot','$postSource', LAST_INSERT_ID())";
                    $plotResult = $pdo->query($sqlPlot);
    
                    if(isset($plotResult)){
                        ?>
                        <script>
                            alert('Book Added Successfully!');
                        </script>
                        <?php
                    }
                }
            }
        }else{
            // if the author being added is NOT in the database. Do the following.
            $sqlAuthor = "INSERT INTO author (Name, Surname, Nationality, BirthYear, DeathYear) VALUES ('$fName', '$surname', '$nationality', '$birthYear', '$deathYear')";
            $res = $pdo->query($sqlAuthor);
            $add = $res->fetchColumn();
    
            if(isset($add)){
                // Tests the database to see if the book being added already exists in the database.
                $sqlTestBook = "SELECT BookID FROM book WHERE BookTitle='$bookTitle'";
                $resTestB = $pdo->query($sqlTestBook);
                $testBook = $resTestB->fetchColumn();
    
                if($testBook > 0){  // if the book is already in the database. Do the following.
                    ?><script>alert("Book is already in Library");</script>
                    <?php
                }else{              // if the book is NOT in the database. Do the following.
                    $sqlBook = "INSERT INTO book (BookTitle, OriginalTitle, YearOfPublication, Genre, MillionsSold, LanguageWritten, AuthorID, BookCover) VALUES ('$bookTitle', '$origTitle', '$pubYear', '$genre', '$millionsSold', '$language',
                    LAST_INSERT_ID(), '$image')";
                    $result = $pdo->query($sqlBook);
        
                    if(isset($result)){
                        $sqlPlot = "INSERT INTO bookplot (Plot, PlotSource, BookID) VALUES ('$postPlot','$postSource', LAST_INSERT_ID())";
                        $plotResult = $pdo->query($sqlPlot);
        
                        if(isset($plotResult)){
                            ?>
                            <script>
                                alert('Book Added Successfully!');
                            </script>
                            <?php
                        }
                    }
                }
            }
        }
    }
?>