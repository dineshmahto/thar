<?php 
include 'core/init.php';

// $user_id = $_SESSION['user_id'];
// $user = $getFromU->userData($user_id);
$error = array();
if(isset($_POST['otpveification'])){

	$phoneOtp = $_POST['phoneOtp'];
	if(!empty($phoneOtp)){
		if($_COOKIE['otp'] == $phoneOtp){
			$error['verified'] = "congragultion your otp has been verified";
		}
	}
	else{
		$error['invalidOtp'] = "OTP is Invalid";
	}
}
function getInputValue($name) {
    if(isset($_POST[$name])) {
        echo $_POST[$name];
    }
}
?>
<?php include 'includes/header.php'?>

<div  class="container-fluid">

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 offset-lg-3 offset-md-3 offset-sm-3 mt-5 mb-3">
<div class="card">
  <h5 class="card-header bg-info text-white text-center">OTP Verification</h5>
  <div class="card-body">
  							<div class="form-group">
                                <label for="currentPwd" class="text-left text-dark">Enter the OTP</label>
                                <input type="password" name="phoneOtp" value="<?php getInputValue('phoneOtp'); ?>" class="form-control input" id="currentPwd" placeholder="Current Password">
                                <span class="text-danger">
                                
                                </span>
                              </div>
							  
							  
                              </div>
							  <div class="form-group text-center">
							  <button type="submit" name="otpveification" class="btn btn-info btn-lg">Verify</button>
							  </div>
  </div>
</div>
</div>

</div>
</div>

</div>
<?php include 'includes/footer.php';?>
