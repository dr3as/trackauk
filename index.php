<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<html>
    <head>
        <title>AukTracker</title>
    </head>
    <body>
        <h1>AukTracker</h1>Track your plants...
        <br>
        <br>
        <br>
        <br>
        <a href="index.php?show=timeline">Timeline</a>&nbsp &nbsp <a href="index.php?show=stats">Stats</a>&nbsp &nbsp <a href="index.php?show=add">Add</a>&nbsp &nbsp <a href="index.php?show=settings">Settings</a>
        <?php
        if (is_null($_GET["show"]))
            $show == "default";
        else {
            echo $_GET["show"];
            $show == $_GET["show"];
        }
        if ($show = "default")
            echo "Default";
        ?>
    </body>
</html>
