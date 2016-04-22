<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer details</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
</head>
<div id =sidebar class="visible">
    <?php include("sidebar.php"); ?>
</div>
<body>
<?php
if (!isset($_POST['Update']))
{?>
<div class="inner-block container">
    <form action="editCustomer.php?category=<?php echo $_GET['category']?>&customername=<?php echo $_GET['customername']?>&email=<?php echo $_GET['email']?>&phone=<?php echo $_GET['phone']?>&address=<?php echo $_GET['address']?>&details=<?php echo $_GET['details']?>&id=<?php echo $_GET['id']?>" method="post" autocomplete="off">
        This page will update the client database as well as every order that is currently made under that customer's name.
        <br><br>
        Please note that the order system cannot distinguish between two customers with the same name.
        <br><br>
        Category:
        <select  class ="tb5"name="category">
            <option value="<?php echo $_GET['category']?>"> <?php echo $_GET["category"]; ?></option>
            <option value="Internal Customer">Internal Customer</option>
            <option value="External UCL Customer">External UCL Customer</option>
            <option value="External Other Customer">External Other Customer</option>
        </select>
        <br><br>
            Customer name: <input   class ="tb5" type="text" name="customername" required value="<?php echo $_GET['customername']?>" ><br><br>
            Email address: <input  class ="form-control required tb5" type="email" name="email" required  value="<?php echo $_GET['email']?>"><br><br>
            Phone: <input   class ="tb5" type="text" name="phone" value="<?php echo $_GET['phone']?>" ><br><br>
            Address: <input   class ="tb5" type="text" name="address"  value="<?php echo $_GET['address']?>"> <br><br>
            Other details:
            <br>
            <textarea  class ="tb6" name="details"rows="10"cols="20" class="form-control" rows="10"><?php echo $_GET['details']?></textarea>
            <br><br>
        <input class ="tb5" type= "submit" value="Update" name="Update">
    </form>
</div>
<?php } else { ?>
    <div class="inner-block container">
        <form action="editCustomer.php?category=<?php echo $_POST['category']?>&customername=<?php echo $_POST['customername']?>&email=<?php echo $_POST['email']?>&phone=<?php echo $_POST['phone']?>&address=<?php echo $_POST['address']?>&details=<?php echo $_POST['details']?>&id=<?php echo $_POST['id']?>" method="post" autocomplete="off">
            This page will update the client database as well as every order that is currently made under that customer's name.
                <br><br>
                Please note that the order system cannot distinguish between two customers with the same name.
            <br><br>
            Category:
            <select  class ="tb5"name="category">
                <option value="<?php echo $_POST['category']?>"> <?php echo $_POST["category"]; ?></option>
                <option value="Internal Customer">Internal Customer</option>
                <option value="External UCL Customer">External UCL Customer</option>
                <option value="External Other Customer">External Other Customer</option>
            </select>
            <br><br>
            Customer name: <input   class ="tb5" type="text" name="customername" required value="<?php echo $_POST['customername']?>" ><br><br>
            Email address: <input  class ="form-control required tb5" type="email" name="email" required  value="<?php echo $_POST['email']?>"><br><br>
            Phone: <input   class ="tb5" type="text" name="phone" value="<?php echo $_POST['phone']?>" ><br><br>
            Address: <input   class ="tb5" type="text" name="address"  value="<?php echo $_POST['address']?>"> <br><br>
            Other details:
            <br>
            <textarea  class ="tb6" name="details"rows="10"cols="20" class="form-control" rows="10"><?php echo $_POST['details']?></textarea>
            <br><br>
            <input class ="tb5" type= "submit" value="Update" name="Update">
        </form>
    </div>
<?php } ?>
</body>

    <?php
    if(isset($_POST['Update']))
     {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
         $category_ = $_POST['category'];
         $email_ = $_POST['email'];
         $customername_ = $_POST['customername'];

         $address_ = $_POST['address'];
         $phone_ = $_POST['phone'];
         $details_ = $_POST['details'];
         
         $id_ = ($_GET['id']);
         $prevcustomername_ = $_GET['customername'];
         
         

    $sql = "UPDATE clients SET name = '$customername_', email ='$email_' ,category=' $category_',category='$category_',address='$address_',phone='$phone_',details=' $details_'WHERE id = '$id_'";
    $sql2 = "UPDATE objects SET client = '$customername_' WHERE client = '$prevcustomername_'";

    if (($conn->query($sql) === TRUE) && ($conn->query($sql2) === TRUE)) {

        echo '<div id="boxes">
              <div id="dialog" class="window">

              <h1>Details have been modified!</h1>
              </div>
              <div id="mask"></div>
              </div>';
    } else {
        echo '<div id="boxes">
              <div id="dialog" class="window">

              <h1>Error: '. $sql . '<br>' . $conn->error .'</h1>
              </div>
              <div id="mask"></div>
              </div>';
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


</html>