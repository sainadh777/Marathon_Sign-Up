<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
   
   
<!--    Sainadh Ainala    
		Account: jadrn074
        CS545, Fall 2017
        Project #3   ---->



<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;
    charset=iso-8859-1" />
    <title> Processing with Server</title>
    <link rel="stylesheet" type="text/css" href="form.css" />
</head>
<body>
<?php
	
echo <<<ENDBLOCK
    <h1>$params[1], thank you for registering.</h1>
	<table>
	    <tr>
            <td>First name</td>
            <td>$params[1]</td>
        </tr>
		<tr>
            <td>Last name</td>
            <td>$params[2]</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>$params[3]</td>
        </tr>
        <tr>
            <td>City</td>
            <td>$params[4]</td>
        </tr>
        <tr>
            <td>State</td>
            <td>$params[5]</td>
        </tr>
        <tr>
            <td>Zip Code</td>
            <td>$params[6]</td>
        </tr>
        <tr>
            <td>email</td>
            <td>$params[10]</td>
        </tr>           
</table>
ENDBLOCK;
    /*echo "<p>The raw query string that came from the browser is ",
    file_get_contents("php//input"),"</p>";*/


?>
</body></html>

