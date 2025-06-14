<?php
//errorcode or not
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
error_reporting(0);
ini_set('display_errors', '0');
session_start();
//add configfiles
include "config.php";
include "languages.php";
include "planters.php";
include "plants.php";
//do initial db connect
$conn = mysqli_connect($db_host, $db_username, $db_password, "auktracker");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  }

//fakelogin
if ($_GET["logout"] == "yes") {
    session_destroy();
    header("Location: index.php");
}

if ($_GET["login"] == "yes") { 
    // Prepare and bind the SQL statement 
#echo "test";
$stmt = $conn->prepare("SELECT user_id, user_password FROM users WHERE user_username = ?"); $stmt->bind_param("s", $username); 

// Get the form data 
$username = $_POST['username']; $password = $_POST['password']; 

// Execute the SQL statement 
$stmt->execute(); $stmt->store_result(); 

// Check if the user exists 
if ($stmt->num_rows > 0) { 

// Bind the result to variables 
$stmt->bind_result($user_id, $user_password); 

// Fetch the result 
$stmt->fetch(); 

// Verify the password 
if ($password == $user_password) { 

// Set the session variables 
$_SESSION['loggedin'] = true; $_SESSION['id'] = $user_id; $_SESSION['username'] = $username; 

// Redirect to the user's dashboard 
header("Location: index.php"); exit; } else { echo "Incorrect password!"; } } else { echo "User not found!"; } 

// Close the connection 
$stmt->close();

// Set the session variables 
//$_SESSION["loggedin"] = true;
//$_SESSION["id"] = 1;
//$_SESSION["username"] = "Dr3as";
//$_SESSION["language"] = "2"; 
// Redirect to the user's dashboard 
//header("Location: index.php");
}

?>
<html>
    <head>
        <title>AukTracker</title>
    </head>
    <body>
        <h1>AukTracker</h1>Track your plants...
        <br>
        <?php
        if ($_SESSION["username"]) {
        $query_anyplanters = mysqli_query($conn, "SELECT * FROM planters WHERE planter_owner_user_id = '{$_SESSION['id']}'");
        $resultany_planters = mysqli_num_rows($query_anyplanters);

        $query_anyplants = mysqli_query($conn, "SELECT * FROM plants WHERE plant_owner_user_id = '{$_SESSION['id']}'");
        $resultany_plants = mysqli_num_rows($query_anyplants);
        echo "<br>
        <br>
        <a href=\"index.php?show=timeline\">Timeline</a>&nbsp &nbsp 
        <a href=\"index.php?show=plants\">Planters and Plants</a>&nbsp &nbsp 
        <a href=\"index.php?show=add\">Add</a>&nbsp &nbsp 
        <a href=\"index.php?show=settings\">Settings</a>
        <br>"; }
        
        if (is_null($_GET["show"])) {
            $show = "default";
             }
        else {
            
            $show = $_GET["show"];
            
        }
        if (is_null($_SESSION["username"])) {
            echo "<form action=\"index.php?login=yes\" method=\"post\">
            <label for=\"username\">Username:</label>
            <input id=\"username\" name=\"username\" required=\"\" type=\"text\" /><br>
            <label for=\"password\">Password:</label> <input id=\"password\" name=\"password\" required=\"\" type=\"password\" />
            <input name=\"login\" type=\"submit\" value=\"Login\" />
            </form>";
        }
        elseif ($show == "default"){
            if ($resultany_planters == 0) {
                echo "You have not added any planters, please click Add above";
            }
            elseif ($resultany_plants == 0) {
                echo "You have not added any plants, please click Add above";
            }
            else {
                echo "Welcome, please click on the menu above";
            }
            
            }
        elseif ($show == "timeline") {
            echo "Timeline<br>date<br>test<br>date";
        }
        elseif ($show == "plants") {
            echo "this and this planters with this and this plants";
        }
        elseif ($show == "add") {
            echo "What do you want to add, a Planter, a Plant or something on your timeline.<br><br><a href=\"index.php?show=add\">Planter</a><br><a href=\"index.php?show=add\">Plant</a><br><a href=\"index.php?show=add\">Timeline</a>";
        }
        elseif ($show == "settings") {
            echo "Settings<br>whatever...";
        }
        echo "<br>";

        if ($_SESSION["username"]) {
            echo $_SESSION['username'];
            echo "<br>";
            echo $_SESSION['id'];
            echo "<br>";
            echo $resultany_planters;
            echo "<br>";
            echo $resultany_plants;
            echo "<br><a href=\"index.php?logout=yes\">Log Out</a>";
            }
        ?>
    </body>
</html>
