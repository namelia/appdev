<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type">
    <title>Add Customer</title>
        <link href="formstyle.css" type="text/css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script type ="text/javascript" src="js/main.js"></script>
</head>

<body>
<div id = page-wrap class="visible">
    <?php include("sidebar.php"); ?>
</div>
<div class="inner-block container"id=custcont" >
    <form action="addclient.php" method="post" autocomplete="off">
        <div style ="font-size:15px">Please enter the name, email address and category of a single customer. The other fields are not required, but make management easier.
        <br><br>
        Please note that the order system cannot distinguish between two customers with the same name.
        <br><br></div>
        Customer name: <input  class ="tb5" type="text" name="name" required><br><br>
        Email address: <input  class =" form-control required tb5 " type="email" name="email"" required><br><br>
        Category:
        <select class ="tb5"  name="category">
            <option value="Internal Customer">Internal Customer</option>
            <option value="External UCL Customer">External UCL Customer</option>
            <option value="External Other Customer">External Other Customer</option>
        </select>
        <br><br>
        Phone: <input  class ="tb5" type="text" name="phone" ><br><br>
        Address:
        <br>
        <textarea  class ="tb6" name="address" rows="3" cols="10"></textarea>
        <br><br>
        Other details:
        <br>
        <textarea  class ="tb6" name="details" rows="10" cols="20"></textarea>
        <br><br>
        <input class ="tb5"  type= "submit" value="Submit" name="addcustomer">
    </form>
        <div class="clearfix"></div>
    </div>

<?php
if(isset($_POST['addcustomer'])) {
    $name = $_POST['name'];
    $email_ = $_POST['email'];
    $category_ = $_POST['category'];
    $details_ = $_POST['details'];
    $phone_ =$_POST['phone'];
    $address_ =$_POST['address'];
    $sql = "INSERT INTO clients (name,email,category,details,phone,address) VALUES ('$name','$email_','$category_','$details_','$phone_','$address_')";
    echo '<div id="boxes">
              <div id="dialog" class="window">
              <h1>';
    if ($conn->query($sql) === TRUE) {
        echo 'Client has been created!';
    }
    else {
        echo 'Error: '. $sql . '<br>' . $conn->error;
    }
    echo '</h1>
              </div>
              <div id="mask"></div>
              </div>';
    $conn->close();
}
?>
</body>
</html>
