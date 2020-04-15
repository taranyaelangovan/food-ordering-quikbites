<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style2.css">
    <style>
                    .sidenav {
  height: 581px; /* Full-height: remove this if you want "auto" height */
  width: 160px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  background-color: #111; /* Black */
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px;
}

/* The navigation menu links */
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 22px;
  color: rgb(255, 206, 235);
  display: block;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Style page content */
.section {
  margin-left: 160px; /* Same as the width of the sidebar */
  
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
    </style>
    </head>
    <header>
        QuikBites
    </header>
    <body>
        <div class="sidenav">
            <a href="#" onclick="history.go(-3)">Go Back to Order</a>
            <a href="homepage.php">Restaurant Selection</a>
            <a href="trial.html">Logout</a>
        </div>
        <div class="section">
            <?php
            $place=$_REQUEST['add'];
            $person=$_REQUEST['fname'];
            echo "<br/><br/><br/>";
            echo "<p style='text-align:center;'> Your order will be delivered to ".$person." <br/>at ".$place." in approximately 30 mins.<br/>Your driver will be contacting you shortly.
            <br/>Thank you for ordering on QuikBites!</p>";
            ?>
        </div>
    </body>
</html>