<?php

if($_GET) exit;
if($_POST) exit;
/*code by 
Sainadh Ainala 
jadrn074  
Project #3 
Fall 2017 */

$pass = array('sdsu','cs545','christmas');

#### Using SHA256 #######
$salt='$5$R$4%^gj9@9i8mf65';  # 12 character salt starting with $1$

for($i=0; $i<count($pass); $i++) 
        echo crypt($pass[$i],$salt)."\n";
?>