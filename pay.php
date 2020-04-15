
<?php
$tot=$_REQUEST['sum'];
//echo $tot;
?>

<html> 
  
<head> 
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src= 
   "https://code.jquery.com/jquery-1.12.4.min.js"> 
    </script> 
    <style type="text/css"> 
        .selectt { 
            color: #fff; 
            padding: 30px; 
            display: none; 
            margin-top: 30px; 
            width: 30%; 
            background: rgb(114, 25, 77);
        } 
          
        label { 
            margin-right: 20px; 
        } 
        input[type=text] {
    background: transparent;
    border: none;
    border-bottom: 1px solid #ffffff;
}
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
  
<body> 

    <?php
        //$place=$_REQUEST['place'];
        //echo $place;
       // echo "<input type='hidden' value='$place' name='place'>";
    ?>
    <header>
        QuikBites
    </header>
        <div class="sidenav">
        <a href="#" onclick="history.go(-2)">Go Back to Order</a>
        <a href="homepage.php">Restaurant Selection</a>
        <a href="trial.html">Logout</a>
    </div>
    <div class="section">
        <h1>  
          Select Mode of Payment 
        </h1> 
        <div> 
            <label> 
                <input type="radio" name="rad" value="COD"> Cash On Delivery (we only support COD at the moment)
            </label>
        </div> 
        <div  class="COD selectt"> 
            <h2 style="font-size: xx-large;">Enter Details to confirm order</h2>
            <?php
           // $tot=$_REQUEST['sum'];
            //echo $tot;
            echo '
            <form style="font-size: smaller;" action="submitorder.php">
                <table>
                    <tr>
                        <td>
                            Full Name 
                        </td>
                        <td>
                            <input type="text" name="fname" id="fname" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Address  
                        </td>
                        <td>
                            <input type="text" name="add" id="add" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Phone Number
                        </td>
                        <td>
                            <input type="text" name="ph" id="ph" required>
                        </td>
                    </tr>
                    <br/>
                </table>
                <br/>
                <input type="submit" class="button button3" value="Confirm Order for ₹'.$tot.' ">
            </form>
            ';
            ?>
        </div> 
        <script type="text/javascript"> 
            $(document).ready(function() { 
                $('input[type="radio"]').click(function() { 
                    var inputValue = $(this).attr("value"); 
                    var targetBox = $("." + inputValue); 
                    $(".selectt").not(targetBox).hide(); 
                    $(targetBox).show(); 
                }); 
            }); 
        </script> 
    </div>
    
</body> 
  
</html> 