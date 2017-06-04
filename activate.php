<?php
	require_once("objects/user.php");
	$user = new User();
	if(!empty($_GET["id"])) {
	$message = $user->updateStatus($_GET["id"]);
	}
?>
<html>
<head>
<title>Activate link</title>
</head>
<body>
<?php if(isset($message)) { ?>
<div class="message"><?php echo $message; ?></div>
<?php } ?>
</body></html>
		