<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add item</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
    <script src="js/jquery.validate.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
<?php include ("index.html") ?>
<div class="container">
    <form action="addcustomer.php" method="post">
        Customers Name: <input  type="text" name="custname" required><br><br>
        Email address: <input  type="text" name="custemail" class="form-control required" type="email" required><br><br>
        Category:
        <select  name="category">
            <option value="0">Internal customer</option>
            <option value="1">External UCL customer</option>
            <option value="2">External other customers</option>
        </select>
        <br><br>
        <!--data from wikipedia-->
        Other Details:
        <br>
        <textarea name="details" rows="10" cols="20"></textarea>
        <br><br>
        <input type= "submit" value="Submit" name="submit">
    </form>

</div>
</body>

</html>