<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add item</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
</head>
<div id =sidebar class="visible">
    <?php include("index.html"); ?>
</div>
<body>


<div class="container">
<form action="additem.php" method="post">
    Device Name: <input  type="text" name="devicename" required><br><br>
    ID: <input  type="text" name="ID" required><br><br>
    Color:
    <select  name="color">
        <option value="none"></option>
        <option value="Black">Black</option>
        <option value="White">White</option>
        <option value="Gray">Gray</option>
        <option value="Silver">Silver</option>
        <option value="Gold">Gold</option>
        <option value="Blue">Blue</option>
        <option value="Red">Red</option>
        <option value="Others">Others</option>
    </select>
    <br><br>
    Operating System:
    <select  name="OS">
        <option value="IOS">IOS</option>
        <option value="Android">Android</option>
        <option value="Firefox OS">Firefox OS</option>
        <option value="Windows Phone">Windows Phone</option>
        <option value="Blackberry">Blackberry</option>
        <option value="Tizen">Tizen</option>
        <option value="Sailfish OS">Sailfish OS</option>
        <option value="Ubuntu Touch OS">Ubuntu Touch OS</option>
        <option value="None">None</option>
        <option value="Others">Others</option>
    </select>
    <br><br>
    <!--data from wikipedia-->
    Description:
    <br>
    <textarea name="message"rows="10"cols="20"></textarea>
    <br><br>
    <input type= "submit" value="Submit" name="submit">
</form>

</div>
</body>

</html>