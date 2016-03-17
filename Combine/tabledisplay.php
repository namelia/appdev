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
</head>
<h1> Table of Items </h1>
<body>
<div class="container">
<div id='cssmenu'>
    <!--This is a copy paste from searchhp.php -->
    <form action='search.php' method="POST">
        <input type="text" name="search">
        <input type="submit">
    </form>
    
    
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

<div id="table" >
    <?php
    //connect to the database
    $servername="localhost";
    $username="root";
    $password="";
    $database="MOBILEDEVICELENDINGPROJECT";
    $conn=New mysqli($servername,$username,$password,$database);
    $searchq=$_POST['search']; //copied from search.php
    //Instead of querrying everything from the database, shows only the relevant info of the table
    $resultSet= $conn->query("SELECT * FROM additem WHERE name like ('%$searchq%') OR color like ('%$searchq%')or  details like ('%$searchq%')");;
    //returned rows

    if ($resultSet-> num_rows!=0)
    {

        echo "<table><tr><th>ID</th> <th>Name</th> <th>Color</th> <th>OS</th> <th> Details</th></tr>";
        while ( $rows= $resultSet->fetch_assoc())
        {
            //result turns it into associative array
            //Hmmmm i have a problem:
            /* This is the code in search.php to get the table's info..
            $name= $row['name'];
            $id=$row['id'];
            $color=$row['color'];
            $details=$row['details'];
            ... but the thing is, this block is different from what s down here. Which one is correct?
            */
            $id=$rows['id'];
            $name=$rows['name'];
            $color=$rows['color'];
            $os=$rows['OS'];
            $details=$rows['details'];
            echo"<tr><td name='id'>$id</td> <td>$name</td> <td>$color</td> <td>$os</td> <td>$details</td></tr>" ;
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
</div>

</body>



<!--<form action=" export.php" method="get">
    </br>
    <input type="submit" value="download ">
</form> -->
</body>
</html>
