<?php
include "config.php";
$conn = mysqli_connect($db_host $db_username, $db_password);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
error_reporting(0);
ini_set('display_errors', '0');
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
        <a href="index.php?show=timeline">Timeline</a>&nbsp &nbsp <a href="index.php?show=stats">Stats</a>&nbsp &nbsp <a href="index.php?show=add">Add</a>&nbsp &nbsp <a href="index.php?show=settings">Settings</a>
        <br>
        <?php
        if (is_null($_GET["show"])) {
            $show = "default";
             }
        else {
            
            $show = $_GET["show"];
            
        }
        if ($show == "default"){
            echo "Welcome, please register, but this does not work atm";
            }
        elseif ($show == "timeline") {
            echo "Timeline<br>date<br>test<br>date";
        }
        elseif ($show == "stats") {
            echo "Stats<br>planted on date";
        }
        elseif ($show == "add") {
            echo "Add<br>Insert form for adding to timeline or stats";
        }
        elseif ($show == "settings") {
            echo "Settings<br>whatever...";
        }
        ?>
    </body>
</html>
