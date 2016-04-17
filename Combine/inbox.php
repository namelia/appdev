<?php include("sidebar.php")?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Mobile Device Lending Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    // <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/buttons.css" rel="stylesheet" type="text/css" media="all">
    // <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/clndr.css" rel="stylesheet" type="text/css" media="all"/>
    //<!--js-->
    <script type="text/javascript" src="js/clndr.js"></script>
    <script type="text/javascript" src="js/underscore-min.js"></script>
    <script type="text/javascript" src="js/moment-2.2.1.js"></script>
    <script type="text/javascript" src="js/site.js"></script>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <script type="text/javascript"  src="js/skycons.js"></script>
    <script type="text/javascript"  src="js/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    //<!--icons-css-->
    <link href="css/font-awesome.css" rel="stylesheet">
    //<!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
    //<!--calendar-->
    <?php
    $tableobjects='objects';
    $tableclients='clients';
    ?>
    <!--skycons-icons-->

    <!--//skycons-icons-->
</head>
<body>
    <div class="container">
        <div class="inbox" style="padding-left:100px ">
            <h2>Automated e-mails Settings</h2>

            <div class="col-md-8 compose-right">
                <div class="inbox-details-default">
                    <div class="inbox-details-heading" style="background-color: #4CAF50 ;color:white">
                    Here, you can send emails to all owners of overdue items with one click.  <!-- <a href="mailing/someTest.php">here</a> -->
                    </div>

                    <div class="inbox-details-body">
                        <div class="alert alert-info" >
                            Today's overdue items: 
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Item</th>
                                    <th>Customers</th>
                                    <th>End Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php include("config.php");?>
                                <?php
                                $todayy = date("Y-m-d") ;
                                $sql = "SELECT * FROM $tableobjects WHERE client IS NOT NULL AND DATE(endDate) < '$todayy' ORDER BY endDate  LIMIT 6";
                                $sql_result =$conn->query($sql) or die ('request "Could not execute SQL query" '.$sql);
                                if ($sql_result-> num_rows!=0)
                                {
                                    while ( $row= $sql_result->fetch_assoc())
                                    {
                                        $id=$row['id'];
                                        $name=$row['name'];
                                        $client=$row['client'];
                                        $endDate=$row['endDate'];
                                        echo"
                                        <tr>
                                            <td>$id</td>
                                            <td>$name</td>
                                            <td>$client</td>
                                            <td>$endDate</td>";




                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>

                            <form action="mailing/someTest.php">
                                <button type="submit" class="button"> Send the emails !</button>
                            </form>


                        </div>
                    <!-- <form class="com-mail">
                        <input type="text" value="To :" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'To';}">
                        <input type="text" value="Subject :" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">

                        <textarea rows="6" value="Message :" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message </textarea> -->
                        <!-- <div class="form-group">
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"> </i> Attachment
                                <input type="file" name="attachment">
                            </div>
                        </div> -->
                        <!-- <input type="submit" value="Send Message">
                    </form> -->
                </div>
            </div>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>
</body>