<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Person Report</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />                 
<link  rel="stylesheet" type="text/css"  href="report.css">

</link>             	
</head>
<body>
<h1>Person Report</h1>
<?php

  
$pass = $_POST['pass'];
$valid = false;
$raw = file_get_contents('passwords.dat');
$data = explode("\n",$raw);
foreach($data as $item) {
    $pair = explode('=',$item);
	crypt($pass,$pair[0]);
    if (crypt($pass,$pair[0]) === $pair[0]) 
	        $valid = true;
	 }      #end foreach
if ($valid){
	 #include('report11.php');
$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn074';
$password = 'power';
$database = 'jadrn074';
if(!($db = mysqli_connect($server,$user,$password,$database)))
echo "ERROR in connection ".mysqli_error($db);
else {
    $sql = "select fname,lname ,city,state,zip,gender,TIMESTAMPDIFF(YEAR,cast(rtrim(year *10000+ month *100+ day) as datetime),now()),email,ExpL,Categ,file from person order by lname;";   
    $result = mysqli_query($db, $sql);
    if(!$result)
        echo "ERROR in query".mysqli_error($db);
	
     
       echo "<table>\n";		
echo 
"<tr><td>First name</td><td>Last name</td><td>City</td><td>State</td><td>Zipcode</td><td>Gender</td><td>Birthday(Age)</td><td>Email</td><td>Experience Level</td><td>Category</td><td>Image</td></tr>";
	while($row=mysqli_fetch_row($result)) {
     echo "<tr>";
	 $x = array_slice($row,0);
	 $imgname = end($x);
	 foreach($x as $item) 
		if ($item == $imgname){
			$picid = "pictures/".$item;
		echo "<td><img src =\"$picid\" width='80' ></td>";
		}
		else {
		echo "<td>$item</td>";}
        echo "</tr>\n";

	
		
 }		
mysqli_close($db);
 }
"</table>";
 }
else
    echo 'Login Unsuccessful.';  
?>
</body>
</html>