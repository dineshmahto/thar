<?php
class User{
    protected $pdo;
    function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function checkInput($var){
		$var = htmlspecialchars($var);
		$var = trim($var);
		$var = stripcslashes($var);
		return $var;
	}

    public function validatePasswords($pw2) {
        $uppercase = preg_match('@[A-Z]@', $pw2);
        $lowercase = preg_match('@[a-z]@', $pw2);
        $number    = preg_match('@[0-9]@', $pw2);

          if(!$uppercase || !$lowercase || !$number || strlen($pw2) < 8) {
            return false;
        }
        else{
            return true;
        }
    }

    public function validatePhoneNumber($pn) {
        
    if(!preg_match('/^9862[0-9]{10}+$/', $pn) || !preg_match('/^7005[0-9]{6}+$/', $pn) || !preg_match('/^9615[0-9]{10}+$/', $pn)) {
        return false;
        }
        else{
            return true;

         } 
    }

	public function update($table, $user_id, $fields = array()){
		$columns = '';
		$i =1;
		foreach($fields as $name => $value){
			$columns .= "{$name} = :{$name}";
			if($i < count($fields)){
				$columns .  ',';
			}
			$i++;
			$sql = "UPDATE {$table} SET {$columns} WHERE 'user_id' = {user_id}";
			if($stmt = $this->pdo->prepare($sql)){
				foreach($fields as $key => $value){
					$stmt->bindValue(':'.$key, $value);
				}
			}
		}
	}
// checking whether the email already exist
	public function checkEmail($email){
		$stmt = $this->pdo->prepare("SELECT email FROM registration WHERE email =:email");
		$stmt->bindParam(":email",$email, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function checkOtp($otp){
		$stmt = $this->pdo->prepare("SELECT otp FROM registration WHERE otp =:otp");
		$stmt->bindParam(":otp, $otp", PDO::PARAM_INT);
		$stmt->execute();
		$count= $stmt->rowCount();
		if($count > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function checkUsername($username){
		$stmt = $this->pdo->prepare("SELECT username FROM registration WHERE username =:username");
		$stmt->bindParam(":username",$username, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}
		else{
			return false;
		}
    }
    public function checkPhoneno($mobileno){
		$stmt = $this->pdo->prepare("SELECT phoneno FROM registration WHERE phoneno =:mobileno");
		$stmt->bindParam(":mobileno",$mobileno, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function checkPassword($password){
		$stmt = $this->pdo->prepare("SELECT dob FROM registration WHERE dob =:password");
		$stmt->bindParam(":password",$password, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0){
			return true;
		}
		else{
			return false;
		}
	}
//user login function
    
public function login($em, $pw) {
    

    $query = $this->pdo->prepare("SELECT * FROM registration WHERE email=:em AND dob=:pw");
    $query->bindParam(":em", $em);
    $query->bindParam(":pw", $pw);

    $query->execute();
    $user = $query->fetch(PDO::FETCH_OBJ);

    if($query->rowCount() == 1) {
        $_SESSION['user_id'] = $user->user_id;
        return true;
    }
    else {
        
        return false;
    }
}
public function loggedIn(){
    return(isset($_SESSION['user_id'])) ? true : false;
}

	//user registration function
	public function register($username, $email, $phoneno, $dob){
		
        
        $query = $this->pdo->prepare("INSERT INTO registration (username, email, dob, phoneno)
                                        VALUES(:un, :em, :db, :pn)");

        
        $query->bindParam(":un", $username);
        $query->bindParam(":em", $email);
        $query->bindParam(":db", $dob);
        $query->bindParam(":pn", $phoneno);
        
        
        
        return $query->execute();

	}
//logging out the user 
	public function logOut(){
		$_SESSION = array();
		session_destroy();
		header("Location : index.php");
	}
//function to fetch all the data related to this userId
	public function userData($user_id){
		$stmt = $this->pdo->prepare("SELECT * FROM registration WHERE user_id = :user_id");
		$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}
	public function userDataByEmail($email){
		$stmt = $this->pdo->prepare("SELECT * FROM registration WHERE email = :eamil");
		$stmt->bindParam(":email", $email, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
    }
	
	

    public function set_message($message){
    if(!empty($message)){
        $_SESSION['message'] = $message;
    }
    else{
        $message = "";
    }
    }
    public function recoverPassowrd($email){
        if(checkEmail($email) === true){
            $validation_code = md5($email, microtime());
            setcookie('temp_access_code', $validation_code, time()+60);
            $subject = "Please reset your Password";
            $message = "Here is your Password reset code {validation_code} click here to reset your password http://localhost/sucide/resetCode.php?email=$email&code=$validation_code";
            $header ="From noreply";
            if(sendmail($subject, $message, $header)){
                return true;
            }
            else{
                return false;
            }

        }
    }
}





?>