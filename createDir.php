<?php
    include "conf.php";

    $isCreateResult = "<p> <a href='./index.php?dir=" . $_GET["dir"] . "'>На главную</a> </p>";

    if (($_POST["nameDir"] != "") && $_GET["dir"] != "")
    {
        if (mkdir($CONF["pathFiles"] . $_GET["dir"] . $_POST["nameDir"]))
        {
            $isCreateResult = "<p>Папка успешно создана</p>
                <p> <a href='./index.php?dir=" . $_GET["dir"] . "'>На главную</a> </p>";
        }
        else
        {
            $isCreateResult = "<p>Папка не была создана</p>
                <p> <a href='./index.php?dir=" . $_GET["dir"] . "'>На главную</a> </p>";
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
        <link rel="stylesheet" href="css/createDir.css">
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

        <div class="createDirForm">
            <?php print("<form action='createDir.php?dir=" . $_GET["dir"] . "' method='post'>"); ?>
                <p>Имя папки:</p>
                <input type="text" name="nameDir" id="nameDir">
                <input type="submit" value="Создать">
            </form>
        </div>

        <div class="createDirResult">
            <?php
                print($isCreateResult);
            ?>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>
    </body>
</html>
