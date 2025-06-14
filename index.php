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
        <a href="index.php?show=timeline">Timeline</a>&nbsp &nbsp <a href="index.php?show=stats">Stats</a>&nbsp &nbsp <a href="index.phpshow=add">Add</a>&nbsp &nbsp <a href="index.php?show=settings">Settings</a>
        <?php
        $show == "default";
        if $_GET['show']:
        $show == $_GET['show'];
        endif;
        if $show = "default":
            echo "Default";
        endif;
        ?>
    </body>
</html>
