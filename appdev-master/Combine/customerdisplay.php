<!DOCTYPE html>
<html lang=''>
<html>
<head>
    <title>Mobile Device Lending System</title>
    <link href="tablestyle.css" rel="stylesheet" type="text/css">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="tablescript.js"></script>
</head>
<h1> Table of Items </h1>
<body>
<div class="container">

<div id="table" >
    <?php
    //connect to the database
    // $servername="localhost";
    // $username="root";
    // $password="root";
    // $database="MOBILEDEVICELENDINGPROJECT";
    // $conn=New mysqli($servername,$username,$password,$database);
    include("config.php");
    //query the databse
    $resultSet= $conn->query("SELECT * FROM addcustomers");
    //returnted rows

    if ($resultSet-> num_rows!=0)
    {

        echo "<table><tr><th>Name</th> <th>Email Address</th><th> Details</th></tr>";
        while ( $rows= $resultSet->fetch_assoc())
        {
            //result turns it into associative array
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