

<?php
include('config.php');
if($_POST)
{
    $q = mysqli_real_escape_string($conn,$_POST['search']);
    $strSQL_Result = mysqli_query($conn,"select id,name,description,OS from objects WHERE client IS NULL AND name like '%$q%' order by id LIMIT 5");
    while($row=mysqli_fetch_array($strSQL_Result))
    {
        $username   = $row['name'];
        $id         = $row['id'];
        $os         = $row['OS'];

        $b_id='<strong>'.$q.'</strong>';
        $b_os='<strong>'.$q.'</strong>';

        $b_username = '<strong>'.$q.'</strong>';
        $final_username = str_ireplace($q, $b_username, $username);
        $final_id = str_ireplace($q, $b_id, $id);
        $final_os= str_ireplace($q, $b_os, $os);

        ?>
        <div class="show" align="left">
          <span class="name"><?php echo  $final_username ?></span>&nbsp;<br/><?php echo" <span style='color:blue;'>ID</span>: $final_id" ?><?php echo"   <span style='color:blue;'>OS</span>: $final_os" ?><br/>
        </div>
        <?php
    }
}
?>
