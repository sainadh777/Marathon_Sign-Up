<?php

include('helpers.php');
include('p3.php');

check_post_only();
$params = process_parameters();
validate_data($params);
store_data_in_db($params);

include('confirmation.php');
?>    