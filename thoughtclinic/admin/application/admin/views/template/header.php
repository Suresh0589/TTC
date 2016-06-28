<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thought-Clinic</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('assets')?>/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="<?=base_url('assets')?>/css/datepicker.css" rel="stylesheet">-->
	<link href="<?=base_url('assets')?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url('assets')?>/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url('assets')?>/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url('assets')?>/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css"/>
	<link href="<?=base_url('assets')?>/css/jquery.timepicker.css" rel="stylesheet" type="text/css"/>
    <!-- MetisMenu CSS -->
    <link href="<?=base_url('assets')?>/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="<?=base_url('assets')?>/css/plugins/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url('assets')?>/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="<?=base_url('assets')?>/css/plugins/morris.css" rel="stylesheet">
    <!-- chosen Jquery -->
	 
	 <link href="<?=base_url('assets')?>/doc/prism.css" rel="stylesheet">
	 <link href="<?=base_url('assets')?>/doc/chosen.css" rel="stylesheet">
	
	<!-------Tags----------->
	<link href="<?=base_url('assets')?>/css/bootstrap-tagsinput.css" rel="stylesheet">
	 
    <link href="<?=base_url('assets')?>/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

	

	   <!-- jQuery Version 1.11.0 -->

    <script src="<?=base_url('assets')?>/js/jquery-1.11.0.js"></script>
<!-- jQuery Validations -->	
    <script src="<?=base_url('assets')?>/js/jquery.validate.min.js"></script> 
	
	
	
	<script src="http://malsup.github.com/jquery.form.js"></script>
	<!-- DataTables JavaScript -->
    <script src="<?=base_url('assets')?>/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?=base_url('assets')?>/js/plugins/dataTables/dataTables.bootstrap.js"></script>
	<!---- Tags---->

	<!-- Date picker -->
	
	<link href="<?=base_url('assets')?>/js/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
	<script src="<?=base_url('assets')?>/js/jquery.geocomplete.js"></script>
<!--  END of datepicker -->


</head>



<body>



    <div id="wrapper">



        <!-- Navigation -->

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

                <a class="navbar-brand" href="<?=base_url()?>">Thought-Clinic</a>
				
				<!--<a class="navbar-brand">Online-Mithai</a>-->

            </div>

            <!-- /.navbar-header -->



            <ul class="nav navbar-top-links navbar-right">

                

                <!-- /.dropdown -->

                

                <!-- /.dropdown -->

					

                <!-- /.dropdown -->

                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                        <i class="fa fa-user fa-fw"></i> <?=$this->session->userdata("thought_adm_name");?> <i class="fa fa-caret-down"></i>

                    </a>

                    <ul class="dropdown-menu dropdown-user">

                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>

                        </li>

                        <!--li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>

                        </li-->

                        <li class="divider"></li>

                        <li><a href="<?=base_url('out')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

                        </li>

                    </ul>

                    <!-- /.dropdown-user -->

                </li>

                <!-- /.dropdown -->

            </ul>

            <!-- /.navbar-top-links -->



            <div class="navbar-default sidebar" role="navigation">

                <div class="sidebar-nav navbar-collapse">

                    <ul class="nav" id="side-menu">

               
                        <li>

                            <a class="active" href="<?=base_url('dashboard')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>

                        </li>
						
						 <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Doctors<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=base_url('doctors/add')?>">Add Doctors</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('doctors')?>">List-Doctors</a>
                                </li>
                            </ul>
                        </li>
                        
						<li>
                            <a href="<?= base_url('articles') ?>"><i class="fa fa-sitemap fa-fw"></i> Articles<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?= base_url('articles/add') ?>">Add Articles</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('articles') ?>">List-Articles</a>
                                </li>
                        
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="<?= base_url('users') ?>"><i class="fa fa-sitemap fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                <li>
                                    <a href="<?= base_url('users') ?>">List-Users</a>
                                </li>
                        
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
                    </ul>

                </div>

                <!-- /.sidebar-collapse -->

            </div>

            <!-- /.navbar-static-side -->

        </nav>
