<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/myBooks.css" media="screen"/>
    </head>
    <body>
        <header>
            <div id="banner">
                 <h1>My Books</h1>
            </div>
            <nav id="navMenu">
                <a href="home.php">BOOK LIBRARY</a>
                <a href="addBook.php">ADD BOOK</a>
                <a href="register.php">REGISTER</a>
                <a id="logout" href="../../Controller/logout.php">LOGOUT</a>
            </nav>
            <nav id="toggleMenu">
                <div id="alignMenu">
                    <label for="show-menu" class="show-menu">MENU</label>
                </div>
	            <input type="checkbox" id="show-menu" role="button">
		        <ul id="menu">
		            <li><a href="home.php">BOOK LIBRARY</a></li>
		            <li><a href="addBook.php">ADD BOOK</a></li>
		            <li><a href="register.php">REGISTER</a></li>
		            <li><a href="../../Controller/logout.php">LOGOUT</a></li>
	            </ul>
            </nav>
        </header>
    </body>
</html>