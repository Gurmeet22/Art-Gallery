<?php
$err = "*Every field is required";
if(isset($_POST["register"])){
	if(isset($_FILES['image']))
	{
 		$errors= array();
 		$file_name = $_FILES['image']['name'];
 		$file_size =$_FILES['image']['size'];
 		$file_tmp =$_FILES['image']['tmp_name'];
 		$file_type=$_FILES['image']['type'];
 		$file_array=explode('.',$_FILES['image']['name']);
 		$file_ext=$file_array[count($file_array)-1];

 		$extensions= array("jpeg","jpg","png");

 		if(in_array($file_ext,$extensions)=== false)
 		{
 			 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
 		}

 		if($file_size > 2097152){
 			 $errors[]='File size must be excately 2 MB';
 		}

 		if(empty($errors)==true)
		{
 			 move_uploaded_file($file_tmp,"User_profile/".$file_name);
 		}
		else
 		{
 			 print_r($errors);
			 die();
 		}
  }

	$name = $_POST["name"];
	$email = $_POST["email"];
	$ph = $_POST["ph"];
	$user = $_POST["username"];
	$pwd = $_POST["pwd"];
	$cpwd = $_POST["cpwd"];
	$pic=($_FILES['image']['name']);
	$pic = substr($pic, 0, -4);
	
	if(strcmp($pwd,$cpwd)!=0){
		$err = "*Passwords do not match";
	}else{
		$servername = "localhost";
		$username = "Gurmeet";
		$password = "WINDOWSTEN";
		$dbname = "art_gallery";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "INSERT INTO user VALUES ('$name', '$ph', '$email', '$user', '$pwd', 0, '', '$pic')";
		$conn->query($sql);

		header('Location: http://localhost/Art/index.php');
	}
}
?>



<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">		
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link href="MainStyle.css" rel="stylesheet" type="text/css"/>
        <title>Register..</title>
		<style>
			.container {
				position:relative;
				top:100px;
				max-width: 650px;
				padding: 15px;
				margin: 0 auto;
				border-radius: 0.3em;
				background-color: transparent;
			}

		</style>
    </head>
    <body>
		<div class="container">
			<div class="col-md-12" >
                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1 style="color:white;text-align:center;margin-bottom:50px;">Registration</h1>
                <div class="form-group">
                        <input type="text" id="Name" placeholder="Enter your Name" class="form-control" name="name" required autofocus>                  
                </div>
             
                <div class="form-group">
                       <input type="email" id="email" placeholder="Enter your Email id" class="form-control" name= "email" required>        
                </div>
				
                <div class="form-group">
                        <input type="text" id="ph" placeholder="Enter your phone number" class="form-control" name="ph" required autofocus>                  
                </div>
				<div class="form-group">
                        <input type="text" id="uame" placeholder="Enter a Username" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                        <input type="password" id="password" placeholder="Enter a Password" class="form-control" name="pwd" required>
                </div>
                <div class="form-group">
                        <input type="password" id="password" placeholder="Confirm Password" class="form-control" name="cpwd" required>
                </div>
				<div class="form-group">
					<input type="file" name="image" style="width:500px ;"/>
				</div>
                <div class="form-group">
						<span style="color:yellow"><?php echo "$err";?></span>
                        
                </div>
				<div class="form-group">
                <input type="submit" class="btnContactSubmit" name="register" value="Register" >
				        <input type="button"  class="btnContactSubmit" name="cancel" value="Cancel" onclick="window.location.href = 'http://localhost/Art/index.php'" style="position:relative;left:310px;top:-65px"></div>
            </form> 
        </div>
		</div>
	</body>
</html>