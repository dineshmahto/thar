<?php
include 'core/init.php';
echo "its working fine";
$user_id = $_SESSION['user_id'];
$user = $getFromU->userData($user_id);


?>
<?php include 'includes/dashboardHeader.php';?>
<!-- <div class="container-fluid">
<div class="row">
<div class="col-lg-10 col-md-10 col-sm-10 offset-lg-1 offset-md-1 offset-sm-1 mt-5">
<h1>welcome <?php echo $user->username;?></h1>
<ul>
<li><a href="passwordReset.php">Password Reset</a></li>
<li><a href="logout.php">Password Reset</a></li>

if(isset($_POST['next'])){
        $name = $getFromU->checkInput($_POST['name']);
        $fathername = $getFromU->checkInput($_POST['fathername']);
        $mothername = $getFromU->checkInput($_POST['mothername']);
        $dob = $getFromU->checkInput($_POST['dob']);
        $gender = $getFromU->checkInput($_POST['gender']);



    }
</ul>
</div>
</div>
</div> -->

<?php 
if(isset($_GET['step']) === true && empty($_GET['step'] === false)){
    ?>
    <p>hello world</p>
    <?php
}

?>





<?php include 'includes/dashboardFooter.php';?>


