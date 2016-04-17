<?php
include ("../config.php");

function getOverdueItems($clientName){
        //Just replace the second root (which is the password) with '' if you're on Windows
		 $conn=New mysqli('localhost','root','','mobiledevicelendingproject');
        //include("../config.php");
		$todayy = date("Y-m-d") ;
		$resultOverdue= $conn->query("SELECT * FROM objects WHERE DATE(endDate) < '$todayy' AND client = '$clientName' ");
		$overdueItems = array();
		echo $clientName ;

		echo "<table> <th>Items:</th> </tr>";
        while ( $rows= $resultOverdue->fetch_assoc())
        {
            $itemName=$rows['name'];
            array_push($overdueItems, $itemName);

            echo"<tr> <td class=\"editable-col\"  contenteditable=\"true\">$itemName </td> " ;

        }
        echo"</table>";

        $lengthA = count($overdueItems);
        $msg = "Hello, we're glad you are using our devices, but we noticed that you unfortunately have have some overdue items we'd like to get back: ";
        for($z = 0; $z < $lengthA; $z++) {
    	  $msg = $msg . $overdueItems[$z]  ;
		}

		return $msg;

}


?>


