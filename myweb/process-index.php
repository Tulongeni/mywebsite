<?php
$name=$_POST["name"];
$message=$_POST["message"];
$type=filter_input(INPUT_POST,"type",FILTER_VALIDATE_INT);
//$_POST["type"];
$terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL);
//$_POST["terms"];

if(! $terms)
{
    die("Terms must be  accepted");
}
//var_dump($name,$message,$type,$terms);

$host="localhost";
$dbname="message_db";
$username="root";
$password="";

// $conn = mysqli_connect("localhost","root","") or
// die("Could not connect:" . mysqli_error($conn));
// print  "Successful Connection";
// mysqli_close($conn);

$conn=mysqli_connect{ 
    hostname: $host,
    username: $username, 
    password: $password, 
    database: $dbname  };

                                         

if(mysqli_connect_errno())
{
    die("Connection error:" . mysqli_connect_error());
}
echo "Connection was successful.";

$sql="INSERT INTO message (name,body,type) 
VALUES (?,?,?)";

$stmt = mysqli_stmt_init($conn);
if( ! mysqli_stmt_prepare($stmt, $sql))
{
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssi",$name,$message,$type);
 
mysqli_stmt_execute($stmt);

echo"RECORD SAVED";

?>