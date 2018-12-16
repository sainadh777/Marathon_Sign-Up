<?php
function validate_data($params) {
    $msg = "";
    if(!$_FILES['file']['name']){
	$msg .= "Please select the Runner's Image <br />"; }
	if(!strlen($params[10]) == 0){
	$UPLOAD_DIR = 'pictures/';
    $COMPUTER_DIR = '/home/jadrn074/public_html/proj3/pictures/';
    $filename = $_FILES['file']['name'];
    $message = "";
    if(file_exists("$UPLOAD_DIR".$filename))  {
        $msg = "<b>Error,file already exists on the server</b><br />\n";
        }
    elseif($_FILES['file']['error'] > 0) {
    	$err = $_FILES['file']['error'];	
        #$msg .= "Error Code: $err ";
		if ($err == 1)
			$msg = "The file size is too big, only 2MB MAX<br />";
        } 
     elseif(exif_imagetype($_FILES['file']['tmp_name']) != IMAGETYPE_JPEG) {
        $msg = "Please choose only a jpg file<br />";   
        }
     
		
	else {move_uploaded_file($_FILES['file']['tmp_name'], "$UPLOAD_DIR".$filename);}
    
	}

    #echo $msg;
	
	 if(strlen($params[1]) == 0)
        $msg .= "Please enter the First name<br />"; 
	if(strlen($params[2]) == 0)
        $msg .= "Please enter the Last name<br />"; 
    if(strlen($params[3]) == 0)
        $msg .= "Please enter the address<br />"; 
    if(strlen($params[4]) == 0)
        $msg .= "Please enter the city<br />"; 
    if(strlen($params[5]) == 0)
        $msg .= "Please enter the state<br />"; 
	if(strlen($params[6]) == 0)
        $msg .= "Please enter the zip code<br />";
    elseif(!is_numeric($params[6])) 
        $msg .= "Zip code may contain only numeric digits<br />";
    
	if(strlen($params[7]) == 0)
        $msg .= "Please enter the area_phone<br />"; 
	 elseif(!is_numeric($params[7])) 
        $msg .= "area_phone number may contain only numeric digits<br />";
		
		if(strlen($params[8]) == 0)
        $msg .= "Please enter the prefix_phone<br />"; 
	 elseif(!is_numeric($params[8])) 
        $msg .= "prefix_phone number may contain only numeric digits<br />";
		
	if(strlen($params[9]) == 0)
        $msg .= "Please enter your  number <br />"; 
	 elseif(!is_numeric($params[9])) 
        $msg .= "Phone number may contain only numeric digits<br />";
		
	if(strlen($params[10]) == 0)
        $msg .= "Please enter email<br />";
    elseif(!filter_var($params[10], FILTER_VALIDATE_EMAIL))
        $msg .= "Your email appears to be invalid<br/>";        
    if($msg) {
        write_form_error_page($msg);
        exit;
        }
    if(strlen($params[11]) == 0)
        $msg .= "Please enter the gender<br />";
	
    if(strlen($params[12]) == 0)
        $msg .= "Please enter the correct Date of Birth <br />";
	 elseif(!is_numeric($params[12])) 
        $msg .= "birthmonth may contain only numeric digits<br />";
		
	if(strlen($params[13]) == 0)
        $msg .= "Please enter the  correct Date of Birth <br />";
	 elseif(!is_numeric($params[13])) 
        $msg .= "birthday may contain only numeric digits<br />";
		
	if(strlen($params[14]) == 0)
        $msg .= "Please enter the correct Date of Birth <br />";
	 elseif(!is_numeric($params[14])) 
        $msg .= "birthyear may contain only numeric digits<br />";
		
	if(!checkdate($params[12],$params[13],$params[14]))
		$msg .= "Please enter Valid Date of Birth<br />";
		
    if(strlen($params[14]) == 0)
        $msg .= "Please enter the ExpL<br />";
    if(strlen($params[15]) == 0)
        $msg .= "Please enter the Categ<br />";	
	if($msg){ 
	 write_form_error_page($msg);
	 exit;
	}
}
  
function write_form_error_page($msg) {
    write_header();
    echo "<h4>Sorry, an error occurred<br />",
    $msg,"</h4>";
    write_form();
    write_footer();
    }  
    
function write_form() {
    print <<<ENDBLOCK
	<fieldset>
	<legend>Personal Information</legend>
        <form  name="Personalinfo"
		enctype="multipart/form-data"
        method="post" 
        action=""http://jadran.sdsu.edu/~jadrn074/public_html/proj3/process_request.php">
		<ul>
		   <li><label for="file">Runner's Image:</label>
			   <input type="file" name="file"   accept="image/*" /><br /></li>
            <li><label for="fname">First name:</label>
			     <input type="text" name="fname" value="$_POST[fname]" size="30" id="fname" /><br /></li>
			<li><label for="fname">Last name:</label>
			    <input type="text" name="lname" value="$_POST[lname]" size="30" id="lname" /><br /></li>
            <li><label for="address">Address:</label>
			     <input type="text" name="address" value="$_POST[address]"  size="50" id="address" /><br /></li>
            <li><label for="city">City:</label>
			     <input type="text" name="city" value="$_POST[city]"  size="20" id="city"/><br /></li>
            <li><label for="state">State:</label>
			     <input type="text" name="state" value="$_POST[state]"  size="5" id="state"/><br /></li>
            <li><label for="zip">Zipcode:</label> 
                  <input type="text" name="zip" value="$_POST[zip]"  size="10" maxlength="5" id="zip"/><br /></li>		
			<li><label for="phone">Primary Phone:</label> 
			      (<input type="text" name="area_phone" value="$_POST[area_phone]"  size="4" maxlength="3" id="aphone"/>)
			       <input type="text" name="prefix_phone" value="$_POST[prefix_phone]"  size="4" maxlength="3" id="pphone"/> 
			       <input type="text" name="suphone" value="$_POST[suphone]"  size="5" maxlength="4" id="sphone"/><br /></li>
			<li><label for="email">Email:</label> 
			       <input type="text" name="email" value="$_POST[email]"  size="20" id="email"/><br /> 
		   <li><label for="gender">Gender:</label>
			        <input type="radio" name="gender"  id="male" value="M"/>Male
			        <input type="radio" name="gender"  id="female" value="F"/>Female
			        <input type="radio" name="gender"  id="other" value="O"/>Other<br /></li>
			<li><label for="bday">Date of Birth:</label>
			        mm <input type="text" name="month" value="$_POST[month]"  size="2" id="m"/>
			         dd<input type="text" name="day" value="$_POST[day]"  size="2" id="d"/>
			         yyyy<input type="text" name="year" value="$_POST[year]"  size="4" id="y"/><br /></li> 
			<li><label for="ExpL">Experience Level:</label>
			       <input type="radio" name="ExpL"  id="Exp1" value="Expert"/>Expert
			       <input type="radio" name="ExpL"  id="Exp2" value="Experienced"/>Experienced 
			       <input type="radio" name="ExpL"  id="Exp3" value="Novice"/>Novice<br /></li>
			<li><label for="Categ">Category:</label>
			       <input type="radio" name="Categ"  id="c1" value="Teen" />Teen
			       <input type="radio" name="Categ"  id="c2" value="Adult" />Adult 
			       <input type="radio" name="Categ"  id="c3" value="Novice" />Novice<br /></li> 
		</ul>
		     <h3 id="status">&nbsp;</h3>	
			 <div id="message_line">&nbsp;</div>
            <div id="button_panel">
            <input type="reset" value="Reset" />
            <input type="submit" value="Submit" />
            </div>      
		</form>   
	</fieldset> 
ENDBLOCK;
}                        

   function process_parameters(){
    global $bad_chars;
    $params = array();
	$params[] = trim(str_replace($bad_chars, "",$_FILES['file']['name']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['fname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['lname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['city']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['state']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['zip']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['area_phone']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['prefix_phone']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['suphone']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['email']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['gender']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['month']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['day']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['year']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['ExpL']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['Categ']));
	return $params;
    }
    
function store_data_in_db($params) {
    # get a database connection
    $db = get_db_handle();  ## method in helpers.php
   $UPLOAD_DIR = 'pictures/';
    $COMPUTER_DIR = '/home/jadrn074/public_html/proj3/pictures/';
    $filename = $_FILES['file']['name'];
	$img_loc ="$UPLOAD_DIR".$filename;
	
	#$bday = date($params[12]."-".$params[13]."-".$params[14]);
	#$mobilenumber = $params[7].$params[8].$params[9];
	
    $sql = "SELECT * FROM person WHERE ".
	"file = '$params[0]' AND ".
	"fname='$params[1]' AND ".
	"lname='$params[2]' AND ".
    "address = '$params[3]' AND ".
    "city = '$params[4]' AND ".
    "state = '$params[5]' AND ".
    "zip = '$params[6]' AND ".
	"area_phone='$params[7]' AND ".
	"prefix_phone='$params[8]' AND ".
	"suphone ='$params[9]' AND ".
	"email = '$params[10]'; AND ".
	"gender = '$params[11]'; AND ".
	"month = '$params[12]' AND ".
    "day = '$params[13]' AND ".
    "year = '$params[14]' AND ".
	"ExpL = '$params[15]'; AND ".
	"Categ = '$params[16]';";
	
##echo "The SQL statement is ",$sql;    
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0) {
	write_form_error_page('This record appears to be a duplicate');
    exit;
     }
		
##OK, duplicate check passed, now insert
    move_uploaded_file($_FILES["file"]["tmp_name"],$img_loc);
    $sql = "INSERT INTO person(file,fname,lname,address,city,state,zip,area_phone,prefix_phone,suphone,email,gender,month,day,year,ExpL,Categ) ".
    "VALUES('$params[0]','$params[1]','$params[2]','$params[3]','$params[4]','$params[5]','$params[6]','$params[7]','$params[8]','$params[9]','$params[10]','$params[11]','$params[12]','$params[13]','$params[14]','$params[15]','$params[16]');";

	##echo "The SQL statement is ",$sql;    
    mysqli_query($db,$sql);
    $how_many = mysqli_affected_rows($db);
    #echo("There were  $how_many rows affected");
    
close_connector($db);
    }
	
	
        
?>   