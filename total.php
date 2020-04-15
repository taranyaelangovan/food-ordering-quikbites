<html>
<head>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
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
<header>
QuikBites
</header>
<body>
<div class="sidenav">
            <a href="#" onclick="history.go(-1)">Go Back to Order</a>
            <a href="homepage.php">Restaurant Selection</a>
            <a href="trial.html">Logout</a>
        </div>
<div class="section">
<?php

$val='val'.strval(0);
$price1=$_REQUEST[$val];
$qu=$_REQUEST['0'];
$no=$_REQUEST['num'];
$place=$_REQUEST['rest'];
echo "<h1>".$place."</h1>";

//echo $price1;
//echo "<br/>";
//echo $qu;
//echo $no;
$count=0;
for ($i=0;$i<$no;$i++)
{
     $quan=$_REQUEST[$i];
    if ($quan!=0)
    {
        $count=$count+1;
    }
}

if($count!=0)
{
echo "<h2 style='color: rgb(114, 25, 77);'>Order Summary</h2>";
echo "<form action='pay.php'>";
echo "<table style='text-align: left;'>";
echo "<col width='300'>";
echo "<col width='300'>";
echo "<col width='120'>";
   echo "<tr>";
    /// somewhere here??
        echo "<th>Item</th>";
        echo "<th>Unit Price</th>";
        echo "<th>Total</th>";
    echo "</tr>";

$sum=0;
for ($i=0;$i<$no;$i++)
{
    $label='l'.strval($i);
    $item=$_REQUEST[$label];
    $itemtot=0;
    $nm='val'.strval($i);
    $price=$_REQUEST[$nm];
    $quan=$_REQUEST[$i];
    $itemtot=$price*$quan;
    if ($quan!=0)
    {
        echo "<tr>";
            echo "<td>".$item."(".$quan.")"."</td>";
            echo "<td>".$price,"</td>";
            echo "<td>".$itemtot."</td>";
        echo "<tr/>";
    }
    
    $sum=$sum+$itemtot;
}
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td  style='background-color: rgb(114, 25, 77); color:white; font-size:large;'><strong>Total:</strong> ₹".$sum."</td>";
echo "</tr>";
echo "</table>";
echo "<input type='hidden' value='$sum' name='sum'>";
echo "<input type='submit' value='Proceed to Payment' class='button button3'>";

echo "<input type='hidden' value='$place' name='place'>";

echo "</form>";
}
else 
{
    echo "you haven't ordered anything from this restaurant :(";
}

?>
</div>
</body>
</html>