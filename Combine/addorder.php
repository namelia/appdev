<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Order</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="additemstyle.css" type="text/css" rel="stylesheet">

    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

</head>
    <div id =sidebar class="visible">
        <?php include("sidebar.php"); ?>
    </div>
<body>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

<div class="container"id ="itemcont">
<form action="addorder.php" method="post" autocomplete="off">
    <br><br>
        <div class="content">
        Device Name:    <input class ="search tb5" id ="searchitem" type="text" name="orddevicename" required  >&nbsp; <br><br>
        </div>
    <div id="resultlol"></div>
    ID:             <input  class ="ui-autocomplete-input tb5"  type="text" name="ordID" required  value=" " ><br><br>
        <label for="from">From Date :</label>
        <input class ="tb5" name="from" type="text" id="from" size="10" />
    <br><br>
        <label for="to">To Date :</label>
        <input class ="tb5" name="to" type="text" id="to" size="10"/>
    <br><br>
        Customers Name: <input  class ="searchC tb5"  id ="searchcust" type="text" name="ordcustname" required>&nbsp;<br><br>
    <div id="resultcust"></div>
    <br><br>
        <input class ="tb5"  type= "submit" value="Submit" name='submitt'>
</form>

</div>
</body>

<?php
if(isset($_POST['submitt']))
{
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $device_name = $_POST['orddevicename'];
    $id_ = $_POST['ordID'];
    $from_ = $_POST['from'];
    $to_ = $_POST['to'];
    $client_ = $_POST['ordcustname'];
    $checkAvailable = $conn->query("SELECT client FROM objects WHERE name = '$device_name' AND (client IS NOT NULL OR client != '')  ");

    if ( mysqli_num_rows($checkAvailable)==0){

        $sql = "UPDATE objects SET beginDate = '$from_' ,  endDate = '$to_' , client ='$client_'  WHERE name = '$device_name'  ";

        if ($conn->query($sql) === TRUE) {
            echo '<div id="boxes">
              <div id="dialog" class="window">

              <h1>Database has been updated!</h1>
              </div>
              <div id="mask"></div>
              </div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    }else{
         echo "This object is not available." ;
    }
}
?>
    <script>
        $(function() {
            var dates = $( "#from, #to" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 2,
                dateFormat: 'yy-mm-dd',
                onSelect: function( selectedDate ) {
                    var option = this.id == "from" ? "minDate" : "maxDate",
                        instance = $( this ).data( "datepicker" ),
                        date = $.datepicker.parseDate(
                            instance.settings.dateFormat ||
                            $.datepicker._defaults.dateFormat,
                            selectedDate, instance.settings );
                    dates.not( this ).datepicker( "option", option, date );
                }
            });
        });
    </script>


    <script type="text/javascript">
        $(function(){
            $(".search").keyup(function()
            {
                var searchitem = $(this).val();
                var dataString = 'search='+ searchitem;
                if(searchitem!='')
                {
                    $.ajax({
                        type: "POST",
                        url: "resultitem.php",
                        data: dataString,
                        cache: false,
                        success: function(html)
                        {
                            $("#resultlol").html(html).show();
                        }
                    });
                }return false;
            });

            jQuery("#resultlol").live("click",function(e){
                var $clicked = $(e.target);
                var $name = $clicked.find('.name').html();
                var decoded = $("<div/>").html($name).text();
                $('#searchitem').val(decoded);
            });
            jQuery(document).live("click", function(e) {
                var $clicked = $(e.target);
                if (! $clicked.hasClass("search")){
                    jQuery("#resultlol").fadeOut();
                }
            });
            $('#searchitem').click(function(){
            jQuery("#resultlol").fadeIn();
        });
        });
    </script>



    <script type="text/javascript">
        $(function(){
            $(".searchC").keyup(function()
            {
                var searchcust = $(this).val();
                var dataString = 'search='+ searchcust;
                if(searchcust!='')
                {
                    $.ajax({
                        type: "POST",
                        url: "resultcust.php",
                        data: dataString,
                        cache: false,
                        success: function(html)
                        {
                            $("#resultcust").html(html).show();
                        }
                    });
                }return false;
            });

            jQuery("#resultcust").live("click",function(e){
                var $clicked = $(e.target);
                var $name = $clicked.find('.name').html();
                var decoded = $("<div/>").html($name).text();
                $('#searchcust').val(decoded);
            });
            jQuery(document).live("click", function(e) {
                var $clicked = $(e.target);
                if (! $clicked.hasClass("searchC")){
                    jQuery("#resultcust").fadeOut();
                }
            });
            $('#searchcust').click(function(){
                jQuery("#resultcust").fadeIn();
            });
        });
    </script>


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


<style type="text/css">

</style>

</html>