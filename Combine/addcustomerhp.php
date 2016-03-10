<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add item</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form action="additem.php" method="post">
        Customers Name: <input  type="text" name="custname" required><br><br>
        Email address: <input  type="text" name="custemail" required><br><br>
        Color:
        <select  name="category">
            <option value="0">Internal customer</option>
            <option value="1">External UCL customer</option>
            <option value="2">External other customers</option>
        </select>
        <br><br>
        <!--data from wikipedia-->
        Other Details:
        <br>
        <textarea name="details"rows="10"cols="20"></textarea>
        <br><br>
        <input type= "submit" value="Submit" name="submit">
    </form>

</div>
</body>

</html>