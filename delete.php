<?php
    include "conf.php";

    $deleteResult = "<p> <a href='./index.php'>На главную</a> </p>";

    if (($_GET["dir"] != "") && ($_GET["name"] != ""))
    {
        if (is_dir($CONF["pathFiles"] . $_GET["dir"] . $_GET["name"]))
        {
            if (rmdir($CONF["pathFiles"] . $_GET["dir"] . $_GET["name"]))
            {
                $deleteResult = "<p>Папка успешно удалена</p>
                    <p> <a href='./index.php'>На главную</a> </p>";
            }
            else
            {
                $deleteResult = "<p>Папка не была удалена</p>
                    <p> <a href='./index.php'>На главную</a> </p>";
            }
        }
        if (is_file($CONF["pathFiles"] . $_GET["dir"] . $_GET["name"]))
        {
            if (unlink($CONF["pathFiles"] . $_GET["dir"] . $_GET["name"]))
            {
                $deleteResult = "<p>Файл успешно удален</p>
                    <p> <a href='./index.php'>На главную</a> </p>";
            }
            else
            {
                $deleteResult = "<p>Файл не был удален</p>
                    <p> <a href='./index.php'>На главную</a> </p>";
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
        <link rel="stylesheet" href="css/delete.css">
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

        <div class="deleteResult">
            <?php
                print($deleteResult);                
            ?>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>
    </body>
</html>
