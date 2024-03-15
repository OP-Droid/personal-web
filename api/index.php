<?php
$servername="localhost";
$username="root";
$password="";
$dbname="opicho";


$conn= new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
	die("connection failed:".$conn->connect_error);

}
if($_SERVER['REQUEST_METHOD']=="POST"){
	$name=$_POST["name"],
	$email=$_POST["email"],
	$phone_number=$_POST["number"],
	$message=$_POST["message"],

		$sql = "INSERT INTO messages(name,email,phone_number,message) VALUES('$name','$email','$phone_number','$message')";
		if ($conn->query($sql)===TRUE) {
			echo "message sent successfully!";
			sendReplyEmail($email);	
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}
	else{
		echo "Invalid email address. Please try again.";
	}

$conn->close();

function sendReplyEmail($recipient){
			$subject="Thank you for your message!";
			$message="thank you for contacting me! how may I assist you?";

			mail($recipient, $subject, $message);
		}

?>