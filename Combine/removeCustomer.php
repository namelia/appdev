<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Remove Customer</title>
    <link href="additemstyle.css" type="text/css" rel="stylesheet">
</head>
<div id =sidebar class="visible">
    <?php include("sidebar.php"); ?>
</div>
<body>


<div class="container">


</div>
</body>

    <?php

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $someID = $_GET['id'];
    

    
    $sql = "DELETE FROM clients WHERE `id` = $someID ";
    if ($conn->query($sql) === TRUE) {
        echo '<div id="boxes">
              <div id="dialog" class="window">

              <h1>Entry has been deleted!</h1>
              </div>
              <div id="mask"></div>
              </div>';
        echo $someID ;

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        //echo "  ID: " . $someID;
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