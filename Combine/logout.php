
<?php
session_name('LoginForm');
@session_start();

error_reporting(0);
include("config.php");

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/main.js"></script>
    </head>


    <body>
<?php
	$error = '';
    $email=$_POST["email"];
	$pass=$_POST["password"];
	if ($conn->connect_error)
	{
	die("Connection failed: " . $conn->connect_error);
	}
	if(isset($_POST['is_login'])){
		$query= $conn->query("SELECT * FROM php_users_login WHERE `email` = '".mysqli_real_escape_string($conn,$email)."'  AND `password` = '".mysqli_real_escape_string($conn,$pass)."'")or die ('request "Could not execute SQL query" '.$sql);
		$user= $query->fetch_assoc();
		if(!empty($user)){
			$_SESSION['user_info'] = $user;
			$query = " UPDATE `php_users_login` SET last_login = NOW() WHERE id=".$user['id'];
			mysqli_query ($conn,$query) or die ('request "Could not executee SQL query" '.$query);
		}
		else{
			$error = 'Wrong email or password.';
		}
	}
	
	if(isset($_GET['ac']) && $_GET['ac'] == 'logout'){
		session_start();
		$_SESSION['user_info'] = null;
		unset($_SESSION['user_info']);
		header ('URL=logout.php');
		session_destroy();
	}
?>
	<?php if(isset($_SESSION['user_info']) && is_array($_SESSION['user_info'])) { ?>

	    <form id="login-form" class="login-form" name="form1">
			<?php
			header("Location:index.php?status=success");
			exit(); ?>
	        <div id="form-content">
	            <div class="welcome">
					<?php echo $_SESSION['user_info']['name']  ?>, you are logged in. 
                    <br /><br />
                    <?php echo $_SESSION['user_info']['content']  ?>
                    <br /><br />

                    <a href="logout.php?ac=logout" style="color:#3ec038">Logout</a>
				</div>	
	        </div>
	
	f    <!--</form>-->
        
	<?php } else { ?>
	    <form id="login-form" class="login-form" name="form1" method="post" action="logout.php">
	    	<input type="hidden" name="is_login" value="1">
	        <div class="h1">Login </div>
	        <div id="form-content">
	            <div class="group">
	                <label for="email">Email</label>
	                <div><input id="email" name="email" class="form-control required" type="email" placeholder="Email"></div>
	            </div>
	           <div class="group">
	                <label for="name">Password</label>
	                <div><input id="password" name="password" class="form-control required" type="password" placeholder="Password"></div>
	            </div>
	            <?php if($error) { ?>
	                <em>
						<label class="err" for="password" generated="true" style="display: block;"><?php echo $error ?></label>
					</em>
				<?php } ?>
	            <div class="group submit">
	                <label class="empty"></label>
	                <div><input name="submit" type="submit" value="Submit"/></div>
	            </div>
	        </div>
	        <div id="form-loading" class="hide"><i class="fa fa-circle-o-notch fa-spin"></i></div>
	    </form>
	<?php } ?>   
    </body>
</html>
