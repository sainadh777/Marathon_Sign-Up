<?php
    $UPLOAD_DIR = '_uploadDIR_/';
    $COMPUTER_DIR = '/home/jadrn074/public_html/proj3/pictures/';
    $fname = $_FILES['user_pic']['name'];
    $message = "";

        
    if($_FILES['user_pic']['error'] > 0) {
    	$err = $_FILES['user_pic']['error'];	
        $message .= "Error Code: $err ";
        }     
             
    else {
        move_uploaded_file($_FILES['user_pic']['tmp_name'], "$UPLOAD_DIR".$fname);
        $message = "Success! Your file has been uploaded to the server</br >\n";
    }         
    echo $message;
?>  
