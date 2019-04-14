<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
</head>
<style>
body{
    margin-top:20px;
    background-image: url('b.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
/**
 * Panels
 */
/*** General styles ***/
.panel {
  box-shadow: none;
}
.panel-heading {
  border-bottom: 0;
}
.panel-title {
  font-size: 17px;
}
.panel-title > small {
  font-size: .75em;
  color: #999999;
}
.panel-body *:first-child {
  margin-top: 0;
}
.panel-footer {
  border-top: 0;
}

.panel-default > .panel-heading {
    color: #333333;
    background-color: transparent;
    border-color: rgba(0, 0, 0, 0.07);
}

/**
 * Profile
 */
/*** Profile: Header  ***/
.profile__avatar {
  float: left;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  margin-right: 20px;
  overflow: hidden;
}
@media (min-width: 768px) {
  .profile__avatar {
    width: 100px;
    height: 100px;
  }
}
.profile__avatar > img {
  width: 100%;
  height: auto;
}
.profile__header {
  overflow: hidden;
}
.profile__header p {
  margin: 20px 0;
}
/*** Profile: Table ***/
@media (min-width: 992px) {
  .profile__table tbody th {
    width: 200px;
  }
}
/*** Profile: Recent activity ***/
.profile-comments__item {
  position: relative;
  padding: 15px 16px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}
.profile-comments__item:last-child {
  border-bottom: 0;
}
.profile-comments__item:hover,
.profile-comments__item:focus {
  background-color: #f5f5f5;
}
.profile-comments__item:hover .profile-comments__controls,
.profile-comments__item:focus .profile-comments__controls {
  visibility: visible;
}
.profile-comments__controls {
  position: absolute;
  top: 0;
  right: 0;
  padding: 5px;
  visibility: hidden;
}
.profile-comments__controls > a {
  display: inline-block;
  padding: 2px;
  color: #999999;
}
.profile-comments__controls > a:hover,
.profile-comments__controls > a:focus {
  color: #333333;
}
.profile-comments__avatar {
  display: block;
  float: left;
  margin-right: 20px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  overflow: hidden;
}
.profile-comments__avatar > img {
  width: 100%;
  height: auto;
}
.profile-comments__body {
  overflow: hidden;
}
.profile-comments__sender {
  color: #333333;
  font-weight: 500;
  margin: 5px 0;
}
.profile-comments__sender > small {
  margin-left: 5px;
  font-size: 12px;
  font-weight: 400;
  color: #999999;
}
@media (max-width: 767px) {
  .profile-comments__sender > small {
    display: block;
    margin: 5px 0 10px;
  }
}
.profile-comments__content {
  color: #999999;
}
/*** Profile: Contact ***/
.profile__contact-btn {
  padding: 12px 20px;
  margin-bottom: 20px;
}
.profile__contact-hr {
  position: relative;
  border-color: rgba(0, 0, 0, 0.1);
  margin: 40px 0;
}
.profile__contact-hr:before {
  content: "OR";
  display: block;
  padding: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  background-color: #f5f5f5;
  color: #c6c6cc;
}
.profile__contact-info-item {
  margin-bottom: 30px;
}
.profile__contact-info-item:before,
.profile__contact-info-item:after {
  content: " ";
  display: table;
}
.profile__contact-info-item:after {
  clear: both;
}
.profile__contact-info-item:before,
.profile__contact-info-item:after {
  content: " ";
  display: table;
}
.profile__contact-info-item:after {
  clear: both;
}
.profile__contact-info-icon {
  float: left;
  font-size: 18px;
  color: #999999;
}
.profile__contact-info-body {
  overflow: hidden;
  padding-left: 20px;
  color: #999999;
}
.profile__contact-info-body a {
  color: #999999;
}
.profile__contact-info-body a:hover,
.profile__contact-info-body a:focus {
  color: #999999;
  text-decoration: none;
}
.profile__contact-info-heading {
  margin-top: 2px;
  margin-bottom: 5px;
  font-weight: 500;
  color: #999999;
} #result th {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;
  vertical-align: middle;
}#result td{
   border: 2px solid #ddd;
  padding: 10px;
  text-align: center;
  vertical-align: middle;
}
table{
  table-layout: fixed;
  width:800px;
}

#result tr:nth-child(even){background-color: #f2f2f2;}



#result th  {
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: left;
  background-color: dodgerblue;
  color: white;
}
</style>
<body>

  <?php
  
  $id = $_SESSION["id"];
  
   $host="localhost";
    $dbusername="Gurmeet";
    $dbpassword="WINDOWSTEN";
      $dbname="art_gallery";
      $con=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
      $sql = "select * from artist where Id=".$id ;
      $sql2 = "select * from art where Painter=".$id ;
      $sql1 = "select sum(likes) from art where painter = ".$id ;
      $res1=mysqli_query($con,$sql1);
      $row1 = mysqli_fetch_assoc($res1);
      $likes = $row1["sum(likes)"];
    $res=mysqli_query($con,$sql);
    $res2=mysqli_query($con,$sql2);
    $cnt = mysqli_num_rows($res2);
    if (mysqli_num_rows($res) > 0)
    {
    $row = mysqli_fetch_assoc($res);
    }
    else
      die();

  echo '
<div class="container">
<div class="row">


           <div class="col-sm-9">
           <div class="panel panel-default">
           <div class="panel-heading" style="text-align:center;">
           <h1 class="panel-title">Artist profile</h1>
           </div>
           <div class="panel-body" style="font-size:120%;">
            <div class="profile__avatar">
               <img src="artist_profile/'.$row["Prof_img"].'.jpg" class="img-thumbnail home_img" width="40px"  height="50px" alt="user img">
            </div>
              <div class="profile__header" style="position:relative;left:50px;top:10px;">
                <b>Painter</b> : '.$row["pname"].'<br><br>
                <b>Username</b>: '.$row["Username"].'<br>

              </div>
           </div>
          </div>
          </div>


      <div class="col-sm-3">
          <a href="http://localhost/Art/adding/addpaintings.php" class="profile__contact-btn btn btn-lg btn-block btn-info">
          Add Painting
          </a>
          </div>

          <div class="col-sm-3">
              <button type="button" class="profile__contact-btn btn btn-lg btn-block btn-info" data-toggle="modal" data-target="#squarespaceModal">
              Edit details
              </button>
              </div>


          <div class="col-sm-3">
              <a href="http://localhost/Art/index.php" class="profile__contact-btn btn btn-lg btn-block btn-warning" >
               Logout
              </a>
              </div>




          <div class="col-xs-12 col-sm-9">

        <!-- User info -->
        <div class="panel panel-default">
          <div class="panel-heading" style="text-align:center;">
          <h1 class="panel-title">Artist info</h1>
          </div>
          <div class="panel-body" style="font-size:120%;">
            <table class="table profile__table">
              <tbody>
                <tr>
                  <th><strong>Home</strong></th>
                  <td>'.$row["Birthplace"].'</td>
                </tr>
                <tr>
                  <th><strong>Total Likes</strong></th>
                  <td>'.$likes.'</td>
                </tr>
                <tr>
                  <th><strong>Total Uploads</strong></th>
                  <td>'.$cnt.'</td>
                </tr>

                <tr>
                  <th><strong>E-mail address</strong></th>
                  <td> '.$row["Email"].'</td>
                </tr>

                <tr>
                  <th><strong>Mobile:</strong></th>
                  <td> '.$row["Phone"].'</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>';
    ?>
  <?php

   if (mysqli_num_rows($res2) > 0)
    {
      echo  '
        <div class="panel panel-default">
          <div class="panel-heading" style="text-align:center;">
              <h2 class="panel-title">List of Paintings</h2>
          </div>
          <div class="panel-body">

             <table id="result"> <tr><th>Name</th><th> Types </th> <th> Likes </th><th> Price</th> <th> Sold </th></tr>';

               while( $row2 = mysqli_fetch_assoc($res2))
              {
               echo   ' <tr>
                        <td>  <img src="images/'.$row2["Name"].'.jpg" class="img-thumbnail home_img" width="100px" alt="image"></td>
                         <td>'.$row2["Type"].'</td>
                        <td>' .$row2["Likes"].'</td>
                        <td>'.'Rs. '.$row2["Price"].'</td>
                        <td>'. $row2["Sold"].'</td>
                        </tr>';

              }

             echo    '</table>
              </div>
           </div>';
    }
    else
        echo " Empty lists";

?>
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Edit Details</h3>
		</div>
		<div class="modal-body">

            <!-- content goes here -->
			<form method="post" action="http://localhost/Art/edit_artist.php?q=<?php echo $id; ?>">
			<div class="form-group">
                <input name="name" type="text" class="form-control" placeholder="Enter Name" required>
              </div>
			  <div class="form-group">
                <input name="ph" type="text" class="form-control" placeholder="Enter Phone number" required>
              </div>
              <div class="form-group">
                <input name="email" type="email" class="form-control" placeholder="Enter email" required>
              </div>
              <div class="form-group">
                <input name="birth" type="text" class="form-control" placeholder="Enter birthplace" required>
              </div>
			  <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Enter Username" required>
              </div>
              <button name="edit" type="submit" class="btn btn-default">Edit Details</button>
            </form>

		</div>
		<div class="modal-footer">
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
				</div>
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
				</div>

			</div>
		</div>
	</div>
  </div>
</div>



</body>
</html>
