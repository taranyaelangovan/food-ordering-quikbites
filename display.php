<html>
    <head>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script>
        
    </script>
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
            <a href="#" onclick="window.location.reload(true);">Refresh</a>
            <a href="homepage.php">Restaurant Selection</a>
            <a href="trial.html">Logout</a>
        </div>

        <div class="section">
        <?php
        $link = mysqli_connect("localhost","root","", "donut");

        $area_id = mysqli_real_escape_string($link, $_REQUEST['area']);
        $place_id =mysqli_real_escape_string($link, $_REQUEST['place']);
        $city_id=mysqli_real_escape_string($link,$_REQUEST['city']);

        //echo $area_id;
        //echo $place_id;
        //echo $city_id;

        $query="select name, price from food where place_id='$place_id' and area_id='$area_id'";
        $place_id=$place_id+1;
        $qu="select place_name from places where place_id='$place_id' and area_id='$area_id'";

        if($result = mysqli_query($link, $qu)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<h1>".$row['place_name']."</h1>";
                    $rest=$row['place_name'];
                }
            }
        }

        $i=0;
        
        if($result = mysqli_query($link, $query)){
            if(mysqli_num_rows($result) > 0){
                
                echo "<form action='total.php'>";
                echo "<table style='text-align: left;'>";
                echo "<col width='500'>";
                echo "<col width='300'>";
                echo "<col width='300'>";
                   echo "<tr>";
                    /// somewhere here??
                        echo "<th>Item</th>";
                        echo "<th>Price</th>";
                        echo "<th>Quantity</th>";
                    echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td> <input type='number' id='quantity' name='$i' value='0' min='0' max='15'> </td>";
                        $nm='val'.strval($i);
                        $cost=$row['price'];
                        $label='l'.strval($i);
                        $item=$row['name'];
                        echo "<input type='hidden' name='$nm' value='$cost'>";
                        echo "<input type='hidden' name='$label' value='$item'>";
                        $i=$i+1;
                    echo "</tr>";
                }
                echo "<input type='hidden' name='num' value='$i'>";
                echo "<input type='hidden' name='rest' value='$rest'>";
               // echo $cost[1];
                echo "<tr>";
                    //
                echo "</tr>";
                echo "</table>";
                echo '<br/><input type="submit" style="align-self:right;" class="button button1" value="Go!">';
                echo "</form>";
                // Free result set
                mysqli_free_result($result);
            } else{
                echo "No records matching your query were found.";
            }
        }
        ?>
        </div>
    </body>
</html>