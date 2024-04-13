<?php
    include "conf.php";

    function GetSize($maxSize)
    {
        if ($maxSize >= 1048576)
        {
            return (string)round($maxSize / 1048576) ." МБайт";
        }
        if ($maxSize > 1024)
        {
            return (string)round($maxSize/ 1024) ." КБайт";
        }
        if ($maxSize <= 1024)
        {
            return (string)$maxSize ." Байт";
        }
    }

    $isUploadResult = "<p> <a href='./index.php'>На главную</a> </p>";

    if (($_FILES["uploadFile"]["name"] != "") && ($_GET["dir"] != ""))
    {
        $fileName = $CONF["pathFiles"] . $_GET["dir"] . $_FILES["uploadFile"]["name"];

        if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $fileName))
        {
            $isUploadResult = "<p>Файл успешно загружен</p>
                <p> <a href='./createDir.php?dir=" . $_GET["dir"] . "'>Вернуться</a> </p>
                <p> <a href='./index.php'>На главную</a> </p>";
        }
        else
        {
            $isUploadResult = "<p>Файл не был загружен. Код ошибки: " . $_FILES["uploadFile"]["error"] . "</p>
                <p> <a href='./createDir.php?dir=" . $_GET["dir"] . "'>Вернуться</a> </p>
                <p> <a href='./index.php'>На главную</a> </p>";
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
        <link rel="stylesheet" href="css/uploadFiles.css">
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

        <div class="uploadFilesForm">
            <?php
                print("<form action='uploadFiles.php?dir=" . $_GET["dir"] .  "' method='post' enctype='multipart/form-data'>");
                print("<p>Максимальный размер файла " . (string)GetSize($CONF["maxSize"]) . "</p>");
                print("<input type='hidden' name='MAX_FILE_SIZE' value='" . (string)$CONF["maxSize"] . "'>");
                print("<p> Загрузить этот файл: <input type='file' name='uploadFile'> </p>");
                print("<p> <input type='submit' value='Загрузить файл'> </p>");
                print("</form>");
            ?>
        </div>

        <div class="uploadFilesResult">
            <?php
                print($isUploadResult);
            ?>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>
    </body>
</html>
