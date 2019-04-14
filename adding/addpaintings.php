<?php 
session_start();
if(isset($_POST["submit"]))

{
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
			 die();
 		}

 		if($file_size > 2097152){
 			 $errors[]='File size must be excately 2 MB';
			 die();
 		}

 		if(empty($errors)==true)
		{
 			 move_uploaded_file($file_tmp,"../images/".$file_name);
 		}
		else
 		{
 			 print_r($errors);
			 die();
 		}
  }


	$price = $_POST["price"];
    $name=($_FILES['image']['name']);
    $name = substr($name, 0, -4);
	$sold= 'No';
	$likes = 0;
	$id = $_SESSION["id"];
	$type= $_POST["type"];
    


		$servername = "localhost";
		$username = "Gurmeet";
		$password = "WINDOWSTEN";
		$dbname = "art_gallery";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO art VALUES ('$name', $id, $likes, '$type', $price,	'$sold', 0 )";
        $conn->query($sql);
        
        header('Location: http://localhost/Art/artist_details.php');
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Adding images</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    
</head>
<style>
    .page-wrapper{
        background-image: url('b.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    .card-2 .card-heading{
        background-image: url('a.jpg');
        background-repeat: no-repeat;
        
        background-size: cover;
    }
    </style>
</head>
<body>

    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Upload Painting</h2>
                    <form id="myform" method="post"  enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Price" name="price">
                        </div>


                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="type">
                                            <option disabled="disabled" selected="selected">Image Type</option>
                                            <option>Nature </option>
                                            <option>Animal</option>
                                            <option>Landscape</option>
											<option>19th</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                              	<input id="img" type="file" name="image" style="width:500px;"/>
                                </div>
                            </div>
                        </div>
                        <div id='preview'></div>

                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit" name='submit'>Submit</button>
                            <button type="button" class="btn btn--radius btn--green" onclick="window.location.href = 'http://localhost/Art/artist_details.php'">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

   



</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
