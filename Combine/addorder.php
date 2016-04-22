<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Order</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="formstyle.css" type="text/css" rel="stylesheet">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

</head>
    <div id = page-wrap class="visible">
        <?php include("sidebar.php"); ?>
    </div>
<body>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

<?php
if (isset($_POST['addorder'])) {
    $from_ = $_POST['from'];
    $to_ = $_POST['to'];
    $client_ = $_POST['client'];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $device_name = $_POST['name'];
    $id_ = 0;
    if ($_POST['id']) {
        $id_ = $_POST['id'];
    }
    $from_ = $_POST['from'];
    $to_ = $_POST['to'];
    $client_ = $_POST['client'];
    $checkAvailable = $conn->query("SELECT client FROM objects WHERE (name = '$device_name' OR id = $id_) AND (client IS NOT NULL OR client != '')")  or die ('request "Could not execute SQL query" ');
    echo '<div id="boxes">
              <div id="dialog" class="window">
              <h1>';
    if ( mysqli_num_rows($checkAvailable)==0){

        $sql = "UPDATE objects SET beginDate = '$from_' ,  endDate = '$to_' , client ='$client_'  WHERE (name = '$device_name' OR id = $id_) LIMIT 1  ";

        if ($conn->query($sql) === TRUE) {
            echo 'Order has been created!';
        } else {
            echo 'Error: '. $sql . '<br>' . $conn->error;
        }
    } else {
        echo 'This object is unavailable...';
    }
    echo '</h1>
              </div>
              <div id="mask"></div>
              </div>';
} else {
    $from_ = "";
    $to_ = "";
    $client_ = "";
}
$conn->close();
?>
    <div class="inner-block container"id ="itemcont">
        <form action="addorder.php" method="post" autocomplete="off">
            <div style ="font-size:15px"> Please enter the ID <b>or</b> name of a <b>single product at a time</b>. In the case of multiple items with the same name, the item with the smallest ID wins.
            <br><br>
            If the client wants to order multiple items at the same time, do them one by one; the From, To and Customer fields will stay filled between submissions and the Returns page will link them.
            <br><br>
            Customers must be added to the customer database in order to work with autocomplete and the overdue notification system, but can be entered free-form first and then associated with customers later.
            <br><br></div>
            <div class="content">
                <label for="name">Device name:</label>
                <input class ="search tb5" id ="searchitem" type="text" name="name">&nbsp;&nbsp;<br><br>
                <div id="resultitem"></div>
                <label for="id">ID:</label>
                <input  class ="ui-autocomplete-input tb5"  type="text" name="id"  value="" ><br><br>
                <label for="from">From date:</label>
                <input class ="tb5" name="from" type="text" id="from" size="10" value="<?php echo $from_;?>" />
                <br><br>
                <label for="to">To date:</label>
                <input class ="tb5" name="to" type="text" id="to" size="10" value="<?php echo $to_;?>" />
                <br><br>
                <label for="custname">Customer name:</label>
                <input  class ="searchC tb5"  id ="searchcust" type="text" name="client" required value="<?php echo $client_;?>">&nbsp;&nbsp;<br><br>
                <div id="resultcust"></div>
                <input class ="tb5"  type= "submit" value="Submit" name='addorder'>
        </form>

    </div>
    </body>

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
                            $("#resultitem").html(html).show();
                        }
                    });
                }return false;
            });
            jQuery("#resultitem").live("click",function(e){
                var $clicked = $(e.target);
                var $name = $clicked.find('.name').html();
                var decoded = $("<div/>").html($name).text();
                $('#searchitem').val(decoded);
            });
            jQuery(document).live("click", function(e) {
                var $clicked = $(e.target);
                if (! $clicked.hasClass("search")){
                    jQuery("#resultitem").fadeOut();
                }
            });
            $('#searchitem').click(function(){
            jQuery("#resultitem").fadeIn();
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
</html>