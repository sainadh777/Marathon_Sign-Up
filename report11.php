<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Person Report</title>
    <link rel="stylesheet" href="report.css">
</head>
<body>
    <h1>Person Report</h1>
<?php
/*code by 
Sainadh Ainala 
jadrn074  
Project #3 
Fall 2017 */
function get_db_handle() {
$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn074';
$password = 'power';
$database = 'jadrn074';
if(!($db = mysqli_connect($server,$user,$password,$database)))
    echo "ERROR in connection ".mysqli_error($db);
else {
    $sql = "select  fname ,lname ,gender,birthmonth,birthday,birthyear, ExpL,Categ ,img_location from person order by zip;";    
    $result = mysqli_query($db, $sql);
    if(!result)
        echo "ERROR in query".mysqli_error($db);
	
	
	
		
echo "</table>\n";
 }		
mysqli_close($db);
 }
}
?>
</body>
</html>
	