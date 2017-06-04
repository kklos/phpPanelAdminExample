<?php
require_once('config/database.php');
require_once("PHPMailer/PHPMailerAutoload.php");
//require_once("session.php");

class User
{	

	private $conn;
	private $table_name = "users";

	public $user_name;
	public $first_name;
	public $last_name;
	public $user_email;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->getConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function sendActivateMail($user_id, $user_mail)
	{


		$actual_link = "http://$_SERVER[HTTP_HOST]/announcementSystem/"."activate.php?id=" . $user_id;
		$subject = "User Registration Activation Email";
		$content = "Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";
		$mailHeaders = "From: Admin\r\n";



		$mail             = new PHPMailer();

		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "tls";                 
		$mail->Host = gethostbyname('smtp.gmail.com');      // SMTP server
		$mail->Port       = 587;                   // SMTP port
		$mail->Username   = "pankwerty123@gmail.com";  // username 
		$mail->Password   = "qwerty123QWERTY123";            // password

		$mail->SetFrom('pankwerty123@gmail.com', 'Activate link');

		$mail->Subject    = $subject;

		$mail->MsgHTML($content);

		$address = $user_mail;
		$mail->AddAddress($address, "Activate link");

		if(!$mail->Send()) {
  			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
  			echo "Message sent!";
		}
	}

	public function register($uname,$umail,$upass, $ufirstname, $ulastname)
	{
		$user = new User();
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(user_name, first_name, last_name, user_email, user_pass) 
		                                               VALUES(:uname, :ufirstname, :ulastname, :umail, :upass)");
				
			$stmt->bindparam(":ufirstname", $uname);
			$stmt->bindparam(":ulastname", $uname);								  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  
				
			$stmt->execute();	
			
			$lastRegisteredUserId = $this->conn->lastInsertId();




			$user->sendActivateMail($lastRegisteredUserId, $umail);

			return $stmt;	


		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
		}				
	}

	public function updateStatus($user_id)
	{
		try
		{
			$stmt = $this->conn->prepare("UPDATE users set status = 'active' WHERE user_id= :user_id");
				
			$stmt->bindparam(":user_id", $user_id);			
				
			$stmt->execute();	

			$message = "Your account is activated.";

		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			$message = "Problem in account activation.";
		}

		return $message;	
	}

	public function updateUser()
	{

	$user = new User();
 	$currentLoggedUserId = $user->getActualLoggedUserId();

 	$query = "UPDATE
                " . $this->table_name . "
            SET
                user_name = :user_name,
                first_name = :first_name,
                last_name = :last_name,
                user_email  = :user_email
            WHERE
                user_id = :user_id";
 
    $stmt = $this->conn->prepare($query);
 
    // posted values
    $this->user_name=htmlspecialchars(strip_tags($this->user_name));
    $this->first_name=htmlspecialchars(strip_tags($this->first_name));
    $this->last_name=htmlspecialchars(strip_tags($this->last_name));
    $this->user_email=htmlspecialchars(strip_tags($this->user_email));
 
    // bind parameters
    $stmt->bindParam(':user_name', $this->user_name);
    $stmt->bindParam(':first_name', $this->first_name);
    $stmt->bindParam(':last_name', $this->last_name);
    $stmt->bindParam(':user_email', $this->user_email);
    $stmt->bindParam(':user_id', $currentLoggedUserId);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;

	}

	public function doLogin($uname,$umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT user_id, user_name, user_email, user_pass FROM users WHERE user_name=:uname OR user_email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['user_pass']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function getActualLoggedUserId()
	{
		if(isset($_SESSION['user_session']))
		{
			return $_SESSION['user_session'];
		}
	}

	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}

	function getUserDetails(){
 
 	$user = new User();
 	$currentLoggedUserId = $user->getActualLoggedUserId();
    $query = "SELECT
                user_name, first_name, last_name, user_email
            FROM
                " . $this->table_name . "
            WHERE
                user_id = :user_id";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(":user_id", $currentLoggedUserId);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->user_name = $row['user_name'];
    $this->first_name = $row['first_name'];
    $this->last_name = $row['last_name'];
    $this->user_email = $row['user_email'];
	}
}
?>