<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add item</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
</head>
<div id =sidebar class="visible">
    <?php include("sidebar.php"); ?>
</div>
<body>


<div class="container">
    <form action="editCustomer.php?category=<?php echo $_GET['category']?>&customername=<?php echo $_GET['customername']?>&email=<?php echo $_GET['email']?>&phone=<?php echo $_GET['phone']?>&address=<?php echo $_GET['address']?>&details=<?php echo $_GET['details']?>&id=<?php echo $_GET['id']?>" method="post">
        Category:
        <select  class ="tb5"name="category">
            <option value="<?php echo $_GET['category']?>"> <?php echo $_GET["category"]; ?></option>
            <option value="Internal Customer">Internal Customer</option>
            <option value="External UCL Customer">External UCL Customer</option>
            <option value="External Other Customer">External Other Customer</option>
        </select>
        <br><br>
            Customer Name: <input   class ="tb5" type="text" name="customername" required value="<?php echo $_GET['customername']?> " ><br><br>
            Email address: <input  class ="tb5"  type="text" name="email" required  value="<?php echo $_GET['email']?> " readonly><br><br>
            Phone: <input   class ="tb5" type="text" name="phone" value="<?php echo $_GET['phone']?>" ><br><br>
            Address: <input   class ="tb5" type="text" name="address"  value="<?php echo $_GET['address']?>"> <br><br>
            Other Details:
            <br>
            <textarea  class ="tb6" name="details"rows="10"cols="20" class="form-control" rows="10"><?php echo $_GET['details']?></textarea>
            <br><br>
        <input type= "submit" value="Update" name="Update">
    </form>

</div>
</body>
<div id ="responseitem">
    <?php
    include("config.php");
    if(isset($_POST['Update']))
     {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
         //$someID = $_GET['id'];
         $category_ = $_POST['category'];
         $email_ = $_POST['email'];
         $customername_ = $_POST['customername'];

         $address_ = $_POST['address'];
         $phone_ = $_POST['phone'];
         $details_ = $_POST['details'];
         
         $id_ = ($_GET['id']);
         
         

    $sql = "UPDATE clients SET name = '$customername_', email ='$email_' ,category=' $category_',category='$category_',address='$address_',phone='$phone_',details=' $details_'WHERE id = '$id_' ";
    if ($conn->query($sql) === TRUE) {
        echo 'Details have been modified in the database! In the entry: ';
        echo $id_ ;

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    }
    ?>
</div>

</html>