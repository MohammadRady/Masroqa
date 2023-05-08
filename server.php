<?php 
	session_start();

    // variable declaration
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '72147214', 'item');

	// Upload Item
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$Description = mysqli_real_escape_string($db, $_POST['Description']);
		$ph = mysqli_real_escape_string($db, $_POST['ph']);
        $category = mysqli_real_escape_string($db, $_POST['category']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$FormLink = mysqli_real_escape_string($db, $_POST['FormLink']);
        
		// form validation: ensure that the form is correctly filled
		if (empty($Description)) { array_push($errors, "Description is required"); }
		if (empty($category)) { array_push($errors, "Category is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($FormLink)) { array_push($errors, "FormLink is required"); }
		if (empty($ph)) { array_push($errors, "Photo is required"); }

		// Upload item if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO item (pass , DESC_ , formlink , photo , category) 
                  VALUES('$password', '$Description' , '$FormLink' , '$ph' , '$category' )";
			mysqli_query($db, $query);

			$_SESSION['success'] = "Adding is Done";
			header('location: first.php');
		}

	}
?>