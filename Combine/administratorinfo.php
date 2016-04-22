<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Login information</title>
    <link href="formstyle.css" type="text/css" rel="stylesheet">
</head>
<div id = page-wrap class="visible">
    <?php include("sidebar.php"); ?>
</div>

<?php
if(isset($_POST['updateadmin'])) {
    $email_ = $_POST['email'];
    $name_ = $_POST['name'];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo '<div id="boxes">
              <div id="dialog" class="window">
              <h1>';
    $oldpass_ = md5($_POST['oldpass']);
    $id_ = $_SESSION['user_info']['id'];
    $current_ = $conn->query("SELECT * FROM login WHERE `id` = '$id_'") or die ('request "Could not execute SQL query" '.$sql);
    $oldpass_compare = $current_->fetch_assoc()['passhash'];
    if ($oldpass_ == $oldpass_compare) {
        $passhash_ = md5($_POST['password']);
        $passhash2_ = md5($_POST['password2']);
        if ($passhash_ == md5('')) {
            $passhash_ = $oldpass_;
        }
        if ($passhash2_ == md5('')) {
            $passhash2_ = $oldpass_;
        }
        if ($passhash2_ == $passhash_) {
            $sql = "updateadmin login SET name = '$name_', email ='$email_' ,passhash='$passhash_'WHERE id = $id_";
            if ($conn->query($sql) === TRUE) {
                $query2= $conn->query("SELECT * FROM login WHERE `id` = '$id_'") or die ('request "Could not execute SQL query" '.$sql);
                $user= $query2->fetch_assoc();
                if(!empty($user)) {
                    $_SESSION['user_info'] = $user;
                }
                echo 'Details have been modified!';

            } else {
                echo '<Error: '. $sql . '<br>' . $conn->error;
            }
        }
        else {
            echo 'New passwords do not match...';
        }
    }
    else {
        echo 'Old password does not match records...';
    }
    echo '</h1>
              </div>
              <div id="mask"></div>
              </div>';
} else {
    $email_= $_SESSION['user_info']['email'];
    $name_ = $_SESSION['user_info']['name'];
}
$conn->close();
?>

<body>
<div class="inner-block container">
    <br><br>
    <form action="administratorinfo.php" method="post" autocomplete="off">
        Current password: <input class = "form-control required tb5" type="password" name="oldpass"  value=""> <br><br>
        Name: <input class ="tb5" type="text" name="name" required value="<?php echo $name_ ?>" ><br><br>
        Email address: <input class ="form-control required tb5" type="email" name="email" required  value="<?php echo $email_ ?>"><br><br>
        New password (leave blank to keep the same): <input class ="tb5" type = "password" name="password"  value=""> <br><br>
        Confirm new password: <input class ="tb5" type = "password" name="password2"  value=""> <br><br>
        <br><br>
        <input class ="tb5" type= "submit" value="Update" name="updateadmin">
    </form>
</div>
</body>
</html>