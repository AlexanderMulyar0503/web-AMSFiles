<?php
    include "conf.php";

    $moveResult = "<p> <a href='./index.php?dir=" . $_GET["dir"] . "'>На главную</a> </p>";

    if (($_GET["dir"] != "") && ($_GET["name"] != "") && ($_GET["to"] != ""))
    {
        if (is_dir($CONF["pathFiles"] . $_GET["dir"] . $_GET["name"]))
        {
            if (($_GET["act"] == "m") && (rename($CONF["pathFiles"] . $_GET["dir"] . $_GET["name"], $CONF["pathFiles"] . $_GET["to"] . $_GET["name"])))
            {
                $moveResult = "<p>Папка успешно перемещена</p>
                    <p> <a href='./index.php?dir=" . $_GET["dir"] . "'>На главную</a> </p>";
            }
            else
            {
                $moveResult = "<p>Операция не выполнена</p>
                    <p> <a href='./index.php?dir=" . $_GET["dir"] . "'>На главную</a> </p>";
            }
        }

        if (is_file($CONF["pathFiles"] . $_GET["dir"] . $_GET["name"]) && ($_GET["to"] != ""))
        {
            if (($_GET["act"] == "m") && (rename($CONF["pathFiles"] . $_GET["dir"] . $_GET["name"], $CONF["pathFiles"] . $_GET["to"] . $_GET["name"])))
            {
                $moveResult = "<p>Файл успешно перемещен</p>
                    <p> <a href='./index.php?dir=" . $_GET["dir"] . "'>На главную</a> </p>";
            }
            elseif (($_GET["act"] == "c") && (copy($CONF["pathFiles"] . $_GET["dir"] . $_GET["name"], $CONF["pathFiles"] . $_GET["to"] . $_GET["name"])))
            {
                $moveResult = "<p>Файл успешно скопирован</p>
                    <p> <a href='./index.php?dir=" . $_GET["dir"] . "'>На главную</a> </p>";
            }
            else
            {
                $moveResult = "<p>Операция не выполнена</p>
                    <p> <a href='./index.php?dir=" . $_GET["dir"] . "'>На главную</a> </p>";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?php print($CONF["company"]); ?> </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/favicon.png">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/move.css">
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

        <div class="moveResult">
            <?php
                print($moveResult);                
            ?>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>
    </body>
</html>
