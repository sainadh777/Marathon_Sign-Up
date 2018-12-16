/*  Form processing with AJAX.  The file upload function is done with
    jQuery.  The form data other than the image is handled manually.
    Alan Riggins
    CS545 Fall 2017
*/    
    var size;
    
    $(document).ready(function()  {
        $('#submit_button').bind('click', function() {
            processUpload();
            }
        );
        $('input[name="user_pic"]').on('change',function(e) {
	        size = this.files[0].size;
	    });        
    });

    function processUpload() {
        send_file();    // picture upload takes longer, get it going
        send_form_data();
        }
        
    function send_form_data() {
        var taker = $('input:text[name=user_pic]').val();        
        var url = "ajax_echo.php";
        url += "?user_pic="+taker;
        var req = new HttpRequest(url, handleData);
        req.send();
        }
        
    function handleData(response) {
               $('#status').css('color','blue');
               $('#answer').html(response);    
               }
        
    function send_file() {    
        var form_data = new FormData($('form')[0]);
        var file_name = $('#user_pic').val();
        if(size > 2000000) {
            $('#status').html("ERROR, image is too big");
            return;
            }
//        file_name = file_name.replace("C:\\fakepath\\",""); 
        var toDisplay = "<img src='jadran.sdsu.edu/~jadrn074/public_html/proj3/pictures/SDSU.gif' width='50px' height='auto' />";               
        $('#pic').html(toDisplay);
        var where = file_name.lastIndexOf("\\");  // this is safer!
        file_name = file_name.substring(where+1);          
        form_data.append("image", document.getElementById("user_pic").files[0]);
        $.ajax( {
            url: "img_file_upload.php",
            type: "post",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(response) {
	       if(response.startsWith("Success")) {
               	var fname = $("#user_pic").val();
               	var toDisplay = "<img src=\"jadran.sdsu.edu/~jadrn074/public_html/proj3//" + file_name + "\" />";               
               	$('#pic').html(toDisplay);
               	$('#status').css('color','blue');	       
               	$('#status').html(response);
		}
	       else {
                $('#status').css('color','red');
		$('#status').html(response);	
		$('#pic').html("&nbsp;");		       
                }
	    },
            error: function(response) {
               $('#status').css('color','red');
               $('#status').html("Sorry, an upload error occurred, 2MB maximum size");
                }
            });
        }