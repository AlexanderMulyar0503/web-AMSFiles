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
        <link rel="stylesheet" href="css/index.css">
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

        <div class="filesPanel">
            <div class="createDir">
                <a href="#"> <img src="img/type_folder.png" width="50px" height="50px"> </a>
                <a href="#">Создать папку</a>
            </div>

            <div class="uploadFile">
                <a href="#"> <img src="img/type_file.png" width="50px" height="50px"> </a>
                <a href="#">Загрузить файл</a>
            </div>
        </div>

        <div class="filesList">
            <table>
                <tr>
                    <td class="itemType"> <img src="img/type_folder.png" width="35px" height="35px"> </td>
                    <td class="itemName"> <a href="#"> <i>Dir</i> </a> </td>
                    <td class="itemSize"> <i>Каталог</i> </td>
                    <td class="itemDelete"> <a href="#"> <b>Удалить</b> </a> </td>
                </tr>

                <tr>
                    <td class="itemType"> <img src="img/type_file.png" width="35px" height="35px"> </td>
                    <td class="itemName"> <a href="#"> <i>File</i> </a> </td>
                    <td class="itemSize"> <i>15 КБайт</i> </td>
                    <td class="itemDelete"> <a href="#"> <b>Удалить</b> </a> </td>
                </tr>
            </table>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>
    </body>
</html>
