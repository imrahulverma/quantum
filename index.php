<?php

//index.php

//Include Configuration File
include('confi.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];
  
  
  
   $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


                          if(!isset($_SESSION['access_token']))
{ 

  
  
$login_button = '                           <div class="container"><a href="'.$google_client->createAuthUrl().'" class="btn btn-lg btn-google  text-uppercase "> <img src="https://img.icons8.com/color/16/000000/google-logo.png">  
    Signup Using Google </a></div></div><br>
    <div class="container"><center>
    <a class="btn btn-lg btn-social btn-facebook"><img src="https://www.freepnglogos.com/uploads/facebook-logo-icon/facebook-logo-icon-file-facebook-icon-svg-wikimedia-commons-4.png">
    <i class="fa fa-facebook fa-fw"></i> Sign in with Facebook
    </a></center>
</div>'   ;


   

 
}

?>




<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP Login using Google Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css"  href = "myStyle.css" />

 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 
 </head>
 <body>
<div class="panel panel-default">
<h2><center> Quantum hunt Task2 </center></h2>
<h4><center> Login using Facebook/Google</center> </h4> 
<br>
<br>
     <?php
   if($login_button == '')
   {
    echo '<div class="card-header">Welcome User</div><div class="card-body">';
    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';

    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
    echo '<h3><a href="logout.php">Logout</h3></div>';
      $hide=1;
   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
   </div>



</body>
</html>