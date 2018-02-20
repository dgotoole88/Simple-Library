<html>
    <head>
        <?php include '../../Controller/updateC.php'; ?>
    </head>
    <body>
        <div id="editContainer">
            <div id='editModal'>
                <form action="" name="addBook" method="post" id="addBook">
                    <div id="edit">
                        <h2 id="bookTit"><?php echo $showBookTit; ?></h2>
                        <div id="modalImage"><img src="<?php echo $showBookCover; ?>" alt="<?php echo $showBookTit; ?>" height="148.5" width="101.5"></div>
                        <div class="inputTestModal">Book title: <input class="inputModal" name="bookT" type="text" value="<?php echo $showBookTit; ?>" required></div>
                        <div class="inputTestModal">Original title: <input class="inputModal" name="origT" type="text" value="<?php echo $showOriginalTitle; ?>" required></div>
                        <div class="inputTestModal">Publication year: <input class="inputModal" name="pubY" type="text" value="<?php echo $showYearofPublication; ?>" required></div>
                        <div class="inputTestModal">Genre: <input class="inputModal" name="gen" type="text" value="<?php echo $showGenre; ?>" required></div>
                        <div class="inputTestModal">Millions sold: <input class="inputModal" name="millS" type="text" value="<?php echo $showMillionsSold; ?>" required></div>
                        <div class="inputTestModal">Language written: <input class="inputModal" name="lang" type="text" value="<?php echo $showLanguageWritten; ?>" required></div>
                        <div class="inputTestModal">Image Path and Name: <input class="inputModal" name="imageName" type="text" value="<?php echo $showBookCover; ?>"></div>
                        <div class="inputTestModal">Plot Source: <input class="inputModal" name="plotSource" type="text" value="<?php echo $showPlotSource; ?>"></div>
                        <div class="inputTestModalTextArea">Book Plot: <textarea class="inputModal" name="bookPlot" type="text"><?php echo $showBookPlot; ?></textarea></div>
                        <div id="formButtons">
                            <button class="formButt" name="edit" type="submit" value="submit">Update</button>
                            <button class="formButt" name="close" type="button" onclick="closeModal()">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>