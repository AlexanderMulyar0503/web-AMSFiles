<?php
    include "conf.php";

    function GetFolders($path, $linkPath)
    {
        $folders = array();

        $list = scandir($path);

        if ($linkPath == "/")
        {
            for ($i = 2; $i < count($list); $i++)
            {
                if (is_dir($path . $list[$i]))
                {
                    array_push($folders, $list[$i]);
                }
            }
        }
        else
        {
            for ($i = 1; $i < count($list); $i++)
            {
                if (is_dir($path . $list[$i]))
                {
                    array_push($folders, $list[$i]);
                }
            }
        }

        return $folders;
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
        <link rel="stylesheet" href="css/moveDialog.css">
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

        <div class="moveDialog">
            <?php
                if ($_GET["act"] == "m")
                {
                    print("<p>Переместить <b>" . $_GET["name"] . "</b> в каталог</p>");
                }

                if ($_GET["act"] == "c")
                {
                    print("<p>Копировать <b>" . $_GET["name"] . "</b> в каталог</p>");
                }

                foreach (GetFolders($CONF["pathFiles"] . "/" . $_GET["dir"], $_GET["dir"]) as $folder)
                {
                    print("<p> <a href='./move.php?act=" . $_GET["act"] . "&dir=" . $_GET["dir"] . "&name=" . $_GET["name"] . "&to=" . $_GET["dir"] . $folder . "/'>" . $folder . "</a> </p>");
                }

                print("<br> <p> <a href='index.php?dir=" . $_GET["dir"] . "'>Отмена</a> </p>");
            ?>
        </div>

        <footer>
            <p>
                <?php print($CONF["copyright"]); ?>
            </p>
        </footer>
    </body>
</html>
