<link href="statisticstyle.css" rel="stylesheet">
<div id= page-wrap class="visible">
    <?php include("sidebar.php"); ?>
</div>
<?php
include("statisticfunctions.php");
?>
   <!--Statistics Page starts here-->
   <div class="mega card">

       <div class="header">
           <h1> Statistics </h1> <br>
       </div>

       <div class="containerr">
           <h4><em>(units expressed in % of devices of each company currently in use) </em> </h4>
       </div>
       <?php

        $resultCategories= $conn->query("SELECT category FROM objects ");
        $categories = array();
        
        //1: getting all the existing categories: réussi !
        while ( $rows= $resultCategories->fetch_assoc())
        {
            $category=$rows['category'];
            if (!in_array($category, $categories)){
                array_push($categories, $category);
            }
        }
        //finished finding the categories
        

        $lengthA = count($categories); 
        for ($i=0; $i < $lengthA; $i++) { //for each category...
            //...find all the companies/manufacturers (eg Apple ,Samsung..) and their percentage of use
            echo "<div class='cardmin'>" ; //beginning of a card
                echo "<div class='header'>"; //beginning of title

                    echo "<em> $categories[$i]: </em>" ;

                echo "</div>"; //end of title
                echo "<div class='containerr'><h4>"; //beginning of content

                    getCompanies($categories[$i]);

                echo "</h4></div>"; //end of content
            echo"</div>"; // end of a card
        }
        
       ?>

   </div> <!-- End of mega card -->