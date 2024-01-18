<?php /*<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Products Management System/Billing</title>
<link rel="stylesheet" href="<?php echo $this->config->item('css_url');?>style.default.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->config->item('css_url');?>style.shinyblue.css" type="text/css" />

<script type="text/javascript" src="<?php echo $this->config->item('jsc_url');?>jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('jsc_url');?>jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('jsc_url');?>jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('jsc_url');?>modernizr.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('jsc_url');?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('jsc_url');?>jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('jsc_url');?>custom.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery('#login').submit(function(){
var u = jQuery('#username').val();
var p = jQuery('#password').val();
if(u == '' && p == '') {
jQuery('.login-alert').fadeIn();
return false;
}
});
});
</script>
</head>

<body class="loginpage">

<div class="loginpanel">
<div class="loginpanelinner">
<div class="logo animate0 bounceIn"><img src="images/logo.png" alt="" /></div>
<form action="<?php echo $this->config->item('lnk_url')."admin/validatelogin";?>" method="POST" name="loginFrm" onsubmit="return checkL();">
<div class="inputwrapper login-alert">
<?php if($ERR){ ?>
<div class="alert alert-error" style="display:block;"><?php echo $ERR;?></div>
<?php } ?>
</div>
<div class="inputwrapper animate1 bounceIn">
<input type="text" name="UNM" class="input" placeholder="Enter any username">
</div>
<div class="inputwrapper animate2 bounceIn">
<input type="password" name="PWD" class="input" placeholder="Enter any password" >
</div>
<div class="inputwrapper animate3 bounceIn">
<button name="Login">Sign In</button>
</div><!--
<div class="inputwrapper animate4 bounceIn">
<label><input type="checkbox" class="remember" name="signin" /> Keep me sign in</label>
</div>-->

</form>
</div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
<p>&copy; 2015. Paresh Asvenkar. All Rights Reserved.</p>
</div>

</body>
</html>*/ ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dishtavo 2.0 </title>

  <!-- Bootstrap -->
  <link href="<?= base_url('public/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url('public/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url('public/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?= base_url('public/vendors/animate.css/animate.min.css') ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?= base_url('public/build/css/custom.min.css') ?>" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <?php
          $session = session();
          if ($session->has('errorMessage')) {
            echo '<div class="alert alert-error">' . $session->getFlashdata('errorMessage') . '</div>';
          }
          ?>
          <form method="post" action="<?= base_url('dish2o_admin/validatelogin') ?>">
            <h1>Admin Login</h1>
            <span><?php echo isset($error) ? $error : ''; ?></span>
            <div>
              <input type="text" name="username" class="form-control" placeholder="Username" required="" value="<?= set_value('username') ?>" />
              <?= isset($validation) ? $validation->showError('username') : '' ?>
            </div>
            <div>
              <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              <?= isset($validation) ? $validation->showError('password') : '' ?>
            </div>
            <div>
              <a class="btn btn-default submit" href="index.html">Log in</a> <button type="submit">Login</button>
              <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">New to site?
                <a href="#signup" class="to_register"> Create Account </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><img src="<?= base_url('public/images/dishtavo_logo_transparent.png') ?>"></h1>
                <p>©2023 All Rights Reserved. Distavo Admin. Privacy and Terms</p>
              </div>
            </div>
          </form>
        </section>
      </div>

      <div id="register" class="animate form registration_form">
        <section class="login_content">
          <form>
            <h1>Create Account</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="index.html">Submit</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Already a member ?
                <a href="#signin" class="to_register"> Log in </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <img src="" />
                <h1>
                  <h1><img src="<?= base_url('public/images/dishtavo_logo_transparent.png') ?>"></h1>
                </h1>
                <p>©2023 All Rights Reserved. Distavo Admin. Privacy and Terms</p>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>

</html>