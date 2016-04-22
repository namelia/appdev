<?php

function getOverdueItems($clientName){
        include ("config.php");
		$todayy = date("Y-m-d") ;
		$resultOverdue= $conn->query("SELECT * FROM objects WHERE DATE(endDate) < '$todayy' AND client = '$clientName' ");
		$overdueItems = array();

        while ( $rows= $resultOverdue->fetch_assoc())
        {
            $itemName=$rows['name'];
            $itemid=$rows['id'];
            $duedate=$rows['endDate'];
            array_push($overdueItems, $itemName.", with ID ".$itemid.", due back on ".$duedate);
        }

        $lengthA = count($overdueItems);
        $msg = "Dear ".$clientName.",\n\nWe're glad you are using our service. However, we've noticed that you have some overdue items we'd like to get back.\n\n";
        for($z = 0; $z < $lengthA; $z++) {
    	  $msg = $msg . $overdueItems[$z] . "\n";
		}
        $msg = $msg."\nThank you for using our service. Please contact us if you have any concerns or feedback, or wish to extend your usage.\n\nUCL Device Lab";

		return $msg;

}


?>


