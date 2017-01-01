
<?php
session_start();
?>

<!DOCTYPE html>
<head>
	<title>Create Event</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../create-account.php"></script>
</head>
<body class="templatemo-bg-gray">
	<h1 class="margin-bottom-15">Create Event</h1>
	<div class="container">
		<div class="col-md-12">			
			<form class="form-horizontal templatemo-create-account templatemo-container" role="form" action="#" method="post">
				<div class="form-inner">
					<div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="event_name" class="control-label">Event Name</label>
			            <input type="text" class="form-control" id="event_name" placeholder=""name="event_name">		            		            		            
			          </div>  
			          <div class="col-md-6">		          	
			            <label for="location" class="control-label">Location</label>
			            <input type="text" class="form-control" id="location" placeholder=""name="location">		            		            		            
			          </div>             
			        </div>
                    <div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="ticket_amount" class="control-label">Ticket Amount</label>
			            <input type="text" class="form-control" id="ticket_amount" placeholder=""name="ticket_amount">		            		            		            
			          </div>  
			          <div class="col-md-6">		          	
			            <label for="price" class="control-label">Price</label>
			            <input type="text" class="form-control" id="price" placeholder=""name="price">		            		            		            
			          </div>             
			        </div>
                    <div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="date" class="control-label">Date</label>
			            <input type="date" class="form-control" id="date" placeholder=""name="date">		            		            		            
			          </div>  
			          <div class="col-md-6">		          	
			            <label for="time" class="control-label">Time</label>
			            <input type="time" class="form-control" id="time" placeholder=""name="time">		            		            		            
			          </div>             
			        </div>
			    		
			        <div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="end_date" class="control-label">End Sale Date</label>
			            <input type="date" class="form-control" id="end_date" placeholder=""name="end_date">		            		            		            
			          </div>  
			          <div class="col-md-6">		          	
			            <label for="end_time" class="control-label">End Sale Time</label>
			            <input type="time" class="form-control" id="end_time" placeholder=""name="end_time">		            		            		            
			          </div>             
			        </div>
                    <div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="description" class="control-label">Description</label>
			            <input type="text" class="form-control" id="description" placeholder=""name="description">		            		            		            
			          </div>  
			          <div class="col-md-6">		          	
			            <label for="category" class="control-label">Category</label>
                          <select type="text" class="form-control" id="category" name="category">
                              <option value="Other">Other</option>
                              <option value="Classical">Classical</option>
                              <option value="Hip Hop">Hip Hop</option>
                              <option value="Rock">Rock</option>
                              <option value="Techno">Techno</option>
                              <option value="Jazz">Jazz</option>
                              <option value="R&B">R&B</option>
                              <option value="Rap">Rap</option>
                          </select></div>
			        </div>
			    	
                    
			        <div class="form-group">
			          <div class="col-md-12">
			            <input type="submit" value="Create account" class="btn btn-info">
			            <a href="login-1.php" class="pull-right">Home</a>
			          </div>
			        </div>	
				</div>				    	
		      </form>		      
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="templatemo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Terms of Service</h4>
	      </div>
	      <div class="modal-body">
	      	<p>This form is provided by <a rel="nofollow" href="http://www.cssmoban.com/page/1">Free HTML5 Templates</a> that can be used for your websites. Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
	        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
	        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>

    
    
    
    
    
    
    
    <?php

if(isset($_POST['event_name']))
{
$dbhost = 'localhost';
$dbuser = 'project';
$dbpass = 'root';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'event_manager');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}



$event_name=$_POST["event_name"];
   
$location=$_POST["location"];
    
$ticket_amount=$_POST["ticket_amount"];
     
$price=$_POST["price"];
     
$date=$_POST["date"];
    
$time=$_POST["time"];
    
$end_date=$_POST["end_date"];
    
$end_time=$_POST["end_time"];
    
$description=$_POST["description"];
    
$category=$_POST["category"];

$username =$_SESSION['username'];
    
    
 if(isset($_SESSION['username'])){
     if(!$event_name){
         ?>
    <script>
        alert("Please fill in Event Name!");
      </script>   
    <?php
         
     }
     else if(!$location){
         ?>
    <script>
        alert("Please fill in Location!");
      </script>   
    <?php
     }
     else if(!$ticket_amount){
         ?>
    <script>
        alert("Please fill in Ticket Amount!");
      </script>   
    <?php
     }
     else if(!$price){
         ?>
    <script>
        alert("Please fill in Price!");
      </script>   
    <?php
     }
     else if(!$date){
         ?>
    <script>
        alert("Please fill in Date!");
      </script>   
    <?php
     }
     else if(!$time){
         ?>
    <script>
        alert("Please fill in Time!");
      </script>   
    <?php
     }
     else if(!$end_date){
         ?>
    <script>
        alert("Please fill in End Sale Date!");
      </script>   
    <?php
     }
     else if(!$end_time){
         ?>
    <script>
        alert("Please fill in End Sale Time!");
      </script>   
    <?php
     }
     
     else if(!$category){
         ?>
    <script>
        alert("Please fill in category!");
      </script>   
    <?php
     }
     else{
     
     $sql = "INSERT INTO events ".
       "(username,event_name,category,description,location,date,time,sale_end_date,price,no_of_tickets,remaining_tickets,sale_end_time) ".
       "VALUES ".
       "('$username','$event_name','$category','$description','$location','$date','$time','$end_date','$price','$ticket_amount','$ticket_amount','$end_time')";
 $result = mysqli_query($conn, $sql );   
     }
 }   




    
    
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

      ?>
</body>


</html>