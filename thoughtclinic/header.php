<!DOCTYPE html>
<html lang="en" ng-app="myApp" ng-cloak>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- open graph metadata. This won't work either! -->
    <meta property="og:title" content="{{ metadata.title }}" />
    <meta property="og:site_name " content="The Thought Clinic" />
    <meta property="og:url " content="{{ metadata.url }}" />
    <meta property="og:description" content="{{ metadata.content }}" />
    <meta property="og:image" content="{{ metadata.image }}" />

<title>Thought Clinic</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/custom_bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-5-col.css">
<link rel="stylesheet" href="css/custom.css">
<link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
<link rel="manifest" href="manifest.json">


<meta name="theme-color" content="#ffffff">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/chosen.min.css">
<link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">
<!--scripts-->
	<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script> 
  <!-- Libs -->
  <!--script src="js/angular.min.js"></script>
  <script src="js/angular-animate.min.js" ></script-->
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-animate.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0-beta.2/angular-sanitize.js"></script>
  <script src="js/chosen/angular-chosen.js"></script>	
  <script type="text/javascript" src="js/ng-file-upload-shim.js"></script>
  <script type="text/javascript" src="js/ng-file-upload.js"></script>
  <script src="js/angular-route.min.js"></script>
  <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-1.3.3.js"></script>
  <script src="js/toaster.js"></script>
  <script src="app/app.js"></script>
  <script src="app/data.js"></script>
  <script src="app/directives.js"></script>
  <script src="app/authCtrl.js"></script>
  <script src="app/articleCtrl.js"></script>
  <script src="app/specialityCtrl.js"></script>
  <script src="app/doctorsCtrl.js"></script>
  <script src="app/consultingCtrl.js"></script>
  <script src="app/checkoutCtrl.js"></script>
  <script src="app/profileCtrl.js"></script><script type="text/javascript" src="js/custom.js"></script>
<!--scripts-->
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "9b86173d-4f2c-4b56-9e8b-bf90a88fa721", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-79752448-1', 'auto');
  ga('send', 'pageview');

</script>

</head>
<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <a class="navbar-brand scroll logo" href="#/"><!--img src="img/home-page/logo_1.png" alt="logo"--></a> </div>
  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right menu-position" style="{{unavstyles}}">
      <li><a href="#/" class="scroll">Home</a></li>
      <li><a class="scroll" href="#/counsellors">Counselors</a></li>
      <li><a class="scroll" href="#/articles">Articles</a></li>
      <li><a class="scroll" href="#/speciality">Speciality Clinics</a></li>
      <!--li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Speciality Clinics
        <span class="caret"></span></a>
        <ul ng-controller="specialityCtrl" ng-init="specialityLimit()" class="dropdown-menu" style="border-radius: 30px 0 0;">
          <li  ng-repeat="spe in specialityList"><a ng-click="onViewS(spe.spe_id)">{{spe.spe_title}}</a></li>
        </ul>
      </li-->
	  
   			
		  <li ng-show="logbtns" class="header-btn-one"><a style="padding: 0;" href="#/signupd"><button type="button" class="btn btn-1"><i class="fa fa-user-md" aria-hidden="true"></i>  Counselor</button></a></li>
		  <li ng-show="logbtns" class="header-btn-two" style="padding:22px 0 0 0;"><a style="padding: 0;" href="#/signup"><button type="button" class="btn btn-2"><i class="fa fa-user" aria-hidden="true"></i>  User</button></a></li>
	  
			<li ng-show="usrtabs" style="display: flex;" class=" text-center"><img class="profile-img" ng-src="{{tcuimg}}"/>
					<div class="profile-name">
					  <div ng-dropdown-multiselect="" options="example1data" selected-model="example1model">
						<div class="dropdown">
						  <button class="profile-dropdown-toggle-btn dropdown-toggle" type="button" data-toggle="dropdown">{{tcusername}} <span class="profile-dropdown-toggle-caret"></span></button>
						  <ul class="dropdown-menu">
							<!--li class="dropdown-header">Profile</li-->
							<li><a ng-controller="authCtrl" ng-click="profile()"><i class="fa fa-user"></i> Profile</a></li>
							<li><a href="#/messages"><i class="fa fa-envelope"></i> Messages</a></li>
							<li><a href="#/sessions"><i class="fa fa fa-calendar-check-o"></i> Sessions</a></li>
							
							<li class="divider"></li>
							<!--li class="dropdown-header">Dropdown header 2</li-->
							<li ng-click="logout()"><a ><i class="fa fa-sign-out" aria-hidden="true"></i> sign out</a></li>
						  </ul>
						</div>
					  </div>
					</div>
				  </li>
    </ul>
  </div>
  <!--/.nav-collapse --> 
</nav>
