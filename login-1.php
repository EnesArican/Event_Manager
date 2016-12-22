<!DOCTYPE html>
<head>
	<title>Login One</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">Login Form One</h1>
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="#" method="post">				
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<label for="username" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
		            	<input type="text" class="form-control" id="username" placeholder="Username"name="username">
		            </div>		            	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
		            	<input type="password" class="form-control" id="password" placeholder="Password"name="password">
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
	             	<div class="checkbox control-wrapper">
	                	<label>
	                  		<input type="checkbox"> Remember me
                		</label>
	              	</div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		          		<input type="submit" value="Log in" class="btn btn-info">
		          		<a href="forgot-password.html" class="text-right pull-right">Forgot password?</a>
		          	</div>
		          </div>
		        </div>
		        <hr>
		        <div class="form-group">
		        	<div class="col-md-12">
		        		<label>Login with: </label>
		        		<div class="inline-block">
		        			<a href="#"><i class="fa fa-facebook-square login-with"></i></a>
			        		<a href="#"><i class="fa fa-twitter-square login-with"></i></a>
			        		<a href="#"><i class="fa fa-google-plus-square login-with"></i></a>
			        		<a href="#"><i class="fa fa-tumblr-square login-with"></i></a>
			        		<a href="#"><i class="fa fa-github-square login-with"></i></a>
		        		</div>		        		
		        	</div>
		        </div>
		      </form>
		      <div class="text-center">
		      	<a href="create-account.php" class="templatemo-create-new">Create new account <i class="fa fa-arrow-circle-o-right"></i></a>	
		      </div>
		</div>
	</div>
    
    <?php

if(isset($_POST['username'],$_POST['password']))
{
$dbhost = 'localhost';
$dbuser = 'project';
$dbpass = 'root';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'event_manager');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

     
$username=$_POST["username"];
     
$password=$_POST["password"];
    
/*echo($username);*/
/*echo($password);   */


$sql_u ="SELECT * FROM `user_info` WHERE `username`='$username' "; 

     $result_u = mysqli_query($conn, $sql_u );
/*    if (!$result_u) {
 printf("Error: %s\n", mysqli_error($conn));
 exit();
}*/
/*$row_u=$result_u->fetch_row();*/
$array=mysqli_fetch_array($result_u,MYSQLI_NUM);  
  mysqli_free_result($result_u);   
    
/*    var_dump($row_u);
 */
    /*var_dump($array);*/ 
  $name = $array[4];
  $pass = $array[5];
    /*echo ($name); */  
   /* echo"hello world!";*/
  
   /* $result_p = mysqli_query($conn, $sql_p );
   $row_p=$result_p->fetch_row(); 
    
 var_dump($row_p);*/
    /*var_dump($array); */
    

  
  /*var_dump($result_p);
      */
    
  
    
    
    
    
if(!$username || !$password)    
    {?>
    <script>
        alert("Please fill in Username and Password!");
      </script>   
    <?php
    }
  else { 
if($name == $username && $pass== $password)
{?>
  <script>
      alert("Login successfull");
 window.location.href="forgot-password.html";

      
    </script>   
    <?php
}

   else if($name == $username && $pass !== $password)
   {
       ?>
    <script>
alert("Password is wrong!"); 
    </script>
    <?php
   } 
     else if(!$name )
   {
       ?>
    <script>
alert("Can not find the user!"); 
    </script>
    <?php
   } 

    mysqli_close($conn);

    }
}
      ?>
    
</body>
</html>