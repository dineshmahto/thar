<?php 
include 'core/init.php';

$user_id = $_SESSION['user_id'];
$user = $getFromU->userData($user_id);
if($getFromU->loggedIn() === false){
	header('Location:'.BASE_URL.'index.php');
}
if(isset($_POST['submit'])){
	echo "the btn has been clicked";
	$currentPwd = $_POST['currentPwd'];
	$newPassword = $_POST['newPassword'];
	$rePassword = $_POST['rePassword'];
	if($currentPwd == ""){
		$error['currentPwdEmpty'] = "Current password field cannot be Empty";
	}
	else if($newPassword == ""){
		$error['newPwdEmpty'] = "New password field cannot be Empty";
	}
	else if($rePassword == ""){
		$error['rePwdEmpty'] = "Confirm password field cannot be Empty";
	}
	else{
			$currentPwd = $getFromU->checkInput($currentPwd);
			$newPassword = $getFromU->checkInput($newPassword);
			$rePassword = $getFromU->checkInput($rePassword);
			
		if(!empty($currentPwd) && !empty($newPassword) && !empty($rePassword)){
			if($getFromU->checkPassword($currentPwd) === true){
	
				if($getFromU->validatePasswords($newPassword) === false){
					$error['newPassword'] = "password must contain one Uppercase , Lowercase and numbers with minimum length of 8";
				}
				else if($newPassword != $rePassword){
					$error['rePassword'] = "password does not match";
				}
				else if($currentPwd === $newPassword){
					$error['duplicatePwd'] = "Your new password is same as ur current password. Please try a new one";
				}
				else{
					//upadate into the database
					$getFromU->update('registration', $user_id, array('dob'=> $newPassword));
					header('Location: home.php');
				}
			}
			else{
				$error['currentPwd'] = "Current Password is incorrect";
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

<div  class="container-fluid">

<div class="row">
<div class="col-lg-6 col-md-8 col-sm-10 offset-lg-3 offset-md-2 offset-sm-1 mt-5 mb-3">
<div class="card">
  <h5 class="card-header bg-dark text-white text-center">Password Rest</h5>
  <div class="card-body">
  <form action="" method="post" role="form">
  							<div class="form-group">
                                <label for="currentPwd" class="text-left text-dark">Current Password</label>
                                <input type="password" name="currentPwd" value="<?php getInputValue('currentPwd'); ?>" class="form-control input" id="currentPwd" placeholder="Current Password">
                                <span class="text-danger">
                                <?php
                                if(isset($error['currentPwdEmpty'])){
                                    echo $error['currentPwdEmpty'];
								}
								else if(isset($error['currentPwd'])){
									echo $error['currentPwd'];
								}
                                ?>
                                </span>
                              </div>
							  <div class="form-group">
                                <label for="newPassword" class="text-left text-dark">New Password</label>
                                <input type="password" name="newPassword" value="<?php getInputValue('newPassword'); ?>" class="form-control input" id="newPassword" placeholder="New Password">
                                <span class="text-danger">
                                <?php
                                if(isset($error['newPwdEmpty'])){
                                    echo $error['newPwdEmpty'];
								}
								else if(isset($error['newPassword'])){
									echo $error['newPassword'];
								}
								else if(isset($error['duplicatePwd'])){
									echo $error['duplicatePwd'];
								}
                                ?>
                                </span>
                              </div>
							  <div class="form-group">
                                <label for="rePassword" class="text-left text-dark">Confirm Password</label>
                                <input type="password" name="rePassword" value="<?php getInputValue('rePassword'); ?>" class="form-control input" id="rePassword" placeholder="Re-Enter Password">
                                <span class="text-danger">
								<?php
								if(isset($error['rePassword'])){
									echo $error['rePassword'];
								}
								else if(isset($error['rePwdEmpty'])){
									echo $error['rePwdEmpty'];
								}
								?>
                                </span>
                              </div>
							  <div class="form-group text-center">
							  <button type="submit" name="submit" class="btn btn-info btn-lg" >Submit</button>
							  </div>
							  </form>
  </div>
</div>
</div>

</div>
</div>

</div>
<?php include 'includes/footer.php';?>
