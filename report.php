
<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>A Login Example</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />                 
<style type="text/css">
h1, h2 { text-align: center; }
input { margin: 5px; }
#message_line { color: red; }
</style>  
<script type="text/javascript">
if(!navigator.cookieEnabled) {
	alert("Cookies are disabled in your browser. " +
	      "You must enable cookies to use this application.");
	}  
</script>	           	
</head>
<body>
<h1>Please Login to  see the report</h1>

<div>

<form method="post" 
      action="login.php"
      name="login">
<p>

Password: <input type="password" name="pass" /><br />
</p>
<p>
<input type="reset" value="Clear" />
<input type="submit" value="Log In" />
</p>
</form>
<h3>Password:  <tt>cs545</tt></h3>
</div>
<script type="text/javascript">
document.login.user.focus();
</script>
</body>
</html>
