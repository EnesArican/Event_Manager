<!DOCTYPE html>
<head>
	<title>Create Account</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css">	
    
</head>
<body class="templatemo-bg-gray">
	<h1 class="margin-bottom-15">Create Account</h1>
	<div class="container">
		<div class="col-md-12">			
			<form class="form-horizontal templatemo-create-account templatemo-container" role="form" action="#" method="post">
				<div class="form-inner">
					<div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="first_name" class="control-label">First Name</label>
			            <input type="text" class="form-control" id="first_name" placeholder=""name="first_name">		            		            		            
			          </div>  
			          <div class="col-md-6">		          	
			            <label for="last_name" class="control-label">Last Name</label>
			            <input type="text" class="form-control" id="last_name" placeholder=""name="last_name">		            		            		            
			          </div>             
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">		          	
			            <label for="username" class="control-label">Email</label>
			            <input type="email" class="form-control" id="email" placeholder=""name="email">		            		            		            
			          </div>              
			        </div>			
			        <div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="username" class="control-label">Username</label>
			            <input type="text" class="form-control" id="username" placeholder=""name="username">		            		            		            
			          </div>
			                   
			        </div>
			        <div class="form-group">
			          <div class="col-md-6">
			            <label for="password" class="control-label">Password</label>
			            <input type="password" class="form-control" id="password" placeholder=""name="password">
			          </div>
			          <div class="col-md-6">
			            <label for="password" class="control-label">Confirm Password</label>
			            <input type="password" class="form-control" id="password_confirm" placeholder=""name="password_confirm">
			          </div>
			        </div>
			        <div class="form-group">
			       
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">
			            <input type="submit" value="Create account" class="btn btn-info">
			            <a href="login-1.php" class="pull-right">[ Login ]</a>
                             <a href="home-page.html" class="pull-right">[ Home ]</a> 
			          </div>
			        </div>	
				</div>				    	
		      </form>		      
		</div>
	</div>

	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

    
    
    
    
    
    
    
    <?php

if(isset($_POST['first_name']))
{
$dbhost = 'localhost';
$dbuser = 'project';
$dbpass = 'root';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'event_manager');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}



$first_name=$_POST["first_name"];
   
$last_name=$_POST["last_name"];
    
$email=$_POST["email"];
     
$username=$_POST["username"];
     
$password=$_POST["password"];
    
    
$password_confirm=$_POST["password_confirm"];

$sql_u ="SELECT * FROM `user_info` WHERE `username`='$username' ";
    
    $result_u = mysqli_query($conn, $sql_u );
    $array=mysqli_fetch_array($result_u,MYSQLI_NUM);  
    mysqli_free_result($result_u); 
     $name = $array[4];
    
    
    
if($password !=$password_confirm )
{?>
  <script>
   alert("Password is not match\n");    
    </script>   
    <?php
}
    else if( !$last_name )
{?>
  <script>
   alert("Please input first name\n");    
    </script>   
    <?php
}
    else if( !$email)
{?>
  <script>
   alert("Please input last name\n");    
    </script>   
    <?php
}
    else if( !$username)
{?>
  <script>
   alert("Please input username\n");    
    </script>   
    <?php
}
    else if( !$password)
{?>
  <script>
   alert("Please input password\n");    
    </script>   
    <?php
}
    
    else if( !$password_confirm)
{?>
  <script>
   alert("Please input confirm password\n");    
    </script>   
    <?php
}
    
    else if($name== $username)
    {
        ?>
  <script>
   alert("Username has exsisted\n");    
    </script>   
    <?php
    }
    
    
    
    
    
    
    
    
  else{  
$sql = "INSERT INTO user_info ".
       "(firstname,lastname,email,username,password) ".
       "VALUES ".
       "('$first_name','$last_name','$email','$username','$password')";
 $result = mysqli_query($conn, $sql );   
    

    
    
if( !$result )
{?>
  <script>
   alert("error\n");    
    </script>   
    <?php
}
    else{
        
    

    mysqli_close($conn);
?>
    <script>
alert("Entered data successfully\n");    
    </script>
    <?php
    }
  }
}
      ?>
</body>


</html>