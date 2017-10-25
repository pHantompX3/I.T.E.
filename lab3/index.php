<!DOCTYPE  HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
    <title>Search  Contacts</title>
  </head>
  <p><body>
    <h3>Search  Contacts Details</h3>
    <p>You  may search by using the customers full name</p>
    <form  method="post" action="" >
	  First Name:<input  type="text" name="fname">
	  <br /> <br />
	  Last Name:<input  type="text" name="lname">
	  <br /> <br />
      <input  type="submit" name="submit1" value="Search">
	  	  <br /> <br />

	        <input  type="submit" name="submit2" value="Show All Customers">

	  <br /> <br />
    </form>
	
	<?php
	  if(isset($_POST['submit1']))
	  {
		  if($_POST['fname'] and $_POST['lname']) //if fname and lname are not empty
		  {
			  $fname=htmlentities(filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING), ENT_QUOTES);
			  $lname=htmlentities(filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING), ENT_QUOTES);
			  
			  // Create Mysqli object
			  $db = new mysqli('127.0.0.1', 'root', '', 'lab3');
			
			  //Check the connection
			  if ($db->connect_error)
			  {
				die('Connect Error(' . $db->connect_errorno . ')' . $db->connect_error);
			  }
			
			  //create SQL Query
			  $query="SELECT  OrderDate, TotalAmount FROM orders WHERE CustomerId = (SELECT id from customers WHERE FirstName = '" . $fname .  "' AND LastName = '" . $lname .  "')";
			  
			  //execute the mysql query and store the results
			  $result=mysqli_query($db,$query);		
			  
			  echo "Orders for ".$fname." ".$lname."<br />";
			  $count= 0;
			  //loop through result set
			  while($row=mysqli_fetch_array($result))
			  {
				  //-display the result of the array	  
				  echo "Order Date: ".$row['OrderDate'];
				  echo " - ";
				  echo "Order Amount: $".$row['TotalAmount'];
				  echo "<br />";
				  $count++;
			  }
			  if($count == 0)
			  {
			  echo "No records found.";}
			  
			  //Close the db connection
			  $db->close();
		  }		  
		  else{
		  echo "Please fill out both first name and last name.";}
	  }
	?>

  </body>
</html>
</p>