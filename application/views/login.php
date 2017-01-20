<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOGIN</title>
  <!-- FAVICON!! -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico');?>" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url('assets/img/favicon-32x32.png');?>" type="image/x-icon" sizes='32x32'>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
  .content-wrapper{
     min-height: 100%;
     background-color: #FFFFFF;
     margin:0px;
  }
  </style>
</head>
<body>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <p class='text-center'>
    <img src='<?php echo base_url('assets/img/USC_LOGO.jpg');?>' width='10%' />
  </p>
  <!-- Main content -->
  <h3 class='text-center'><?php echo $pagetitle;?></h3>
  <section class="content">

    <!-- Your Page Content Here -->
    <div class='col-sm-6 col-sm-offset-3'>
      <?php if($error) {?>
      <div class='alert alert-danger text-center'>
          <span>Invalid Username/Password Combo!</span>
          <span class="fa fa-exclamation fa-2x pull-right" aria-hidden="true"></span>
      </div>
      <?php } ?>
      <div class='box panel panel-success btn-flat'>
        <div class='panel-heading'>
          <h3 class='panel-title'>Login Form</h3>
        </div>
        <form method="POST" action="<?php echo base_url();?>index.php/login/validate" autocomplete="off">
        <div class='panel-body'>

          <input type='text' class='form-control' name='username' placeholder='Username'><br>
          <input type='password' class='form-control' name='pass' placeholder='Password'><br>
          <button type='submit' class='btn btn-success btn-flat pull-right'>
              <i class='fa fa-sign-in'></i>
              LOGIN
          </button>
        </div>
      </form>
      </div>
    </div>


  </section>
  <!-- /.content -->
</div>
<br />
<!-- /.content-wrapper -->
<div class='text-center'>
  Powered By<br /><br />
  <img src='<?php echo base_url('assets/img/dcis.jpg');?>'><br />
</div>
</body>
</html>
