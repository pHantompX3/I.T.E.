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
	  <table>
      <tr><td><input  type="submit" name="submit1" value="Search"></td></tr>
	  <tr><td><input  type="submit" name="submit2" value="Show All Customers"></td>
	  <td><input  type="submit" name="submit3" value="Show All Orders                 "></td></tr>
	  <tr><td><input  type="submit" name="submit4" value="Add New Customer "></td>
	  <td><input  type="submit" name="submit6" value="Update Customer Attribute"></td></tr>
	  </table>
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
			   echo "</br>";
			  echo "Orders for: ".$fname." ".$lname."<br />";
			   echo "</br>";
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
				  echo "</br>";
			  echo "No records found.";}
			  
			  //Close the db connection
			  $db->close();
		  }		  
		  else{
		  echo "Please fill out both first name and last name.";}
	  }
	 if(isset($_POST['submit2']))
		 {
		 
			  // Create Mysqli object
			  $db = new mysqli('127.0.0.1', 'root', '', 'lab3');
			
			  //Check the connection
			  if ($db->connect_error)
			  {
				die('Connect Error(' . $db->connect_errorno . ')' . $db->connect_error);
			  }
			
			  //create SQL Query
			  $query="SELECT Id, FirstName, LastName FROM customers ";
			  
			  //execute the mysql query and store the results
			  $result=mysqli_query($db,$query);		
			   echo "</br> </br>";
			  echo "All Customers: "; 
			 echo "</br> </br>";
			  $count= 0;
			  
			  echo "<table>";
			  echo "<tr><td>Id</td>";
				   echo "<td> - </td>"; 
				  echo "<td>FirstName</td>";
				
				  echo "<td>LastName</td></tr>";
				

			  //loop through result set
			   while($row=mysqli_fetch_array($result))
			  {
				  //-display the result of the array	  
				  echo "<tr><td>".$row['Id']."</td>";
				  echo "<td> - </td>";
			
				  echo "<td>".$row['FirstName']."</td>";
				 
				  echo "<td>".$row['LastName']."</td></tr>";
				  

				  $count++;
			  }
			  echo "</table>";
			  if($count == 0)
			  {
			  echo "No records found.";}
			  
			  //Close the db connection
			  $db->close();
		  }	
if(isset($_POST['submit3']))
	  {
		  
			  // Create Mysqli object
			  $db = new mysqli('127.0.0.1', 'root', '', 'lab3');
			
			  //Check the connection
			  if ($db->connect_error)
			  {
				die('Connect Error(' . $db->connect_errorno . ')' . $db->connect_error);
			  }
			
			  //create SQL Query
			  $query="SELECT OrderNumber, OrderDate, TotalAmount FROM orders ";
			  
			  //execute the mysql query and store the results
			  $result=mysqli_query($db,$query);		
			  
			
			  $count= 0;
			  //loop through result set
			  echo "</br>";
			  echo " Order List: ";
			  echo "</br> </br>";
			  while($row=mysqli_fetch_array($result))
			  {
				  //-display the result of the array
				  echo "Order Number: ".$row['OrderNumber'];
				  echo " - ";				  
				  echo "Order Date: ".$row['OrderDate'];
				  echo " - ";
				  echo "Order Amount: $".$row['TotalAmount'];
				  echo "<br />  </br> ";
				  $count++;
			  }
			  if($count == 0)
			  {
				  
			  echo " No records found.";}
			  
			  //Close the db connection
			  $db->close();
		  }		  
if(isset($_POST['submit4']))
	  {
		echo "</br>" ; 
	echo	"<form  method='post' action='' >
	  <table>
	  <tr>
		<td> First Name:</td> <td> <input  type='text' name='new_fname'></td>
	  </tr>
	  <tr>
	 	<td> LastName:</td> <td> <input  type='text' name='new_lname'></td>
	  </tr>
	  <tr>
		<td> City:</td> <td> <input  type='text' name='new_city'></td>
	  </tr>
	  <tr>
		<td> Country:</td> <td> <input  type='text' name='new_country'></td>
	  </tr>
	  <tr>
		<td> Phone#:</td> <td> <input  type='text' name='new_phone'></td>
	  </tr>
      </table>
	  </br></br>
	
	  <input  type='submit' name='submit5' value='Submit'>

    </form>";
	  }
	  
if(isset($_POST['submit5']))
	  {
		  if($_POST['new_fname'] and $_POST['new_lname'] and $_POST['new_country'] and $_POST['new_city'] and $_POST['new_phone']) //if fname and lname are not empty
		  {
			  $new_fname=htmlentities(filter_input(INPUT_POST, 'new_fname', FILTER_SANITIZE_STRING), ENT_QUOTES);
			  $new_lname=htmlentities(filter_input(INPUT_POST, 'new_lname', FILTER_SANITIZE_STRING), ENT_QUOTES);
			  $new_country=htmlentities(filter_input(INPUT_POST, 'new_country', FILTER_SANITIZE_STRING), ENT_QUOTES);
			  $new_city=htmlentities(filter_input(INPUT_POST, 'new_city', FILTER_SANITIZE_STRING), ENT_QUOTES);
			  $new_phone=htmlentities(filter_input(INPUT_POST, 'new_phone', FILTER_SANITIZE_STRING), ENT_QUOTES);
			  // Create Mysqli object
			  $db = new mysqli('127.0.0.1', 'root', '', 'lab3');
			
			  //Check the connection
			  if ($db->connect_error)
			  {
				die('Connect Error(' . $db->connect_errorno . ')' . $db->connect_error);
			  }
			
			  //create SQL Query
			  $query= "INSERT INTO customers (FirstName,LastName,City,Country,Phone)VALUES('$new_fname','$new_lname','$new_city','$new_country','$new_phone')";
			  
			  //execute the mysql query and store the results
			  $result=mysqli_query($db,$query);		
			  
			 
			  if($result)
			  {
				  echo "</br>";
			  echo "New Customer Succesfully Added";}
			  else{
				  echo "New Customer creation failed";
			  }
			  
			  //Close the db connection
			  $db->close();
		  }		  
		  else{
			  echo " </br>";
		  echo "Please fill out all fields. </br> Click Add New Customer and try again";}
	  }  
	  if(isset($_POST['submit6']))
	  {
		echo "</br> All fields must be filled in order to update the Customer </br> </br>" ; 
	echo	"<form  method='post' action='' >
	  <table>
	  <tr>
		<td> Id:</td> <td> <input  type='text' name='up_Id'></td>
	  </tr>
	  <tr>
		<td> First Name:</td> <td> <input  type='text' name='up_fname'></td>
	  </tr>
	  <tr>
	 	<td> LastName:</td> <td> <input  type='text' name='up_lname'></td>
	  </tr>
	  <tr>
		<td> City:</td> <td> <input  type='text' name='up_city'></td>
	  </tr>
	  <tr>
		<td> Country:</td> <td> <input  type='text' name='up_country'></td>
	  </tr>
	  <tr>
		<td> Phone#:</td> <td> <input  type='text' name='up_phone'></td>
	  </tr>
      </table>
	  </br></br>
	
	  <input  type='submit' name='submit7' value='Update'>

    </form>";
	  }
	if(isset($_POST['submit7']))
	  {
		  if($_POST['up_fname'] and $_POST['up_Id'] and $_POST['up_lname'] and $_POST['up_country'] and $_POST['up_city'] and $_POST['up_phone']) //if fname and lname are not empty
		  {
			  $up_Id=htmlentities(filter_input(INPUT_POST, 'up_Id', FILTER_SANITIZE_STRING), ENT_QUOTES);
			  $up_fname=htmlentities(filter_input(INPUT_POST, 'up_fname', FILTER_SANITIZE_STRING), ENT_QUOTES);
			  $up_lname=htmlentities(filter_input(INPUT_POST, 'up_lname', FILTER_SANITIZE_STRING), ENT_QUOTES);
			  $up_country=htmlentities(filter_input(INPUT_POST, 'up_country', FILTER_SANITIZE_STRING), ENT_QUOTES);
			  $up_city=htmlentities(filter_input(INPUT_POST, 'up_city', FILTER_SANITIZE_STRING), ENT_QUOTES);
			  $up_phone=htmlentities(filter_input(INPUT_POST, 'up_phone', FILTER_SANITIZE_STRING), ENT_QUOTES);
			  // Create Mysqli object
			  $db = new mysqli('127.0.0.1', 'root', '', 'lab3');
			
			  //Check the connection
			  if ($db->connect_error)
			  {
				die('Connect Error(' . $db->connect_errorno . ')' . $db->connect_error);
			  }
			
			  //create SQL Query
			  $query= "UPDATE customers SET FirstName = '$up_fname', LastName = '$up_lname',City ='$up_city', Country = '$up_country', Phone = '$up_phone' WHERE Id = '$up_Id'; ";
			  
			  //execute the mysql query and store the results
			  $result=mysqli_query($db,$query);		
			  
			 
			  if($result)
			  {
				  echo "</br>";
			  echo "Customer Succesfully Updated";}
			  else{
				  echo "New Customer Update failed";
			  }
			  
			  //Close the db connection
			  $db->close();
		  }		  
		  else{
			  echo " </br>";
		  echo "Please fill out all fields. </br> Click Update Customer Attribute and try again";}
	  }     
	?>

  </body>
</html>
</p>
