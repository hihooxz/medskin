<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Medsin</title>



    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="<?php echo base_url('assets/asset_login/css/style.css')?>">




  </head>

  <body>
  <form action="" method="POST">
    <div class="login-form">
        <h1>MedSkin</h1>
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Username " id="UserName" name="username">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group">
       <input type="password" class="form-control" placeholder="Password" id="Password" name="password">
       <i class="fa fa-lock"></i>
     </div>
      <span class="alert"><?php	echo validation_errors();?></span>

     <button type="submit" class="log-btn" >Log in</button>


   </div>
 </form>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="<?php echo base_url('assets/asset_login/js/index.js')?>"></script>




  </body>
</html>
