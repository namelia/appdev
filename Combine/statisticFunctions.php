<?php


function getStatistic($category, $company_name){
        //echo "in the statisticFunction";
        //Just replace the second root (which is the password) with '' if you're on Windows
		//$conn=New mysqli('localhost','root','root','mobiledevicelendingproject');
        include("config.php");
		
        //Get all the items in that category (eg phones) from that company
		$allObjects= $conn->query("SELECT * FROM objects WHERE category = '$category' AND manufacturer = '$company_name' ");
		$nbTotalObj = mysqli_num_rows($allObjects);

        //Get all the items in that category+company that are currently in use

        $objectsTaken = $conn->query("SELECT * FROM objects WHERE category = '$category' AND manufacturer = '$company_name' AND (client IS NOT NULL OR client != '') ");
        $nbTakenObj = mysqli_num_rows($objectsTaken);
        //echo $nbTakenObj . "<br>" ;

		//echo $nbTotalObj . "<br>" ;

		//echo "<table> <th>Items:</th> </tr>";
        // while ( $rows= $allObjects->fetch_assoc())
        // {
            //$itemName=$rows['name'];
            

            //echo"<tr> <td class=\"editable-col\"  contenteditable=\"true\">$itemName </td> " ;

        //}
        //echo"</table>";

		

        //echo "number of total objects of this company: " . $nbTotalObj . " nb of taken obj of this company: " . $nbTakenObj . "<br>";
        if ($nbTotalObj == 0)
            return 0;
        else
		    return (($nbTakenObj / $nbTotalObj)*100);

}



function getCompanies($category){
    include("config.php");

    $companies = array();
    $resultCompanies = $conn->query("SELECT * FROM objects WHERE category = '$category' ");

    //echo "<table> <th>Companies:</th> </tr>";

    while ( $rows= $resultCompanies->fetch_assoc()){
        $company=$rows['manufacturer'];
        if (!in_array($company, $companies)){
         array_push($companies, $company);
         $nb = getStatistic($category, $company);
         echo "<p> <em>$company:</em><strong> $nb% </strong><i>of objects</i></p>";
         //echo"<tr> <td class=\"editable-col\"  contenteditable=\"true\">$company: $nb </td> " ;
         //echo"<tr> <td class=\"editable-col\"  contenteditable=\"true\"> </td> " ;
        }
        
    }

    echo"</table>";

    
}










?>


