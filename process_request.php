<?php
/*code by 
Sainadh Ainala 
jadrn074  
Project #3 
Fall 2017 */
include('helpers.php');
include('p3.php');

check_post_only();
$params = process_parameters();
validate_data($params);
store_data_in_db($params);

include('confirmation.php');
?>    