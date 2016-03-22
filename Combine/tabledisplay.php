<!DOCTYPE html>
<html lang=''>
<html>
<head>
    <title>Mobile Device Lending System</title>
    <link href="tablestyle.css" rel="stylesheet" type="text/css">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href= 'dist/css/bootstrap.css' rel='stylesheet'>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="tablescript.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<h1> Table of Items </h1>
<body>
<?php include("index.html")?>


    <div id="searchbutton">
       <?php include'searchhp.php'; ?>
    </div>

<div id="table" >
    <?php
    //connect to the database
    $servername="localhost";
    $username="root";
    $password="";
    $database="MOBILEDEVICELENDINGPROJECT";
    $conn=New mysqli($servername,$username,$password,$database);
    //query the databse
    $resultSet= $conn->query("SELECT * FROM additem");
    //returnted rows

    if ($resultSet-> num_rows!=0)
    {

        echo "<table><tr><th>ID</th> <th>Name</th> <th>Color</th> <th>OS</th> <th> Details</th></tr>";
        while ( $rows= $resultSet->fetch_assoc())
        {
            //result turns it into associative array
            $id=$rows['id'];
            $name=$rows['name'];
            $color=$rows['color'];
            $os=$rows['OS'];
            $details=$rows['details'];
            echo"<tr><td name='id' contenteditable=\"true\">$id</td>
                            <td class=\"editable-col\"  contenteditable=\"true\">$name </td>
                            <td class=\"editable-col\" contenteditable=\"true\">$color </td>
                            <td class=\"editable-col\" contenteditable=\"true\">$os </td>
                            <td class=\"editable-col\" contenteditable=\"true\">$details </td>


 " ;
        }
        echo"</table>";
    }



//turn the results into an array
//display result
    else {
        echo "No results.";
    }

    ?>
</div>
<!--
<div class="container">
    <div id='cssmenu'>
        <ul>
            <li class='active'><a href='#'><span>Home</span></a></li>
            <li class='has-sub'><a href='#'><span>Items</span></a>
                <ul>
                    <li><a href='#'><span>Mobile Phone</span></a></li>
                    <li><a href='#'><span>Tablet</span></a></li>
                    <li><a href='#'><span>Camera</span></a></li>
                    <li><a href='#'><span>Smart Devices</span></a></li>
                    <li><a href='#'><span>Others</span></a></li>
                    <li class='last'><a href='#'><span>Product 3</span></a></li>
                </ul>
            </li>
            <li class='has-sub'><a href='#'><span>Availability</span></a>
                <ul>
                    <li><a href='#'><span>Available</span></a></li>
                    <li><a href='#'><span>Overdue</span></a></li>
                    <li class='last'><a href='#'><span>Unavailable</span></a></li>
                </ul>
            </li>
            <li class='last'><a href='#'><span>All Items</span></a></li>
        </ul>
    </div>
</div>
-->
</body>




<!--<form action=" export.php" method="get">
    </br>
    <input type="submit" value="download ">
</form> -->
</body>
</html>