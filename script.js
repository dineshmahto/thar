$(document).ready(function(){
	$('.nav-button').click(function(){
		$('.nav-button').toggleClass('change');
	});
	$(window).scroll(function(){
		let position = $(this).scrollTop();
		if(position >= 200){
			$('.nav-menu').addClass('custom-nav');
		}
		else{
			$('.nav-menu').removeClass('custom-nav');
		}
	});
	 $('[data-toggle="minimize"]').on("click", function() {
      $('.sidebar').toggleClass('collapse');
    });






$('#basic-details--btn').click(function(){
	 e.preventDefault();
    var aadhaarNumber = $("#aadhaarnumber").val();
    var confirmAadhaarNumber = $("#aadhaarnumber").val();
    var name = $("#name").val();
    var fatherName = $("#fathername").val();
    var motherName = $("#mothername").val();
    var dob = $("#dob").val();
    var gender = $("#gender").val();
    var confrimGender = $("confrimGender").val();
  
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  
  if($.trim(aadhaarnumber).length == 0)
  {
   error_email = 'Aadhaar Number is required';
   $('#error_email').text(error_email);
   $('#email').addClass('has-error');
  }
  else
  {
   if ($.trim(aadhaarnumber).length == 0 && $.trim($('#aadhaarnumber').val()).length <= 12)
   {
    error_email = 'Invalid Aadhaar Number';
    $('#error_email').text(error_email);
    $('#email').addClass('has-error');
   }
   else
   {
    error_email = '';
    $('#error_email').text(error_email);
    $('#email').removeClass('has-error');
   }
  }
  
  if(name == ""){
        valid = false;
          $("#errorFirstname").html("<div class='alert alert-danger email_alert' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Firstname cannot be empty</div>");
    }
      else if(!isNameValid(firstname)){

        valid = false;
        $("#errorFirstname").html("<div class='alert alert-danger email_alert' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Firstname   Must Be Between 7 and 15 Characters</div>");
      }
      else{
        $("#errorFirstname").html("");
      }

      if(fatherName == ""){
        valid = false;
          $("#errorFirstname").html("<div class='alert alert-danger email_alert' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Firstname cannot be empty</div>");
    }
      else if(!isNameValid(fatherName)){

        valid = false;
        $("#errorFirstname").html("<div class='alert alert-danger email_alert' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times</a>Firstname   Must Be Between 7 and 15 Characters</div>");
      }
      else{
        $("#errorFirstname").html("");
      }


  if(error_email != '' || error_password != '')
  {
   return false;
  }
  else
  {
   $('#list_login_details').removeClass('active active_tab1');
   $('#list_login_details').removeAttr('href data-toggle');
   $('#basic_details').removeClass('active');//
   $('#list_login_details').addClass('inactive_tab1');
   $('#list_personal_details').removeClass('inactive_tab1');
   $('#list_personal_details').addClass('active_tab1 active');
   $('#list_personal_details').attr('href', '#personal_details');
   $('#list_personal_details').attr('data-toggle', 'tab');
   $('#personal_details').addClass('active in');
  }
 });
 

	
});





function isNameValid(name){
    return /[A-Z]+/i.test(name) && /[a-z]+/.test(name) && /\S{5,15}/.test(name);
}