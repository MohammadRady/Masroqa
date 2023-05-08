<?php
// variable declaration
$errors = array(); 
session_start();
$db = mysqli_connect('localhost', 'root', '72147214', 'item');

if (isset($_POST['verfiy_password'])) {
	// receive input value from the form
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    
	// form validation: ensure that the form is correctly filled
	if (empty($password_1)) { array_push($errors, "Password is required"); }
    $password_1 = md5($password_1);
    // variable declaration
    $_SESSION['success'] = "";
    $id=$_GET['id2'];
    $pass=$_GET['Pass'];
    $q=false;
	// delete item if there are no errors in the form
	if (count($errors) == 0) {
		if ($pass == $password_1)
        {
            $con=mysql_connect("localhost","root","72147214");
            mysql_select_db("item");
            $q=mysql_query("delete from item where id=$id");
        }
        if ($q)
        {
            header("location:browse.php");
        }
        else
        {
            echo "Not Deleted";
        }
		$_SESSION['success'] = "Deleted";
		//header('location: browse.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Item</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Delete ITEM</h2>
	</div>
	
	<form action = "<?php $_PHP_SELF ?>" method = "POST">

		<?php include('errors.php'); ?>
      
		<!__ password __>
        <div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		
        <div class="input-group">
			<button type="submit" class="btn" name="verfiy_password">Submit</button>

		</div>
		
	</form>
</body>
</html>