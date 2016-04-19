<link href="statStyle.css" rel="stylesheet">
<?php
include("statisticFunctions.php");
include("sidebar.php");
?>
   <!--Statistics Page starts here-->
   <div class="mega card">

       <div class="header">

           <h1> Statistics </h1> <br>
           <h3> Want to know what objects are the most demanded ? <br> Which ones you should try to get more of?</h3> <br>
       </div>

       <div class="containerr">
           <h4>For each category of objects (eg: Tablets, Phones...), you can see a list of companies (eg: Apple, Samsung) that sell that kind of objects. Next to those companies, you see a <strong>percentage</strong>. This shows you how <strong>successful/in demand</strong> this company's objects are at this point in time.<br><br> <i>For example, in the Phone category - if you see 90% next to Apple, it means that 90% of iPhones are currently lended.</i> </h4>
           <br>
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

            //echo "<br>"."<br>" ;

            echo "<div class='cardmin'>" ; //beginning of a card
                echo "<div class='header'>"; //beginning of title

                    echo "<h2> $categories[$i]s: </h2>" ;

                echo "</div>"; //end of title
                echo "<div class='containerr'>"; //beginning of content

                    getCompanies($categories[$i]);

                echo "</div>"; //end of content
            echo"</div>"; // end of a card
        }
        
       ?>

   </div> <!-- End of mega card -->