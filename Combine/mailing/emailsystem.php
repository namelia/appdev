<?php
include ("../config.php");

//This takes all clients with overdue items: /////////////////////////////////////////////
echo nl2br("getting all overdue objects : ");
$today = date("Y-m-d") ;
//echo $today ;

$clientsToMail = array();

$resultObjects= $conn->query("SELECT * FROM objects WHERE DATE(endDate) <= '$today' ");

echo "<table><tr><th>ID</th> <th>Name</th> <th>client</th> <th>date</th> </tr>";
        while ( $rows= $resultObjects->fetch_assoc())
        {
            $id=$rows['id'];
            $name=$rows['name'];
            $client=$rows['client'];

            if (!in_array($client, $clientsToMail)){
                array_push($clientsToMail, $client);
            }

            $endDate=$rows['endDate'];
            echo"<tr><td name='id' contenteditable=\"true\">$id</td>
                            <td class=\"editable-col\"  contenteditable=\"true\">$name </td>
                            <td class=\"editable-col\" contenteditable=\"true\">$client </td>
                            <td class=\"editable-col\" contenteditable=\"true\">$endDate </td> " ;
        }
        echo"</table>";




//This gets the emails of those clients: /////////////////////////////////////////////////
echo nl2br("\n \n Getting the emails of people with overdue items: ");
$arrlength = count($clientsToMail);

$mailsOfClients = array();

for($x = 0; $x < $arrlength; $x++) {
    $resultClients= $conn->query("SELECT * FROM clients WHERE name = '$clientsToMail[$x]' ");

    echo "<table> <tr><th>email</th> </tr>";
        while ( $rows= $resultClients->fetch_assoc())
        {
            $email=$rows['email'];
            array_push($mailsOfClients, $email);
            
            echo"<tr><td name='email' contenteditable=\"true\">$email</td>" ;
        }
        echo"</table>";

    
}


//This sends the email to all those people's addresses: /////////////////////////////////////////
include("samplemail.php");
include("overdue.php");
require 'phpmailer/PHPMailerAutoload.php';

$lengthArray = count($mailsOfClients);

//$msg = "yo";

for($y = 0; $y < $lengthArray; $y++) {
    echo "<br> <br>" . "Sending an email to: " . $mailsOfClients[$y] . " => " ;
    echo "This email adress is owned by: " . $clientsToMail[$y] . "<br>" ;

    $msg = getOverdueItems($clientsToMail[$y]); //gets the overdue items of the client with this email address
    echo "This is the message we're about to send:" . "<br>" ;
    echo $msg . "<br>";
    echo $mailsOfClients[$y] . "<br><br>";
    sendEmail($mailsOfClients[$y] , $msg);
    
}






