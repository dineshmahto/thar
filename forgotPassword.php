<?php
include 'core/init.php';
if(isset($_POST['forget_password'])){
    $email = $_POST['forgotPEmail'];
    $error = array();
	
	if($email == ""){
		$error['emailEmpty'] = "Email field cannot be Empty";
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error['invalidEmail'] = "the email entered is invalid";
	}
	else {
        $email = $getFromU->checkInput($email);
        if($getFromU->checkEmail($email) === true){
            $user = $getFromU->userDataByEmail($email);// try to get the required data for sending the mail
            // send the mail

            
            $error['success'] = " we just emailed you a link";
        }
        else{
            $error['unregistered'] = "your credentials are Incorrect No such <strong> $email</strong> is registered";
        }
	}
}

?>
<?php include 'includes/header.php'?>
<div  class="container-fluid">

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-8 offset-lg-3 offset-md-3 offset-sm-2 mt-5 mb-3">
    <h3 class="text-center">First, let's Find your account</h3>
</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 offset-lg-3 offset-md-3 offset-sm-3 mt-5 mb-3">
<div class="card">
  <h5 class="card-header bg-dark text-white text-center">Password Rest</h5>
  <div class="card-body">
  <div class="col-lg-10 offset-lg-1">
       
       <?php
                             if(isset($error['unregistered'])){
                                 echo '<div class="alert alert-warning text-center" role="alert">'.$error['unregistered'].'</div>';
                             }
                             else if(isset($error['success'])){
                                 echo '<div class="alert alert-success text-center" role="alert">'.$error['success'].'</div>'; 
                             }
                             
                             ?>
           
</div>
  <form action="" method="post" role="form">
        
            <p class="p-1">Enter your email or Registration number</p>
  							<div class="form-group">
                                <label for="email" class="text-left text-dark">Email address</label>
                                <input type="email" name="forgotPEmail" value="" class="form-control input" id="currentPwd" placeholder="Email or Registration no">
                                <span class="text-danger">
                                <?php
                                if(isset($error['emailEmpty'])){
                                    echo $error['emailEmpty'];
								}
								else if(isset($error['invalidEmail'])){
									echo $error['invalidEmail'];
								}
                                ?>
                                </span>
                              </div>
							  
							
							  <div class="form-group text-center">
                              <button type="submit" name="cancel" class="btn btn-secondary btn-lg" >Cancel</button>
                              <button type="submit" name="forget_password" class="btn btn-info btn-lg" >Send</button>
                              
							  </div>
							  </form>
  </div>
</div>
</div>

</div>
</div>

</div>
<?php include 'includes/footer.php';?>


