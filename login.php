<?php
include 'core/init.php';
echo "its working fine";
if(isset($_POST['signin'])){
    echo "the button has been clicked";
    $email = $_POST['email'];
    $password = $_POST['password'];

    $error = array();
    if($email == ""){
        $error['emailempty'] = "Email field cannot be empty";
       }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           $error['emailInvalid'] = "Invalid email";
       }
        else if($password == ""){
           $error['passwordEmpty'] = "Password Field cannot be Empty";
       }
       else{
        if(!empty($email) && !empty($password)){
            $email = $getFromU->checkInput($email);
            $password = $getFromU->checkInput($password);
            $result = $getFromU->login($email, $password);
            if($result === true){
                echo "you have successfully logged In";
                header('Location: home.php');
            }
            else if($getFromU->checkEmail($email) == true){
                $error['emailCorrect'] = "Your email <strong>$email</strong> is correct please check your password";
            }
            else{
                $error['wrongInfo'] = "your credentials are Incorrect No such <strong> $email</strong> is registered";
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


<section class="reg-info__section">
        <div class="container-fluid">
        <div class="row">
<div class="col-lg-10 offset-lg-1">
       
        <?php
                              if(isset($error['emailCorrect'])){
                                  echo '<div class="alert alert-warning text-center" role="alert">'.$error['emailCorrect'].'</div>';
                              }
                              else if(isset($error['wrongInfo'])){
                                  echo '<div class="alert alert-danger text-center" role="alert">'.$error['wrongInfo'].'</div>';
                              }
                              ?>
            
</div>
</div>
            
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-1">
                    <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-lg-6 register-info text-center">
                        <h5 class="pt-3 text-center">If not <strong>Registered</strong></h5>
                        <h4 class="text-center" style="font-family: 'Anton', sans-serif;"> <a href="#" class="text-center"><i class="fas fa-user-plus align-middle"></i></a><strong>Create</strong> an Account</h4>
                        <div class="guidelines">

                            <p class="guidelines-statement">Register with your Email or mobile no.</p>
                            <p class="guidelines-statement">A OTP(One Time Password) will be send.</p>
                            <p class="guidelines-statement">So Keep Your mobile with yourself.</p>
                        </div>
                        <button type="submit" class="btn btn-outline-info register-link  text-white py-2 mb-3">Register</button>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-center login-info">
                        <h5 class="text-white pt-3">Already have an <strong>accout</strong></h5>
                        <h4 class="text-white" style="font-family: 'Anton', sans-serif;"><a class=""><i class="fas fa-sign-in-alt"></i></a>Login</h4>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 offset-lf-3 offset-lg-3">
                         <form action="" method="post" role="form">
                              <div class="form-group emailgroup">
                                <label for="exampleInputEmail1" class="text-left text-white">Email address</label>
                                <input type="email" name="email" class="form-control" value="<?php getInputValue('email'); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                               <span class="text-danger">
                               <?php
                               if(isset($error['emailempty'])){
                                   echo $error['emailempty'];
                               }
                               else if(isset($error['emailInvalid'])){
                                   echo $error['emailInvalid'];
                               }
                               ?>
                               </span>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1" class="text-left text-white">Password</label>
                                <input type="password" name="password" value="<?php getInputValue('password'); ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                <span class="text-danger">
                                <?php
                                if(isset($error['passwordEmpty'])){
                                    echo $error['passwordEmpty'];
                                }
                                ?>
                                </span>
                              </div>
                              <div class="form-check remember">
                                <input type="checkbox" class="form-check-input remember-me mr-2" id="exampleCheck1">
                                <label class="form-check-label mb-1 text-info" for="exampleCheck1">Remember Me</label>
                              </div>
                              <button type="submit" name="signin" class="btn btn-login btn-outline-success text-white py-2 mb-3">Login</button>
                              <div class="form-group text-info">
                              <p>Forget Password:-<a href="passwordReset.php" class="text-warning">Click here</a></p>
                              </div>
                        </form>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'includes/footer.php';?>