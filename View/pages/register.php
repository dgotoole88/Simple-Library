<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <?php include 'header.php'; ?>
        <?php include '../../Controller/session.php'; ?>
        <?php include '../../Controller/regUser.php'; ?>
        <link rel="stylesheet" type="text/css" href="../css/myBooks.css" media="screen"/>
        <title>Book Library</title>
    </head>
    <body>
        <div id="container">
            <div id="registerCont">
                <form action="" name="register" method="post" id="register">
                    <div id="register">
                        <h2 id="registerHeading">Registration</h2>
                        <div class="inputTest">Enter a Username: <input name="username" placeholder="Username" type="text" required></div>
                        <div class="inputTest">Enter a Password: <input name="password" placeholder="Password" type="password" required></div>
                        <div class="inputTest">First Name:<input name="fName" pattern="[A-Za-z0-9_]{1,15}" placeholder="First Name" type="text" required></div>
                        <div class="inputTest">Surname: <input name="surname" pattern="[A-Za-z0-9_]{1,15}" placeholder="Surname" type="text" required></div>
                        <div id="selectDiv">
                            Select your Role:                     
                            <select name="selectR">
                                <option value="Rating">-Select-</option>
                                <option name="supervisor" value="supervisor">Supervisor</option>
                                <option name="editor" value="editor">Editor</option>
                            </select>
                        </div>
                        <div id="subButton"><button name="submit" type="submit" value="submit">Register</button></div>
                    </div>
                </form>
            </div>
        </div>
        <footer>
            <?php include 'footer.php'; ?>
        </footer>
    </body>
</html>