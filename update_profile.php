<?php
include_once "header.php";
include_once 'config/database.php';
include_once 'objects/user.php';

// prepare objects
$user = new User($db);
 
// read the details of user to be edited
$user->getUserDetails();


$page_title = "Edit Profile";



 echo"<div class='container'>";
// read products button
 
// if the form was submitted
if($_POST){
 
    // set user property values
    $user->user_name = $_POST['user_name'];
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->user_email = $_POST['user_email'];
 
    // update the user
    if($user->updateUser()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Product was updated.";
        echo "</div>";
    }
 
    // if unable to update the user, tell the user
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update user.";
        echo "</div>";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Username</td>
            <td><input type='text' name='user_name' value='<?php echo $user->user_name; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>First name</td>
            <td><input type='text' name='first_name' value='<?php echo $user->first_name; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Last name</td>
            <td><textarea name='last_name' class='form-control'><?php echo $user->last_name; ?></textarea></td>
        </tr>

         <tr>
            <td>Your email</td>
            <td><textarea name='user_email' class='form-control'><?php echo $user->user_email; ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
</form>

<?php

echo"</div>";
// set page footer
include_once "footer.php";
?>
