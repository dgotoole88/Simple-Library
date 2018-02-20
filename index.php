<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <?php 
            include 'Controller/loginC.php';
        ?>
        <link rel="stylesheet" type="text/css" href="View/css/myBooks.css" media="screen"/>
        <title>Book Library - Login</title>
    </head>
    <body>
        <header>
            <div id="banner">
                 <h1>My Books</h1>
            </div>

        </header>
        <div id="loginContainer">
            <fieldset id="login">
                <form name="login" action="" method="post">
                    <h2 class="loginTitle">Log In</h2>
                    <div id="userN">
                        <label>Username:</label>
                        <input name="username" type="text" required>
                    </div>
                    <div id="passW">
                        <label>Password:</label>
                        <input type="password" name="password" pattern="[A-Za-z0-9]{8,16}" required>
                    </div>
                    <div id="loginButt">
                        <button name="submit" type="submit" value="submit">LOGIN</button>
                    </div>
                </form>
            </fieldset>
        </div>
        <div id="errorDiv"><?php include 'Controller/errorDiv.php'; ?></div>
        <footer>
            <?php include 'View/pages/footer.php'; ?>
        </footer>
    </body>
</html>