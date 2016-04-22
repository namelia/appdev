<!DOCTYPE HTML>
<div id =sidebar class="visible">
    <?php include("sidebar.php"); ?>
</div>

<html>
<head>
    <title>Mobile Device Lending Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
</head>
<body>
    <div class="inner-block container">
        <div class="inbox" style="padding-left:100px ">
            <h2>Returns</h2>

            <div class="col-md-8 compose-right">
                <div class="inbox-details-default">
                    <div class="inbox-details-body">
                        <div class="alert alert-info" >

                            Currently overdue items:

                        </div>


                        <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Customer</th>
                                    <th>End Date</th>



                                <?php
                                $someID = -1;
                                if(isset($_POST['submit'])) {
                                    $someID = $_GET['id'];
                                }
                                $todayy = date("Y-m-d") ;
                                $sql = "SELECT * FROM objects WHERE client IS NOT NULL AND DATE(endDate) <= '$todayy' ORDER BY client, endDate";
                                if(isset($_POST['submit']) && ($someID != 0)) {
                                    $sql = "SELECT * FROM objects WHERE client IS NOT NULL AND ID != $someID AND DATE(endDate) <= '$todayy' ORDER BY client AND endDate";
                                }
                                $sql_result =$conn->query($sql) or die ('request "Could not execute SQL query" '.$sql);

                                if (($sql_result-> num_rows!=0) && ($someID != 0))
                                {
                                    echo "<td><form action=\"returns.php?id=0\" method=\"POST\">
                                    <input type=\"submit\" name=\"submit\" value=\"Return all   \"> </input></form></td>
                                    <td><form action=\"returns.php?id=0\" method=\"POST\">
                                    <input type=\"submit\" name=\"email\" value=\"Email all     \"> </input></form></td>
                                    </tr>
                                    </thead>
                                    <tbody>";
                                    $client_prev = "";
                                    while ( $row= $sql_result->fetch_assoc()) {
                                        $id_ = $row['id'];
                                        $name_ = $row['name'];
                                        $client_ = $row['client'];
                                        $endDate_ = $row['endDate'];
                                        $emailbutton_ = "<form action=\"returns.php?id=$id_\" method=\"POST\">
                                            <input type=\"submit\" name=\"email\" value=\"Email client\"> </input></form>";
                                        if ($client_prev == strtoupper($client_)) {
                                            $client_ = "";
                                            $emailbutton_ = "";
                                        } else {
                                            $client_prev = strtoupper($client_);
                                            echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
                                        }
                                        echo "
                                            <tr>
                                            <td>$id_</td>
                                            <td>$name_</td>
                                            <td>$client_</td>
                                            <td>$endDate_</td>
                                            <td><form action=\"returns.php?id=$id_\" method=\"POST\">
                                            <input type=\"submit\" name=\"submit\" value=\"Return item\"> </input></form></td>
                                            <td>$emailbutton_</td>";
                                        }
                                    } else {
                                    echo "</tr>
                                    </thead>
                                    <tbody>";
                                }
                                    ?>

                                </tbody>
                            </table>
                        </div>

                        
        </div>

    </div>


            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['submit'])) {
        $beginDate_ = " ";
        $endDate_ = " ";
        $sql_ = "UPDATE objects SET client=NULL,beginDate='$beginDate_',endDate='$endDate_'";
        if ($someID != 0) {
            $sql_ = $sql_." WHERE id ='$someID'";
        } else {
            $sql_ = $sql_." WHERE DATE(endDate) <= '$todayy'";
        }
        if ($conn->query($sql_) === TRUE) {
            echo '<div id="boxes">
              <div id="dialog" class="window">
              <h1>Database has been updated!</h1>
              </div>
              <div id="mask"></div>
              </div>';
        } else {
            echo "Error: " . $sql_ . "<br>" . $conn->error;
        }
    } elseif(isset($_POST['email'])) {
        echo '<div id="boxes">
        <div id="dialog" class="window">
        <h1>';
        $clientsToMail = array();
        $emailID = $_GET['id'];
        $emailsql = "SELECT * FROM objects WHERE client IS NOT NULL AND DATE(endDate) <= '$todayy'";
        if ($emailID != 0) {
            $emailsql = $emailsql." AND id = '$emailID'";
        }
        $resultObjects= $conn->query($emailsql) or die ('request "Could not execute SQL query" '.$emailsql);
        if (mysqli_num_rows($resultObjects)>0) {
            while ($rows = $resultObjects->fetch_assoc()) {
                $client2 = $rows['client'];

                if (!in_array($client2, $clientsToMail)) {
                    array_push($clientsToMail, $client2);
                }

                $endDate = $rows['endDate'];
            }
        }

        //This gets the emails of the clients:
        $arrlength = count($clientsToMail);

        $mailsOfClients = array();

        for($x = 0; $x < $arrlength; $x++) {
            $resultClients= $conn->query("SELECT * FROM clients WHERE name = '$clientsToMail[$x]' ");

            while ( $rows= $resultClients->fetch_assoc())
            {
                $email=$rows['email'];
                array_push($mailsOfClients, $email);
            }
        }

        //This sends the email to all those people's addresses:
        include("mailing/sendemail.php");
        include("mailing/overdue.php");
        require 'mailing/phpmailer/PHPMailerAutoload.php';

        $lengthArray = count($mailsOfClients);
        if ($lengthArray > 0) {
            for($y = 0; $y < $lengthArray; $y++) {
                $msg = getOverdueItems($clientsToMail[$y]); //Prepare the message
                sendEmail($mailsOfClients[$y], $clientsToMail[$y], $msg, $emailID);
            }
        }
        if ($emailID == 0) {
        echo "Emails sent to all clients!";
        }
        echo '</h1>
        </div>
        <div id="mask"></div>
        </div>';
    }
    $conn->close();
    ?>

    <script  type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var id = '#dialog';

//Get the screen height and width
            var maskHeight = $(document).height();
            var maskWidth = $(window).width();

//Set height and width to mask to fill up the whole screen
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
</body>