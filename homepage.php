<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Sofia&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title></title>
    </title>
    <script src="public/3b-demo.js"></script>
   <style>
    label{
            font-size: x-large;
        }
     button{
      font-family: 'Muli';
      height: 60px;
    }
    select{
      font-size: smaller;
      background: transparent;
      line-height: 1;
      border: 0;
      padding: 0;
      border-radius: 0;
      width: 150px;
      position: relative;
      z-index: 10;
    }
    h3{
      font-family: 'Sofia';
    }
   </style>
  
  </head>
  <body>
    <div style="height: max-content; width:300px; padding-top: 20px; padding-left: 20px; padding-right: 20px;" >
    <h1>Hi!</h1>
    <h3>Where do you want to order from?</h3>
    
    <form id="sel-form" style="font-size: 22px;" action="display.php" method="POST">
        <table style="text-align: left;">
          <tr>
            <td>
              <label for="sel-country">City: </label>
            </td>
            <td>
              <select name="city" id="sel-country"></select>
            </td>
           </tr>
           <tr>  
            <td>
              <label for="sel-state">Area: </label>
            </td>
            <td>
              <select name="area" id="sel-state"></select>
            </td>
          </tr>
          <tr>
            <td>
              <label for="sel-city">Restaurant: </label>
            </td>
            <td>
              <select name="place" id="sel-city"></select>
            </td>
          </tr>
        </table>
        <br/>
        <input class="button button1" type="submit" value="Go"/>
    </form>
    </div>
  </body>
</html>