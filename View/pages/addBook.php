<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <?php include 'header.php'; ?>
        <?php include '../../Controller/session.php'; ?>
        <?php include '../../Controller/addNewBook.php'; ?>
        <link rel="stylesheet" type="text/css" href="../css/myBooks.css" media="screen"/>
        <title>Book Library</title>
    </head>
    <body>
        <div id="container">
            <div id="addBookCont">
                <form action="" name="addBook" method="post" id="addBook">
                    <div id="add">
                        <h2 id="addBookHeading">Add Book</h2>
                        <div class="inputTest">Author's first name: <input name="fName" pattern="[A-Za-z0-9_ ]{1,15}" placeholder="First name" type="text" required></div>
                        <div class="inputTest">Author's surname:  <input name="surname" pattern="[A-Za-z0-9_ ]{1,15}" placeholder="Surname" type="text" required></div>
                        <div class="inputTest">Nationality: <input name="nat" pattern="[A-Za-z0-9_]{1,15}" placeholder="Nationality" type="text" required></div>
                        <div class="inputTest">Birth year: <input name="by" pattern="[-+]?[0-9]*[.,]?[0-9]+" placeholder="Birth year" type="text" required></div>
                        <div class="inputTest">Death year: <input name="dy" pattern="[-+]?[0-9]*[.,]?[0-9]+" placeholder="Death year" type="text"></div>
                        <div class="inputTest">Book title: <input name="bookTitle" placeholder="Title" type="text" required></div>
                        <div class="inputTest">Original title: <input name="origTitle" pattern="[A-Za-z0-9_ ]{1,15}" placeholder="Original title" type="text" required></div>
                        <div class="inputTest">Publication year: <input name="pubYear" pattern="[-+]?[0-9]*[.,]?[0-9]+" placeholder="Publication year" type="text" required></div>
                        <div class="inputTest">Genre: <input name="genre" pattern="[A-Za-z0-9_ ]{1,15}" placeholder="Genre" type="text" required></div>
                        <div class="inputTest">Millions sold: <input name="millionsSold" pattern="[-+]?[0-9]*[.,]?[0-9]+" placeholder="Millions sold" type="text" required></div>
                        <div class="inputTest">Language written: <input name="language" pattern="[A-Za-z0-9_]{1,15}" placeholder="Language Written" type="text" required></div>
                        <div class="inputTest">Image name: <input name="imageName" pattern="[A-Za-z0-9_]{1,15}" placeholder="Image name" type="text" required></div>
                        <div class="inputTest">Image URL: <input name="url" placeholder="Image URL" type="text" required></div>
                        <div id="adjustSelect">
                        Image extention: 
                            <select name="ext">
                                <option>.jpg</option>
                                <option>.png</option>
                            </select>
                        </div>
                        <div class="inputTest">Plot Source: <input name="plotSource" placeholder="Plot Source" type="text" required></div>
                        <div id="textareaPlot">Plot: <textarea name="plot" type="text" required></textarea></div>
                        </div>
                        <div><div id="addButt"><button name="addUrl" type="submit" value="submit">Add</button></div></div>
                    </div>
                </form>
            </div>
        </div>
        <footer>
            <?php include 'footer.php'; ?>
        </footer>
    </body>
</html>