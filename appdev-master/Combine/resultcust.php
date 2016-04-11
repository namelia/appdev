

<?php
include('config.php');
if($_POST)
{
    $q = mysqli_real_escape_string($conn,$_POST['search']);
    $strSQL_Result = mysqli_query($conn,"select id,name,email from addcustomers where name like '%$q%' or email like '%$q%' order by id LIMIT 5");
    while($row=mysqli_fetch_array($strSQL_Result))
    {
        $username   = $row['name'];
        $email      = $row['email'];
        $b_email='<strong>'.$q.'</strong>';
        $b_username = '<strong>'.$q.'</strong>';
        $final_username = str_ireplace($q, $b_username, $username);
        $final_email = str_ireplace($q, $b_email, $email);
        ?>
        <div class="show" align="left">
          <span class="name"><?php echo  $final_username ?></span>&nbsp;<br/><?php echo  $final_email ?>
        </div>
        <?php
    }
}
?>
