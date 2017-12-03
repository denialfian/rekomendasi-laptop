<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin Panel</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="" />

		<link href="<?= Config::get('url/base_url');?>assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="<?= Config::get('url/base_url');?>assets/css/font-awesome.min.css" rel="stylesheet"> 

		<!-- Custom Theme files -->
		<link href="<?= Config::get('url/base_url');?>assets/css/style_admin.css" rel='stylesheet' type='text/css' />
		<link href="<?= Config::get('url/base_url');?>assets/css/custom_admin.css" rel="stylesheet">

		<script src="<?= Config::get('url/base_url');?>assets/js/jquery.js"> </script>
		<script src="<?= Config::get('url/base_url');?>assets/js/bootstrap.min.js"> </script> 
		<script src="<?= Config::get('url/base_url');?>assets/js/jquery.metisMenu.js"></script>
		<script src="<?= Config::get('url/base_url');?>assets/js/custom.js"></script>

	    <link href="<?= Config::get('url/base_url');?>assets/plugin/bootstrap-fileinput-master/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
	    <link href="<?= Config::get('url/base_url');?>assets/plugin/bootstrap-fileinput-master/themes/explorer/theme.css" media="all" rel="stylesheet" type="text/css"/>
	    <script src="<?= Config::get('url/base_url');?>assets/plugin/bootstrap-fileinput-master/js/plugins/sortable.js" type="text/javascript"></script>
	    <script src="<?= Config::get('url/base_url');?>assets/plugin/bootstrap-fileinput-master/js/fileinput.js" type="text/javascript"></script>
	    <script src="<?= Config::get('url/base_url');?>assets/plugin/bootstrap-fileinput-master/js/fileinput_locale_fr.js" type="text/javascript"></script>
	    <script src="<?= Config::get('url/base_url');?>assets/plugin/bootstrap-fileinput-master/js/fileinput_locale_es.js" type="text/javascript"></script>
	    <script src="<?= Config::get('url/base_url');?>assets/plugin/bootstrap-fileinput-master/themes/explorer/theme.js" type="text/javascript"></script>


	    <!-- data tables -->
    	<link rel="stylesheet" type="text/css" href="<?= Config::get('url/base_url');?>assets/js/datatables/media/css/dataTables.bootstrap4.min.css">
	</head>
<body>
<div id="wrapper">

    <nav class="navbar-default navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           <h1> <a class="navbar-brand" href="index.html">Admin panel</a></h1>         
		</div>

		<div class="border-bottom">
	    	<div class="full-left">
	    	  	<section class="full-top">
					<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
				</section>
				<form class=" navbar-left-right">
	              	<input type="text"  value="">
	              	<input type="submit" value="" class="fa fa-search">
	            </form>
	        	<div class="clearfix"></div>
	       	</div>
	    	<div class="drop-men" >
		        <ul class=" nav_1">
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">Admin<i class="caret"></i></span></a>
		              <ul class="dropdown-menu " role="menu">
		                <li><a href="<?= Config::get('url/base_url');?>admin/logout"><i class="fa fa-clipboard"></i>Logout</a></li>
		              </ul>
		            </li>
		        </ul>
	     	</div>
			<div class="clearfix"></div>
	    	<div class="navbar-default sidebar" role="navigation">
	            <div class="sidebar-nav navbar-collapse">
	                <ul class="nav" id="side-menu">
	                    <li>
	                        <a href="<?= Config::get('url/base_url');?>admin" class=" hvr-bounce-to-right">
	                        	<i class="fa fa-dashboard nav_icon "></i>
	                        	<span class="nav-label">Dashboards</span> 
	                        </a>
	                    </li>
	                    <li>
	                        <a href="<?= Config::get('url/base_url');?>admin/users" class=" hvr-bounce-to-right">
	                        	<i class="fa fa-users nav_icon "></i>
	                        	<span class="nav-label">Users</span> 
	                        </a>
	                    </li>
	                    <li>
	                        <a href="<?= Config::get('url/base_url');?>admin/laptop" class=" hvr-bounce-to-right">
	                        	<i class="fa fa-laptop nav_icon "></i>
	                        	<span class="nav-label">Laptop</span> 
	                        </a>
	                    </li>
	                </ul>
	        	</div>
			</div>
		</div>
    </nav> 
	<div id="page-wrapper" class="gray-bg dashbard-1">
   		<div class="content-main">


				<!--grid-->
 			<div class="grid-form">

  				<div class="grid-form1">
  	       			
