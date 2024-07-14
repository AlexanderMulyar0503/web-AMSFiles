<?php
    include "conf.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php print($CONF["company"]); ?> </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/favicon.png">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/renameDialog.css">
    </head>

    <body>
        <header>
            <div class="header_logo">
                <a href="./"> <img src="img/favicon.png" width="75px" height="75px"> </a>
            </div>
            <div class="header_link">
                <a href="./"> <b> <i> <?php print($CONF["company"]); ?> </i> </b> </a>
            </div>
        </header>

        <div class="renameDialog">
            <form action="rename.php" method="post">
                <p>Переименование</p>
                <p>Текущее имя:</p>
                <?php
                    print("<input type='text' name='path' value='" . $_GET["dir"] . "' hidden>");
                    print("<input type='text' name='oldName' value='" . $_GET["name"] . "' readonly>");
                ?>
                <p>Новое имя:</p>
                <input type="text" name="newName">
                <input type="submit" value="Переименовать">
            </form>

            <?php print("<p> <a href='./index.php?dir=" . $_GET["dir"] . "'>На главную</a> </p>"); ?>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>
    </body>
</html>
