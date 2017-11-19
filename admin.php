<?php
include 'connect.php' ;
////////////////////////////////////////
session_start();
if( isset($_POST['log']) && isset($_POST['pass']) )
{   
	$login=$_POST['log'];
	$pass=$_POST['pass'];
	$pass_count=0;
	$log_count=0;
	for($i=0;$i<strlen($pass);$i++)
	{
		if( (  ord($pass[$i])>96 &&  ord($pass[$i]) <123) || ( ord($pass[$i])>47 &&  ord($pass[$i]) <58 ) )
			$pass_count++;	
	}
	for($i=0;$i<strlen($login);$i++)
	{
		
		if (  ( ord($login[$i])>64 &&  ord($login[$i]) <123 ) || (ord($login[$i])>47 &&  ord($login[$i]) <58) )
			$log_count++;	
	}
////////////////////////////////////////////
	if ( ($pass_count==strlen($pass)) && ($log_count==strlen($login)) && ( strlen($login)<25  ) && ( strlen($pass)<25 )  )
		{   
			$password=sha1($pass);
			$sql="SELECT * FROM `users` WHERE `name`='$login' AND `password`='$password' ";
			$res=sql_query($sql);
			if(!empty($res))
			{
				$_SESSION['login'] = true;
				header("location:admin_index.php");
			}
			else
			{ 
				echo "<script  type='text/javascript'>alert('մուտքագրել եք սխալ տվյալներ');</script>";
				header("location:admin.php");
			}
			
		}
		else
			{  
				echo "<script type='text/javascript'>alert('սխալ սիմվոլների առկայություն');</script>";
				
			}
}

?>	
<!DOCTYPE html>
<html>
  <head >
      <meta charset="UTF-8">
      <title>YeTRI</title>
      <link rel="icon" href="img/logo.jpg" sizes="16x16">
      <link rel="stylesheet" href="css/sm-core-css.css">
      <link rel="stylesheet" href="css/sm-blue.css">
      <link rel='stylesheet'  href='css/css_fontawesome/font-awesome.css'>
      <link rel='stylesheet' href='css/style.css'>
      <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
      <script src="js/jquery.min.js"></script>
      <script src="js/jquery.ehm.min.js"></script>
  </head>
<body>

<div class='sign_in'> 
	<form action='admin.php' method="post">
			<input type='text' placeholder='login'  class='login' maxlength='25' name='log' required />
			<br>
			<input type='password' required  placeholder='password' class='password' maxlength='25' name='pass'/> 
			<br>
			<button class='login_button' >մուտք</button> 
	</form>
 </div>
<a href='index.php' style='font-size:40px;margin-left:37px;color:#17bed2;'> <i class="fa fa-arrow-left " aria-hidden="true"></i>  </a>
</body>
</html>