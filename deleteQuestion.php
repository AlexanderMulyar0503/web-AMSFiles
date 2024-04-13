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
        <link rel="stylesheet" href="css/deleteQuestion.css">
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

        <div class="questionForm">
            <?php
                if (($_GET["dir"] != "") && ($_GET["name"] != ""))
                {
                    if (is_dir($CONF["pathFiles"] . $_GET["dir"] . $_GET["name"]))
                    {
                        print("<p>Вы действительно хотите удалить папку <b>" . $_GET["name"] . "</b>?</p>");
                        print("<p> <a href='delete.php?dir=" . $_GET["dir"] . "&name=" . $_GET["name"] . "'>Удалить</a> </p>");
                        print("<p> <a href='index.php'>Отмена</a> </p>");
                    }
                    if (is_file($CONF["pathFiles"] . $_GET["dir"] . $_GET["name"]))
                    {
                        print("<p>Вы действительно хотите удалить файл <b>" . $_GET["name"] . "</b>?</p>");
                        print("<p> <a href='delete.php?dir=" . $_GET["dir"] . "&name=" . $_GET["name"] . "'>Удалить</a> </p>");
                        print("<p> <a href='index.php'>Отмена</a> </p>");
                    }
                }
            ?>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>
    </body>
</html>
