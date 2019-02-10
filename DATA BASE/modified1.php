<?php

			$host="localhost";
			$dbUsername="root";
			$dbpassword="";
			$dbname = "test";
			$conn=new mysqli($host, $dbUsername, $dbpassword,$dbname); //create A Connection
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if($_POST['pwd']==$_POST['cpwd'])
	{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];	
			$email=$_POST['email'];
			$pwd=md5($_POST['pwd']);//md5 hash password Security
			
			$sql="INSERT INTO registrationform(fname,lname,email,pwd)
			values('$fname','$lname','$email','$pwd')";
			
			//if this quary is successful,redirect to main page
			
			if($conn->query($sql) === TRUE)
			{
				$_SESSION['message']=	'Registtion Successful,$fname $lname Added To The DataBase';
				header("location:\ad\bookingSystem\index.html");
			}
			else
			{
				$_SESSION['message']="User Could Not Adder To Th Database";
			}
	}
	else
		{
			$_SESSION['message']="Two Password Didn't Match Please Try Again";
		}
}

?>