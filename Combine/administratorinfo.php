<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Login information</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
</head>
<div id =sidebar class="visible">
    <?php include("sidebar.php"); ?>
</div>

<?php
if(isset($_POST['Update'])) {
    $email_ = $_POST['email'];
    $name_ = $_POST['name'];
} else {
    $email_= $_SESSION['user_info']['email'];
    $name_ = $_SESSION['user_info']['name'];
}
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
        <input class ="tb5" type= "submit" value="Update" name="Update">
    </form>
</div>
</body>

<?php
if(isset($_POST['Update']))
{
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
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
            $sql = "UPDATE login SET name = '$name_', email ='$email_' ,passhash='$passhash_'WHERE id = $id_";
            if ($conn->query($sql) === TRUE) {
                $query2= $conn->query("SELECT * FROM login WHERE `id` = '$id_'") or die ('request "Could not execute SQL query" '.$sql);
                $user= $query2->fetch_assoc();
                if(!empty($user)) {
                    $_SESSION['user_info'] = $user;
                }
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
        }
        else {
            echo '<div id="boxes">
                <div id="dialog" class="window">
                <h1>New passwords do not match...</h1>
                </div>
                <div id="mask"></div>
                </div>';
        }
    }
    else {
        echo '<div id="boxes">
                <div id="dialog" class="window">
                <h1>Old password does not match records...</h1>
                </div>
                <div id="mask"></div>
                </div>';
    }
}
$conn->close();
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