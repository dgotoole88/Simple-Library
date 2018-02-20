<?php
    include '../../Model/dbConnection.php';

        if(isset($_SESSION['bookID'])){
            $select = $_SESSION['bookID'];
            //display Book Title
            $bookT = "SELECT BookTitle FROM book WHERE BookID = '$select'";
            $bookTResult = $pdo->query($bookT);
            $showBookTit = $bookTResult->fetchColumn();
            //dislplay Orignal Title
            $OriginalTitle = "SELECT OriginalTitle FROM book WHERE BookID = '$select'";
            $OriginalTitleResult = $pdo->query($OriginalTitle);
            $showOriginalTitle = $OriginalTitleResult->fetchColumn();
            //dislplay Year of publication
            $YearofPublication = "SELECT YearofPublication FROM book WHERE BookID = '$select'";
            $YearofPublicationResult = $pdo->query($YearofPublication);
            $showYearofPublication = $YearofPublicationResult->fetchColumn();
            //dislplay Genre
            $genre = "SELECT Genre FROM book WHERE BookID = '$select'";
            $genreResult = $pdo->query($genre);
            $showGenre = $genreResult->fetchColumn();
            //dislplay Millions sold
            $millionsSold = "SELECT MillionsSold FROM book WHERE BookID = '$select'";
            $millionsSoldResult = $pdo->query($millionsSold);
            $showMillionsSold = $millionsSoldResult->fetchColumn();
            //dislplay Language written
            $LanguageWritten = "SELECT LanguageWritten FROM book WHERE BookID = '$select'";
            $LanguageWrittenResult = $pdo->query($LanguageWritten);
            $showLanguageWritten = $LanguageWrittenResult->fetchColumn();
            //dislplay Book cover
            $BookCover = "SELECT BookCover FROM book WHERE BookID = '$select'";
            $BookCoverResult = $pdo->query($BookCover);
            $showBookCover = $BookCoverResult->fetchColumn();
            //display Book Plot
            $BookPlot = "SELECT Plot FROM bookplot WHERE BookID = '$select'";
            $BookPlotResult = $pdo->query($BookPlot);
            $showBookPlot = $BookPlotResult->fetchColumn();
            //display Book Source
            $BookPlotSource = "SELECT PlotSource FROM bookplot WHERE BookID = '$select'";
            $BookPlotSourceResult = $pdo->query($BookPlotSource);
            $showPlotSource = $BookPlotSourceResult->fetchColumn();
            //display Book Source
            $BookRank = "SELECT RankingScore FROM bookranking WHERE BookID = '$select'";
            $BookRankResult = $pdo->query($BookRank);
            $showBookRank = $BookRankResult->fetchColumn();
        }

        function getPosts(){
            $posts = array();
            // sanitise and validate user input
            $posts[0] = filter_var(test_inputs($_POST['bookT']), FILTER_SANITIZE_STRING);
            $posts[1] = filter_var(test_inputs($_POST['origT']), FILTER_SANITIZE_STRING);
            $posts[2] = filter_var(test_inputs($_POST['pubY']), FILTER_SANITIZE_STRING);
            $posts[3] = filter_var(test_inputs($_POST['gen']), FILTER_SANITIZE_STRING);
            $posts[4] = filter_var(test_inputs($_POST['millS']), FILTER_SANITIZE_STRING);
            $posts[5] = filter_var(test_inputs($_POST['lang']), FILTER_SANITIZE_STRING);
            $posts[6] = filter_var(test_inputs($_POST['imageName']), FILTER_SANITIZE_STRING);
            $posts[8] = filter_var(test_inputs($_POST['plotSource']), FILTER_SANITIZE_STRING);
            $posts[9] = filter_var(test_inputs($_POST['bookPlot']), FILTER_SANITIZE_STRING);
            return $posts;
        }
        // validate user input
        function test_inputs($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
    
        if(isset($_POST['edit'])){
            $data = getPosts();
            $updateQuery = "UPDATE book SET BookTitle ='$data[0]', OriginalTitle = '$data[1]', 
            YearofPublication = '$data[2]', Genre = '$data[3]', MillionsSold = '$data[4]', 
            LanguageWritten = '$data[5]', BookCover = '$data[6]' WHERE BookID = '$select'";
    
                $updateResult = $pdo->query($updateQuery);
                
                if($updateQuery)
                {
                    $plotUpdate = "UPDATE bookplot SET Plot ='$data[9]', PlotSource = '$data[8]' WHERE BookID = '$select'";
                    $updatePlotResult = $pdo->query($plotUpdate);

                    $updateQuery = 1;
                    if($updateQuery > 0)
                    {
                        if(isset($updatePlotResult)){
                        ?>
                        <script type="text/javascript">
                            alert('Book Has Been Updated. Reload Modal to see changes.');
                        </script>
                        <script>setTimeout(closeModal, 100);</script>
                        <?php
                        
                    }else{
                        ?>
                        <script type="text/javascript">
                            alert('ERROR - Data Not Updated');
                        </script>
                        <?php
                    }
                }
        }
    }
?>