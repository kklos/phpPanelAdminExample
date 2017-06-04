<?php

    require_once("session.php");

    
    require_once("objects/user.php");

    $database = new Database();
    $db = $database->getConnection();
    $auth_user = new USER();
    $userDetails = new User($db);
 
    $userDetails->getUserDetails();
    
    $user_id = $_SESSION['user_session'];
    $user_username = $userDetails->user_name;
    
    $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));
    
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Material Design Bootstrap</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="libs/css/metro-bootstrap.min.css" rel="stylesheet">


</head>

<body>


    <header>

        <nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">
       Main page
    </a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
   <ul class="nav navbar-nav navbar-right">
      <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href=""><?php echo"<strong>Witaj użytkowniku {$user_username}</strong>";?></a>
      </li>
       <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="logout.php?logout=true"><i class="fa fa-gear"></i> Logout</a>
      </li>

       <li class="dropdown">
        <a href="" class="dropdown-toggle fa fa-user" data-toggle="dropdown"> Profile <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="profile_details.php">Browse</a></li>

          <li><a href="update_profile.php">Edit</a></li>
          <li><a href="#">Change password</a></li>
        </ul>
      </li>

    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
    </header>

       
