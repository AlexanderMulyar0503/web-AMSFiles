<?php
    include "conf.php";

    $renameResult = "<p> <a href='./index.php?dir=" . $_POST["path"] . "'>На главную</a> </p>";

    if (($_POST["path"] != "") && ($_POST["oldName"] != "") && ($_POST["newName"]))
    {
        if (rename($CONF["pathFiles"] . $_POST["path"] . $_POST["oldName"], $CONF["pathFiles"] . $_POST["path"] . $_POST["newName"]))
        {
            $renameResult = "<p>Успешно переименовано</p>
                <p> <a href='./index.php?dir=" . $_POST["path"] . "'>На главную</a> </p>";
        }
        else
        {
            $renameResult = "<p>Операция не выполнена</p>
                <p> <a href='./index.php?dir=" . $_POST["path"] . "'>На главную</a> </p>";
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
        <link rel="stylesheet" href="css/rename.css">
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

        <div class="renameResult">
            <?php
                print($renameResult);                
            ?>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>
    </body>
</html>
