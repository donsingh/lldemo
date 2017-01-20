<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo "USC QAMIS";?></title>
  <!-- FAVICON!! -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico');?>" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url('assets/img/favicon-32x32.png');?>" type="image/x-icon" sizes='32x32'>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css');?>"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-green.min.css');?>">
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50  x50 pixels -->
      <span class="logo-mini"><b>USC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>USC</b>QAMIS</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Navbar Right Menu -->
      <div>
        <ul class="nav navbar-nav">
          <!--RightHand Area for Addn'l Option-->
          <li class="dropdown messages-menu">
            <a href="<?php echo base_url();?>" style='font-size:1.8em;'>
              UNIVERSITY OF SAN CARLOS <small style='font-size:0.5em'> QA Management Information System</small>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
<!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/img/usc_clean.png');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->name;?></p>
          <!-- Status -->
          <a href="#">
            <?php
                switch($this->session->level){
                    case 0: echo "Developer"; break;
                    case 1: echo "Administrator"; break;
                    case 2: echo "Guest"; break;
                    default: break;
                }
            ?>
          </a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="#"><i class="fa fa-home"></i> <span>Home</span></a></li>

        <!-- FACULTY -->
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Faculty</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/faculty/faculty_form"><i class='fa fa-user-plus'></i> New Faculty</a></li>
            <li><a href="<?php echo base_url();?>index.php/faculty"><i class='fa fa-table'></i> Faculty Records</a></li>
            <li><a href="<?php echo base_url();?>index.php/faculty/faculty_form/update/5"><i class='fa fa-check-square-o'></i> Update My Record</a></li>
            <li><a href="<?php echo base_url();?>index.php/faculty/batch"><i class='fa fa-archive'></i> Batch Insert</a></li>
          </ul>
        </li>

        <!-- CES -->
        <li class="treeview">
          <a href="#"><i class="fa fa-heart"></i> <span>CES</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/ces/index"><i class='fa fa-thumbs-o-up'></i> My CES Record</a></li>
            <li><a href="<?php echo base_url();?>index.php/ces/activities"><i class='fa fa-chain'></i> CES Activities</a></li>
          </ul>
        </li>
        
        <!-- Books/Journals -->
        <li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Publications</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/book/"><i class='fa fa-book'></i> Books</a></li>
            <li><a href="<?php echo base_url();?>index.php/book/journal/"><i class='fa fa-file-text-o'></i> Journals</a></li>
          </ul>
        </li>

        <!-- Data Settings -->
        <li class="treeview">
          <a href="#"><i class="fa fa-database"></i> <span>Data Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/settings/index/fac_rank_code"><i class='fa fa-street-view'></i> Faculty Ranks</a></li>
            <li><a href="<?php echo base_url();?>index.php/settings/index/college"><i class='fa fa-institution'></i> Colleges</a></li>
            <li><a href="<?php echo base_url();?>index.php/settings/index/department"><i class='fa fa-institution'></i>  Departments</a></li>
          </ul>
        </li>
        
        <li><a href="<?php echo base_url();?>index.php/login/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
