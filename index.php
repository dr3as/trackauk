<?php
//add configfile
include "config.php";
//do initial db connect
$conn = mysqli_connect($db_host, $db_username, $db_password);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  }

//fakelogin
if ($_GET["fakeauth"] == "yes") { 

// Set the session variables 
$_SESSION['loggedin'] = true; $_SESSION['id'] = 1; $_SESSION['username'] = "Dr3as"; 

// Redirect to the user's dashboard 
header("Location: index.php"); exit; }

//errorcode or not
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
        <a href="index.php?show=timeline">Timeline</a>&nbsp &nbsp 
        <a href="index.php?show=plants">Planters and Plants</a>&nbsp &nbsp 
        <a href="index.php?show=add">Add</a>&nbsp &nbsp 
        <a href="index.php?show=settings">Settings</a>
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
        elseif ($show == "plants") {
            echo "this and this planters with this and this plants";
        }
        elseif ($show == "add") {
            echo "Add<br>Insert form for adding to timeline or stats";
        }
        elseif ($show == "settings") {
            echo "Settings<br>whatever...";
        }
        echo "<br>";
        echo $_SESSION['username'];
        ?>
    </body>
</html>
