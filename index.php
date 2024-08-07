<?php
    include "conf.php";

    if (!isset($_GET["dir"]))
    {
        header("Location: " . $_SERVER["REQUEST_URI"] . "?dir=/");
    }

    function GetFileSize($filePath)
    {
        if (filesize($filePath) >= 1048576)
        {
            return (string)round(filesize($filePath) / 1048576) ." МБайт";
        }
        if (filesize($filePath) > 1024)
        {
            return (string)round(filesize($filePath) / 1024) ." КБайт";
        }
        if (filesize($filePath) <= 1024)
        {
            return (string)filesize($filePath) ." Байт";
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
                <?php
                    print("<a href='./createDir.php?dir=" . $_GET["dir"] . "'> <img src='img/type_folder.png' width='50px' height='50px'> </a>");
                    print("<a href='./createDir.php?dir=" . $_GET["dir"] . "'>Создать папку</a>");
                ?>
            </div>

            <div class="uploadFile">
                <?php
                    print("<a href='./uploadFiles.php?dir=" . $_GET["dir"] . "'> <img src='img/type_file.png' width='50px' height='50px'> </a>");
                    print("<a href='./uploadFiles.php?dir=" . $_GET["dir"] . "'>Загрузить файл</a>");
                ?>
            </div>
        </div>

        <div class="pathPanel">
            <a href="index.php"> <img src="img/home.png" width="35px" height="35px"> </a>

            <?php
                if ($_GET["dir"] == "/")
                {
                    print("<a href='index.php'> <img src='img/parentDir.png' width='35px' height='35px'> </a>");
                }
                else
                {
                    if (dirname($_GET["dir"]) == "/")
                    {
                        print("<a href='index.php?dir=" . dirname($_GET["dir"]) . "'> <img src='img/parentDir.png' width='35px' height='35px'> </a>");
                    }
                    else
                    {
                        print("<a href='index.php?dir=" . dirname($_GET["dir"]) . "/'> <img src='img/parentDir.png' width='35px' height='35px'> </a>");
                    }
                }

                print("<p> <b>" . $_GET["dir"] . "</b> </p>");
            ?>
        </div>

        <div class="filesList">
            <table>
                <?php
                    $pathDisk = $CONF["pathFiles"] . $_GET["dir"];
                    $pathLink = $_GET["dir"];
                    $filesList = scandir($pathDisk);

                    for ($i = 2; $i < count($filesList); $i++)
                    {
                        print("<tr>");

                        // Type
                        if (is_dir($pathDisk . $filesList[$i]))
                        {
                            print("<td class='itemType'> <img src='img/type_folder.png' width='35px' height='35px'> </td>");
                        }
                        if (is_file($pathDisk . $filesList[$i]))
                        {
                            print("<td class='itemType'> <img src='img/type_file.png' width='35px' height='35px'> </td>");
                        }

                        // Name
                        if (is_dir($pathDisk . $filesList[$i]))
                        {
                            print("<td class='itemName'> <a href='index.php?dir=" . $_GET["dir"] . $filesList[$i] . "/'> <i>" . $filesList[$i] . "</i> </a> </td>");
                        }
                        if (is_file($pathDisk . $filesList[$i]))
                        {
                            print("<td class='itemName'> <a target='_blank' href='download.php?dir=" . $_GET["dir"] . "&name=" . $filesList[$i] . "'> <i>" . $filesList[$i] . "</i> </a> </td>");
                        }

                        // Size
                        if (is_dir($pathDisk . $filesList[$i]))
                        {
                            print("<td class='itemSize'> <i>Каталог</i> </td>");
                        }
                        if (is_file($pathDisk . $filesList[$i]))
                        {
                            print("<td class='itemSize'> <i>" . GetFileSize($pathDisk . $filesList[$i]) . "</i> </td>");
                        }

                        // Actions
                        if (is_dir($pathDisk . $filesList[$i]))
                        {
                            print("<td class='itemActions'>");
                            print("<a href='./renameDialog.php?dir=" . $_GET["dir"] . "&name=" . $filesList[$i] . "'> <img src='img/rename.png' width='25px' height='25px'> </a>");
                            print("<a href='./moveDialog.php?act=m&dir=" . $_GET["dir"] . "&name=" . $filesList[$i] . "'> <img src='img/moveFile.png' width='25px' height='25px'> </a>");
                            print("<a href='./moveDialog.php?act=c&dir=" . $_GET["dir"] . "&name=" . $filesList[$i] . "'> <img src='img/copyFile.png' width='25px' height='25px'> </a>");
                            print("<a href='./deleteDialog.php?dir=" . $_GET["dir"] . "&name=" . $filesList[$i] . "'> <img src='img/delete.png' width='25px' height='25px'> </a>");
                            print("</td>");
                        }
                        if (is_file($pathDisk . $filesList[$i]))
                        {
                            print("<td class='itemActions'>");
                            print("<a href='./renameDialog.php?dir=" . $_GET["dir"] . "&name=" . $filesList[$i] . "'> <img src='img/rename.png' width='25px' height='25px'> </a>");
                            print("<a href='./moveDialog.php?act=m&dir=" . $_GET["dir"] . "&name=" . $filesList[$i] . "'> <img src='img/moveFile.png' width='25px' height='25px'> </a>");
                            print("<a href='./moveDialog.php?act=c&dir=" . $_GET["dir"] . "&name=" . $filesList[$i] . "'> <img src='img/copyFile.png' width='25px' height='25px'> </a>");
                            print("<a href='./deleteDialog.php?dir=" . $_GET["dir"] . "&name=" . $filesList[$i] . "'> <img src='img/delete.png' width='25px' height='25px'> </a>");
                            print("</td>");
                        }

                        print("</tr>");
                    }
                ?>
            </table>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>
    </body>
</html>
