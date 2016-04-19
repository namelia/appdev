<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type">
    <title>Add Customer</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
    <script src="js/jquery.validate.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body>
<?php include_once("sidebar.php") ;
$table= "clients";?>
<div class="inner-block container"id=custcont" >


    <form action="addcustomer.php" method="post">
        Customers Name: <input  class ="tb5" type="text" name="custname" required><br><br>
        Email address: <input  class =" form-control required tb5 " type="email" name="custemail"" required><br><br>
        Category:
        <select class ="tb5"  name="category">
            <option value="Internal Customer">Internal Customer</option>
            <option value="External UCL Customer">External UCL Customer</option>
            <option value="External Other Customer">External Other Customer</option>
        </select>
        <br><br>
        Phone: <input  class ="tb5" type="text" name="phoneno" ><br><br>
        Address:
        <br>
        <textarea  class ="tb6" name="address" rows="3" cols="10"></textarea>
        <br><br>
        Other Details:
        <br>
        <textarea  class ="tb6" name="details" rows="10" cols="20"></textarea>
        <br><br>
        <input class ="tb5"  type= "submit" value="Submit" name="submit">
    </form>
        <div class="clearfix"></div>
    </div>


<?php
if(isset($_POST['submit'])) {
    $cust_name = $_POST['custname'];
    $email_ = $_POST['custemail'];
    $category_ = $_POST['category'];
    $details_ = $_POST['details'];
    $phone_ =$_POST['phoneno'];
    $address_ =$_POST['address'];
    $sql = "INSERT INTO $table (name,email,category,details,phone,address) VALUES ('$cust_name','$email_','$category_','$details_','$phone_','$address_')";

    if ($conn->query($sql) === TRUE) {
        echo '<div id="boxes">
              <div id="dialog" class="window">

              <h1>Database has been updated!</h1>
              </div>
              <div id="mask"></div>
              </div>';
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(document).ready(function() {

var id = '#dialog';

//Get the screen height and width
var maskHeight = $(document).height();
var maskWidth = $(window).width();

//Set heigth and width to mask to fill up the whole screen
$('#mask').css({'width':maskWidth,'height':maskHeight});

//transition effect
$('#mask').fadeIn(500);
$('#mask').fadeTo("slow",0.9);

//Get the window height and width
var winH = $(window).height();
var winW = $(window).width();

//Set the popup window to center
$(id).css('top',  winH/2-$(id).height()/2);
$(id).css('left', winW/2-$(id).width()/2);

//transition effect
$(id).fadeIn(2000);

//if close button is clicked
$('.window .close').click(function (e) {
//Cancel the link behavior
e.preventDefault();

$('#mask').hide();
$('.window').hide();
});

//if mask is clicked
$('#mask').click(function () {
$(this).hide();
$('.window').hide();
});

});
</script>
</body>

</html>
