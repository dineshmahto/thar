<?php
include 'core/init.php';
echo "its working fine";
if(isset($_POST['signup'])){
    echo "it has been clicked";
   $email =  $_POST['regemail'];
   $username = $_POST['username'];
   $mobileno = $_POST['mobileno'];
   $dob = $_POST['dob'];
   $error = array();
   echo $email, $username, $mobileno, $dob;
   if($email == ""){
    $error['emailempty'] = "Email field cannot be empty";
   }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $error['emailInvalid'] = "Invalid email";
   }
   if($username == ""){
       $error['usernmaeEmpty'] = "username field cannot be empty";

   }
   else if(!preg_match("/^[a-zA-Z ]*$/", $username)){
       $error['usernameInvalid'] = "Enter a valid username";
   }
   if($dob == ""){
       $error['dobEmpty'] = "date of birth field cannot be empty";
   }
   if(empty($mobileno)){
       $error['mobilenoEmpty'] = "mobile no field cannot be empty";
   }
   
   else if(strlen($mobileno) > 11 || strlen($mobileno) < 10 ) {
    $error['mobilenoInvalid'] = "mobile no must be of length 10 digit";
    }
    
    // else if($getFromU->validatePhoneNumber($mobileno) === false){
    //     $error['invalidInput'] = "enter a valid phone no";
    // }
   else{
       if(!empty($email) && !empty($username) && !empty($mobileno) && !empty($dob))
       {
        $email = $getFromU->checkInput($email);
		$username = $getFromU->checkInput($username);
		$phoneno = $getFromU->checkInput($mobileno);
        $dob = $getFromU->checkInput($dob);
        if($getFromU->checkEmail($email) === true){
            $error['eamilUsed'] = "this $email is already registered";
        }
         else if($getFromU->checkPhoneno($phoneno) === true){
            $error['phonenoUsed'] = "This $phoneno is already registered";
        }
        else if($getFromU->checkUsername($username) === true){
            $error['usrnameUsed'] = "This $username is already used";
        }
        else{
            $wasSuccess = $getFromU->register($username, $email, $phoneno, $dob);
            
			if($wasSuccess){
                echo "successfully inserted";
                require('textlocal.class.php');
                require('define.php');

            $textlocal = new Textlocal(false, false , APIKEY);

            $numbers = array($phoneno);
            $sender = 'Textlocal';
            $otp = mt_rand(10000, 99999);
            $message = 'Hello this is your OTP'.$otp;

            try {
                $result = $textlocal->sendSms($numbers, $message, $sender);
                setcookie('otp',$otp);
                echo "OTP successfully send...";
            } catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }
                header('Location: otpverification.php');
                
            }
            else{
                echo "failed to insert";
            }	
        }
        
       }
    
   }
}
function getInputValue($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
}


?>

<?php include 'includes/header.php'?>



<div class="container-fluid">
     <div class="row">
          <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 registration--form mb-3">
           
              <h4 class="text-center text-info mt-4" style="font-family: 'Anton', sans-serif;"> <a href="#" class="text-center"><i class="fas fa-user-plus align-middle text-info"></i></a><strong>Register</strong></h4>
              <h6 class="font-weight-light text-white text-center">Registering up is easy. It only takes a few steps</h6>
              <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10 offset-lg-1 offset-md-1 offset-sm-1">
              <form class="pt-3" action="" method="post" role="form">
                <div class="form-group text-center">
                  <input type="email" name="regemail" class="input form-control form-control-lg inputemail" id="register-email-id" value="<?php getInputValue('regemail'); ?>" placeholder="Enter email">
                  <span class="text-danger text-center" id="register-email-info"><?php
                  if(isset($error['emailempty'])){
                      echo $error['emailempty'];
                  } else if(isset($error['emailInvalid'])){
                      echo  $error['emailInvalid'];
                  }
                  else if(isset($error['eamilUsed'])){
                      echo $error['eamilUsed'];
                  }
                  ?></span>
                </div>
                <div class="form-group text-center">
                  <input type="text" name="username" class="input form-control form-control-lg inputemail" id="username" value="<?php getInputValue('username'); ?>" aria-describedby="emailHelp" placeholder="username">
                  <span class="text-danger" id="username-info">
                  <?php
                  if(isset($error['usernmaeEmpty'])){
                      echo  $error['usernmaeEmpty'];
                      
                  } else if(isset($error['usernameInvalid'])){
                    echo $error['usernameInvalid'];
                  }
                  else if(isset($error['usrnameUsed'])){
                      echo $error['usrnameUsed'];
                  }
                  ?>
                  </span>
                </div>
                
                
                <div class="form-group text-center">
                  <input type="text" name="mobileno" id=contact-number" class="input form-control  form-control-lg inputphno" value="<?php getInputValue('mobileno'); ?>" placeholder="Mobile number">
                  <span class="text-danger" id="contact-no-info">
                  <?php
                  if(isset($error['mobilenoEmpty'])){
                      echo $error['mobilenoEmpty'];
                     
                  } else if(isset($error['mobilenoInvalid'])){
                    echo $error['mobilenoInvalid'];
                  }
                  else if(isset($error['invalidInput'])){
                      echo $error['invalidInput'];
                  }
                  else if(isset($error['phonenoUsed'])){
                      echo $error['phonenoUsed'];
                  }
                  ?>
                  </span>
                </div>
                <div class="form-group text-center">
                 <input class="input form-control form-control-lg inputpassword" type="text" name="dob" id="date" data-select="datepicker" value="<?php getInputValue('dob'); ?>" placeholder="date of Birth">
                  <span class="text-danger" id="dob-info">
                  <?php
                  if(isset($error['dobEmpty'])){
                      echo $error['dobEmpty'];
                  }?>
                  </span>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-info">
                      <input type="checkbox" class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  
                  <button class="btn register-btn font-weight-medium  text-white" value="Register"
                 name="signup">Register</button>
                </div>
                <div class="form-group" id="register-error-message">
                 
                </div>
                <div class="text-center mt-4 pb-2 font-weight-light text-white">
                  Already have an account? <a href="login.html" class="text-success">Login</a>
                </div>
              </form>
            </div>
          </div>
          
                                            

            </div>
          </div>
        </div>


<?php include 'includes/footer.php'?>
